<option id="SELECCIONE">Seleccione</option>
<?php foreach ($ciudades as $fila):?>
<option value="<?=$fila->id_ciudad?>"><?=$fila->nombre_ciudad?></option>
<?php endforeach; ?>