<?php

namespace App\Http\Controllers;

class dashboardcontroller extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'welcomeMessage' => 'HELLO WELLCOME TO WEBDEV.',
        ]);
    }
}
