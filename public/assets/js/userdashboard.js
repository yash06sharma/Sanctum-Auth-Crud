$(document).ready(function(){
    var Token = sessionStorage.getItem("Token");
    console.log('Bearer ' + Token);
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
                    // html += `<td><button class="btn btn-sm btn-secondary btn-edit" data-editId="${user.id}">Edit</button>&nbsp;&nbsp;<button class="btn btn-sm btn-warning btn-del" data-delId="${user.id}">Delete</button></td>`;
                    $('.user').append(html);
                    });
            },
                error: function (xhr, status, error) {
                alert('Error inserting task: ' + xhr.responseText);
            }

    });





});
