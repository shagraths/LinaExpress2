function clickMenu(id){	
	var bandera = $('#'+id).hasClass('active');    
    if (bandera === false) {   		
      	$('.menuSistema').removeClass('active');
      	$('#'+id).addClass('active');
    }
    switch (id){
    	case 'subirArchivos':
       	cargar_inicioCliente();
        break;
      case 'misArchivos':
      	tablaMisArchivosCliente();
        break;
      case 'sector':
        sector_admin();
        break;
      case 'ciudad':
        ciudad_admin();
        break;  
      case 'tipoCarta':
        carta_admin();
        break; 
      case 'usuario':
        usuario_admin();
        break;   
    }

}