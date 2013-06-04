<?php

App::uses('ContactsAppController', 'Contacts.Controller');

/**
 * Contacts Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ContactsController extends ContactsAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Contacts';

/**
 * Components
 *
 * @var array
 * @access public
 */
	public $components = array(
		'Akismet',
		'Email',
		'Recaptcha',
	);

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Contacts.Contact','Contacts.Message','Contacts.Node');
        
        
        
        public function beforeFilter() {
      parent::beforeFilter();

      if ($this->request->is('post')) {
         $this->Security->validatePost = false;
         $this->Security->csrfCheck = false;
      }

   }


/**
 * Admin index
 *
 * @return void
 * @access public
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Contacts'));

		$this->Contact->recursive = 0;
		$this->paginate['Contact']['order'] = 'Contact.title ASC';
		$this->set('contacts', $this->paginate());
		$this->set('displayFields', $this->Contact->displayFields());
	}
        
        
        
        public function admin_forms() {
		$this->set('title_for_layout', __('Contacts'));
//
//		$this->Contact->recursive = 0;
//		$this->paginate['Contact']['order'] = 'Contact.title ASC';
//		$this->set('contacts', $this->paginate());
//		$this->set('displayFields', $this->Contact->displayFields());
	}

/**
 * Admin add
 *
 * @return void
 * @access public
 */
	public function admin_add() {
		$this->set('title_for_layout', __('Add Contact'));

		if (!empty($this->request->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The Contact has been saved'), 'default', array('class' => 'success'));
				$this->Croogo->redirect(array('action' => 'edit', $this->Contact->id));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * Admin edit
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', __('Edit Contact'));

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Contact'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The Contact has been saved'), 'default', array('class' => 'success'));
				$this->Croogo->redirect(array('action' => 'edit', $this->Contact->id));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Contact->read(null, $id);
		}
	}

