const dropdownMenus = document.querySelectorAll(".dropdown-menu");
const dropdownButtons = document.querySelectorAll(".dropdown-button");
const inputsError = document.querySelectorAll(".input-error");
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