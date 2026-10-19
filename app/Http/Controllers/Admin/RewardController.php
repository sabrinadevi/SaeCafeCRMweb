<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RewardController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = $request->input('status', '');

        $rewards = Reward::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('reward_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->when(
                in_array($status, ['tersedia', 'tidak_tersedia'], true),
                function ($query) use ($status) {
                    $query->where('status', $status);
                }
            )
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        $totalReward = Reward::count();

        $rewardTersedia = Reward::where('status', 'tersedia')->count();

        $rewardTidakTersedia = Reward::where(
            'status',
            'tidak_tersedia'
        )->count();

        $totalStock = Reward::sum('stock');

        return view(
            'admin.rewards.index',
            compact(
                'rewards',
                'totalReward',
                'rewardTersedia',
                'rewardTidakTersedia',
                'totalStock'
            )
        );
    }

    public function search(Request $request)
    {
        $rewards = Reward::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(
                    'reward_name',
                    'like',
                    '%' . $request->search . '%'
                );
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where(
                    'status',
                    $request->status
                );
            })
            ->latest()
            ->get();

        return view(
            'admin.rewards.partials.table',
            compact('rewards')
        );
    }

    public function create()
    {
        return view(
            'admin.rewards.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reward_name' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'point_required' => [
                'required',
                'integer',
                'min:1'
            ],

            'stock' => [
                'required',
                'integer',
                'min:0'
            ],

            'status' => [
                'required',
                'in:tersedia,tidak_tersedia'
            ]
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] =
                $request->file('image')
                    ->store('rewards', 'public');
        }

        Reward::create($validated);

        return redirect()
            ->route('admin.rewards.index')
            ->with(
                'success',
                'Reward berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $reward = Reward::findOrFail($id);

        return view(
            'admin.rewards.edit',
            compact('reward')
        );
    }

    public function update(Request $request, $id)
    {
        $reward = Reward::findOrFail($id);

        $validated = $request->validate([
            'reward_name' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'point_required' => [
                'required',
                'integer',
                'min:1'
            ],

            'stock' => [
                'required',
                'integer',
                'min:0'
            ],

            'status' => [
                'required',
                'in:tersedia,tidak_tersedia'
            ]
        ]);

        if ($request->hasFile('image')) {
            if ($reward->image_path) {
                Storage::disk('public')
                    ->delete($reward->image_path);
            }

            $validated['image_path'] =
                $request->file('image')
                    ->store('rewards', 'public');
        }

        $reward->update($validated);

        return redirect()
            ->route('admin.rewards.index')
            ->with(
                'success',
                'Reward berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $reward = Reward::findOrFail($id);

        if ($reward->image_path) {
            Storage::disk('public')
                ->delete($reward->image_path);
        }

        $reward->delete();

        return redirect()
            ->route('admin.rewards.index')
            ->with(
                'success',
                'Reward berhasil dihapus'
            );
    }
}