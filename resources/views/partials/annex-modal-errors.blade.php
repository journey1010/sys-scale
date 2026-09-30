{{--
    Los errores de validacion del formulario de anexos se renderizan DENTRO del
    modal, que tras el redirect vuelve cerrado. Sin esto el usuario no ve ni el
    modal ni el mensaje y no sabe si el anexo se guardo o no.

    Solo reabre el modal de anexos: se limita a los errores de sus propios campos
    (name, number_doc, date, file_url) para no abrirlo por errores de otros
    formularios de la misma pagina.
--}}
@php
    $annexFields = ['name', 'number_doc', 'date', 'file_url'];
    $annexHasErrors = false;

    foreach($annexFields as $annexField)
    {
        if($errors->has($annexField)) $annexHasErrors = true;
    }
@endphp

@if($annexHasErrors)
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    </script>
@endif
