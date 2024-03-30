<?php
class hanghoa
{
  //phương thức hiện thị sản phẩm new
  function getHangHoaNew()
  {
    // b1: kết nối với dữ liệu
    $db = new connect();
    // b2: cần lấy cái gì thì lấy cái đó
    $select = "select a.mahh,a.tenhh,a.soluotxem,a.hinh,b.dongia,c.mausac from hanghoa a,cthanghoa b, mausac c
            WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and dacbiet!=1 ORDER by a.mahh DESC LIMIT 8";
    // b3: ai thực thi câu lệnh select? query, pt này nằm trong conncet cụ thể là pt
    $result = $db->getList($select);
    return $result; //lấy dữ liệu về
  }

  function getHangHoaSale()
  {
    // b1: kết nối với dữ liệu
    $db = new connect();
    // b2: cần lấy cái gì thì lấy cái đó
    $select = "select a.mahh,a.tenhh,a.soluotxem,a.hinh,b.dongia,c.mausac,a.giamgia from hanghoa a,cthanghoa b, mausac c
            WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and a.giamgia!=0 and dacbiet!=1 ORDER by a.mahh DESC LIMIT 4";
    // b3: ai thực thi câu lệnh select? query, pt này nằm trong conncet cụ thể là pt
    $result = $db->getList($select);
    return $result; //lấy dữ liệu về
  }

  function getHangHoaAllSale()
  {
    $db = new connect();
    $select = "SELECT a.mahh,a.tenhh,a.soluotxem,a.hinh,b.dongia,c.mausac, a.giamgia
            from hanghoa a, cthanghoa b, mausac c
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and a.giamgia!=0 and dacbiet!=1 ORDER by a.mahh desc";
    //ai thực thi select? query mà query nằm trong pt getlist và getInstance, 2 pt nằm trong class connect
    $result = $db->getList($select);
    return $result;
  }

  function getHangHoaAll()
  {
    //B1: Kết nối với dữ liệu
    $db = new connect();
    //B2: Cần lấy cái gì thì truy vấn cái đó (Ở đây là sản phảm mới)
    $select = "SELECT a.mahh,a.tenhh,a.soluotxem,a.hinh,b.dongia,c.mausac, a.giamgia
            from hanghoa a, cthanghoa b, mausac c
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and a.giamgia=0 and dacbiet!=1 ORDER by a.mahh desc";
    //B3: Ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
    $result = $db->getList($select);
    return $result; //Lấy được dữ liệu về
  }

  function getHangHoaId($id)
  {
    $db = new connect();
    $select = "SELECT DISTINCT a.mahh, a.tenhh,a.mota,b.dongia from hanghoa a, cthanghoa b 
          WHERE a.mahh=b.idhanghoa and a.mahh=$id";
    $result = $db->getInstance($select);
    return $result;
  }

  function getHangHoaMau($id)
  {
    $db = new connect();
    $select = "SELECT b.idmau, b.mausac from cthanghoa a, mausac b 
          WHERE a.idmau=b.idmau and a.idhanghoa=$id";
    $result = $db->getList($select);
    return $result;
  }

  function getHangHoaHinh($id)
  {
    $db = new connect();
    $select = "SELECT a.hinh from hanghoa a 
          WHERE a.mahh=$id";
    $result = $db->getList($select);
    return $result;
  }

  function getHangHoaIdMau($id, $mau)
  {
    $db = new connect();
    $select = "SELECT DISTINCT a.hinh from hanghoa a, mausac b
          WHERE a.mahh=b.idmau and a.mahh=$id and b.mausac=$mau";
    $result = $db->getInstance($select);
    return $result; // trả về 1 row, array (mahh:19, tenhh: giày....)
  }

  function getHangHoaTenMau($mausac)
  {
    $db = new connect();
    $select = "SELECT a.mausac FROM mausac a WHERE a.mausac=$mausac";
    $result = $db->getInstance($select);
    return $result; // trả về 1 row, array(mahh:19, tenhh: giày....)
  }

  //Thực hiện t= phương thức tìm kiếm
  function selectTimKiem($tenhh, $start, $limit)
  {
    //B1: Kết nối với dữ liệu
    $db = new connect();
    //B2: Cần lấy cái gì thì truy vấn cái đó (Ở đây là sản phảm mới)
    $select = "SELECT a.mahh,a.tenhh,a.soluotxem,a.hinh,b.dongia,c.mausac
                from hanghoa a, cthanghoa b, mausac c
                WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and a.tenhh like '%$tenhh%' ORDER by a.mahh desc limit ".$start.",".$limit;
    //B3: Ai thực thi câu lệnh select? query, pt này nằm trong connect cụ thể là pt
    $result = $db->getList($select);
    return $result; //Lấy được dữ liệu về
  }
}
?>