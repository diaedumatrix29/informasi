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
            action="{{ url('/update-data-diskon-form') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <label for="exampleInputEmail1">Link</label>
                <input name="link" class="form-control" required="" value="{{$data->link}}"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Foto diskon</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control">
            </div>
            <a href="{{ URL::to('/') }}/dashboard/diskon" class="btn btn-danger mt-3"
                style="float: left;">Kembali</a>
            <button type="submit" class="btn btn-primary mt-3" style="float: right;">Update</button>
        </form>
    </div>
</div>