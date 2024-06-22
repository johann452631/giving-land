var dropdowns;
var dropdownMenus;
window.addEventListener('load',()=>{
    dropdowns = document.querySelectorAll(".dropdown");
    dropdownMenus = document.querySelectorAll(".dropdown-menu");
    dropdowns.forEach(dropdown => {
        let button = dropdown.querySelector('.dropdown-button');
        button.addEventListener('click', () => {
            dropdown.querySelector('.dropdown-menu').classList.toggle('hidden');
        });
    });
    setTimeout(() => {
        document.querySelectorAll(".input-error").forEach(p => {
            p.remove();
        });
    }, 3500);
});
// var popups = document.querySelectorAll('.popup');
// var popupShowers = document.querySelectorAll('[data-show-popup]');
// var popupClosers = document.querySelectorAll('[data-close-popup]');




function getOpenDropdown() {
    let dropdownReturn = null;
    dropdowns.forEach(dropdown => {
        if (!dropdown.querySelector('.dropdown-menu').classList.contains('hidden')) {
            dropdownReturn = dropdown;
        }
    });
    return dropdownReturn;   
}

//Cerrar dropdown cuando se hace fuera de él o en el mismo botón
window.addEventListener('click', (event) => {

    console.log(getOpenDropdown());
    let openDropdown = getOpenDropdown();
    if(openDropdown != null && event.target != openDropdown.querySelector('.dropdown-menu') && event.target != openDropdown.querySelector('.dropdown-button')){
        openDropdown.querySelector('.dropdown-menu').classList.add('hidden');
    }
});

//Cerrar popup cuando se hace click fuera de él
// popups.forEach(element => {
//     element.addEventListener('click', (event) => {
//         if (event.target.classList.contains('popup')) {
//             event.target.classList.add('hidden');
//         }
//     });
// });

// function mostrarPopup(event) {
//     document.querySelector(event.target.getAttribute('data-show-popup')).classList.remove('hidden');
// }

// function cerrarPopup(event) {
//     document.querySelector(event.target.getAttribute('data-close-popup')).classList.add('hidden');
// }

// popupShowers.forEach(element => {
//     element.addEventListener('click', mostrarPopup);
// });

// popupClosers.forEach(element => {
//     element.addEventListener('click', cerrarPopup);
// });