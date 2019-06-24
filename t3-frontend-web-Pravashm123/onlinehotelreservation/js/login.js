$(function () {

    let base_url = 'http://localhost:3000/';

    $.ajaxSetup({
        xhref:{
            withCredentials: true
        }

    });

    $("#login-btn").on('click', function (event) {
        event.preventDefault();
        let users = {
        username: $("#uname").val(),
        password: $("#pass").val()
        };

        $.ajax({
            type: 'POST',
            url: base_url + 'users/login',
            data: users,
            success: function (user) {
               alert("login success" +user);
               if(user.admin == true)
               {
                window.location="admin.html";
               }
               else{
                window.location="user.html";
               }
               
            },
            error: function () {
                alert("Login failed");
            }
        });
    });

});