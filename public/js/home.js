const modal = document.getElementById('modalBase');
const divArticulos = document.getElementById('divArticulos');
const divUsuario = document.getElementById('divUsuario');

const formLogin = document.getElementById('formLogin');
const formCorreo = document.getElementById('formSignupCorreo');
const formCodigo = document.getElementById('formSignupCodigo');
const formDatos = document.getElementById('formSignupDatos');

function iniciarJS() {
    modal.style.display = "none";
    // crearTarjetas();
    cerrarSesion();
}

formLogin.querySelector('button').addEventListener('click', validarLogin);
formCorreo.querySelector('button').addEventListener('click', enviarCodigo);
formCodigo.querySelector('button').addEventListener('click', validarCodigo);
formDatos.querySelector('button').addEventListener('click', registrar);

// document.getElementById('buttonLogin').addEventListener('click', mostrarModalLogin);
document.getElementById('buttonSignup').addEventListener('click', mostrarModalSignup);

function validarLogin(event) {
    let cajaEmail = formLogin.querySelector('input[type="text"');
    let cajaPassword = formLogin.querySelector('input[type="password"]');
    for (let index = 0; index < usuarios.length; index++) {
        if (usuarios[index].correo == cajaEmail.value && usuarios[index].contrasena == cajaPassword.value) {
            modal.style.display = 'none';
            alert('¡Inició sesión con éxito!');
            habilitarCuenta();
            return;
        }
    }
    alert('¡Ups! El correo o la contraseña son incorrectos.')
    event.preventDefault();
}

function mostrarModalLogin() {
    formCorreo.style.display = 'none';
    formCodigo.style.display = 'none';
    formDatos.style.display = 'none';
    modal.style.display = 'flex';
    formLogin.style.display = 'flex';
    // formLogin.reset();
}

function mostrarModalSignup() {
    formLogin.style.display = 'none';
    modal.style.display = 'flex';
    formCodigo.style.display = 'none';
    formDatos.style.display = 'none';
    formCorreo.style.display = 'flex';
}

function enviarCodigo() {
    formDatos.style.display = 'none';
    formCorreo.style.display = 'none';
    // formDatos.querySelector('')
    formDatos.querySelector('input[readonly]').value = formCorreo.querySelector('input').value;
    formCodigo.style.display = 'flex';
}

function validarCodigo() {
    let codigo = '';
    let inputs = document.getElementById('divCodigoVerificacion').querySelectorAll('input');
    let codigoarray = codigo.split("");
    for (let index = 0; index < codigoarray.length; index++) {
        if (inputs[index].value != codigoarray[index]) {
            return alert('¡El código es incorrecto!');
        }
    }
    alert('¡Se verificó el código!');
    formCorreo.style.display = 'none';
    formCodigo.style.display = 'none';
    formDatos.style.display = 'flex';
}

function registrar() {
    let inputs = formDatos.querySelectorAll('input');
    let valores = [];
    inputs.forEach(input => {
        valores.push(input.value);
    })
    usuarios.push(new Usuario(valores[0], valores[1], valores[2], valores[3], valores[4], valores[5]));
    alert('se registró');
    modal.style.display = 'none';
}

function cerrarModal(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
function habilitarCuenta() {
    divBotonesLog.style.display = 'none';
    divUsuario.style.display = 'block';
    let inhabilitables = document.querySelectorAll('.inhabilitable');
    let cliqueables = document.querySelectorAll('.cliqueable');
    let aPublicar = document.getElementById('aPublicar');
    inhabilitables.forEach(ob => {
        ob.disabled = false;
    })
    cliqueables.forEach(ob=>{
        ob.removeEventListener('click',alertaSinCuenta);
    })
    aPublicar.removeEventListener('click',alertaSinCuenta);
}

function cerrarSesion() {
    divUsuario.style.display = 'none';
    divBotonesLog.style.display = 'block';
    let inhabilitables = document.querySelectorAll('.inhabilitable');
    let cliqueables = document.querySelectorAll('.cliqueable');
    inhabilitables.forEach(ob => {
        ob.disabled = true;
    });
    cliqueables.forEach(ob=>{
        ob.addEventListener('click',alertaSinCuenta);
    });
}

function alertaSinCuenta() {
    alert('¡Debes iniciar sesión para usar esta opción!')
}

window.addEventListener('click', cerrarModal);
window.addEventListener('load', iniciarJS)