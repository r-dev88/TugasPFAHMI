<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return $this->renderIndex($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return $this->renderIndex($request, openCreateModal: true);
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
            'is_active' => ['sometimes', 'boolean'],
        ], $this->validationMessages());

        $validated['is_active'] = $request->has('is_active')
            ? $request->boolean('is_active')
            : true;

        Student::create($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'nis' => ['required', 'string', 'max:10', Rule::unique('students', 'nis')->ignore($student->id)],
            'classroom_id' => ['required', 'integer', 'exists:classrooms,id'],
            'address' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
        ], $this->validationMessages());

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        $student->update($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    /**
     * Render the student list, optionally opening the create modal.
     */
    private function renderIndex(Request $request, bool $openCreateModal = false): View
    {
        $search = trim((string) $request->query('search', ''));
        $classroomId = $request->integer('classroom_id');
        $status = (string) $request->query('status', '');

        $students = Student::query()
            ->with('classroom')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%");
                });
            })
            ->when($classroomId > 0, fn ($query) => $query->where('classroom_id', $classroomId))
            ->when(in_array($status, ['active', 'inactive'], true), function ($query) use ($status) {
                $query->where('is_active', $status === 'active');
            })
            ->orderBy('nama')
            ->orderBy('nis')
            ->paginate(10)
            ->withQueryString();

        return view('admin.student', [
            'title' => 'Student',
            'students' => $students,
            'classrooms' => Classroom::orderBy('name')->get(),
            'search' => $search,
            'classroomId' => $classroomId,
            'status' => $status,
            'openCreateModal' => $openCreateModal,
        ]);
    }

    /**
     * @return array<string, string>
     */
    private function validationMessages(): array
    {
        return [
            'nama.required' => 'Nama siswa wajib diisi.',
            'nama.max' => 'Nama siswa maksimal 100 karakter.',
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah digunakan.',
            'nis.max' => 'NIS maksimal 10 karakter.',
            'classroom_id.required' => 'Kelas wajib dipilih.',
            'classroom_id.exists' => 'Kelas tidak ditemukan.',
        ];
    }
}
