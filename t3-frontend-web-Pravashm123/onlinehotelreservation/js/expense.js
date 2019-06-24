$(function() {

    let tblBody = $("#tblbody");
    let From=$("#room-form");
    let base_url = "http://localhost:3000/";
    let imageFile = "";
    
    $.ajaxSetup({
      xhref:{
          withCredentials: true
      }
  
  });
  function rowTemplate(expense) {
    let oneRow = "<tr><td>" +expense._id+"</td><td>" + expense.expensedate + "</td><td>" + expense.name + "</td><td>"+ expense.rate +"</td><td>"+ expense.expensnature+"</td>";
    return oneRow;
  }
  $.ajax({
    type: "GET",
    url: base_url + "expense",
    success: function(expense) {
      let myRows = [];
      $.each(expense, function(index, expense) {
        myRows.push(rowTemplate(expense));
      });
      tblBody.append(myRows);
    },
    error: function() {
      alert("Something went wrong!");
    }
  });

  $("#add").on("click", function(e) {
     e.preventDefault();
    let expense = {
        expensedate:$("#expensedate").val(),
        name:$("#exname").val(),
      rate:$("#rate").val(),
     
      expensnature:$("#nature").val()
    };
    $.ajax({
      type: "POST",
      url: base_url + "expense",
      data: expense,
      success: function(expense) {
        tblBody.append(rowTemplate(expense));
       
        $("#expense").trigger("reset");
      },
      error: function() {
        alert("Fill all the form fields!");
      }
    });
  });
  $("#update").on("click", function(e) {
    e.preventDefault();
   let room = {
     _id:$("#id").val(),
     desc:$("#desc").val(),
     price:$("#price").val(),
     bedtype:$("#bed").val(),
    //  image: imageFile,
     roomtype:$("#type").val()
   };
   $.ajax({
     type: "PUT",
     url: base_url + "room/" + room._id,
     data: room,
     success: function(room) {
      alert("sucess!");
       
     },
     error: function() {
       alert("failed!");
     }
   });
 });


 $("#deleteall").on("click", function() {
    if (confirm("Do you want to delete all Rooms?")) {
      $.ajax({
        type: "DELETE",
        url: base_url + "room",
        success: function() {
          location.reload();
        },
        error: function() {
          alert("Couldn't delete all rooms");
        }
      });
    }
  })
  tblBody.on("click", ".delete", function() {
    $.ajax({
      type: "DELETE",
      url: base_url + "room/" + $(this).attr("room_id"),
      success: function() {
        location.reload();
      }
    });
  });
  
  tblBody.on('click', '.edit', function() {
    // ajax get request for a room with id /room/:id
     // show the details of room in your html for
    $.ajax({
       type: "GET",
       url: base_url + "room/" +$(this).attr("room_id"),
       success: function(room) {
         $("#id").val(room._id);
        $("#desc").val(room.desc);
        $("#price").val(room.price);
        $("#bed").val(room.bedtype);
        // image: imageFile,
        $("#type").val(room.roomtype);


        console.log(room);
        
        
      },
      error: function() {
        alert("Fill all the form fields!");
      }
       
       
       
       
});
});

  // Hook up another ajax call to update details of the record
  // From.on("click", ".GET", function() {
  //   $.ajax({
  //     type: "GET",
  //     url: base_url + "room/" + $(this).attr("roomedit_id"),
  //     success: function() {
  //       location.reload();
  //     }
  //   });
  // });

  


  $(".edit").on("click", function(e) {
    e.preventDefault();

   $.ajax({
     type: "GET",
     url: base_url + "room/"+$(this).attr("room_id"),
     success: function(room) {
       $("#desc").val =room.desc;
       
       
     },
     error: function() {
       alert("Fill all the form fields!");
     }
   });
 });

}
);



