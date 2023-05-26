<?php
class Model
{
    public function makeQuery($type)
    {
        switch ($type) {
            case 'email':
                return "SELECT * FROM `users` WHERE `email` = ?";
                break;
            case 'deactivate_account':
                return "UPDATE `users` SET `flag` = '1' WHERE `users`.`id` = ?"; 
                break;
            case 'login':
                return "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
                break;
            case 'register':
                return "INSERT INTO `users`(`school_id` ,`email`,`password`,`role`) VALUES (?,?,?,?)";
                break;  
             
            case 'getTotalDean':
                return "SELECT * FROM `users` WHERE `role` = ?";
                break; 
            case 'getTotalInstructor':
                return "SELECT * FROM `users` WHERE `role` = ?";
                break; 
            case 'getTotalStudent':
                return "SELECT * FROM `users` WHERE `role` = ?";
                break; 
            case 'getTotalSubject':
                return "SELECT * FROM `school_subject` WHERE flag=0";
                break;  

            //fetch
            case 'subjectTabFetch_tblEdit':
                return "SELECT * FROM `school_subject` WHERE `id` = ?"; 
                break; 
            case 'courseTabFetch_tblEdit':
                return "SELECT * FROM school_course WHERE `id` = ?";
                break;
            case 'studentTabFetch_tblView':
                return "SELECT * FROM users WHERE id = ?";
                break;
            case 'instructorTabFetch_tblView':
                return "SELECT * FROM users WHERE id = ?";
                break;   
            
                //Btn
            case 'subjectTabFetch_tblDelete':
                return "UPDATE `school_subject` SET `flag` = '1' WHERE `school_subject`.`id` = ?"; 
                break;   
            case 'courseTabFetch_tblDelete':
                return "UPDATE `school_course` SET `flag` = '1' WHERE `school_course`.`id` = ?"; 
                break;   
            case 'instructorTabFetch_tblDelete':
                return "UPDATE `users` SET `flag` = '1' WHERE `users`.`id` = ?"; 
                break;
            case 'studentTabFetch_tblDelete':
                return "UPDATE `users` SET `flag` = '1' WHERE `users`.`id` = ?"; 
                break;
                
            //form
            case 'subjectEditIdForm': 
                return "UPDATE `school_subject` SET `name` = ? WHERE `school_subject`.`id` = ?"; 
                break;
            case 'courseEditIdForm': 
                return "UPDATE `school_course` SET `course_offered` = ?, `course_applied` = ? WHERE `school_course`.`id` = ?"; 
                break;
            case 'subjectAddIdForm':
                return "INSERT INTO school_subject (course_id, `name`, flag) VALUES(?,?,?)";
                break;
            case 'CourseAddIdForm':
                return "INSERT INTO school_course (course_offered, `course_applied`, flag) VALUES(?,?,?)";
                break;
            case 'addNewInstructorForm':
                return "INSERT INTO `users`(`school_id` ,`email`,`password`,`role`) VALUES (?,?,?,?)";
                break; 

            //backup query
            case 'backupa':
                return "INSERT INTO `backupa`(`data`) VALUES (?)";
                break;
            case 'backupb':
                return "INSERT INTO `backupb`(`data`) VALUES (?)";
                break;  
            case 'masterdata':
                return "INSERT INTO `master`(`data`) VALUES (?)";
                break;         
            case 'getbackupa':
                return "SELECT * FROM backupa";
                break;   
            case 'getbackupb':
                return "SELECT * FROM backupb";
                break;  

            default:
                echo "404";
                break;
        }
    }
}
