<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Istana Sayur</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/morris.js/morris.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>assets/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Istana </b>Sayur</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->level == 1 ? "Admin" : "Kasir")?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?=$this->fungsi->user_login()->name?>
                  <small><?=$this->fungsi->user_login()->address?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->level == 1 ? "Admin" : "Kasir")?></span></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      </form>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
		</li>
		<li class="treeview">
          <a href="#">
			<i class="fa fa-archive"></i><span>Produk</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		  </a>
		  <ul class="treeview-menu">
			  <li><a href="<?=site_url('kategori')?>"><i class="fa fa-circle-o"></i>Kategori</a></li>
			  <li><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i>Unit</a></li>
			  <li><a href="<?=site_url('barang')?>"><i class="fa fa-circle-o"></i>Barang</a></li>
		  </ul>
		</li>

		<li class="treeview">
          <a href="#">
			<i class="fa fa-shopping-cart"></i><span>Transaksi</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		  </a>
		  <ul class="treeview-menu">
			  <li><a href="<?=site_url('penjualan')?>"><i class="fa fa-circle-o"></i>Penjualan</a></li>
			  <li><a href="<?=site_url('detailpenjualan')?>"><i class="fa fa-circle-o"></i>Detail Penjualan</a></li>
		  </ul>
		</li>
    <?php if($this->fungsi->user_login()->level == 1){ ?>
		<li class="header">SETTING</li>
		<li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i><span>Users</span></a></li>
    <li><a href="<?=site_url('metode/peramalan')?>"><i class="fa fa-line-chart"></i><span>Peramalan</span></a></li>
    <!-- <li><a href="<?=site_url('metode')?>"><i class="fa fa-gear"></i><span>Metode</span></a></li> -->
    <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- /.content -->
          <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
      <h1>
        Hasil Peramalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Hasil Peramalan</li>
      </ol>
    </section>
<!-- /.row -->
<!-- Projects Row -->
<div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="pull-right">
            <form action="<?=site_url('metode/peramalan')?>" method="post" enctype="multipart/form-data">
             <input type="hidden" name="nama_bar"  class="form-control" value="<?php echo $nama_bar; ?>">
             <button type="submit" class="btn btn-warning btn-flat">Back</button>
           </form>
            </div>
        </div>
    <div class="box-body table-responsive">
      
      <?php
       echo "Tahun : ".$tahun."<br>";
       echo "Bulan : ".$bulan."<br>";
       echo "Nama Barang : ".$nama_bar."<br>";
      $alpha = 0.1;
      for ($i=1; $i <= 10 ; $i++) { 
        $beta = 0.1;
        for ($j=1; $j <= 10 ; $j++) { 
          $jum_error2 = 0;
          $jum_abs = 0;
          $jum_dt = 0;
          
          $alpha;
          $beta;
       ?>
       
                        <?php 
                        $a = 1;
                        foreach ($tampil_id as $key) {
                         ?>
                        <?php  $a; ?>
                          <?php  $key->tahun; ?>
                          <?php  $key->bulan; ?>
                          
                            <?php  $penjualan[$i][$j][$a] = $key->jumlah; ?>
                             <?php  
                                if ($a == 1) {
                                   $levelt[$i][$j][$a] = $key->jumlah;
                                }else{
                                  
                                   $levelt[$i][$j][$a] = $alpha*$key->jumlah+(1-$alpha)*($levelt[$i][$j][$a-1]+$trendt[$i][$j][$a-1]);
                                }
                             ?>
                             <?php
                                $b = 1;  
                                foreach ($tampil_id as $r) {
                                  $nilai_p[$b] = $r->jumlah;
                                  $b++;
                                }

                                if ($a == 1) {
                                   $trendt[$i][$j][$a] = (($nilai_p[2] - $nilai_p[1]) + ($nilai_p[4] - $nilai_p[3]))/2;
                                }else{
                                   $trendt[$i][$j][$a] = $beta*($levelt[$i][$j][$a]-$levelt[$i][$j][$a-1])+(1-$beta)*$trendt[$i][$j][$a-1];
                                }
                              ?>
                             <?php  
                                if ($a == 1) {
                                   $forecastt[$i][$j][$a] = $key->jumlah;
                                }else{
                                   $forecastt[$i][$j][$a] = $levelt[$i][$j][$a-1] + $trendt[$i][$j][$a-1];
                                }
                             ?>
                             <?php  
                                 $error[$i][$j][$a] = $forecastt[$i][$j][$a] - $penjualan[$i][$j][$a];
                             ?>
                             <?php  
                                 $error2[$i][$j][$a] = $error[$i][$j][$a] * $error[$i][$j][$a];
                                $jum_error2 = $jum_error2 + $error2[$i][$j][$a];
                             ?>
                             <?php  
                                 $abs_error[$i][$j][$a] = abs($error[$i][$j][$a]);
                                $jum_abs = $jum_abs + $abs_error[$i][$j][$a];
                             ?>
                             <?php  
                                 $dt[$i][$j][$a] = $abs_error[$i][$j][$a]/$penjualan[$i][$j][$a];
                                $jum_dt = $jum_dt + $dt[$i][$j][$a];
                             ?>
                        <?php 
                        $a++;
                        } ?>
                        
                <?php
                 $rata_error2[$i][$j] = $jum_error2/($a-1);

                 $rata_abs[$i][$j] = $jum_abs/($a-1);

                 $rata_dt[$i][$j] = $jum_dt/($a-1);

                 $jum_error2;

                 $nilai_alpha[$i][$j] = $alpha;

                 $nilai_beta[$i][$j] = $beta;

                $beta = $beta + 0.1;
                }
                $alpha = $alpha + 0.1;
                }


                ?>
          <br>
          <?php 
          $min = $rata_dt['1']['1'];
          foreach ($rata_dt as $key) {
              foreach ($key as $keys => $value) {
                if ($value < $min) {
                  $min = $value;
                }
            } 
          }
          echo "Min Value : ";
          echo $min;
          echo "<br>";
          echo "MSE : ";
          echo $rata_error2[$i][$j] = $jum_error2/($a-1);
          echo "<br>";
          echo "MAD : ";
          echo $rata_abs[$i][$j] = $jum_abs/($a-1);
          echo "<br>";
          echo "SSE : ";
          echo $jum_error2;
          echo "<br>";

          $num = 1;
          for ($k=1; $k < $i ; $k++) { 
            for ($l=1; $l < $j ; $l++) { 
              if ($rata_dt[$k][$l] == $min) {
                echo "MAPE : ";
                echo $r_dt = $rata_dt[$k][$l];
                echo "<br>";
                echo "Alpha : ";
                echo $n_alpha = $nilai_alpha[$k][$l];
                echo " / Beta : ";
                echo $n_beta = $nilai_beta[$k][$l];
                break;
              }
            }
          }
           ?>
           <br>
           <br>
           <form action="<?=site_url('metode/detail_mape')?>" method="post" enctype="multipart/form-data">
             <input type="hidden" name="nama_bar"  class="form-control" value="<?php echo $nama_bar; ?>">
             <input type="hidden" name="tahun"  class="form-control" value="<?php echo $tahun; ?>">
             <input type="hidden" name="bulan"  class="form-control" value="<?php echo $bulan; ?>">
             <button type="submit" class="btn btn-primary">Detail MAPE</button>
           </form>
           <br>
           <br>
           <div class="col-md-16">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <br>
           <br>
           <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>                
                            <th>Tahun</th>                
                            <th>Bulan</th>                
                            <th>Total Penjualan</th>
                            <th>Level Lt</th>                
                            <th>Trend Tt</th>                
                            <th>Forecast Ft</th>                
                            <th>Error</th>                
                            <th>Error^2</th>                
                            <th>Absolute Error</th>                
                            <th>|Ft-Dt|/Dt</th>                
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $m = 1;
                        foreach ($tampil_id as $row) {
                         ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <td><?php echo $tahun_terakhir = $row->tahun; ?></td>
                          <td><?php echo $bulan_terakhir = $row->bulan; ?></td>
                          <td>
                            <?php echo $penjualan_2[$m] = $row->jumlah; ?>
                              
                          </td>
                          <td>
                             <?php  
                                if ($m == 1) {
                                  echo $levelt_2[$m] = $row->jumlah;
                                }else{
                                  
                                  echo $levelt_2[$m] = $n_alpha*$row->jumlah+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                                }
                             ?>
                           </td>    
                           <td>
                             <?php
                                $n = 1;  
                                foreach ($tampil_id as $re) {
                                  $nilai_p_2[$n] = $re->jumlah;
                                  $n++;
                                }

                                if ($m == 1) {
                                  echo $trendt_2[$m] = (($nilai_p_2[2] - $nilai_p_2[1]) + ($nilai_p_2[4] - $nilai_p_2[3]))/2;
                                }else{
                                  echo $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                                }
                              ?>
                           </td>
                           <td>
                             <?php  
                                if ($m == 1) {
                                  echo $forecastt_2[$m] = $row->jumlah;
                                }else{
                                  echo $forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1];
                                }
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error_2[$m] = $forecastt_2[$m] - $penjualan_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $error2_2[$m] = $error_2[$m] * $error_2[$m];
                                $jum_error2_2 = $jum_error2 + $error2_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $abs_error_2[$m] = abs($error_2[$m]);
                                $jum_abs = $jum_abs + $abs_error_2[$m];
                             ?>
                           </td>
                           <td>
                             <?php  
                                echo $dt_2[$m] = $abs_error_2[$m]/$penjualan_2[$m];
                                $jum_dt = $jum_dt + $dt_2[$m];
                             ?>
                           </td>
                        </tr>
                        <?php
                        $m++;
                        } ?>
                        <?php 
                        $panjang_tahun = 1;
                        $jumlah_bulan_2 = $bulan_terakhir;
                        if ($tahun == $tahun_terakhir) {
                          $panjang = $bulan - $bulan_terakhir;
                        }else if ($tahun > $tahun_terakhir){
                          if (($tahun - $tahun_terakhir) == 1) {
                            $panjang = $bulan + (12 - $bulan_terakhir);
                          }else{
                            $panjang = (($tahun - $tahun_terakhir)*12) + $bulan + (12 - $bulan_terakhir);
                          }
                        }else{
                          $panjang = 0;
                        }
                        $jumlah_bulan = 12 - (12 - $bulan_terakhir);
                        $jumlah_tahun = 0;
                        for ($i=0; $i < $panjang ; $i++) { ?>
                        <tr>
                          <td><?php echo $m; ?></td>
                          <?php 
                            $tahun_baru=$tahun_terakhir + $jumlah_tahun;
                            $jumlah_bulan++;
                            if ($jumlah_bulan >= 12) {
                              $jumlah_bulan = 0;
                              $jumlah_tahun++;
                            } 
                            if ($jumlah_bulan_2 >= 12) {
                              $jumlah_bulan_2 = 0;
                            }
                            $bulan_baru=$bulan_terakhir + $jumlah_bulan_2;
                            $jumlah_bulan_2++;
                            ?>
                          <td><?php
                            echo $tahun_baru;
                            ?>
                          </td>
                          <td>
                            <?php 
                            echo $bulan_baru;
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $penjualan_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1];
                            ?>
                          </td>
                          <td>
                            <?php 
                            // echo $levelt_2[$m] = $n_alpha*$forecastt_2[$m-1]+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                            echo $levelt_2[$m] = $n_alpha*($levelt_2[$m-1] + $trendt_2[$m-1])+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                            ?>
                          </td>
                          <td>
                            <?php 
                            echo $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                            ?>
                          </td>
                          <td>
                            <?php 
                            echo $forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1];
                            ?>
                          </td>
                          <td>
                          <?php  
                            echo $error_2[$m] = $forecastt_2[$m] - $penjualan_2[$m];
                             ?>
                          </td>
                          <td>
                          <?php  
                            echo $error2_2[$m] = $error_2[$m] * $error_2[$m];
                            $jum_error2_2 = $jum_error2_2 + $error2_2[$m];
                             ?>
                          </td>
                          <td>
                          <?php  
                              echo  $abs_error_2[$m] = abs($error_2[$m]);
                              $jum_abs = $jum_abs + $abs_error_2[$m];
                             ?>
                          </td>
                          <td>
                          <?php  
                              echo  $dt_2[$m] = $abs_error_2[$m]/$penjualan_2[$m];
                                $jum_dt = $jum_dt + $dt_2[$m];
                             ?>
                          </td>
                        </tr>
                        <?php 
                        $m++;
                        } ?>
                    </tbody>
                </table>
    </div>
