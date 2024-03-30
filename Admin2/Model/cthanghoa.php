<?php
    class cthanghoa{
        function insertCTHangHoa($mahh,$mamau,$dongia,$slt)
        {
            $db=new connect();
            $query="insert into cthanghoa(idhanghoa,idmau,dongia,soluongton) values ($mahh,$mamau,$dongia,$slt)";
            $result=$db->exec($query);
            return $result;
        }

        function updateCTHangHoa($mahh,$mamau, $dongia, $slt) {
            $db = new connect();
            $query = "UPDATE cthanghoa SET idmau=$mamau, dongia=$dongia, soluongton=$slt WHERE idhanghoa=$mahh";
            $result = $db->exec($query);
            return $result;
        }
        
        // function updateCTHangHoa($mahh, $mamau, $dongia, $slt) {
        //     $db = new connect();
        //     $query = "UPDATE cthanghoa SET mamau=$mamau, dongia=$dongia, soluongton=$slt WHERE mahh=$mahh";
        //     $result = $db->exec($query);
        //     return $result;
        // }        
        
        function getCTHangHoaID($id)
        {
            $db = new connect();
            $select = "select  * from cthanghoa where idhanghoa=$id";
            $result = $db->getInstance($select);
            return $result;
        }
     
    }
?>