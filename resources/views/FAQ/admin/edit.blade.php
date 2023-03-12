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
            action="{{ url('update-data-faq-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Pertanyaan</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="pertanyaan" class="form-control" value="{{ $data->pertanyaan }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="">Jawaban</label>
                <textarea name="jawaban" class="form-control" value="{{ $data->jawaban }}" required="" rows="7" cols="50" maxlength="1000">{{ $data->jawaban }}</textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/kota" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'jawaban' );
</script>