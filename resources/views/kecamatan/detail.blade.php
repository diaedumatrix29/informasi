@include('layouts.app')
@include('layouts.nav')

<style>
    h1 {
        line-height: 1em;
    }

    .parent-link {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }

    .link {
        flex: 1 0 22%;
        /* explanation below */
        margin: 1%;
        height: 15px;
    }

</style>
<br>
<div class="main">
    <div class="container mt-5">
        @include('layouts.slider')

        <h1 class="text-center">Guru Les Privat di {{ $data->nama_kecamatan }},
            <br>TK, SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
            <div>
                {!! $data->deskripsi !!}
            </div>
    </div>
</div>
<div class="container">
    <div class="col-12 mt-4">
        <h4 class="">Lihat kecamatan lain</h4>
        <div class="row mt-1">
            @foreach($data_kota->kecamatannya as $kec)
                <div class="col-lg-3 col-md-4 col-6 mt-2">
                    <a href="{{ URL::to('/') }}/kota/"
                        class="text-dark text-decoration-none">{{ $kec->nama_kecamatan }}</a>
                </div>
            @endforeach
        </div>
    </div>
    @extends('layouts.footer')
</div>

@extends('layouts.kelas_tingkatan_kota')