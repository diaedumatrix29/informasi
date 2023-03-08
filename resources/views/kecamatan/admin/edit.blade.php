@include('layouts.app')

<style>
    h1 {
        line-height: 1em;
    }

</style>

<br>
<div class="main">
    <div class="container">
        <form name="update-post-form" id="update-post-form" method="post" enctype="multipart/form-data" 
            action="{{ url('update-data-kecamatan-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kecamatan</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="nama_kecamatan" class="form-control" value="{{ $data->nama_kecamatan }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required="">{{$data->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Foto Kecamatan</label>
                <input type="file" name="file[]" id="file" accept="image/*" class="form-control" multiple>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/kecamatan" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>