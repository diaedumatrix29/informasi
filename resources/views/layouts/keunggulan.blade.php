<div class="container">
    <h4 class=""><b>Keunggulan</b></h4>
    @foreach($keunggulan as $unggul)
        <div class="d-flex">
            <img src="{{ asset('storage/images/icon_keunggulan/'.$unggul->icon_keunggulan) }}"
                class="rounded-circle d-block m-auto" height="50" width="50">
            <div class="ms-4">
                <p class=""><b>{{ $unggul->judul_keunggulan }}</b></p>
                <div>{!! $unggul->isi_keunggulan !!}</div>
            </div>
        </div>

    @endforeach
</div>
</div>
