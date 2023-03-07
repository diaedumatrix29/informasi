<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\ProgramUnggulan;

class ReservasiController extends Controller
{
    function create()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('reservasi.admin.input', compact('program_unggulan', 'reservasi'));
    }
    function store(Request $request)
    {
        try {
            $reservasi = new Reservasi;
            $reservasi->nama_reservasi = $request->nama_reservasi;
            $reservasi->no_hp = $request->no_hp;
            $reservasi->no_wa = $request->no_wa;
            $reservasi->link = $request->link;
            $reservasi->save();
            return redirect('/dashboard/reservasi')->with('success', 'Reservasi telah ditambahkan');
        }  catch (\Exception $e) {
            return redirect('/dashboard/reservasi')->with('error', 'Reservasi gagal ditambahkan');
        }
    }
    function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $data= Reservasi::where('nama_reservasi', $name)->first();
        $reservasi = Reservasi::all();
        return view('reservasi.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_reservasi' => 'required',
            ]);
            $reservasi = Reservasi::find($request->id);
            $reservasi->nama_reservasi = $request->nama_reservasi;
            $reservasi->no_hp = $request->no_hp;
            $reservasi->no_wa = $request->no_wa;
            $reservasi->link = $request->link;
            $reservasi->save();
            return redirect('/dashboard/reservasi')->with('success','Reservasi berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/reservasi')->with('error', 'Reservasi gagal diperbarui');
          }
    }
    public function destroy($id)
    {
        try {
            $reservasi = Reservasi::find($id);
            $reservasi->delete();
            return redirect('/dashboard/reservasi')->with('success', 'Reservasi telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/reservasi')->with('error', 'Reservasi belum berhasil dihapus');
        }
    }
    public function index() {
        $reservasi = Reservasi::all();
        $program_unggulan = ProgramUnggulan::all();
        return view('reservasi.admin.dashboard', compact('reservasi', 'program_unggulan'));
    }
}
