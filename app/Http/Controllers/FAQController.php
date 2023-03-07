<?php

namespace App\Http\Controllers;

use App\Kota;
use App\Tingkatan;
use App\MataPelajaran;
use App\ProgramUnggulan;
use App\Reservasi;
use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_unggulan = ProgramUnggulan::all();
        $FAQ = FAQ::all();
        $reservasi = Reservasi::all();
        return view('FAQ.admin.dashboard', compact('reservasi', 'program_unggulan', 'FAQ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        return view('FAQ.admin.input', compact('reservasi', 'program_unggulan'));
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
            $FAQ = new FAQ;
            $FAQ->pertanyaan = $request->pertanyaan;
            $FAQ->jawaban = $request->jawaban;
            $FAQ->save();
            return redirect('FAQ/input-data-faq')->with('success', 'FAQ telah ditambahkan'); 
        } catch (\Exception $e) {
            return redirect('FAQ/input-data-faq')->with('success', 'FAQ telah ditambahkan'); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $reservasi = Reservasi::all();
        $data= FAQ::where('pertanyaan', $name)->first();
        return view('faq.detail', compact('kota', 'data', 'kelas', 'mapel', 'program_unggulan', 'reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $program_unggulan = ProgramUnggulan::all();
        $data= FAQ::where('pertanyaan', $name)->first();
        $reservasi = Reservasi::all();
        return view('FAQ.admin.edit', compact('data', 'program_unggulan', 'reservasi'));
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
            $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ]);
            $FAQ = FAQ::find($request->id);
            $FAQ->pertanyaan = $request->pertanyaan;
            $FAQ->jawaban = $request->jawaban;
            $FAQ->save();
            return redirect('/dashboard/FAQ')->with('success','FAQ berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/FAQ')->with('error', 'FAQ belum berhasil diperbarui');
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
            $FAQ = FAQ::find($id);
            $FAQ->delete();
            return redirect('/dashboard/FAQ')->with('success', 'FAQ telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/FAQ')->with('error', 'FAQ belum berhasil dihapus');
        }
    }
}
