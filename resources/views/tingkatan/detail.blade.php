@include('layouts.app')
@include('layouts.nav')

<style>
    h1 {
        line-height: 1em;
    }

    .image-landing {
        /* margin: -100px; */
        width: 100%;
        height: 50%;
    }

</style>

<br>
<div class="main">
    <br>
    <div class="container mt-3">
        <img src="{{ asset('storage/images/tingkatan/' .$data->home_image) }}"
            class="image-landing" width="">
        <h1 class="text-center">Les Privat {{ $data->tingkatan }}
            <br>di Jakarta, Bogor, Depok, Tangerang, Tangsel, Bekasi
            <br>& Les Privat Online kota besar di Indonesia</h1>
            <div class="container">
                {!! $data->deskripsi !!}
            </div>

            @include('layouts.kelas_tingkatan_kota')
    </div>
</div>
@include('layouts.footer')