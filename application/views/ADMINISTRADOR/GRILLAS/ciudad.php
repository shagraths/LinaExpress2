<?php if ($cantidad == 0): ?>
    <table>
        <thead align="center">
            <th>No registra ciudades!!</th>    
        </thead>
    </table> 
<?php else: ?>
    <table class="table">
        <thead align="center">
        <th>N°</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Observacion</th>
        <th>Estado</th>
        <th>Borrar</th>
        <th>Cargar</th>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach ($ciudades as $filas): ?>
            <?php $i++; ?>
            <?php if ($i % 2 == 0): ?>
            <tr align="center" class="success">
                <td><?= $filas->id_ciudad; ?></td>
                <td><?= $filas->nombre_ciudad; ?></td>        
                <td><?= $filas->tipo_ciudad; ?></td> 
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_ciudad(<?= $filas->id_ciudad; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                <td><button class="btn btn-warning" onclick="cargar_ciudad(<?= $filas->id_ciudad; ?>, '<?= $filas->nombre_ciudad; ?>','<?= $filas->tipo_ciudad; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
            <?php else: ?>
            <tr align="center" class="warning">
                <td><?= $filas->id_ciudad; ?></td>
                <td><?= $filas->nombre_ciudad; ?></td>        
                <td><?= $filas->tipo_ciudad; ?></td> 
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_ciudad(<?= $filas->id_ciudad; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                <td><button class="btn btn-warning" onclick="cargar_ciudad(<?= $filas->id_ciudad; ?>, '<?= $filas->nombre_ciudad; ?>','<?= $filas->tipo_ciudad; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endif;