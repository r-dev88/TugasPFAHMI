<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.student', $this->studentPageData());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.student', [
            ...$this->studentPageData(),
            'openCreateModal' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'nis' => ['required', 'string', 'max:10', 'unique:students,nis'],
            'classroom_id' => ['required', 'integer', 'exists:classrooms,id'],
            'address' => ['nullable', 'string'],
        ]);

        Student::create($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Data yang dibutuhkan halaman daftar dan form siswa.
     *
     * @return array{
     *     title: string,
     *     students: Collection<int, Student>,
     *     classrooms: Collection<int, Classroom>
     * }
     */
    private function studentPageData(): array
    {
        return [
            'title' => 'Student',
            'students' => Student::with('classroom')->get(),
            'classrooms' => Classroom::orderBy('name')->get(),
        ];
    }
}
