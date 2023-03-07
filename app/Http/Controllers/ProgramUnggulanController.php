<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\Kota;
use App\Tingkatan;
use App\ProgramUnggulan;
use App\Reservasi;

class ProgramUnggulanController extends Controller
{
    function show($name)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $data= Tingkatan::where('tingkatan', $name)->first();
        return view('tingkatan.detail', compact('kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }
    function create(Request $request)
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('program_unggulan.admin.input', compact('program_unggulan', 'reservasi'));
    }
    public function destroy($id)
    {
        try {
            $program_unggulan = ProgramUnggulan::find($id);
            $program_unggulan->delete();
            return redirect('/dashboard/program-unggulan')->with('status', 'Program unggulan telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/program-unggulan')->with('error', 'Program unggulan belum berhasil dihapus');
        }
    }
    function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $data= ProgramUnggulan::where('nama_program', $name)->first();
        return view('program_unggulan.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_program' => 'required',
            ]);
            $program_unggulan = ProgramUnggulan::find($request->id);
            $program_unggulan->nama_program = $request->nama_program;
            $program_unggulan->link = $request->link;
            $program_unggulan->save();
            return redirect('/dashboard/program-unggulan')->with('success','Program unggulan berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/program-unggulan')->with('error', 'Program unggulan belum berhasil diperbarui');
          }
    }
    function store(Request $request)
    {
        try {
            $program_unggulan = new ProgramUnggulan;
            $program_unggulan->nama_program = $request->program_unggulan;
            $program_unggulan->link = $request->link;
            $program_unggulan->save();
            return redirect('dashboard/program-unggulan')->with('success', 'Program unggulan telah ditambahkan');
        } catch (\Exception $e) {
            return redirect('/dashboard/program-unggulan')->with('error', 'Program gagal dibuat');
        }
    }
    function index()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('program_unggulan.admin.dashboard', compact('program_unggulan', 'reservasi'));
    }
}
