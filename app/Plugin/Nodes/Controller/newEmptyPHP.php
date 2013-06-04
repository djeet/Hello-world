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
         //print_r($node);
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
         
            $db = ConnectionManager::getDataSource('default');
      //budget , event_type , categories , attendees,facilities , foodndrinks , location , privacy , state , sort
print_r($node['Taxonomy']);
      $node_query = "SELECT Node.id,Node.parent_id,Node.title, Node.slug, Node.`type`, Node.`Capacity_Available`, Node.`Price` FROM nodes Node WHERE 
                     Node.`type` = 'node' AND 
                     Node.`parent_id` IS NOT NULL AND 
                     Node.`status` = 1 AND Node.`Price` <=5000 AND Node.`Seats_Available` >=60  ";
            
            foreach ($node['Taxonomy'] as $taxis) {

                              if ($taxis['Vocabulary']['title'] == 'Event') {

                                 //echo "<a href=\"" . $url . "\">Click Me</a>";
                                // echo "<li><a href=browse/" . $taxis['Term']['title'] . ">" . $taxis['Term']['title'] . "</a></li>";
                              $eventscollection[]=$taxis['Term']['id'];

                              }
                              if ($taxis['Vocabulary']['title'] == 'Venue Type') {

                                 //echo "<a href=\"" . $url . "\">Click Me</a>";
                                // echo "<li><a href=browse/" . $taxis['Term']['title'] . ">" . $taxis['Term']['title'] . "</a></li>";
                              $venuetypecollection[]=$taxis['Term']['id'];

                              }
//                              if ($taxis['Vocabulary']['title'] == 'Location') {
//
//                                 //echo "<a href=\"" . $url . "\">Click Me</a>";
//                                // echo "<li><a href=browse/" . $taxis['Term']['title'] . ">" . $taxis['Term']['title'] . "</a></li>";
//                              $locationcollection[]=$taxis['Term']['id'];
//
//                              }
                           }
                           $commevents = implode(',',$eventscollection);
                           $commvenuetype = implode(',',$venuetypecollection);
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
//            if (!empty($eventscollection)) {
//
//               $taxies['location'] = $commlocation;
//            }
                
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
           //print_r($collect_id);
            if (!empty($collect_id['categories'])) {
               $master_array = array_intersect($collect_id['categories'], $master_array);
            }
            if (!empty($collect_id['event_type'])) {
               $master_array = array_intersect($collect_id['event_type'], $master_array);
            }
//            if (!empty($collect_id['location'])) {
//               $master_array = array_intersect($collect_id['location'], $master_array);
//            }
            if (!empty($collect_id['categories']) || !empty($collect_id['event_type']) || !empty($collect_id['location']))
               if (!empty($master_array)) {
                  $node_query .= " AND  Node.id in (" . implode(',', $master_array) . ") ";
               } else {
                  $node_query .= " AND  Node.id in (0) ";
               }
               
               $nodesn = $db->fetchAll($node_query);
               print_r($nodesn);

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
      $this->set(compact('node', 'type', 'comments', 'child_array', 'child_meta', 'image_query', 'parent_array', 'child_parent_childs_array', 'dd_facilities'));
      $this->_viewFallback(array(
          'view_' . $node['Node']['id'],
          'view_' . $type['Type']['alias'],
      ));
   }