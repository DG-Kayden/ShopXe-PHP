<?php
  if (isset($_GET['id'])) {
    # code...
    $mahh=$_GET['id'];
    //truy vẫn thông tin của id
    $hh=new hanghoa();
    $kq=$hh->getHangHoaID($mahh);
    $tenhh=$kq['tenhh'];
    $maloai=$kq['maloai'];
    $slx=$kq['soluotxem'];
    $ngaylap=$kq['ngaylap'];
    $mota=$kq['mota'];
    $giamgia=$kq['giamgia'];
    $hinh=$kq['hinh'];
    $ct=new cthanghoa();
    $kt=$ct->getCTHanghoaID($mahh);
    $mamau=$kt['idmau'];
    $dongia=$kt['dongia'];
    $slt=$kt['soluongton'];

  }
?>
<?php
  if (isset($_GET['action'])) {
    # code...
    if (isset($_GET['act'])&& $_GET['act']=='insert_hanghoa') {
      # code...
      $ac=1;
    }
    else{
      $ac=2;
    }
  }
?>
<div class="row col-md-4 col-md-offset-4" >
  <?php
    if($ac==1){
      echo'<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
    }
    else{
      echo'<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';
    }
  ?>
  <!-- <form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data"> -->
    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh; ?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($tenhh)) echo $tenhh; ?>"  maxlength="100px"></td>
      </tr>
      
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            <?php
            $selectloai=-1;
            if(isset($maloai) && $maloai!=-1 ){
              $selectloai=$maloai;
            }
              $loai=new loai();
              $result=$loai->getLoai();
              while ($set=$result->fetch()) :
                # code...
            ?>
            <option value="<?php echo $set['maloai'] ?>"<?php if($selectloai==$set['maloai']) echo 'selected'; ?>><?php echo $set['tenloai'] ?></option>
            <?php
              endwhile;
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Màu</td>
        <td>
          <select name="mamau" class="form-control" style="width:150px;">
            <?php
            $selectmau=-1;
            if(isset($mamau) && $mamau!=-1 ){
              $selectmau=$mamau;
            }
              $mau = new hanghoa();
              $result=$mau->getMau();
              while ($set=$result->fetch()) :
                # code...
            ?>
            <option value="<?php echo $set['idmau'] ?>"<?php if($selectmau==$set['idmau']) echo 'selected'; ?>><?php echo $set['mausac'] ?></option>
            <?php
              endwhile;
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($dongia)) echo $dongia; ?>" name="dongia" >
        </td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($giamgia)) echo $slx; ?>" name="giamgia" >
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" class="form-control" value="<?php if(isset($slt)) echo $slt; ?>" name="slt" >
        </td>
      </tr>
      <tr>
        <td>Image</td>
        <td>
          <input type="file" name="image" id="fileupload">
        </td>
      </tr>
      <tr>
        <td>Số lượt xem</td>
        <td><input type="text" class="form-control" value="<?php if(isset($slx)) echo $slx; ?>" name="slx" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" value="<?php if(isset($ngaylap)) echo $ngaylap; ?>" name="ngaylap">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mota)) echo $mota; ?>" name="mota">
        </td>
      </tr>
      

      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>