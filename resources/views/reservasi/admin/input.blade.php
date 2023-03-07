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
            action="{{ url('input-data-reservasi-form') }}">
            @csrf
            <div class="form-group">
                <label for="">Nama Reservasi</label>
                <input name="nama_reservasi" class="form-control" required=""></input>
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input name="no_hp" class="form-control"></input>
            </div>
            <div class="form-group">
                <label for="">No WA</label>
                <input name="no_wa" class="form-control"></input>
            </div>
            <div class="form-group">
                <label for="">Link</label>
                <input name="link" class="form-control"></input>
            </div>
            <a href="{{ URL::to('/') }}/dashboard/reservasi" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
        </form>
    </div>
</div>
