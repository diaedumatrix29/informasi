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
            action="{{ url('update-data-office-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <label for="">Judul Office</label>
                <input name="judul_office" class="form-control" required="" value="{{$data->judul_office}}"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Isi Office</label>
                <textarea name="isi_office" required="" value="{{$data->isi_office}}">{{$data->isi_office}}</textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/office" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'isi_office' );
</script>