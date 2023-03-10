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
            action="{{ url('/update-data-deskripsi-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <label for="exampleInputEmail1">Isi Deskripsi</label>
                <textarea name="isi_deskripsi" required="">{{$data->isi_deskripsi}}</textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/deskripsi" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>


<script>
    CKEDITOR.replace('isi_deskripsi');

</script>
