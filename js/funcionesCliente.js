function tablaMisArchivosCliente() { 
    var accion = "Home";
    var modulo = "Mis Archivos";
    var icono = "glyphicon glyphicon-inbox";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);    
    $.post(
            base_url + "Controllercliente/tablaMisArchivosCliente",
            {},
            function(ruta, datos) {
                $("#content").hide();
                $("#content").html(ruta, datos);
                $("#content").show('slow');
            }
    );
}
function cargar_inicioCliente(){
    cargar_cliente();   
    var accion = "Cliente";
    var modulo = "Subir Archivo";
    var icono = "glyphicon glyphicon-cloud-upload";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}

function eliminarArchivo(id) {
    alerta(id);
    $.post(
            base_url + "Controllercliente/eliminarArchivo", {id: id},
            function(data){                
                if (data.valor == 0) {
                    alerta(data.valor)
                    bien("Sector eliminado correctamente");
                }else{
                    error("El sector se esta utilizando");
                };
            },'json'
    );
    tablaMisArchivosCliente();
}