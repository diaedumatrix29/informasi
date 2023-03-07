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
            action="{{ url('/input-data-office-form') }}">
            @csrf
            <div class="form-group">
                <label for="">Judul Office</label>
                <input name="judul_office" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Isi Office</label>
                <textarea name="isi_office" required=""></textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/office" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'isi_office' );
</script>