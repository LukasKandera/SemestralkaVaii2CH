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
                                    <a href="?c=character&a=open&id=${chars.id}" class="btn btn-success">Otvoriť</a>
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
