<option id="SELECCIONE">Seleccione</option>
<?php foreach ($perfil as $fila):?>
<option value="<?=$fila->ID_r?>"><?=$fila->Perfil?></option>
<?php endforeach; ?>