<?php $this->load->view('inc/header'); ?>

<div class="content">
  <div class="col-md-4 offset-md-4">

      <h1 class="text-center"><strong><?php echo $helloworld->string ?></strong></h1>
      
      <h2 class="text-center">Search Recent Tweets</h2>
      
      <?php echo form_open(base_url().'main/search'); ?>
      <div class="form-group">
        <?php echo form_input(array(
            'name'        => 'search',
            'id'          => 'search',
            'placeholder' => 'Which tweets are you looking for?',
            'class'       => 'form-control input-lg'
            )); ?>
        <?php echo form_error('email') ?>
      </div>
      <?php echo form_submit(array('value'=>'Search', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
      <?php echo form_close(); ?>

  </div>
</div>

<?php $this->load->view('inc/footer'); ?>