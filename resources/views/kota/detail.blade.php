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
    <div class="container mt-4">
        @include('layouts.slider')
        <h1 class="text-center">Guru Les Privat di {{ $data->nama_kota }},
            <br>TK, SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
            <div class="container">
                {!! $data->deskripsi !!}
            </div>
            {{-- <div class="container">
                <h4 class="">Lihat kecamatan lain</h4>
                <div class="row mt-1">
                    @foreach($data->kecamatannya as $kecamatan)
                        <div class="col-lg-3 col-md-4 col-6 mt-2">
                            <a href="{{ URL::to('/') }}/kota/{{$kecamatan->kotanya->nama_kota}}/{{$kecamatan->nama_kecamatan}}"
                                class="text-dark text-decoration-none">{{ $kecamatan->nama_kecamatan }}</a>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            @include('layouts.kelas_tingkatan_kota')
        @extends('layouts.footer')

    </div>
</div>