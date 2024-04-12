@session('alert')
    <x-alert :message="$value['message']" class="alerta-{{ $value['type'] }}" id="divAlert">
    </x-alert>
    <script>
        divAlert = document.getElementById('divAlert');
        setTimeout(function() {
            divAlert.remove();
        }, 3500);
    </script>
@endsession
<script src={{ asset('js/global.js') }}></script>
</body>

</html>
