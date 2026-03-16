document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-show-post');
    if (!btn) return;

    e.preventDefault();
    // Lấy trực tiếp URL từ attribute data-url
    let url = btn.dataset.url;
    btn.style.opacity = '0.5';

    fetch(url, {
        headers: { "X-Requested-With": "XMLHttpRequest" }
    }).then(res => {
        if (!res.ok) throw new Error("Không thể tải dữ liệu");
        return res.json();
    }).then(data => {
        btn.style.opacity = '1';
        // Đổ dữ liệu cơ bản
        document.getElementById('post-title').innerText = data.title;
        document.getElementById('post-excerpt').innerText = data.excerpt || '';
        document.getElementById('post-content').innerHTML = data.content || 'Không có nội dung.';
        // Xử lý Tác giả và Ngày tháng
        document.getElementById('post-author').innerText = data.user ? data.user.name : 'Quản trị viên';
        const date = new Date(data.created_at);
        document.getElementById('post-date').innerText = date.toLocaleDateString('vi-VN');

        // Xử lý Ảnh
        const imgEl = document.getElementById('post-image');
        if (data.image) {
            imgEl.src = "/storage/" + data.image;
            imgEl.style.display = "block";
        } else {
            imgEl.style.display = "none";
        }

        // Hiển thị Fancybox
        Fancybox.show([{ src: "#post-detail-content", type: "inline" }], {
            showClass: "f-fadeIn",
            hideClass: false,
            animated: false,
            dragToClose: false,
            closeButton: false
        });
    })
        .catch(err => console.error("Lỗi khi tải bài viết:", err));
});