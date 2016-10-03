$(document).ready(function() {



    $('select').material_select();

     $('.carousel').carousel();

     $(".button-collapse").sideNav();

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

    	 $('#modal2').openModal();	
       $.ajax({
        url: 'alertClean.php',
        type: 'POST',
        data: {alertClean : 1}


       });
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

   $('.editTask').click(function(){

      var id = this.id;
      var task= $(".task"+id).html();
      $('.modal-taskid').val(id);
      $('.modal-task').val(task); 
      $('#modal1').openModal();


  });

    $('.delTask').click(function(){

      var id = this.id;

      $.ajax ({

        url:'taskUpdate.php',
        type: 'POST',
        data: { taskid : id, taskUpdt : 2 },
        success: function(data){
          

          $("#page").load('alltask.php');
        }


      });


  });

   $(".btn-taskUpdt").click(function(){

      var id = $(".modal-taskid").val();
      var task = $(".modal-task").val();
      $.ajax ({

        url:'taskUpdate.php',
        type: 'POST',
        data: { taskid : id, task : task, taskUpdt : 1 },
        success: function(data){
          $('#modal1').closeModal();
          $(".task"+id).html(task);
        }


      });


   });

$(".submit22").click(function(){
      var id=$(this).prop("name");

   $.ajax({
  method: "POST",
  url: "bypass.php",
  data: { id:id },
   success: function(data) {
    alert( data );
  }
});
 
  
   window.location.href = "head.php";
});


  });