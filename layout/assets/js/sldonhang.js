document.addEventListener("DOMContentLoaded", function () {
    const ipsl = document.querySelectorAll('.cart-quantity');
    const tamtinh = document.getElementById('cart-total');
    const tong = document.getElementById('cart-total-final');

    function tinhTong() {
        let total = 0;

        document.querySelectorAll('.cart-table tbody tr').forEach(function (row) {
            const giaText = row.querySelector('.cart-table-price').innerText;
            const gia = parseInt(giaText.replace(/[^0-9]/g, ''));
            const sl = row.querySelector('.cart-quantity').value;
            total += gia * sl;
        });
        tamtinh.innerText = total + 'đ';
        tong.innerText = total + 'đ';
    }

    // ngăn nhập số 0 vào ô nhập số lượng
    ipsl.forEach(function (ipsl) {
        ipsl.addEventListener('change', function () {
            if (this.value == 0 || this.value < 1) {
                this.value = 1;
            }
        });

        ipsl.addEventListener('change', function() {
            this.form.submit(); 
        });
    });

    tinhTong();
});
