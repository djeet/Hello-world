<?php
class SlugRoute extends CakeRoute {
 
    function parse($url) {
        $params = parent::parse($url);
        if (empty($params)) {
            return false;
        }
         App::import('Model', 'Node');
        $node = new Node();
        $count = $node->find('count', array(
            'conditions' => array('Node.slug LIKE ?' => $params['slug'] .'%'),
            'recursive' => -1
        ));
        if ($count) {
            return $params;
        }
        return false;
    }
 
}
?>