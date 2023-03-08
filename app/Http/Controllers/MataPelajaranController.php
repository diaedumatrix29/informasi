<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\Kota;
use App\Tingkatan;
use App\ProgramUnggulan;
use App\Reservasi;
use App\Office;
use App\Deskripsi;

class MataPelajaranController extends Controller
{
    function show($name)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $deskripsi = Deskripsi::all();
        $office = Office::all();
        $data= MataPelajaran::where('mata_pelajaran', $name)->first();
        return view('mata_pelajaran.detail', compact('deskripsi', 'office', 'kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }
    function create()
    {     
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('mata_pelajaran.admin.input', compact('program_unggulan', 'reservasi'));
    }
    public function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $data= MataPelajaran::where('mata_pelajaran', $name)->first();
        $reservasi = Reservasi::all();
        return view('mata_pelajaran.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'mata_pelajaran' => 'required',
            ]);
            $mapel = MataPelajaran::find($request->id);
            $mapel->mata_pelajaran = $request->mata_pelajaran;
            $mapel->deskripsi = $request->deskripsi;
            $mapel->save();
            return redirect('/dashboard/mapel')->with('success','Mata Pelajaran berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/mapel')->with('error', 'Mata Pelajaran belum berhasil diperbarui');
          }
    }
    public function destroy($id)
    {
        try {
            $mapel = MataPelajaran::find($id);
            $mapel->delete();
            return redirect('/dashboard/mapel')->with('success', 'Mata Pelajaran telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/mapel')->with('error', 'Mata Pelajaran belum berhasil dihapus');
        }
    }
    function store(Request $request)
    {
        try {
            $mata_pelajaran = new MataPelajaran;
            $mata_pelajaran->mata_pelajaran = $request->mata_pelajaran;
            $mata_pelajaran->deskripsi = $request->deskripsi;
            $mata_pelajaran->save();
            return redirect('/mapel/input-data-mapel')->with('success', 'Mata Pelajaran telah ditambahkan');
        } catch(\Exception $e) {
            return redirect('/mapel/input-data-mapel')->with('error', 'Mata Pelajaran telah ditambahkan');
        }
    }
    function index()
    {
        $program_unggulan = ProgramUnggulan::all();
        $mapel = MataPelajaran::all();
        $reservasi = Reservasi::all();
        return view('mata_pelajaran.admin.dashboard', compact('program_unggulan', 'mapel', 'reservasi'));
    }
}
