<?php echo $this->Form->create(null, array('enctype' => 'multipart/form-data','url' => array('controller' => 'upload', 'action' => 'picture')
)); ?>
     <?php echo $this->Form->file('file.image'); ?>
     <input type="submit" value="upload a picture" />
<?php echo $this->Form->end(); ?>