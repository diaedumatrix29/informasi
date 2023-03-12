<style>
    .accordion__question p {
        font-size: 20px;
    }

    .accordion:hover {
        cursor: pointer;
    }

    .accordion__answer {
        display: none;
    }

    .accordion.active .accordion__answer {
        display: block;
    }

    .rotate {
        transform: rotate(180deg);
    }
</style>
<div class="container">
    <div class="main">
        <br>
        <br>
        <h4 class="text-center"><b>FAQ</b></h4>
        <br>
        <div class="card_faq">
            <div class="layout">
                @foreach ($FAQ as $f_a_q)
                    <div class="accordion">
                        <div class="accordion__question">
                            <div class="d-flex justify-content-between">
                                <p>{{ $f_a_q->pertanyaan }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-2 bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                            </div>
                        </div>
                        <div class="accordion__answer">
                            {!! $f_a_q->jawaban !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    let jawaban = document.querySelectorAll(".accordion");
    jawaban.forEach((event) => {
        event.addEventListener("click", () => {
            if (event.classList.contains("active")) {
                event.classList.remove("active");
            } else {
                event.classList.add("active");
            }
        });
    });

</script>
