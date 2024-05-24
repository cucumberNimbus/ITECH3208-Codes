<?php

declare(strict_types=1);

function change_payment(object $pdo, int $user_id, string $new_payment) 
{

      set_payment($pdo, $user_id, $new_payment);
}