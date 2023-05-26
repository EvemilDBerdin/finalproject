<?php
include("./database.php");
include("./model.php");

try { 
    $data['db'] = new Database(); 
    $data['db']->init();
    $data['datastorage'] = array();
    $data['query'] = '';
    $data['query'] .= "SELECT * FROM school_course WHERE `flag`= 0 ";

    if ($data['db']->getStatus()) {
        if (!empty($_POST['search']['value'])) {
            $data['query'] .= 'and course_offered LIKE "%'.$_POST["search"]["value"].'%" ';
            $data['query'] .= 'OR course_applied LIKE "%'.$_POST["search"]["value"].'%" ';  
        }
        if (!empty($_POST['order'])) {
            // $data['query'] .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $data['query'] .= 'ORDER BY id ASC ';
        } 
        if ($_POST['length'] != -1) {
            $data['query'] .= 'LIMIT '.$_POST['start'].', '.$_POST['length'];
        }
        $data['result'] = $data['db']->getConnection()->prepare($data['query']);
        $data['result']->execute(array());
        $data['recordsTotal'] = $data['result']->rowCount();
        $data['data'] = $data['result']->fetchAll();

        foreach ($data['data'] as $key => $value) {
            $data['datastorage'][] = $value;
        }

        $data['output'] = array(
            "draw"          => intval($_POST['draw']),
            "recordsTotal"  => $data['recordsTotal'],
            "recordsFiltered" => count($data['data'], 1),
            "data" => $data['datastorage'],
        );
        $data['db']->closeConnection();
        echo json_encode($data['output']);
    }
} catch (PDOException $error) {
    $data['response']['message'] = $error;
    $data['response']['status'] = "501";
    echo json_encode($data['response']);
}
