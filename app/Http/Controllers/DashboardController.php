<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $todayAttendance = Attendance::whereDate(
            'date',
            today()
        )->count();

        return view(
            'dashboard',
            compact(
                'totalUsers',
                'todayAttendance'
            )
        );
    }
}