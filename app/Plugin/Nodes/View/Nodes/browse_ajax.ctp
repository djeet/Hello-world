<?php
if (count($nodes) == 0) {
   __('No items found.');
} else {
   foreach ($this->params['named'] as $nn => $nv) {
      $this->Paginator->options['url'][$nn] = $nv;
   }
}
?>
<div class="wrapper">
   <div class="body-content page-content padding-end">
      <div class=" left result-fetch darkblue-color">
         <?
         $venues_count = $count_results;
         if (!isset($pagenumsend)) {
            $start = 1;
            $limit = Configure::read('Reading.nodes_per_page');
         } else {
            $pagenumsend = '';
            $start = $_GET['pgLimit'] + 1;
            //  $starting = $limit_starting ;
            $limit = Configure::read('Reading.nodes_per_page');
         }

         if ($venues_count < $limit) {
            echo 'Showing ' . $venues_count . ' Results';
         } else {
            if (($startnum + $page_rows) > $venues_count) {
               $limit = $venues_count;
            } else {
               $limit = $startnum + $page_rows;
            }
            echo 'Showing ' . $startnum . ' - ' . $limit . ' of ' . $venues_count . ' Results';
         }
         ?>
         <input type="hidden" id="pgNumber" name="pgNumber" value="<?= $pagenumsend; ?>"/>
         <input type="hidden" id="pgLimit" name="pgLimit" value="1"/>
      </div>
      <div class="clear"></div>
      <div class="collection-row">
         <?php
         foreach ($nodes AS $key => $node) {
            $this->Layout->setNode($node);

            $title_name = $nodes[$key]['Node']['title'];
            $title_slug = $nodes[$key]['Node']['slug'];

            $venue_array = $pk->query("SELECT title,slug FROM nodes WHERE  parent_id = '" . $nodes[$key]['Node']['parent_id'] . "'");
            $venue_count = count($venue_array);

            $location_array = $pk->query("SELECT title FROM terms WHERE id IN (SELECT term_id FROM taxonomies WHERE id IN (SELECT taxonomy_id FROM nodes_taxonomies WHERE node_id =  '" . $nodes[$key]['Node']['id'] . "'  AND vocabulary_id = 5))");
            $location_count = count($location_array);

            $image = $pk->query("SELECT Nodeattachment.path FROM nodeattachments Nodeattachment WHERE Nodeattachment .`node_id` = '" . $nodes[$key]['Node']['id'] . "' AND Nodeattachment.`path` IS NOT NULL AND Nodeattachment.`status` = 1 GROUP BY Nodeattachment.`node_id`");
            ?>
            <div class="left single-collection" >
               <div class="single-collection-heading darkblue-color">
                  <?php
                  //     echo $this->Html->link($title_name, array('action' => 'view', $nodes[$key]['Node']['parent_id']));
                  echo $this->Html->link($title_name, array(
                      'admin' => false,
                      'controller' => 'nodes',
                      'action' => 'view',
                      'type' => $node['Node']['type'],
                      'slug' => $title_slug,
                  ));
                  ?>
               </div>
         <!--  <div class="single-collection-venues text-color"> <?php // echo $venue_count;                   ?> venues </div>-->
               <?php
               if (empty($image)) {
                  $ven_imag = 'coming_soon.jpg';
               } else {
                  $ven_imag = $image[0]['Nodeattachment']['path'];
               }
               ?>
               <hr color="#dddddd"/>
               <div class="single-collection-large-image"><?php echo $this->Html->image($ven_imag, array('alt' => '', 'class' => '', 'width' => '225', 'height' => '143', $nodes[$key]['Node']['id'])); ?></div>
               <div class="single-title-strip"><?php
            if ($location_count > 0) {
               $location1_array = array_pop($location_array);
               echo $location1_array['terms']['title'];
            }
               ?></div>
               <hr color="#dddddd"/>
               <div class="up-from-strip">
                  <div class="left up-to text-color">Up to <?php echo $nodes[$key]['Node']['Capacity_Available'] ?></div>
                  <div class="right from-strip text-color">From $<?php echo $nodes[$key]['Node']['Price'] ?></div>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <?
         }
         ?>
         <!--        <div class="left single-collection" >
                     <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                     <div class="single-collection-venues text-color"> 12 venues </div>
                     <hr color="#dddddd" />
                     <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));                                                                                                                     ?></div>
                    <div class="single-title-strip"> Docklands </div>
                     <hr color="#dddddd"/>
                     <div class="up-from-strip">
                     <div class="left up-to text-color"> Up to 350</div>
                     <div class="right from-strip text-color"> From $1000</div>
                     <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                   </div>
         -->

         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>

   <div class="container pagination" style="display: block;text-align:center;">
      <div class="pagination">
         <?php
         // echo $last;

         if ($pagenumsend == $last) {
            
         } else {
            ?>
            <div class="numbersk">
               <?
               for ($k = 0, $i = 1; $k < $count_results; $k++) {
                  if ($k % $page_rows == 0) {
                     ?>
                     <a data-pagenum="<? echo $i; ?>" 
                     <?
                     if ($i == $pageBrAjx - 1) {
                        echo 'class="selected"';
                        $m = $i;
                     }
                     ?>
                        val="<?= $i; ?>"> <? echo $i; ?></a>
                        <?
                        $i++;
                     }
                  }
                  if ($m != 1) {
                     $prev = $m - 1;
                  } else {
                     $prev = 1;
                  }
                 
                  if ($m != $i-1) {
                     $next = $m + 1; 
                  } else {
                     $next = $m;
                  }
                  ?>
               <span style="padding-right: 25px;">&nbsp;</span>
               <a data-pagenum="<? echo $prev; ?>" class="arrow" val="<? echo $prev; ?>">  <  </a>
               <a data-pagenum="<? echo $next; ?>" class="arrow" val="<? echo $next; ?>">  >  </a>
            </div>
            <?
         }
         ?>
         <script> $(document).ready(function(){
            alert($('.numbersk').child().length);
         })</script>

      </div>
   </div>
   <div class="clear"></div>
</div>