/**
 * Admin delete
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Contact'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}
        
        
        
//        public function form() {
//            //add this
//  if ($this->request->is('post')) {
//  //$post_array = $this->request->data;
//
//  $email    = new CakeEmail();
//  $email->viewVars(array('message' => 'hello kaise ho dost' ))
//     ->template('form')
//     ->emailFormat('html')
//     ->config(array('from' => 'test@test.com' ,'to' => 'digpalsngh@ymail.com'))
//     ->subject ('tact9.in')
//     ->send();
//
// }
//
//}
        
        
        
        public function form() {
    //$this->layout = 'modal';

//    if(isset($this->request->data['Contact'])) {
//        $userName = $this->request->data['Contact']['name'];
//        $userPhone = $this->request->data['Contact']['body'];
//        $userEmail = $this->request->data['Contact']['email'];
//        //$userMessage = $this->request->data['Contact']['position'];
//
//        $email = new CakeEmail();
//        $email->viewVars(array(
//                'userName' => $userName,
//                'userPhone' => $userPhone,
//                'userEmail' => $userEmail,
//                //'userMessage' => $userMessage
//        ));
//        $email->subject(''.$userName.' has asked a question from the website');
//        $email->template('form')
//            ->emailFormat('html')
//            ->to('digpalsngh@ymail.com')
//            ->from('postman@website.co.uk', 'The Postman')
//            ->send();
//
//        if ($email->send($userName)) {
//            $this->Session->setFlash('Thank you for contacting us');
//        } 
//        else {
//            $this->Session->setFlash('Mail Not Sent');
//        }
//
//    }
}

public function success() {
    $this->set('title_for_layout', __('Contacts'));
    
    


}




public function news_letter($alias = null) {
//                                if (!$alias) {
//                                                $this->redirect('/');
//                                }

                                $contact = $this->Contact->find('first', array(
                                                'conditions' => array(
                                                                'Contact.alias' => 'contact',
                                                                'Contact.status' => $this->request->data['Message']['status'],
                                                ),
//                                                'cache' => array(
//                                                                'name' => 'contact_' . $alias,
//                                                                'config' => 'contacts_view',
//                                                ),
                                ));
                                if (!isset($contact['Contact']['id'])) {
                                                $this->redirect('/');
                                }
                                $this->set('contact', $contact);

                                $continue = true;
                                if (!$contact['Contact']['message_status']) {
                                                $continue = false;
                                }
                                if (!empty($this->request->data) && $continue === true) {
                                    
                                    //print_r($this->request->data['Message']);
                                    $this->Contact->Message->save($this->request->data['Message']);
                                          $this->request->data['Message']['contact_id'] =$contact['Contact']['id'];
                                          $this->request->data['Message']['status'] = 2;
                                          //$this->request->data['Message']['title'] = htmlspecialchars($this->request->data['Message']['title']);
                                         // $this->request->data['Message']['mobile_number'] = htmlspecialchars($this->request->data['Message']['mobile_number']);
                                         // $this->request->data['Message']['calling_time'] = htmlspecialchars($this->request->data['Message']['calling_time']);
                                          //$this->request->data['Message']['max_of_guest'] = htmlspecialchars($this->request->data['Message']['max_of_guest']);
                                          //$this->request->data['Message']['date_of_event'] = htmlspecialchars($this->request->data['Message']['date_of_event']);
                                          //$this->request->data['Message']['want_to_fast_track'] = htmlspecialchars($this->request->data['Message']['want_to_fast_track']);
                                          //$this->request->data['Message']['approx_start_time'] = htmlspecialchars($this->request->data['Message']['approx_start_time']);
                                          //$this->request->data['Message']['name'] = htmlspecialchars($this->request->data['Message']['name']);
                                          //$this->request->data['Message']['lname'] = htmlspecialchars($this->request->data['Message']['lname']);
                                          //$this->request->data['Message']['body'] = htmlspecialchars($this->request->data['Message']['body']);
                                                
                                                $continue = $this->_validation($continue, $contact);
                                                $continue = $this->_spam_protection($continue, $contact);
                                                $continue = $this->_captcha($continue, $contact);
                                                //$continue = $this->_send_email_booknow($continue, $contact);
                                                //$continue = $this->_send_email_booknow_admin($continue, $contact);
                                                
                                    

                                                if ($continue === true) {
                                                                //$this->Session->setFlash(__('Your message has been received.'));
                                                                //unset($this->request->data['Message']);

                                                                echo $this->flash(__('Your message has been received...'), '/');
                                                }
                                }

                                $this->set('title_for_layout', $contact['Contact']['title']);
                                $this->set(compact('continue'));
                }






public function view1($alias = null) {
//                                if (!$alias) {
//                                                $this->redirect('/');
//                                }

                                $contact = $this->Contact->find('first', array(
                                                'conditions' => array(
                                                                'Contact.alias' => 'contact',
                                                                'Contact.status' => $this->request->data['Message']['status'],
                                                ),
//                                                'cache' => array(
//                                                                'name' => 'contact_' . $alias,
//                                                                'config' => 'contacts_view',
//                                                ),
                                ));
                                if (!isset($contact['Contact']['id'])) {
                                                $this->redirect('/');
                                }
                                $this->set('contact', $contact);

                                $continue = true;
                                if (!$contact['Contact']['message_status']) {
                                                $continue = false;
                                }
                                if (!empty($this->request->data) && $continue === true) {
                                    
                                    //print_r($this->request->data['Message']);
                                    $this->Contact->Message->save($this->request->data['Message']);
                                          $this->request->data['Message']['contact_id'] =$contact['Contact']['id'];
                                          $this->request->data['Message']['status'] = 2;
                                          //$this->request->data['Message']['title'] = htmlspecialchars($this->request->data['Message']['title']);
                                         // $this->request->data['Message']['mobile_number'] = htmlspecialchars($this->request->data['Message']['mobile_number']);
                                         // $this->request->data['Message']['calling_time'] = htmlspecialchars($this->request->data['Message']['calling_time']);
                                          //$this->request->data['Message']['max_of_guest'] = htmlspecialchars($this->request->data['Message']['max_of_guest']);
                                          //$this->request->data['Message']['date_of_event'] = htmlspecialchars($this->request->data['Message']['date_of_event']);
                                          //$this->request->data['Message']['want_to_fast_track'] = htmlspecialchars($this->request->data['Message']['want_to_fast_track']);
                                          //$this->request->data['Message']['approx_start_time'] = htmlspecialchars($this->request->data['Message']['approx_start_time']);
                                          //$this->request->data['Message']['name'] = htmlspecialchars($this->request->data['Message']['name']);
                                          //$this->request->data['Message']['lname'] = htmlspecialchars($this->request->data['Message']['lname']);
                                          //$this->request->data['Message']['body'] = htmlspecialchars($this->request->data['Message']['body']);
                                                
                                                $continue = $this->_validation($continue, $contact);
                                                $continue = $this->_spam_protection($continue, $contact);
                                                $continue = $this->_captcha($continue, $contact);
                                                $continue = $this->_send_email_booknow($continue, $contact);
                                                $continue = $this->_send_email_booknow_admin($continue, $contact);
                                                
                                    

                                                if ($continue === true) {
                                                                //$this->Session->setFlash(__('Your message has been received.'));
                                                                //unset($this->request->data['Message']);

                                                                echo $this->flash(__('Your message has been received...'), '/success');
                                                }
                                }

                                $this->set('title_for_layout', $contact['Contact']['title']);
                                $this->set(compact('continue'));
                }


/**
 * View
 *
 * @param string $alias
 * @return void
 * @access public
 */
        public function view($alias = null) {
                                if (!$alias) {
                                                $this->redirect('/');
                                }
                                
                                

                                $contact = $this->Contact->find('first', array(
                                                'conditions' => array(
                                                                'Contact.alias' => $alias,
                                                                'Contact.status' => 1,
                                                ),
                                                'cache' => array(
                                                                'name' => 'contact_' . $alias,
                                                                'config' => 'contacts_view',
                                                ),
                                ));
                                if (!isset($contact['Contact']['id'])) {
                                                $this->redirect('/');
                                }
                                
                                
                                
                                $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 30)));
                                 $this->set('nodes', $nodes);
                                 //print_r($nodes);
                                 
                                 
                                $this->set('contact', $contact);

                                $continue = true;
                                if (!$contact['Contact']['message_status']) {
                                                $continue = false;
                                }
                                if (!empty($this->request->data) && $continue === true) {
                                    $this->Contact->Message->save($this->request->data['Message']);
                                          $this->request->data['Message']['contact_id'] = $contact['Contact']['id'];
                                          //$this->request->data['Message']['title'] = htmlspecialchars($this->request->data['Message']['title']);
                                         // $this->request->data['Message']['mobile_number'] = htmlspecialchars($this->request->data['Message']['mobile_number']);
                                         // $this->request->data['Message']['calling_time'] = htmlspecialchars($this->request->data['Message']['calling_time']);
                                          //$this->request->data['Message']['max_of_guest'] = htmlspecialchars($this->request->data['Message']['max_of_guest']);
                                          //$this->request->data['Message']['date_of_event'] = htmlspecialchars($this->request->data['Message']['date_of_event']);
                                          //$this->request->data['Message']['want_to_fast_track'] = htmlspecialchars($this->request->data['Message']['want_to_fast_track']);
                                          //$this->request->data['Message']['approx_start_time'] = htmlspecialchars($this->request->data['Message']['approx_start_time']);
                                          //$this->request->data['Message']['name'] = htmlspecialchars($this->request->data['Message']['name']);
                                          //$this->request->data['Message']['lname'] = htmlspecialchars($this->request->data['Message']['lname']);
                                          //$this->request->data['Message']['body'] = htmlspecialchars($this->request->data['Message']['body']);
                                                
                                                $continue = $this->_validation($continue, $contact);
                                                $continue = $this->_spam_protection($continue, $contact);
                                                $continue = $this->_captcha($continue, $contact);
                                                $continue = $this->_send_email($continue, $contact);
                                                $continue = $this->_send_email_admin($continue, $contact);
                                                
                                    

                                                if ($continue === true) {
                                                                //$this->Session->setFlash(__('Your message has been received.'));
                                                                //unset($this->request->data['Message']);

                                                                echo $this->flash(__('Your message has been received...'), '/success');
                                                }
                                }

                                $this->set('title_for_layout', $contact['Contact']['title']);
                                $this->set(compact('continue'));
                }


