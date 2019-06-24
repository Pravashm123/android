$(function (){
  let tblBody=$("#tblbody");
    let base_url = 'http://localhost:3000/';
    let imageFile = "";

    $.ajaxSetup({
        xhref:{
            withCredentials: true
        }
    
    });

    function view (room){
      let oneRow = "<tr><td>" +room._id+"</td><td>" + room.desc + "</td><td>" + room.price + "</td><td>"+ room.roomtype +"</td><td>"+ room.bedtype+ "</td>";
      if (room.image !== "") {
        oneRow +=
          "<td><img src= " +
          base_url +
          "uploads/" +
          room.image +
          " width='120' /></td>";
          
      } else {
        oneRow += "<td> No Image </td>";
      }
      return oneRow;
    }
      
    $.ajax({
        type: "GET",
        url: base_url + "room",
        success: function(room) {
          let myRows = [];
          $.each(room, function(index, room) {
            myRows.push(view(room));
          });
          tblBody.append(myRows);
        },
        error: function() {
          alert("Something went wrong!");
        }
      });
});