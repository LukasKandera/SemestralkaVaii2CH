let imageIndex = 1;
let imageSource = ['','url("../public/img/headerMain.png")','url("../public/img/headerMain1.png")','url("../public/img/headerMain2.jpg")'];
function initialize() {
    changeBI();
}
window.onload = initialize;
function gid(elementId) {
    return document.getElementById(elementId);
}
function changeBI() {
    gid("HM").style.backgroundImage = imageSource[imageIndex];
    imageIndex++;
    if (imageIndex>imageSource.length){
        imageIndex = 1;
    }
    setTimeout(changeBI, 4000);
}
