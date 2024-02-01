<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Schedule;
use App\Manager;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        return view('dashboard.manager.dashboard-manager');
    }

    public function index_schedule_manager()
    {
        return view('dashboard.manager.schedule-manager', [
            'schedules' => Schedule::where('tujuan', Auth::user()->divisi)->get(),
        ]);
    }

    // public function filter_schedule_manager(Request $request)
    // {

    //     $schedules = Schedule::where('tujuan', Auth::user()->divisi);

    //     if ($request['tanggal'] != NULL) {
    //         $schedules = $schedules->where('tanggal', $request['tanggal'])
    //         ->orWhere('tanggal_reschedule', $request['tanggal']);
    //     }

    //     if ($request['status'] == 'menunggu-staff') {
    //         $schedules = $schedules->where('status', NULL);
    //     } else if ($request['status'] == 'diterima' || $request['status'] == 'ditolak') {
    //         $schedules = $schedules->where('status', $request['status']);
    //     } else if ($request['status'] == 'menerima-reschedule') {
    //         $schedules = $schedules->where('status_reschedule', $request['status'])
    //         ->where('tanggal_reschedule', $request['tanggal']);
    //     } else if ($request['status'] == 'menolak-reschedule') {
    //         $schedules = $schedules->where('status_reschedule', $request['status']);
    //     } else if ($request['status'] == 'menunggu-reschedule') {
    //         $schedules = $schedules->where('status', 'reschedule')->where('status_reschedule', NULL);
    //     }

    //     $schedules = $schedules->get();

    //     return view('dashboard.manager.schedule-manager', [
    //         'schedules' => $schedules,
    //     ]);

    // }
}
