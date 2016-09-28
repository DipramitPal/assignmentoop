$(document).ready(function() {



    $('select').material_select();

    $('#addTask').click(function(){

    	$('#page').load('addTask.php'); 	
    })

  });