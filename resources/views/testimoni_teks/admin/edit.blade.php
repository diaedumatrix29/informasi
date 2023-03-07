@include('layouts.app')

<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form name="add-post-form" id="add-post-form" method="post" enctype="multipart/form-data" 
        action="{{ url('/update-data-testimoni-teks-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <label for="">Nama Pengguna</label>
                <input name="nama_pengguna" class="form-control" value="{{$data->nama_pengguna}}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Judul Testimoni</label>
                <input name="judul_testimoni" class="form-control" value="{{$data->judul_testimoni}}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Isi Testimoni</label>
                <textarea name="isi_testimoni" class="form-control" value="{{$data->isi_testimoni}}" required="">{{$data->isi_testimoni}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Upload Profile</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control">
            </div>
            <a href="{{ URL::to('/') }}/dashboard/testimoni-teks" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'isi_testimoni' );
</script>