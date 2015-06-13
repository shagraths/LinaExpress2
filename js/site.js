$(function() {    

    $('#leerExcel').submit(function(e) {        
        //notificacion("Espere un momento");
        e.preventDefault();
        $.ajaxFileUpload({
            url: base_url + "Controlleraubirarchivo/leerExcel",
            secureuri: false,
            fileElementId: 'userfile',
            dataType: 'json',
            data: {
            },
            success: function(data)
            {                       
                if (data.status !== 'error')
                {                                        
                    $("#nombre").val(data.nombre);
                    MostrarExcel(data.nombre);
                    $("#guardar_excelCliente").prop('disabled', false);
                    $("#limpiar_excelCliente").prop('disabled', false);
                    $('#guardar_excelCliente').click(function () {                            
                        guardar_excelCliente();
                    });
                    $('#limpiar_excelCliente').click(function () {                            
                        alert("Se limpiara la pagina sin guardar");
                        archivo_txt();
                    });
                } else {
                    error(data.msg);
                }
            }
        });        
        return false;
    });

    $('#leerExcelSupervisor').submit(function(e) {
        notificacion("Espere un momento");
        e.preventDefault();
        $.ajaxFileUpload({
            url: base_url + "Controlleraubirarchivo/leerExcelSupervisor",
            secureuri: false,
            fileElementId: 'userfile',
            dataType: 'json',
            data: {
            },
            success: function(data)
            {                       
                if (data.status !== 'error')
                {                                        
                    $("#nombre").val(data.nombre);
                    MostrarExcelSupervisor(data.nombre);
                    $("#guardar_excel").button("enable");                    
                    $("#limpiar_excel").button("enable");                    
                } else {
                    error(data.msg);
                }
            }
        });        
        return false;
    });

});







function MostrarExcel(nombre) {    
    $.post(
            base_url + "Controlleraubirarchivo/MostrarExcel",
            {nombre: nombre},
    function(ruta, datos) {
        $("#lecturaExcel").hide();
        $("#lecturaExcel").html(ruta, datos);
        $("#lecturaExcel").show('slow');
        $("#tiempo").hide();
    }
    );
}

function MostrarExcelSupervisor(nombre) {    
    $.post(
            base_url + "Controlleraubirarchivo/MostrarExcelSupervisor",
            {nombre: nombre},
    function(ruta, datos) {
        $("#lecturaExcel").hide();
        $("#lecturaExcel").html(ruta, datos);
        $("#lecturaExcel").show('slow');
        $("#tiempo").hide();
    }
    );
}

function guardar_excel() {
    $("#mostrar_txt").hide();
    //mostrar_cargar();
    var nombre = $("#nombre").val();
    $.post(
            base_url + "Controlleraubirarchivo/guardar_Excel",
            {nombre: nombre},
    function(datos) {
        $("#tiempo").hide();
        $("#guardar_excel").button("disable");
        $("#limpiar_excel").button("disable");
        if (datos.perdidos == 0) {
            alert("total datos= " + datos.total + " guardados= " + datos.guardados + " perdidos= " + datos.perdidos);
            alert("bien!!");
        } else {
            alert("total datos= " + datos.total + " guardados= " + datos.guardados + " perdidos= " + datos.perdidos);
        }
    },
            'json'
            );
}

function guardar_excelCliente() {
    $("#mostrar_txt").hide();
    //mostrar_cargar();
    var nombre = $("#nombre").val();
    $.post(
            base_url + "Controlleraubirarchivo/guardar_excelCliente",
            {nombre: nombre},
    function(datos) {
        $("#tiempo").hide();      

        $("#guardar_excelCliente").prop('disabled', true);
        $("#limpiar_excelCliente").prop('disabled', true);
        if (datos.perdidos == 0) {
            alert("total datos= " + datos.total + " guardados= " + datos.guardados + " perdidos= " + datos.perdidos);            
        } else {
            alert("total datos= " + datos.total + " guardados= " + datos.guardados + " perdidos= " + datos.perdidos);
        }
        pdf_excelClientePlanilla(datos.nombre);
    },
            'json'
            );
}

function  pdf_excelClientePlanilla(nombreArchivo) { 
    alert(nombreArchivo);
    window.open(base_url + "Reporte/excelClientePlanilla_lista?nombreArchivo=" + nombreArchivo);
}