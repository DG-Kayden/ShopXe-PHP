<?php

    class hoadon
    {
        //phương thức insert vào bảng hóa đơn
        function insertHoadon ($makh)
        {
            $date = new DateTime('now');
            $ngay = $date->format('Y-m-d');
            $db = new connect();
            $query = "insert into hoadon (masohd, makh, ngaydat, tongtien) values (Null, $makh, '$ngay',0)";
            $db->exec($query);
            // insert xong thì cần lấy ra mã hóa đơn vừa insert
            $select = "select masohd from hoadon order by masohd desc limit 1";
            $mahd = $db->getInstance($select);
            return $mahd[0]; // trả về mảng $mahd=array(5); trả về số 5
        }
        // phương thức insert vào bảng chi tiết hóa đơn
        function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $thanhtien)
        {
            $db = new connect();
            $query = "insert into cthoadon (masohd, mahh, soluongmua, mausac, thanhtien, tinhtrang)
            values($masohd, $mahh, $soluongmua, '$mausac', $thanhtien, 0)";
            $db->exec($query);
        }
        // phương thức update tong tien vào lại bảng hoadon
        function updateHoaDonTongTien($masohd, $makh, $tongtien)
        {
            $db=new connect();
            $query="update hoadon set tongtien=$tongtien WHERE masohd=$masohd and makh=$makh";
            $db->exec($query);
        } 

        // phương thức hiển thị thông tin khách hàng dựa vào masohd
        function selectThongTinKHHD($masohd)
        {
            $db=new connect();
            $select="select b.masohd,b.ngaydat, a.tenkh,a.diachi,a.sodienthoai from khachhang a
            INNER JOIN hoadon b on a.makh=b.makh WHERE b.masohd=$masohd";
            $result=$db->getInstance($select);
            return $result;
        }

        // phương thức lấy thông tin hàng hóa theo mã số hd
        function selectThongTinHHID($masohd)
        {
            $db=new connect();
            $select="select DISTINCT a.tenhh,c.mausac,b.dongia,c.soluongmua
            from hanghoa a, cthanghoa b, cthoadon c WHERE a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
            $result=$db->getList($select);
            return $result;
        }
    }
?>