<script src="<?php echo base_url() ?>../js/perfil.js"></script>
<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $nombre?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $nombre?> - <?php echo $Perfil?>
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button id="cerrar" class="btn btn-warning" onclick="cargar_Perfil()" data-toggle="tooltip" data-placement="bottom" title="Ir al perfil"> Perfil</button> 
                    </div>
                    <div class="pull-right">                                          
                      <button id="cerrar" class="btn btn-danger" onclick="cerrar_sesion()" data-toggle="tooltip" data-placement="bottom" title="Salir del Sistema"> Cerrar sesion</button> 
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>