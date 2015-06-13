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
            <li id="sector" class="active menuSistema" onclick="clickMenu('sector')">
              <a href="#" >
                <i class="glyphicon glyphicon-tree-conifer" ></i><span>Sector</span> 
              </a>
            </li>
            <li id="ciudad" class="menuSistema" onclick="clickMenu('ciudad')">
              <a href="#">
                <i class="glyphicon glyphicon-road"></i><span>Ciudad</span>
              </a>
            </li>
            <li id="tipoCarta" class="menuSistema" onclick="clickMenu('tipoCarta')">
              <a href="#">
                <i class="glyphicon glyphicon-envelope"></i><span>Tipo Carta</span>
              </a>
            </li>
            <li id="precio" class="menuSistema" onclick="clickMenu('precio')">
              <a href="#">
                <i class="glyphicon glyphicon-usd"></i> <span>Precio</span>
              </a>
            </li>
            <li id="empresas" class="menuSistema" onclick="clickMenu('empresas')">
              <a href="#">
                <i class="glyphicon glyphicon-globe"></i> <span>Empresas</span>
              </a>
            </li>
            <li id="usuario" class="menuSistema" onclick="clickMenu('usuario')">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i> <span>Usuario</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->