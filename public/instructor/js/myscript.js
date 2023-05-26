
document.getElementById("LoggingOut")?.addEventListener("click", () => {
    let data = new FormData();
    data.append('choice', 'logout');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            SwalResponse(data)
        },
        error: function (xhr) {
            console.error(xhr)
        },
    }).then(() => {
        setTimeout(function () {
            window.location.href = url;
        }, 1500);
    })
})

document.getElementById('subjectEditIdForm')?.addEventListener("submit", event => {
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'subjectEditIdForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})
document.getElementById('courseEditIdForm')?.addEventListener("submit", event => {
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'courseEditIdForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})
document.getElementById('EditNewInstructorForm')?.addEventListener("submit", event=>{
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'EditNewInstructorForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})
document.getElementById('subjectAddIdForm')?.addEventListener("submit", event => {
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'subjectAddIdForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})
document.getElementById('CourseAddIdForm')?.addEventListener("submit", event => {
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'CourseAddIdForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})
document.getElementById('addNewInstructorForm')?.addEventListener("submit", event=>{
    event.preventDefault();
    let data = {};
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData(event.currentTarget);
    data['data'].append('choice', 'addNewInstructorForm');

    sendAjax(data).then((res) => {
        SwalResponse(res);
    }).then(() => {
        setTimeout(myReload, 1500);
    })
})

$(document).ready(() => {
    instructorTabFetch_tbl();
    studentTabFetch_tbl();
    courseTabFetch_tbl();
    subjectTabFetch_tbl();
    getTotalDean();
    getTotalInstructor();
    getTotalStudent();
    getTotalSubject();

    //this is for checkbox
    $(".checkbox").change(function() {
        if(this.checked) {
            $('#EditNewInstructorForm input[name="data[password]"]').prop('disabled', false);
        }
        else {
            $('#EditNewInstructorForm input[name="data[password]"]').prop('disabled', true);
        }
    });
});

/* Data table Function */
const instructorTabFetch_tbl = () => {
    $('#instructorTabFetch_tbl').DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        destroy: true,
        ordering: true,
        order: [
            [0, 'ASC']
        ], //Initial no order. 
        columns: [
            {
                data: "school_id",
                width: "20%"
            },
            {
                data: "email",
                width: "20%"
            },
            {
                data: "role",
                width: "20%",
                render: (data, type, row, mete) => {
                    return row.role;
                }
            },
            {
                data: "id",
                width: "20%",
                render: (data, type, row, meta) => {
                    return `
                        <button type="button" class="btn btn-primary" onclick="instructorTabFetch_tblView(${row.id})">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="instructorTabFetch_tblDelete(${row.id})">Delete</button>
                    `;
                }
            },
        ],
        language: {
            "search": '',
            "searchPlaceholder": "Search keyword...",
            "infoFiltered": ""
        },
        // Load data for the table's content from an Ajax source
        ajax: {
            url: url + '/public/backend/instructorTabFetch.php',
            type: "POST",
        },

    });
}
const studentTabFetch_tbl = () => {
    $('#studentTabFetch_tbl').DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        destroy: true,
        ordering: true,
        order: [
            [0, 'ASC']
        ], //Initial no order. 
        columns: [
            {
                data: "id",
                width: "20%"
            },
            {
                data: "school_id",
                width: "20%"
            },
            {
                data: "email",
                width: "20%"
            },
            {
                data: "id",
                width: "20%",
                render: (data, type, row, meta) => {
                    return `
                        <button class="btn btn-primary" onclick="studentTabFetch_tblView(${row.id})">View</button>
                        <button class="btn btn-danger" onclick="studentTabFetch_tblDelete(${row.id})">Delete</button>
                    `;
                }
            },
        ],
        language: {
            "search": '',
            "searchPlaceholder": "Search keyword...",
            "infoFiltered": ""
        },
        // Load data for the table's content from an Ajax source
        ajax: {
            url: url + '/public/backend/studentTabFetch.php',
            type: "POST",
        },

    });
}
const courseTabFetch_tbl = () => {
    $('#courseTabFetch_tbl').DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        destroy: true,
        ordering: true,
        order: [
            [0, 'ASC']
        ], //Initial no order. 
        columns: [
            {
                data: "id",
                width: "20%"
            },
            {
                data: "course_offered",
                width: "20%"
            },
            {
                data: "course_applied",
                width: "20%"
            },
            {
                data: "id",
                width: "20%",
                render: (data, type, row, meta) => {
                    return `
                        <button class="btn btn-primary" onclick="courseTabFetch_tblEdit(${row.id})">Edit</button>
                        <button class="btn btn-danger" onclick="courseTabFetch_tblDelete(${row.id})">Delete</button>
                    `;
                }
            },
        ],
        language: {
            "search": '',
            "searchPlaceholder": "Search keyword...",
            "infoFiltered": ""
        },
        // Load data for the table's content from an Ajax source
        ajax: {
            url: url + '/public/backend/courseTabFetch.php',
            type: "POST",
        },

    });
}
const subjectTabFetch_tbl = () => {
    $('#subjectTabFetch_tbl').DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: false,
        ordering: true,
        destroy: true,
        paging: false,
        order: [
            [0, 'ASC']
        ], //Initial no order. 
        columns: [
            {
                data: "id",
                width: "20%"
            },
            {
                data: "name",
                width: "20%"
            },
            {
                data: "id",
                width: "20%",
                render: (data, type, row, meta) => {
                    return `
                        <button class="btn btn-primary" onclick="subjectTabFetch_tblEdit(${row.id})">Edit</button>
                        <button class="btn btn-danger" onclick="subjectTabFetch_tblDelete(${row.id})">Delete</button>
                    `;
                }
            },
        ],
        language: {
            "search": '',
            "searchPlaceholder": "Search keyword...",
            "infoFiltered": ""
        },
        // Load data for the table's content from an Ajax source
        ajax: {
            url: url + '/public/backend/subjectTabFetch.php',
            type: "POST",
        }
    });
}

/* Data table Action */
const instructorTabFetch_tblView = id => {
    let data = new FormData();
    data.append('id', id);
    data.append('choice', 'instructorTabFetch_tblView'); 
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {  
            $('#EditNewInstructorForm input[name="data[id]"]').val(data[0]['id']);
            $('#EditNewInstructorForm input[name="data[school_id]"]').val(data[0]['school_id']);
            $('#EditNewInstructorForm input[name="data[email]"]').val(data[0]['email']);
            $('#EditNewInstructorForm select[name="data[role]"]').val(data[0]['role']);
            $('.editInstructor').modal('show');
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}

const studentTabFetch_tblView = id => {
    let data = new FormData();
    data.append('id', id);
    data.append('choice', 'studentTabFetch_tblView');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            $('.studentViewIdModal input[name="school_id"]').val(data.school_id);
            $('.studentViewIdModal input[name="email"]').val(data.email);
            $('.studentViewIdModal').modal('show');
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}

const courseTabFetch_tblEdit = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'courseTabFetch_tblEdit');
    data['data'].append('id', id);
    showModalSendAjax(data).then((res) => {
        $('#courseEditIdForm input[name="data[id]"]').val(res[0].id);
        $('#courseEditIdForm input[name="data[course_offered]"]').val(res[0].course_offered);
        $('#courseEditIdForm input[name="data[course_applied]"]').val(res[0].course_applied);
    }).then(() => {
        $('#courseEditIdModal').modal('show');
    })
}

const subjectTabFetch_tblEdit = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'subjectTabFetch_tblEdit');
    data['data'].append('id', id);
    showModalSendAjax(data).then((res) => {
        $('#subjectEditIdForm input[name="data[id]"]').val(res[0].id);
        $('#subjectEditIdForm input[name="data[name]"]').val(res[0].name);
    }).then(() => {
        $('#subjectEditIdModal').modal('show');
    })
}

