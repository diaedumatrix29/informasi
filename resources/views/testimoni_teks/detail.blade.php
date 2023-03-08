<style>
    .content {
        box-shadow: 1px 1px 12px #ccc;
    }
</style>

<div class="testimoni-teks">
    <h4>Kata #Mereka Tentang Belajar di Edumatrix Indonesia.</h4>
    @foreach($testimoni_teks as $testeks)
        <div class="content d-lg-flex border mt-3 p-3 rounded">
                <img src="{{ asset('storage/images/testimoni_teks/'.$testeks->profile_image) }}"
                    class="rounded-circle d-block m-auto" height="75" width="75">
                <div class="ms-3">
                    <p class="text-lg-start text-center judul_testimoni mb-0">{{ $testeks->judul_testimoni }}</p>
                    <p>{!! $testeks->isi_testimoni !!}</p>
                    <p class="text-lg-start text-center "><b>- {{ $testeks->nama_pengguna }} -</b></p>
                </div>
        </div>
    @endforeach
</div>