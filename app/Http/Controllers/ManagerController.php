<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Manager;
use App\Division;
use App\Schedule;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        return view('dashboard.manager.dashboard-manager', [
            'schedulesCount' => Schedule::where('tujuan', Auth::user()->divisi)
                ->count(),
            'pengunjungCount' => Schedule::whereNotNull('waktu_checkin')
                ->where('tujuan', Auth::user()->divisi)
                ->count(),
            'schedulesAcc' => Schedule::query()
                ->whereYear('tanggal', date('Y'))
                ->where('status', 'diterima')
                ->where('tujuan', Auth::user()->divisi)
                ->get(),
            'schedulesReschedule' => Schedule::query()
                ->whereYear('tanggal', date('Y'))
                ->where('status', 'reschedule')
                ->where('tujuan', Auth::user()->divisi)
                ->get(),
            'schedulesReject' => Schedule::query()
                ->whereYear('tanggal', date('Y'))
                ->where('status', 'ditolak')
                ->where('tujuan', Auth::user()->divisi)
                ->get(),
            'bulan' => [
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ],

        ]);
    }

    public function index_schedule_manager()
    {
        return view('dashboard.manager.schedule-manager', [
            'schedules' => Schedule::where('tujuan', Auth::user()->divisi)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function export(Request $request)
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

        $schedules->where('tujuan', Auth::user()->divisi);

        $schedules = $schedules->orderBy('created_at', 'desc')->get();

        $pdf = \PDF::loadView('dashboard.manager.export-manager', [
            'schedules' => $schedules,
            'request' => $request
        ])->setPaper('a4', 'landscape');

        // Download PDF and redirect back
        return $pdf->download('export-manager-' . $tahun . '-' . $bulan . '-' . now()->format('YmdHis') . '.pdf')
            ->header('Content-Type', 'application/pdf')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
