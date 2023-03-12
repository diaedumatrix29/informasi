<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\Tingkatan;
use App\MataPelajaran;
use App\ProgramUnggulan;
use App\Reservasi;
use App\FAQ;
use App\TestimoniTeks;
use App\Office;
use App\Kecamatan;
use App\Deskripsi;
use App\AsalSekolahSiswa;
use App\Diskon;
use App\PromosiHomePage;
use App\Keunggulan;
use App\ButtonWA;

class LandingController extends Controller
{
    public function index()
    {
        $kota = Kota::all();
        $kelas = Tingkatan::all();
        $mapel = MataPelajaran::all();
        $program_unggulan = ProgramUnggulan::all();
        $FAQ = FAQ::all();
        $reservasi = Reservasi::all();
        $testimoni_teks = TestimoniTeks::all();
        $office = Office::all();
        $kecamatan = Kecamatan::all();
        $deskripsi = Deskripsi::all();
        $asal_sekolah_siswa = AsalSekolahSiswa::all();
        $diskon = Diskon::all();
        $promosi_home_page = PromosiHomePage::all();
        $keunggulan = Keunggulan::all();
        $button_wa = ButtonWA::all();
        return view('landing', compact('button_wa', 'keunggulan', 'promosi_home_page', 'diskon', 'asal_sekolah_siswa', 'deskripsi', 'kecamatan', 'office', 'testimoni_teks', 'reservasi', 'kota', 'kelas', 'mapel', 'program_unggulan', 'FAQ', ));
    }
}
