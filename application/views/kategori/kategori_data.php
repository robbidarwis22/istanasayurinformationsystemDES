<section class="content-header">
      <h1>
        Kategori
        <small>Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kategori</h3>
            <div class="pull-right">
                 <a href="<?=site_url('kategori/add')?>" class="btn btn-primary btn-flat">
                   <i class="fa fa-plus"></i> Create
                </a>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                Import
                </button>  
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data){ ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->kategori_nama?></td>
                        <td class="text-center" width="160px">
                        <form action="<?=site_url('kategori/del')?>" method="post">
                        <a href="<?=site_url('kategori/edit/'.$data->kategori_id)?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                            <input type="hidden" name="kategori_id" value="<?=$data->kategori_id?>">
                            <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs"> 
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <!-- modal -->
            <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Kategori</h4>
              </div>
              
              <div class="modal-body">
              <a href="<?php print site_url();?>assets/uploads/samplekategori-xlsx.xlsx" class="btn btn-success"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
                <a href="<?php print site_url();?>assets/uploads/samplekategori-xls.xls" class="btn btn-success"><i class="fa fa-file-excel"></i> Sample .XLS</a>
                <a href="<?php print site_url();?>assets/uploads/samplekategori-csv.csv" class="btn btn-success" target="_blank" ><i class="fa fa-file-csv"></i> Sample .CSV</a>
                </div>
              <div class="modal-body"> 
              <form action="<?php print site_url();?>kategori/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row padall">
                <div class="col-lg-6 order-lg-1">
                
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
                <label class="custom-file-label" for="validatedCustomFile"></label>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
              </div>
            </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </div>
</section>
