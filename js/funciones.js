$(document).ready(function () {    
    $("#cerrar").click(function () {
        cerrar_sesion();
    });
    verificarLogin();    
});

function error(mensaje) {
    $().toastmessage('showErrorToast', mensaje);
}
function bien(mensaje) {
    $().toastmessage('showSuccessToast', mensaje);
}
function alerta(mensaje) {
    $().toastmessage('showWarningToast', mensaje);
}
function notificacion(mensaje) {
    $().toastmessage('showNoticeToast', mensaje);
}
function verificarLogin() {    
    $.post(
            base_url + "welcome/verificarLogin",
            {},
            function (datos) {
                if (datos.valor == 1) {
                    $("#cerrar_session").show();
                    $("#login").hide('fast');//esconder
                    if (datos.tipo == 1) {//supervisor
                        $.post(
                                base_url + "welcome/principal_supervisor", {}, function (ruta) {
                            $("#content").html(ruta);
                        }
                        );
                    } else {
                        if (datos.tipo == 3) {//cliente
                            $.post(
                                base_url + "welcome/principal_cliente", {}, function (ruta) {
                            $("#content").html(ruta);
                            });                            
                        }else{
                            //ADMIN
                            $.post(
                                base_url + "welcome/principal_admin", {}, function (ruta) {
                            $("#content").html(ruta);
                            });                            
                        }
                    }
                } else {//sin login                    
                    $("#cerrar_session").hide();
                    $.post(
                            base_url + "welcome/cargar_login", {}, function (ruta) {
                        $("#content").html(ruta);                        
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
        alerta("debe llenar campos!!");
    } else {
        $.post(
                base_url + "welcome/conectar",
                {nombre: nombre, clave: clave},
        function (datos) {
            if (datos.valor == 1) {
                $("#cerrar_session").show('slow');
                $("#container").hide('fast');
                $.post(
                            base_url + "welcome/cargar_vista_principal", {}, function (ruta) {
                        $("#content").html(ruta);
                    }
                    );
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
                            $.post(
                                base_url + "welcome/principal_cliente", {}, function (ruta) {
                            $("#content").html(ruta);
                            });                            
                        }else{
                            //ADMIN
                            $.post(
                                base_url + "welcome/principal_admin", {}, function (ruta) {
                            $("#content").html(ruta);
                            });                            
                        }
                        
                    }
                }
            } else {
                error("Usuario no existe en la base de datos");
                $("#cerrar_session").hide();
            }
        },
                'json'
                );
    }
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