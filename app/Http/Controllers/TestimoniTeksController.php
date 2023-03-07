<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestimoniTeks;
use Illuminate\Support\Facades\Storage;

class TestimoniTeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni_teks = TestimoniTeks::all();
        return view('testimoni_teks.admin.dashboard', compact('testimoni_teks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimoni_teks.admin.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimoni_teks = new TestimoniTeks;
        $testimoni_teks->nama_pengguna = $request->nama_pengguna;
        $testimoni_teks->isi_testimoni = $request->isi_testimoni;
        $testimoni_teks->judul_testimoni = $request->judul_testimoni;
        $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images/testimoni_teks', $imageName);
        $testimoni_teks->profile_image = $imageName;
        $testimoni_teks->save();
        return redirect('/dashboard/testimoni-teks')->with('success', 'Testimoni telah ditambahkan');
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
        $data= TestimoniTeks::where('nama_pengguna', $name)->first();
        return view('testimoni_teks.admin.edit', compact('data'));
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
        $testimoni_teks = TestimoniTeks::find($request->id);
        $testimoni_teks->nama_pengguna = $request->nama_pengguna;
        $testimoni_teks->isi_testimoni = $request->isi_testimoni;
        $testimoni_teks->judul_testimoni = $request->judul_testimoni;
        if ($request->hasFile('file')) {
            Storage::delete('public/images/testimoni_teks/' . $testimoni_teks->profile_image);
            $imageName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images/testimoni_teks/', $imageName);
            $testimoni_teks->profile_image = $imageName;
        } else {
            $imageName = $testimoni_teks->image;
        }
    $testimoni_teks->save();
    return redirect('/dashboard/testimoni-teks')->with(['success' => 'Data telah diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $testimoni_teks = TestimoniTeks::find($id);
        Storage::delete('public/images/testimoni_teks/' . $testimoni_teks->profile_image);
        $testimoni_teks->delete();
        return redirect('/dashboard/testimoni-teks')->with('success', 'Testimoni teks telah dihapus');
    }
}
