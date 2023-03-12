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
    <h4 class="mt-4"><b>Kelas</b></h4>
    <div class="row mt-2 mb-3">
        @foreach($kelas as $k)
            <p class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/kelas/{{ $k->slug }}"
                    class="text-dark text-decoration-none">{{ $k->tingkatan }}</a>
            </p>
        @endforeach
    </div>
    <h4 class=""><b>Mata Pelajaran</b></h4>
    <div class="row mt-2 mb-3">
        @foreach($mapel as $m)
            <p class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/mata-pelajaran/{{ $m->slug }}"
                    class="text-dark text-decoration-none">{{ $m->mata_pelajaran }}</a>
            </p>
        @endforeach
    </div>
    <h4 class=""><b>Kota</b></h4>
    <div class="row mt-2 mb-3">
        @foreach($kota as $k)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="{{ URL::to('/') }}/kota/{{ $k->slug }}"
                    class="text-dark text-decoration-none">{{ $k->nama_kota }}</a>
            </div>
        @endforeach
    </div>
</div>
<br>
