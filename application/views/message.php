<?php if($this->session->has_userdata('success')) {?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
<?=$this->session->flashdata('success');?>
</div>
<?php }if($this->session->has_userdata('danger')) {?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="danger" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Danger!</h4>
<?=$this->session->flashdata('danger');?>
</div>
<?php } ?>