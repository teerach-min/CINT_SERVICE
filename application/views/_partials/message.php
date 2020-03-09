<?php
$flash_message = $this->session->flashdata('message') !== NULL && ! empty($this->session->flashdata('message'))
  ? $this->session->flashdata('message')
  : array();
?>
<div class="row">
  <div class="col-md-12">
    <?php if (isset($flash_message) && ! empty($flash_message)) : ?>
      <div class="alert alert-<?php echo key($flash_message); ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $flash_message[key($flash_message)]; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['primary']) && $message['primary'] != '') : ?>
      <div class="alert alert-primary">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['primary']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['secondary']) && $message['secondary'] != '') : ?>
      <div class="alert alert-secondary">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['secondary']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['success']) && $message['success'] != '') : ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['success']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['info']) && $message['info'] != '') : ?>
      <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['info']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['warning']) && $message['warning'] != '') : ?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['warning']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['danger']) && $message['danger'] != '') : ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['danger']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['light']) && $message['light'] != '') : ?>
      <div class="alert alert-light">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['light']; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($message['dark']) && $message['dark'] != '') : ?>
      <div class="alert alert-dark">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>!</strong> <?php echo $message['dark']; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
