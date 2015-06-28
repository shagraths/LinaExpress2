//PARA CARGAR LOS MENUS
function sector_admin(){
    cargar_admin()
    var accion = "Administrador";
    var modulo = "Gestión Sector";
    var icono = "glyphicon glyphicon-tree-conifer";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}
function ciudad_admin(){
    $.post(
            base_url + "Controlleradmin/ciudad_admin",
            {},
            function(ruta, datos) {
                $("#content").html(ruta, datos);
            }
    );
    var accion = "Administrador";
    var modulo = "Gestión Ciudad";
    var icono = "glyphicon glyphicon-road";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}
function carta_admin(){
    $.post(
            base_url + "Controlleradmin/carta_admin",
            {},
            function(ruta, datos) {
                $("#content").html(ruta, datos);
            }
    );
    var accion = "Administrador";
    var modulo = "Gestión Carta";
    var icono = "glyphicon glyphicon-envelope";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}
function usuario_admin(){
    $.post(
            base_url + "Controlleradmin/usuario_admin",
            {},
            function(ruta, datos) {
                $("#content").html(ruta, datos);
            }
    );
    var accion = "Administrador";
    var modulo = "Gestión Usuario";
    var icono = "glyphicon glyphicon-user";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);
}
//PARA BLOQUEAR ID
function bloquear_id_sector(){
    $("#id_sector").attr("readonly", true);
    $("#id_sector").css("background", "lightseagreen");
    reporte_sector();
    cargar_ciudades();
}
function bloquear_id_ciudad(){
    $("#id_ciudad").attr("readonly", true);
    $("#id_ciudad").css("background", "lightseagreen");
    reporte_ciudad();
}
function bloquear_id_TipoCarta(){
    $("#id_carta").attr("readonly", true);
    $("#id_carta").css("background", "lightseagreen");
    reporte_carta();
}

//CB CIUDAD
function cargar_ciudades() {
    //combobox
    $.post(
            base_url + "Controlleradmin/cargar_ciudades",
            {},
            function(ruta, datos) {
                $("#sector_ciudad").html(ruta, datos);
            }
    );
}
function cargar_perfil(){
     $.post(
            base_url + "Controlleradmin/cargar_perfil",
            {},
            function(ruta, datos) {
                $("#Tipo_user").html(ruta, datos);
            }
    );
}

//SECTOR
function reporte_sector() {
    $.post(
            base_url + "Controlleradmin/reporte_sector",
            {},
            function(ruta, datos) {
                $("#reporte_sector").hide();
                $("#reporte_sector").html(ruta, datos);
                $("#reporte_sector").show('slow');
            }
    );
}
function guardar_sector() {
    var s_c = $("#sector_ciudad").val();
    var nombre = $("#nombre_sector").val();
    var obs = $("#obs_sector").val();
    var estado = $("#estado_sector").val();
    if(estado == 'SELECCIONE' || nombre == '' || s_c=='SELECCIONE'){        
        alert('Faltan datos!!');
    }else{
        if(obs == ''){
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/guardar_sector",
                {s_c: s_c, nombre: nombre, obs: obs, estado: estado},
                function(data) {
                    if (data.valor == 0) {
                        //bien('Sector agregado con exito!');
                        alert('Sector agregado con exito!');
                        $("#obs_sector").val("");
                        $("#nombre_sector").val("");
                        $("#estado_sector").val("SELECCIONE");
                        reporte_sector();
                    } else {
                        alert("sector ya existe!!");
                    }
                }, 'json'
            );
    }
}
function cargar_sector(id, nombre_s, nombre_c, obs, estado) {
    $("#id_sector").val(id);
    $("#nombre_sector").val(nombre_s);
    $("#sector_ciudad").val(nombre_c);
    $("#obs_sector").val(obs);
    $("#estado_sector").val(estado);
    $("#actualizar_sector").prop('disabled',false);
    $("#guardar_sector").prop('disabled',true);
}
function actualizar_sector() { 
    var id = $("#id_sector").val();
    var s_c = $("#sector_ciudad").val();
    var nombre = $("#nombre_sector").val();
    var obs = $("#obs_sector").val();
    var estado = $("#estado_sector").val();
    $("#actualizar_sector").prop('disabled',true);
    $("#guardar_sector").prop('disabled',false);  
    if (estado == 'SELECCIONE' || nombre == '' || s_c=='SELECCIONE') {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        if (obs == '') {
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/actualizar_sector",
                {id: id, s_c: s_c, nombre: nombre, obs: obs, estado: estado},
        function(data) {
            if (data.valor == 0) {
                alert('Sector actualizado con exito!');
                $("#id_sector").val("");
                $("#obs_sector").val("");
                $("#nombre_sector").val("");
                $("#estado_sector").val("SELECCIONE");
                $("#sector_ciudad").val("Seleccione");
                $("#actualizar_sector").prop('disabled',true);
                $("#guardar_sector").prop('disabled',false);    
                reporte_sector();
            } else {
                alert("error al actualizar!!");
            }
        }, 'json'
                );
    }
}
function eliminar_sector(id) { 
    $.post(
            base_url + "Controlleradmin/eliminar_sector", {id: id},
            function(data){                
                if (data.valor == 1) {
                    //alerta(data.valor)
                    //bien("Sector eliminado correctamente");
                    alert("Sector eliminado correctamente");
                    reporte_sector();
                }else{
                    //error("El sector se esta utilizando");
                    alert("El sector se esta utilizando");
                };
            },'json'
    );
    
}

