<style>
    .slider {
        display: none;
    }
</style>

<div class="w3-content mt-4 mb-4 w3-display container">
    @foreach($diskon as $disc)
        <img class="slider" src="{{ asset('storage/images/diskon/' . $disc->foto_diskon) }}" style="width:100%"
            alt="image">
    @endforeach
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("slider");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>