const dropdownMenus = document.querySelectorAll(".dropdown-menu");
const dropdownButtons = document.querySelectorAll(".dropdown-button");

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
            && event.target != dropdownButtons[index].querySelector('svg')
            && event.target != dropdownButtons[index].querySelector('img')
        ){
            cerrarDropdowns();
            return;
        }
    }
});