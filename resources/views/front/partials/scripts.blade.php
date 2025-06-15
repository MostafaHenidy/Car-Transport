<!-- Bootstrap JS (use only one version, keep the latest bundle version) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="{{ asset('assets-front') }}/js/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AOS Initialization: Safe for Modals -->
<script>
    AOS.init({
        duration: 800,
        disable: function() {
            return document.querySelector('.modal.show') !== null;
        }
    });

    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function() {
            AOS.refreshHard();
        });
    });
</script>

<!-- Navbar Scroll Behavior -->
<script>
    let scrollpos = window.scrollY;
    const header = document.querySelector(".navbar");
    const header_height = header.offsetHeight;

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm");
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm");

    window.addEventListener('scroll', function() {
        scrollpos = window.scrollY;

        if (scrollpos >= header_height) {
            add_class_on_scroll();
        } else {
            remove_class_on_scroll();
        }
    });
</script>

<!-- Alert Auto Hide -->
<script type="text/javascript">
    setTimeout(function() {
        var div = document.getElementById('alertMessage');
        if (div) {
            div.style.display = "none";
        }
    }, 5000);
</script>

{{-- Auto reload the modal --}}
<script>
    $(document).ready(function() {
        $('#clearAll').on('click', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('front.notifications.clearAll') }}",
                success: function(response) {
                    // Fade out each notification card
                    $('.notification-card').each(function(index, element) {
                        $(element).fadeOut(400, function() {
                            $(this).remove();
                        });
                    });

                    // Change the bell icon
                    $('#notificationsIcon').html(`<i class="bi bi-bell"></i>`);
                },
                error: function() {
                    alert("Failed to clear notifications.");
                }
            });
        });
    });
</script>
{{-- mark the notifications as read in the navbar modal --}}
<script>
    $(document).on('click', '.single-read-btn', function(e) {
        e.preventDefault();

        let button = $(this);
        let notificationId = button.data('id');
        let card = button.closest('.notification-card');

        $.ajax({
            type: 'GET',
            url: '{{ route('front.notifications.markAsRead', ':id') }}'.replace(':id', notificationId),
            success: function(response) {
                card.css('background-color',
                    'transparent');
                button.html('<i class="bi bi-check-all"></i>');
            },
            error: function() {
                alert('Could not mark as read.');
            }
        });
    });
</script>
{{-- carousel changing in the front page --}}
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>
{{-- Progress bar increament in the support page --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subjectList = document.getElementById('subjectList');
        const messageBox = document.getElementById('messageBox');
        const progressBar = document.getElementById('progressBar');

        function updateProgress() {
            let progress = 25;

            if (subjectList.value !== '') {
                progress = 50;
            }

            if (subjectList.value !== '' && messageBox.value.trim() !== '') {
                progress = 100;
            }

            progressBar.style.width = progress + '%';
            progressBar.innerText = progress === 100 ? 'Complete' : 'Describe a problem';
        }

        subjectList.addEventListener('change', updateProgress);
        messageBox.addEventListener('input', updateProgress);
    });
</script>
