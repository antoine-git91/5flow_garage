
const urlGetVoitures = path + '/app/Views/public/fuel.php';

// Fuels Request
let asyncGetFuels = async () => {
    const response = await fetch( urlGetVoitures, {
        method: "GET",
        headers: {
            'Accept' : 'application/json'
        }
    });
    if (!response.ok){
        throw new Error("fetch data error")
    }
    return await response.json();
};

asyncGetFuels()
.then(data => {
    for (fuel of data){
        let option = document.createElement('option');
        option.setAttribute('value', fuel['id']);
        option.textContent = fuel['name'];
        selectFuels.appendChild(option);
    }
});
