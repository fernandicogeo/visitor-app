<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.staff.dashboard-staff');
    }

    public function index_schedule_staff()
    {
        return view('dashboard.staff.schedule-staff', [
            'schedules' => Schedule::where('tujuan', Auth::user()->divisi)->get(),
        ]);
    }

    // public function filter_schedule_staff(Request $request)
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

    //     return view('dashboard.staff.schedule-staff', [
    //         'schedules' => $schedules,
    //     ]);

    // }

    public function schedule_acc(Request $request)
    {
        Schedule::where('id', $request['id'])->update(['status' => 'diterima']);
        return back()->with('pesan', 'Jadwal pertemuan diterima');
    }

    public function schedule_reschedule(Request $request)
    {
        Schedule::where('id', $request['id'])->update([
            'status' => 'reschedule',
            'Tanggal_reschedule' => $request['tanggal_reschedule'],
            'waktu_reschedule' => $request['waktu_reschedule'],
        ]);
        return back()->with('pesanInfo', 'Jadwal pertemuan direschedule');
    }

    public function schedule_reject(Request $request)
    {
        Schedule::where('id', $request['id'])->update(['status' => 'ditolak']);
        return back()->with('pesanSalah', 'Jadwal pertemuan ditolak');
    }

}
