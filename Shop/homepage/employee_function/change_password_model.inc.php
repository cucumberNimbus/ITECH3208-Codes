<?php

declare(strict_types=1);


function retrieve_user_details(object $pdo, int $user_id)
{
    echo "code";
    $query = "SELECT * FROM employees WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_password(object $pdo, int $user_id, string $new_password)
{
    $query = "UPDATE employees SET pwd = :new_password WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($new_password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":new_password", $hashedPwd);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}