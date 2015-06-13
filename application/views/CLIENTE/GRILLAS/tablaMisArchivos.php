<? if ($cantidad == 0): ?>
    <table class="table">
        <thead align="center">
            <th>No registra Archivos!!</th>    
        </thead>
    </table>    
<? else: ?>
    <table>
        <thead align="center">
        <th>N°</th>    
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Fecha Subida</th>
        <th>Usuario Encargado</th> 
        <th>Estado</th>    
        <th>Borrar</th> 
        <th>Ver Planilla</th> 
    </thead>
    <tbody>
        <? $i = 0; ?>        
        <?php foreach ($archivos as $filas): ?>           
            <? $i++; ?>
            <? if ($i % 2 == 0): ?>
            <tr align="center" class="success">
                <td><?= $i;?></td>
                <td><?= $filas->Id_ExcelCliente; ?></td>        
                <td><?= $filas->NombreArchivo; ?></td>
                <td><?= $filas->FechaSubida; ?></td>
                <td><?= $filas->Nombres; ?></td>
                <td><?= $filas->Estado; ?></td>
                <td align="center"><button class="btn btn-danger" onclick="eliminarArchivo(<?= $filas->Id_ExcelCliente; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>        
                <td align="center"><button class="btn btn-primary" onclick="pdf_excelClientePlanilla('<?= $filas->NombreArchivo; ?>')"><span class="glyphicon glyphicon-new-window"></span></button></td>    
            </tr>
            <? else: ?>
            <tr align="center" class="warning">
                <td><?= $i;?></td>
                <td><?= $filas->Id_ExcelCliente; ?></td>        
                <td><?= $filas->NombreArchivo; ?></td>
                <td><?= $filas->FechaSubida; ?></td>
                <td><?= $filas->Nombres; ?></td>
                <td><?= $filas->Estado; ?></td>        
                <td align="center"><button class="btn btn-danger" onclick="eliminarArchivo(<?= $filas->Id_ExcelCliente; ?>)"><span class="glyphicon glyphicon-remove-circle"></span></button></td>        
                <td align="center"><button class="btn btn-primary" onclick="pdf_excelClientePlanilla('<?= $filas->NombreArchivo; ?>')"><span class="glyphicon glyphicon-new-window"></span></button></td>    
            </tr>
           <? endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<? endif;
