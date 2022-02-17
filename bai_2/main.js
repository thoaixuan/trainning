function clickMe() {
    alert("Đừng nhấn click!");
}
function openURL() {
    alert("Chắc phải tuyệt vọng lắm!"); 
}


    document.addEventListener('DOMContentLoaded', function () {
        var simple = document.querySelector('.js_simple');

        lory(simple, {
            infinite: 1
        });
    });