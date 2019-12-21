<section class="content-header">
      <h1>
        Item
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Barang</h3>
            <div class="pull-right">
                <a href="<?=site_url('barang')?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row col-md-offset-4">
                <div class="col-md-6">
                <?php //echo validation_errors(); ?>
                    <form action="<?=site_url('barang/process')?>" method="post">
                        <div class="form-group">
                            <label>ID Barang *</label>
                            <input type="number" name="id" value="<?=$row->barang_id?>" class="form-control" placeholder="Input ID Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang *</label>
                            <input type="text" name="nama_bar" value="<?=$row->nama_bar?>" class="form-control" placeholder="Input Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori *</label>
                            <select name="kategori" class="form-control">
                                <option value="">-Pilih Kategori-</option>
                                <?php foreach($kategori->result() as $key => $data) {
                                    if($data->kategori_id==$row->kategori)
                                    echo "<option value='$data->kategori_id' selected>$data->kategori_nama</option>";
                                    else
                                    echo "<option value='$data->kategori_id'>$data->kategori_nama</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit *</label>
                            <select name="unit" class="form-control">
                                <option value="">-Pilih Unit-</option>
                                <?php foreach($unit->result() as $key => $data) {
                                    if($data->unit_id==$row->unit)
                                    echo "<option value='$data->unit_id' selected>$data->unit_nama</option>";
                                    else
                                    echo "<option value='$data->unit_id'>$data->unit_nama</option>";
                                } ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label>Harga Beli *</label>
                            <input type="number" name="harga_beli" value="<?=$row->harga_beli?>" class="form-control" placeholder="Input Harga Beli" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Jual *</label>
                            <input type="number" name="harga_jual" value="<?=$row->harga_jual?>" class="form-control" placeholder="Input Harga Jual" required>
                        </div>
                        <div class="form-group">
                            <label>Stok *</label>
                            <input type="text" name="stok" value="<?=$row->stok?>" class="form-control" placeholder="Input Stok" required>
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
