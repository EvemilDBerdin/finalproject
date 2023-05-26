
document.getElementById('loginForm')?.addEventListener('submit', (event)=>{
    event.preventDefault();
    let data = new FormData(event.currentTarget);
    data.append('choice', 'login');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(data) {
            SwalResponse(data);
        },
        error: function(xhr) {
            console.log(xhr)
        },
    }).then((data)=>{
        (data.status==200) && setTimeout(myReload, 1500);
    })
})
document.getElementById('registerForm')?.addEventListener('submit', (event)=>{
    event.preventDefault();
    let data = new FormData(event.currentTarget);
    data.append('choice', 'registerForm'); 
    if(data.get('data[password]') === data.get('cpwd')){
        $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(data) { 
            SwalResponse(data);
        },
        error: function(xhr) {
            console.log(xhr)
        },
        }).then((data)=>{
            (data.status==200) && setTimeout(function(){
                window.location.href=url;
            }, 1500);
        })
    }
    else {
        SwalResponse({status: "400", message: "opps password do not match!"});
    }
    
})


const SwalResponse = (param) => {
    if (param.status == "200") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: param.message,
            showConfirmButton: false,
            timer: 1500
        })
    }
    else {
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: "Oops...",
            text: param.message,
            showConfirmButton: false,
            timer: 1500
        })
    }
}
const myReload = ()=>{
    window.location = window.location;
}


