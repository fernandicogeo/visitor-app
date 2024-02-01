<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Satpam;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.dashboard-admin');
    }

    public function index_admin_data_user()
    {
        return view('dashboard.admin.admin-data-user', [
            'users' => User::all(),
        ]);
    }

    public function index_admin_data_staff()
    {
        return view('dashboard.admin.admin-data-staff', [
            'staffs' => Staff::all(),
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
            'satpams' => Satpam::all(),
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
            'managers' => Manager::all(),
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
