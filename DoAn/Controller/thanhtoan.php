<?php
    if(isset($_SESSION['makh']))
    {
        $makh=$_SESSION['makh'];
        // controller yêu cầu model insert vào bảng hóa đơn trước để sinh ra masohd rồi mới đc insert bảng cthoadon
        $hd=new hoadon();
        $sohd=$hd->insertHoadon($makh);// số 5
        $_SESSION['masohd']=$sohd;
        $total=0;
        // lúc này đã có mã số hd vừa thêm vào thì đc insert vào chitiethoa đơn
        // chi tiết hóa đơn tức là lấy từ giỏ hàng thêm vô
        foreach ($_SESSION['cart'] as $key => $item) {
            //controller yêu cầu model insert vào chi tiết hóa đơn
            $hd->insertCTHoaDon ($sohd, $item['mahh'], $item['soluong'], $item['mausac'], $item['thanhtien']);
            $total+=$item['thanhtien'];
            // hàm cập nhật số lượng tồn theo mã hàng
            // updatesoluongTonhh ($mahh, $mausac, $soluongmua)
        }
        // sau khi insert vào bảng cthoadon thì update tổng thành tiền trở lại hóa đơn
        $hd->updateHoaDonTongTien($sohd, $makh, $total);
    }
    // unset($_SESSION['cart']);
    include_once "./View/order.php";
?>