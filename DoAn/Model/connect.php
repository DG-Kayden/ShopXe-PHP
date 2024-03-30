<?php
    class connect{
        // thuộc tính
        var $db=null;
        // hàm tạo được tạo khi nêu 1 đối tượng
        function __construct(){
            $dsn='mysql:host=localhost;dbname=shopDAN';
            $user='root';
            $pass='';// nếu xài xamp, wamp, laragon thì $pass='';
            // kết nối dựa vào class PDO
            try {
                $this->db=new PDO($dsn,$user,$pass,array(PDO:: MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                // echo "Kết nối thành công";
            } catch (\Throwable $th) {
                //throw $th;
                echo "Kết nối 0 thành công";
                echo $th;
            }
        }
        // câu lệnh select do pt query thực thi
        // phương thức triu vấn trả ra nhiều row
        function getList($select){
            $results=$this->db->query($select);// $this->db->query(select * from hanghoa)
            // echo $results;
            return($results);// trả về 1 table
        }
        // phương thức truy vấn trả về 1 row
        function getInstance($select)
        {
            $results=$this->db->query($select);// $this->db->query(select * from hanghoa)
            // echo $select;
            $result=$results->fetch();// $result là arry chỉ chứa 1 dòng, [mahh:1,tenhh:giày...]
            return $result;
        }
        // câu lệnh insert, update, delete làm ? exec
        function exec($query)
        {
            $results=$this->db->exec($query);
            // echo $results;
            return($results);
        }
        // dùng prepare
        function execp($query){
            $statement=$this->db->prepare($query);
            return $statement;
        }
        function getLoaiHangHoa(){
            //b1: ket noi voi du lieu
            $db= new connect();
            //b2: can lay cai gi thi truy van cai do
            $select="select a.maloai,a.tenloai from loai a";
            $result=$db->getList($select);
            return $result;//lay duoc du lieu
            }
	
    }
?>