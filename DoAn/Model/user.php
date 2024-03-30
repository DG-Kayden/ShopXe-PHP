<?php

    class user{
// phương thức kiểm tra trùng username và email
        function checkKhachHang($user, $email){
            $db=new connect();
            $select="SELECT a.username,a.email FROM khachhang a WHERE a.username='$user' or a.email='$email'";
            $result=$db->getList($select);
            return $result;
        }

// phương thức insert vào database

        function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodienthoai){
            $db=new connect();
            $query="INSERT INTO khachhang (makh,tenkh, username, matkhau, email, diachi, sodienthoai) VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sodienthoai')";
            // exec
            // echo $query;
            $result=$db->exec($query);
            return $result;
        }

        function logKhachHang($user,$pass){
            $db=new connect();
            $select="SELECT a.makh,a.tenkh,a.username from khachhang a WHERE a.username='$user' and a.matkhau='$pass'";
            $result=$db->getInstance($select);
            return $result;
        }
        function checkEmail($email)
        {
            $db=new connect();
            $select="select * from khachhang a
             WHERE a.email='$email'";
            $result=$db->getList($select);
            return $result;
        }
    }
?>
