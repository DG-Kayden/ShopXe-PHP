
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a href="index.php?action=hanghoa&act=insert_hanghoa"><button type="button" class="btn btn-primary"><h4>Thêm sản phẩm</h4></button></a>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mã loại</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Số lượng tồn</th>
        <th>Mau sắc</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh=new hanghoa();
        $result=$hh->getHangHoa();
        while ($set=$result->fetch()):
      ?>
      <tr>
        <td><?php echo $set['mahh'];?></td>
        <td><?php echo $set['tenhh'];?></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dongia'];?></td>
        <td><?php echo $set['giamgia'];?></td>
        <td><img src="Content\imagetourdien\<?php echo $set['hinh']; ?>" width="150px" hight="150px" alt=""></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><?php echo $set['mausac'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><a href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh'] ?>"><button type="button" class="btn btn-primary">Cập nhật</button></a></td>
<td><form action="index.php?action=hanghoa&act=delete_hanghoa" method="post">
                    <input type="hidden" name="mahh" value="<?php echo $set['mahh']; ?>">
                    <input type="hidden" name="soft_delete" value="1">
                    <input type="submit" class="btn btn-danger" value="Xóa">
                  </form></td>
      </tr>
      <?php 
        endwhile;
      ?>
     
    </tbody>
  </table>
</div>