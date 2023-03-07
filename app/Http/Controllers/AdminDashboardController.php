<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramUnggulan;
use App\Reservasi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('admin.dashboard', compact('reservasi', 'program_unggulan'));
    }
}
