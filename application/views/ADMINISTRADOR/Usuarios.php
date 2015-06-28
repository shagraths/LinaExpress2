 <script type="text/javascript" src="<?= base_url(); ?>../js/funcionesAdmin.js"></script>

<script>
$("#guardar_user").button().click(function() {
        guardar_user();
    });
  $("#actualizar_user").button().click(function() {
        actualizar_user();
    }); 
  cargar_perfil();
  reporte_usuario();
</script>

<div id="formulario_tipocarta">
<form class="form-horizontal" role="form">
  <div class="row">
      <input type="text" id="id_user" hidden>

    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
            <label for="rut" class="col-md-4 control-label">Rut:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="rut" placeholder="11111111-1" maxlength="10">
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
            <label for="Nombres" class="col-md-4 control-label">Nombres:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="Nombres" placeholder="Juan Andres">
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
            <label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="Apellidos" placeholder="Soto Soto">
            </div>
        </div>
    </div>
<div class="row">
      <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="Tipo_user" class="col-md-4 control-label">Tipo Usuario:</label>
            <div class="col-md-8">
                <select id="Tipo_user" class="form-control">                                
                </select>
            </div>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="estado_user" class="col-md-4 control-label">Estado:</label>
            <div class="col-md-8">
                <select id="estado_user" class="form-control">                                
                <option value="SELECCIONE">SELECCIONE</option>
                <option value="ACTIVO" selected>Activo</option>
                <option value="INACTIVO">Inactivo</option>
                </select>
            </div>
          </div>
      </div>
</div>



  <div class="row">
    <div class="col-md-6" align="right">
      <button id="actualizar_user" class="btn btn-warning" disabled>Actualizar</button>
    </div>
    <div class="col-md-6" align="right">
      <button id="guardar_user" class="btn btn-success">Guardar</button>
    </div>   
  </div>

  </form>
</div>

<div id="reporte_usuario" class="table-responsive"></div>
  