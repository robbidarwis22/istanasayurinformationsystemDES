<section class="content-header">
      <h1>
        Detail Penjualan
        <small>Data Histori Penjualan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Detail Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Detail Penjualan</h3>
            <div class="pull-right">
                <a href="<?=site_url('detailpenjualan')?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row col-md-offset-4">
                <div class="col-md-6">
                <?php //echo validation_errors(); ?>
                    <form action="<?=site_url('detailpenjualan/process')?>" method="post">
                        <div class="form-group">
                            <label>No Faktur *</label>
                            <select name="faktur" class="form-control" required>
                                <option value="">-Pilih Faktur-</option>
                                <?php foreach($penjualan->result() as $key => $data) {
                                    if($data->no_faktur==$row->faktur)
                                    echo "<option value='$data->no_faktur' selected>$data->no_faktur</option>";
                                    else
                                    echo "<option value='$data->no_faktur'>$data->no_faktur</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No *</label>
                            <input type="hidden" name="id" value="<?=$row->penjualan_id?>">>
                            <input type="number" name="no" value="<?=$row->no?>" class="form-control" placeholder="Input No" required>
                        </div>
                        <div class="form-group">
                            <label>Barang *</label>
                            <select name="kode_bar" class="form-control" required>
                                <option value="">-Pilih Barang-</option>
                                <?php foreach($barang->result() as $key => $data) {
                                    if($data->barang_id==$row->kode_bar)
                                    echo "<option value='$data->barang_id' selected>$data->nama_bar</option>";
                                    else
                                    echo "<option value='$data->barang_id'>$data->nama_bar</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Qty *</label>
                            <input type="number" name="qty" value="<?=$row->qty?>" class="form-control" placeholder="Input Qty" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Beli *</label>
                            <input type="number" name="jml_beli" value="<?=$row->jml_beli?>" class="form-control" placeholder="Input Jumlah Jual" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Jual *</label>
                            <input type="number" name="jml_jual" value="<?=$row->jml_jual?>" class="form-control" placeholder="Input Jumlah Jual" required>
                        </div>
                        <div class="form-group">
                            <label>Laba *</label>
                            <input type="number" name="laba" value="<?=$row->laba?>" class="form-control" placeholder="Input Laba" required>
                        </div>
                            <br>
                            <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>Save</button>
                            <button type="Reset" class="btn btn-danger btn-flat">Reset</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
         

</section>
