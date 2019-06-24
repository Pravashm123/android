$(function () {

    $.ajaxSetup({
        xhref:{
            withCredentials: true
        }

    });

    let base_url = 'http://localhost:3000/';

    $("#add").on('click', function (e) {
        e.preventDefault();
         var e= document.getElementById("roomtype");
         var strRoom=e.options[e.selectedIndex].value;
         console.log(strRoom);

        let roomreservation = {
            firstname:$("#firstname").val(),
            middlename:$("#middlename").val(),
            lastname:$("#lastname").val(),
            strRoom:$("#roomtype").val(),
    //    roomtype:strRoom.val(),
            roomtype:$("#roomtype").val(),
            contact:$("#phone").val(),
            reservedate:$("#reservedate").val(),
            amount:$("#amount").val(),
            email:$("#emailaddress").val()
        };
    
        $.ajax({
            type: 'POST',
            url: base_url + "roomreservation",
            data: roomreservation,
            success: function (roomreservation) {
               alert("signup success");
            
            },
            error: function () {
                alert("signup failed");
            }
        });
    })



        });
    
    