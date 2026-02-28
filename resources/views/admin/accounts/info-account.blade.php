<body>
    <div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="viewUserCanvas" style="width: 400px;">
        <div class="offcanvas-header bg-light border-bottom">
            <h5 class="offcanvas-title fw-bold text-primary">
                <i class="feather feather-user me-2"></i>Thông tin tài khoản
            </h5>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-4 py-3">
                <div class="position-relative d-inline-block">
                    <img id="oc-avatar" src="default-avatar.png" alt="Avatar"
                        class="rounded-circle border border-4 border-white shadow-sm mb-3"
                        style="width: 110px; height: 110px; object-fit: cover;">
                    <span id="oc-status-badge"
                        class="position-absolute bottom-0 end-0 p-2 bg-success border border-2 border-white rounded-circle"
                        title="Online"></span>
                </div>
                <h4 id="oc-name" class="fw-bold mb-1">---</h4>
                <p id="oc-role" class="badge bg-soft-primary text-primary text-uppercase px-3 py-2 rounded-pill">---</p>
            </div>

            <hr class="text-muted opacity-25">

            <div class="user-info-list mt-4">
                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-mail text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Email</small>
                        <span id="oc-email" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-phone text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Số điện thoại</small>
                        <span id="oc-phone" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-map-pin text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Địa chỉ</small>
                        <span id="oc-address" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-calendar text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Ngày tham gia</small>
                        <span id="oc-created" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-shield text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Trạng thái tài khoản</small>
                        <span id="oc-status" class="fw-medium text-dark">---</span>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm w-100" data-bs-dismiss="offcanvas">Đóng</button>
    </div>
</body>
<script>
    //JS cho offcanvas xem chi tiết tài khoản. Cả 2 view: header.blade.php và view-account.blade.php
    document.addEventListener('DOMContentLoaded', function () {
        var offcanvas = document.getElementById('viewUserCanvas');
        offcanvas.addEventListener('show.bs.offcanvas', function (event) {
            var button = event.relatedTarget;
            document.getElementById('oc-avatar').src = button.getAttribute('data-avatar');
            document.getElementById('oc-name').textContent = button.getAttribute('data-name');
            document.getElementById('oc-email').textContent = button.getAttribute('data-email');
            document.getElementById('oc-phone').textContent = button.getAttribute('data-phone');
            document.getElementById('oc-address').textContent = button.getAttribute('data-address');
            document.getElementById('oc-created').textContent = button.getAttribute('data-created');
            document.getElementById('oc-role').textContent = button.getAttribute('data-role');
            document.getElementById('oc-status').textContent = button.getAttribute('data-status');
        });
    });
</script>