<?php

declare(strict_types=1);

function change_address(object $pdo, int $user_id, string $new_address) 
{

      set_address($pdo, $user_id, $new_address);
}