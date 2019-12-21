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
        <?php echo $contents ?>
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
        {y: '2016-01', item1: 0.800000011920929, item2: 0.800000011920929},
        {y: '2016-02', item1: 0.4000000059604645, item2: 0.80000001192093},
        {y: '2016-03', item1: 0.800000011920929, item2: 0.75600001126528},
        {y: '2016-04', item1: 1.2000000178813934, item2: 0.75684001127779},
        {y: '2016-05', item1: 0.4000000059604645, item2: 0.80202761195114},
        {y: '2016-06', item1: 0.800000011920929, item2: 0.75867617530516},
        {y: '2016-07', item1: 0.800000011920929, item2: 0.76007312128597},
        {y: '2016-08', item1: 0.800000011920929, item2: 0.76172964157506},
        {y: '2016-09', item1: 0.800000011920929, item2: 0.76360321353869},
        {y: '2016-10', item1: 0.800000011920929, item2: 0.76360321353869},
        {y: '2016-11', item1: 0.800000011920929, item2: 0.76784202692208},
        {y: '2016-12', item1: 0.800000011920929, item2: 0.77013337434113},
        {y: '2017-01', item1: 0.4000000059604645, item2: 0.77249425339408},
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Data Aktual', 'Data Peramalan'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>
