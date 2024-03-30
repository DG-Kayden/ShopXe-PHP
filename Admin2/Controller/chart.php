<?php
$act = "chart";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'chart':
        include_once "./View/chart.php";
        break;
    case 'tonkho':
        
        include_once "./View/chart.php";
        break;

    case 'least':

        include_once "./View/chart.php";
        break;

}

?>