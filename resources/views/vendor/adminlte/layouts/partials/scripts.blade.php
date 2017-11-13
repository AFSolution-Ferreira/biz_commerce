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

<script>
    function formatBR(value, decimais) {

        decimais = decimais || 2;
        var mi = value.length - parseInt(decimais);
        var sm = parseInt(mi / 3);
        var regx = "", repl = "";

        for (var i = 0; i < sm; i++) {
            regx = regx.concat('([0-9]{3})');
            repl = repl.concat('.$' + (i + 1));
        }

        regx = regx.concat('([0-9]{' + decimais + '})') + "$";
        repl = repl.concat(',$' + (sm + 1));
        value = value.toString().replace(new RegExp(regx, 'g'), repl);
        return (mi % 3) === 0 ? value.substr(1) : value;
    }
</script>

{{--MASCARA NO CASO DE TELEFONE COM 9 DIGITOS--}}
<script>
        (function($){
            $(function(){
                $('input:text').setMask();
                var ddds = ['11) 9','12) 9','13) 9','14) 9','15) 9','16) 9','17) 9','18) 9','19) 9','21) 9','22) 9','24) 9','27) 9','28) 9'];

                $('#id_telefone, #id_celular, #id_celular_validacao, #id_telefone').keydown(function(event) {
                    if( procura_no_array($(this).val().substring(1,6), ddds) >= 0){
                        $(this).attr('alt','phone_sp');
                    }else{
                        $(this).attr('alt','phone');
                    }
                    $(this).setMask();
                });
            });

        })(jQuery);
</script>

<script>
    (function($){
        $.mask.masks:{
            'phone'     : { mask : '(99) 9999-9999' },
            'phone-us'  : { mask : '(999) 9999-9999' },
            'cpf'       : { mask : '999.999.999-99' },
            'cnpj'      : { mask : '99.999.999/9999-99' },
            'date'      : { mask : '39/19/9999' }, //uk date
            'date-us'   : { mask : '19/39/9999' },
            'cep'       : { mask : '99999-999' },
            'time'      : { mask : '29:69' },
            'cc'        : { mask : '9999 9999 9999 9999' }, //credit card mask
            'integer'   : { mask : '999.999.999.999', type : 'reverse' },
            'decimal'   : { mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' },
            'decimal-us'    : { mask : '99.999,999,999,999', type : 'reverse', defaultValue: '000' },
            'signed-decimal'    : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' },
            'signed-decimal-us' : { mask : '99,999.999.999.999', type : 'reverse', defaultValue : '+000' }
        }
    })

</script>