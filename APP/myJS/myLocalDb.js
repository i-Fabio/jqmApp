/////
///Save Data Function
/////
function saveData(){
    //Our text field data
    var field1 = $('#field1').val();
    var field2 = $('#field2').val();
    var field3 = $('#field3').val();
    
    //Check databases are supported
    if(openDatabase){
        //Open a database transaction
        db.transaction(function(tx){
            //Execute an SQL statement to create the table "tblDemo" 
            //only if it doesn't already exist                
            tx.executeSql('CREATE TABLE IF NOT EXISTS myLocal ('
                           + 'fieldId INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,'
                           + 'field1 VARCHAR(255),'
                           + 'field2 VARCHAR(255),'
                           + 'field3 VARCHAR(255)'
                           + ');',[],nullData,errorHandler);
        });
        
        //Open a new transaction
        db.transaction(function(tx){
            //Exexute an INSERT with the name, age and favourite colour, 
            //we set values outside the SQL string for added security and 
            //to prevent SQL injections, the values are represented with "?"
            tx.executeSql('INSERT INTO myLocal ('
                           + 'field1, field2, field3)'
                           + 'VALUES (?, ?, ?);'
                           ,[field1,field2,field3],nullData,errorHandler);
        });
    }
}

/////
///Get Data Function
/////
function getData(){
    //Create an empty results string
    var strResults = '';
   
    //Open a new transaction
    db.transaction(function(tx){
        //Select a wildcard from the database
        tx.executeSql('SELECT * FROM myLocal'
                       ,[]
                       //Callback function with transaction and 
                       //results objects
                       ,function(tx, results){
                            //Count the results rows
                            var rowsCount = results.rows.length;  
                            //Loop the rows
                            for (var i = 0; i < rowsCount; i++){
                                //Build a results string, notice the 
                                //column names are called
                                strResults += "<li class='offLineList' data-value='"  
											  + results.rows.item(i).fieldId
											  + "' ><a href=''><h2>"
											  + results.rows.item(i).field2
											  + "</h2><p>"
											  + results.rows.item(i).field3
											  "</p></a></li>";
                            }
                            //Fill the results DIV 
							
                            //$('.results').html(strResults);
							$("#offline_list").html(strResults).listview('refresh');
							$('.offLineList').bind("click", function() {
								var Nr = $(this).data('value');
								alert(Nr);
								sendData(Nr);
							});
                        }
                       ,errorHandler);
					   
    });
}

/////
///Get Detail Function
/////
function getDetail(numero){
	var myId= numero;
    //Create an empty results string
    var strResults = '';
   
    //Open a new transaction
    db.transaction(function(tx){
        //Select a wildcard from the database
		
        tx.executeSql('SELECT * FROM myLocal WHERE fieldID=' + myId
                       ,[]
                       //Callback function with transaction and 
                       //results objects
                       ,function(tx, results){
                            //Count the results rows
                            var rowsCount = results.rows.length;  
                            //Loop the rows
                            for (var i = 0; i < rowsCount; i++){
                                //Build a results string, notice the 
                                //column names are called
                                strResults += "<h1>"  
											  + results.rows.item(i).fieldId
											  + "' ><h1><h2>"
											  + results.rows.item(i).field2
											  + "</h2><p>"
											  + results.rows.item(i).field3
											  "</p>";
                            }
                            //Fill the results DIV 
							
                            //$('.results').html(strResults);
							$(".detailOff").html(strResults);
							
                        }
                       ,errorHandler);
					   
    });
}
/////
///Get Detail Function
/////
function sendData(numero){
	var myId= numero;
    //Create an empty results string
    var strResults = '';
   
    //Open a new transaction
    db.transaction(function(tx){
        //Select a wildcard from the database
		
        tx.executeSql('SELECT * FROM myLocal WHERE fieldID=' + myId
                       ,[]
                       //Callback function with transaction and 
                       //results objects
                       ,function(tx, results){
                            //Count the results rows
                            var rowsCount = results.rows.length;  
                            //Loop the rows
                            for (var i = 0; i < rowsCount; i++){
                                //Build a results string, notice the 
                                //column names are called
							   
                               var sendField1 = results.rows.item(i).field1;
							   var sendField2 = results.rows.item(i).field2;
							   var sendField3 = results.rows.item(i).field3;
                            }
                            //Fill the results DIV 
							$.ajax({
									data: {
										id_usuario: sendField1,
										label_operario: sendField2,
										label_operario: sendField3
									},
									type: "GET",
									dataType: "json",
									url: "http://bcnmovilexpress.com/gas/json/presupuesto-add-json.php",
									success: function(data) {
										updateData(myId);
										alert('update: ' + myId);
									}
								});
							
                        }
                       ,errorHandler);
					   
    });
}

/////
///Get Data Function
/////
function updateData(myId){
    //Create an empty results string
    var strResults = '';
    
    //Open a new transaction
    db.transaction(function(tx){
        //Select a wildcard from the database
        tx.executeSql('UPDATE myLocal SET field3="1 modificado" WHERE fieldId=' + myId
                       ,[]
                       //Callback function with transaction and 
                       //results objects
                       ,function(tx, results){
                         
                                strResults += 'Cambio'
                                            
                            //Fill the results DIV 
                            $('.results').html(strResults);
                        }
                       ,errorHandler);
    });
}



/////
///Error Handler
/////
function errorHandler(transaction, error) {
    //Log the error
    console.log('Error: ' + error.message + ' (Code ' + error.code + ')');
	alert('Error: ' + error.message + ' (Code ' + error.code + ')');
}

/////
///Null Data
/////
function nullData(){
    //Can be used for callbacks etc
}
/////
///Document Ready 
/////
$(document).ready(function(){
    //Bind events to the buttons to fire off the functions                       
    $('#btnSave').bind('click' , saveData);
    $('#btnGet').bind('click' , getData);
    $('#btnUpdate').bind('click' , updateData);
	
	
	
	
    $( "#btnGetDetail" ).bind( "click", function() {
  	getDetail('2');
	});
	$( ".listItemPres" ).bind( "click", function() {
  	alert(this.data-value);
	});
    
    //Open the database 
    if(openDatabase){
        db = openDatabase('Database Name' , '1.0' , 'Database Description' , 2 * 1024 * 1024);
    }
    //Alert the user to upgrade their browser
    else {
        alert('Databases not supported. Please get a proper browser');
    }
    
});