$(document).ready(function () {        
    verificarLogin();    
});

function verificarLogin() {   
    //cerrar_sesion();
    $.post(
            base_url + "welcome/verificarLogin",
            {},
            function (datos) {
                if (datos.valor == 1) {                    
                    $("#login").hide('fast');//esconder
                    $.post(
                        base_url + "welcome/cargar_vista_principal", {}, function (ruta) {
                        $("#contentidoPagina").html(ruta);
                    }
                    );    
                    cargar_modalUsuario();              
                    if (datos.tipo == 1) {//supervisor
                        $.post(
                                base_url + "welcome/principal_supervisor", {}, function (ruta) {
                            $("#content").html(ruta);
                        }
                        );
                    } else {
                        if (datos.tipo == 3) {//cliente
                            cargar_cliente();   
                            var accion = "Cliente";
                            var modulo = "Subir Archivo";
                            var icono = "glyphicon glyphicon-cloud-upload";
                            cargar_contenidoPaginaXusuario(modulo,accion,icono);        
                        }else{                            
                            //ADMIN
                            cargar_admin(); 
                            var accion = "Administrador";
                            var modulo = "Gestión Sector";
                            var icono = "glyphicon glyphicon-tree-conifer";
                            cargar_contenidoPaginaXusuario(modulo,accion,icono);  
                        }
                    }
                } else {//sin login                    
                    $("#cerrar_session").hide();
                    $.post(
                            base_url + "welcome/cargar_login", {}, function (ruta) {
                        $("#contentidoPagina").html(ruta);                        
                        $('#conectar').click(function () {                            
                            btn_conectar();
                        });
                        $("#login").show();
                    }
                    );
                }
            },
            'json'
            );
}


function btn_conectar() {
    var nombre = $('#user').val();
    var clave = $('#pass').val();    
    if (nombre == '' || clave == '') {
        alert("debe llenar campos!!");
    } else {
        $.post(
                base_url + "welcome/conectar",
                {nombre: nombre, clave: clave},
        function (datos) {
            if (datos.valor == 1) {                
                $("#login").hide('fast');
                $.post(
                        base_url + "welcome/cargar_vista_principal", {}, function (ruta) {
                        $("#contentidoPagina").html(ruta);
                    }
                    );             
                cargar_modalUsuario();
                if (datos.tipo == 1) {                    
                    $.post(
                            base_url + "welcome/principal_supervisor", {}, function (ruta) {
                        $("#content").html(ruta);
                    }
                    );

                } else {
                    if (datos.tipo == 2) {//vendedor
                        $.post(
                                base_url + "welcome/principal_vendedor", {}, function (ruta) {
                            $("#content").html(ruta);
                        }
                        );
                    } else {
                        if (datos.tipo == 3) {//cliente
                            cargar_cliente();   
                            var accion = "Home";
                            var modulo = "Subir Archivo";
                            var icono = "glyphicon glyphicon-dashboard";
                            cargar_contenidoPaginaXusuario(modulo,accion,icono);          
                        }else{
                            //ADMIN
                            cargar_admin(); 
                            var accion = "Administrador";
                            var modulo = "Gestión Sector";
                            var icono = "glyphicon glyphicon-tree-conifer";
                            cargar_contenidoPaginaXusuario(modulo,accion,icono);                         
                        }
                        
                    }
                }
            } else {
                alert("Usuario no existe en la base de datos");
                $("#cerrar_session").hide();
            }
        },
                'json'
                );
    }
}
function cargar_modalUsuario() {
    $.post(
            base_url + "welcome/cargar_modalUsuario",
            {},
            function(ruta, datos) {
                $("#modalUsuario").hide();
                $("#modalUsuario").html(ruta, datos);
                $("#modalUsuario").show('slow');
            }
    );   
}
function cerrar_sesion() {
    var answer = confirm("¿Realmente quieres cerrar sesión?")
    if (answer) {
        $.post(
                base_url + "welcome/cerrar_sesion",
                {},
                function () {
                    verificarLogin();
                }
        );
    }
    else {

    }
}




//cliente
function cargar_cliente(){
    $.post(
        base_url + "welcome/principal_cliente", {}, function (ruta) {
    $("#content").html(ruta);
    });
    //cargar menu cliente                
    $.post(
        base_url + "welcome/menu_cliente", {}, function (ruta) {                                  
        $("#menu").html(ruta);
    });
}

function cargar_admin(){
    $.post(
        base_url + "welcome/principal_admin", {}, function (ruta) {                                 
        $("#content").html(ruta);
    });           
    //cargar menu admin                 
    $.post(
        base_url + "welcome/menu_admin", {}, function (ruta) {                                  
        $("#menu").html(ruta);
    });   
}



function cargar_contenidoPaginaXusuario(modulo,accion,icono){
     //cargar contenido pagina                 
    $.post(
        base_url + "welcome/cargar_contenidoPaginaXusuario", {modulo:modulo,accion:accion,icono}, function (ruta) {                                   
        $("#contenidoHead").html(ruta);
    });
}