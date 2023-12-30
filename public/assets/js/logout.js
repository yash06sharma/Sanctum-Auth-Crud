$(document).ready(function(){
    var loginToken = sessionStorage.getItem("Token");

    $("#logout").click(function(){


        $.ajax({
            url: '/api/logout',
            type: 'GET',
            headers: {
                Authorization: 'Bearer ' + loginToken,
            },
            success: function (dashboardResponse) {
                // Handle success for /dashboard route
                console.log('Dashboard Response:', dashboardResponse);
                sessionStorage. removeItem("Token");
                sessionStorage.clear();
                localStorage.clear();
                window.location.href="http://localhost/api/login";
            },
            error: function (xhr, status, error) {
                // Handle error for /dashboard route
                console.log('Error:', xhr.responseText, status, error);
            },
        });


      });



});
