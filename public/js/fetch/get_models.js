
// Models request
const getModels = (id_marque) => {
    // Request en fonction de la marque choisie
    let asyncGetModels = async () => {
        const response = await fetch( origin + "/" + parent + '/app/Views/public/model.php?id=' + id_marque, {
            method: "GET",
            headers: {
                'Accept' : 'application/json'
            }
        });
        return await response.json();
    };
    // Response Request
    asyncGetModels()
    .then(resp => {
        if(resp.ok){
            // On enrichit le select models de ses options
            for (model of resp.models){
                let option = document.createElement('option');
                option.setAttribute('value', model['id']);
                option.textContent = model['name'];
                selectModels.appendChild(option);
            }
        }

    })
};






