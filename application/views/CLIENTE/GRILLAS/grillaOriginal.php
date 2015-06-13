<table class="table table-condensed table-nonfluid" id="tGrillaExcel">    
    <thead align="center">
        <th>N°</th>
        <th>Fecha Entrega</th>
        <th>Tipo Carta</th>
        <th>Numero Carta</th>
        <th>Rit</th>
        <th>Nombre Receptor</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Tipo Destino</th>
        <th>Telefono</th>
    </thead>
    <tbody>
    <? $i = 0; ?>    
    <?php foreach($excel as $array) : ?>  
         <? $primeraVez = 0;?>       
        <?php foreach ($array as $row) :?>
            <? if ($i == 0): ?>
                <?$i++ ?>
            <? else: ?>
                <? if ($i % 2 == 0): ?>            
                     <tr align="center" class="menu">
                        <td><?= $i++ ?></td>
                        <?php foreach ($row as $col) : ?>
                            <? if ($primeraVez == 0): ?> 
                                <?$primeraVez++ ?>                               
                            <? else: ?>
                                <td><?=$col?></td>
                            <? endif; ?> 
                        <?php endforeach; ?>
                     </tr>               
                <? else: ?>    
                    <tr align="center" class="menu">
                        <td><?= $i++ ?></td>
                        <?php foreach ($row as $col) : ?>
                            <? if ($primeraVez == 0): ?> 
                                <?$primeraVez++ ?>                               
                            <? else: ?>
                                <td><?=$col?></td>
                            <? endif; ?> 
                        <?php endforeach; ?>
                    </tr> 
                <? endif; ?> 
            <? endif;?>
         <?php endforeach; ?>
    <?php endforeach; ?>
</table>