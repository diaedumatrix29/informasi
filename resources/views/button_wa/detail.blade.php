<style>
    .button_wa {
        bottom: 5%;
        right: 5%;
        z-index: 1000;
    }
    .button_wa img:hover {
        cursor: pointer;
    }
    .list-wa {
        display: none;
    }
    .list-wa.active {
        display: block;
        z-index: 1000;
        bottom: 15%;
        right: 5%;
    }
</style>

<div class="position-fixed button_wa">
    <img class="rounded" width="65" height="65" 
    src="{{ asset('image/button_wa.png') }}"
    alt="telepon" />
</div>

<div class="position-fixed bg-light p-3 rounded list-wa">
    @foreach ($button_wa as $wa)
        <div class="d-flex" style="">
            <p class="">{{$wa->nama_cs}}</p>
            <a href="https://wa.me/{{$wa->nomor_hp}}"><img class="" width="40" height="40" 
                src="{{ asset('image/button_wa.png') }}"
                alt="telepon" /> </a>
            <a href="tel:{{$wa->nomor_hp}}"><img class="" width="40" height="40" 
                src="{{ asset('image/icon_telepon.png') }}"
                alt="telepon" /> </a>
        </div>
    @endforeach
</div>


<script>
    document.querySelector('.button_wa').addEventListener("click", () => {
        document.querySelector('.list-wa').classList.toggle('active');
    });
</script>