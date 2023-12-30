$(document).ready(function(){
    // alert('Hy Register');
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
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        console.log(name, email, password);
        insertData = {
    name: name,
    email: email,
    password: password,
    }
          $.ajax({
            type: "POST",
            url: "/api/register",
            data: insertData,
            success: function (response) {
                console.log(response);
                $('.msg').html("data Register Sucessfully!").show();
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
