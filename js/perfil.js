function cargar_Perfil() {
    $.post(
            base_url + "Controllerperfil/cargar_Perfil",
            {},
            function(ruta, datos) {
                $("#content").hide();
                $("#content").html(ruta, datos);
                $("#content").show('slow');
            }
    );
    //cargar contenido pagina                 
    var accion = "Datos";
    var modulo = "Perfil";
    var icono = "glyphicon glyphicon-refresh";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}