
// MarqueTable request
let asyncGetMarques = async () => {
    const response = await fetch( origin + "/" + parent + '/app/Views/public/marque.php', {
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


asyncGetMarques()
.then(data => {
    for (marque of data){
        let option = document.createElement('option');
        option.setAttribute('value', marque['id']);
        option.textContent = marque['name'];
        selectMarques.appendChild(option);
    }
});