let asyncGetVoitures = async () => {
    const response = await fetch( path + '/app/Views/public/home.php', {
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

asyncGetVoitures()
.then(data => {
    console.log(data)
    // Construction du tableau
    for ( const voiture of data){
        buildTBody(voiture);
    };
});



