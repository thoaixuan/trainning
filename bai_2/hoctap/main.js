function click() {
    alert("Đừng nhấn click!");
}
function open() {
    alert("Chắc phải tuyệt vọng lắm!");
}
async function myBad() {
    let myPromise = new Promise(function (myResolve) {
        myResolve("!!!!!!");
    });
    document.getElementById("header").innerHTML = await myPromise;
}