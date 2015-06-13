 
 <form class="form-horizontal" role="form">
    <div class="row">
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="inputEmail" class="col-md-4 control-label">Nombre:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="txtNombre" placeholder="Nombre" value="<?php echo $nombre?>">
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="inputPassword" class="col-md-4 control-label">Password:</label>
          <div class="col-md-8">
            <input type="password" class="form-control" id="txtPass" placeholder="Nueva Clave">
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="inputPassword" class="col-md-4 control-label">Repetir Password:</label>
          <div class="col-md-8">
            <input type="password" class="form-control" id="txtRepetirPass" placeholder="Nueva Clave">
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="inputLabel3" class="col-md-4 control-label">Perfil:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="txtPerfil" placeholder="Label 3" value="<?php echo $Perfil?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="form-group">
          <label for="inputLabel4" class="col-md-4 control-label">Estado:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="txtEstado" placeholder="Label 4" value="<?php echo $estado?>" readonly>
          </div>
        </div>
      </div>    
  </form>
<div class="row">
  
  <div class="col-md-12" align="right">    
      <button id="btnGuardarPerfil" class="btn btn-warning">Actualizar</button>    
  </div>
</div>