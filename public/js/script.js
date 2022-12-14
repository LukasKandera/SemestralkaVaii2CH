let imageIndex = 1;
let imageSource = ['','url("../public/img/headerMain.png")','url("../public/img/headerMain1.jpg")','url("../public/img/headerMain2.jpg")','url("../public/img/headerMain3.jpg")'];
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





class Character {
    constructor() {
        document.getElementById("filtruj").onclick = () => this.getChars();

        this.reloadData();

        setInterval(() => {
            this.reloadData()
        }, 2000);
    }

    async getChars() {
        try {
            let response = await fetch("?c=character&a=characters");
            let data = await response.json();

            var characters = document.getElementById("chars");
            var html = "";
            data.forEach((chars) => {
                var filter = false;
                if (document.getElementById("rasa").value === "0" ||  document.getElementById("typ").value  === "0" ) {
                    if (chars.rasa == document.getElementById("rasa").value || chars.typ == document.getElementById("typ").value) {
                        filter = true;
                    }
                } else {
                    if (chars.rasa == document.getElementById("rasa").value && chars.typ == document.getElementById("typ").value) {
                        filter = true;
                    }
                }
                if (filter) {
                    html += `<div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3 text-center">
                            <div class="card-body">
                                <h5 class="card-title">
                                    ${chars.meno}
                                </h5>
                                <img src="${chars.obrazok}" class="card-img" alt="...">
                                <p></p>
                                <p>
                                    <a href="?c=character&a=open&id=${chars.id}" class="btn btn-success">Otvori??</a>
                                    <a href="?c=character&a=edit&id= ${chars.id}" class="btn btn-warning">Upravi??</a>
                                    <a href="?c=character&a=delete&id= ${chars.id}" class="btn btn-danger">Zmaza??</a>
                                </p>
                            </div>
                        </div>
                        </div>`;
                }
            });
            characters.innerHTML = html;
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async reloadData() {
        await this.getChars();
    }
}
var caracters;
document.addEventListener(
    'DOMContentLoaded', () => {
        caracters = new Character();
    }, false)
;

