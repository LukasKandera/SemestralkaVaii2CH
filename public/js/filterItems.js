class Predmet {
    constructor() {
        document.getElementById("filtruj").onclick = () => this.getPredmets();

        this.reloadData();

        setInterval(() => {
            this.reloadData()
        }, 2000);
    }

    async getPredmets() {
        try {
            let response = await fetch("?c=predmet&a=predmets");
            let data = await response.json();

            var predmets = document.getElementById("chars");
            var html = "";
            data.forEach((item) => {
                var filter = false;
                if (document.getElementById("druh").value === "0" ||  document.getElementById("jedinecnost").value  === "0" ) {
                    if (item.druh == document.getElementById("druh").value || item.jedinecnost == document.getElementById("jedinecnost").value) {
                        filter = true;
                    }
                } else {
                    if (item.druh == document.getElementById("druh").value && item.jedinecnost == document.getElementById("jedinecnost").value) {
                        filter = true;
                    }
                }
                if (filter) {
                    html += `<div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3 text-center">
                            <div class="card-body">
                                <h5 class="card-title">
                                    ${item.nadpis}
                                </h5>
                                <img src="${item.image}" class="card-img" alt="...">
                                <p></p>
                                <p>
                                    <a href="?c=predmet&a=open&id=${item.id}" class="btn btn-success">Otvoriť</a>
                                    
                                </p>
                            </div>
                        </div>
                        </div>`;
                }
            });
            predmets.innerHTML = html;
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async reloadData() {
        await this.getPredmets();
    }
}
var predmet;
document.addEventListener(
    'DOMContentLoaded', () => {
        predmet = new Predmet();
    }, false)
;
