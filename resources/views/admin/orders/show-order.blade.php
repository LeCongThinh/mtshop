<div id="order-detail-content"
    style="display:none; max-width: 900px; width: 95%; border-radius: 16px; padding: 25px; background: #fff;">
    <button class="custom-close-btn" onclick="Fancybox.close()" title="Đóng">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
</button>

    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h4 class="mb-0 text-primary fw-bold">ĐƠN HÀNG: #<span id="od-code"></span></h4>
    </div>

    <div class="row g-4 mb-4">
        <!-- Thông tin người nhận -->
        <div class="row g-4 mb-4">
            <div class="col-md-7">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-text avatar-sm bg-soft-primary text-primary me-2">
                        <i class="feather feather-user"></i>
                    </div>
                    <h6 class="text-uppercase fw-bold m-0"
                        style="letter-spacing: 0.5px; font-size: 0.85rem; color: #4b5563;">Thông tin nhận hàng</h6>
                </div>

                <div class="card border-0 shadow-none bg-light-subtle rounded-4 p-3 h-100"
                    style="border: 1px dashed #e0e0e0 !important;">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-muted" style="width: 180px; font-size: 0.9rem;">Người nhận hàng:</div>
                        <div class="flex-grow-1 fw-bold text-dark" id="od-receiver-name">---</div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-muted" style="width: 180px; font-size: 0.9rem;">Số điện thoại người nhận:</div>
                        <div class="flex-grow-1 fw-semibold text-dark" id="od-receiver-phone">---</div>
                    </div>
                    <div class="d-flex mb-0">
                        <div class="flex-shrink-0 text-muted" style="width: 180px; font-size: 0.9rem;">Địa chỉ nhận hàng:</div>
                        <div class="flex-grow-1 text-muted" style="font-size: 0.9rem; line-height: 1.5;"
                            id="od-receiver-address">---</div>
                    </div>

                    <!-- Ghi chú nổi bật -->
                    <div id="od-note-container" class="mt-3 p-2 bg-white rounded-3 border-start border-3 border-warning"
                        style="display:none">
                        <div class="small text-warning fw-bold mb-1 text-uppercase" style="font-size: 0.7rem;">Ghi chú
                            từ khách hàng:</div>
                        <div class="text-dark small fst-italic" id="od-note"></div>
                    </div>
                </div>
            </div>

            <!-- Cột Thông tin thanh toán -->
            <div class="col-md-5">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-text avatar-sm bg-soft-success text-success me-2">
                        <i class="feather feather-credit-card"></i>
                    </div>
                    <h6 class="text-uppercase fw-bold m-0"
                        style="letter-spacing: 0.5px; font-size: 0.85rem; color: #4b5563;">Giao dịch & Thời gian</h6>
                </div>

                <div class="card border-0 shadow-none bg-light-subtle rounded-4 p-3 h-100"
                    style="background-color: #f8f9fa !important;">
                    <div class="mb-3">
                        <label class="d-block small text-muted mb-1">Phương thức thanh toán</label>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-white text-dark border shadow-sm px-3 py-2 fw-bold"
                                id="od-payment-method">
                                ---
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="d-block small text-muted mb-1">Trạng thái thanh toán</label>
                        <div id="od-payment-status">---</div>
                    </div>
                    <div class="mb-0 pt-2 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted italic">Ngày đặt hàng:</span>
                            <span class="small fw-bold text-dark" id="od-date">---</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="table-responsive border rounded">
        <table class="table table-hover mb-0">
            <thead class="table-secondary">
                <tr>
                    <th>Sản phẩm</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-end">Giá</th>
                    <th class="text-end">Thành tiền</th>
                </tr>
            </thead>
            <tbody id="od-items-list">
                <!-- JS sẽ render hàng ở đây -->
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <td colspan="3" class="text-end fw-bold text-uppercase">Tổng thanh toán:</td>
                    <td class="text-end text-danger fw-bold fs-5" id="od-total-amount"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css/alert-product-info.css") }}">