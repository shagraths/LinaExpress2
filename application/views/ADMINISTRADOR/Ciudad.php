 <script type="text/javascript" src="<?= base_url(); ?>../js/funcionesAdmin.js"></script>

<script>
   $("#guardar_ciudad").button().click(function() {
        guardar_ciudad();
    });
    $("#actualizar_ciudad").button().click(function() {
        actualizar_ciudad();
    }); 
     
    bloquear_id_ciudad();
</script>
<div id="formulario_ciudad">
<form class="form-horizontal" role="form">
  <div class="row">
      <input type="text" id="id_ciudad" hidden>

    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
            <label for="nombre_ciudad" class="col-md-4 control-label">Ciudad:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="nombre_ciudad" placeholder="Nombre Ciudad">
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="form-group"><label for="tipo_ciudad" class="col-md-4 control-label">Tipo:</label>
            <div class="col-md-8">
                <select id="tipo_ciudad" class="form-control">                                
                    <option value="SELECCIONE">SELECCIONE</option>
                    <option value="URBANO">Urbano</option>
                    <option value="RURAL">Rural</option>
                </select>
            <!--<input type="password" class="form-control" id="tipo_ciudad" placeholder="Password">-->
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="obs_ciudad" class="col-md-4 control-label">Observación:</label>
          <div class="col-md-8">
            <textarea class="ui-corner-all" type="text" id="obs_ciudad" size="16" /></textarea>
          </div>
        </div>
    </div>
</div>
  <div class="row">    
      <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="estado_ciudad" class="col-md-4 control-label">Estado:</label>
            <div class="col-md-8">
                <select id="estado_ciudad" class="form-control">                                
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
      <button id="actualizar_ciudad" class="btn btn-warning" disabled>Actualizar</button>
    </div>
     <div class="col-md-6" align="right">
      <button id="guardar_ciudad" class="btn btn-success">Guardar</button>
    </div>   
  </div>

  </form>
</div>

<div id="reporte_ciudad" class="table-responsive"></div>
  