<?php

App::uses('NodesAppController', 'Nodes.Controller');
App::uses('Croogo', 'Lib');

/**
 * Nodes Controller
 *
 * PHP version 5
 *
 * @category Nodes.Controller
 * @package  Croogo.Nodes
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class NodesController extends NodesAppController {

   /**
    * Controller name
    *
    * @var string
    * @access public
    */
   public $name = 'Nodes';

   /**
    * Components
    *
    * @var array
    * @access public
    */
   public $components = array(
       'Recaptcha',
       'Search.Prg',
       
   );

   //public $helpers = array('Ajax');'RequestHandler'
   /**
    * Preset Variable Search
    *
    * @var array
    * @access public
    */
   public $presetVars = array(
       'filter' => array('type' => 'value'),
       'type' => array('type' => 'value'),
       'status' => array('type' => 'value'),
       'promote' => array('type' => 'value'),
   );

   /**
    * Models used by the Controller
    *
    * @var array
    * @access public
    */
   public $uses = array(
       'Nodes.Node', 'Nodes.Term', 'Nodes.Nodeattachment', 'Nodes.Taxonomy',
   );

   /**
    * afterConstruct
    */
   public function afterConstruct() {
      parent::afterConstruct();
      $this->_setupAclComponent();
   }

   /**
    * beforeFilter
    *
    * @return void
    * @access public
    */
   public function beforeFilter() {
      parent::beforeFilter();

      if (isset($this->request->params['slug'])) {
         $this->request->params['named']['slug'] = $this->request->params['slug'];
      }
      if (isset($this->request->params['type'])) {
         $this->request->params['named']['type'] = $this->request->params['type'];
      }
      $this->Security->unlockedActions[] = 'admin_toggle';
   }

   /**
    * Toggle Node status
    *
    * @param $id string Node id
    * @param $status integer Current Node status
    * @return void
    */
   public function admin_toggle($id = null, $status = null) {
      $this->Croogo->fieldToggle($this->Node, $id, $status);
   }

   /**
    * Admin index
    *
    * @return void
    * @access public
    */
   public function admin_index() {
      $this->set('title_for_layout', __('Content'));
      $this->Prg->commonProcess();

      $this->Node->recursive = 0;
      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['conditions'] = array();
      $this->paginate['Node']['contain'] = array('User');

      $types = $this->Node->Taxonomy->Vocabulary->Type->find('all');
      $typeAliases = Hash::extract($types, '{n}.Type.alias');
      $this->paginate['Node']['conditions']['Node.type'] = $typeAliases;

      $nodes = $this->paginate($this->Node->parseCriteria($this->passedArgs));
      $nodeTypes = $this->Node->Taxonomy->Vocabulary->Type->find('list', array(
          'fields' => array('Type.alias', 'Type.title')
              ));
      $this->set(compact('nodes', 'types', 'typeAliases', 'nodeTypes'));

      if (isset($this->request->params['named']['links'])) {
         $this->layout = 'ajax';
         $this->render('admin_links');
      }
   }

   /**
    * Admin create
    *
    * @return void
    * @access public
    */
   public function admin_create() {
      $this->set('title_for_layout', __('Create content'));

      $types = $this->Node->Taxonomy->Vocabulary->Type->find('all', array(
          'order' => array(
              'Type.alias' => 'ASC',
          ),
              ));
      $this->set(compact('types'));
   }

   /**
    * Admin add
    *
    * @param string $typeAlias
    * @return void
    * @access public
    */
   public function admin_add($typeAlias = 'node') {
      $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
      if (!isset($type['Type']['alias'])) {
         $this->Session->setFlash(__('Content type does not exist.'));
         $this->redirect(array('action' => 'create'));
      }

      $this->set('title_for_layout', __('Create content: %s', $type['Type']['title']));
      $this->Node->type = $type['Type']['alias'];
      $this->Node->Behaviors->attach('Tree', array(
          'scope' => array(
              'Node.type' => $this->Node->type,
          ),
      ));

      if (!empty($this->request->data)) {
         if (isset($this->request->data['TaxonomyData'])) {
            $this->request->data['Taxonomy'] = array(
                'Taxonomy' => array(),
            );
            foreach ($this->request->data['TaxonomyData'] as $vocabularyId => $taxonomyIds) {
               if (is_array($taxonomyIds)) {
                  $this->request->data['Taxonomy']['Taxonomy'] = array_merge($this->request->data['Taxonomy']['Taxonomy'], $taxonomyIds);
               }
            }
         }
         $this->Node->create();
         $this->request->data['Node']['path'] = Croogo::getRelativePath(array(
                     'admin' => false,
                     'controller' => 'nodes',
                     'action' => 'view',
                     'type' => $this->Node->type,
                     'slug' => $this->request->data['Node']['slug'],
                 ));
         $this->request->data['Node']['visibility_roles'] = $this->Node->encodeData($this->request->data['Role']['Role']);
         if ($this->Node->saveWithMeta($this->request->data)) {
            Croogo::dispatchEvent('Controller.Nodes.afterAdd', $this, array('data' => $this->request->data));
            $this->Session->setFlash(__('%s has been saved', $type['Type']['title']), 'default', array('class' => 'success'));
            $this->Croogo->redirect(array('action' => 'edit', $this->Node->id));
         } else {
            $this->Session->setFlash(__('%s could not be saved. Please, try again.', $type['Type']['title']), 'default', array('class' => 'error'));
         }
      } else {
         $this->request->data['Node']['user_id'] = $this->Session->read('Auth.User.id');
      }

      $nodes = $this->Node->generateTreeList();
      $roles = $this->Node->User->Role->find('list');
      $users = $this->Node->User->find('list');
      $vocabularies = Hash::combine($type['Vocabulary'], '{n}.id', '{n}');
      $taxonomy = array();
      foreach ($type['Vocabulary'] as $vocabulary) {
         $vocabularyId = $vocabulary['id'];
         $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array('taxonomyId' => true));
      }
     
      $this->set(compact('typeAlias', 'type', 'nodes', 'roles', 'vocabularies', 'taxonomy', 'users'));
   }

   /**
    * Admin edit
    *
    * @param integer $id
    * @return void
    * @access public
    */
   public function admin_edit($id = null) {  
      if (!$id && empty($this->request->data)) { 
         $this->Session->setFlash(__('Invalid content'), 'default', array('class' => 'error'));
         $this->redirect(array('action' => 'index'));
      }

      $this->Node->id = $id;
      $typeAlias = $this->Node->field('type');

      $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
      if (!isset($type['Type']['alias'])) {
         $this->Session->setFlash(__('Content type does not exist.'), 'default', array('class' => 'error'));
         $this->redirect(array('action' => 'create'));
      }

      $this->Node->type = $type['Type']['alias'];
      $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $this->Node->type)));

      if (!empty($this->request->data)) {
         if (isset($this->request->data['TaxonomyData'])) {
            $this->request->data['Taxonomy'] = array(
                'Taxonomy' => array(),
            );
            foreach ($this->request->data['TaxonomyData'] as $vocabularyId => $taxonomyIds) {
               if (is_array($taxonomyIds)) {
                  $this->request->data['Taxonomy']['Taxonomy'] = array_merge($this->request->data['Taxonomy']['Taxonomy'], $taxonomyIds);
               }
            }
         }
         $this->request->data['Node']['path'] = Croogo::getRelativePath(array(
                     'admin' => false,
                     'controller' => 'nodes',
                     'action' => 'view',
                     'type' => $this->Node->type,
                     'slug' => $this->request->data['Node']['slug'],
                 ));
         $this->request->data['Node']['visibility_roles'] = $this->Node->encodeData($this->request->data['Role']['Role']);
         if ($this->Node->saveWithMeta($this->request->data)) {
            Croogo::dispatchEvent('Controller.Nodes.afterEdit', $this, array('data' => $this->request->data));
            $this->Session->setFlash(__('%s has been saved', $type['Type']['title']), 'default', array('class' => 'success'));
            $this->Croogo->redirect(array('action' => 'edit', $this->Node->id));
         } else {
            $this->Session->setFlash(__('%s could not be saved. Please, try again.', $type['Type']['title']), 'default', array('class' => 'error'));
         }
      } 
      if (empty($this->request->data)) {
         $data = $this->Node->read(null, $id);
         $data['Role']['Role'] = $this->Node->decodeData($data['Node']['visibility_roles']);
         $this->request->data = $data;
      }
     
    
      $this->set('title_for_layout', __('Edit %s: %s', $type['Type']['title'], $this->request->data['Node']['title']));

      $nodes = $this->Node->generateTreeList();
      $roles = $this->Node->User->Role->find('list');
      $users = $this->Node->User->find('list');
      $vocabularies = Hash::combine($type['Vocabulary'], '{n}.id', '{n}');
    
      
     // print_r($this->data); 
      $taxonomy = array();
     
      foreach ($type['Vocabulary'] as $vocabulary) {
         $vocabularyId = $vocabulary['id'];
         $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array('taxonomyId' => true));
         
      } 
      //$data['Taxonomy'] = $taxonomy;
      //$this->request->data = $data;
      
     // $this->data['Taxonomy'] = 5;
      //$this->data = 5;
     
      // print_r($vocabularies);
      $this->set(compact('typeAlias', 'type', 'nodes', 'roles', 'vocabularies', 'taxonomy', 'users'));
   }

   /**
    * Admin update paths
    *
    * @return void
    * @access public
    */
   public function admin_update_paths() {
      $types = $this->Node->Taxonomy->Vocabulary->Type->find('list', array(
          'fields' => array(
              'Type.id',
              'Type.alias',
          ),
              ));
      $typesAlias = array_values($types);

      $nodes = $this->Node->find('all', array(
          'conditions' => array(
              'Node.type' => $typesAlias,
          ),
          'fields' => array(
              'Node.id',
              'Node.slug',
              'Node.type',
              'Node.path',
          ),
          'recursive' => '-1',
              ));
      foreach ($nodes as $node) {
         $node['Node']['path'] = Croogo::getRelativePath(array(
                     'admin' => false,
                     'controller' => 'nodes',
                     'action' => 'view',
                     'type' => $node['Node']['type'],
                     'slug' => $node['Node']['slug'],
                 ));
         $this->Node->id = false;
         $this->Node->save($node);
      }

      $this->Session->setFlash(__('Paths updated.'), 'default', array('class' => 'success'));
      $this->redirect(array('action' => 'index'));
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
         $this->Session->setFlash(__('Invalid id for Node'), 'default', array('class' => 'error'));
         $this->redirect(array('action' => 'index'));
      }
      if ($this->Node->delete($id)) {
         $this->Session->setFlash(__('Node deleted'), 'default', array('class' => 'success'));
         $this->redirect(array('action' => 'index'));
      }
   }

   /**
    * Parent get
    *
    * @param integer $id
    * @return void
    * @access public
    */
   //
   function parentget() {exit; echo 'hello';
//  $id = $_POST['id']; 
//   if (!$id) {
//         $parent_status = $this->Node->query("SELECT parent_id FROM nodes WHERE id = '".$id. "'");
//         $this->set('data', $parent_status);
//      }
   }

   /**
    * Admin delete meta
    *
    * @param integer $id
    * @return void
    * @access public
    */
   public function admin_delete_meta($id = null) {
      $success = false;
      if ($id != null && $this->Node->Meta->delete($id)) {
         $success = true;
      } else {
         if (!$this->Node->Meta->exists($id)) {
            $success = true;
         }
      }

      $this->set(compact('success'));
   }

   /**
    * Admin add meta
    *
    * @return void
    * @access public
    */
   public function admin_add_meta() {
      $this->layout = 'ajax';
   }

   /**
    * Admin process
    *
    * @return void
    * @access public
    */
   public function admin_process() {
      $action = $this->request->data['Node']['action'];
      $ids = array();
      foreach ($this->request->data['Node'] as $id => $value) {
         if ($id != 'action' && $value['id'] == 1) {
            $ids[] = $id;
         }
      }

      if (count($ids) == 0 || $action == null) {
         $this->Session->setFlash(__('No items selected.'), 'default', array('class' => 'error'));
         $this->redirect(array('action' => 'index'));
      }

      if ($action == 'delete' &&
              $this->Node->deleteAll(array('Node.id' => $ids), true, true)) {
         Croogo::dispatchEvent('Controller.Nodes.afterDelete', $this, compact($ids));
         $this->Session->setFlash(__('Nodes deleted.'), 'default', array('class' => 'success'));
      } elseif ($action == 'publish' &&
              $this->Node->updateAll(array('Node.status' => 1), array('Node.id' => $ids))) {
         Croogo::dispatchEvent('Controller.Nodes.afterPublish', $this, compact($ids));
         $this->Session->setFlash(__('Nodes published'), 'default', array('class' => 'success'));
      } elseif ($action == 'unpublish' &&
              $this->Node->updateAll(array('Node.status' => 0), array('Node.id' => $ids))) {
         Croogo::dispatchEvent('Controller.Nodes.afterUnpublish', $this, compact($ids));
         $this->Session->setFlash(__('Nodes unpublished'), 'default', array('class' => 'success'));
      } elseif ($action == 'promote' &&
              $this->Node->updateAll(array('Node.promote' => 1), array('Node.id' => $ids))) {
         Croogo::dispatchEvent('Controller.Nodes.afterPromote', $this, compact($ids));
         $this->Session->setFlash(__('Nodes promoted'), 'default', array('class' => 'success'));
      } elseif ($action == 'unpromote' &&
              $this->Node->updateAll(array('Node.promote' => 0), array('Node.id' => $ids))) {
         Croogo::dispatchEvent('Controller.Nodes.afterUnpromote', $this, compact($ids));
         $this->Session->setFlash(__('Nodes unpromoted'), 'default', array('class' => 'success'));
      } else {
         $this->Session->setFlash(__('An error occurred.'), 'default', array('class' => 'error'));
      }

      $this->redirect(array('action' => 'index'));
   }

   /**
    * Index
    *
    * @return void
    * @access public
    */
   public function index() {
      if (!isset($this->request->params['named']['type'])) {
         $this->request->params['named']['type'] = 'node';
      }

      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'OR' => array(
              'Node.visibility_roles' => '',
              'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
          ),
      );
      $this->paginate['Node']['contain'] = array(
          'Meta',
          'Taxonomy' => array(
              'Term',
              'Vocabulary',
          ),
          'User',
      );
      if (isset($this->request->params['named']['type'])) {
         $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
             'conditions' => array(
                 'Type.alias' => $this->request->params['named']['type'],
             ),
             'cache' => array(
                 'name' => 'type_' . $this->request->params['named']['type'],
                 'config' => 'nodes_index',
             ),
                 ));
         if (!isset($type['Type']['id'])) {
            $this->Session->setFlash(__('Invalid content type.'), 'default', array('class' => 'error'));
            $this->redirect('/');
         }
         if (isset($type['Params']['nodes_per_page'])) {
            $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
         }
         $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
         $this->set('title_for_layout', $type['Type']['title']);
      }

      if ($this->usePaginationCache) {
         $cacheNamePrefix = 'nodes_index_' . $this->Croogo->roleId . '_' . Configure::read('Config.language');
         if (isset($type)) {
            $cacheNamePrefix .= '_' . $type['Type']['alias'];
         }
         $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->params['named']['page'] : 1;
         $cacheName = $cacheNamePrefix . '_' . $this->request->params['named']['type'] . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
         $cacheNamePaging = $cacheNamePrefix . '_' . $this->request->params['named']['type'] . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
         $cacheConfig = 'nodes_index';
         $nodes = Cache::read($cacheName, $cacheConfig);
         if (!$nodes) {
            $nodes = $this->paginate('Node');
            Cache::write($cacheName, $nodes, $cacheConfig);
            Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
         } else {
            $paging = Cache::read($cacheNamePaging, $cacheConfig);
            $this->request->params['paging'] = $paging;
            $this->helpers[] = 'Paginator';
         }
      } else {
         $nodes = $this->paginate('Node');
      }

      $this->set(compact('type', 'nodes'));
      $this->_viewFallback(array(
          'index_' . $type['Type']['alias'],
      ));
   }

   /**
    * Term
    *
    * @return void
    * @access public
    */
   public function term() {
      $term = $this->Node->Taxonomy->Term->find('first', array(
          'conditions' => array(
              'Term.slug' => $this->request->params['named']['slug'],
          ),
          'cache' => array(
              'name' => 'term_' . $this->request->params['named']['slug'],
              'config' => 'nodes_term',
          ),
              ));
      if (!isset($term['Term']['id'])) {
         $this->Session->setFlash(__('Invalid Term.'), 'default', array('class' => 'error'));
         $this->redirect('/');
      }

      if (!isset($this->request->params['named']['type'])) {
         $this->request->params['named']['type'] = 'node';
      }

      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'Node.terms LIKE' => '%"' . $this->request->params['named']['slug'] . '"%',
          'OR' => array(
              'Node.visibility_roles' => '',
              'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
          ),
      );
      $this->paginate['Node']['contain'] = array(
          'Meta',
          'Taxonomy' => array(
              'Term',
              'Vocabulary',
          ),
          'User',
      );
      if (isset($this->request->params['named']['type'])) {
         $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
             'conditions' => array(
                 'Type.alias' => $this->request->params['named']['type'],
             ),
             'cache' => array(
                 'name' => 'type_' . $this->request->params['named']['type'],
                 'config' => 'nodes_term',
             ),
                 ));
         if (!isset($type['Type']['id'])) {
            $this->Session->setFlash(__('Invalid content type.'), 'default', array('class' => 'error'));
            $this->redirect('/');
         }
         if (isset($type['Params']['nodes_per_page'])) {
            $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
         }
         $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
         $this->set('title_for_layout', $term['Term']['title']);
      }

      if ($this->usePaginationCache) {
         $cacheNamePrefix = 'nodes_term_' . $this->Croogo->roleId . '_' . $this->request->params['named']['slug'] . '_' . Configure::read('Config.language');
         if (isset($type)) {
            $cacheNamePrefix .= '_' . $type['Type']['alias'];
         }
         $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->params['named']['page'] : 1;
         $cacheName = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
         $cacheNamePaging = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
         $cacheConfig = 'nodes_term';
         $nodes = Cache::read($cacheName, $cacheConfig);
         if (!$nodes) {
            $nodes = $this->paginate('Node');
            Cache::write($cacheName, $nodes, $cacheConfig);
            Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
         } else {
            $paging = Cache::read($cacheNamePaging, $cacheConfig);
            $this->request->params['paging'] = $paging;
            $this->helpers[] = 'Paginator';
         }
      } else {
         $nodes = $this->paginate('Node');
      }

      $this->set(compact('term', 'type', 'nodes'));
      $this->_viewFallback(array(
          'term_' . $term['Term']['id'],
          'term_' . $type['Type']['alias'],
      ));
   }

   /**
    * Promoted
    *
    * @return void
    * @access public
    */
   public function promoted() {
      $this->set('title_for_layout', __('Nodes'));

      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'Node.promote' => 1,
          'OR' => array(
              'Node.visibility_roles' => '',
              'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
          ),
      );
      $this->paginate['Node']['contain'] = array(
          'Meta',
          'Taxonomy' => array(
              'Term',
              'Vocabulary',
          ),
          'User',
      );

      if (isset($this->request->params['named']['type'])) {
         $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($this->request->params['named']['type']);
         if (!isset($type['Type']['id'])) {
            $this->Session->setFlash(__('Invalid content type.'), 'default', array('class' => 'error'));
            $this->redirect('/');
         }
         if (isset($type['Params']['nodes_per_page'])) {
            $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
         }
         $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
         $this->set('title_for_layout', $type['Type']['title']);
         $this->set(compact('type'));
      }

      if ($this->usePaginationCache) {
         $cacheNamePrefix = 'nodes_promoted_' . $this->Croogo->roleId . '_' . Configure::read('Config.language');
         if (isset($type)) {
            $cacheNamePrefix .= '_' . $type['Type']['alias'];
         }
         $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->params['named']['page'] : 1;
         $cacheName = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
         $cacheNamePaging = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
         $cacheConfig = 'nodes_promoted';
         $nodes = Cache::read($cacheName, $cacheConfig);
         if (!$nodes) {
            $nodes = $this->paginate('Node');
            Cache::write($cacheName, $nodes, $cacheConfig);
            Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
         } else {
            $paging = Cache::read($cacheNamePaging, $cacheConfig);
            $this->request->params['paging'] = $paging;
            $this->helpers[] = 'Paginator';
         }
      } else {
         $nodes = $this->paginate('Node');
      }
      $this->set(compact('nodes'));
   }

   /**
    * Search
    *
    * @param string $typeAlias
    * @return void
    * @access public
    */
   public function search($typeAlias = null) {
      if (!isset($this->request->params['named']['q'])) {
         $this->redirect('/');
      }

      App::uses('Sanitize', 'Utility');
      $q = Sanitize::clean($this->request->params['named']['q']);
      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'AND' => array(
              array(
                  'OR' => array(
                      'Node.title LIKE' => '%' . $q . '%',
                      'Node.excerpt LIKE' => '%' . $q . '%',
                      'Node.body LIKE' => '%' . $q . '%',
                      'Node.terms LIKE' => '%"' . $q . '"%',
                  ),
              ),
              array(
                  'OR' => array(
                      'Node.visibility_roles' => '',
                      'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
                  ),
              ),
          ),
      );
      $this->paginate['Node']['contain'] = array(
          'Meta',
          'Taxonomy' => array(
              'Term',
              'Vocabulary',
          ),
          'User',
      );
      if ($typeAlias) {
         $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
         if (!isset($type['Type']['id'])) {
            $this->Session->setFlash(__('Invalid content type.'), 'default', array('class' => 'error'));
            $this->redirect('/');
         }
         if (isset($type['Params']['nodes_per_page'])) {
            $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
         }
         $this->paginate['Node']['conditions']['Node.type'] = $typeAlias;
      }

      $nodes = $this->paginate('Node');
      $this->set('title_for_layout', __('Search Results: %s', $q));
      $this->set(compact('q', 'nodes'));
      if ($typeAlias) {
         $this->_viewFallback(array(
             'search_' . $typeAlias,
         ));
      }
   }

   /**
    * View
    *
    * @param integer $id
    * @return void
    * @access public
    */
   public function view($id = null) {

      $dd_facilities = $this->Term->query("SELECT title,id FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =9)"); //for Facilities         

      if (isset($this->request->params['named']['slug']) && isset($this->params['named']['type'])) {
         $this->Node->type = $this->request->params['named']['type'];
         $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
             'conditions' => array(
                 'Type.alias' => $this->Node->type,
             ),
             'cache' => array(
                 'name' => 'type_' . $this->Node->type,
                 'config' => 'nodes_view',
             ),
                 ));
         $node = $this->Node->find('first', array(
             'conditions' => array(
                 'Node.slug' => $this->request->params['named']['slug'],
                 'Node.type' => $this->request->params['named']['type'],
                 'Node.status' => 1,
//					'OR' => array(
//						'Node.visibility_roles' => '',
//						//'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
//					),
             ),
             'contain' => array(
                 'Meta',
                 'Taxonomy' => array(
                     'Term',
                     'Vocabulary',
                 ),
                 'User',
             ),
             'cache' => array(
                 'name' => 'node_' . $this->Croogo->roleId . '_' . $this->request->params['named']['type'] . '_' . $this->params['named']['slug'],
                 'config' => 'nodes_view',
             ),
                 ));
         //  print_r($node);
         if (!empty($node)) {
            $child_array = $this->Node->query("SELECT id,title,slug,excerpt,Capacity_Available,Price,Map FROM nodes WHERE  parent_id = '" . $node['Node']['id'] . "'");
            $image_query = $this->Nodeattachment->query("SELECT node_id,path FROM nodeattachments WHERE  node_id in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['id'] . "')");
            $parent_array = $this->Node->query("SELECT id,title,body,slug,excerpt,Capacity_Available,Price,Map FROM nodes WHERE  id = '" . $node['Node']['parent_id'] . "'");
            $child_parent_childs_array = $this->Node->query("SELECT a.id,a.title,a.slug,b.path FROM nodes a,nodeattachments b WHERE a.id in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['parent_id'] . "') and a.id =b.node_id");
         }
      } elseif ($id == null) {
         $this->Session->setFlash(__('Invalid content'), 'default', array('class' => 'error'));
         $this->redirect('/');
      } else {
         $node = $this->Node->find('first', array(
             'conditions' => array(
                 'Node.id' => $id,
                 'Node.status' => 1,
//					'OR' => array(
//						'Node.visibility_roles' => '',
//						'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
//					),
             ),
             'contain' => array(
                 'Meta',
                 'Taxonomy' => array(
                     'Term',
                     'Vocabulary',
                 ),
                 'User',
             ),
             'cache' => array(
                 'name' => 'node_' . $this->Croogo->roleId . '_' . $id,
                 'config' => 'nodes_view',
             ),
                 ));

         $this->Node->type = $node['Node']['type'];
         $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
             'conditions' => array(
                 'Type.alias' => $this->Node->type,
             ),
             'cache' => array(
                 'name' => 'type_' . $this->Node->type,
                 'config' => 'nodes_view',
             ),
                 ));
      }

      if (!isset($node['Node']['id'])) {
         $this->Session->setFlash(__('Invalid content'), 'default', array('class' => 'error'));
         $this->redirect('/');
      }

      if ($node['Node']['comment_count'] > 0) {
         $comments = $this->Node->Comment->find('threaded', array(
             'conditions' => array(
                 'Comment.node_id' => $node['Node']['id'],
                 'Comment.status' => 1,
             ),
             'contain' => array(
                 'User',
             ),
             'cache' => array(
                 'name' => 'comment_node_' . $node['Node']['id'],
                 'config' => 'nodes_view',
             ),
                 ));
      } else {
         $comments = array();
      }

      $this->set('title_for_layout', $node['Node']['title']);
      $this->set(compact('node', 'type', 'comments', 'child_array', 'image_query', 'parent_array', 'child_parent_childs_array', 'dd_facilities'));
      $this->_viewFallback(array(
          'view_' . $node['Node']['id'],
          'view_' . $type['Type']['alias'],
      ));
   }

   /**
    * View Fallback
    *
    * @param mixed $views
    * @return string
    * @access protected
    */
   protected function _viewFallback($views) {
      if (is_string($views)) {
         $views = array($views);
      }

      if ($this->theme) {
         $viewPaths = App::path('View');
         foreach ($views as $view) {
            foreach ($viewPaths as $viewPath) {
               $viewPath = $viewPath . 'Themed' . DS . $this->theme . DS . $this->name . DS . $view . $this->ext;
               if (file_exists($viewPath)) {
                  return $this->render($view);
               }
            }
         }
      }
   }

   public function browse() {

      $this->set('title_for_layout', __('Nodes', true));

      //$this->set('title_for_layout', __('Nodes'));
      // $nodes =  $this->Node->Taxonomy->Term->find('all',array('conditions'=>array('Node.type'=>'node')));      
      $nodes = $this->Node->find('all', array('conditions' => array('Node.type' => 'node', 'Node.parent_id !=' => NULL), 'group' => array('Node.parent_id')));
      $pk = $this->Node;
      $dd_events = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =4)"); //For events
      $dd_location = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =5)"); //For Location
      $dd_privacy = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =6)"); //for privacy
      $dd_food = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =7)"); //for food
      $dd_drinks = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =8)"); //for drinks
      $dd_facilities = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =9)"); //for Facilities
