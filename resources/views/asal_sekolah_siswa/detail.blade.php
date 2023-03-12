<div class="container">
    <h4 class="mt-3 mb-4"><b>Asal Sekolah Siswa</b> </h4>
    <div class="row">
        @foreach ($asal_sekolah_siswa as $sekolah)
        <div class="col-lg-3 col-6">
            <img class="img-thumbnail" width="" height="" src="{{ asset('storage/images/asal-sekolah-siswa/' .$sekolah->foto_sekolah) }}">
        </div>
        @endforeach
    </div>
</div>