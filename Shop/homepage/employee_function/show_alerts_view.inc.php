<?php

declare(strict_types=1);

session_start();

function check_alerts()
{

    if (isset($_GET["noAlert"]) && $_GET["noAlert"] === "yes") {
        echo "<br> There are no alerts!!";
    } else if (isset($_SESSION['low_stock_prod'])) {
        echo "<br>These products have low inventory: ";
        echo "<br>";
        $low_stock_prods = $_SESSION['low_stock_prod'];

        echo"<br>";

        foreach ($low_stock_prods as $row) {
            echo '<p>' . $row['prod_name'] . '</p>';
        }

        unset($_SESSION['low_stock_prod']);

    } else if (isset($_SESSION['unread_messages'])){
        echo "<br> You have new messages from customers!! Click on 'Inbox' to view details!";
        }
        else {
        echo"<br> Click on Check alerts to get alerts! ";
    }
}
