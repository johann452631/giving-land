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

popups.forEach(element => {
    element.addEventListener('click', function (e) {
        if (e.target.classList.contains('popup')) {
            e.target.classList.add('hidden');
        }
    });
});

popupShowers.forEach(element => {
    element.addEventListener('click',(event) => {
        document.querySelector(event.target.getAttribute('data-show-popup')).classList.remove('hidden');
    });
});

popupClosers.forEach(element => {
    element.addEventListener('click',(event) => {
        document.querySelector(event.target.getAttribute('data-close-popup')).classList.add('hidden');
    });
});