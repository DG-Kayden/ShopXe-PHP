<?php
$ac = 1;
if (isset ($_GET['action'])) {
    if (isset ($_GET['act']) && $_GET['act'] == 'chart') {
        $ac = 1;
    } else if (isset ($_GET['act']) && $_GET['act'] == 'tonkho') {
        $ac = 2;
    } else if (isset ($_GET['act']) && $_GET['act'] == 'least') {
        $ac = 3;
    }
}
?>


<div class="container">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-chart-bar-graph bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>Chart</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Page-header end -->

            <div class="page-body">
                <div class="row">

                    <?php
                    if ($ac == 1) {
                        echo '<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thống kê số lượng bán nhiều nhất
                                </h5>
                                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
                            </div>
                            <div class="card-block">
                                <div id="morris-extra-area">
                                    <div class="thongke">
                                        <div style="width: 100%" id="pie_chart_div"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    } else if ($ac == 2) {
                        echo '<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thống kê số lượng tồn
                                </h5>
                                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
                            </div>
                            <div class="card-block">
                                <div id="morris-extra-area">
                                    <div class="thongke">
                                        <div style="width: 100%" id="line_chart_div"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    } else {
                        echo '<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thống kê số lượng ít được mua
                                </h5>
                                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
                            </div>
                            <div class="card-block">
                                <div id="morris-extra-area">
                                    <div class="thongke">
                                        <div style="width: 100%" id="bar_chart_div"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }

                    ?>

                    <!-- EXTRA AREA CHART Ends -->

                    <!-- Donut chart Ends -->
                </div>
            </div>
        </div>
    </div>
</div>