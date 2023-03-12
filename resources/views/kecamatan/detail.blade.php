@extends('layouts.app')
@section('link_script')
    @foreach ($google_analytics as $item)
    <script async src="{{$item->src ?? ''}}"></script>
    @endforeach
@endsection
@include('layouts.nav')

<style>
    h1 {
        line-height: 1em;
    }

</style>
<br>
<div class="main">
    @include('button_wa.detail')
    <div class="container mt-4">
        @include('layouts.slider')
        <br>
        <h1 class="text-center">Guru Les Privat di {{ $data->nama_kecamatan }},
            <br>TK, SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
            <br>
            <div class="">
                {!! $data->deskripsi !!}
            </div>
    </div>
</div>

<div class="container">
    <div class="col-12">
        <h4 class=""><b>Lihat kecamatan lain</b></h4>
        <div class="row mt-1">
            @foreach($data_kota->kecamatannya as $kec)
                <div class="col-lg-3 col-md-4 col-6 mt-2">
                    <a href="{{ URL::to('/') }}/kota/{{$kec->kotanya->nama_kota}}/{{$kec->nama_kecamatan}}"
                        class="text-dark text-decoration-none">{{ $kec->nama_kecamatan }}</a>
                </div>
            @endforeach
        </div>
       
    </div>
    @extends('layouts.footer')
</div>
@include('layouts.kelas_tingkatan_kota')
@include('layouts.keunggulan')
@include('asal_sekolah_siswa.detail')
@include('testimoni_teks.detail')
@include('faq.detail')
@include('diskon.detail')