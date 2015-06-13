<? if ($cantidad == 0): ?>
    <label>no registra tipos de cartas!!</label>
<? else: ?>
    <table>
        <thead align="center">
        <th>N°</th>    
        <th>Tipo</th>
        <th>Observacion</th>
        <th>Estado</th>    
        <th>Borrar</th>
        <th>Cargar</th>
    </thead>
    <tbody>
        <? $i = 0; ?>
        <?php foreach ($cartas as $filas): ?>
            <? $i++; ?>
            <? if ($i % 2 == 0): ?>
            <tr align="center">
                <td><?= $filas->id_carta; ?></td>        
                <td><?= $filas->tipo; ?></td>
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button onclick="eliminar_tipoCarta(<?= $filas->id_carta; ?>)"><span class="ui-icon ui-icon-trash"></span></button></td>
                <td><button onclick="cargar_carta(<?= $filas->id_carta; ?>, '<?= $filas->tipo; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="ui-icon ui-icon-circle-arrow-n"></span></button></td>    
            </tr>
            <? else: ?>
            <tr align="center" class="alt">
                <td><?= $filas->id_carta; ?></td>        
                <td><?= $filas->tipo; ?></td>
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button onclick="eliminar_tipoCarta(<?= $filas->id_carta; ?>)"><span class="ui-icon ui-icon-trash"></span></button></td>
                <td><button onclick="cargar_carta(<?= $filas->id_carta; ?>, '<?= $filas->tipo; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="ui-icon ui-icon-circle-arrow-n"></span></button></td>    
            </tr>
        <? endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<? endif;