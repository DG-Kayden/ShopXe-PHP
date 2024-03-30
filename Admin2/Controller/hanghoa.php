<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

function uploadImage()
{
    // thiết lập đuoèng dẫn chứa hình
    $target_dir = "../DoAn/Content/imagetourdien/";

    $target_file = $target_dir . basename($_FILES['image']['name']);
    // lấy phần mở rộng của hình ra
    $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Kiểm tra xem hình đó có được upload lên server hay không
    $upload = 1;
    if (isset ($_POST['submit'])) {
        $check = getimagesize($_FILES['image']['tmp_name']);
        // $check=$_FILES['image']['size']
        if ($check !== false) {
            $upload = 1;
        } else {
            $upload = 0;
        }
    }
    // kiểm tra xem hình đó có tồn tại trong thư mục hình chưa
    if (file_exists($target_file)) {
        echo '<script>alert("Hình đã tồn tại");</script>';
        $upload = 0;
    }
    // kiểm tra hình có vượt quá dung lượng hay không 500kb=500000b
    if ($_FILES['image']['size'] > 500000000) {
        echo '<script>alert("Hình vượt quá dung lượng");</script>';
        $upload = 0;
    }
    // kiểm tra có phải là hình hay không
    if ($imagefileType != "jpg" && $imagefileType != "png" && $imagefileType != "jpeg" && $imagefileType != "gif") {
        echo '<script>alert("Không phải là hình");</script>';
        $upload = 0;
    }
    if ($upload == 1) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo '<script>alert("Up hình thành công");</script>';
        } else {
            echo '<script>alert("Up hình ko thành công");</script>';
        }
    }
}

switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;

    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;

    case 'insert_action':
        // Kiểm tra xem yêu cầu có phải là POST không
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $slx = $_POST['slx'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            $slt = $_POST['slt'];
            $giamgia = $_POST['giamgia'];
            $dongia = $_POST['dongia'];
            $mamau = $_POST['mamau'];
            $hinh = $_POST['hinh'];
            // Đưa dữ liệu vào cơ sở dữ liệu
            $hh = new hanghoa();
            $check = $hh->insertHangHoa($tenhh, $giamgia,$hinh, $maloai, $slx, $ngaylap, $mota);
            $mahh = $hh->getIDNew();
            $ct = new cthanghoa();
            $check = $ct->insertCTHangHoa($mahh,$mamau,$dongia,$slt);
            if ($check !== false) {
                // Thông báo thành công và chuyển hướng trang
                echo '<script> alert("Thêm dữ liệu thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
                // Thêm thông tin chi tiết hàng hóa
                
            } else {
                // Thông báo thất bại và hiển thị lại form
                echo '<script> alert("Thêm dữ liệu không thành công"); </script>';
                include_once "./View/edithanghoa.php";
            }
            

        }
        break;

    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;

    case 'update_action':
        // Kiểm tra xem yêu cầu có phải là POST không
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $slx = $_POST['slx'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            $slt = $_POST['slt'];
            $giamgia = $_POST['giamgia'];
            $dongia = $_POST['dongia'];
            $mamau = $_POST['mamau'];
            $hinh = $_POST['hinh'];
            // Cập nhật dữ liệu vào cơ sở dữ liệu
            $hh = new hanghoa();
            $check = $hh->updateHangHoa($mahh,$tenhh, $giamgia, $hinh, $maloai, $slx, $ngaylap, $mota);
            // $mahh = $hh->getIDNew();
            $ct = new cthanghoa();
            $check = $ct->updateCTHangHoa($mahh,$mamau,$dongia,$slt);
            if ($check !== false) {
                // Thông báo thành công và chuyển hướng trang
                echo '<script> alert("Cập nhật dữ liệu thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
            } else {
                // Thông báo thất bại và hiển thị lại form
                echo '<script> alert("Cập nhật dữ liệu không thành công"); </script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;
    
        case 'delete_hanghoa':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset ($_POST['mahh'])) {
                    $mahh = $_POST['mahh'];
                    $hh = new hanghoa();
                    if (isset ($_POST['soft_delete']) && $_POST['soft_delete'] == 1) {
                        $check = $hh->softDeleteHangHoa($mahh);
                        if ($check !== false) {
                            echo '<script>alert("Ẩn sản phẩm thành công");</script>';
                        } else {
                            echo '<script>alert("Ẩn sản phẩm không thành công");</script>';
                        }
                    } else {
                        echo '<script>alert("Không có ID sản phẩm để xóa");</script>';
                    }
                    echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
                }
            }
            break;
}
?>
