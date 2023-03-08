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

        <h1 class="text-center">Guru Les Privat di {{ $data->nama_kota }},
            <br>TK, SD, SMP, SMA, UTBK, SNBT, SIMAK UI & UMPTN</h1>
            <div class="container">
                {!! $data->deskripsi !!}
            </div>
            @include('layouts.kelas_tingkatan_kota')
        @extends('layouts.footer')

    </div>
</div>