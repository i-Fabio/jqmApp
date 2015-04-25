// This is a JavaScript file

 
		
function setUser(userID,userLEVEL) {
   localStorage.setItem('userCurrent', userID);
	localStorage.setItem('userLevel', userLEVEL);
	 //alert('user: ' + userID );
	 //alert('level: ' + userLEVEL );
}

function  logoutUser() {
  localStorage.removeItem('userCurrent');
   var text = "";
   $("#user_detail").html(text);
  checkUser();
}

function checkUser() {
    var userSes = localStorage.getItem('userCurrent');	
    if (!userSes) {
        // goToLogin();
		goToLogin();
		//alert('user don exist ' + userSes);
    } else {
        //goToInicio();
		goToHome();
		//alert('user set ' + userSes);
    }
}

function getUserDetalle(){
	
	var userAccount = localStorage.getItem('userCurrent');	
	var userLevel = localStorage.getItem('userLevel');
	//alert('user level ' + userLevel );
	$.ajax({
        data: {
            user: userAccount
        },
        type: "GET",
        dataType: "json",
        url: "../JQM/login/user_detail.php",
        success: function(data) {
			//alert(data.id_usuario);
			var userRespond = data.user_details;
			writeUserDetail(userRespond);
        }
    });
}

function goToLogin() {
    $.mobile.changePage("#LoginPage");
}
function goToHome() {
    $.mobile.changePage("#Home");
}
function goToList() {
   $.mobile.changePage( "#ListadoPage");
  getList();
}

function autentication() {
    // recolecta los valores que inserto el usuario
    var usuario = $("#nombredeusuario").val();
    var password = $("#clave").val();
	//alert('user '+ usuario + ' - psw ' + password );
    $.ajax({
        data: {
            usuario: usuario,
            password: password
        },
        type: "GET",
        dataType: "json",
        url: "../JQM/login/checklogin_m.php",
        success: function(data) {
			//alert(data.id_usuario);
			var userRespond = data.id_usuario;
			if (userRespond=='no'){
				
				//alert('login failed');
				$.mobile.changePage("#LoginPage");
				}else{
					//alert('login GOOD: ' + data.id_usuario + 'level: ' + data.user_level);
				setUser(data.id_usuario,data.user_level );	
					}
        }
    });
}

function goToLogin() {
    $.mobile.changePage("#LoginPage");
}
function writeList(respond) {
    var text = respond;
    $("#item_detail").html(text).listview('refresh');
    $('.listItemPres').bind("click", function() {
        var Nr = $(this).data('value');
        seeDetalle(Nr);
    });
}
function writeUserDetail(respond) {
    var text = respond;
    $("#user_detail").html(text);
}

function getList() {
	
    $.mobile.loading('show');
    var id = localStorage.getItem('userCurrent');
	var level = localStorage.getItem('userLevel');
	//alert('controllo level: ' + level);
	if(!id){
		//alert('falta user');
		goToLogin();
		}
	if(!level){
		//alert('falta level');
		goToLogin();
		}
	else{
    $.ajax({
        data: {
            id: id,
			level: level
        },
        type: "GET",
        dataType: "json",
        url: "../json/presupuesto-listado-json.php",
        success: function(data) {
            writeList(data.respond);
            $.mobile.loading('hide');
        }
    });
}
}