// Btn
const instructorTabFetch_tblDelete = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'instructorTabFetch_tblDelete');
    data['data'].append('id', id);

    SwalConfirm("Are you sure you want to delete this Instructor?").then((res) => {
        if (res) {
            datatableActionSendAjax(data).then((res) => {
                SwalResponse(res);
                instructorTabFetch_tbl();
            });
        }
    });
}
const studentTabFetch_tblDelete = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'studentTabFetch_tblDelete');
    data['data'].append('id', id);

    SwalConfirm("Are you sure you want to delete this Student?").then((res) => {
        if (res) {
            datatableActionSendAjax(data).then((res) => {
                SwalResponse(res);
                studentTabFetch_tbl();
            });
        }
    });
}
const courseTabFetch_tblDelete = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'courseTabFetch_tblDelete');
    data['data'].append('id', id);

    SwalConfirm("Are you sure you want to delete this Course?").then((res) => {
        if (res) {
            datatableActionSendAjax(data).then((res) => {
                SwalResponse(res);
                courseTabFetch_tbl();
            });
        }
    });
}
const subjectTabFetch_tblDelete = id => {
    let data = [];
    data['url'] = url + '/public/backend/routes.php';
    data['data'] = new FormData();
    data['data'].append('choice', 'subjectTabFetch_tblDelete');
    data['data'].append('id', id);

    SwalConfirm("Are you sure you want to delete this Subject?").then((res) => {
        if (res) {
            datatableActionSendAjax(data).then((res) => {
                SwalResponse(res);
                subjectTabFetch_tbl();
            });
        }
    });
}

/* Dashboard */
const getTotalDean = () => {
    let data = new FormData();
    data.append('choice', 'getTotalDean');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            $('#dashboardindex .progress-detail h4.dean').html(data);
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}
const getTotalInstructor = () => {
    let data = new FormData();
    data.append('choice', 'getTotalInstructor');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            $('#dashboardindex .progress-detail h4.instructor').html(data);
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}
const getTotalStudent = () => {
    let data = new FormData();
    data.append('choice', 'getTotalStudent');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            $('#dashboardindex .progress-detail h4.student').html(data);
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}
const getTotalSubject = () => {
    let data = new FormData();
    data.append('choice', 'getTotalSubject');
    $.ajax({
        type: 'POST',
        url: url + '/public/backend/routes.php',
        data: data,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () { },
        success: function (data) {
            $('#dashboardindex .progress-detail h4.subject').html(data);
        },
        error: function (xhr) {
            console.log(xhr)
        },
    });
}



/* useful functions */
const datatableActionSendAjax = (param = {}) => {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'POST',
            url: param.url,
            data: param.data,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () { },
            success: function (data) {
                resolve(data)
            },
            error: function (xhr) {
                reject(xhr)
            },
        });
    });
}
const showModalSendAjax = (param = {}) => {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'POST',
            url: param.url,
            data: param.data,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () { },
            success: function (data) {
                resolve(data)
            },
            error: function (xhr) {
                reject(xhr)
            },
        });
    });
}
const sendAjax = (param = {}) => {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'POST',
            url: param.url,
            data: param.data,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () { },
            success: function (data) {
                resolve(data)
            },
            error: function (xhr) {
                reject(xhr)
            },
        });
    });
}
const SwalConfirm = message => {
    let promise = new Promise(function (resolve, reject) {
        Swal.fire({
            title: message,
            showCancelButton: true,
            confirmButtonText: 'Save',
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true)
            }
        })
    })
    return promise;
}
const SwalResponse = param => {
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
const myReload = () => {
    window.location = window.location;
}