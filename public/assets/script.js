//Rubrique commentaire 

const etoiles = document.querySelectorAll(".boite-etoiles label");
const noteInput = document.querySelector("#commentaire_note");

etoiles.forEach((label, index) => {
    label.addEventListener("click", () => {
        etoiles.forEach((etoile, i) => {
            if (i <= index) {
                etoile.classList.add("selected");
            } else {
                etoile.classList.remove("selected");
            }
        });
        noteInput.value = index + 1;
    });
});

