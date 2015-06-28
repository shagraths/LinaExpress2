<script type="text/javascript" src="<?= base_url(); ?>../js/funcionesAdmin.js"></script>
<script>
   $("#guardar_sector").button().click(function() {
        guardar_sector();
    });
    $("#actualizar_sector").button().click(function() {
        actualizar_sector();
    }); 
     
    bloquear_id_sector();
</script>


<div id="formulario_sector">
 <form class="form-horizontal" role="form">
    <div class="row">
        <input type="text" id="id_sector" hidden>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="nombre_sector" class="col-md-4 control-label">Nombre Sector:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="nombre_sector" placeholder="Sector">
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="form-group"><label for="sector_ciudad" class="col-md-4 control-label">Ciudad:</label>
            <div class="col-md-8">
                <select id="sector_ciudad" class="form-control">                
                </select>
            <!--<input type="password" class="form-control" id="tipo_ciudad" placeholder="Password">-->
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="obs_sector" class="col-md-4 control-label">Observación:</label>
          <div class="col-md-8">
            <textarea class="form-control" type="text" id="obs_sector" size="16" /></textarea>
          </div>
        </div>
    </div>
</div>
<div class="row">    
    <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="estado_sector" class="col-md-4 control-label">Estado:</label>
          <div class="col-md-6">
              <select id="estado_sector" class="form-control">                                
              <option value="SELECCIONE">SELECCIONE</option>
              <option value="ACTIVO" selected>Activo</option>
              <option value="INACTIVO">Inactivo</option>
              </select>
           <!--<input type="text" class="form-control" id="input5" placeholder="input 5">-->
          </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-6" align="right">
    <button id="actualizar_sector" class="btn btn-warning" disabled>Actualizar</button>
  </div>
   <div class="col-md-6" align="right">
    <button id="guardar_sector" class="btn btn-success">Guardar</button>
  </div>   
</div>
  </form>


<div id="reporte_sector" class="table-responsive"></div>
  