<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class aboutcontroller extends Controller
{
    //
    public function index(): View
    {
        return view('admin.about', [
            'title' => 'about',
            'nama' => 'M. Royyan A.',
            'kelas' => '11 PPLG 3',
            'REPO' => 'https://github.com/r-dev88/',
        ]);
    }
}
