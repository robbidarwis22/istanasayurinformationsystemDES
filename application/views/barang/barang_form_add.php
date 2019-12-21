<section class="content-header">
      <h1>
        Barang
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
             <h3 class="box-title">Add Barang</h3>
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
                    <form action="" method="post">
                        <div class="form-group <?=form_error('nama_bar') ? 'has-error' : null?>">
                            <label>Nama Barang *</label>
                            <input type="text" name="nama_bar" value="<?=set_value('nama_bar')?>" class="form-control" placeholder="Input Nama Barang">
                            <?=form_error('nama_bar')?></span>
                        </div>
                        <div class="form-group <?=form_error('kategori') ? 'has-error' : null?>">
                            <label>Kategori *</label>
                            <select name="kategori" class="form-control" data-live-search="true">
                            <?php foreach ($kat2->result_array() as $k2) {
                            $id_kat=$k2['kategori_id'];
                            $nm_kat=$k2['kategori'];
                            ?>
                                <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                        <?php }?>
                            </select>
                            <?=form_error('kategori')?>
                        </div>
                        <div class="form-group">
                            <label>Unit *</label>
                            <select name="unit" class="form-control show-tick" data-live-search="true" data-show-subtext="true">
 
                            </select>
                            <?=form_error('unit')?>
                        </div>
                        <div class="form-group <?=form_error('harga_beli') ? 'has-error' : null?>">
                            <label>Harga Beli *</label>
                            <input type="text" name="harga_beli" value="<?=set_value('harga_beli')?>" class="harga_beli form-control" placeholder="Input Harga Beli">
                            <?=form_error('harga_beli')?></span>
                        </div>
                        <div class="form-group <?=form_error('harga_jual') ? 'has-error' : null?>">
                            <label>Harga Jual *</label>
                            <input type="text" name="harga_jual" value="<?=set_value('harga_jual')?>" class="harga_jual form-control" placeholder="Input Harga Jual">
                            <?=form_error('harga_jual')?></span>
                        </div>
                        <div class="form-group <?=form_error('stok') ? 'has-error' : null?>">
                            <label>Stok *</label>
                            <input type="number" name="stok" value="<?=set_value('stok')?>" class="form-control" placeholder="Input Stok">
                            <?=form_error('stok')?></span>
                        </div>
                        <div class="form-group <?=form_error('nama_bar') ? 'has-error' : null?>">
                            <label>Nama Barang *</label>
                            <input type="text" name="nama_bar" value="<?=set_value('nama_bar')?>" class="form-control" placeholder="Input Nama Barang">
                            <?=form_error('nama_bar')?></span>
                        </div>
                            <br>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>Save</button>
                            <button type="Reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

</section>




        <div class="form-group">
            <label class="control-label col-xs-3" >Nama Barang</label>
            <div class="col-xs-9">
                <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Kategori</label>
                <div class="col-xs-9">
                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                    <?php foreach ($kat2->result_array() as $k2) {
                        $id_kat=$k2['kategori_id'];
                        $nm_kat=$k2['kategori_nama'];
                        ?>
                            <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                    <?php }?>
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Satuan</label>
                <div class="col-xs-9">
                        <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                        <option>Unit</option>
                        <option>Kotak</option>
                        <option>Botol</option>
                        <option>Butir</option>
                        <option>Buah</option>
                        <option>Biji</option>
                        <option>Sachet</option>
                        <option>Bks</option>
                        <option>Roll</option>
                        <option>PCS</option>
                        <option>Box</option>
                        <option>Meter</option>
                        <option>Centimeter</option>
                        <option>Liter</option>
                        <option>CC</option>
                        <option>Mililiter</option>
                        <option>Lusin</option>
                        <option>Gross</option>
                        <option>Kodi</option>
                        <option>Rim</option>
                        <option>Dozen</option>
                        <option>Kaleng</option>
                        <option>Lembar</option>
                        <option>Helai</option>
                        <option>Gram</option>
                        <option>Kilogram</option>
                        </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Harga Pokok</label>
                <div class="col-xs-9">
                    <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Harga (Eceran)</label>
                <div class="col-xs-9">
                    <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Harga (Grosir)</label>
                <div class="col-xs-9">
                    <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Stok</label>
                <div class="col-xs-9">
                    <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Minimal Stok</label>
                <div class="col-xs-9">
                    <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;">
                </div>
            </div>
                    

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>