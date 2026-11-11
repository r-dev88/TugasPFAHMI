<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subjects = Subject::with('teacher')->get();

        return view('admin.subject', [
            'title' => 'Subject',
            'subjects' => $subjects,
        ]);
    }
}
