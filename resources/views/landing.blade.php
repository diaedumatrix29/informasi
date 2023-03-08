@include('layouts.app')
@include('layouts.nav')

<style>
    .card {
        display: flex;
    }

    .judul_testimoni {
        font-weight: 600;
        font-size: 23px;
    }

    .div-image-home-page {
        margin-top: 20px;
    }

    .promosi-home-page {
        background-color: #fff;
    }

    .landing-page-awal {
        margin-bottom: 30px;
    }
    @media(min-width: 992px) {
        .image-home-page {
        position: absolute;
        right: 0;
        bottom: 14%;
        }

        .p-judul {
            font-size: 25px;
        }

        .judul-home-page {
            width: 65%;
        }

        .promosi-home-page {
            background-color: #DBECF4;
        }

        .promosi-container {
            margin-top: -35px;
            z-index: 99;
        }

        .landing-page-awal {
            margin-bottom: 150px;
        }
    }
    .mySlides {
        display: none;
    }
    .mySlides2 {
        display: none;
    }
</style>

<br>
<div class="main">
    <div class="color-official py-5 position-relative" style="margin-top: -20px;">
        <div class="landing-page-awal container">
            <div class="d-lg-flex d-block pb-5">
                <div class="judul-home-page">
                    <h1 class=" text-white text-left">Bimbel Masuk Kedokteran,
                        PTN & Kedinasan 2023</h1>
                    <br>
                    <p class="p-judul text-white text-left">Semua guru privat kami sudah terverifikasi dan diseleksi
                        secara ketat oleh HRD Berpengalaman.
                        Kamu Mau cari guru privat apa?</p>

                    <li class="btn btn-light nav-item dropdown">
                        <a class="nav-link text-dark dropdown" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Reservasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($reservasi as $r)
                                @if($r->link != null)
                                    <li class="ps-3 text-left">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ $r->link }}">{{ $r->nama_reservasi }}</a>
                                    </li>
                                @endif
                                @if($r->no_hp != null)
                                    <li class="ps-3 text-left">
                                        <a class="text-decoration-none text-dark"
                                            href="tel:{{ $r->no_hp }}">{{ $r->nama_reservasi }}</a>
                                    </li>
                                @endif
                                @if($r->no_wa != null)
                                    <li class="ps-3 text-left">
                                        <a class="text-decoration-none text-dark"
                                            href="https://wa.me/{{ $r->no_wa }}?text=Halo admin Edumatrix Indonesia saya ingin reservasi paket di Edumatrix">{{ $r->nama_reservasi }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </div>
                <div class="div-image-home-page">
                    <img class="image-home-page rounded-start img-fluid" width="350" height="330"
                        src="{{ asset('image/image-landing-page.jpg') }}"
                        alt="image-landing-page" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: -35px; z-index: 99;" class="row position-relative p-3 rounded promosi-home-page">
            @foreach ($promosi_home_page as $promosi)
                <div class="col-lg-4 col-12">
                    <img width="50" class="d-block m-auto mb-2" src="{{ asset('storage/images/icon_promosi_home_page/' .$promosi->foto_icon) }}" />
                    <h5 class="col text-center mx-5"><strong>{{$promosi->judul_promosi}}</strong></h5>
                    <p class="text-center">{{$promosi->isi_promosi}}</p>
                </div>
            @endforeach
        </div>
        <div class="w3-content mt-4 w3-display-container">
            @foreach($diskon as $disc)
                <img class="mySlides" src="{{ asset('storage/images/diskon/' . $disc->foto_diskon) }}" style="width:100%"
                    alt="image">
            @endforeach
        </div>
        <br>
        <br>
        @include('deskripsi.detail')
        <br>
        @include('layouts.kelas_tingkatan_kota')
        <h4 class="mt-3">Asal Sekolah Siswa</h4>
        @include('asal_sekolah_siswa.detail')
        @include('testimoni_teks.detail')
        @include('faq.detail')

        <div class="w3-content mt-4 w3-display-container">
            @foreach($diskon as $disc)
                <img class="mySlides2" src="{{ asset('storage/images/diskon/' . $disc->foto_diskon) }}" style="width:100%"
                    alt="image">
            @endforeach
        </div>


        @extends('layouts.footer')
    </div>
</div>
<br>
<br>



<script>
    var myIndex = 0;
    carousel();
    var myIndex2 = 0;
    carousel2();

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
    function carousel2() {
        var i;
        var x = document.getElementsByClassName("mySlides2");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex2++;
        if (myIndex2 > x.length) {
            myIndex2 = 1
        }
        x[myIndex2 - 1].style.display = "block";
        setTimeout(carousel2, 2000); // Change image every 2 seconds
    }

</script>
