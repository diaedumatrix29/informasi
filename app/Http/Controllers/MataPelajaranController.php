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
use App\ButtonWA;
use App\Keunggulan;
use App\AsalSekolahSiswa;
use App\TestimoniTeks;
use App\FAQ;
use App\Diskon;
use App\GoogleAnalytics;
use Illuminate\Support\Str;

class MataPelajaranController extends Controller
{
    function show($slug)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $deskripsi = Deskripsi::all();
        $office = Office::all();
        $button_wa = ButtonWA::all();
        $keunggulan = Keunggulan::all();
        $asal_sekolah_siswa = AsalSekolahSiswa::all();
        $testimoni_teks = TestimoniTeks::all();
        $FAQ = FAQ::all();
        $diskon = Diskon::all();
        $google_analytics = GoogleAnalytics::all();
        $data= MataPelajaran::where('slug', $slug)->first();
        return view('mata_pelajaran.detail', compact('google_analytics', 'diskon', 'FAQ', 'testimoni_teks', 'asal_sekolah_siswa', 'keunggulan', 'button_wa', 'deskripsi', 'office', 'kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
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
            $mapel->title = $request->title;
            $mapel->meta_description = $request->meta_description;
            $mapel->script_js = $request->script_js;
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
            $mata_pelajaran->slug = Str::slug($request->mata_pelajaran);
            $mata_pelajaran->title = $request->title;
            $mata_pelajaran->meta_description = $request->meta_description;
            $mata_pelajaran->script_js = $request->script_js;
            $mata_pelajaran->mata_pelajaran = $request->mata_pelajaran;
            $mata_pelajaran->deskripsi = $request->deskripsi;
            $mata_pelajaran->save();
            return redirect('/mapel/input-data-mapel')->with('success', 'Mata Pelajaran telah ditambahkan');
        } catch(\Exception $e) {
            return redirect('/mapel/input-data-mapel')->with('error', 'Mata Pelajaran gagal ditambahkan');
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
