document.querySelector(".arrow-left").addEventListener("click", function() {
    document.querySelector(".product-gallery").scrollBy({
        left: -300, // ปรับค่าให้เหมาะสมกับขนาดของสินค้า
        behavior: "smooth"
    });
});

document.querySelector(".arrow-right").addEventListener("click", function() {
    document.querySelector(".product-gallery").scrollBy({
        left: 300, // ปรับค่าให้เหมาะสมกับขนาดของสินค้า
        behavior: "smooth"
    });
});
document.addEventListener("DOMContentLoaded", function() {
    // ตรวจสอบว่าปุ่มลูกศรด้านขวามีอยู่หรือไม่
    if (!document.querySelector('.arrow-right')) {
        const arrowRight = document.createElement('button');
        arrowRight.className = 'arrow-right';
        arrowRight.innerHTML = '&#9654;'; // ใช้สัญลักษณ์ลูกศร
        document.querySelector('.product-gallery-container').appendChild(arrowRight);
    }
});



