<?php
    if (isset($_SESSION['makh'])) {
        # code...
        $makh=$_SESSION['makh'];
        $masp=$_POST['txtmahh'];
        $content=$_POST['comment'];
        // Tiếng hành insert vào database
        $bl=new binhluan();
        $bl->insertBinhLuan($makh,$masp,$content);
    }
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id='.$masp.'"/>';

?>