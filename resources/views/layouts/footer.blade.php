<footer class="color-official">
    <div class="container pt-4 ps-5">
        <div class="parent-card d-block d-lg-flex justify-content-between" style="margin-left: -30px">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4 class="text-white">Program Unggulan</h4>
                @foreach($program_unggulan as $program)
                    <p>
                        <a class="text-decoration-none text-white" href="{{ $program->link }}">-
                            {{ $program->nama_program }}</a>
                    </p>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                @foreach($office as $o)
                    <div>
                        <h4 class="text-white">{{ $o->judul_office }}</h4>
                        <p class="isi_office">{!! $o->isi_office !!}</p>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4 class="text-white">Reservasi</h4>
                @foreach($reservasi as $r)
                    <div class="d-block py-2">
                        @if($r->link != null)
                            <button class="btn btn-light text-left">
                                <a class="text-decoration-none text-dark"
                                    href="{{ $r->link }}">{{ $r->nama_reservasi }}</a>
                            </button>
                        @endif
                        @if($r->no_hp != null)
                            <button class="btn btn-light text-left">
                                <a class="text-decoration-none text-dark"
                                    href="{{ $r->no_hp }}">{{ $r->nama_reservasi }}</a>
                            </button>
                        @endif
                        @if($r->no_wa != null)
                            <button class="btn btn-light text-left">
                                <a class="text-decoration-none text-dark"
                                    href="https://wa.me/{{ $r->no_wa }}?text=Halo admin Edumatrix Indonesia saya ingin reservasi paket di Edumatrix">{{ $r->nama_reservasi }}</a>
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br>
</footer>


<script>
    CKEDITOR.config.allowedContent = true;
    config.contentsCss = '/css/custom.css';
    CKEDITOR.replace( 'isi_office' );
</script>