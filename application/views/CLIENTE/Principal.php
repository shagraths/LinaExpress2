 <script src="<?php echo base_url() ?>../js/ajaxfileupload.js"></script>
<script src="<?php echo base_url() ?>../js/site.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>../js/funcionesCliente.js"></script>

 <form class="form-horizontal" role="form" method="post" action="" id="leerExcel">
    <div class="row">       
      <div class="col-xs-12 col-md-8">
        <div class="form-group">
          <label for="inputLabel3" class="col-md-4 control-label">Seleccione un Archivo :</label>
          <div class="col-md-8">            
            <input type="file" name="userfile" id="userfile" size="20" class="form-control" />
          </div>
        </div>
      </div>
  
      <div class="col-xs-6 col-md-4">
        <div class="form-group">          
          <div class="col-md-8">
            <input type="submit" name="submit" id="submit" />
          </div>
        </div>
      </div>     
    </div>    
  </form>

  <div class="row">
    <div class="col-xs-6 col-md-4" align="right">
      <input disabled id="nombre" type="hidden">
      <button id="guardar_excelCliente" class="btn btn-success" disabled>Guardar</button>
    </div>
    <div class="col-xs-6 col-md-4" align="right">
      <button id="limpiar_excelCliente"  class="btn btn-warning" disabled>Limpiar</button>
    </div>
  </div>

  <div class="margen-tabla">
    <div  class="headSeccion tabla row row-view">
      <span class="fa-stack fa-lg">
          <i class="fa fa-list fa-stack-1x fa-inverse"></i>
      </span>
      <label class="tituloSeccion">Listado</label>      
    </div>
  </div>
  <div id="lecturaExcel" class="table-responsive">
    
  </div>