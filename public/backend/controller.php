<?php
include("database.php");
include("model.php");

class Controller
{
    /* userful functions */
    private function errorResponse($error, $status)
    {
        $data['response']['message'] = $error;
        $data['response']['status'] = $status;
        return json_encode($data['response']);
    }
    private function backupChecker($value)
    {
        try {
            $data['model'] = new Model();
            $data['bkp1'] = self::backupCheckerQuery($data['model']->makeQuery('getbackupa'));
            $data['bkp2'] = self::backupCheckerQuery($data['model']->makeQuery('getbackupb')); 
            
            if (self::backupInserter($data['model']->makeQuery('masterdata'), $value)) {
                if ($data['bkp1'] < $data['bkp2']) {
                    if (self::backupInserter($data['model']->makeQuery('backupa'), $value)) return true;
                    else return false;
                }
                if ($data['bkp2'] < $data['bkp1']) {
                    if (self::backupInserter($data['model']->makeQuery('backupb'), $value)) return true;
                    else return false;
                }
                if ($data['bkp1'] == $data['bkp2']) {
                    if (self::backupInserter($data['model']->makeQuery('backupa'), $value)) return true;
                    else return false;
                }
                return false;
            } else return false;
        } catch (PDOException $error) {
            return false;
        }
    }
    private function backupInserter($query, $arr)
    {
        try { 
            $data['db'] = new Database();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $stmt = $data['db']->getConnection()->prepare($query);
                $stmt->execute(array($arr));
                $data['db']->closeConnection();
                return true;
            }
            $data['db']->closeConnection();
            return false;
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return false;
        }
    }
    private function backupCheckerQuery($query)
    {
        try {
            $data['db'] = new Database();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $stmt = $data['db']->getConnection()->prepare($query);
                $stmt->execute();
                $data['result'] = count($stmt->fetchAll());
                $data['db']->closeConnection();
                return $data['result'];
            }
            $data['db']->closeConnection();
            return false;
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return false;
        }
    }


    public function pfLogin($users)
    {
        return self::login($users);
    }
    public function pfRegister($data)
    {
        return self::register($data);
    }
    public function pfAddNewInstructorForm($data){
        return self::addNewInstructorForm($data);
    }

    /* Dashboard Fetch Data */
    public function pfGetTotalDean()
    {
        return self::getTotalDean();
    }
    public function pfGetTotalInstructor()
    {
        return self::getTotalInstructor();
    }
    public function pfGetTotalStudent()
    {
        return self::getTotalStudent();
    }
    public function pfGetTotalSubject()
    {
        return self::getTotalSubject();
    }
    public function pfStudentTabFetch_tblView($data){
        return self::studentTabFetch_tblView($data);
    }

    /* Btn */
    public function pfSubjectTabFetch_tblDelete($data)
    {
        return self::subjectTabFetch_tblDelete($data);
    }
    public function pfCourseTabFetch_tblDelete($data)
    {
        return self::courseTabFetch_tblDelete($data);
    }
    public function pfInstructorTabFetch_tblDelete($data)
    {
        return self::instructorTabFetch_tblDelete($data);
    }
    public function pfStudentTabFetch_tblDelete($data)
    {
        return self::studentTabFetch_tblDelete($data);
    }

    /* Edit Fetch */
    public function pfSubjectTabFetch_tblEdit($data)
    {
        return self::subjectTabFetch_tblEdit($data);
    }
    public function pfCourseTabFetch_tblEdit($data)
    {
        return self::courseTabFetch_tblEdit($data);
    }
    public function pfInstructorTabFetch_tblView($data){
        return self::instructorTabFetch_tblView($data);
    }

    /*/ Form */
    public function pfSubjectEditIdForm($data)
    {
        return self::subjectEditIdForm($data);
    }
    public function pfCourseEditIdForm($data)
    {
        return self::courseEditIdForm($data);
    }
    public function pfSubjectAddIdForm($data)
    {
        return self::subjectAddIdForm($data);
    }
    public function pfCourseAddIdForm($data)
    {
        return self::CourseAddIdForm($data);
    }
    public function pfEditNewInstructorForm($data){
        return self::EditNewInstructorForm($data);
    }



    private function login($users)
    {
        try {
            $data['db'] = new Database();
            (!isset($_SESSION['lcontroller_count'])) && $_SESSION['lcontroller_count'] = 0;
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $hashpwd = md5($users['password']);
                $data['resultEmail'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('email'));
                $data['resultEmail']->execute(array($users['email']));
                $data['dataEmail'] = $data['resultEmail']->fetch();
                if ($data['dataEmail']) {
                    $data['resultLogin'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('login'));
                    $data['resultLogin']->execute(array($users['email'], $hashpwd));
                    $data['dataLogin'] = $data['resultLogin']->fetch();
                    if ($data['dataLogin']) { //if the password is correct
                        if ($data['dataLogin']['flag'] == 0) {
                            $_SESSION['users_data'] = $data['dataLogin'];
                            $data['response']['message'] = "You are Logging in!";
                            $data['response']['status'] = "200";
                            unset($_SESSION['lcontroller_count']);
                        } else {
                            $data['response']['message'] = "Your account has been deactivated contact the admin for this matter";
                            $data['response']['status'] = "404";
                            unset($_SESSION);
                        }
                    } else { //if the password is incorrect
                        if (isset($_SESSION['lcontroller_check_email'])) {
                            if ($_SESSION['lcontroller_check_email'] == $users['email']) {
                                $_SESSION['lcontroller_count']++;
                            } else {
                                $_SESSION['lcontroller_check_email'] = $users['email'];
                                $_SESSION['lcontroller_count'] = 0;
                                $_SESSION['lcontroller_count']++;
                            }
                        } else {
                            $_SESSION['lcontroller_check_email'] = $users['email'];
                            $_SESSION['lcontroller_count']++;
                        }

                        if ($_SESSION['lcontroller_count'] >= 3) {
                            $data['deactivate_account'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('deactivate_account'));
                            if ($data['deactivate_account']->execute(array($_SESSION['lcontroller_userid']))) {
                                session_unset();
                                session_destroy();
                                $data['response']['message'] = "Your account has been deactivated!";
                                $data['response']['status'] = "404";
                            } else {
                                $data['response']['message'] = "ERROR";
                                $data['response']['status'] = "504";
                            }
                            return json_encode($data['response']);
                        }

                        $_SESSION['lcontroller_userid'] = $data['dataEmail']['id'];
                        $data['response']['message'] = "Incorrect Password! Attempt " . $_SESSION['lcontroller_count'] . " \r\n--> 3 Attempt and your account will be deactivated!";
                        $data['response']['status'] = "404";
                    }
                } else {
                    $_SESSION['lcontroller_count'] = 0;
                    $data['response']['message'] = "Email doesnt exists!";
                    $data['response']['status'] = "404";
                }
                $data['db']->closeConnection();
                return json_encode($data['response']);
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("Failed error occurred.", "403");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function getTotalDean()
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('getTotalDean'));
                $data['result']->execute(array('dean'));
                $data['recordsTotal'] = $data['result']->rowCount();
            }
            $data['db']->closeConnection();
            return json_encode($data['recordsTotal']);
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function getTotalInstructor()
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('getTotalInstructor'));
                $data['result']->execute(array('instructor'));
                $data['recordsTotal'] = $data['result']->rowCount();
            }
            $data['db']->closeConnection();
            return json_encode($data['recordsTotal']);
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function getTotalStudent()
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('getTotalStudent'));
                $data['result']->execute(array('student'));
                $data['recordsTotal'] = $data['result']->rowCount();
            }
            $data['db']->closeConnection();
            return json_encode($data['recordsTotal']);
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function getTotalSubject()
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('getTotalSubject'));
                $data['result']->execute(array());
                $data['recordsTotal'] = $data['result']->rowCount();
            }
            $data['db']->closeConnection();
            return json_encode($data['recordsTotal']);
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function studentTabFetch_tblView($id){
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['stmt'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('studentTabFetch_tblView'));
                $data['stmt']->execute(array($id));
                $data['result'] = $data['stmt']->fetch();
            }
            $data['db']->closeConnection();
            return json_encode($data['result']);
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }
    private function register($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['userid'] = uniqid();
                $param['password'] = md5($param['password']);

                $data['resultEmail'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('email'));
                $data['resultEmail']->execute(array($param['email']));
                $data['dataEmail'] = $data['resultEmail']->fetch();

                if ($data['dataEmail'] === false) {
                    $myObj = array(
                        'users' => array(
                            'school_id'=> $data['userid'],
                            'email'=> $param['email'],
                            'role' => 'student',
                        ),
                    );
                    if (self::backupChecker(json_encode(array($myObj))) == false) return self::errorResponse("error occured in database", "400");

                    $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('register'));
                    $data['execute'] = $data['result']->execute(array($data['userid'], $param['email'], $param['password'], 'student'));

                    if ($data['execute']) {
                        $data['response']['message'] = "Student has been successfully inserted.";
                        $data['response']['status'] = "200";
                        $data['db']->closeConnection();
                        return json_encode($data['response']);
                    } else {
                        $data['response']['message'] = "Insertion failed.";
                        $data['response']['status'] = "400";
                        $data['db']->closeConnection();
                        return json_encode($data['response']);
                    }
                } else {
                    $data['response']['message'] = "Email already exists pls choose another one.";
                    $data['db']->closeConnection();
                    return self::errorResponse($data['response']['message'], "400");
                }
            }
            $data['db']->closeConnection();
            return self::errorResponse("error!", "400");
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "500");
        }
    }

    // Btn
    private function subjectTabFetch_tblDelete($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('subjectTabFetch_tblDelete'));
                $data['execute'] = $data['result']->execute(array($param));
                if ($data['execute']) {
                    $data['response']['message'] = "Subject has been successfully deleted.";
                    $data['response']['status'] = "200";

                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function courseTabFetch_tblDelete($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('courseTabFetch_tblDelete'));
                $data['execute'] = $data['result']->execute(array($param));
                if ($data['execute']) {
                    $data['response']['message'] = "Course has been successfully deleted.";
                    $data['response']['status'] = "200";

                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function instructorTabFetch_tblDelete($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('instructorTabFetch_tblDelete'));
                $data['execute'] = $data['result']->execute(array($param));
                if ($data['execute']) {
                    $data['response']['message'] = "Course has been successfully deleted.";
                    $data['response']['status'] = "200";

                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function studentTabFetch_tblDelete($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('studentTabFetch_tblDelete'));
                $data['execute'] = $data['result']->execute(array($param));
                if ($data['execute']) {
                    $data['response']['message'] = "Course has been successfully deleted.";
                    $data['response']['status'] = "200";

                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }

    // Modal
    private function subjectTabFetch_tblEdit($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('subjectTabFetch_tblEdit'));
                $data['result']->execute(array($param));
                $data['data'] = $data['result']->fetchAll();
                $data['db']->closeConnection();
                return json_encode($data['data']);
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function courseTabFetch_tblEdit($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('courseTabFetch_tblEdit'));
                $data['result']->execute(array($param));
                $data['data'] = $data['result']->fetchAll();
                $data['db']->closeConnection();
                return json_encode($data['data']);
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function instructorTabFetch_tblView($param){
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('instructorTabFetch_tblView'));
                $data['result']->execute(array($param));
                $data['data'] = $data['result']->fetchAll();
                $data['db']->closeConnection();
                return json_encode($data['data']);
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        } 
    }

    // form
    private function subjectEditIdForm($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('subjectEditIdForm'));
                $data['result']->execute(array($param['name'], $param['id']));

                if ($data['result']) {
                    $data['response']['message'] = "Subject has been successfully edited.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function courseEditIdForm($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('courseEditIdForm'));
                $data['result']->execute(array($param['course_offered'], $param['course_applied'], $param['id']));

                if ($data['result']) {
                    $data['response']['message'] = "Course has been successfully edited.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (Exception $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function subjectAddIdForm($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {
                $myObj = array(
                    'subject' => array(
                        'course_id'=> $param['course_id'],
                        'name'=> $param['name'], 
                    ),
                );
                if (self::backupChecker(json_encode(array($myObj))) == false) return self::errorResponse("error occured in database", "400");

                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('subjectAddIdForm'));
                $data['result']->execute(array($param['course_id'], $param['name'], 0));

                if ($data['result']) {
                    $data['response']['message'] = "Subject has been successfully added.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function CourseAddIdForm($param)
    {
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) { 
                $myObj = array(
                    'course' => array(
                        'course_offered'=> $param['course_offered'],
                        'course_applied'=> $param['course_applied']
                    ),
                );
                if (self::backupChecker(json_encode(array($myObj))) == false) return self::errorResponse("error occured in database", "400");

                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('CourseAddIdForm'));
                $data['result']->execute(array($param['course_offered'], $param['course_applied'], 0));

                if ($data['result']) {
                    $data['response']['message'] = "Course has been successfully added.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function addNewInstructorForm($param){
        try {
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) { 
                $data['school_id'] = uniqid();
                $param['password'] = md5($param['password']);
                $myObj = array(
                    'instructor' => array(
                        'school_id'=> $data['school_id'],
                        'email'=> $param['email']
                    ),
                );
                if (self::backupChecker(json_encode(array($myObj))) == false) return self::errorResponse("error occured in database", "400");

                $data['result'] = $data['db']->getConnection()->prepare($data['model']->makeQuery('addNewInstructorForm'));
                $data['result']->execute(array($data['school_id'], $param['email'], $param['password'], 'instructor'));

                if ($data['result']) {
                    $data['response']['message'] = "Course has been successfully added.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else {
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else {
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
    private function EditNewInstructorForm($param){
        try {
            
            $data['db'] = new Database();
            $data['model'] = new Model();
            $data['db']->init();
            if ($data['db']->getStatus()) {  
                if(isset($param['password'])) {
                    $param['password'] = md5($param['password']);
                    $temp = array($param['school_id'], $param['email'], $param['password'], $param['role'], $param['id']);
                    $query = "UPDATE `users` SET `school_id` = ?, `email`= ?, `password` = ?, `role` = ? WHERE `users`.`id` = ?"; 
                } 
                else{
                    $temp = array($param['school_id'], $param['email'], $param['role'], $param['id']);
                    $query = "UPDATE `users` SET `school_id` = ?, `email`= ?, `role` = ? WHERE `users`.`id` = ?"; 
                }  
                $data['result'] = $data['db']->getConnection()->prepare($query);
                $data['result']->execute($temp);

                if ($data['result']) { 
                    $data['response']['message'] = "Instructor has been successfully Edit.";
                    $data['response']['status'] = "200";
                    $data['db']->closeConnection();
                    return json_encode($data['response']);
                } else { 
                    $data['db']->closeConnection();
                    return self::errorResponse("error!", "400");
                }
            } else { 
                $data['db']->closeConnection();
                return self::errorResponse("error!", "400");
            }
        } catch (PDOException $error) {
            $data['db']->closeConnection();
            return self::errorResponse($error, "501");
        }
    }
}
