<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function index() {
        $allData = Students::all();
        return view('LandingPage.index', ['data' => $allData]);
    }

}