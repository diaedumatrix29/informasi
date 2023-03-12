<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keunggulan;
use Illuminate\Support\Facades\Storage;

class KeunggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keunggulan = Keunggulan::all();
        return view('keunggulan.admin.dashboard', compact('keunggulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keunggulan.admin.input');
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
            $keunggulan = new Keunggulan;
            $keunggulan->judul_keunggulan = $request->judul_keunggulan;
            $keunggulan->isi_keunggulan = $request->isi_keunggulan;
            $imageName = time() . '.' . $request->file->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->file->storeAs('public/images/icon_keunggulan', $imageName);
            $keunggulan->icon_keunggulan = $imageName;
            $keunggulan->save();
            return redirect('/keunggulan/input-data-keunggulan')->with('success', 'keunggulan telah ditambahkan');
        } catch (\Exception $e) {
            return redirect('/keunggulan/input-data-keunggulan')->with('error', 'keunggulan gagal ditambahkan');
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
        $data = Keunggulan::where('judul_keunggulan', $name)->first();
        return view('keunggulan.admin.edit', compact('data'));
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
            $keunggulan = Keunggulan::find($request->id);
            $keunggulan->judul_keunggulan = $request->judul_keunggulan;
            $keunggulan->isi_keunggulan = $request->isi_keunggulan;
            if ($request->hasFile('file')) {
                Storage::delete('public/images/icon_keunggulan/' . $keunggulan->icon_keunggulan);
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/images/icon_keunggulan', $imageName);
                $keunggulan->icon_keunggulan = $imageName;
            } else {
              $imageName = $keunggulan->icon_keunggulan;
            }
            $keunggulan->save();
            return redirect('/dashboard/keunggulan')->with('success','keunggulan berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/keunggulan')->with('error', 'keunggulan belum berhasil diperbarui');
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
            $keunggulan = Keunggulan::find($id);
            Storage::delete('public/images/icon_keunggulan/' . $keunggulan->icon_keunggulan);
            $keunggulan->delete();
            return redirect('/dashboard/keunggulan')->with('success', 'keunggulan telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/keunggulan')->with('error', 'keunggulan belum berhasil dihapus');
        }
    }
}
