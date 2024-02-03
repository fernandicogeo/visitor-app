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
            'divisi' => $division->nama,
        ]);
    }

    public function export(Request $request)
    {
        $schedules = Schedule::where('tujuan', $request->divisi)
            ->where(function ($query) use ($request) {
                $query->where('tanggal', date('Y-m-d'))
                    ->where('status', 'diterima')
                    ->where('tujuan', $request->divisi);
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('status', 'reschedule')
                    ->where('status_reschedule', 'menerima-reschedule')
                    ->where('tanggal_reschedule', date('Y-m-d'))
                    ->where('tujuan', $request->divisi);
            })
            ->orderBy('created_at', 'desc')->get();


        $pdf = \PDF::loadView('dashboard.satpam.export-satpam', [
            'schedules' => $schedules,
            'request' => $request
        ])->setPaper('a4', 'landscape');

        // Download PDF and redirect back
        return $pdf->download('export-satpam-harian-' . date('Y-m-d') . '-' . $request->divisi . '-' . now()->format('YmdHis') . '.pdf')
            ->header('Content-Type', 'application/pdf')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }

    public function divisi_schedule_total(Division $division)
    {
        return view('dashboard.satpam.detail-total-divisi-satpam', [
            'schedules' => Schedule::where('tujuan', $division->nama)
                ->orderBy('created_at', 'desc')->get(),
            'divisi' => $division->nama,
        ]);
    }

    public function export_total(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $schedules = Schedule::query();

        if ($tahun != 'all') {
            $schedules->whereYear('tanggal', $tahun);
        }

        if ($bulan != 'all') {
            $schedules->whereMonth('tanggal', $bulan);
        }

        $schedules->where('tujuan', $request->divisi);

        $schedules = $schedules->orderBy('created_at', 'desc')->get();

        $pdf = \PDF::loadView('dashboard.satpam.export-satpam', [
            'schedules' => $schedules,
            'request' => $request
        ])->setPaper('a4', 'landscape');

        // Download PDF and redirect back
        return $pdf->download('export-satpam-total-' . $tahun . '-' . $bulan . '-' . $request->divisi . '-' . now()->format('YmdHis') . '.pdf')
            ->header('Content-Type', 'application/pdf')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
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
