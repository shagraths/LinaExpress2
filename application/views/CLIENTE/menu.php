<script type="text/javascript" src="<?= base_url(); ?>../js/funcionesMenu.js"></script>
<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Eduardo Vergara</p>

              <a href="#"><i class="glyphicon glyphicon-ok-circle"></i> Online</a>
            </div>
          </div>
      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menú</li>      
            <!--li con id's y la clase contiene active el seleccionado por defecto y todos contienen menuCliente-->              
            <li id="subirArchivos" class="active menuSistema" onclick="clickMenu('subirArchivos')">
              <a href="#">
                <i class="glyphicon glyphicon-open"></i> <span> Subir Archivos</span> 
              </a>
            </li>
            <li id="misArchivos" class="menuSistema" onclick="clickMenu('misArchivos')">
              <a href="#">
                <i class="glyphicon glyphicon-folder-open"></i> <span> Mis Archivos</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->