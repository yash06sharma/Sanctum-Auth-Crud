$(document).ready(function () {
    var Token = sessionStorage.getItem("Token");
    console.log('Bearer ' + Token);
    showData();
    function showData(){
        $.ajax({
            type: "GET",
            url: "/api/getuser",
            headers: {
                Authorization: 'Bearer ' + Token,
            },
            dataType: "json",
            success: function (response) {
                        $(".user").text('');
                        $.each(response['data'],function(index,user)
                        {
                        let html = '<tr>';
                        html += `<td>${user.id}</td>`;
                        html += `<td>${user.name}</td>`;
                        html += `<td class='email'>${user.email}</td>`;
                        html += `<td class='email'>${user.status}</td>`;
                        html += `<td><button class="btn btn-sm btn-secondary btn-edit" data-editId="${user.id}">Edit</button>&nbsp;&nbsp;<button class="btn btn-sm btn-warning btn-del" data-delId="${user.id}">Delete</button></td>`;
                        $('.user').append(html);
                        });
                },
                    error: function (xhr, status, error) {
                    alert('Error inserting task: ' + xhr.responseText);
                }

        });
    }

$('.user').on("click", ".btn-del" ,function () {
    let delId =  $(this).attr('data-delId');
    $.ajax({
     type: "GET",
     url: "/api/delete/"+delId,
     dataType: "json",
     headers: {
        Authorization: 'Bearer ' + Token,
    },
     success: function (response) {
             $('.message').html("data Deleted Sucessfully!").show();
             $('.message').addClass( "alert alert-success" ).fadeOut(5000);
     showData();
     }

    });
 });


 $('.user').on("click", ".btn-edit" ,function () {
    let editId =  $(this).attr('data-editId');
    $.ajax({
     type: "GET",
     url: "/api/edit/"+editId,
     dataType: "json",
     headers: {
        Authorization: 'Bearer ' + Token,
    },
     success: function (response) {
        //  console.log(response);
      $("#sid").val(response['id']);
      $("#name").val(response['name']);
      $("#email").val(response['email']);
      $("#status").val(response['status']);
      $("#type").val(response['type']);
     }
    });
 });

 function handleValidation() {

    let validations = {
        'email': [
            {
                'regex': /([^\s])/,
                'message': 'Email field is required!'
            },
            {
                'regex': /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                'message': 'Please enter valid email!'
            }
        ],
        "name": [
            {
                'regex': /([^\s])/,
                'message': 'Name field is required!'
            }
        ],
        "password": [
            {
                'regex': /([^\s])/,
                'message': 'Password field is required!'
            }
        ],
        "status": [
            {
                'regex': /([^\s])/,
                'message': 'Status field is required!'
            }
        ],
        "type": [
            {
                'regex': /([^\s])/,
                'message': 'Type field is required!'
            }
        ]
    };
    let isValid = true;
    $("#form :input").each(function() {
        let el = $(this);
        let elementName = el.attr('name');
        el.next('.error').hide();
        let validation = validations[`${elementName}`];
        let hasError = false;

        $.each(validation, function (i, field) {
            if (!hasError && !field.regex.test(el.val())) {
                el.next('.error').text(field.message);
                el.next('.error').show();
                hasError = true;
                isValid = false;
            }
        });
    });
    if ($('#form :input .error').text()) {
        isValid = false;
     }
     return isValid;
}
$('#form').submit(function (event) {
    event.preventDefault();

    let isValid = handleValidation();
    if (isValid) {
        submitFormByAjax();
    }
});
function submitFormByAjax() {
    let id = $('#sid').val();
    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let status = $('#status').val();
    let type = $('#type').val();
    console.log(id, name, email, password,status,type);
    insertData = {
id: id,
name: name,
email: email,
password: password,
status: status,
type:type
}
      $.ajax({
        type: "POST",
        url: "/api/update",
        data: insertData,
        headers: {
            Authorization: 'Bearer ' + Token,
        },
        success: function (response) {
            console.log(response);
            showData();

            $('.msg').html("data Updated Sucessfully!").show();
            $('.msg').addClass( "alert alert-success" ).fadeOut(5000);
        },
        error: function (xhr, status, error) {
        console.log('Error inserting task: ' + xhr.responseText);
    },
    complete: function(response){
            console.log('data completed');
            $('#form')[0].reset();
}
    });



}


});
