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
            action="{{ url('update-data-reservasi-form') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Reservasi</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input name="nama_reservasi" class="form-control" value="{{ $data->nama_reservasi }}" required=""></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No HP</label>
                <input name="no_hp" class="form-control" value="{{ $data->no_hp }}"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No WA</label>
                <input name="no_wa" class="form-control" value="{{ $data->no_wa }}"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input name="link" class="form-control" value="{{ $data->link }}"></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/mapel" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>