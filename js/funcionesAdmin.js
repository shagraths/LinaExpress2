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
                }else{
                    //error("El sector se esta utilizando");
                    alert("El sector se esta utilizando");
                };
            },'json'
    );
    reporte_sector();
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
                $("#actualizar_ciudad").button("disable");
                $("#guardar_ciudad").button("enable");
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
