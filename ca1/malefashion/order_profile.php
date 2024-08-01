<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$orders = $dbHelper->select("select * from orders");

?>
<section class="container">
    <h4>history</h4>
    <table class="table">
        <thead>
            <tr>
                <th>userId</th>
                <th>total</th>
                <th>status</th>
                <th>createdAt</th>
                <th>note</th>
                <th>phone</th>
            </tr>
        </thead>

        <?php
        foreach ($orders as $order) {
            $status = "";
            if ($order['status'] == 0) {
                $status = "cho xac nhan";
            } elseif ($order['status'] == 1) {
                $status = " da xac nhan";
            } elseif ($order['status'] == 2) {
                $status = "dang giao";
            } else {
                $status = "giao hang thanh cong";
            }
            echo "<tr>";
            echo "<td>$order[userId]</td>";
            echo "<td>$order[total]</td>";
            echo "<td>$status</td>";
            echo "<td>$order[createdAt]</td>";
            echo "<td>$order[note]</td>";
            echo "<td>$order[phone]</td>";
            echo "</tr>";
        }


        ?>

        </tr>
    </table>
    </div>
</section>