</div>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Beta
    </div>
    <strong>Copyright &copy; 2019 <a href="http://localhost/istanasayur/">Istana Sayur</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<!-- Datatable -->
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>

<script>
  $(document).ready(function() {
    $('#table1').DataTable()
  })
</script>
 <script type="text/javascript">
        $(function(){
            $('.harga_beli').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harga_jual').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>

<script type="text/javascript">
				$(document).ready(function()
				{
			$('#penjualan').DataTable({
			"processing":true,
			"serverSide":true,
			"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
			"ajax":{
				url : "<?php echo site_url('penjualan/data_server') ?>",
				type : "POST"
			},
			"columnDefs":
			[
				{
					"targets":0,
					"data":"no_faktur",
				},
				{
					"targets":1,
					"data":"tgl_faktur",
				},
				{
					"targets":2,
					"data":"name",
				},
				{
					"targets":3,
					"data":"jam_in",
				},
				{
					"targets":4,
					"data":"dibayar",
				},
				{
					"targets":5,
					"data":"kembali",
				},
				{
					"targets":6,
					"data": "no_faktur",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>penjualan/edit/'+data+'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Update</a>'
					}
				},
				{
					"targets":7,
					"data": "no_faktur",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>/penjualan/del/'+data+'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>'
					}
				},
			]
			});
		});
	</script>

