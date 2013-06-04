<?php

$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Contacts'), array('controller' => 'contacts', 'action' => 'index'))
	->addCrumb(__('All Leads'), array('action' => 'index'));

if (isset($criteria['Message.status'])) {
	if ($criteria['Message.status'] == '0') {
		$this->Html->addCrumb(__('Conceirge'), $this->here);
		$this->viewVars['title_for_layout'] = __('Messages: Conceirge');
	} elseif($criteria['Message.status'] == '1') {
		$this->Html->addCrumb(__('List your venue'), $this->here);
		$this->viewVars['title_for_layout'] = __('Messages: List your venue');
	}
        elseif($criteria['Message.status'] == '2') {
		$this->Html->addCrumb(__('Book an Enquiry'), $this->here);
		$this->viewVars['title_for_layout'] = __('Messages: Book an Enquiry');
	}
        else {
		$this->Html->addCrumb(__('Newsletter'), $this->here);
		$this->viewVars['title_for_layout'] = __('Messages: Newsletter');
	}
        
}

$script =<<<EOF
$(".comment-view").on("click", function() {
	var el= \$(this)
	var modal = \$('#comment-modal');
	$('#comment-modal')
		.find('.modal-header h3').html(el.data("title")).end()
		.find('.modal-body').html('<pre>' + el.data('content') + '</pre>').end()
		.modal('toggle');
});
EOF;
$this->Js->buffer($script);

echo $this->element('admin/modal', array(
	'id' => 'comment-modal',
	'class' => 'hide',
	)
);
?>

<?php $this->start('actions'); ?>
<li><?php echo $this->Html->link(__('Conceirge Form'), array('action'=>'index', 'status' => '0'), array('button' => 'default')); ?></li>
<li><?php echo $this->Html->link(__('List your venue'), array('action'=>'index', 'status' => '1'), array('button' => 'default')); ?></li>
<li><?php echo $this->Html->link(__('Book an Enquiry'), array('action'=>'index', 'status' => '0'), array('button' => 'default')); ?></li>
<li><?php echo $this->Html->link(__('NewsLetter'), array('action'=>'index', 'status' => '1'), array('button' => 'default')); ?></li>
<?php $this->end(); ?>

<?php

echo $this->Form->create('Message', array('url' => array('controller' => 'messages', 'action' => 'process')));

?>



<table class="table table-striped">
<?php
	$tableHeaders = $this->Html->tableHeaders(array(
		'',
		$this->Paginator->sort('id'),
		$this->Paginator->sort('name'),
		$this->Paginator->sort('lname'),
		$this->Paginator->sort('email'),
		$this->Paginator->sort('phone'),
		//__('Actions'),
	));
?>
	<thead>
	<?php echo $tableHeaders; ?>
	</thead>

<?php
	$commentIcon = $this->Html->icon('comment-alt');
	$rows = array();
	foreach ($messages as $message) {
		$actions = array();

		$actions[] = $this->Croogo->adminRowAction('',
			array('action' => 'edit', $message['Message']['id']),
			array('icon' => 'pencil', 'tooltip' => __('Edit this item'))
		);
		$actions[] = $this->Croogo->adminRowAction('',
			'#Message' . $message['Message']['id'] . 'Id',
			array('icon' => 'trash', 'tooltip' => __('Remove this item'), 'rowAction' => 'delete'),
			__('Are you sure?')
		);
		$actions[] = $this->Croogo->adminRowActions($message['Message']['id']);

		$actions = $this->Html->div('item-actions', implode(' ', $actions));

		$rows[] = array(
			$this->Form->checkbox('Message.' . $message['Message']['id'] . '.id'),
			$message['Message']['id'],
                        $message['Message']['name'],
			$message['Message']['lname'],
			$message['Message']['email'],
			$message['Message']['phone'],
//			$commentIcon . ' ' .
//			$this->Html->link($message['Message']['title'], '#',
//				array(
//					'class' => 'comment-view',
//					'data-target' => '#comment-modal',
//					'data-title' => $message['Message']['title'],
//					'data-content' => $message['Message']['body'],
//				)
//			),
			$actions,
		);
	}

	echo $this->Html->tableCells($rows);
?>

</table>


<div class="row-fluid">
	<div id="bulk-action" class="control-group">
		<?php
			echo $this->Form->input('Message.action', array(
				'label' => false,
				'div' => 'input inline',
				'options' => array(
					//'read' => __('Mark as read'),
					//'unread' => __('Mark as unread'),
					'delete' => __('Delete'),
				),
				'empty' => true,
			));
		?>
		<div class="controls">
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
