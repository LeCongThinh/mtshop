$(document).ready(function () {
    const msg = sessionStorage.getItem('login_success_msg');

    if (msg) {
        const alertHtml = `
            <div class="alert alert-success alert-dismissible fade show shadow border-0" 
                 role="alert" 
                 style="background-color: #d1e7dd; color: #0f5132; border-left: 5px solid #198754 !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>
                        <strong class="d-block">Thành công!</strong>
                        <span class="small">${msg}</span>
                    </div>
                </div>
                <button type="button" class="btn-close small shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        // Chèn vào container
        $('#loginAlertApp').html(alertHtml);

        // Xóa sạch session để không hiện lại khi F5
        sessionStorage.removeItem('login_success_msg');

        // Tự động đóng sau 4 giây kèm hiệu ứng mờ dần
        setTimeout(() => {
            $('#loginAlertApp .alert').fadeOut(500, function () {
                $(this).remove();
            });
        }, 4000);
    }
});