//CIUDAD
function guardar_ciudad() {
    var tipo = $("#tipo_ciudad").val();
    var nombre = $("#nombre_ciudad").val();
    var obs = $("#obs_ciudad").val();
    var estado = $("#estado_ciudad").val();
    if (estado == 'SELECCIONE' || nombre == '' || tipo == 'SELECCIONE') {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        if (obs == '') {
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/guardar_ciudad",
                {tipo: tipo, nombre: nombre, obs: obs, estado: estado},
        function(data) {
            if (data.valor == 0) {
                alert('Ciudad agregada con exito!');
                $("#obs_ciudad").val("");
                $("#nombre_ciudad").val("");
                $("#estado_ciudad").val("SELECCIONE");
                $("#tipo_ciudad").val("SELECCIONE");
                reporte_ciudad();
            } else {
                //error("ciudad ya existe!!");
                alert("La ciudad ya existe!!");
            }
        }, 'json'
                );
    }
}
function reporte_ciudad() {
    $.post(
            base_url + "Controlleradmin/reporte_ciudad",
            {},
            function(ruta, datos) {
                $("#reporte_ciudad").hide();
                $("#reporte_ciudad").html(ruta, datos);
                $("#reporte_ciudad").show('slow');
            }
    );
}
function cargar_ciudad(id, nombre, tipo, obs, estado) {        
    $("#id_ciudad").val(id);
    $("#tipo_ciudad").val(tipo);
    $("#nombre_ciudad").val(nombre);
    $("#obs_ciudad").val(obs);
    
    $("#estado_ciudad").val(estado);   

    $("#actualizar_ciudad").prop('disabled',false);
    $("#guardar_ciudad").prop('disabled',true);
}
function actualizar_ciudad() {
    var id = $("#id_ciudad").val();
    var tipo = $("#tipo_ciudad").val();
    var nombre = $("#nombre_ciudad").val();
    var obs = $("#obs_ciudad").val();
    var estado = $("#estado_ciudad").val();
    if (estado == 'SELECCIONE' || nombre == '' || tipo == 'SELECCIONE') {
        alert('Faltan datos!!');
        //alerta('Faltan datos!!');
    } else {
        if (obs == '') {
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/actualizar_ciudad",
                {id: id, tipo: tipo, nombre: nombre, obs: obs, estado: estado},
        function(data) {
            if (data.valor == 0) {
                alert('Ciudad actualizada con exito!');
                 //bien('ciudad actualizada con exito!');
                $("#id_ciudad").val("");
                $("#obs_ciudad").val("");
                $("#nombre_ciudad").val("");
                $("#tipo_ciudad").val("SELECCIONE");
                $("#estado_ciudad").val("SELECCIONE");                
                $("#actualizar_ciudad").prop('disabled',true);
                $("#guardar_ciudad").prop('disabled',false); 
                reporte_ciudad();
            } else {
                //error("error al actualizar!!");
                alert("Error al actualizar!!");
            }
        }, 'json'
                );
    }
}
function eliminar_ciudad(id_ciudad) {   
    $.post(
            base_url + "Controlleradmin/eliminar_ciudad", {id_ciudad: id_ciudad},
            function(data){                
                if (data.valor == 1) {
                    //bien("Ciudad eliminada correctamente");
                    alert("Ciudad eliminada correctamente");
                    reporte_ciudad();
                }else{
                    //error("La ciudad se esta utilizando");
                    alert("La ciudad se esta utilizando, Imposible Borrar");
                };
            },'json'
    );
}


