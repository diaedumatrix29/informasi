@include('layouts.app')

<style>
    h1 {
        line-height: 1em;
    }

</style>

<br>
<div class="main">
    <div class="container">
        <form name="update-post-form" id="update-post-form" method="post"
            action="{{ url('update-data-promosi-home-page-form') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Promosi</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="judul_promosi" class="form-control" value="{{ $data->judul_promosi }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Isi Promosi</label>
                <input name="isi_promosi" class="form-control" value="{{ $data->isi_promosi }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Upload Foto</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control">
            </div>
            <a href="{{ URL::to('/') }}/dashboard/promosi-home-page" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>
