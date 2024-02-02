<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Division;
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

        $pdf = \PDF::loadView('dashboard.staff.export-staff', [
            'schedules' => $schedules,
            'request' => $request
        ])->setPaper('a4', 'landscape');

        // Download PDF and redirect back
        return $pdf->download('export-staff-' . $bulan . '-' . $tahun . '-' . now()->format('YmdHis') . '.pdf')
            ->header('Content-Type', 'application/pdf')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }

    public function schedule_acc(Request $request)
    {
        $kode = Division::where('nama', $request['tujuan'])->pluck('kode')->first();

        Schedule::where('id', $request['id'])->update([
            'status' => 'diterima',
            'id_schedule' => $kode . $request['id']
        ]);
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
