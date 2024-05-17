// Mostrar imagen seleccionada del dispositivo
document.getElementById('inputImg').addEventListener('input', function () {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.getElementById('imagenSeleccionada');
            img.src = e.target.result;
            img.style.background = 'none';
        };
        reader.readAsDataURL(file);
    }
    document.getElementById('profile_img_edit').querySelector('button[type=submit]').disabled = false;
});

//Excepción al seleccionar Whatsapp para crear nueva Red Social
document.querySelectorAll('[data-select-social-media]').forEach(element => {
    element.addEventListener('change', inputWhatsapp);
});

function inputWhatsapp(event) {
    // let div = document.querySelector(event.target.getAttribute('data-select-social-media'));
    // div.classList.remove('hidden');
    // div.querySelector('label').textContent = (event.target.value == 4) ? "Número:" : "Link de perfil:";
    // document.getElementById('enviar_editar_crear').disabled = false;
}

//Editar social media
// document.querySelectorAll('.input-edit-social-media').forEach(element => {
//     element.addEventListener('input', (event) => {
//         event.target.form.querySelector('button[type="submit"]').disabled = false;
//     });
// });