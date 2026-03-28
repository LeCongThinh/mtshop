$(document).ready(function () {
    $(document).on('click', '.btn-show-order', function (e) {
        e.preventDefault();
        const url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                const order = response.data;

                $('#od-code').text(order.order_code);
                $('#od-receiver-name').text(order.receiver_name);
                $('#od-receiver-phone').text(order.receiver_phone);
                $('#od-receiver-address').text(order.receiver_address);
                $('#od-payment-method').text(order.payment_method.toUpperCase());
                $('#od-date').text(new Date(order.created_at).toLocaleString('vi-VN'));

                if (order.note) {
                    $('#od-note').text(order.note);
                    $('#od-note-container').show();
                } else {
                    $('#od-note-container').hide();
                }

                const statusClass = order.status === 'completed' ? 'bg-success' : 'bg-warning';

                // Đổ data trạng thái thanh toán
                $('#od-status-badge').html(`<span class="badge ${statusClass} px-3 py-2">${order.status.toUpperCase()}</span>`);
                let payBadgeHtml = '';
                if (order.payment_status === 'paid') {
                    payBadgeHtml = '<span class="badge bg-success px-3 py-2 shadow-sm"><i class="feather feather-check-circle me-1"></i> ĐÃ THANH TOÁN</span>';
                } else if (order.payment_status === 'pending') {
                    payBadgeHtml = '<span class="badge bg-danger px-3 py-2 shadow-sm"><i class="feather feather-x-circle me-1"></i> CHƯA THANH TOÁN</span>';
                } else {
                    payBadgeHtml = `<span class="badge bg-secondary px-3 py-2 shadow-sm">${order.payment_status.toUpperCase()}</span>`;
                }
                $('#od-payment-status').html(payBadgeHtml);

                let itemsHtml = '';
                order.order_details.forEach(item => {
                    const subtotal = item.price * item.quantity;
                    itemsHtml += `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/storage/${item.product_thumbnail}" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    <span class="small fw-semibold">${item.product_name}</span>
                                </div>
                            </td>
                            <td class="text-center">${item.quantity}</td>
                            <td class="text-end">${new Intl.NumberFormat('vi-VN').format(item.price)}đ</td>
                            <td class="text-end fw-bold">${new Intl.NumberFormat('vi-VN').format(subtotal)}đ</td>
                        </tr>`;
                });
                $('#od-items-list').html(itemsHtml);
                $('#od-total-amount').text(new Intl.NumberFormat('vi-VN').format(order.total_amount) + 'đ');

                Fancybox.show([{
                    src: "#order-detail-content",
                    type: "inline",
                }], {
                    hideClass: false,
                    animated: false,
                    dragToClose: false,
                    closeButton: false,
                });
            },
            error: function () {
                alert('Không thể lấy dữ liệu đơn hàng!');
            }
        });
    });
});