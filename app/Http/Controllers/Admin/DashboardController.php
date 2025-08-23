<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class DashboardController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->paginate(10);
        return view('admin.dashboard', compact('films'));
    }
}
