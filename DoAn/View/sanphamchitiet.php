<!-- <script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script> -->
<section>
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-8 ">
                        <div class="tab-content ">
                            <?php
                            if (isset($_GET['id'])) {
                                # code...
                                $id = $_GET['id'];

                                $hh = new hanghoa();
                                $sp = $hh->getHangHoaId($id);
                                $tenhh = $sp['tenhh'];
                                $mota = $sp['mota'];
                                $dongia = $sp['dongia'];
                            }
                            ?>
                            <?php
                            $hinh = $hh->getHangHoaHinh($id);
                            $set = $hinh->fetch();
                            ?>

                            <div class="tab-pane active" id="">
                                <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" alt="">
                            </div>

                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            while ($img = $hinh->fetch()):
                                ?>
                                <li class="active"><a href="#<?php echo $img['hinh']; ?>" data-toggle="tab">
                                        <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>"
                                            alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                                <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="details col-md-4">
                        <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                        <h3 class="product-title">
                            <?php echo $tenhh ?>
                        </h3>
                        <div class="rating">
                            <div class="pstar" data-pid="<?=$id ?>">
                                Your rating:
                                <?php 
                                    // for ($i = 1; $i <=5; $i++) {
                                    //     $img=$i<=$rating?"star":"star_blank";
                                    //     echo"<img src='Content/imagetourdien/$img.png' style='width:20px;cursor:pointer;' data-set='$i'>";
                                    // }
                                ?>
                            </div>
                        </div>
                        <p class="product-description">
                            <?php
                            echo $mota
                                ?>
                        </p>
                        <h4 class="price">Giá bán:
                            <?php echo number_format($dongia) ?> đ
                        </h4>

                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                                <?php
                                $mau = $hh->getHangHoaMau($id);
                                while ($set = $mau->fetch()):
                                    ?>
                                    <option value="<?php echo $set['idmau'] ?>">
                                        <?php echo $set['mausac']; ?>
                                    </option>
                                    <?php
                                endwhile
                                ?>
                            </select><br>

                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>

                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default"
                                    type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>





            </div>
        </div>
        <!-- </div> -->
    </article>

    <form id="ninForm_2" method="post" target="_self">
        <input type="hidden" name="pid" id="ninPdt">
        <input type="hidden" name="stars" id="ninStar"> 
    </form>
</section>

<?php
if (isset($_SESSION['makh'])):
# code...

?>
<p class="float-left"><b>Bình luận</b></p>

</div>

<form action="index.php?action=binhluan" method="post">
    <div class="row">

        <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
        <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />
        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"
            placeholder="Thêm bình luận">  </textarea>
        <input type="submit" name="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />

    </div>

</form>
<div class="row">
    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
    <?php
        $bl = new binhluan();
        $noidung = $bl->selectBinhLuan($id);
        while ($set = $noidung->fetch()):
    ?>
        <div class="col-12">
            <div class="row">
                <img src="Content/imagetourdien/people.png" alt="" width="30px" height="30px">
                <p>
                    <?php echo '<b>' . $set['username'] . '</b>:' . $set['content']; ?>
                </p>
            </div>
        </div>
    <?php
        endwhile;
    ?>
</div>
    <div class="row">
        <br />
    </div>

    </div>
    <?php 
        endif;
    ?>
    </section>
    <!-- </div>     -->

<script>
    var star={
        init:function(){
            for(let docket of document.getElementsByClassName('pstar'))// Thấy được thẻ div bên ngoài
            {
                for(let star of docket.getElementsByTagName("img"))
                {
                    star.addEventListener("click", star.click);
                }
            }
        },
        click:function(){
            //Lấy ra 5 ngôi sao
            let all=this.parentElement.getElementsByTagName("img"),
            set = this.dataset.set,
            i=1;
            for(let star of all)
            {
                star.src=i<=set?"star.png":"star_blank.png";
                i++;
            }
            // Đổ dữ liệu lên form, mà form cho ẩn
            document.getElementById("ninPdt").value=this.parentElement.dataset.pid;
            document.getElementById("ninStar").value=this.dataset.set;
            document.getElementById("ninForm_2").submit();
        }
    };
    window.addEventListener("DOMContentLoader", star.init);
</script>