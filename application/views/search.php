<?php $this->load->view('inc/header'); ?>

<div class="container">

    <div class="content">
    
        <div class="form-group text-center">
            <a href="<?php echo base_url('main') ?>"><button class="btn btn-primary btn-lg">Search Another</button></a>
        </div>

        <?php foreach($tweets as $item){ ?>

        <?php echo '<img src="'.$item->user->profile_image_url.'">&nbsp;&nbsp;'. $item->text."<br><br>" ?>

        <?php }?>

        <div class="form-group text-center">
            <a href="<?php echo base_url('main') ?>"><button class="btn btn-primary btn-lg">Search Another</button></a>
        </div>

    </div>

</div>

<?php $this->load->view('inc/footer'); ?>