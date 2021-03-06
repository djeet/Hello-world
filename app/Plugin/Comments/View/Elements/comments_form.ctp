<div class="comment-form">
	<h3><?php echo __('Add new comment'); ?></h3>
	<?php
		$type = $types_for_layout[$node['Node']['type']];

		if ($this->params['controller'] == 'comments') {
			$nodeLink = $this->Html->link(__('Go back to original post') . ': ' . $node['Node']['title'], $node['Node']['url']);
			echo $this->Html->tag('p', $nodeLink, array('class' => 'back'));
		}

		$formUrl = array(
			'plugin' => 'comments',
			'controller' => 'comments',
			'action' => 'add',
			$node['Node']['id'],
		);
		if (isset($parentId) && $parentId != null) {
			$formUrl[] = $parentId;
		}
              ?>
        
        <?php
		echo $this->Form->create('Comment', array('url' => $formUrl)); ?>
			<?php if ($this->Session->check('Auth.User.id')) { ?>
                            <?php
				echo $this->Form->input('Comment.name', array(
					'label' => __('Name'),
					'value' => $this->Session->read('Auth.User.name'),
					'readonly' => 'readonly',
                                            'type' => 'text'
				));
				echo $this->Form->input('Comment.email', array(
					'label' => __('Email'),
					'value' => $this->Session->read('Auth.User.email'),
					'readonly' => 'readonly',
				));
				echo $this->Form->input('Comment.website', array(
					'label' => __('Website'),
					'value' => $this->Session->read('Auth.User.website'),
					'readonly' => 'readonly',
				));
				echo $this->Form->input('Comment.body', array('label' => false));
                                ?>
			<?php } else {  ?>
        <?php
				echo $this->Form->input('Comment.name', array('label' => __('Name')));
				echo $this->Form->input('Comment.email', array('label' => __('Email')));
				echo $this->Form->input('Comment.website', array('label' => __('Website')));
				echo $this->Form->input('Comment.body', array('label' => false));
                                ?>
			<?php } ?>
                                
                                <?php

			if ($type['Type']['comment_captcha']) {
				echo $this->Recaptcha->display_form();
			}
		echo $this->Form->end(__('Post comment'));
	?>
</div>