<? if ($cantidad == 0): ?>
    <label>no registra trabajadores!!</label>
<? else: ?>
    <table>
        <thead align="center">
        <th>Tipo</th>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Sexo</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Mail</th>    
    </thead>
    <tbody>
        <? $i = 0; ?>
        <?php foreach ($usuarios as $filas): ?>
            <? $i++; ?>
            <? if ($i % 2 == 0): ?>
                <tr align="center">      
                    <td><?= $filas->tipo; ?></td>
                    <td><?= $filas->rut; ?></td>
                    <td><?= $filas->nombre; ?></td>
                    <td><?= $filas->apellido; ?></td>
                    <td><?= $filas->sexo; ?></td>
                    <td><?= $filas->telefono; ?></td>
                    <td><?= $filas->direccion; ?></td>
                    <td><?= $filas->mail; ?></td>        
                </tr>
                <? else: ?>
                <tr align="center" class="alt">      
                    <td><?= $filas->tipo; ?></td>
                    <td><?= $filas->rut; ?></td>
                    <td><?= $filas->nombre; ?></td>
                    <td><?= $filas->apellido; ?></td>
                    <td><?= $filas->sexo; ?></td>
                    <td><?= $filas->telefono; ?></td>
                    <td><?= $filas->direccion; ?></td>
                    <td><?= $filas->mail; ?></td>        
                </tr>
            <? endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<? endif; 