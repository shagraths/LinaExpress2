<?php if ($cantidad == 0): ?>
    <label>no registra usuarios</label>
<?php else: ?>
    <table class="table">
        <thead align="center">
        <th>Id</th>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cargo</th>
        <th>Estado</th>   
        <th>Borrar</th>
        <th>Cargar</th>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach ($usuario as $filas): ?>
            <?php $i++; ?>
            <?php if ($i % 2 == 0): ?>
                <tr align="center" class="success">      
                    <td><?= $filas->ID; ?></td>
                    <td><?= $filas->Rut; ?></td>
                    <td><?= $filas->Nombres; ?></td>
                    <td><?= $filas->Apellidos; ?></td>
                    <td><?= $filas->Perfil; ?></td>
                    <td><?= $filas->Estado_U; ?></td>    
                    <td><button class="btn btn-danger" onclick="eliminar_user(<?= $filas->ID; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                    <td><button class="btn btn-warning" onclick="cargar_user(<?= $filas->ID; ?>, '<?= $filas->Rut; ?>', '<?= $filas->Nombres; ?>','<?= $filas->Apellidos; ?>', '<?= $filas->Perfil; ?>','<?= $filas->Estado_U; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>       
                </tr>
                <?php else: ?>
                <tr align="center" class="warning">      
                    <td><?= $filas->ID; ?></td>
                    <td><?= $filas->Rut; ?></td>
                    <td><?= $filas->Nombres; ?></td>
                    <td><?= $filas->Apellidos; ?></td>
                    <td><?= $filas->Perfil; ?></td>
                    <td><?= $filas->Estado_U; ?></td>
                    <td><button class="btn btn-danger" onclick="eliminar_user(<?= $filas->ID; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>
                    <td><button class="btn btn-warning" onclick="cargar_user(<?= $filas->ID; ?>, '<?= $filas->Rut; ?>', '<?= $filas->Nombres; ?>', '<?= $filas->Apellidos; ?>', '<?= $filas->Perfil; ?>', '<?= $filas->Estado_U; ?>')"><span class="glyphicon glyphicon-circle-arrow-up"></span></button></td>            
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endif; 