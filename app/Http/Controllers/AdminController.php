<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Satpam;
use App\Manager;
use App\Division;
use App\Schedule;
use Illuminate\Http\Request;
use App\Exports\SchedulesExport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.dashboard-admin', [
            'usersCount' => User::count(),
            'pegawaiCount' => Staff::count() + Manager::count() + Satpam::count(),
            'schedulesCount' => Schedule::count(),
            'pengunjungCount' => Schedule::whereNotNull('waktu_checkin')->count(),
            'schedulesAcc' => Schedule::query()->whereYear('tanggal', date('Y'))->where('status', 'diterima')->get(),
            'schedulesReschedule' => Schedule::query()->whereYear('tanggal', date('Y'))->where('status', 'reschedule')->get(),
            'schedulesReject' => Schedule::query()->whereYear('tanggal', date('Y'))->where('status', 'ditolak')->get(),
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

    public function index_admin_data_schedule()
    {
        return view('dashboard.admin.admin-data-schedule', [
            'schedules' => Schedule::orderBy('created_at', 'desc')->get(),
            'divisions' => Division::all()
        ]);
    }

    public function export(Request $request)
    {
        return Excel::download(new SchedulesExport($request), 'schedules-' . $request->tahun . '-' . $request->bulan . '-' . $request->divisi . '-' . now()->format('YmdHis') . '.xlsx');
    }

    public function index_admin_data_user()
    {
        return view('dashboard.admin.admin-data-user', [
            'users' => User::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function index_admin_data_staff()
    {
        return view('dashboard.admin.admin-data-staff', [
            'staffs' => Staff::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create_admin_data_staff(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:staff',
            'divisi' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        Staff::create($validatedData);

        return back()->with('pesan', 'Data berhasil ditambah.');
    }

    public function edit_admin_data_staff(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:staff,username,' . $request->id,
            'divisi' => 'required|max:255',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        Staff::where('id', $request->id)
            ->update($validatedData);

        return back()->with('pesan', 'Data berhasil diedit.');
    }

    public function delete_admin_data_staff(Request $request)
    {
        Staff::where('id', $request->id)
            ->delete();

        return back()->with('pesan', 'Data berhasil dihapus.');
    }

    public function index_admin_data_satpam()
    {
        return view('dashboard.admin.admin-data-satpam', [
            'satpams' => Satpam::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create_admin_data_satpam(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:satpams',
            'divisi' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        satpam::create($validatedData);

        return back()->with('pesan', 'Data berhasil ditambah.');
    }

    public function edit_admin_data_satpam(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:satpams,username,' . $request->id,
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        Satpam::where('id', $request->id)
            ->update($validatedData);

        return back()->with('pesan', 'Data berhasil diedit.');
    }

    public function delete_admin_data_satpam(Request $request)
    {
        Satpam::where('id', $request->id)
            ->delete();

        return back()->with('pesan', 'Data berhasil dihapus.');
    }

    public function index_admin_data_manager()
    {
        return view('dashboard.admin.admin-data-manager', [
            'managers' => Manager::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create_admin_data_manager(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:managers',
            'divisi' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        manager::create($validatedData);

        return back()->with('pesan', 'Data berhasil ditambah.');
    }

    public function edit_admin_data_manager(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:managers,username,' . $request->id,
            'divisi' => 'required|max:255',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        Manager::where('id', $request->id)
            ->update($validatedData);

        return back()->with('pesan', 'Data berhasil diedit.');
    }

    public function delete_admin_data_manager(Request $request)
    {
        Manager::where('id', $request->id)
            ->delete();

        return back()->with('pesan', 'Data berhasil dihapus.');
    }
}
