window.addEventListener("load",start,false);

var db;

function start(){
    
    myResult = document.getElementById("myResult");
    btnSave = document.getElementById("save");
	btnGetItem = document.getElementById("getItem");
	btnGetID = document.getElementById("getId");
	btnRender = document.getElementById("render");
	btnRemove = document.getElementById("remove");
	btnEdit  = document.getElementById("editField");


    btnSave.addEventListener("click",addItem,false);
	btnGetItem.addEventListener("click",getItem,false);
	btnRender.addEventListener("click",showItems,false);
	btnRemove.addEventListener("click",function(){remove(8)},false);
	btnEdit.addEventListener("click",editField,false);
	

    var myDb = indexedDB.open("myDbName5");
	
	myDb.onsuccess=function(e){
		db=e.target.result;
	}

	myDb.onupgradeneeded=function(e){
	   db=e.target.result;
	   db.createObjectStore("myTable", {keyPath: "id", autoIncrement:true});
	}
}
        
function addItem(){
    
    var field1 = document.getElementById("field1").value;
    var field2 = document.getElementById("field2").value;
    var field3 = document.getElementById("field3").value;
    
    var action=db.transaction(["myTable"], "readwrite");
    var targetTable=action.objectStore("myTable");
    var adding=targetTable.add({field1: field1, field2: field2, field3: field3 });
	
	adding.addEventListener("success", showItems, false);
	
	document.getElementById("field1").value="";
	document.getElementById("field2").value="";
	document.getElementById("field3").value="";
     
}

function showItems(){

	myResult.innerHTML="";	
	
	var action=db.transaction(["myTable"], "readonly");
	var targetTable=action.objectStore("myTable");
	var cursor=targetTable.openCursor();
	cursor.addEventListener("success",showDatas, false);
	

}

function showDatas(e){
	
	var cursor=e.target.result;
	
	if(cursor){
		
		myResult.innerHTML+="<div>" + cursor.value.field1 + " - " + cursor.value.field2 + " - " + cursor.value.field3 + "<a href='' class='removeThis' data-id=" + cursor.value.id + " /> - Delete</a></div>";
	
	cursor.continue();
	
	$('.removeThis').bind("click", function() {
		var idnumber=Number($(this).data('id'));
           remove(idnumber);
		   return false;
        	});
		}
}

function getItem() {
	
	var selectID = Number(document.getElementById("getId").value);
	alert (selectID);
	
	var transaction=db.transaction(["myTable"], "readonly");
	var targetTable=transaction.objectStore("myTable");
	var request = targetTable.get(selectID);
	request.onerror = function(event) {
          alert("Unable to retrieve data from database!");
        };
		
		
	request.onsuccess = function(event) {
	  // Do something with the request.result!
	  if(request.result) {
			alert("Name: " + request.result.field1 + ", Age: " + request.result.field2 + ", Email: " + request.result.field3);
	  } else {
			alert("Kenny couldn't be found in your database!"); 
	  }
	};
	
  
	
}

function remove(number) {
 
        var request = db.transaction(["myTable"], "readwrite")
                .objectStore("myTable")
                .delete(number);
        request.onsuccess = function(event) {
          alert("Kenny's " + number + " entry has been removed from your database.");
        };
}

function editField(){
	var transaction = db.transaction(["myTable"],"readwrite");
	var store = transaction.objectStore("myTable");
	var index = store.index(7);
	var range = IDBKeyRange.only(7);
	 
	index.openCursor(range).onsuccess = function(e) {
	  var cursor = e.target.result;
	  if(cursor) {
		cursor.value.field1="modificado"; //modificamos el valor
	 
		var request = store.put(cursor.value); //grabar los nuevos valores de la "tabla"
		request.onsuccess = function(e) {
	 
		};
		request.onerror = function(e) {
	 
		};
		cursor.continue();
	  }
	};
}
        
       