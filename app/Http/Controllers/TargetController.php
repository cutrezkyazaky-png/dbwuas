<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TargetController extends Controller
{
public function myTargets()
{
    $targets = Target::latest()->get();

    $active = $targets->count();
    $completed = $targets->where('progress', 100)->count();
    $ongoing = $targets->where('progress', '<', 100)->count();

    $totalTarget = $targets->sum('target_amount');
    $totalCurrent = $targets->sum('current_amount');

    return view('my-targets', compact(
        'targets',
        'active',
        'completed',
        'ongoing',
        'totalTarget',
        'totalCurrent'
    ));
}
   
    

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'target_amount' => 'required|numeric',
            'current_amount' => 'required|numeric',
            'deadline' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'title.required' => 'Judul target wajib diisi.',
            'category.required' => 'Kategori wajib diisi.',
        ]);

        // Upload foto
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('targets', 'public');
        }

        Target::create($data);

        return redirect()
            ->route('targets.my')
            ->with('success', 'Target berhasil ditambahkan');
    }

    public function edit(Target $target)
    {
        return view('edit', compact('target'));
    }

    public function update(Request $request, Target $target)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'target_amount' => 'required|numeric',
            'current_amount' => 'required|numeric',
            'deadline' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'title.required' => 'Judul target wajib diisi.',
            'category.required' => 'Kategori wajib diisi.',
        ]);

        

        // Jika upload foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto lama
            if ($target->photo) {
                Storage::disk('public')->delete($target->photo);
            }

            // Simpan foto baru
            $data['photo'] = $request->file('photo')
                ->store('targets', 'public');
        }

        $target->update($data);

        return redirect()
            ->route('targets.my')
            ->with('success', 'Target berhasil diupdate');
    }

    public function destroy(Target $target)
    {
        // Hapus foto jika ada
        if ($target->photo) {
            Storage::disk('public')->delete($target->photo);
        }

        $target->delete();

        return redirect()
            ->route('targets.my')
            ->with('success', 'Target berhasil dihapus');
    }
}