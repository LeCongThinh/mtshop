<div id="post-detail-content"
    style="display:none; max-width: 900px; width: 95%; border-radius: 16px; padding: 25px; background: #fff;">
    <button class="custom-close-btn" data-fancybox-close title="Đóng">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <div class="post-header mb-2">
        <h2 id="post-title" class="fw-bold" style="color: #2c3e50;"></h2>
        <div class="text-muted small">
            <i class="feather feather-user me-1"></i> <span id="post-author" class="me-3"></span>
            <i class="feather feather-calendar me-1"></i> <span id="post-date"></span>
        </div>
    </div>

    <div class="post-body custom-scroll" style="max-height: 60vh; overflow-y: auto;">
        <div class="text-center mb-4">
            <img id="post-image" src="" class="img-fluid rounded"
                style="width: 100%; max-height: 400px; object-fit: cover;">
        </div>

        <div id="post-excerpt" class="fw-bold mb-3" style="font-style: italic; color: #555;"></div>

        <div id="post-content" class="lh-base"></div>
    </div>
</div>
<!-- link css và js -->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/alert-product-info.css") }}">
<script src="{{ asset('assets/js/admin/preview-post.js') }}"></script>