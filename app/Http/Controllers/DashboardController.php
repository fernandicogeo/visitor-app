<?php

namespace App\Http\Controllers;

use App\User;
use App\Division;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.dashboard');
    }

    public function index_profile()
    {
        return view('dashboard.user.profile');
    }

    public function index_edit_profile()
    {
        return view('dashboard.user.edit-profile');
    }

    public function edit_profile(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'instansi' => 'required|max:255',
            'nomor_hp' => 'required|numeric',
            'nik' => 'required|numeric',
        ]);

        User::where('email', Auth::user()->email)
            ->update($validatedData);

        return redirect('/profile')->with('pesan', 'Data berhasil diedit.');
    }

    public function index_schedule()
    {
        return view('dashboard.user.schedule');
    }

    public function set_schedule(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date|after:tomorrow',
            'waktu' => 'required',
            'tujuan' => 'required',
            'keperluan' => 'required',
            'keterangan' => 'required',
        ]);

        $validatedData['nama'] = Auth::user()->nama;
        $validatedData['email'] = Auth::user()->email;


        Schedule::create($validatedData);

        return redirect('/schedule')->with('pesan', 'Pertemuan berhasil diajukan.');
    }


    public function index_history()
    {
        return view('dashboard.user.history', [
            'schedules' => Schedule::where('email', Auth::user()->email)
                ->where(function ($query) {
                    $query->where('status', 'diterima')
                        ->orWhere('status', 'ditolak')
                        ->orWhere('status', 'reschedule')
                        ->orWhere('status', null);
                })
                ->get(),
        ]);
    }

    public function reschedule_acc(Request $request)
    {
        $kode = Division::where('nama', $request['tujuan'])->pluck('kode')->first();

        Schedule::where('id', $request['id'])->update([
            'status_reschedule' => 'menerima-reschedule',
            'id_schedule' => $kode . $request['id']
        ]);
        return back()->with('pesan', 'Jadwal reschedule diterima');
    }

    public function reschedule_reject(Request $request)
    {
        Schedule::where('id', $request['id'])->update(['status_reschedule' => 'menolak-reschedule']);
        return back()->with('pesanSalah', 'Jadwal reschedule ditolak');
    }

    public function index_update_password()
    {
        return view('dashboard.user.update-password');
    }

    public function update_password(Request $request)
    {
        $oldPass = $request['oldPass'];
        $newPass = $request['newPass'];
        $hashpPwBaru = bcrypt($newPass);

        if (Hash::check($oldPass, Auth::user()->password)) {
            User::where('email', Auth::user()->email)->update(['password' => $hashpPwBaru]);
            return back()->with('pesan', 'Password anda berhasil diubah');
        } else {
            return back()->with('pesanSalah', 'Password Lama Anda Salah!');
        }
    }
}
