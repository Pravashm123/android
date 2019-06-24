$(function () {
  let tblbody1 = $("#tblbody1");
  let base_url = "http://localhost:3000/";

    $.ajaxSetup({
      xhref:{
          withCredentials: true
      }

  
  });

   

  function rowTemplate(reserve) {
    let oneRow = "<tr><td>" +reserve._id+"</td><td>" + reserve.firstname + "</td><td>" + reserve.middlename + "</td><td>"+ reserve.lastname +"</td><td>"+reserve.roomtype+"</td><td>"+reserve.contact+"</td><td>"+reserve.reservedate+"</td><td>"+reserve.amount+"</td><td>"+reserve.email+"</td>";
    return oneRow;
  }
    $.ajax({
        type: "GET",
        url: base_url + "roomreservation",
        success: function(reserve) {
          let myRows = [];
          $.each(reserve, function(index, reserve) {
            myRows.push(rowTemplate(reserve));
          });
          tblbody1.append(myRows);
        },
        error: function() {
          alert("Something went wrong!");
        }
      });

});