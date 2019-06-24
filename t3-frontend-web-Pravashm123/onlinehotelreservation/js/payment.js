$(function () {

    $.ajaxSetup({
        xhref:{
            withCredentials: true
        }

    });

    let base_url = 'http://localhost:3000/';

    $("#pay").on('click', function (e) {
        e.preventDefault();
         var e= document.getElementById("PaymentType");
         var e1= document.getElementById("CreditCardType");
         var strcard=e.options[e.selectedIndex].value;
         var strpay=e1.options[e1.selectedIndex].value;
         console.log(strpay);
         console.log(strcard);

        let payments = {
            strpay:$("#PaymentType").val(),
            paymentstype:$("#PaymentType").val(),
            strcard:$("#CreditCardType").val(),
            creditcardttype:$("#CreditCardType").val(),
            nameoncard:$("#name").val(),
            amount:$("#amount").val(),
            paymentdate:$("#paymentdate").val()

          
 
 
        };
    
        $.ajax({
            type: 'POST',
            url: base_url + "payments",
            data: payments,
            success: function (payments) {
               alert("signup success");
            
            },
            error: function () {
                alert("signup failed");
            }
        });
    })



        });
    
    