/**
 * Validation
 *
 * @param boolean $continue
 * @param array $contact
 * @return boolean
 * @access protected
 */
	protected function _validation($continue, $contact) {
		if ($this->Contact->Message->set($this->request->data) &&
			$this->Contact->Message->validates() &&
			$continue === true) {
			if ($contact['Contact']['message_archive'] &&
				!$this->Contact->Message->save($this->request->data['Message'])) {
				$continue = false;
			}
		} else {
			$continue = false;
		}

		return $continue;
	}

/**
 * Spam protection
 *
 * @param boolean $continue
 * @param array $contact
 * @return boolean
 * @access protected
 */
	protected function _spam_protection($continue, $contact) {
		if (!empty($this->request->data) &&
			$contact['Contact']['message_spam_protection'] &&
			$continue === true) {
			$this->Akismet->setCommentAuthor($this->request->data['Message']['fname']);
			$this->Akismet->setCommentAuthorEmail($this->request->data['Message']['email']);
			$this->Akismet->setCommentContent($this->request->data['Message']['body']);
			if ($this->Akismet->isCommentSpam()) {
				$continue = false;
				$this->Session->setFlash(__('Sorry, the message appears to be spam.'), 'default', array('class' => 'error'));
			}
		}

		return $continue;
	}

/**
 * Captcha
 *
 * @param boolean $continue
 * @param array $contact
 * @return boolean
 * @access protected
 */
	protected function _captcha($continue, $contact) {
		if (!empty($this->request->data) &&
			$contact['Contact']['message_captcha'] &&
			$continue === true &&
			!$this->Recaptcha->valid($this->request)) {
			$continue = false;
			$this->Session->setFlash(__('Invalid captcha entry'), 'default', array('class' => 'error'));
		}

		return $continue;
	}
        
        
        protected function _send_email_booknow($continue, $contact) {
		$email = new CakeEmail();
		if ($contact['Contact']['message_notify'] && $continue === true) {
			$siteTitle = Configure::read('Site.title');
                        //$user_mail = $this->request->data['Message']['email'];
                   $msg = "Your Enquiry has been received,we will contact you shortly,with link:  ".$this->request->data['Message']['phone']."";
               
			$email->from('digpalsngh@ymail.com')
				->to($this->request->data['Message']['email'])
				->subject(__('[%s] %s', $siteTitle, $contact['Contact']['title']));
				//->template('Contacts.contact_admin')
                    //->message('Hello wats going on');
//				->viewVars(array(
//					'contact_admin' => $contact,
//					'message' => 'hello its for admin',
//				));
                           
               
			if (!$email->send($msg)) {
				$continue = false;
			}
		}

		return $continue;
	}
        
        
        
        protected function _send_email_booknow_admin($continue, $contact) {
		$email = new CakeEmail();
		if ($contact['Contact']['message_notify'] && $continue === true) {
			$siteTitle = Configure::read('Site.title');
                        //$user_mail = $this->request->data['Message']['email'];
                   $msg = "Dear Admin,\n\n".$this->request->data['Message']['name']." post an enquiry for
                       ".$this->request->data['Message']['lname']." with email:".$this->request->data['Message']['email']."
                           And Phone no:".$this->request->data['Message']['phone']."
                               with link:".$this->request->data['Message']['body']."";
               
			$email->from('digpalsngh@ymail.com')
				->to('pankaj@tact9.in')
				->subject(__('[%s] %s', $siteTitle, $contact['Contact']['title']));
				//->template('Contacts.contact_admin')
                    //->message('Hello wats going on');
//				->viewVars(array(
//					'contact_admin' => $contact,
//					'message' => 'hello its for admin',
//				));
                           
               
			if (!$email->send($msg)) {
				$continue = false;
			}
		}

		return $continue;
	}

