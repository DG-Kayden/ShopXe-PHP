<?php
//xem ng dùng có giỏ hàng hay chưa, nếu chưa thì tạo ra giỏ hàng
    if (!isset($_SESSION['cart'])) {
        # code...
        //tạo giỏ hàng
        $_SESSION['cart']=array();//chứa nhiều món hàng
    }
    $act="giohang";
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];

    }
    switch ($act) {
        case 'giohang':
            # code...
            include_once "./View/cart.php";
            break;
        case 'giohang_action':
            # code...
            $id = 0;
            $mausac = '';
            $soluong = 0;
            if (isset($_POST['mahh'])) {
                # code...
                $id = $_POST['mahh'];
                $mausac = $_POST['mymausac'];
                $soluong = $_POST['soluong'];
                // Controller yêu cầu add thông tin này trong giỏ hàng
                $gh = new giohang();
                $gh->addCart($id,$mausac,$soluong); 
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
        case 'giohang_xoa':
            if (isset($_GET['id'])) {
                # code...
                $id=$_GET['id'];
                unset($_SESSION['cart'][$id]);
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
        case 'update_gh':
            # code...
            if (isset($_POST['newqty'])) {
                # code...
                $newqty=$_POST['newqty'];
                //Duyệt qua giỏ hàng, hàng nào mà có số lượng khác với newqty thì tiến hành update
                foreach ($newqty as $key => $value) {
                    # code...
                    if ($_SESSION['cart'][$key]['soluong']!=$value) {
                        # code...
                        $gh = new giohang();
                        $gh->updateHH($key,$value);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
    }

?>