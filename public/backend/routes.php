<?php

session_start(); 

include("controller.php");

if (isset($_POST['choice'])) 
{
    switch ($_POST['choice']) 
    {
        case 'login':
            $backend = new Controller();
            echo $backend->pfLogin($_POST['users']); 
            break;
        case 'registerForm':
            $backend = new Controller(); 
            echo $backend->pfRegister($_POST['data']); 
            break; 

        //Dashboard Fetch Data
        case 'getTotalDean': 
            $backend = new Controller(); 
            echo $backend->pfGetTotalDean(); 
            break; 
        case 'getTotalInstructor': 
            $backend = new Controller(); 
            echo $backend->pfGetTotalInstructor(); 
            break; 
        case 'getTotalStudent': 
            $backend = new Controller(); 
            echo $backend->pfGetTotalStudent(); 
            break; 
        case 'getTotalSubject': 
            $backend = new Controller(); 
            echo $backend->pfGetTotalSubject(); 
            break; 

        // Btn
        case 'subjectTabFetch_tblDelete':
            $backend = new Controller();
            echo $backend->pfSubjectTabFetch_tblDelete($_POST['id']);
            break;
        case 'courseTabFetch_tblDelete':
            $backend = new Controller();
            echo $backend->pfCourseTabFetch_tblDelete($_POST['id']);
            break;
        case 'instructorTabFetch_tblDelete':
            $backend = new Controller();
            echo $backend->pfInstructorTabFetch_tblDelete($_POST['id']);
            break;
        case 'studentTabFetch_tblDelete':
            $backend = new Controller();
            echo $backend->pfStudentTabFetch_tblDelete($_POST['id']);
            break;

        //Edit Fetch
        case 'subjectTabFetch_tblEdit': 
            $backend = new Controller();
            echo $backend->pfSubjectTabFetch_tblEdit($_POST['id']);
            break;
        case 'courseTabFetch_tblEdit': 
            $backend = new Controller();
            echo $backend->pfCourseTabFetch_tblEdit($_POST['id']);
            break;
        case 'instructorTabFetch_tblView':
            $backend = new Controller();
            echo $backend->pfInstructorTabFetch_tblView($_POST['id']);
            break;

        //Form
        case 'subjectEditIdForm':
            $backend = new Controller();
            echo $backend->pfSubjectEditIdForm($_POST['data']);
            break;
        case 'courseEditIdForm':
            $backend = new Controller();
            echo $backend->pfCourseEditIdForm($_POST['data']);
            break;    
        case 'subjectAddIdForm':
            $backend = new Controller();
            echo $backend->pfSubjectAddIdForm($_POST['data']);
            break;
        case 'CourseAddIdForm':
            $backend = new Controller();
            echo $backend->pfCourseAddIdForm($_POST['data']);
            break;
        case 'studentTabFetch_tblView':
            $backend = new Controller();
            echo $backend->pfStudentTabFetch_tblView($_POST['id']);
            break;
        case 'addNewInstructorForm':
            $backend = new Controller();
            echo $backend->pfAddNewInstructorForm($_POST['data']);
            break;
        case 'EditNewInstructorForm':
            $backend = new Controller();
            echo $backend->pfEditNewInstructorForm($_POST['data']);
            break;

        case 'logout':
            session_unset();
            session_destroy();
            $data['message'] = "success";
            $data['status'] = "200";
            echo json_encode($data);
            break;
        default:
            echo "404";
            break;
    }
} 

?>
