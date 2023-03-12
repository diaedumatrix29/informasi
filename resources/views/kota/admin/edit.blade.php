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
            action="{{ url('update-data-kota-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama Kota</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="nama_kota" class="form-control" value="{{ $data->nama_kota }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input name="title" class="form-control" value="{{ $data->title }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" value="{{ $data->meta_description }}" required="">{{ $data->meta_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Script JS</label>
                <textarea name="script_js" class="form-control"required="">{{ $data->script_js }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required="">{{$data->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Foto Kota</label>
                <input type="file" name="file[]" id="file" accept="image/*" class="form-control" multiple>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/kota" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>