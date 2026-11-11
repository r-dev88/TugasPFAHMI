<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::with('subject')->get();

        return view('admin.teacher', [
            'title' => 'Teachers',
            'teachers' => $teachers,
        ]);
    }
}
