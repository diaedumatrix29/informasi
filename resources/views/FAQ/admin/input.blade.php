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
            action="{{ url('input-data-faq-form') }}">
            @csrf
            <div class="form-group">
                <label>Pertanyaan</label>
                <input name="pertanyaan" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label>Jawaban</label>
                <textarea name="jawaban" class="form-control" required="" rows="7" cols="50" maxlength="1000"></textarea>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/FAQ" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace( 'jawaban' );
</script>