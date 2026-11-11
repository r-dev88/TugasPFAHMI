<?php

namespace App\Http\Controllers;

use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::with('students')->get();

        return view('admin.classroom', [
            'title' => 'Classroom',
            'classrooms' => $classrooms,
        ]);
    }

    /**
     * Display the specified classroom with its students.
     */
    public function show(Classroom $classroom)
    {
        $classroom->load('students');

        return view('admin.classroom-detail', [
            'title' => 'Detail Kelas: '.$classroom->name,
            'classroom' => $classroom,
            'students' => $classroom->students,
        ]);
    }
}
