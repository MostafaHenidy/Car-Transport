{{-- <script src="{{ asset('assets-front') }}/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{ asset('assets-front') }}/js/aos.js"></script>
<script>
    AOS.init({
        duration: 800, // values from 0 to 3000, with step 50ms
    });
</script>
<script>
    let scrollpos = window.scrollY
    const header = document.querySelector(".navbar")
    const header_height = header.offsetHeight

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

    window.addEventListener('scroll', function() {
        scrollpos = window.scrollY;

        if (scrollpos >= header_height) {
            add_class_on_scroll()
        } else {
            remove_class_on_scroll()
        }

        console.log(scrollpos)
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<!-- jQuery + Owl Carousel JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
