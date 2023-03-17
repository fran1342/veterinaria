<script>
    $(function(){
        cargar_contenido();

        $(document).on('click','#btn_nuevo_veterinario',function(){
           $.ajax({
                url : "<?=base_url('veterinarios/abrir_formulario')?>",
                method : "get",
                success : function(respuesta){
                    $(document).find('#contenido_modal').empty().append(respuesta);
                }
           });
       });

    });

    function cargar_contenido(){
        $.ajax({
                url : "<?=base_url('veterinarios/mostrarContenido')?>",
                method : "get",
                success : function(respuesta){
                    $(document).find('#registro_contenido').empty().append(respuesta);

                    setTimeout(function(){
                        $(document).find('#tabla_veterinarios').DataTable({
                            responsive : true
                        });
                    }, 100);
                }
        });
    }
</script>