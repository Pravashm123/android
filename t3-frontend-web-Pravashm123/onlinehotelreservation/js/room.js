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
  function rowTemplate(room) {
    let oneRow = "<tr><td>" +room._id+"</td><td>" + room.desc + "</td><td>" + room.price + "</td><td>"+ room.roomtype + "</td>";
    if (room.image !== "") {
      oneRow +=
        "<td><img src= " +
        base_url +
        "uploads/" +
        room.image +
        " width='80' /></td>";
        
    } else {
      oneRow += "<td> No Image </td>";
    }
    oneRow +=
    "<td>"+room.bedtype+"</td><td><button type='button' class='btn btn-danger delete' room_id=" +
      room._id +
      ">Del</button></td> <td><button type='button' class='btn btn-info edit' room_id=" +
      room._id +">Edit</Button></td> </tr>";
    return oneRow;
  }
  $.ajax({
    type: "GET",
    url: base_url + "room",
    success: function(room) {
      let myRows = [];
      $.each(room, function(index, room) {
        myRows.push(rowTemplate(room));
      });
      tblBody.append(myRows);
    },
    error: function() {
      alert("Something went wrong!");
    }
  });
  $("#fileToUpload").on("change", function() {
    let formData = new FormData();
    let files = $("#fileToUpload").get(0).files;
    if (files.length > 0) {
      formData.append("imageFile", files[0]);
    }
    // $("#add-hero").prop("disabled", true);
    $.ajax({
      type: "POST",
      url: base_url + "upload",
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      success: function(data) {
        imageFile = data.filename;
        // $("#add-hero").prop("disabled", false);
      },
      error: function() {
        alert("Image upload failed!");
      }
    });
  });
  $("#add").on("click", function(e) {
     e.preventDefault();
    let room = {
      desc:$("#desc").val(),
      price:$("#price").val(),
      bedtype:$("#bed").val(),
      image: imageFile,
      roomtype:$("#type").val()
    };
    $.ajax({
      type: "POST",
      url: base_url + "room",
      data: room,
      success: function(room) {
        tblBody.append(rowTemplate(room));
        imageFile = "";
        $("#room-form").trigger("reset");
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
      location.reload();
       
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



