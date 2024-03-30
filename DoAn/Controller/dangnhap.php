<?php
    $act = "dangnhap";
    if (isset ($_GET['act'])) {
        # code...
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            # code...
            include_once "./View/login.php";
            break;

        case 'dangnhap_action':
            # code.
            $user = '';
            $pass = '';
            if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
                $user = $_POST['txtusername']; //tinxu
                $pass = $_POST['txtpassword']; //1234
                $saltF = "G234#!";
                $saltL = "Ta78@#";
                $passnew = md5($saltF. $pass. $saltL);
                // controller yêu cầu model truy vấn xem có user đó hay không
                $kh=new user();
                $logkh=$kh->logKhachHang($user, $passnew);// trả là array
                if($logkh)
                {
                    // nếu đăng nhập thành công, thì tạo session để lưu trữ thông tin kh
                    $_SESSION['makh']=$logkh['makh'];
                    $_SESSION['tenkh']=$logkh['tenkh'];
                    echo '<script> alert("Đăng nhập thành công"); </script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                }
                else
                {
                    echo '<script> alert("Đăng nhập không thành công"); </script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
                }
            }
            break;
        
        case 'dangxuat':
            // unset($_SESSION['makh']);
            // unset($_SESSION['tenkh']);
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            # code...
            break;
    }
?>