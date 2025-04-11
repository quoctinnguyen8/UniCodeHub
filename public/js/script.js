document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleVariationFields');
    const variationBox = document.getElementById('variationFields');
    const addBtn = document.getElementById('addVariationButton');
    const container = document.getElementById('variationFieldsContainer');

    // Toggle hiển thị
    toggleBtn.addEventListener('click', function () {
        variationBox.style.display = (variationBox.style.display === 'none' || variationBox.style.display === '') ? 'block' : 'none';
    });

    // Thêm dòng biến thể mới
    addBtn.addEventListener('click', function () {
        const div = document.createElement('div');
        div.className = 'variation mb-3 d-flex align-items-center';
        div.innerHTML = `
            <input type="text" name="variation_name[]" class="form-control me-2" placeholder="Tên Biến Thể">
            <input type="text" name="variation_value[]" class="form-control me-2" placeholder="Giá Trị Biến Thể">
            <button type="button" class="btn btn-danger btn-sm removeVariationButton">Xóa</button>
        `;
        container.appendChild(div);
    });

    // Xóa dòng biến thể (event delegation)
    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeVariationButton')) {
            e.target.closest('.variation').remove(); // dùng closest để an toàn hơn
        }
    });
});
