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
    <div class="container mt-5">
        <h1 class="text-center">Les Privat {{$data->mata_pelajaran}} untuk
        <br>SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
        <div class="container">
          {!! $data->deskripsi !!}
        </div>
        @include('layouts.kelas_tingkatan_kota')
        @include('layouts.keunggulan')
        @include('asal_sekolah_siswa.detail')
        @include('testimoni_teks.detail')
        @include('faq.detail')
        @include('diskon.detail')
    </div>


    @include('layouts.footer')
</div>


