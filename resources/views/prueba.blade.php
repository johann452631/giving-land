<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @session('alert')
        <div id="divAlert">
            {{ session('alert')['uno'] }}

        </div>
    @endsession
    <script>
        alert = document.getElementById('divAlert');
        setTimeout(function() {
            alert.remove();
        }, 3000);
    </script>
</body>

</html>