function createPres() {
    $.mobile.loading('show');
    var id_usuario = $('#id_usuario').val();
	var label_operario = $('#label_operario').val();
	var cliente_nombre = $('#cliente_nombre').val();
	var cliente_dni = $('#cliente_dni').val();
	var cliente_direccion = $('#cliente_direccion').val();
	var cliente_municipio = $('#cliente_municipio').val();
	var cliente_cp = $('#cliente_cp').val();
	var operario_telefono = $('#operario_telefono').val();
	var cliente_movil = $('#cliente_movil').val();
	var numero_ot = $('#numero_ot').val();
	var marca_caldera = $('#marca_caldera').val();
	var matricula_caldera = $('#matricula_caldera').val();
	var desc_concepto1 = $('#desc_concepto1').val();
	var desc_concepto2 = $('#desc_concepto2').val();
	var desc_concepto3 = $('#desc_concepto3').val();
	var desc_concepto4 = $('#desc_concepto4').val();
	var desc_concepto5 = $('#desc_concepto5').val();
	var precio_concepto1 = $('#precio_concepto1').val();
	var precio_concepto2 = $('#precio_concepto2').val();
	var precio_concepto3 = $('#precio_concepto3').val();
	var precio_concepto4 = $('#precio_concepto4').val();
	var precio_concepto5 = $('#precio_concepto5').val();
	var total = $('#total').val();
	var iva = $('#iva').val();
	var total_iva = $('#total_iva').val();
	var observaciones = $('#observaciones').val();
	var estado_presupuesto = $('#estado_presupuesto').val();
	var acepta = $('#acepta').val();
    $.ajax({
        data: {
            id_usuario: id_usuario, label_operario: label_operario, cliente_nombre: cliente_nombre, cliente_dni: cliente_dni, cliente_direccion: cliente_direccion, cliente_municipio: cliente_municipio, cliente_cp: cliente_cp, operario_telefono: operario_telefono, cliente_movil: cliente_movil, numero_ot: numero_ot, marca_caldera: marca_caldera, matricula_caldera: matricula_caldera, desc_concepto1: desc_concepto1, desc_concepto2: desc_concepto2, desc_concepto3: desc_concepto3, desc_concepto4: desc_concepto4, desc_concepto5: desc_concepto5, precio_concepto1: precio_concepto1, precio_concepto2: precio_concepto2, precio_concepto3: precio_concepto3, precio_concepto4: precio_concepto4, precio_concepto5: precio_concepto5, total: total, iva: iva, total_iva: total_iva, observaciones: observaciones, estado_presupuesto: estado_presupuesto, acepta: acepta
        },
        type: "GET",
        dataType: "json",
        url: "../json/presupuesto-add-json.php",
        success: function(data) {
            $.mobile.loading('hide');
            $('#newPresForm')[0].reset();
            $.mobile.changePage("#ListadoPage");
            //getList();
        }
    });
}

function seeDetalle(id) {
    $.mobile.loading('show');
    $.ajax({
        data: {
            id: id
        },
        type: "GET",
        dataType: "json",
        url: "../json/presupuesto-detalle-json.php",
        success: function(data) {
            writeDetalle(data.respond);
            $.mobile.loading('hide');
            $.mobile.changePage("#Detalle", {
                transition: "slide"
            });
        }
    });
}

function writeDetalle(respond) {
    var text = respond;
    $("#detallePres").html(text);
}

function updateTotal(){
	var dirtyPrecio1 = $('#precio_concepto1').val();
	var dirtyPrecio2 = $('#precio_concepto2').val();
	var dirtyPrecio3 = $('#precio_concepto3').val();
	var dirtyPrecio4 = $('#precio_concepto4').val();
	var dirtyPrecio5 = $('#precio_concepto5').val();
	
	var cleanPrecio1 = dirtyPrecio1.toString().replace(/\,/g, '.');
	var cleanPrecio2 = dirtyPrecio2.toString().replace(/\,/g, '.');
	var cleanPrecio3 = dirtyPrecio3.toString().replace(/\,/g, '.');
	var cleanPrecio4 = dirtyPrecio4.toString().replace(/\,/g, '.');
	var cleanPrecio5 = dirtyPrecio5.toString().replace(/\,/g, '.');
	
	$('#precio_concepto1').val(cleanPrecio1);
	$('#precio_concepto2').val(cleanPrecio2);
	$('#precio_concepto3').val(cleanPrecio3);
	$('#precio_concepto4').val(cleanPrecio4);
	$('#precio_concepto5').val(cleanPrecio5);
	
	
	
	
	var precio_concepto1 = $('#precio_concepto1').val();
	var precio_concepto2 = $('#precio_concepto2').val();
	var precio_concepto3 = $('#precio_concepto3').val();
	var precio_concepto4 = $('#precio_concepto4').val();
	var precio_concepto5 = $('#precio_concepto5').val();
	
	var precioTotal= round(Number(precio_concepto1) + Number(precio_concepto2) + Number(precio_concepto3) + Number(precio_concepto4) + Number(precio_concepto5),2) ;
	var ivaTotal= round(Number(precioTotal)*0.21,2);
	var Total=round(Number(precioTotal) + Number(ivaTotal),2);
	$('#total').val(precioTotal);
	$('#iva').val(ivaTotal);
	$('#total_iva').val(Total);
	
	}
function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}

function setCurrentUserADD(){
	
	var currentOperario = localStorage.getItem('userCurrent');	
	$('#id_usuario').val(currentOperario);
	
	$('#label_operario option')[currentOperario].selected = true;
	}