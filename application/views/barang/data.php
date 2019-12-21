
<section class="content-header">
      <h1>
        Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
      </ol>
    </section>
<!-- /.row -->
<!-- Projects Row -->
<div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Barang</h3>
            <div class="pull-right">
                <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span>Tambah Barang</a></div>
            </div>
        </div>
    <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
            <tr>
                <th style="text-align:center;width:40px;">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no=0;
            foreach ($data->result_array() as $a):
                $no++;
                $id=$a['barang_id'];
                $nm=$a['nama_bar'];
                $kat_nama=$a['kategori_nama'];
                $satuan=$a['unit_nama'];
                $harpok=$a['harga_beli'];
                $harjul=$a['harga_jual'];
                $stok=$a['stok'];
        ?>
            <tr>
                <td style="text-align:center;"><?php echo $no;?></td>
                <td><?php echo $id;?></td>
                <td><?php echo $nm;?></td>
                <td><?php echo $kat_nama;?></td>
                <td style="text-align:center;"><?php echo $satuan;?></td>
                <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                <td style="text-align:center;"><?php echo $stok;?></td>
                <td class="text-center"  width="160px">
                    <a class="btn btn-primary btn-xs" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> Update</a>
                    <a class="btn btn-danger btn-xs" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> Hapus</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'barang/tambah_barang'?>">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nama_bar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
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
                            <label class="control-label col-xs-3" >Unit</label>
                            <div class="col-xs-9">
                                <select name="unit" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Satuan" required>
                                <?php foreach ($uni2->result_array() as $u2) {
                                    $id_uni=$u2['unit_id'];
                                    $nm_uni=$u2['unit_nama'];
                                    ?>
                                        <option value="<?php echo $id_uni;?>"><?php echo $nm_uni;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Beli</label>
                        <div class="col-xs-9">
                            <input name="harga_beli" class="harga_beli form-control" type="text" placeholder="Harga Beli..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Jual</label>
                        <div class="col-xs-9">
                            <input name="harga_jual" class="harga_jual form-control" type="text" placeholder="Harga Jual..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
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


                <!-- ============ MODAL HAPUS =============== -->
                <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['barang_id'];
                        $nm=$a['nama_bar'];
                        $kat_nama=$a['kategori'];
                        $kat_nama=$a['unit'];
                        $harpok=$a['harga_beli'];
                        $harjul=$a['harga_jual'];
                        $stok=$a['stok'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        END MODAL



