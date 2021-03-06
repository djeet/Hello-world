<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>

	<p class="success">
	<?php echo __('
		The user %s has been created with administrative rights.',
		sprintf('<strong>%s</strong>', $user['User']['username']));
	?>
	</p>

	<p>
		<?php echo __('Admin panel: %s', $this->Html->link(Router::url('/admin', true), Router::url('/admin', true))); ?>
	</p>

	<p>
	<?php
	echo __('You can start with %s or jump in and %s.',
		$this->Html->link(__('configuring your site'), $urlSettings),
		$this->Html->link(__('create a blog post'), $urlBlogAdd)
		);
	?>
	</p>

	<blockquote>
		<h3><?php echo __('Resources'); ?></h3>
		<ul class="bullet">
			<li><?php echo $this->Html->link('http://croogo.org'); ?></li>
			<li><?php echo $this->Html->link('http://wiki.croogo.org/'); ?></li>
			<li><?php echo $this->Html->link('http://github.com/croogo/croogo'); ?></li>
			<li><?php echo $this->Html->link('Croogo Google Group', 'https://groups.google.com/forum/#!forum/croogo'); ?></li>
		</ul>
	</blockquote>
	&nbsp;
</div>