/////
///Save Data Function
/////
function saveData(){
    //Our text field data
    var field1 = $('#field1').val();
    var field2 = $('#field2').val();
    var field3 = $('#field2').val();
    
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
                                strResults += '<p>ID<b> '
                                              + results.rows.item(i).fieldId
                                              + '<p>Field1<b> '
                                              + results.rows.item(i).field1
                                              + '</b> Field2<b> '
                                              + results.rows.item(i).field2
                                              + '</b> Field3<b> '
                                              + results.rows.item(i).field3;
                            }
                            //Fill the results DIV 
                            $('.results').html(strResults);
                        }
                       ,errorHandler);
    });
}

/////
///Get Data Function
/////
function updateData(){
    //Create an empty results string
    var strResults = '';
    
    //Open a new transaction
    db.transaction(function(tx){
        //Select a wildcard from the database
        tx.executeSql('UPDATE myLocal SET field2="cambio" WHERE fieldId=1;'
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
    
    
    
    
    //Open the database 
    if(openDatabase){
        db = openDatabase('Database Name' , '1.0' , 'Database Description' , 2 * 1024 * 1024);
    }
    //Alert the user to upgrade their browser
    else {
        alert('Databases not supported. Please get a proper browser');
    }
    
});