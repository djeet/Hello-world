<?php
            //echo $this->Form->create('Contact', array('url' => '/contact/ask-the-expert/', 'class' => 'contact'));
echo $this->Form->create('Contact',array('controller'=> 'contacts', 'action' => 'form'));
            echo $this->Form->input('name', array(
                'type' => 'text',
                'label' => 'Your Name <span class="star">*</span>',
            ));
            echo $this->Form->input('body', array(
                'type' => 'text',
                'label' => 'Your Telephone',
            ));
            echo $this->Form->input('email', array(
                'type' => 'text',
                'label' => 'Your Email <span class="star">*</span>',
            ));
//            echo $this->Form->input('position ', array(
//                'type' => 'textarea',
//                'label' => 'Your Question <span class="star">*</span>',
//            ));
            echo $this->Form->submit();

            echo $this->Form->end();
         ?>