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
{{-- Progress bar increament in the support page --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subjectSelect = document.getElementById('subject');
        const messageTextarea = document.getElementById('message');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');

        function updateProgress() {
            let progress = 25; // Default starting at 25%
            let text = "Login";
            let color = "#6c757d"; // Gray

            if (subjectSelect.value !== '') {
                progress = 50;
                text = "Describe your problem";
                color = "#ffc107"; // Yellow
            }

            if (subjectSelect.value !== '' && messageTextarea.value.trim() !== '') {
                progress = 100;
                text = "Complete";
                color = "#28a745"; // Green
            }

            progressBar.style.width = progress + '%';
            progressBar.style.backgroundColor = color;
            progressBar.setAttribute('aria-valuenow', progress);
            progressText.textContent = text;
        }

        // Initial update
        updateProgress();

        // Event listeners
        subjectSelect.addEventListener('change', updateProgress);
        messageTextarea.addEventListener('input', updateProgress);
    });
</script>
{{-- Reviews stars --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-icon');
        const ratingInput = document.getElementById('ratingValue');
        const ratingText = document.getElementById('ratingText');

        stars.forEach(star => {
            // Hover effect
            star.addEventListener('mouseover', function() {
                const value = parseInt(this.getAttribute('data-value'));
                highlightStars(value);
            });

            // Click to select rating
            star.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                ratingInput.value = value;
                updateRatingText(value);
                setActiveStars(value);
            });

            // Reset to selected rating when mouse leaves
            document.getElementById('starRating').addEventListener('mouseleave', function() {
                const currentRating = parseInt(ratingInput.value);
                setActiveStars(currentRating);
            });
        });

        function highlightStars(value) {
            stars.forEach(star => {
                const starValue = parseInt(star.getAttribute('data-value'));
                if (starValue <= value) {
                    star.classList.add('bi-star-fill');
                    star.classList.remove('bi-star');
                } else {
                    star.classList.add('bi-star');
                    star.classList.remove('bi-star-fill');
                }
            });
        }

        function setActiveStars(value) {
            stars.forEach(star => {
                const starValue = parseInt(star.getAttribute('data-value'));
                if (starValue <= value) {
                    star.classList.add('bi-star-fill');
                    star.classList.remove('bi-star');
                    star.classList.add('active');
                } else {
                    star.classList.add('bi-star');
                    star.classList.remove('bi-star-fill');
                    star.classList.remove('active');
                }
            });
        }

        function updateRatingText(value) {
            const ratings = {
                0: "Select rating",
                1: "Poor",
                2: "Fair",
                3: "Good",
                4: "Very Good",
                5: "Excellent"
            };
            ratingText.textContent = ratings[value];
        }
    });
</script>
