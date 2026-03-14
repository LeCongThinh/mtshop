document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-show-product');
    if (!btn) return;

    e.preventDefault();
    let url = SHOW_PRODUCT_ROUTE.replace(':id', btn.dataset.id);

    fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
        .then(res => res.json())
        .then(data => {
            document.getElementById('p-title').innerText = data.name;

            // Price vs Sale Price
            const mainPriceEl = document.getElementById('p-main-price');
            const oldPriceEl = document.getElementById('p-old-price');

            const price = parseFloat(data.price) || 0;
            const salePrice = parseFloat(data.sale_price) || 0;

            const formatter = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });

            if (salePrice > 0 && salePrice < price) {
                // Trường hợp có giảm giá
                mainPriceEl.innerText = formatter.format(salePrice);
                mainPriceEl.className = "fs-4 fw-bold text-danger";
                oldPriceEl.innerText = formatter.format(price);
                oldPriceEl.style.display = "inline";
                oldPriceEl.className = "text-muted text-decoration-line-through ms-2";
                oldPriceEl.style.fontSize = "0.9rem";
            } else {
                // Trường hợp không giảm giá hoặc sale_price = 0
                mainPriceEl.innerText = price > 0 ? formatter.format(price) : 'Liên hệ';
                mainPriceEl.className = "fs-4 fw-bold text-danger";
                oldPriceEl.style.display = "none";
            }

            document.getElementById('p-image').src = data.thumbnail ? "/storage/" + data.thumbnail : "/assets/images/avatar/undefined.png";

            document.getElementById('p-desc').innerHTML = data.description || 'Chưa có thông tin.';

            const specsContainer = document.getElementById('p-specs-container');
            const specsList = document.getElementById('p-specs-list');

            if (data.specs && data.specs.length > 0) {
                let specsHtml = '';
                data.specs.forEach(spec => {
                    specsHtml += `
                            <tr>
                                <td class="text-muted py-2" style="width: 35%;">${spec.spec_key}</td>
                                <td class="fw-medium py-2">${spec.spec_value}</td>
                            </tr>
                        `;
                });
                specsList.innerHTML = specsHtml;
                specsContainer.style.display = 'block';
            } else {
                specsContainer.style.display = 'none';
            }

            Fancybox.show([{ src: "#product-detail-content", type: "inline" }], {
                showClass: "f-fadeIn",
                hideClass: false,
                animated: false,
                dragToClose: false,
                closeButton: false,
                commonConfig: {
                    duration: 0
                }
            });
        });
});