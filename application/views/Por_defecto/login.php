<div id="login">
  <div class="container">
  <div class="row">
    <div class="col-xs-1 col-sm-4 col-md-4 col-lg-4"></div>
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4 centerTable">
      <br><br><br><br><br>
      <table>
        <tr>
            <td align="center">
              <img id="avatarLogin" src="bootstrap/css/su/avatarDefecto2.png" alt="Avatar Usuario Logueado" class="img-responsive img-circle">
            </td>
        </tr>
        <tr>
          <td align="center">
            <h1 class="saludo">Bienvenido</h1>
          </td>
        </tr>
        <tr>
          <td align="center">
              <label id="userLogin"></label>
              <input type="text" id="user" placeholder= "Usuario" style="text-align: center; width: 100%;">
              <input type="password" id="pass" placeholder= "Contraseña" style="margin-top: 2%; text-align: center; width: 100%;" onkeyup = "if (event.keyCode == 13)
                                            btn_conectar()">
          </td>
        </tr>
        <tr>
          <td align="center">           
           <button id="conectar" class="btn btn-primary" style="text-align: center; width: 100%; margin-top: 2%;">Ingresar</button>
          </td>
        </tr>     
      </table>
    </div>
    <div class="col-xs-1 col-sm-4 col-md-4 col-lg-4"></div>
  </div>
</div>
</div>
