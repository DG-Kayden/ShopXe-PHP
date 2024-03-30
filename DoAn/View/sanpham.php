  <!-- quảng cáo -->
  <?php
//   include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  
  <?php
        // b1: tổng số sản phẩm trên trang tổng số sản phẩm
        $hh=new hanghoa();
        //cách 1: dùng truy vấn count
        // $count=$hh->getCountHangHoaAll();//14
        // cách 2: dùng rowcount
        $count=$hh->getHangHoaAll()->rowCount();// 14
        //b2: cho giới hạn 1 trang bao nhiêu sản phẩm
        $limit=8;
        //b3: xác định cáo bao nhiêu trang, và start
        $trang=new page();
        $page=$trang->findPage($count, $limit);//2
        // lấy start
        $start=$trang->findStart($limit);//8
    ?>
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 <?php
    $ac=1;
    if (isset($_GET['action'])) {
        # code...
        if (isset($_GET['act']) && $_GET['act']=='sanphamkhuyenmai') {
            # code...
            $ac=2;
        }
        elseif (isset($_GET['act']) && $_GET['act']=='timkiem') {
            # code...
            $ac=3;
        }
        else
        {
            $ac=1;
        }
    }
 ?>

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
            <?php
                if($ac==1)
                {
                    echo '<h3 class="mb-5 font-weight-bold" style="color: red;">TẤT CẢ SẢN PHẨM</h3>';
                } if($ac==2)
                {
                    echo '<h3 class="mb-5 font-weight-bold" style="color: red;">TẤT CẢ SẢN PHẨM KHUYẾN MÃI</h3>';
                }
                if ($ac==3) {
                    # code...
                    echo '<h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM TÌM KIẾM</h3>';
                }
                
            ?>
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
        <?php
            $hh=new hanghoa();
            if($ac==1)
            {
                $result=$hh->getHangHoaAll();//14 sản phẩm
            }
            if ($ac==2) {
                # code...
            }
            {
                 $result=$hh->getHangHoaAllSale();//8 san phẩm
            }
            if ($ac==3) {
                # code...
                if (isset($_POST['txtsearch'])) {
                    # code...
                    {
                        $tk=$_POST['txtsearch'];
                        $result=$hh->selectTimKiem($tk,$start,$limit);
                    }
                }
            }
            // đỗ từng sp lên view
            while($set=$result->fetch()):
        ?>
         
              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="Content\imagetourdien\<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                
                <?php
                    if($ac==1 || $ac==3)
                    {
                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">'.number_format($set['dongia']).'<sup><u></u></sup></</h5>
                        ';
                    } 
                    if($ac==2)
                    {
                        echo '<h5 class="my-4 font-weight-bold">
                        <font color="red">'.number_format($set['dongia'] - $set['giamgia']).'<sup><u>d</u></sup></font>
                        <strike>'.number_format($set['dongia']).'</strike><sup><u>d</u></sup>
                        </h5>';
                    }
                ?>
                <a href="index.php?action=sanpham&mn=sanphamchitiet&id=<?php echo $set['mahh'];?>">
                      <span><?php echo $set['tenhh']." - ".$set['mausac'];  ?></span></br></a>
                  <!-- <button class="btn btn-danger" id="may4" value="lap 4">New</button> -->
                  <h5>Số lượt xem:<?php echo $set['soluotxem'];?></h5>
              </div>
          <?php
            endwhile;
          ?>
      </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					
				    <li ><a href=""></a></li>
				   
				</ul>
</div>