/**
 * Send Email
 *
 * @param boolean $continue
 * @param array $contact
 * @return boolean
 * @access protected
 */
	protected function _send_email($continue, $contact) {
		$email = new CakeEmail();
		if ($contact['Contact']['message_notify'] && $continue === true) {
			$siteTitle = Configure::read('Site.title');
                        //$user_mail = $this->request->data['Message']['email'];
			$email->from('digpalsngh@ymail.com')
				->to($this->request->data['Message']['email'])
                              //  ->to('pankaj@tact9.in')
                               // ->to('digpal@tact9.in')
				->subject(__('[%s] %s', $siteTitle, $contact['Contact']['title']))
				->template('Contacts.contact')
				->viewVars(array(
					'contact' => $contact,
					'message' => $this->request->data,
				));

			if (!$email->send()) {
				$continue = false;
			}
		}

		return $continue;
	}
        
        
        protected function _send_email_admin($continue, $contact) {
		$email = new CakeEmail();
		if ($contact['Contact']['message_notify'] && $continue === true) {
			$siteTitle = Configure::read('Site.title');
                        //$user_mail = $this->request->data['Message']['email'];
                   $msg = "Details of user.\n\n
                        --".$this->request->data['Message']['type_of_event']."\n
                        --".$this->request->data['Message']['max_of_guest']."\n
                        --".$this->request->data['Message']['date_of_event']."\n
                        --".$this->request->data['Message']['fast_track_enquiry']."\n
                        --".$this->request->data['Message']['flexible_date']."\n
                        --".$this->request->data['Message']['approx_start_time']."\n
                        --".$this->request->data['Message']['budget_type']."\n
                        --".$this->request->data['Message']['per_head_budget']."\n
                        --".$this->request->data['Message']['total_event_budget']."\n
                        --".$this->request->data['Message']['location_pref']."\n
                        --".$this->request->data['Message']['drinkpreference']."\n
                        --".$this->request->data['Message']['execlusive_space']."\n
                        --".$this->request->data['Message']['any_other_requirement']."\n
                        --".$this->request->data['Message']['have_you_already']."\n
                        --".$this->request->data['Message']['name']."\n
                        --".$this->request->data['Message']['lname']."\n
                        --".$this->request->data['Message']['email']."\n
                        --".$this->request->data['Message']['mobile_number']."\n
                       
                                                             
                                  
                         ---".$this->request->data['Message']['calling_time']."";
               
			$email->from('digpalsngh@ymail.com')
				
                                ->to('pankaj@tact9.in')
				->subject(__('[%s] %s', $siteTitle, $contact['Contact']['title']));
				//->template('Contacts.contact_admin')
                    //->message('Hello wats going on');
//				->viewVars(array(
//					'contact_admin' => $contact,
//					'message' => 'hello its for admin',
//				));
                           
               
			if (!$email->send($msg)) {
				$continue = false;
			}
		}

		return $continue;
	}

}
