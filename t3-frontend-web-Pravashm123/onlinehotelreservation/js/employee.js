$(function() {

    let tblBody = $("#tblbody");
    let From=$("#emp");
    let base_url = "http://localhost:3000/";
    let imageFile = "";
    
    $.ajaxSetup({
      xhref:{
          withCredentials: true
      }
  
  });
  function rowTemplate(employee) {
    let oneRow = "<tr><td>" +employee._id+"</td><td>" + employee.name + "</td><td>" + employee.phone + "</td><td>"+ employee.salary +"</td><td>"+employee.email+"</td><td>"+employee.department+"</td>";
    if (employee.image !== "") {
      oneRow +=
        "<td><img src= " +
        base_url +
        "uploads/" +
        employee.image +
        " width='80' /></td>";
        
    } else {
      oneRow += "<td> No Image </td>";
    }
    oneRow +=
    "<td></td><td><button type='button' class='btn btn-danger delete' room_id=" +
      employee._id +
      ">Del</button></td> <td><button type='button' class='btn btn-info edit' room_id=" +
      employee._id +">Edit</Button></td> </tr>";
    return oneRow;
  }
  $.ajax({
    type: "GET",
    url: base_url + "employee",
    success: function(employee) {
      let myRows = [];
      $.each(employee, function(index, employee) {
        myRows.push(rowTemplate(employee));
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
        name:$("#name").val(),
        phone:$("#Phone").val(),
        salary:$("#salary").val(),
        email:$("#email").val(),
      image: imageFile,
      department:$("#Department").val()
    };
    $.ajax({
      type: "POST",
      url: base_url + "employee",
      data: room,
      success: function(employee) {
        tblBody.append(rowTemplate(employee));
        imageFile = "";
        $("#emp").trigger("reset");
      },
      error: function() {
        alert("Fill all the form fields!");
      }
    });
  });
  $("#update").on("click", function(e) {
    e.preventDefault();
   let employee = {
     _id:$("#id").val(),
     name:$("#name").val(),
     phone:$("#Phone").val(),
     salary:$("#salary").val(),
    //  image: imageFile,
    email:$("#email").val(),
    department:$("#Department").val()
   };
   $.ajax({
     type: "PUT",
     url: base_url + "employee/" + employee._id,
     data: employee,
     success: function(employee) {
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
        url: base_url + "employee",
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
      url: base_url + "employee/" + $(this).attr("room_id"),
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
       url: base_url + "employee/" +$(this).attr("room_id"),
       success: function(employee) {
         $("#id").val(employee._id);
        $("#name").val(employee.name);
        $("#Phone").val(employee.phone);
        $("#salary").val(employee.salary);
        $("#Department").val(employee.department);
        // image: imageFile,
        $("#email").val(employee.email);
        

 

        console.log(employee);
        
        
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
     url: base_url + "employee/"+$(this).attr("room_id"),
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



