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
            action="{{ url('update-data-program-unggulan-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Program Unggulan</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="nama_program" class="form-control" value="{{ $data->nama_program }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input name="link" class="form-control" value="{{ $data->link }}" required=""></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/program-unggulan" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>