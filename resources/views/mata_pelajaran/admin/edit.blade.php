@include('layouts.app')

<style>
    h1 {
        line-height: 1em;
    }

</style>

<br>
<div class="main">
    <div class="container">
        <form name="update-post-form" id="update-post-form" method="put"
            action="{{ url('update-data-mapel-form') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mata Pelajaran</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="mata_pelajaran" class="form-control" value="{{ $data->mata_pelajaran }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required="">{{$data->deskripsi}}</textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/mapel" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>