//print_r($nodes);

      $this->set(compact('nodes', 'dd_events', 'dd_location', 'dd_privacy', 'dd_food', 'dd_drinks', 'dd_facilities', 'pk')); //
      // $nodes=$this->Node->query("SELECT * FROM nodes WHERE parent_id IN (SELECT parent_id FROM nodes WHERE  parent_id != '0' GROUP BY parent_id) GROUP BY parent_id");
      //$nodes= $this->Node->find('all', 'conditions' => array('Node.type' => 'blog'));
      //  print_r($nodes);
      //  $this->set('nodes,pk',$nodes);
//        $this->paginate['Node']['order'] = 'Node.created DESC';
//        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
//        $this->paginate['Node']['conditions'] = array(
//            'Node.status' => 1,
//            'Node.promote' => 1,
//            'OR' => array(
//                'Node.visibility_roles' => '',
//                'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
//            ),
//        );
//        $this->paginate['Node']['contain'] = array(
//            'Meta',
//            'Taxonomy' => array(
//                'Term',
//                'Vocabulary',
//            ),
//            'User',
//        );
//        
//        
////        $node = $this->Node->find('first', array(
////				
////				'contain' => array(
////					'Meta',
////					'Taxonomy' => array(
////						'Term',
////						'Vocabulary',
////					),
////					'User',
////				),
////				'cache' => array(
////					'name' => 'node_' . $this->Croogo->roleId . '_' . $this->request->params['named']['type'] . '_' . $this->params['named']['slug'],
////					'config' => 'nodes_view',
////				),
////			));
////                        print_r($node);
//        
//        
//       //$nodess=$this->Node->find('all');
//       //print_r($nodess['Node']['id']);
//        //$img = $this->Nodeattachment->find('all',array('conditions'=>array('Nodeattachment.node_id'=>$id)));
//      //  $img = $this->Nodeattachment->find('all');
//        
//     //print_r($nodess['Node']['id']);
//        
//        
//        //$typess = $this->Term->find('all');
//        
//       $typess = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =3)");
//       $typess1 = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =8)");
//       $typess2 = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =5)");
//       $typess3 = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =6)");
//       $typess4 = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =7)");
//       
//        //$typess5 = $this->Term->query("SELECT * FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id = 9)");
//       //$typess6 = $this->Term->query("SELECT title FROM `terms` where id in (SELECT parent_id FROM `taxonomies` WHERE vocabulary_id =9)");
//       //$typess = $this->Term->query("SELECT title FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =3)");
//       // print_r($typess5);die;
//          //$nodes=$this->Node->Taxonomy->find('all');
//         // print_r($nodes);die;
//        if (isset($this->params['named']['type'])) {
//            $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($this->params['named']['type']);
//            if (!isset($type['Type']['id'])) {
//                $this->Session->setFlash(__('Invalid content type.', true), 'default', array('class' => 'error'));
//                $this->redirect('/');
//            }
//            if (isset($type['Params']['nodes_per_page'])) {
//                $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
//            }
//            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
//            $this->set('title_for_layout', $type['Type']['title']);
//            $this->set(compact('type'));
//        }
//
//        if ($this->usePaginationCache) {
//            $cacheNamePrefix = 'nodes_promoted_'.$this->Croogo->roleId.'_'.Configure::read('Config.language');
//            if (isset($type)) {
//                $cacheNamePrefix .= '_'.$type['Type']['alias'];
//            }
//            $this->paginate['page'] = isset($this->params['named']['page']) ? $this->params['named']['page'] : 1;
//            $cacheName = $cacheNamePrefix.'_'.$this->paginate['page'].'_'.$this->paginate['Node']['limit'];
//            $cacheNamePaging = $cacheNamePrefix.'_'.$this->paginate['page'].'_'.$this->paginate['Node']['limit'].'_paging';
//            $cacheConfig = 'nodes_promoted';
//            $nodes = Cache::read($cacheName, $cacheConfig);
//            if (!$nodes) {
//                $nodes = $this->paginate('Node');
//                Cache::write($cacheName, $nodes, $cacheConfig);
//                Cache::write($cacheNamePaging, $this->params['paging'], $cacheConfig);
//            } else {
//                $paging = Cache::read($cacheNamePaging, $cacheConfig);
//                $this->params['paging'] = $paging;
//                $this->helpers[] = 'Paginator';
//            }
//        } else {
//            $nodes = $this->paginate('Node');
//        }
//         
//       print_r($nodes[0]['Node']['id']);
//        
//        $this->set(compact('nodes','typess','typess1','typess2','typess3','typess4'));
   }

   // Additional functions By Digpal for browse End //  
   // Additional functions By Digpal for concierge Start // 

   public function concierge() {
      
   }

   // Additional functions By Digpal for concierge End //
   // Additional functions By Digpal for About Us Start // 

   public function about() {
      
   }

   // Additional functions By Digpal for About Us End //
   // Additional functions By Digpal for Contact Start // 

   public function contact() {
      
   }

   // Additional functions By Digpal for Contact End //
   // Additional functions By Digpal for Jobs Start // 

   public function jobs() {
      
   }

   // Additional functions By Digpal for Jobs End //
   // Additional functions By Digpal for Privacy Start // 

   public function privacy() {
      
   }

   // Additional functions By Digpal for Privacy End //
   // Additional functions By Digpal for Press Start // 

   public function press() {
      
   }

   // Additional functions By Digpal for Press End //
   // Additional functions By Digpal for Terms Start // 

   public function terms() {
      
   }

   // Additional functions By Digpal for Terms End //
   // Additional functions By Digpal for list_your_venues Start // 

   public function list_your_venues() {
      
   }

   // Additional functions By Digpal for list_your_venues End //
   // Additional functions By Digpal for list_your_venues Start // 

   public function parent() {
      
   }

   // Additional functions By Digpal for list_your_venues End //
}
