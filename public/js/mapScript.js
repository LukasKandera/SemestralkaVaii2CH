class Map {
    constructor() {
        document.getElementById("addMapText").onclick = () => this.addText();

        this.reloadData();

        setInterval(() => {
            this.reloadData()
        }, 2000);
    }


    async texty() {
        try {
            let response = await fetch("?c=map&a=texts");
            let data = await response.json();

            var texts = document.getElementById("textMap");
            var html = "";
            var htmlBTN = "";
            var user = document.getElementById("loggedUser").value;
            data.forEach((text) => {
                if (parseInt(user) === text.autor) {
                    htmlBTN = `<a href="?c=map&a=editText&id=${text.id}" class="btn btn-warning">Upraviť</a>
                        <a href="?c=map&a=deleteText&id=${text.id}" class="btn btn-danger">Zmazať</a>`;
                } else {
                    htmlBTN = ``;
                }
                if (text.parent === parseInt(document.getElementById("newParent").value)) {
                    html += `<div class="card my-3">
                            <div class="card-header">
                                ${text.nazov}
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    ${text.text}
                                </p>
                                ${htmlBTN}
                            </div>
                        </div>`;
                }

            });
            texts.innerHTML = html;
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }


    async addText() {
        try {

            let response = await fetch("?c=map&a=storeText", {
                method: 'POST',
                headers: {
                    'Content-Type': "application/json",
                },
                body: JSON.stringify({
                    nazov: document.getElementById("newNazov").value,
                    text: document.getElementById("newText").value,
                    parent: document.getElementById("newParent").value
                })
            });
            document.getElementById("newNazov").value = "";
            document.getElementById("newText").value = "";

        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async reloadData() {
        this.texty();
    }

}

var textMap;

document.addEventListener(
    'DOMContentLoaded', () => {
        textMap = new Map();
    }, false)
;

