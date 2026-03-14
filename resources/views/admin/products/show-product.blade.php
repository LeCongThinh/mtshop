<div id="product-detail-content"
    style="display:none; position: relative; max-width: 1000px; width: 95%; border-radius: 16px; padding: 25px; background: #fff;">

    <button class="custom-close-btn" data-fancybox-close title="Đóng">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>

    <div class="row mt-2">
        <!-- Thumbnail -->
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <div class="p-2 border rounded bg-light">
                <img id="p-image" src="" class="img-fluid rounded" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>

        <!-- Nội dung -->
        <div class="col-md-7 d-flex flex-column" style="max-height: 500px;">
            <h2 id="p-title" class="fw-bold mb-2" style="color: #2c3e50; font-size: 1.8rem;"></h2>
            <div id="p-price" class="fs-4 fw-bold text-danger mb-3"></div>

            <div id="price-wrapper" class="mb-3 d-flex align-items-baseline gap-2">
                <span id="p-main-price" class="fw-bold"></span>
                <span id="p-old-price" class="text-decoration-line-through text-muted small"
                    style="display: none;"></span>
            </div>

            <!-- Vùng cuộn cho cả thông số và mô tả -->
            <div class="custom-scroll pe-2" style="overflow-y: auto; flex-grow: 1;">

                <!-- Thông số kỹ thuật -->
                <div id="p-specs-container" class="mb-4" style="display: none;">
                    <h6 class="text-uppercase fw-bold text-secondary small mb-2">Thông số kỹ thuật</h6>
                    <div id="p-specs-list-wrapper" class="bg-white">
                        <table class="table table-striped table-borderless mb-0" style="font-size: 14px;">
                            <tbody id="p-specs-list">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="description-container">
                    <h6 class="text-uppercase fw-bold text-secondary small mb-2">Mô tả sản phẩm</h6>
                    <div id="p-desc"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- link css và js -->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/alert-product-info.css") }}">
<script>
    var SHOW_PRODUCT_ROUTE = "{{ route('admin.products.show', ':id') }}";
</script>
<script src="{{ asset("assets/js/admin/show-product-info.js") }}"></script>