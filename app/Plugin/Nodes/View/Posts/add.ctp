<!-- File: /app/View/Posts/add.ctp -->


<?php echo $this->Form->create(null, array('enctype' => 'multipart/form-data','url' => array('controller' => 'posts', 'action' => 'picture')
)); ?>
     <?php echo $this->Form->file('file.image'); ?>
     <input type="submit" value="upload a picture" />
<?php echo $this->Form->end(); ?>