<?php
    $act="dangnhap";
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            # code...
            include_once "./View/dangnhap.php";
            break;
        
        case 'dangnhap_action':
            # code...
            //nhan ve, kiem tra
            if ($_SERVER['REQUEST_METHOD']=="POST") {
                # code...
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                // dem thong tin nay kiem tra co hay khong
                $nv=new nhanvien();
                $check=$nv->getAdmin($user,$pass);
                if ($check!==false) {
                    # code...
                    $_SESSION['admin']=$check['username'];
                    echo '<script> alert("Đăng nhập thành công"); </script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';    
                }
                else
                {
                    echo '<script> alert("Đăng nhập không thành công"); </script>';
                    include_once './View/dangnhap.php';
                }
            }
            break;

        case 'log_out':
            session_unset();
            echo '<script> alert("Đã đăng xuât thành công"); </script>';
            include_once './View/dangnhap.php';
            break;
    }
?>