<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ButtonWA;

class ButtonWAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $button_wa = ButtonWA::all();
        return view('button_wa.admin.dashboard', compact('button_wa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('button_wa.admin.input');
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
            $button_wa = new ButtonWA();
            $button_wa->nama_cs = $request->nama_cs;
            $button_wa->nomor_hp = $request->nomor_cs;
            $button_wa->save();
            return redirect('/button-wa/input-data-button-wa')->with('success', 'Button WA telah ditambahkan');
        } catch(\Exception $e) {
            return redirect('/button-wa/input-data-button-wa')->with('error', 'Button WA gagal ditambahkan');
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
        $data= ButtonWA::where('nama_cs', $name)->first();
        return view('button_wa.admin.edit', compact('data'));
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
            $button_wa= ButtonWA::find($request->id);
            $button_wa->nama_cs = $request->nama_cs;
            $button_wa->nomor_hp = $request->nomor_hp;
            $button_wa->save();
            return redirect('/dashboard/button-wa')->with('success', 'Button WA berhasil diperbarui');
        } catch(\Exception $e) {
            return redirect('/dashboard/button-wa')->with('error', 'Button WA gagal diperbarui');
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
            $button_wa = ButtonWA::find($id);
            $button_wa->delete();
            return redirect('/dashboard/button-wa')->with('success', 'Button WA berhasil dihapus');
        } catch(\Exception $e) {
            return redirect('/dashboard/button-wa')->with('error', 'Button WA gagal dihapus');
        }
    }
}
