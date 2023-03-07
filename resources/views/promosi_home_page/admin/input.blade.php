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
            action="{{ url('/input-data-promosi-home-page-form') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Promosi</label>
                <input name="judul_promosi" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Isi Promosi</label>
                <input name="isi_promosi" class="form-control" required=""></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/promosi-home-page" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>
