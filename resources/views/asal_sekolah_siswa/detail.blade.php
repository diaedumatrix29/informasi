<div class="container">
    <div class="row">
        @foreach ($asal_sekolah_siswa as $sekolah)
        <div class="col-lg-3 col-6">
            <img class="img-thumbnail rounded-circle" width="75" height="75" src="{{ asset('storage/images/asal-sekolah-siswa/' .$sekolah->foto_sekolah) }}">
        </div>
        @endforeach
    </div>
</div>