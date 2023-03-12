<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoogleAnalytics;
use App\Reservasi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $google_analytics = GoogleAnalytics::all();
        $reservasi = Reservasi::all();
        return view('admin.dashboard', compact('google_analytics', 'reservasi'));
    }
}
