@if (Session::has('AppMessage'))
    <script>
        alert("{!! Session::get('AppMessage') !!}")
    </script>
@endif