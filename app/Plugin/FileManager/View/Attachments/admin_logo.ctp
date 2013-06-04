<?php

//$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Attachments'), array('plugin' => 'file_manager', 'controller' => 'attachments', 'action' => 'index'))
	->addCrumb(__('Upload'), $this->here)
;

$formUrl = array('controller' => 'attachments', 'action' => 'logo');
//if (isset($this->params['named']['editor'])) {
//	$formUrl['editor'] = 1;
//}
echo $this->Form->create('Node', array('url' => $formUrl, 'type' => 'file'));
echo $this->Form->input('Post.id', array('label' => '','value'=>'26','type'=>'hidden','class'=>'','div'=>''));

?>
<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
			<li><a href="#attachment-upload" data-toggle="tab"><?php //echo __('Upload'); ?></a></li>
<!--                        <li></li>-->
		</ul>
<!--         <script>
        $(document).ready(function(){
            
        $('.btn').click(function(){
            
            if($('#PostFile').val()==''){
                alert('Please select image to upload');
                return false;
            }
            
            
        })
            
            
            
        }) 
        </script>-->
		<div class="tab-content">

			<div id="attachment-upload" class="tab-pane">
                            <?php   echo $this->Html->image($postns['Post']['path'], array('alt' => '', 'class' => '', 'width' => '225', 'height' => '143'));?>
			<?php
			echo $this->Form->input('Post.file', array('label' => __('Upload'), 'type' => 'file'));
			?>
			</div>

			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			$this->Form->button(__('Upload'), array('button' => 'default')) .
			$this->Form->end() .
			$this->Html->link(__('Cancel'), array('action' => 'index'), array('button' => 'danger')) .
			$this->Html->endBox();
		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>