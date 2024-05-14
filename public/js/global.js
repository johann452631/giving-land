const dropdownMenus = document.querySelectorAll(".dropdown-menu");
const dropdownButtons = document.querySelectorAll(".dropdown-button");
const inputsError = document.querySelectorAll(".input-error");
var popups = document.querySelectorAll('.popup');
var popupShowers = document.querySelectorAll('[data-show-popup]');
var popupClosers = document.querySelectorAll('[data-close-popup]');


setTimeout(() => {
    inputsError.forEach(p =>{
        p.style.display = 'none';
    });
}, 3500);

function cerrarDropdowns() {
    dropdownMenus.forEach(element => {
        if(!element.classList.contains('hidden')){
            element.classList.toggle("hidden");
        }
    });
}

//Cerrar dropdown cuando se hace fuera de él o en el mismo botón
window.addEventListener('click', event => {
    for (let index = 0; index < dropdownButtons.length; index++) {
        if(event.target != dropdownButtons[index]
            && event.target != dropdownButtons[index].querySelector('img')
        ){
            cerrarDropdowns();
            return;
        }
    }
});

//Cerrar popup cuando se hace click fuera de él
popups.forEach(element => {
    element.addEventListener('click', (event) => {
        if (event.target.classList.contains('popup')) {
            event.target.classList.add('hidden');
        }
    });
});

function mostrarPopup(event) {
    document.querySelector(event.target.getAttribute('data-show-popup')).classList.remove('hidden');
}

function cerrarPopup(event) {
    document.querySelector(event.target.getAttribute('data-close-popup')).classList.add('hidden');
}

popupShowers.forEach(element => {
    element.addEventListener('click',mostrarPopup);
});

popupClosers.forEach(element => {
    element.addEventListener('click',cerrarPopup);
});