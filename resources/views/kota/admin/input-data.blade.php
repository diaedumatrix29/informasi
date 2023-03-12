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
            action="{{ url('input-data-kota-form') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input name="title" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="meta_description" class="form-control" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="">Script JS</label>
                <textarea name="script_js" class="form-control"required=""></textarea>
            </div>
            <div class="form-group">
                <label for="">Nama Kota</label>
                <input name="nama_kota" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto Kota</label>
                <input type="file" name="file[]" id="file" accept="image/*" class="form-control" multiple>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/kota" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>