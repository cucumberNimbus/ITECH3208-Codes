<?php
declare(strict_types=1);

require_once 'update_employee_profile_model.inc.php';

function show_emp_username(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    echo $result['username'];
}

function show_emp_email(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['email'] == "not_set"){
        echo "N/A";
    } else {
        echo $result['email'];
    }
}

function show_emp_full_name(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['full_name'] == "not_set"){
        echo "N/A";
    } else {
        echo $result['full_name'];
    }
}

function show_emp_address(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['address'] == "not_set"){
        echo "N/A";
    } else {
        echo $result['address'];
    }
}

function show_emp_phone_number(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['phone_number'] == "not_set"){
        echo "N/A";
    } else {
        echo $result['phone_number'];
    }
}

function show_emp_dob(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['dob'] == "not_set"){
        echo "N/A";
    } else {
        echo $result['dob'];
    }
}

function show_na_message(object $pdo, int $emp_id)
{
    $result = get_emp_details($pdo, $emp_id);
    if ($result['full_name'] == "not_set"){
        echo "<h5>Your credentials have not been set. Please set credentials as soon as possible!</h5>";
    } else {
        echo "<h5>Your credentials have already been set. Click on 'update details' to change personal details!</h5>";
    }
}

