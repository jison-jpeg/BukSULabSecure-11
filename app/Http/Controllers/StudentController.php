<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewDashboard()
    {
        return view('student.dashboard');
    }
}
