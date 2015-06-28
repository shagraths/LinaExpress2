<?php if ($cantidad == 0): ?>
    <table>
        <thead align="center">
            <th align="center">No registra sectores</th>    
        </thead>
    </table>    
<?php else: ?>
    <table class="table">
        <thead align="center">
        <th>N°</th>    
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Observacion</th>
        <th>Estado</th>    
        <th>Borrar</th> 
        <th>Cargar</th> 
        </thead>
        <tbody>
        <?php $i = 0; ?>
            <?php foreach ($sectores as $filas): ?>
            <?php $i++; ?>
            <?php if ($i % 2 == 0): ?>
            <tr align="center" class="success">
                <td><?= $filas->id_sector; ?></td>        
                <td><?= $filas->nombre_sector; ?></td>
                <td><?= $filas->nombre_ciudad; ?></td>
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_sector(<?= $filas->id_sector; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>        
                <td><button class="btn btn-warning" onclick="cargar_sector(<?= $filas->id_sector; ?>, '<?= $filas->nombre_sector; ?>', '<?= $filas->ciudad; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
            <?php else: ?>
            <tr align="center" class="warning" >
                <td><?= $filas->id_sector; ?></td>        
                <td><?= $filas->nombre_sector; ?></td>
                <td><?= $filas->nombre_ciudad; ?></td>
                <td><?= $filas->observacion; ?></td>
                <td><?= $filas->estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_sector(<?= $filas->id_sector; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>        
                <td><button class="btn btn-warning" onclick="cargar_sector(<?= $filas->id_sector; ?>, '<?= $filas->nombre_sector; ?>', '<?= $filas->ciudad; ?>', '<?= $filas->observacion; ?>', '<?= $filas->estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
           <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endif; ?>
