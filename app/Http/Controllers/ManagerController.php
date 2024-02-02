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
        return view('dashboard.manager.dashboard-manager');
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
        return $pdf->download('export-manager-' . $bulan . '-' . $tahun . '-' . now()->format('YmdHis') . '.pdf')
            ->header('Content-Type', 'application/pdf')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
