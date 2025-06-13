<div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title text-white">Notifications</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="notificationsModal">
                    @if (Auth::user() && Auth::user()->notifications->count() > 0)
                        @foreach (Auth::user()->notifications as $notification)
                            <div class="notification-card p-3 mb-2 border rounded bg-secondary text-white"
                                data-id="{{ $notification->id }}">
                                <div class="d-flex align-items-start">
                                    @if ($notification->data['message'] == 'Order Placed!')
                                        <i class="bi bi-cart-check-fill fs-3 text-light"></i>
                                    @else
                                        <i class="bi bi-cart-x-fill fs-3 text-light"></i>
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-1">{{ $notification->data['message'] }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small
                                                class="text-light">{{ $notification->created_at->diffForHumans() }}</small>
                                            <a href="#" class="btn btn-sm btn-outline-light ms-2 single-read-btn"
                                                data-id="{{ $notification->id }}">
                                                @if (!$notification->read_at)
                                                    <i class="bi bi-check"></i>
                                                @else
                                                    <i class="bi bi-check-all"></i>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <a id="clearAll" class="btn btn-secondary float-end mt-2">Clear all</a>
                    @else
                        <p class="text-center text-light">Nothing to show</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
