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
        <form name="add-post-form" id="add-post-form" method="post"
            action="{{ url('/input-data-testimoni-teks-form') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pengguna</label>
                <input name="nama_pengguna" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Testimoni</label>
                <input name="judul_testimoni" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Isi Testimoni</label>
                <textarea name="isi_testimoni" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Upload Profile</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control">
            </div>
            <a href="{{ URL::to('/') }}/dashboard/testimoni-teks" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>


<script>
        CKEDITOR.replace( 'isi_testimoni' );
</script>