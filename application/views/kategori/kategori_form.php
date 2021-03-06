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
     
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Kategori</h3>
            <div class="pull-right">
                <a href="<?=site_url('kategori')?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row col-md-offset-4">
                <div class="col-md-6">
                <?php //echo validation_errors(); ?>
                    <form action="<?=site_url('kategori/process')?>" method="post">
                        <div class="form-group">
                            <label>Kategori *</label>
                            <input type="hidden" name="id" value="<?=$row->kategori_id?>">
                            <input type="text" name="kategori_nama" value="<?=$row->kategori_nama?>" class="form-control" placeholder="Input Kategori" required>
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
