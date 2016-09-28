$(document).ready(function() {



    $('select').material_select();

    $('#addTask').click(function(){

    	$('#page').load('addTask.php'); 	
    })

      $('.carousel').carousel();


 $('#taskgiven').click(function(){

    	$('#page').load('taskgiven.php'); 	
    })
 $('#mytask').click(function(){

    	$('#page').load('mytask.php'); 	
    })


  $('#alltask').click(function(){

    	$('#page').load('alltask.php'); 	
    })


   $('#alerts').click(function(){

    	$('#page').load('alerts.php'); 	
    })



 $( "#taskForm").submit(function( event ) {
 	  if($("#subHeads").val()==NULL)
 	 event.preventDefault();
 
 	  // else
 	  // {
 	  // 	var jsonstring = JSON.stringify($("#subHeads").val());
 	  // 	var task = $("#task").val();
 	  // 	$.ajax({
    //      type: "POST",
    //      url: "taskSubmit.php",
   //      data: {subHeads : jsonString,task: task}, 
    //      cache: false,
    //      success: function(data){
    //          alert(data);
    //      	}
    //  	});
 	  
 		});
  });