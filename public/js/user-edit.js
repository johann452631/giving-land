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