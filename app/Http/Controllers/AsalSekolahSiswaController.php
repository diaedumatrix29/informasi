<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsalSekolahSiswa;
use Illuminate\Support\Facades\Storage;

class AsalSekolahSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $asal_sekolah_siswa = AsalSekolahSiswa::all();
        return view('asal_sekolah_siswa.admin.dashboard', compact('asal_sekolah_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asal_sekolah_siswa.admin.input');
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
            $asal_sekolah_siswa = new AsalSekolahSiswa();
            $asal_sekolah_siswa->nama_sekolah = $request->nama_sekolah;
            $imageName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images/asal-sekolah-siswa', $imageName);
            $asal_sekolah_siswa->foto_sekolah = $imageName;
            $asal_sekolah_siswa->save();
            return redirect('/dashboard/asal-sekolah-siswa')->with('success', 'Asal Sekolah berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/dashboard/asal-sekolah-siswa')->with('error', 'Asal Sekolah gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $data = AsalSekolahSiswa::where('nama_sekolah', $name)->first();
        return view('asal_sekolah_siswa.admin.edit', compact('data'));
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
            $asal_sekolah_siswa = AsalSekolahSiswa::find($request->id);
            $asal_sekolah_siswa->nama_sekolah = $request->nama_sekolah;
            if ($request->hasFile('file')) {
                Storage::delete('public/images/asal-sekolah-siswa/' . $asal_sekolah_siswa->foto_sekolah);
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/images/asal-sekolah-siswa', $imageName);
                $asal_sekolah_siswa->foto_sekolah = $imageName;
            } else {
              $imageName = $asal_sekolah_siswa->foto_sekolah;
            }
            $asal_sekolah_siswa->save();
            return redirect('/dashboard/asal-sekolah-siswa')->with('success','Asal Sekolah berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/asal-sekolah-siswa')->with('error', 'Asal Sekolah belum berhasil diperbarui');
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
            $asal_sekolah = AsalSekolahSiswa::find($id);
            Storage::delete('public/images/asal-sekolah-siswa/' . $asal_sekolah->foto_sekolah);
            $asal_sekolah->delete();
            return redirect('/dashboard/asal-sekolah-siswa')->with('success', 'Asal Sekolah telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/asal-sekolah-siswa')->with('error', 'Asal Sekolah belum berhasil dihapus');
        }
    }
}
