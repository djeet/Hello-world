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
//       'Security' => array(
//           'csrfUseOnce' => false
//       ),
   );

   /**
    * Used helpers
    *
    * @var array
    */
   public $helpers = array(
       'Js' => array('Jquery'),
       'Text',
       'Image',
       'Filemanager',
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
       'Nodes.Node', 'Nodes.Term', 'Nodes.Nodeattachment', 'Nodes.Taxonomy', 'Nodes.Meta',
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
      if ($this->request->is('ajax')) {
         $this->Security->validatePost = false;
         $this->Security->csrfCheck = false;
      }
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

      if (!empty($this->request->data)) { //print_r($this->request->data);exit;
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
    * Admin add meta
    *
    * @return void
    * @access public
    */
   public function admin_parent_get() {
      $this->set('title_for_layout', __('Nodes', true));
      $id = $_GET['id'];
      if ($id) {
// $nodes = $this->Node->query("SELECT parent_id FROM nodes WHERE id = '" . $id . "'");
//         if ($nodes[0]['nodes']['parent_id']) {
//            echo true;
//         } else {
//            echo false;
//         }
         echo true;
      } else {
         echo false;
      }
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
      $this->_search_for_venue();
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
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 60)));
      $dd_events = $this->Term->query("SELECT title,id,slug FROM `terms` where id in (SELECT term_id FROM `taxonomies` WHERE vocabulary_id =4)");
      //print_r($dd_events);
      $this->set(compact('nodes', 'dd_events'));
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
         $this->redirect('/search');
      }

      App::uses('Sanitize', 'Utility');
      $q = Sanitize::clean($this->request->params['named']['q']);
      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'Node.type' => 'blog',
          'AND' => array(
              array(
                  'OR' => array(
                      'Node.title LIKE' => '%' . $q . '%',
                  // 'Node.excerpt LIKE' => '%' . $q . '%',
                  // 'Node.body LIKE' => '%' . $q . '%',
                  // 'Node.terms LIKE' => '%"' . $q . '"%',
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
      $this->_search_for_venue();
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
         // print_r($node);
         if (!empty($node)) {
            $child_array = $this->Node->query("SELECT id,title,slug,excerpt,Capacity_Available,Price,Map FROM nodes WHERE  parent_id = '" . $node['Node']['id'] . "'");
            $image_query = $this->Nodeattachment->query("SELECT node_id,path FROM nodeattachments WHERE  node_id in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['id'] . "')");
            // App::uses('ConnectionManager', 'Model');
            $db = ConnectionManager::getDataSource('default');
            //$result  = $db->rawQuery($child_meta);
            $child_meta_query = "SELECT id,foreign_key,'key','value',value_x,used_by_meta FROM meta WHERE  foreign_key in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['id'] . "')";
            $child_meta = $db->fetchAll($child_meta_query);
            $parent_array = $this->Node->query("SELECT id,title,body,slug,excerpt,Capacity_Available,Price,Map FROM nodes WHERE  id = '" . $node['Node']['parent_id'] . "'");
            $child_parent_childs_array = $this->Node->query("SELECT a.id,a.title,a.slug,b.path FROM nodes a,nodeattachments b WHERE a.id in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['parent_id'] . "') and a.id =b.node_id group by a.id");
            if ($node['Node']['type'] == 'node' && $node['Node']['parent_id'] != '') {
               //$node_query = "SELECT * FROM nodes Node WHERE 
                    // Node.`type` = 'node' AND 
                    // Node.`parent_id` IS NOT NULL AND 
                    // Node.`status` = 1 AND Node.`Price` < '" . $node['Node']['Price'] . "' AND Node.`Seats_Available` > '" . $node['Node']['Seats_Available'] . "'  ";

//             $allPublishedAuthors = $this->Article->find('list', array(
//        'fields' => array('User.id', 'User.name'),
//        'conditions' => array('Article.status !=' => 'pending'),
//        'recursive' => 0
//    ));
             //$nodesn = $db->fetchAll($node_query);
              // print_r($nodesn);  
               
              
               

//print_r($node_querys);     

               foreach ($node['Taxonomy'] as $taxis) {
                  if ($taxis['Vocabulary']['title'] == 'Event') {
                     $eventscollection[] = $taxis['Term']['id'];
                  }
                  if ($taxis['Vocabulary']['title'] == 'Venue Type') {
                     $venuetypecollection[] = $taxis['Term']['id'];
                  }
               }
               $commevents = implode(',', $eventscollection);
               $commvenuetype = implode(',', $venuetypecollection);
               //$commlocation = implode(',',$locationcollection);
               // print_r($commevents);

               $taxies = array();
               $collect_id = array();
               $master_array = array();
               if (!empty($eventscollection)) {
                  $taxies['categories'] = $commevents;
               }
               if (!empty($eventscollection)) {
                  $taxies['event_type'] = $commvenuetype;
               }

               foreach ($taxies as $key => $taxies_value) {

                  $taxo_query1 = "SELECT node_id FROM nodes_taxonomies WHERE taxonomy_id in (" . $taxies_value . ")";
                  $taxo_ids = $db->fetchAll($taxo_query1);
                  foreach ($taxo_ids as $idvalue) {
                     $collect_id[$key][] = $idvalue['nodes_taxonomies']['node_id'];
                     $master_array[] = $idvalue['nodes_taxonomies']['node_id'];
                  }
                  if (empty($collect_id[$key])) {
                     $collect_id[$key][] = array();
                  }
               }
               //print_r($master_array);
               if (!empty($collect_id['categories'])) {
                  $master_array = array_intersect($collect_id['categories'], $master_array);
               }
               if (!empty($collect_id['event_type'])) {
                  $master_array = array_intersect($collect_id['event_type'], $master_array);
               }
//            if (!empty($collect_id['location'])) {
//               $master_array = array_intersect($collect_id['location'], $master_array);
//            }
               //if (!empty($collect_id['categories']) || !empty($collect_id['event_type']))
               
               
                $node_query = $this->Node->find('all', array(
             'conditions' => array(
                 'Node.type' => 'node',
                 'Node.parent_id !=' => 'NULL',
                  'Node.Price < ' => $node['Node']['Price'],
                  'Node.Seats_Available >' => $node['Node']['Seats_Available'],
                  'Node.status' => 1,
                   'Node.id' => $master_array
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
             
                 )); 
                
//                  if (!empty($master_array)) {
//                     $node_query .= " AND  Node.id in (" . implode(',', $master_array) . ") ";
//                  } else {
//                     $node_query .= " AND  Node.id in (0) ";
//                  }

              //$nodesn = $db->fetchAll($node_query);
             //print_r($node_query);
            }
         }
         //$image_query = $this->Nodeattachment->query("SELECT node_id,path FROM nodeattachments WHERE  node_id in (SELECT id FROM nodes WHERE  parent_id = '" . $node['Node']['parent_id'] . "')");
         //print_r($image_query);
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
      $this->set(compact('node', 'node_query', 'type', 'comments', 'child_array', 'child_meta', 'image_query', 'parent_array', 'child_parent_childs_array', 'dd_facilities'));
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

   protected function _search_for_venue() {
      $db = ConnectionManager::getDataSource('default');

      $venue_query = "SELECT id,title,slug,path FROM nodes WHERE  parent_id != '' and type = 'node' order by title ASC";
      $venues = $db->fetchAll($venue_query);
      $this->set('venue_data', $venues);

      $melbourne_query = "SELECT 'melbourne' AS state,b.title AS city ,b.slug FROM taxonomies a, terms b WHERE a.term_id = b.id AND a.parent_id IN (SELECT id FROM taxonomies WHERE  vocabulary_id = 5  AND parent_id = 58)";
      $melbourne_location = $db->fetchAll($melbourne_query);
      $this->set('melbourne_data', $melbourne_location);

      $sydney_query = "SELECT 'sydney' AS state,b.title AS city ,b.slug FROM taxonomies a, terms b WHERE a.term_id = b.id AND a.parent_id IN (SELECT id FROM taxonomies WHERE  vocabulary_id = 5  AND parent_id = 101)";
      $sydney_location = $db->fetchAll($sydney_query);
      $this->set('sydney_data', $sydney_location);

      $events_query = "SELECT b.title,b.slug FROM taxonomies a, terms b WHERE a.term_id = b.id AND a.vocabulary_id = 4 ORDER BY b.title";
      $events_entries = $db->fetchAll($events_query);
      $this->set('events_data', $events_entries);
   }

   protected function _get_locations($state_slug = 'melbourne') {
      $db = ConnectionManager::getDataSource('default');
      if (isset($_SESSION['area'])) {
         $state_slug = $_SESSION['area'];
      }
      $get_loc_id = array();
      $get_loc_id_query = "SELECT id FROM taxonomies WHERE term_id = (SELECT id FROM terms WHERE slug = '" . $state_slug . "')";
      $get_loc_id = $db->fetchAll($get_loc_id_query);

      if (!empty($get_loc_id)) {
         $state_id = $get_loc_id[0]['taxonomies']['id'];
         return $state_id;
      } else {
         $state_id = 58;
         return $state_id;
      }
   }

   protected function _child_locations2($state_id = NULL) {
      $db = ConnectionManager::getDataSource('default');
      $child_location_query = "SELECT id,title,slug FROM terms WHERE id IN (SELECT term_id FROM taxonomies WHERE parent_id IN ('" . $state_id . "'))";
      $child_locations = $db->fetchAll($child_location_query);
      return $child_locations;
   }

   protected function _child_locations($state_id = 58) {
      $db = ConnectionManager::getDataSource('default');
      $get_data = array();
      $location_query = "SELECT a.id, a.title, a.slug, b.id AS tax_id FROM terms a, taxonomies b WHERE a.id IN (SELECT term_id FROM taxonomies WHERE  vocabulary_id = 5  AND parent_id = '" . $state_id . "') AND a.id = b.term_id";
      $locations = $db->fetchAll($location_query);
      foreach ($locations as $lock_key => $loci) {
         $get_data[$loci['a']['title']] = $this->_child_locations2($loci['b']['tax_id']);
      }
      $this->set('locations_data', $get_data);
   }

   public function browse($typeAlias = NULL) {

      $db = ConnectionManager::getDataSource('default');
      $this->set('title_for_layout', __('Search', true));
      $state_id = $this->_get_locations();
      $this->_child_locations($state_id);
      $this->_search_for_venue();

      $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias('node');
      foreach ($type['Vocabulary'] as $vocabulary) {
         $vocabularyId = $vocabulary['id'];
         $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array('taxonomyId' => true));
      }
      $pk = $this->Node;
      $node_query = "SELECT Node.id,Node.parent_id,Node.title, Node.slug, Node.`type`, Node.`Capacity_Available`, Node.`Price` FROM nodes Node WHERE 
            Node.`type` = 'node' AND 
            Node.`parent_id` IS NOT NULL AND 
            Node.`status` = 1
            ";
      $count_array = $db->fetchAll($node_query);
      $count_results = count($count_array);
      $page_rows = Configure::read('Reading.nodes_per_page');
      if (isset($page_rows)) {
         $node_query .= 'limit 0,' . $page_rows;
      }
      //  echo $node_query;
      $nodes = $db->fetchAll($node_query);
      $pagenumsend = 1;
      $this->set(compact('nodes', 'venues', 'pk', 'taxonomy', 'pagenumsend', 'count_results', 'last', 'startnum', 'page_rows'));
   }

   // Additional functions By Digpal for browse End //  
   // browse ajax search

   public function browse_ajax($typeAlias = NULL) {

      $db = ConnectionManager::getDataSource('default');
      //budget , event_type , categories , attendees,facilities , foodndrinks , location , privacy , state , sort

      $node_query = "SELECT Node.id,Node.parent_id,Node.title, Node.slug, Node.`type`, Node.`Capacity_Available`, Node.`Price` FROM nodes Node WHERE 
                     Node.`type` = 'node' AND 
                     Node.`parent_id` IS NOT NULL AND 
                     Node.`status` = 1 
                     ";

      if ($_GET['q'] != 2) {
//         if ($_GET['categories'] || $_GET['event_type']) {

         $taxies = array();
         $collect_id = array();
         $master_array = array();
         if (!empty($_GET['categories'])) {
            $taxies['categories'] = $_GET['categories'];
         }
         if (!empty($_GET['event_type'])) {
            $taxies['event_type'] = $_GET['event_type'];
         }

         if (!empty($_GET['location'])) {
            $taxies['location'] = $_GET['location'];
         } else {
            if (!empty($_GET['state'])) {
               if ($_GET['state'] == 'melbourne') {
                  $state = 58;
         }
               if ($_GET['state'] == 'sydney') {
                  $state = 101;
               }
               $taxies['location'] = $state;
            }
         }
         if (!empty($_GET['facilities'])) {
            $taxies['facilities'] = $_GET['facilities'];
         }
         if (!empty($_GET['privacy'])) {
            $taxies['privacy'] = $_GET['privacy'];
         }
         if (!empty($_GET['foodndrinks'])) {
            $taxies['foodndrinks'] = $_GET['foodndrinks'];
         }


         foreach ($taxies as $key => $taxies_value) {
            $taxo_query1 = "SELECT node_id FROM nodes_taxonomies WHERE taxonomy_id in (" . $taxies_value . ")";
            $taxo_ids = $db->fetchAll($taxo_query1);
            foreach ($taxo_ids as $idvalue) {
               $collect_id[$key][] = $idvalue['nodes_taxonomies']['node_id'];
               $master_array[] = $idvalue['nodes_taxonomies']['node_id'];
            }
            if (empty($collect_id[$key])) {
               $collect_id[$key][] = array();
            }
         }


         if (!empty($collect_id['categories'])) {
            $master_array = array_intersect($collect_id['categories'], $master_array);
         }
         if (!empty($collect_id['event_type'])) {
            $master_array = array_intersect($collect_id['event_type'], $master_array);
         }
         if (!empty($collect_id['location'])) {
            $master_array = array_intersect($collect_id['location'], $master_array);
         }
         if (!empty($collect_id['facilities'])) {
            $master_array = array_intersect($collect_id['facilities'], $master_array);
         }
         if (!empty($collect_id['privacy'])) {
            $master_array = array_intersect($collect_id['privacy'], $master_array);
         }
         if (!empty($collect_id['foodndrinks'])) {
            $master_array = array_intersect($collect_id['foodndrinks'], $master_array);
         }

         if (!empty($collect_id['categories']) || !empty($collect_id['event_type']) || !empty($collect_id['location'])
                 || !empty($collect_id['facilities']) || !empty($collect_id['privacy']) || !empty($collect_id['foodndrinks'])) {
            if (!empty($master_array)) {
               $node_query .= " AND  Node.id in (" . implode(',', $master_array) . ") ";
            } else {
               $node_query .= " AND  Node.id in (0) ";
            }
         }
         if ($_GET['budget']) {
            if (!empty($_GET['budget'])) {
               $price = $_GET['budget'];
            } else {
               $price = '10000';
            }
            $node_query .= " AND  Node.Price <= " . $price . " ";
         }
         if ($_GET['attendees']) {
            if (!empty($_GET['attendees'])) {
               $Capacity_Available = $_GET['attendees'];
            } else {
               $Capacity_Available = '100';
            }
            $node_query .= " AND  Node.Capacity_Available <= " . $Capacity_Available . " ";
         }

         if ($_GET['sort'] && !empty($_GET['sort']) && $_GET['sort'] != 1) {
            $sort = $_GET['sort'];

            if ($sort == 2) {
               $sort = ' Node.Price ASC ';
            } else if ($sort == 3) {
               $sort = ' Node.Price DESC ';
            } else if ($sort == 4) {
               $sort = ' Node.Capacity_Available ASC ';
            } else if ($sort == 5) {
               $sort = ' Node.Capacity_Available DESC ';
            } else {
               $sort = ' Node.id DESC ';
            }

            $node_query .= " order by " . $sort . " ";
         }

         $pagenum = $_GET['page'];

         if (!(isset($pagenum))) {
            $pagenum = 1;
         }

         $count_array = $db->fetchAll($node_query);
         $count_results = count($count_array);

         $page_rows = Configure::read('Reading.nodes_per_page');

         $last = ceil($count_results / $page_rows);
         $pagenumsend = $pagenum + 1;
         if ($pagenum < 1) {
            $pagenum = 1;
         } elseif ($pagenum > $last) {
            $pagenum = $last;
            $pagenumsend = $last;
         }


         if ($_GET['page']) {
            $startnum = ($pagenum - 1) * $page_rows;
            if ($startnum < 0) {
               $startnum = 0;
            }
            $node_query .= "limit " . $startnum . "," . $page_rows;
         }
      }
      // echo $pagenumsend;
      $pageBrAjx = $pagenumsend;
      $nodes = $db->fetchAll($node_query);
      $pk = $this->Node;

      $this->set(compact('nodes', 'venues', 'pk', 'taxonomy', 'pagenumsend', 'last', 'startnum', 'page_rows', 'count_results', 'pageBrAjx'));
   }

   // browse ajax search end
   //location page

   public function location($typeAlias = NULL) {
      $idss = $_GET['a'];
      $db = ConnectionManager::getDataSource('default');

      $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias('node');
      foreach ($type['Vocabulary'] as $vocabulary) {
         $vocabularyId = $vocabulary['id'];
         $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array('taxonomyId' => true));
      }

      $vocabulary = $this->Term->Vocabulary->findById($vocabularyId);
      $termsTree = $this->Term->Taxonomy->getTree($vocabulary['Vocabulary']['alias'], array(
          'key' => 'id',
          'value' => 'title',
              ));
      $terms = $this->Term->find('all', array(
          'conditions' => array(
              'Term.id' => array_keys($termsTree),
              'Term.slug' => $idss,
          ),
              ));

      $parent_location_query = "SELECT parent_id FROM taxonomies WHERE id IN (SELECT a.parent_id FROM terms b , taxonomies a WHERE b.slug = '" . $idss . "' AND b.id = a.term_id)";
      $parent_location = $db->fetchAll($parent_location_query);

      $node_query = "SELECT Node.id,Node.parent_id,Node.title, Node.slug, Node.`type`, Node.`Capacity_Available`, Node.`Price` FROM nodes Node WHERE 
                     Node.`type` = 'node' AND 
                     Node.`parent_id` IS NOT NULL AND 
                     Node.`status` = 1 
                     ";

      $taxo_query1 = "SELECT node_id FROM nodes_taxonomies WHERE taxonomy_id IN (SELECT a.id FROM terms b , taxonomies a WHERE b.slug = '" . $idss . "' AND b.id = a.term_id)";
         $taxo_ids = $db->fetchAll($taxo_query1);
         foreach ($taxo_ids as $idvalue) {
            $master_array[] = $idvalue['nodes_taxonomies']['node_id'];
         }

      if (!empty($master_array)) {
         $node_query .= " AND  Node.id in (" . implode(',', $master_array) . ") ";
      } else {
         $node_query .= " AND  Node.id in (0) ";
      }

      $pk = $this->Node;

      $nodes = $db->fetchAll($node_query);
      $this->set(compact('terms', 'nodes', 'pk', 'parent_location'));
   }

// location page by pk
// Additional functions By Digpal for concierge Start // 

   public function form() {
      $this->set('title_for_layout', __('Edit Message'));

      if (!empty($this->request->data)) {
         if ($this->Message->save($this->request->data)) {
            $this->Session->setFlash(__('The Message has been saved'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'form'));
         } else {
            $this->Session->setFlash(__('The Message could not be saved. Please, try again.'), 'default', array('class' => 'error'));
         }
      }

      if (empty($this->request->data)) {
         $this->request->data = $this->Message->read(null);
      }
   }

   public function concierge() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 28)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for concierge End //
   // Additional functions By Digpal for About Us Start // 

   public function about() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 2)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for About Us End //
   // Additional functions By Digpal for Contact Start // 



   public function contact() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 11)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for Contact End //
   // Additional functions By Digpal for Jobs Start // 

   public function jobs() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 8)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for Jobs End //
   // Additional functions By Digpal for Privacy Start // 

   public function privacy() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 10)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for Privacy End //
   // Additional functions By Digpal for Press Start // 

   public function press() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 9)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for Press End //
   // Additional functions By Digpal for Terms Start // 

   public function terms() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 24)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for Terms End //
   // Additional functions By Digpal for list_your_venues Start // 
   public function list_your_venues() {
      $this->set('title_for_layout', __('Nodes', true));
      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 27)));
      $this->set('nodes', $nodes);
   }

   // Additional functions By Digpal for list_your_venues End //
   // Additional functions By Digpal for list_your_venues Start // 



   public function parent() {
      
   }

   public function blog() {
      $this->set('title_for_layout', __('Nodes'));

      $this->paginate['Node']['order'] = 'Node.created DESC';
      $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
      $this->paginate['Node']['conditions'] = array(
          'Node.status' => 1,
          'Node.promote' => 1,
          'Node.type' => 'blog',
//			'OR' => array(
//				'Node.visibility_roles' => '',
//				'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
//			),
      );


      if (isset($this->request->params['named']['type'])) { //print_r($type['Type']['alias']);exit;
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
         // print_r($type);
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
      //print_r($nodes);
      $this->set(compact('nodes'));
   }

   public function blogdetail() {
      $this->set('title_for_layout', __('Nodes', true));
//      $nodes = $this->Node->find('first', array('conditions' => array('Node.id' => 2)));
//      $this->set('nodes', $nodes);
   }

   public function admin_logo() {
      $this->set('title_for_layout', __('Add Attachment'));
      $postns = $this->Post->findById(26);
      if ($this->request->is('post') || !empty($this->request->data)) {
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
         // $newFileName = $newFileNames;
         //$newFileNames = 'logo.jpg';
         //$this->request->data['Node']['title'] = $fileTitle;
         $this->request->data['Post']['slug'] = $newFileName;
         $this->request->data['Post']['mime_type'] = $file['type'];
         //$this->request->data['Node']['guid'] = Router::url('/' . $this->uploadsDir . '/' . $newFileName, true);
         $this->request->data['Post']['path'] = '/' . $this->uploadsDir . '/' . $fileTitle;
         // move the file
         $moved = move_uploaded_file($file['tmp_name'], $destination);
         $postn = $this->Post->find('all');
         $this->Post->create();
      }
      // $this->set(compact('postns'));
   }

   public $uploadsDir = 'uploads';

   public function admin_image_upload() {

      $file = $this->request->data['Node']['file'];
//      print_r($this->request);
//      echo 'yes' ; exit;
      $destination = WWW_ROOT . $this->uploadsDir . DS . $file['name'];


      $allowedExtensions = explode(', ', Configure::read('Nodeattachment.allowedFileTypes'));
      $sizeLimit = Configure::read('Nodeattachment.maxFileSize') * 1024 * 1024;
      App::import('Vendor', 'Nodeattachment.fileuploader');
      $Uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

      $result = $Uploader->handleUpload($this->uploads_path . DS);
      $uploadedFile = $Uploader->getFilename();
//      print_r($this->uploads_path);
      if ($uploadedFile != false) {

         $fileName = Inflector::slug($uploadedFile['filename']);
         $fileName .= '.' . $uploadedFile['ext'];
         $fileName = $this->__uniqeSlugableFilename($fileName);

         $uploadPath = $this->uploads_path . DS .
                 $uploadedFile['filename'] . '.' . $uploadedFile['ext'];
         $newPath = $this->uploads_path . DS . $fileName;
         rename($uploadPath, $newPath);

         $data = array(
             'node_id' => $parentNodeId,
             'slug' => $fileName,
             'path' => '/' . $this->uploads_dir . '/' . $fileName,
             'title' => $fileName,
             'status' => 1,
             'mime_type' =>
             $this->__getMime($newPath)
         );
      }

      if ($this->request->is('post') || !empty($this->request->data)) {

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
         // $newFileName = $newFileNames;
         //$newFileNames = 'logo.jpg';
         //$this->request->data['Node']['title'] = $fileTitle;
         $this->request->data['Post']['slug'] = $newFileName;
         $this->request->data['Post']['mime_type'] = $file['type'];
         //$this->request->data['Node']['guid'] = Router::url('/' . $this->uploadsDir . '/' . $newFileName, true);
         $this->request->data['Post']['path'] = '/' . $this->uploadsDir . '/' . $fileTitle;
         // move the file
         $moved = move_uploaded_file($file['tmp_name'], $destination);
         $postn = $this->Post->find('all');
         $this->Post->create();
      } else {
         echo 'no';
      }
      // $this->set(compact('postns'));
   }

   function admin_ajax_state() {
      $db = ConnectionManager::getDataSource('default');
      $state = $_GET['state'];
      $action_id = $_GET['id'];
      if ($action_id != 'areaId') {
         $state_query = "SELECT a.id,b.title FROM terms b , taxonomies a WHERE b.id IN (SELECT term_id FROM taxonomies WHERE parent_id IN ('" . $state . "')) AND b.id = a.term_id"; // SELECT id,title FROM terms WHERE id IN (SELECT term_id FROM taxonomies WHERE parent_id IN ('" . $state . "'))";
      } else {
         // $state_query = "SELECT id,title FROM terms WHERE id IN (SELECT term_id FROM taxonomies WHERE parent_id IN (SELECT id FROM taxonomies WHERE term_id = '" . $state . "'))";
         $state_query = "SELECT a.id,b.id,b.title FROM terms b , taxonomies a WHERE b.id IN (SELECT term_id FROM taxonomies WHERE parent_id IN ('" . $state . "')) AND b.id = a.term_id";
      }
      $state_array = $db->fetchAll($state_query);
      // echo $state_query ;
      $this->set(compact('state_array', 'action_id'));
   }

   // Additional functions By Digpal for list_your_venues End //
}
