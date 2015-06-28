 <script type="text/javascript" src="<?= base_url(); ?>../js/funcionesAdmin.js"></script>

<script>
  $("#guardar_tipo_carta").button().click(function() {
        guardar_tipo_carta();
    });
  $("#actualizar_tipo_carta").button().click(function() {
        actualizar_tipo_carta();
    }); 
     
    bloquear_id_TipoCarta();
</script>

<div id="formulario_tipocarta">
<form class="form-horizontal" role="form">
  <div class="row">
      <input type="text" id="Id_tipoCarta" hidden>

    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
            <label for="txt_tipo" class="col-md-4 control-label">Tipo Carta:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="txt_tipo" placeholder="Nombre tipo carta">
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="txt_observacion" class="col-md-4 control-label">Observación:</label>
          <div class="col-md-8">
            <textarea class="ui-corner-all" type="text" id="txt_observacion" size="16" /></textarea>
          </div>
        </div>
    </div>

 
      <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="estado_carta" class="col-md-4 control-label">Estado:</label>
            <div class="col-md-8">
                <select id="estado_carta" class="form-control">                                
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
      <button id="actualizar_tipo_carta" class="btn btn-warning" disabled>Actualizar</button>
    </div>
     <div class="col-md-6" align="right">
      <button id="guardar_tipo_carta" class="btn btn-success">Guardar</button>
    </div>   
  </div>

  </form>
</div>

<div id="reporte_carta" class="table-responsive"></div>
  