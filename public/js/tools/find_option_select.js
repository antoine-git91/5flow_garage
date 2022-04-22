
const findIndexOptions = (selectElement, idToFind) => {
    let optionsSelect = Array.from(selectElement.options).map(el => el.value);
    console.log(optionsSelect)
    let indexOption = optionsSelect.findIndex(el => el === idToFind);
    return indexOption;
};