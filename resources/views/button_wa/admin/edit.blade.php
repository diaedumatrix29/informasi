@include('layouts.app')

<br>
<br>
<div class="container">
    <div class="row justify-content-center">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form name="add-post-form" id="add-post-form" method="post"
            action="{{ url('/update-data-button-wa-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <label for="">Nama CS</label>
                <input name="nama_cs" class="form-control" value="{{ $data->nama_cs }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Nomor CS</label>
                <input name="nomor_hp" class="form-control" value="{{ $data->nomor_hp }}" required=""></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/button-wa" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'isi_keunggulan' );
</script>