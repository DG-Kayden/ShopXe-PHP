<?php
$act="dangky";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}

switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;
    case 'dangky_action':
        // nhận thôn tin
        $tenkh='';
        $diachi='';
        $sodt='';
        $user=' ';
        $email='';
        $pass='';
        if(isset($_POST['submit']))
        {
            echo
            $tenkh=$_POST['txttenkh'];
            $diachi=$_POST['txtdiachi'];
            $sodt=$_POST['txtsodt'];
            $user=$_POST['txtusername'];
            $email=$_POST['txtemail'];
            $pass=$_POST['txtpass'];
            // mã hóa pass
            $saltF="G234#!";
            $saltL="Ta78@#";
            $passnew=md5($saltF.$pass.$saltL);
            // controller yêu cầu đem thông tin này lưu vào database? Model
            // Trước khi chèn cần kiểm tra username và email có tồn trong database
            $kh=new user();
            $check=$kh->checkKhachHang($user, $email)->rowCount();
            if($check>=1)
            {
                echo '<script> alert("Username và email đã tồn tại"); </script>'; 
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';  
            }
            else
            {
                // insert vào database
                $iskh=$kh->insertKhachHang($tenkh, $user, $passnew, $email, $diachi, $sodt); 
                if($iskh!==false)
                {
                    echo '<script> alert("Đăng ký thành công"); </script>';
                    include_once "./View/home.php";
                }
                else
                {
                    echo '<script> alert("Đăng ký không thành công"); </script>';
                    // include_once "./View/registration.php";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';
                }
            }
        }
        break;
    // case 'dangnhap':
    //     // Hiển thị form đăng nhập
    //     include_once "./View/login.php";
    //     break;

    // case 'dangnhap_action':
    //     // Xử lý đăng nhập
    //     $username = isset($_POST['txtusername']) ? $_POST['txtusername'] : '';
    //     $password = isset($_POST['txtpass']) ? $_POST['txtpass'] : '';

    //     // Mã hóa mật khẩu để so sánh với dữ liệu trong database
    //     $hashedPassword = md5($saltF . $password . $saltL);

    //     // Controller yêu cầu kiểm tra thông tin đăng nhập? Model
    //     // ... (Thực hiện kiểm tra và xử lý đăng nhập)
    //     if ($loginSuccess) {
    //         // Đăng nhập thành công, thực hiện chuyển hướng hoặc xử lý khác
    //         header('Location: dashboard.php');
    //         exit;
    //     } else {
    //         // Đăng nhập thất bại, hiển thị thông báo hoặc xử lý khác
    //         echo "Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin đăng nhập.";
    //     }
    //     break;
}
?>