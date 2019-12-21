<section class="content-header">
      <h1>
        Unit
        <small>Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Unit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Unit</h3>
            <div class="pull-right">
                <a href="<?=site_url('unit')?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row col-md-offset-4">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="form-group <?=form_error('unit_nama') ? 'has-error' : null?>">
                            <label>unit *</label>
                            <input type="hidden" name="unit_id" value="<?=$row->unit_id?>">
                            <input type="text" name="unit_nama" value="<?=$this->input->post('unit_nama') ?? $row->unit_nama?>" class="form-control" placeholder="Input Unit">
                            <?=form_error('unit')?></span>
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
