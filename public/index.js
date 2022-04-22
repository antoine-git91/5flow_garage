
// Path request
const origin = window.location.origin;
const parent = window.location.pathname.split('/')[1];
const path = origin + "/" + parent;

// table
const tBody = document.querySelector('tbody');

// Popup Request
const BoxResponse = document.querySelector("#response_box");

// Form
let form = document.querySelector("#form_add_car");
// button form
let btnSubmitCarAdd = document.getElementById('btn_submit_new_car');

// Select
const selectModels = document.querySelector("#model");
const selectMarques = document.querySelector("#marque");
const selectFuels = document.querySelector("#fuel");

// Modal
let btnAddCarModal = document.getElementById('btn_add_car_modal');
let modal = document.getElementById('overlay_modal');
let btnCloseModal = document.getElementById('btn_close_modal');

