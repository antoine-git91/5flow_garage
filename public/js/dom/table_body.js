
const buildTBody = (voiture) => {
    // Creation row
    let rowTab = document.createElement('tr');
    rowTab.id = voiture.id;

    let copyVoiture = {...voiture};

    if(copyVoiture.booked === "0"){
        copyVoiture.booked = "non";
    } else {
        copyVoiture.booked =  "oui";
    }

    if(copyVoiture.type_sale === "0"){
        copyVoiture.type_sale = "occasion";
    } else {
        copyVoiture.type_sale =  "neuf";
    }

    // Copie Object voiture pour supprimer les elements non voulues  à l'affichage des données dans le tableau

    // Elements non voulu
    let z = ['id', 'marque_id', 'model_id', 'fuel_id'];
    // Suppression des element dans la copie de l'object
    z.map(i => Object.keys(copyVoiture).map(el => el === i && delete copyVoiture[el] ));

    Object.values(copyVoiture).map(el => rowTab.insertCell().textContent = el);

    // Création button edition
    const btnEdit = document.createElement('button');
    btnEdit.textContent = "Editer";
    btnEdit.classList.add('btn', 'btn-primary', "btnEdit");

    // Création button suppression
    const btnDelete = document.createElement('button');
    btnDelete.textContent = "Supprimer";
    btnDelete.setAttribute('type', 'submit');
    btnDelete.classList.add('btn', 'btn-danger');

    const divBtnAction = document.createElement("div");
    divBtnAction.classList.add('flex');

    divBtnAction.appendChild(btnEdit);
    divBtnAction.appendChild(btnDelete);

    rowTab.insertCell();
    rowTab.cells.item(7).appendChild(divBtnAction);

    tBody.appendChild(rowTab);

    btnDelete.addEventListener('click', (e) => {

        e.preventDefault();

        let asyncDeleteVoitures = async () => {

            const response = await fetch( path + '/app/delete.php', {
                method: "POST",
                headers: {
                    'Accept' : 'application/json'
                },
                body: JSON.stringify({
                    "id": voiture.id
                })
            });

            if (!response.ok){
                throw new Error("fetch data error")
            }

            return await response.json();
        };

        asyncDeleteVoitures()
        .then(resp => {

            modal.classList.remove('show_modal');

            const messageAjoutSuccess = resp.message
            popupRequest("success", messageAjoutSuccess );

            asyncGetVoitures()
            .then(data => {

                while(tBody.rows.length > 0) {
                    tBody.deleteRow(0);
                }

                // Construction du tableau
                for ( const voiture of data){
                    buildTBody(voiture)
                };
            })
        })
    });

    btnEdit.addEventListener('click', (e) => {

        while (selectModels.options.length > 0) {
            selectModels.remove(0);
        }

        // Ouverture modal
        modal.classList.add('show_modal');
        modal.querySelector('.title_form').textContent = "Modification d'une voiture";
        modal.querySelector('#btn_submit_new_car').textContent = "Modifier la voiture";

        // création d'un input avec l'id de la voiture pour Update
        let inputIdCar = document.createElement('input');
        inputIdCar.type = "text";
        inputIdCar.id = "id_car";
        inputIdCar.name = "id_car";
        inputIdCar.hidden = true;
        inputIdCar.setAttribute('value', voiture.id);

        // Création element neutre du select
        const  optionFirst = document.createElement('option');
        optionFirst.setAttribute('value', "");
        optionFirst.textContent = "Modèles...";
        selectModels.appendChild(optionFirst);

        // Insert Data dans form
        // marque
        form.elements.marque.selectedIndex = findIndexOptions(selectMarques, voiture.marque_id);

        getModels(voiture.marque_id);

        selectModels.disabled = false;

        // modele
        form.elements.model.selectedIndex = findIndexOptions(selectModels, 1);
        //immatriculation
        form.elements.immatriculation.value = voiture.immatriculation;
        // carburant
        form.elements.fuel.selectedIndex = voiture.fuel_id;
        // prix
        form.elements.price.value = voiture.price;
        // type de vente
        form.elements.type_sale.selectedIndex = voiture.type_sale;
        // reservé ?
        form.elements.booked.selectedIndex = voiture.booked;

        // On insert le input avant le bouton submit du form
        form.insertBefore(inputIdCar, btnSubmitCarAdd);
    });
};