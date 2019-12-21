<section class="content-header">
      <h1>
        Peramalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Peramalan</li>
      </ol>
    </section>
<!-- /.row -->
<!-- Projects Row -->
<div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="pull-right">
                
            </div>
        </div>
    <div class="box-body table-responsive">
      <form action="<?=site_url('metode/hasil_peramalan')?>" method="POST" role="form">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="">Bulan</label>
            <select name="bulan" id="" class="form-control" required="">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Tahun</label>
            <input type="text" name="tahun" id="input" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="">Barang</label>
            <select name="nama_bar" id="" class="form-control" required="" >
              <?php foreach ($barang as $key) {?>
                <option value="<?=$key->nama_bar; ?>"><?=$key->nama_bar; ?></option>
              <?php } ?>
            </select>
          </div>
        
        <button type="submit" class="btn btn-primary">Ramalkan</button>
        </div>
      </form>
      
      
    </div>
</div>

<!-- ============ MODAL ADD =============== -->
