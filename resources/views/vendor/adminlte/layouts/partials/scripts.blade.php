<!-- REQUIRED JS SCRIPTS -->

<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

{{--CRIANDO MASCARAS NO FORMULARIO--}}
<script>
    function mascara(t, mask){
        var i = t.value.length;
        var exit = mask.substring(1,0);
        var text = mask.substring(i)
        if (text.substring(0,1) != exit){
            t.value += text.substring(0,1);
        }
    }
</script>