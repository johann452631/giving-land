const dropdowns = document.querySelectorAll(".dropdown-menu");
const dropdownButtons = document.querySelectorAll('[data-toggle-node="dropdown"]');
const inputsError = document.querySelectorAll(".input-error");
var popups = document.querySelectorAll('.popup');
var popupShowers = document.querySelectorAll('[data-show-popup]');
var popupClosers = document.querySelectorAll('[data-close-popup]');


setTimeout(() => {
    inputsError.forEach(p => {
        p.style.display = 'none';
    });
}, 3500);

dropdownButtons.forEach(element => {
    element.addEventListener('click', (event) => {
        let openDropdown = getOpenDropdown();
        if (openDropdown !== null && openDropdown !== event.target.nextElementSibling) {
            openDropdown.classList.add('hidden');
        }

        event.target.nextElementSibling.classList.toggle('hidden');
    });
});


function getOpenDropdown() {
    let dropdown = null;
    dropdowns.forEach(element => {
        if (!element.classList.contains('hidden')) {
            dropdown = element;
        }
    });
    
    return dropdown;
}

//Cerrar dropdown cuando se hace fuera de él o en el mismo botón
window.addEventListener('click', event => {

    let openDropdown = getOpenDropdown();
    if (openDropdown !== null) {
        if (event.target != openDropdown && event.target != openDropdown.previousElementSibling) {
            openDropdown.classList.add('hidden');
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
    element.addEventListener('click', mostrarPopup);
});

popupClosers.forEach(element => {
    element.addEventListener('click', cerrarPopup);
});