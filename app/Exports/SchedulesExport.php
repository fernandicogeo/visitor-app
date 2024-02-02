<?php

namespace App\Exports;

use App\Schedule;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SchedulesExport implements FromView
{
    private $tahun = NULL;
    private $bulan = NULL;
    private $divisi = NULL;
    private $request = NULL;

    public function __construct($request)
    {
        $this->tahun = $request->tahun;
        $this->bulan = $request->bulan;
        $this->divisi = $request->divisi;
        $this->request = $request;
    }

    public function view(): View
    {
        $schedules = Schedule::query();

        if ($this->divisi != 'all') {
            $schedules->where('tujuan', $this->divisi);
        }

        if ($this->tahun != 'all') {
            $schedules->whereYear('tanggal', $this->tahun);
        }

        if ($this->bulan != 'all') {
            $schedules->whereMonth('tanggal', $this->bulan);
        }

        $schedules = $schedules->orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.export', ['schedules' => $schedules, 'request' => $this->request]);
    }
}
