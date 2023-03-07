<style>
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

<div class="container">
    <h4 class="">Kelas</h4>
    <div class="row">
        @foreach($kelas as $k)
            <p class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/kelas/{{ $k->tingkatan }}"
                    class="text-dark text-decoration-none">{{ $k->tingkatan }}</a>
            </p>
        @endforeach
    </div>
    <h4 class="">Mata Pelajaran</h4>
    <div class="row mt-1">
        @foreach($mapel as $m)
            <p class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/mata-pelajaran/{{ $m->mata_pelajaran }}"
                    class="text-dark text-decoration-none">{{ $m->mata_pelajaran }}</a>
            </p>
        @endforeach
    </div>
    <h4 class="">Kota</h4>
    <div class="row mt-1">
        @foreach($kota as $k)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/kota/{{ $k->nama_kota }}"
                    class="text-dark text-decoration-none">{{ $k->nama_kota }}</a>
            </div>
        @endforeach
    </div>
</div>
<br>
