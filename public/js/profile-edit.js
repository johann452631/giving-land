document.getElementById('inputImg').addEventListener('change', function () {
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
});

const eliminarFotoButton = document.getElementById('eliminarFoto');

if (eliminarFotoButton != null) {
    eliminarFotoButton.addEventListener('click', function () {
        document.getElementById('popup').classList.remove('hidden');
    });
}

document.getElementById('popup').addEventListener('click', function (e) {
    if (e.target.id === 'popup' || e.target.classList.contains('cerrar-popup')) {
        document.getElementById('popup').classList.add('hidden');
    }
});