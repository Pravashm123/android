$(function () {

    $.ajaxSetup({
        xhref:{
            withCredentials: true
        }

    });

    let base_url = 'http://localhost:3000/';


    $("#signup-btn").on('click', function (e) {
        e.preventDefault();
        var e= document.getElementById("utype");
        var strUser=e.options[e.selectedIndex].value;
        var adminIdentifier=false;
        if(strUser==="admin"){
            adminIdentifier = true;
        }
        let users = {
        admin:adminIdentifier,
        firstname: $("#fname").val(),
        middlename: $("#mname").val(),
        lastname: $("#lname").val(),
        address: $("#address").val(),
        contact: $("#contact").val(),
        email: $("#email").val(),
        username: $("#uname").val(),
        password: $("#pass").val()
        };
console.log("error");
        $.ajax({
            type: 'POST',
            url: base_url + 'users/signup',
            data: users,
            success: function (user) {
               alert("signup success");
               window.location="login.html";
            },
            error: function () {
                alert("signup failed");
            }
        });
    });

});


