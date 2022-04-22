
selectMarques.addEventListener('change', (e) => {
    // accessiblité select models quand select marque !== ""
    let idMarque = e.target.value;
    idMarque !== "" ? selectModels.disabled = false : selectModels.disabled = true;

    // Remove des options du select models
    while (selectModels.options.length > 0) {
        selectModels.remove(0);
    }

    // Création element neutre du select
    const  optionFirst = document.createElement('option');
    optionFirst.setAttribute('value', "");
    optionFirst.textContent = "Modèles...";
    selectModels.appendChild(optionFirst);

    // On récupère les modeles en fonction de la marque
    getModels(idMarque);
});