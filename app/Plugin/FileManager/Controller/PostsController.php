<?php

class PostsController extends AppController {
public $helpers = array('Html', 'Form', 'Image');

public $name = 'Posts';

/**
 * Uploads directory
 *
 * relative to the webroot.
 *
 * @var string
 * @access public
 */
	public $uploadsDir = 'uploads';

public function admin_index() {
$this->set('posts', $this->Post->find('all'));
}

public function view() {
if (!$id) {
throw new NotFoundException(__('Invalid post'));
}
$post = $this->Post->findById($id);
if (!$post) {
throw new NotFoundException(__('Invalid post'));
}
$this->set('post', $post);
}

public function add() {
if ($this->request->is('post')) {
$this->Post->create();
if ($this->Post->save($this->request->data)) {
$this->Session->setFlash('Your post has been saved.');
$this->redirect(array('action' => 'index'));
} else {
$this->Session->setFlash('Unable to add your post.');
}
}
}
public function form($id = null) {
    //$this->set('posts', $this->Post->find('all'));
    //$posts = $this->Post->find('all');
    //print_r($posts[0]['Post']['id']);
   // $this->Post->id = $id;
    
if ($this->request->is('post')) {
$this->Post->create();
$file = $this->request->data['Post']['file'];
			unset($this->request->data['Post']['file']);

			// check if file with same path exists
			$destination = WWW_ROOT . $this->uploadsDir . DS . $file['name'];
			if (file_exists($destination)) {
				$newFileName = String::uuid() . '-' . $file['name'];
				$destination = WWW_ROOT . $this->uploadsDir . DS . $newFileName;
			} else {
				$newFileName = $file['name'];
			}
                        
                        $this->request->data['Post']['path'] = '/' . $this->uploadsDir . '/' . $newFileName;

			// move the file
			$moved = move_uploaded_file($file['tmp_name'], $destination);
                     echo $file;
if ($this->Post->save($this->request->data)) {
$this->Session->setFlash('Your post has been saved.');
$this->redirect(array('action' => 'form'));
} else {
$this->Session->setFlash('Unable to add your post.');
}
}
}

public function edit($id = null) {
if (!$id) {
throw new NotFoundException(__('Invalid post'));
}
$post = $this->Post->findById($id);
if (!$post) {
throw new NotFoundException(__('Invalid post'));
}
if ($this->request->is('post') || $this->request->is('put')) {
$this->Post->id = $id;


if ($this->Post->save($this->request->data)) {
$this->Session->setFlash('Your post has been updated.');
$this->redirect(array('action' => 'index'));
} else {
$this->Session->setFlash('Unable to update your post.');
}
}
if (!$this->request->data) {
$this->request->data = $post;
}
}


public function admin_logo() {
		$this->set('title_for_layout', __('Add Attachment'));

//		if (isset($this->request->params['named']['editor'])) {
//			$this->layout = 'admin_full';
//		}

		if ($this->request->is('post') || !empty($this->request->data)) {

//			if (empty($this->data['Node'])) {
//				$this->Node->invalidate('file', __('Upload failed. Please ensure size does not exceed the server limit.'));
//				return;
//			}

			$file = $this->request->data['Post']['file'];
			//unset($this->request->data['Node']['file']);

			// check if file with same path exists
			$destination = WWW_ROOT . $this->uploadsDir . DS . $file['name'];
			if (file_exists($destination)) {
				$newFileName = String::uuid() . '-' . $file['name'];
				$destination = WWW_ROOT . $this->uploadsDir . DS . $newFileName;
			} else {
				$newFileName = $file['name'];
			}

			// remove the extension for title
//			if (explode('.', $file['name']) > 0) {
//				$fileTitleE = explode('.', $file['name']);
//				array_pop($fileTitleE);
//				$fileTitle = implode('.', $fileTitleE);
//			} else {
				$fileTitle = $file['name'];
//			}

			//$this->request->data['Node']['title'] = $fileTitle;
			$this->request->data['Post']['slug'] = $newFileName;
			$this->request->data['Post']['mime_type'] = $file['type'];
			//$this->request->data['Node']['guid'] = Router::url('/' . $this->uploadsDir . '/' . $newFileName, true);
			$this->request->data['Post']['path'] = '/' . $this->uploadsDir . '/' . $newFileName;

			// move the file
			$moved = move_uploaded_file($file['tmp_name'], $destination);

			$this->Post->create();
			if ($moved && $this->Post->save($this->request->data)) {

				$this->Session->setFlash(__('The Attachment has been saved'), 'default', array('class' => 'success'));

//				if (isset($this->request->params['named']['editor'])) {
//					$this->redirect(array('action' => 'logo'));
//				} else {
//					$this->redirect(array('action' => 'logo'));
//				}
			} else {
				$this->Session->setFlash(__('The Attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}



}

?>
