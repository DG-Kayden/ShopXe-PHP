<?php
    class giohang{
        // thêm thông 1 sản phẩm vào trong giỏ hàng

        function addCart($mahh, $mausac, $soluong)
        {
            // còn thiếu hình, tên, dongia, thanhtien
            $sanpham=new hanghoa();
            $sp=$sanpham->getHangHoaId($mahh);
            $tenhh=$sp['tenhh'];
            $dongia=$sp['dongia'];
            $mau=$sanpham->getHangHoaTenMau($mausac);// Màu sắc là id chứ không phải tên
            $tenmau=$mau['mausac'];
            // lấy hình
              $hoadon1 = new hanghoa;
              $hoadon2 = $hoadon1->getHangHoaHinh($mahh);
              while($set=$hoadon2->fetch())
              {
                $img=$set['hinh'];
              }
            $total=$soluong*$dongia;
            // giỏ hàng chứa 1 món hàng, món hàng là 1 object
            $flag=false;
            //trước khi đưa 1 object vào giỏ hàng thì kiểm tra hàng đó có tồn tại trong gio hàng chưa
            foreach($_SESSION['cart'] as $key => $item) {
                if($item['mahh']==$mahh )
                {
                    $flag=true;
                    $soluong+=$item['soluong'];
                    $this->updateHH($key,$soluong);
                }
            }
            if($flag==false) {
                $item=array(
                    'mahh'=>$mahh, // thuộc tính=>giá trị, trong đó thuộc tính tự đặt
                    'tenhh' =>$tenhh,
                    'mausac'=>$mausac,
                    'soluong'=>$soluong,
                    'dongia'=>$dongia,
                    'thanhtien'=>$total,
                    'hinh'=>$img
                );
                // đem đối tượng add vào giỏ hàng a[]
                $_SESSION['cart'][]=$item;
            }
        }

        //Phương thức tính tổng thành tiền trên giỏ hàng    
        function getSubTotal(){
            $subtotal =0;
            foreach($_SESSION['cart'] as $key => $item){
                $subtotal+=$item['thanhtien'];
            }
            $subtotal=number_format($subtotal,2);
            return $subtotal;
        }

        //Phương thức Update
        function updateHH($index,$soluong){
            if ($soluong < 0) {
                # code...
                unset($_SESSION['cart'][$index]);
            }else {
                // Cập nhật tức là phép gán
                $_SESSION['cart'][$index]['soluong']=$soluong;
                $tiennew = $_SESSION['cart'][$index]['soluong']* $_SESSION['cart'][$index]['dongia'];
                $_SESSION['cart'][$index]['thanhtien']=$tiennew;
            }
        } 
        
    }
?>