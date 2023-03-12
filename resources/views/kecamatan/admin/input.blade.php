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
            action="{{ url('input-data-kecamatan-form') }}" enctype="multipart/form-data">
            @csrf
            <select class="form-select" name="kota_id" aria-label="Default select example">
                <option selected>Pilih kota</option>
                @foreach($kota as $k)
                    <option value="{{$k->id}}">{{ $k->nama_kota }}</option>
                    @endforeach
                </select>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kecamatan</label>
                <input name="nama_kecamatan" class="form-control" required=""></input>
            </div>
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
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Foto Kecamatan</label>
                <input type="file" name="file[]" id="file" accept="image/*" class="form-control" multiple>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/kecamatan" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>