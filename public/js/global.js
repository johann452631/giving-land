document.querySelector('#cerrarModal').addEventListener('click', cerrarModal);

const modal = document.getElementById('modalBase');

const dropdownMenus = document.querySelectorAll(".dropdown-menu");
const dropdownButtons = document.querySelectorAll(".dropdown-button");

function cerrarModal() {
    modal.style.display = 'none';
}

function cerrarDropdowns() {
    dropdownMenus.forEach(element => {
        if(!element.classList.contains('hidden')){
            element.classList.toggle("hidden");
        }
    });
}

window.addEventListener('click', event => {
    if (event.target == modal) {
        cerrarModal();
        return;
    }

    for (let index = 0; index < dropdownButtons.length; index++) {
        if(event.target != dropdownButtons[index] && event.target != dropdownButtons[index].querySelector('svg')){
            cerrarDropdowns();
            return;
        }
    }
});