@include('layouts.app')
@include('layouts.nav')

<style>
  h1 {
    line-height: 1em;
  }
</style>

<br>
<div class="main">
    <div class="container mt-2">
        <h1 class="text-center">Les Privat {{$data->mata_pelajaran}} untuk
        <br>SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
        <div class="container">
          {!! $data->deskripsi !!}
        </div>
        @include('layouts.kelas_tingkatan_kota')

    </div>


    @include('layouts.footer')
</div>


