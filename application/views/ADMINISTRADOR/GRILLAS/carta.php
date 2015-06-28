<?php if ($cantidad == 0): ?>
    <table> 
        <thead align="center">
            <th>No registra Tipos de Cartas!</th>   
        </thead>
    </table> 
<?php else: ?>
    <table class="table">
        <thead align="center">
        <th>N°</th>    
        <th>Tipo</th>
        <th>Observacion</th>
        <th>Estado</th>    
        <th>Borrar</th>
        <th>Cargar</th>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach ($cartas as $filas): ?>
            <?php $i++; ?>
            <?php if ($i % 2 == 0): ?>
            <tr align="center" class="success">
                <td><?= $filas->id_tipoCarta; ?></td>        
                <td><?= $filas->Nombre; ?></td>
                <td><?= $filas->Observacion; ?></td>
                <td><?= $filas->Estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_tipo_carta(<?= $filas->id_tipoCarta; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                <td><button class="btn btn-warning" onclick="cargar_carta(<?= $filas->id_tipoCarta; ?>, '<?= $filas->Nombre; ?>', '<?= $filas->Observacion; ?>', '<?= $filas->Estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
            <?php else: ?>
            <tr align="center" class="warning">
                <td><?= $filas->id_tipoCarta; ?></td>        
                <td><?= $filas->Nombre; ?></td>
                <td><?= $filas->Observacion; ?></td>
                <td><?= $filas->Estado; ?></td>        
                <td><button class="btn btn-danger" onclick="eliminar_tipo_carta(<?= $filas->id_tipoCarta; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                <td><button class="btn btn-warning" onclick="cargar_carta(<?= $filas->id_tipoCarta; ?>, '<?= $filas->Nombre; ?>', '<?= $filas->Observacion; ?>', '<?= $filas->Estado; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>    
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endif;