<?php
    class hanghoa
    {
        function getHangHoa()
        {
            $db = new connect();
            $select = "select  * from hanghoa a, cthanghoa b, mausac c where a.mahh=b.idhanghoa && b.idmau=c.idmau && dacbiet!=1  group by a.mahh ";
            $result = $db->getList($select);
            return $result;
        }
        // Phương thức insert 
        function insertHangHoa($tenhh,$giamgia,$hinh, $maloai, $slx, $ngaylap, $mota)
        {
            $db = new connect();
            $query = "insert into hanghoa(mahh,tenhh,giamgia,hinh,maloai,soluotxem,ngaylap,mota) 
                values(Null,'$tenhh',$giamgia,'$hinh',$maloai,$slx,'$ngaylap','$mota')" ;
            $result = $db->exec($query);
            return $result;
        }
        //Lấy thông tin của 1 sản phẩm 
        function getHangHoaID($id)
        {
            $db = new connect();
            $select = "select  * from hanghoa where mahh=$id";
            $result = $db->getInstance($select);
            return $result;
        }
        //Phương thức update 
        function updateHangHoa($mahh, $tenhh, $maloai, $hinh, $giamgia, $slx, $ngaylap, $mota)
        {
            $db = new connect();
            $query = "UPDATE hanghoa SET tenhh='$tenhh', maloai=$maloai, hinh='$hinh', giamgia=$giamgia, soluotxem=$slx, ngaylap='$ngaylap', mota='$mota' WHERE mahh=$mahh";
            $result = $db->exec($query);
            return $result;
        }



        function getMau(){
            $db=new connect();
            $select="select * from mausac";
            $result=$db->getList($select);
            return $result;
        }

        //Phương thức thống kê
        function getThongKe()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

        function getIDNew() {
            $db = new connect ();
            $select = "SELECT mahh
            FROM hanghoa
            ORDER BY mahh DESC
            LIMIT 1;
            ";
            $result = $db->getInstance($select);
            return $result[0];
        }

        function deleteHangHoa($id) {
            $db=new connect();
            $query = "DELETE FROM hanghoa WHERE mahh = $id";
            $result = $db->exec($query);
            return $result; // Trả về true nếu có ít nhất một hàng bị xóa, ngược lại trả về false
        }

        function softDeleteHangHoa($mahh)
    {
        $db = new connect();
        $query = "UPDATE hanghoa SET dacbiet = 1 WHERE mahh = $mahh";
        $result = $db->exec($query);
        return $result;
    }

    function getSLT()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,sum(a.soluongton)as soluong FROM cthanghoa a,hanghoa b WHERE a.idhanghoa=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

    function getMin()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,MIN(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

    function getMax()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,MAX(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }
    }

?>