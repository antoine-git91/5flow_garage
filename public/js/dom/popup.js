const popupRequest = (type, message) => {
    BoxResponse.classList.add(type);
    BoxResponse.classList.add('show');
    BoxResponse.textContent = message;

    setTimeout(() => {
        BoxResponse.classList.remove('show');
    }, 1500);
};