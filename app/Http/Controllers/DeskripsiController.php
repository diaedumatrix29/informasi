<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deskripsi;

class DeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deskripsi = Deskripsi::all();
        return view('deskripsi.admin.dashboard', compact('deskripsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deskripsi.admin.input');
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
            $deskripsi = new Deskripsi();
            $deskripsi->isi_deskripsi = $request->isi_deskripsi;
            $deskripsi->save();
            return redirect('dashboard/deskripsi')->with('status', 'Deskripsi berhasil ditambahkan');
        } catch (\Exception $e) {
              return redirect('dashboard/deskripsi')->with('error', 'Deskripsi gagal ditambahkan');
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
    public function edit($id)
    {
        $data = Deskripsi::find($id);
        return view('deskripsi.admin.edit', compact('data'));
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
            $deskripsi = Deskripsi::find($request->id);
            $deskripsi->isi_deskripsi = $request->isi_deskripsi;
            $deskripsi->save();
            return redirect('/dashboard/deskripsi')->with('success', 'Deskripsi berhasil di update');
        } catch(\Exception $e ) {
            return redirect('/dashboard/deskripsi')->with('error', 'Deskripsi gagal di update');
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
            $deskripsi = Deskripsi::find($id);
            $deskripsi->delete();
            return redirect('dashboard/deskripsi')->with('success', 'Deskripsi berhasil dihapus');
        }catch (\Exception $e) {
              return redirect('dashboard/deskripsi')->with('error', 'Deskripsi gagal dihapus');
        }

    }
}
