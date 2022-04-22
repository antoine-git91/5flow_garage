// Open modal
btnAddCarModal.addEventListener('click', () => {

    modal.classList.add('show_modal');

    form.reset();

    // Remove des options du select models
    selectMarques.selectedIndex = 0;

    while (selectModels.options.length > 0) {
        selectModels.remove(0);
    }

    // Création element neutre du select
    const  optionFirst = document.createElement('option');
    optionFirst.setAttribute('value', "");
    optionFirst.textContent = "Modèles...";
    selectModels.appendChild(optionFirst);

    selectModels.selectedIndex = 0;

    selectModels.disabled = true;

    modal.querySelector('.title_form').textContent = "Ajout d'une voiture";
    modal.querySelector('#btn_submit_new_car').textContent = "Ajouter la voiture";

});

// Close modal
btnCloseModal.addEventListener('click', (e) => {

    if(form.querySelector('#id_car')){
        form.querySelector('#id_car').remove();
    }

    modal.classList.remove('show_modal');
});