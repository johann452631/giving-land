document.getElementById('buttonLogin').addEventListener('click', mostrarModal);

document.getElementById('cerrarModal').addEventListener('click', cerrarModal);

const modal = document.getElementById('modalBase');
const cliqueables = document.querySelectorAll('.cliqueable');
const inhabilitables = document.querySelectorAll('.inhabilitable');

inhabilitables.forEach(input => {
    input.disabled = true;
});

cliqueables.forEach(lable => {
    lable.addEventListener('click', mostrarAlertaAuth);
});

function mostrarAlertaAuth() {
    window.alert('¡Se debe iniciar sesión para usar esta opción!')
}

function mostrarModal() {
    modal.style.display = 'flex';
    document.getElementById('emailLogin').focus();
}

function cerrarModal() {
    modal.style.display = 'none';
}

function cerrarModalVentana(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

window.addEventListener('click', cerrarModalVentana);