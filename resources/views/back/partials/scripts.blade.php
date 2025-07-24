<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.single-approve-btn', function(e) {
        e.preventDefault();

        let button = $(this);
        let reviewId = button.data('id');
        let row = button.closest('tr');

        $.ajax({
            type: 'PATCH',
            url: '{{ route('admin.reviews.approveReview', ':id') }}'.replace(':id', reviewId),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                row.find('.review-card')
                    .removeClass('bg-danger')
                    .addClass('bg-success')
                    .text('Approved');
                button.html('<i class="bi bi-check-all"></i>');
            },
            error: function() {
                alert('Could not approve this review.');
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("mainContent");
        const icon = toggleBtn.querySelector("i");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("expanded");

            // Toggle icon direction
            icon.classList.toggle("bi-chevron-left");
            icon.classList.toggle("bi-chevron-right");

            // Toggle button position
            toggleBtn.style.left = sidebar.classList.contains("collapsed") ? "10px" : "260px";
        });
    });
</script>
<script>
    $(document).on('click', '.single-recover-btn', function(e) {
        e.preventDefault();

        let button = $(this);
        let userId = button.data('id');
        let row = button.closest('tr');

        $.ajax({
            type: 'PATCH',
            url: '{{ route('admin.users.recoverUserAccount', ':id') }}'.replace(':id', userId),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                button.html('<i class="bi bi-check-all"></i>');
                row.fadeOut();
            },
            error: function() {
                alert('Could not recover this account.');
            }
        });
    });
</script>
<script>
    $(document).on('click', '.agent-recover-btn', function(e) {
        e.preventDefault();
        let button = $(this);
        let agentId = button.data('id');
        let row = button.closest('tr');

        $.ajax({
            type: 'PATCH',
            url: '{{ route('admin.support_stuff.recoverAgentAccount', ':id') }}'.replace(':id',
                agentId),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // 1. Remove line-through styling
                row.find('td.text-decoration-line-through').removeClass(
                    'text-decoration-line-through');
            },
            error: function() {
                alert('Could not recover this account.');
            }
        });
    });
</script>
