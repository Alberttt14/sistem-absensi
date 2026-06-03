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

        $todayAttendances = Attendance::with('user')
            ->whereDate('date', today())
            ->latest()
            ->get();

        if(auth()->user()->role == 'admin')
        {
            return view(
                'admin.dashboard',
                compact(
                    'totalUsers',
                    'todayAttendance',
                    'todayAttendances'
                )
            );
        }

        return view(
            'user.dashboard',
            compact(
                'totalUsers',
                'todayAttendance',
                'todayAttendances'
            )
        );
    }
}