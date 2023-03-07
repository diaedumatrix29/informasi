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
            action="{{ url('/input-data-mapel-form') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mata Pelajaran</label>
                <input name="mata_pelajaran" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required=""></textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/mapel" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>