//CARTA

function guardar_tipo_carta() {
    var tipo = $("#txt_tipo").val();
    var obs = $("#txt_observacion").val();
    var estado = $("#estado_carta").val();
    if (tipo == '' || estado == 'SELECCIONE') {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        if (obs == '') {
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/guardar_tipo_carta",
                {tipo: tipo, obs: obs, estado: estado},
        function(data) {
            if (data.valor == 1) {
                //bien('carta agregada con exito!');
                alert('carta agregada con exito!');
                $("#txt_tipo").val("");
                $("#txt_observacion").val("");
                $("#estado_carta").val("SELECCIONE");
                reporte_carta();
            } else {
               // error("carta ya existe!!");
               alert("carta ya existe!!");
            }
        }, 'json'
                );
    }
}
function cargar_carta(id, tipo, obs, estado) {    
    $("#Id_tipoCarta").val(id);
    $("#txt_observacion").val(obs);
    $("#txt_tipo").val(tipo);
    $("#estado_carta").val(estado);
    $("#actualizar_tipo_carta").prop('disabled',false);
    $("#guardar_tipo_carta").prop('disabled',true); 
}
function actualizar_tipo_carta() {
    var id = $("#Id_tipoCarta").val();
    var tipo = $("#txt_tipo").val();
    var obs = $("#txt_observacion").val();
    var estado = $("#estado_carta").val();
    if (tipo == '' || estado == 'SELECCIONE') {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        if (obs == '') {
            obs = 'sin observacion';
        }
        $.post(
                base_url + "Controlleradmin/actualizar_tipo_carta",
                {id: id, tipo: tipo, obs: obs, estado: estado},
        function(data) {
            if (data.valor == 1) {
                //bien('carta actualizada con exito!');
                alert('carta actualizada con exito!');
                $("#Id_tipoCarta").val("");
                $("#txt_tipo").val("");
                $("#txt_observacion").val("");
                $("#estado_carta").val("SELECCIONE");
                $("#actualizar_tipo_carta").prop('disabled',true);
                $("#guardar_tipo_carta").prop('disabled',false);
                reporte_carta();
            } else {
                //error("error al actualizar!!");
                alert("error al actualizar!!");
            }
        }, 'json'
                );
    }
}
function reporte_carta() {
    $.post(
            base_url + "Controlleradmin/reporte_carta",
            {},
            function(ruta, datos) {
                $("#reporte_carta").hide();
                $("#reporte_carta").html(ruta, datos);
                $("#reporte_carta").show('slow');
            }
    );
}
function eliminar_tipo_carta(Id_tipoCarta) {
    $.post(
            base_url + "Controlleradmin/eliminar_tipo_carta", {Id_tipoCarta: Id_tipoCarta},
            function(data){
                if (data.valor = 1) {
                    //bien("");
                    alert("Tipo de Carta eliminada con éxito");
                    reporte_carta();
                }else{
                    //error("");
                    alert("Tipo de Carta no eliminada");
                };
            },'json'
    );
}

