<?php

namespace App\Http\Controllers;

use App\Division;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SatpamController extends Controller
{
    public function index()
    {
        return view('dashboard.satpam.dashboard-satpam', [
            'title' => 'Daftar Pengunjung Hari Ini',
            'divisions' => Division::all(),
            'schedules' => Schedule::where(function ($query) {
                $query->where('tanggal', date('Y-m-d'))
                    ->where('status', 'diterima');
            })
                ->orWhere(function ($query) {
                    $query->where('status', 'reschedule')
                        ->where('status_reschedule', 'menerima-reschedule')
                        ->where('tanggal_reschedule', date('Y-m-d'));
                })
                ->get(),
        ]);
    }

    public function index_recap()
    {
        return view('dashboard.satpam.dashboard-satpam', [
            'title' => "Rekapan Data Pengunjung",
            'divisions' => Division::all(),
            'schedules' => Schedule::all()
        ]);
    }

    public function divisi_schedule_today(Division $division)
    {
        return view('dashboard.satpam.detail-divisi-satpam', [
            'schedules' => Schedule::where('tujuan', $division->nama)
                ->where(function ($query) use ($division) {
                    $query->where('tanggal', date('Y-m-d'))
                        ->where('status', 'diterima')
                        ->where('tujuan', $division->nama);
                })
                ->orWhere(function ($query) use ($division) {
                    $query->where('status', 'reschedule')
                        ->where('status_reschedule', 'menerima-reschedule')
                        ->where('tanggal_reschedule', date('Y-m-d'))
                        ->where('tujuan', $division->nama);
                })
                ->orderBy('created_at', 'desc')->get(),
        ]);
    }



    public function divisi_schedule_total(Division $division)
    {
        return view('dashboard.satpam.detail-total-divisi-satpam', [
            'schedules' => Schedule::where('tujuan', $division->nama)
                ->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function schedule_check_in_satpam(Request $request)
    {
        $currentTime = Carbon::now();
        $currentDate = $currentTime->format('Y-m-d');
        $currentClock = $currentTime->format('H:i:s');

        Schedule::where('id', $request['id'])->update(['waktu_checkin' => $currentDate . ", " . $currentClock]);
        return back()->with('pesan', 'Visitor berhasil check-in');
    }

    public function schedule_check_out_satpam(Request $request)
    {
        $currentTime = Carbon::now();
        $currentDate = $currentTime->format('Y-m-d');
        $currentClock = $currentTime->format('H:i:s');

        Schedule::where('id', $request['id'])->update(['waktu_checkout' => $currentDate . ", " . $currentClock]);
        return back()->with('pesan', 'Visitor berhasil check-out');
    }
}
