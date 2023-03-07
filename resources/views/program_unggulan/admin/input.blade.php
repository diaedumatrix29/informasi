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
            action="{{ url('/input-data-program-unggulan-form') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Program Unggulan</label>
                <input name="program_unggulan" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input name="link" class="form-control" required=""></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/program-unggulan" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>
