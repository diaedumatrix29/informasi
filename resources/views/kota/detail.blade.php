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
            <div class="container">
                <h4 class=""><b>Lihat kecamatan lain</b></h4>
                <div class="row mt-1">
                    @foreach($data->kecamatannya as $kecamatan)
                        <div class="col-lg-3 col-md-4 col-6 mt-2">
                            <a href="{{ URL::to('/') }}/kota/{{$kecamatan->kotanya->slug}}/{{$kecamatan->slug}}"
                                class="text-dark text-decoration-none">{{ $kecamatan->nama_kecamatan }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('layouts.kelas_tingkatan_kota')
            @include('layouts.keunggulan')
            @include('asal_sekolah_siswa.detail')
            @include('testimoni_teks.detail')
            @include('faq.detail')
            @include('diskon.detail')
        @extends('layouts.footer')

    </div>
</div>

@include('button_wa.detail')

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>