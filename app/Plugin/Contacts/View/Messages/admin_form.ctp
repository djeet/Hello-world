<?php

$this->extend('/Common/admin_edit');

if($this->data['Message']['status'] == '0'){
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Contacts'), array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'index'))
	->addCrumb(__('Concierge'), array('plugin' => 'contacts', 'controller' => 'messages', 'action' => 'index'));



if ($this->request->params['action'] == 'admin_edit') {
	//$this->Html->addCrumb($this->data['Message']['id'] . ': ' . $this->data['Message']['type_of_event'], $this->here);
        $this->Html->addCrumb(': ' . $this->data['Message']['name'], $this->here);
}

} elseif($this->data['Message']['status'] == '1'){
    
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Contacts'), array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'index'))
	->addCrumb(__('List Your Venues'), array('plugin' => 'contacts', 'controller' => 'messages', 'action' => 'index'));



if ($this->request->params['action'] == 'admin_edit') {
	//$this->Html->addCrumb($this->data['Message']['id'] . ': ' . $this->data['Message']['type_of_event'], $this->here);
        $this->Html->addCrumb(': ' . $this->data['Message']['name'], $this->here);
}    
    
}

elseif($this->data['Message']['status'] == '2'){
    
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Contacts'), array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'index'))
	->addCrumb(__('Book an enquiry'), array('plugin' => 'contacts', 'controller' => 'messages', 'action' => 'index'));



if ($this->request->params['action'] == 'admin_edit') {
	//$this->Html->addCrumb($this->data['Message']['id'] . ': ' . $this->data['Message']['type_of_event'], $this->here);
        $this->Html->addCrumb(': ' . $this->data['Message']['name'], $this->here);
}    
    
}
else{
    
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Contacts'), array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'index'))
	->addCrumb(__('New Letter'), array('plugin' => 'contacts', 'controller' => 'messages', 'action' => 'index'));



if ($this->request->params['action'] == 'admin_edit') {
	//$this->Html->addCrumb($this->data['Message']['id'] . ': ' . $this->data['Message']['type_of_event'], $this->here);
        $this->Html->addCrumb(': ' . $this->data['Message']['name'], $this->here);
}    
    
}

echo $this->Form->create('Message');

?>
<div class="row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
			<li><a href="#message-main" data-toggle="tab">
                             <?php if($this->data['Message']['status'] == '0'){   
                             echo __('Concierge Form Details'); 
                              }
                              elseif($this->data['Message']['status'] == '1')
                              {
                               echo __('List your Venues Form Details');   
                              }
                              elseif($this->data['Message']['status'] == '2'){
                               echo __('Book an Enquiry Details');   
                              }
                              else{
                               echo __('New Letter Details');   
                                  
                              }
                                  ?>
                            </a></li>
		</ul>

		<div class="tab-content">
			<div id="message-main">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array(
					//'label' => true,
					'class' => 'span10',
				));
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('type_of_event', array(
					'placeholder' => __('Type of Event'),
                                        //'label' => __('Type of Event'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('max_of_guest', array(
					'placeholder' => __('Max of Guest'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('date_of_event', array(
					'placeholder' => __('Date of event'),
				));
                                }
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('fast_track_enquiry', array(
					'placeholder' => __('Fast track Enquiry'),
				));
                                }
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('flexible_date', array(
					'placeholder' => __('Flexible Date'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('approx_start_time', array(
					'placeholder' => __('Approx start time'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('budget_type', array(
					'placeholder' => __('Budget Type'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('per_head_budget', array(
					'placeholder' => __('Per Head Budget'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('total_event_budget', array(
					'placeholder' => __('Total event Budget'),
				));
                                }
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('location_pref', array(
					'placeholder' => __('Location preference'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('food_preference', array(
					'placeholder' => __('Food preference'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('drinkpreference', array(
					'placeholder' => __('Drink preference'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('typesofspaces', array(
					'placeholder' => __('Types of Spaces'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('execlusive_space', array(
					'placeholder' => __('Exclusive Spaces'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('any_other_requirement', array(
					'placeholder' => __('Any othre requirement'),
				));
                                }
                                
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('have_you_already', array(
					'placeholder' => __('Have you already'),
				));
                                }
				
                                
                                if($this->data['Message']['status'] == '0' || $this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2' || $this->data['Message']['status'] == '3'){
                                echo $this->Form->input('name', array(
					'placeholder' => __('FirstName'),
				));
                                }
                               if($this->data['Message']['status'] == '0' || $this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2'){
                                echo $this->Form->input('lname', array(
					'placeholder' => __('Last Name'),
				));
                                }
                                if($this->data['Message']['status'] == '0' || $this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2' || $this->data['Message']['status'] == '3'){
                                echo $this->Form->input('email', array(
					'placeholder' => __('Email'),
				));
                                }
                                if($this->data['Message']['status'] == '0'){
                                echo $this->Form->input('mobile_number', array(
					'placeholder' => __('Mobile Number'),
				));
                                }
                                if($this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2'){
                                echo $this->Form->input('phone', array(
					'placeholder' => __('Mobile Number'),
				));
                                }
                                 if($this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2'){
                                echo $this->Form->input('enquiry_form_state', array(
					'placeholder' => __('State'),
				));
                                }
                                 if($this->data['Message']['status'] == '1' || $this->data['Message']['status'] == '2'){
                                echo $this->Form->input('enquiry_form_comment', array(
					'placeholder' => __('Comment'),
				));
                                }
                                if($this->data['Message']['status'] == '0'){
                                 echo $this->Form->input('calling_time', array(
					'placeholder' => __('Calling Time'),
				));
                                }
                               
			?>
			</div>

			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			$this->Form->button(__('Save'), array('button' => 'default')) .
			$this->Html->link(
				__('Cancel'),
				array('action' => 'index'),
				array('button' => 'danger')
			) .
			$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>
</div>
<?php echo $this->Form->end(); ?>