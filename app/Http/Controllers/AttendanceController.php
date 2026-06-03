<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function checkIn()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', today())
            ->first();

        if (!$attendance) {

            Attendance::create([
                'user_id' => auth()->id(),
                'date' => today(),
                'check_in' => now()->format('H:i:s'),
                'status' => 'Hadir'
            ]);

        }

        return back();
    }

    public function checkOut()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', today())
            ->first();

        if ($attendance && !$attendance->check_out) {

            $attendance->update([
                'check_out' => now()->format('H:i:s')
            ]);
        }

        return back();
    }

    public function history()
    {
        $attendances = Attendance::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->paginate(10);

        return view(
            'attendance.history',
            compact('attendances')
        );
    }

    public function exportExcel()
    {
        return Excel::download(
            new AttendanceExport,
            'absensi.xlsx'
        );
    }
}