//PRECIO

//EMPRESAS

//USUARIO

function reporte_usuario() {
    $.post(
            base_url + "Controlleradmin/reporte_usuario",
            {},
            function(ruta, datos) {
                $("#reporte_usuario").hide();
                $("#reporte_usuario").html(ruta, datos);
                $("#reporte_usuario").show('slow');
            }
    );
}
function guardar_user(){
    var rut = $("#rut").val();
    var nombres = $("#Nombres").val();
    var apellidos = $("#Apellidos").val();
    var tipo_user = $("#Tipo_user").val();
    var estado = $("#estado_user").val();
    if (tipo_user == 'SELECCIONE' || estado == 'SELECCIONE') {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        $.post(
                base_url + "Controlleradmin/guardar_user",
                {rut: rut, nombres: nombres, apellidos: apellidos, tipo_user: tipo_user, estado: estado},
        function(data) {
            if (data.valor == 1) {
                //bien('carta agregada con exito!');
                alert('Usuario agregado con exito!');
                $("#rut").val("");
                $("#Nombres").val("");
                $("#Apellidos").val("");
                $("Tipo_user").val("");
                $("estado_user").val("SELECCIONE");
                reporte_usuario();
            } else {
               // error("carta ya existe!!");
               alert("Usuario ya existe!!");
            }
        }, 'json'
                );
    }
}
function actualizar_user(){
    var id_user = $("#id_user").val();
    var nombres = $("#Nombres").val();
    var apellidos = $("#Apellidos").val();
    var tipo_user = $("#Tipo_user").val();
    var estado = $("#estado_user").val();
    $("#actualizar_user").prop('disabled',true);
    $("#guardar_user").prop('disabled',false);  
    if (estado == 'SELECCIONE' || nombre == '' || tipo_user=='SELECCIONE' || apellidos=="") {
        //alerta('Faltan datos!!');
        alert('Faltan datos!!');
    } else {
        $.post(
                base_url + "Controlleradmin/actualizar_user",
                {id_user:id_user, rut: rut, nombres: nombres, apellidos: apellidos, tipo_user: tipo_user, estado: estado},
        function(data) {
            if (data.valor == 1) {
                $("#id_user").val(id_user);
                $("#rut").val(rut);
                $("#Nombres").val(nombre);
                $("#Apellidos").val(apellido);
                $("Tipo_user").val(tipo);
                $("estado_user").val(estado);
                $("estado_user").prop('disabled',false);
                $("#actualizar_user").prop('disabled',true);
                $("#guardar_user").prop('disabled',false);   
                reporte_usuario();
            } else {
                alert("error al actualizar!!");
            }
        }, 'json'
                );
    }
}
// function eliminar_user(id_user){
//     $.post(
//             base_url + "Controlleradmin/eliminar_user", {id_user: id_user},
//             function(data){                
//                 if (data.valor == 1) {
//                     //alerta(data.valor)
//                     //bien("Sector eliminado correctamente");
//                     alert("Usuario eliminado correctamente");
//                     reporte_usuario();
//                 }else{
//                     //error("El sector se esta utilizando");
//                     alert("usuario no eliminado");
//                 };
//             },'json'
//     );
// }
function cargar_user(id_user, rut, nombres, apellidos, tipo_user, estado_user){//ver porque no sube el tipo de user al cargar
    $("#id_user").val(id_user);
    $("#rut").val(rut);
    $("#Nombres").val(nombres);
    $("#Apellidos").val(apellidos);
    $("#Tipo_user").val(tipo_user);
    $("#estado_user").val(estado_user);
    $("#estado_user").prop('disabled',true); 
    $("#actualizar_user").prop('disabled',false);
    $("#guardar_user").prop('disabled',true); 
}