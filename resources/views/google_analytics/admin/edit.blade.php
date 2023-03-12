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
            action="{{ url('update-data-google-analitycs-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Src</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="src" class="form-control" value="{{ $data->src }}" required=""></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/google-analitycs" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'jawaban' );
</script>