<style>
    .mySlides {
        display: none;
    }
</style>

<div class="w3-content w3-display-container">
    @foreach($foto as $f)
        <img class="mySlides" src="{{ asset('storage/' . $f) }}" style="width:100%"
            alt="image">
    @endforeach
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
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
