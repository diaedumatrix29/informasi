<?php

namespace App\Http\Controllers;

use App\Kota;
use App\Tingkatan;
use App\MataPelajaran;
use App\ProgramUnggulan;
use App\Reservasi;
use App\Office;
use App\Kecamatan;
use App\Deskripsi;
use App\ButtonWA;
use App\Keunggulan;
use App\AsalSekolahSiswa;
use App\TestimoniTeks;
use App\FAQ;
use App\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KotaController extends Controller
{
    public function create()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('kota.admin.input-data', compact('reservasi', 'program_unggulan'));
    }
    public function show($slug)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $office = Office::all();
        $kecamatan = Kecamatan::all();
        $deskripsi = Deskripsi::all();
        $button_wa = ButtonWA::all();
        $keunggulan = Keunggulan::all();
        $asal_sekolah_siswa = AsalSekolahSiswa::all();
        $testimoni_teks = TestimoniTeks::all();
        $FAQ = FAQ::all();
        $diskon = Diskon::all();
        $data= Kota::where('slug', $slug)->first();
        $foto = explode(' ', $data->foto_kota);

        return view('kota.detail', compact('diskon', 'FAQ', 'testimoni_teks', 'asal_sekolah_siswa', 'keunggulan', 'button_wa', 'deskripsi', 'foto', 'kecamatan', 'office', 'kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }
    public function destroy($id)
    {
        try {
            $kota = Kota::find($id);
            foreach($kota as $foto) {
                Storage::delete('storage/' . $kota->foto_kota);
            }
            $kota->delete();
            return redirect('/dashboard/kota')->with('success', 'Kota telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/kota')->with('error', 'Kota gagal dihapus');
        }

    }
    public function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $data= Kota::where('nama_kota', $name)->first();
        $reservasi = Reservasi::all();
        return view('kota.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
    }

    
    public function update(Request $request, Kota $kota)
    {
        try {
            $data = $request->validate([
                'file.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $kota = Kota::find($request->id);
            $kota->nama_kota = $request->nama_kota;
            $kota->title = $request->title;
            $kota->meta_description = $request->meta_description;
            $kota->script_js = $request->script_js;
            $kota->deskripsi = $request->deskripsi;
            $images = [];
    
            if ($request->hasFile('file')) {
                foreach ($data['file'] as $image) {
                    $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image_path =  $image->storeAs('images/kota', $fileName,'public');
                    array_push($images, $image_path);
                }
                $kota->foto_kota = implode(' ',$images);
    
            } else {
                $imageName = $kota->foto_kota;
            }
    
            $kota->save();
            return redirect('/dashboard/kota')->with('success','Kota berhasil diperbarui'); 
        }  catch (\Exception $e) {
            return redirect('/dashboard/kota')->with('error', 'Kota gagal diperbarui');
        }
 
    }
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'file' =>'required',
                'file.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $images = [];
            foreach ($data['file'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path =  $image->storeAs('images/kota', $fileName,'public');
                array_push($images, $image_path);
            }
            $kota = new Kota();
            $kota->slug = Str::slug($request->nama_kota);
            $kota->nama_kota = $request->nama_kota;
            $kota->title = $request->title;
            $kota->meta_description = $request->meta_description;
            $kota->script_js = $request->script_js;
            $kota->deskripsi = $request->deskripsi;
            $kota->foto_kota = implode(' ',$images);
            $kota->save();
            return redirect('kota/input-data-kota')->with('success', 'Kota telah ditambahkan');  

        }  catch (\Exception $e) {
            return redirect('kota/input-data-kota')->with('error', 'Kota belum berhasil ditambahkan');
        }

    }
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $program_unggulan = ProgramUnggulan::all();
        $kota = Kota::all();
        $reservasi = Reservasi::all();
        return view('kota.admin.dashboard', compact('reservasi', 'program_unggulan', 'kota', 'kecamatan'));
    }
}
