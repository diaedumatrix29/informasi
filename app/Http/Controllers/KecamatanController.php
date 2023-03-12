<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\Kecamatan;
use App\Tingkatan;
use App\Reservasi;
use App\MataPelajaran;
use App\Office;
use App\ProgramUnggulan;
use App\ButtonWA;
use App\Keunggulan;
use App\AsalSekolahSiswa;
use App\TestimoniTeks;
use App\FAQ;
use App\Diskon;
use App\GoogleAnalytics;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::orderBy('nama_kecamatan')->get();
        $kota = Kota::all();
        return view('kecamatan.admin.dashboard', compact('kota', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view('kecamatan.admin.input', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                $image_path =  $image->storeAs('images/kecamatan', $fileName,'public');
                array_push($images, $image_path);
            }
            $kecamatan = new Kecamatan;
            $kecamatan->slug = Str::slug($request->nama_kecamatan);
            $kecamatan->title = $request->title;
            $kecamatan->meta_description = $request->meta_description;
            $kecamatan->script_js = $request->script_js;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->deskripsi = $request->deskripsi;
            $kecamatan->kota_id = $request->kota_id;
            $kecamatan->foto_kecamatan = implode(' ',$images);

            $kecamatan->save();
            return redirect('dashboard/kecamatan')->with('success', 'Kecamatan telah ditambahkan');

          } catch (\Exception $e) {
              return redirect('dashboard/kecamatan')->with('error', 'Kecamatan belum berhasil ditambahkan');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama_kota, $slug)
    {
        $data = Kecamatan::where('slug', $slug)->first();
        $data_kota = Kota::where('slug', $nama_kota)->first();
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $office = Office::all();
        $kecamatan= Kecamatan::all();
        $button_wa = ButtonWA::all();
        $keunggulan = Keunggulan::all();
        $asal_sekolah_siswa = AsalSekolahSiswa::all();
        $testimoni_teks = TestimoniTeks::all();
        $FAQ = FAQ::all();
        $diskon = Diskon::all();
        $google_analytics = GoogleAnalytics::all();
        $foto = explode(' ', $data->foto_kecamatan);
        return view('kecamatan.detail', compact('google_analytics', 'diskon', 'FAQ', 'testimoni_teks', 'asal_sekolah_siswa', 'keunggulan', 'button_wa', 'foto', 'data_kota', 'kecamatan','kota', 'office', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $data= Kecamatan::where('nama_kecamatan', $name)->first();
        return view('kecamatan.admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'file.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $kecamatan = Kecamatan::find($request->id);
            $kecamatan->title = $request->title;
            $kecamatan->meta_description = $request->meta_description;
            $kecamatan->script_js = $request->script_js;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->deskripsi = $request->deskripsi;
            $images = [];
            if ($request->hasFile('file')) {
                foreach ($data['file'] as $image) {
                    $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image_path =  $image->storeAs('images/kecamatan', $fileName,'public');
                    array_push($images, $image_path);
                }
                $kecamatan->foto_kecamatan = implode(' ',$images);
            } else {
                $imageName = $kecamatan->foto_kecamatan;
            }
            $kecamatan->save();
            return redirect('/dashboard/kecamatan')->with('success','Kecamatan berhasil diperbarui'); 
        }  catch (\Exception $e) {
            return redirect('/dashboard/kecamatan')->with('error', 'Kecamatan gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kecamatan = Kecamatan::find($id);
            Storage::delete('public/images/kecamatan/' . $kecamatan->foto_kecamatan);
            $kecamatan->delete();
            return redirect('/dashboard/kecamatan')->with('success', 'Kecamatan telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/kecamatan')->with('error', 'Kecamatan belum berhasil dihapus');
        }
    }
}
