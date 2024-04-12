document.querySelector('#buttonLogin').addEventListener('click', mostrarModal);

const cliqueables = document.querySelectorAll('.cliqueable');
const inhabilitables = document.querySelectorAll('.inhabilitable');

function mostrarModal() {
    modal.style.display = 'flex';
    document.querySelector('#emailLogin').focus();
}

inhabilitables.forEach(input => {
    input.disabled = true;
});

cliqueables.forEach(lable => {
    lable.addEventListener('click', mostrarAlertaAuth);
});

function mostrarAlertaAuth() {
    window.alert('¡Se debe iniciar sesión para usar esta opción!')
}