<script type="text/javascript">
				$(document).ready(function()
				{
			$('#barang').DataTable({
			"processing":true,
			"serverSide":true,
			"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
			"ajax":{
				url : "<?php echo site_url('barang/data_server') ?>",
				type : "POST"
			},
			"columnDefs":
			[
				{
					"targets":0,
					"data":"barang_id",
				},
				{
					"targets":1,
					"data":"nama_bar",
				},
				{
					"targets":2,
					"data":"kategori_nama",
				},
				{
					"targets":3,
					"data":"unit_nama",
				},
				{
					"targets":4,
					"data":"harga_beli",
				},
				{
					"targets":5,
					"data":"harga_jual",
				},
        {
					"targets":6,
					"data":"stok",
				},
				{
					"targets":7,
					"data": "barang_id",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>barang/edit/'+data+'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Update</a>'
					}
				},
				{
					"targets":8,
					"data": "barang_id",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>/barang/del/'+data+'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>'
					}
				},
			]
			});
		});
  </script>

<script type="text/javascript">
				$(document).ready(function()
				{
			$('#detailpenjualan').DataTable({
			"processing":true,
			"serverSide":true,
			"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
			"ajax":{
				url : "<?php echo site_url('detailpenjualan/data_server') ?>",
				type : "POST"
			},
			"columnDefs":
			[
				{
					"targets":0,
					"data":"penjualan_id",
				},
				{
					"targets":1,
					"data":"no_faktur",
				},
				{
					"targets":2,
					"data":"no",
				},
				{
					"targets":3,
					"data":"kode_bar",
				},
        {
					"targets":4,
					"data":"nama_bar",
				},
        {
					"targets":5,
					"data":"qty",
				},
				{
					"targets":6,
					"data":"jml_beli",
				},
        {
					"targets":7,
					"data":"jml_jual",
				},
        {
					"targets":8,
					"data":"laba",
				},
        {
					"targets":9,
					"data": "penjualan_id",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>detailpenjualan/edit/'+data+'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Update</a>'
					}
				},
				{
					"targets":10,
					"data": "penjualan_id",
					"searchable":false,
					"render":function(data,type,full,meta){
            return '<a href="<?=site_url()?>/detailpenjualan/del/'+data+'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>'
					}
				},
			]
			});
		});
  </script>
  
  <script>
  $(function () {
    "use strict";

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        <?php
      $alpha = 0.1;
      for ($i=1; $i <= 10 ; $i++) { 
        $beta = 0.1;
        for ($j=1; $j <= 10 ; $j++) { 
          $jum_error2 = 0;
          $jum_abs = 0;
          $jum_dt = 0;
          
          $alpha;
          $beta;
       ?>
                        <?php 
                        $a = 1;
                        foreach ($tampil_id as $key) {
                         ?>
                        <?php  $a; ?>
                          <?php  $key->tahun; ?> 
                          <?php  $key->bulan; ?>
                          
                            <?php  $penjualan[$i][$j][$a] = $key->jumlah; ?>
                             <?php  
                                if ($a == 1) {
                                   $levelt[$i][$j][$a] = $key->jumlah;
                                }else{
                                  
                                   $levelt[$i][$j][$a] = $alpha*$key->jumlah+(1-$alpha)*($levelt[$i][$j][$a-1]+$trendt[$i][$j][$a-1]);
                                }
                             ?>
                             <?php
                                $b = 1;  
                                foreach ($tampil_id as $r) {
                                  $nilai_p[$b] = $r->jumlah;
                                  $b++;
                                }

                                if ($a == 1) {
                                   $trendt[$i][$j][$a] = (($nilai_p[2] - $nilai_p[1]) + ($nilai_p[4] - $nilai_p[3]))/2;
                                }else{
                                   $trendt[$i][$j][$a] = $beta*($levelt[$i][$j][$a]-$levelt[$i][$j][$a-1])+(1-$beta)*$trendt[$i][$j][$a-1];
                                }
                              ?>
                             <?php  
                                if ($a == 1) {
                                   $forecastt[$i][$j][$a] = $key->jumlah;
                                }else{
                                   $forecastt[$i][$j][$a] = $levelt[$i][$j][$a-1] + $trendt[$i][$j][$a-1];
                                }
                             ?>
                             <?php  
                                 $error[$i][$j][$a] = $forecastt[$i][$j][$a] - $penjualan[$i][$j][$a];
                             ?>
                             <?php  
                                 $error2[$i][$j][$a] = $error[$i][$j][$a] * $error[$i][$j][$a];
                                $jum_error2 = $jum_error2 + $error2[$i][$j][$a];
                             ?>
                             <?php  
                                 $abs_error[$i][$j][$a] = abs($error[$i][$j][$a]);
                                $jum_abs = $jum_abs + $abs_error[$i][$j][$a];
                             ?>
                             <?php  
                                 $dt[$i][$j][$a] = $abs_error[$i][$j][$a]/$penjualan[$i][$j][$a];
                                $jum_dt = $jum_dt + $dt[$i][$j][$a];
                             ?>
                        <?php 
                        $a++;
                        } ?>
                <?php


                 $rata_error2[$i][$j] = $jum_error2/($a-1);

                 $rata_abs[$i][$j] = $jum_abs/($a-1);

                 $rata_dt[$i][$j] = $jum_dt/($a-1);

                 $jum_error2;

                 $nilai_alpha[$i][$j] = $alpha;

                 $nilai_beta[$i][$j] = $beta;

                $beta = $beta + 0.1;
                }
                $alpha = $alpha + 0.1;
                }


                ?>
          <?php 
          $min = $rata_dt['1']['1'];
          foreach ($rata_dt as $key) {
              foreach ($key as $keys => $value) {
                if ($value < $min) {
                  $min = $value;
                }
            } 
          }
           $min;
           $rata_error2[$i][$j] = $jum_error2/($a-1);
           $rata_abs[$i][$j] = $jum_abs/($a-1);
           $jum_error2;

          $num = 1;
          for ($k=1; $k < $i ; $k++) { 
            for ($l=1; $l < $j ; $l++) { 
              if ($rata_dt[$k][$l] == $min) {
                 $r_dt = $rata_dt[$k][$l];
                 $n_alpha = $nilai_alpha[$k][$l];
                 $n_beta = $nilai_beta[$k][$l];
                break;
              }
            }
          }
           ?>
                      <?php 
                        $panjang_tahun = 1;
                        $jumlah_bulan_2 = $bulan_terakhir;
                        if ($tahun == $tahun_terakhir) {
                          $panjang = $bulan - $bulan_terakhir;
                        }else if ($tahun > $tahun_terakhir){
                          if (($tahun - $tahun_terakhir) == 1) {
                            $panjang = $bulan + (12 - $bulan_terakhir);
                          }else{
                            $panjang = (($tahun - $tahun_terakhir)*12) + $bulan + (12 - $bulan_terakhir);
                          }
                        }else{
                          $panjang = 0;
                        }
                        $jumlah_bulan = 12 - (12 - $bulan_terakhir);
                        $jumlah_tahun = 0;
                        for ($i=0; $i < $panjang ; $i++) { ?>
                        
                          <?php  $m; ?>
                          <?php
                             $tahun_baru=$tahun_terakhir + $jumlah_tahun;
                            $jumlah_bulan++;
                            if ($jumlah_bulan >= 12) {
                              $jumlah_bulan = 0;
                              $jumlah_tahun++;
                            }
                            ?>
                          
                          <?php 

                            if ($jumlah_bulan_2 >= 12) {
                              $jumlah_bulan_2 = 0;
                            }
                            $bulan_baru=$bulan_terakhir + $jumlah_bulan_2;
                            $jumlah_bulan_2++;

                            ?>
                            <?php
                              echo '{y:"'.$tahun_baru.'-'.$bulan_baru.'",';
                            ?>
                            <?php
                            echo 'item1:'.$penjualan_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1].',';
                            ?>
                          
                            <?php 
                            //  $levelt_2[$m] = $n_alpha*$forecastt_2[$m-1]+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                             $levelt_2[$m] = $n_alpha*($levelt_2[$m-1] + $trendt_2[$m-1])+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                            ?>
                          
                          
                            <?php 
                             $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                            ?>
                          
                          
                            <?php 
                            echo 'item2:'.$forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1].'},';
                            ?>
                          
                        <?php 
                        $m++;
                        } ?>
                        <?php 
                        $m = 1;
                        foreach ($tampil_id as $row) {
                         ?>
                        
                          <?php  $m; ?>
                          <?php  echo '{y:"'.$tahun_terakhir = $row->tahun.'-'.$bulan_terakhir = $row->bulan.'",'; ?>
 
                          
                            <?php   echo 'item1:'.$penjualan_2[$m] = $row->jumlah.',';  ?>
                              
                             <?php  
                                if ($m == 1) {
                                   $levelt_2[$m] = $row->jumlah;
                                }else{
                                  
                                   $levelt_2[$m] = $n_alpha*$row->jumlah+(1-$n_alpha)*($levelt_2[$m-1]+$trendt_2[$m-1]);
                                }
                             ?>
                              
                             <?php
                                $n = 1;  
                                foreach ($tampil_id as $re) {
                                  $nilai_p_2[$n] = $re->jumlah;
                                  $n++;
                                }

                                if ($m == 1) {
                                   $trendt_2[$m] = (($nilai_p_2[2] - $nilai_p_2[1]) + ($nilai_p_2[4] - $nilai_p_2[3]))/2;
                                }else{
                                   $trendt_2[$m] = $n_beta*($levelt_2[$m]-$levelt_2[$m-1])+(1-$n_beta)*$trendt_2[$m-1];
                                }
                              ?>
                           
                           
                             <?php  
                                if ($m == 1) {
                                  echo 'item2:'.$forecastt_2[$m] = $row->jumlah.'},';
                                }else{
                                   echo 'item2:'.$forecastt_2[$m] = $levelt_2[$m-1] + $trendt_2[$m-1].'},';
                                }
                             ?>
                           
                           
                             <?php  
                                 $error_2[$m] = $forecastt_2[$m] - $penjualan_2[$m];
                             ?>
                           
                           
                             <?php  
                                 $error2_2[$m] = $error_2[$m] * $error_2[$m];
                                $jum_error2_2 = $jum_error2 + $error2_2[$m];
                             ?>
                           
                           
                             <?php  
                                 $abs_error_2[$m] = abs($error_2[$m]);
                                $jum_abs = $jum_abs + $abs_error_2[$m];
                             ?>
                           
                           
                             <?php  
                                 $dt_2[$m] = $abs_error_2[$m]/$penjualan_2[$m];
                                $jum_dt = $jum_dt + $dt_2[$m];
                             ?>
                           
                        
                        <?php
                        $m++;
                        } ?>
    
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Data Aktual', 'Data Peramalan'],
      lineColors: ['#3c8dbc', '#ff0000'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>