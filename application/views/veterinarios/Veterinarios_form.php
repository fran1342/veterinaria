<form id="form_veterinarios">

    <?php if(@$medico_seleccionado){ ?> 
        <input type="hidden" name="clave_e" id="clave_e" value="<?=@$medico_seleccionado->id_medico;?>">
        <input type="hidden" name="accion" id="accion" value="<?=@$accion;?>">
    <?php }?>

    <div class="modal-header">
    <?php
        if (@$accion) {
            if ($accion == "borrar") {
                $titulo = "Borrar";
                $titulo2 = $medico_seleccionado->tipo_usuari;
                
            }else {
                $titulo = "Editar";
                $titulo2 = $medico_seleccionado->tipo_usuario;
            }
      
        }else{
            $titulo = "Registrar";
            $titulo2 = "Selecciona una opci&oacute;n";
        }
  ?>
        
    <h5 class="modal-title">Formulario veterinarios - <?=$titulo?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                <label>Veterinario:</label>
                <select class="form-control" <?=@$accion == "borrar" ? 'disabled' : '';?> name="user_m" id="user_m">
                    <option value="" selected disabled><?=$titulo2;?></option>
                    <?php foreach($veterinarios as $iVeterinario){ ?>
                        <option value="<?=$iVeterinario->id_usuario;?>"><?=$iVeterinario->nombre_usuario;?></option>
                    <?php } ?>
                </select>
            </div>
        
            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                <label>Especialidad de medico:</label>
                <select class="form-control" <?=@$accion == "borrar" ? 'disabled' : '';?> name="especialidad_m" id="especialidad_m" values="<?=@$medico_seleccionado->especialidad_medico;?>">
                    <option value="" selected disabled><?=$titulo2?></option>
                    <option value="Cirugia">Cirugia</option>
                    <option value="Fisioterapia">Fisioterapia</option>
                    <option value="Rehabulitacion">Rehabilitacion</option>
                    <option value="Fauna silvestre">Fauna silvestre</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>