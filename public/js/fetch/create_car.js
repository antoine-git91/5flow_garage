
let bodyForm;

let asyncPostCar = async () => {
    const response = await fetch( origin + "/" + parent + '/app/Views/public/create.php', {
        method: "POST",
        headers: {
            'Accept' : 'application/json'
        },
        body: bodyForm
    });
    return await response.json();
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    let formCar = new FormData(e.currentTarget);

    if(formCar.get('id_car')){
        bodyForm = JSON.stringify({
            id: formCar.get('id_car'),
            model: formCar.get('model'),
            immatriculation: formCar.get('immatriculation'),
            fuel: formCar.get('fuel'),
            price: formCar.get('price'),
            type_sale: formCar.get('type_sale'),
            booked: formCar.get('booked')
        })
    } else {
        bodyForm = JSON.stringify({
            model: formCar.get('model'),
            immatriculation: formCar.get('immatriculation'),
            fuel: formCar.get('fuel'),
            price: formCar.get('price'),
            type_sale: formCar.get('type_sale'),
            booked: formCar.get('booked')
        })
    }

    asyncPostCar()
    .then(resp => {
        if(resp.ok){
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
                    }
                });
        } else {
            let codeSqlError = resp.errorInfo[1];

            if(codeSqlError === 1062){

                const immatriculationField = document.querySelector('input[name="immatriculation"]');
                immatriculationField.classList.add('error_field');
                immatriculationField.focus();

                immatriculationField.addEventListener('focusout', (e) => {
                    immatriculationField.classList.remove('error_field');
                })

                let toolTipForm = document.createElement('div');
                toolTipForm.classList.add('form_error')
                toolTipForm.textContent = 'Immatricualtion déjà enregistrée';

                form.appendChild(toolTipForm);

                setTimeout(() => {
                        toolTipForm.remove();
                    }, 2000
                )
            }
        }
    })
});