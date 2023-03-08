<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tingkatan;
use App\Kota;
use App\MataPelajaran;
use App\ProgramUnggulan;
use App\Reservasi;
use App\Office;
use App\Deskripsi;
use File;
use Illuminate\Support\Facades\Storage;


class TingkatanController extends Controller
{
    function show($name)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $office = Office::all();
        $deskripsi = Deskripsi::all();
        $data= Tingkatan::where('tingkatan', $name)->first();
        return view('tingkatan.detail', compact('deskripsi', 'office', 'kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }
    function create()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('tingkatan.admin.input', compact('program_unggulan', 'reservasi'));
    }
    public function destroy($id)
    {
        try {
            $kelas = Tingkatan::find($id);
            Storage::delete('public/images/tingkatan/' . $kelas->home_image);
            $kelas->delete();
            return redirect('/dashboard/kelas')->with('success', 'Kelas telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/kelas')->with('error', 'Kelas belum berhasil dihapus');
        }
    }
    public function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $data= Tingkatan::where('tingkatan', $name)->first();
        return view('tingkatan.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
    }
    public function update(Request $request)
    {
        try {
            $kelas = Tingkatan::find($request->id);
            $kelas->tingkatan = $request->tingkatan;
            $kelas->deskripsi = $request->deskripsi;
            if ($request->hasFile('file')) {
                Storage::delete('public/images/tingkatan/' . $kelas->home_image);
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/images/tingkatan', $imageName);
                $kelas->home_image = $imageName;
            } else {
              $imageName = $kelas->home_image;
            }
            $kelas->save();
            return redirect('/dashboard/kelas')->with('success','Kelas berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/kelas')->with('error', 'Kelas belum berhasil diperbarui');
          }
    }
    function store(Request $request)
    {
        try {
            $tingkatan = new Tingkatan;
            $tingkatan->tingkatan = $request->tingkatan;
            $tingkatan->deskripsi = $request->deskripsi;
            $imageName = time() . '.' . $request->file->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->file->storeAs('public/images/tingkatan', $imageName);
            $tingkatan->home_image = $imageName;
            $tingkatan->save();
            return redirect('/kelas/input-data-kelas')->with('success', 'Kelas telah ditambahkan');
        } catch (\Exception $e) {
            return redirect('/kelas/input-data-kelas')->with('error', 'Kelas gagal ditambahkan');
        }
    }
    function index()
    {
        $kelas = Tingkatan::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('tingkatan.admin.dashboard', compact('kelas', 'program_unggulan', 'reservasi'));
    }
}
