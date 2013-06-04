<?php
if (count($nodes) == 0) {
   __('No items found.');
} else {
   foreach ($this->params['named'] as $nn => $nv) {
      $this->Paginator->options['url'][$nn] = $nv;
   }
}
?>

<div class="paging"><?php //echo $paginator->numbers();                                                                                                                                   ?></div>
</div>

<div class="fullWidth blueBg ">
   <div class="wrapper">
      <div id="browse-menu-div" class="left browse-refine-result">
         <div class="browse-refine-heading whiteC"> Refine your results </div>
         <div class="browse-refine-shorttext whiteC">
            <p>Provide some details about your event then view your results below. </p>
         </div>
         <div class="search-elements inner-shadow-border">
            <style>
               .loading {
                  background-color: #ECECEC;
                  color: #575757;
                  padding: 25px;
                  text-align: center;
               }
               .popdown.menu {
                  height: 150px;
                  margin-left: -75px;
                  width: 194px;
               }
            </style>

            <script>
               $(document).ready(function(){  
                //  $('.loading').hide();
                  
               })      
            </script>

            <div style="padding: 0 23px;">
               <input type="hidden" id="router_url" name="route" value="<?php echo Router::url(array('controller' => 'nodes', 'action' => 'browse_ajax')); ?>" />
               <h5 class="whiteC search-name" style="float:left; ">Events: <? // print_r($_GET);                                                                ?></h5>
               <div class="inner-shadow-border rightFloat"> 
                  <a class="button white clicky text-left" rel="event"> 
                     <i class="icon-chevron-down right">&nbsp;</i> 
                     <span id="event-value" data-value="" class="default-value">Select Event</span> 
                  </a>
                  <div class="event popdown hidden">
                     <div class="arrow-border"></div>
                     <div class="arrow"></div>
                     <div style="height:115px;overflow:auto" class="jquery-hyperlinks line-height-sort-strip">
                        <?php
                        $dd_events = $taxonomy[4]; //print_r($dd_events);
                        foreach ($dd_events AS $dd_events_key => $typ) {
                           ?>
                           <a class="dd_events" get_id ="<?php echo $dd_events_key; ?>" data-value="<? echo $dd_events_key; //strtolower(str_replace(' ', '-', $typ))                                              ?>"  ><?php echo $typ ?></a><br>    
                        <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear-10"></div>

            <div style=" height:2px; background: #024E81;">&nbsp;</div>
            <div class="clear-10"></div>
            <div style="padding: 0 23px;">
               <h5 class="whiteC search-name" style="float:left; ">Attendees:</h5>
               <div class="inner-shadow-border dimension rightFloat">
                  <input id="txtAttendees" class="text-center darkblue-color" type="number" value=""  placeholder="Enter number only" min="1"/>
               </div>
               <div class="clear"></div>
            </div>

            <div class="clear-10"></div>
            <div style=" height:2px; background: #024E81;">&nbsp;</div>
            <div class="clear-10"></div>
            <div style="padding: 0 23px;">
               <h5 class="whiteC search-name" style="float:left; ">Budget:</h5>
               <div class="inner-shadow-border dimension rightFloat"> <a class="button white clicky text-left" rel="budget"> <i class="right icon-chevron-down"></i> <span id="budget" class="default-value" data-value="5000">Up to $5,000</span> </a>
                  <div class="budget popdown hidden">
                     <div class="arrow-border"></div>
                     <div class="arrow"></div>
                     <div style="height:115px;overflow:auto" class="line-height-sort-strip">
                        <a class="dd_price" data-value="100">Up to $100</a> <br/>
                        <a class="dd_price" data-value="500">Up to $500</a> <br/>
                        <a class="dd_price" data-value="1000">Up to $1,000</a> <br/>
                        <a class="dd_price" data-value="2000">Up to $2,000</a> <br/>
                        <a class="dd_price" data-value="5000">Up to $5,000</a> <br/>
                        <a class="dd_price" data-value="10000">Up to $10,000</a> <br/>
                        <a class="dd_price" data-value="20000">Up to $20,000</a> <br/>
                        <a class="dd_price" data-value="50000">Up to $50,000</a> <br/>  
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="right browse-categories">
         <div class="col eight last">
            <div id="refine" class="inner-shadow-border" style="margin-top:30px">
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="4">
                     <div class="circle-outer">
                        <div class="circle-inner bar"></div>
                     </div>
                     Bar </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="5">
                     <div class="circle-outer">
                        <div class="circle-inner restaurant"></div>
                     </div>
                     Restaurant </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="6">
                     <div class="circle-outer">
                        <div class="circle-inner conference"></div>
                     </div>
                     Conference </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="7">
                     <div class="circle-outer">
                        <div class="circle-inner pub"></div>
                     </div>
                     Pub </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="8">
                     <div class="circle-outer">
                        <div class="circle-inner reception"></div>
                     </div>
                     Reception </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="9">
                     <div class="circle-outer">
                        <div class="circle-inner activities"></div>
                     </div>
                     Activities </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="10">
                     <div class="circle-outer">
                        <div class="circle-inner outdoor"></div>
                     </div>
                     Outdoor </a> 
               </div>
               <div class="box"> <a class="dd_venue" href="javascript:void(0)" data-value="11">
                     <div class="circle-outer">
                        <div class="circle-inner other"></div>
                     </div>
                     Other </a> </div>
               <div style="clear:both;height:1px"></div>
            </div>
            <!--/inner shadow --> 
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>


</div>
<div class="clear"></div>
<div class="fullWidth orange-top-bottom-border">
   <div class="wrapper">
      <div class="container options2">
         <div class="row">
            <div class="col three sorting-strip"> <a class="button-blue-color clicky" rel="sort" style="width:220px;"><i class="icon-chevron-down right"></i>Sort: <span id="sort-value" data-value="1">Recommendations</span></a>
               <div class="sort popdown hidden">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <a class="dd_price_sorting"  data-value="1">Recommendations</a> <br/>
                  <hr color="#dddddd"/>
                  <a class="dd_price_sorting"  data-value="2">Price - Low to High</a> <br/>
                  <a class="dd_price_sorting"  data-value="3">Price - High to Low</a> <br/>
                  <hr color="#dddddd"/>
                  <a class="dd_price_sorting"  data-value="4">Capacity - Low to High</a> <br/>
                  <a class="dd_price_sorting"  data-value="5">Capacity - High to Low</a> <br/>
               </div>
            </div>
            <div class="col one"> &nbsp; </div><?
                        $dd_location = $taxonomy[5];

                        //  print_r($locations_data);
                        ?>
            <div class="col two"> <a class="button-blue-color clicky" rel="loc">Location <i class="icon-chevron-down right"></i></a>
               <div class="loc popdown hidden">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <div class="scroll-1" style="padding-bottom: 7px;">
                     <div class="scroll line-height-sort-strip">

                        <?
                        foreach ($locations_data as $locs_key => $locs_value) {
                           ?>
                           <input name="<?= strtolower(str_replace(" ", "-", $locs_key)) ?>" class="locs_city select-all" value="0" data-value="<?= strtolower(str_replace(" ", "-", $locs_key)) ?>" style="margin-top:3px;float:left" type="checkbox"/>
                           <label for="<?= strtolower(str_replace(" ", "-", $locs_key)) ?>" style="color:#025d9a;"><?= $locs_key ?></label>

                           <div class="<?= str_replace(" ", "-", strtolower($locs_key)) ?> text-color" style="border-top:1px solid #ccc; ">
                              <? foreach ($locs_value as $locs_as_key => $locs_as_value) { ?>
                                 <label for="<?= strtolower($locs_as_value['terms']['slug']) ?>">
                                    <input name="<?= strtolower($locs_as_value['terms']['slug']) ?>" class="locs_region" value="<?= strtolower($locs_as_value['terms']['id']) ?>" style="margin-top:3px;float:left" type="checkbox"/>
                                    <?= $locs_as_value['terms']['title']; ?>
                                 </label>
                              <? } ?>
                           </div>
                           <div class="clear"></div>
                           <br/>
                        <? } ?>


                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
            <div class="col two"> <a class="button-blue-color clicky" rel="fac">Facilities <i class="icon-chevron-down right"></i></a>
               <div class="fac popdown hidden">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <div class="scroll text-color">
                     <div class="facilities_t9 scroll-2">

                        <?php
                        $dd_facilities = $taxonomy[9];

                        $start = 1;
                        $firstend = intval(count($dd_facilities) / 2);
                        $last = count($dd_facilities) - $firstend;
                        ?> 

                        <?
                        foreach ($dd_facilities AS $facilities_key => $typ) {
                           if ($start == 1) {
                              echo '<div class="fac1 line-height-sort-strip" style="float: left; ">';
                           }
                           ?>
                           <input value="<? echo $facilities_key; ?>" type="checkbox" class="dd_facilities mr"/><?php echo $typ ?><br> 
                           <?php
                           if ($start == $firstend) {
                              echo '</div><div class="fac2 line-height-sort-strip" style="float: left; ">';
                           }

                           if ($start == count($dd_facilities)) {
                              echo '</div>';
                           }
                           $start++;
                        }
                        ?>


                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
            <div class="col two"> <a class="button-blue-color clicky" rel="priv">Privacy <i class="icon-chevron-down right"></i></a>
               <div class="priv popdown hidden text-color ">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>

                  <?php
                  $dd_privacy = $taxonomy[6];
                  foreach ($dd_privacy AS $privacy_key => $typ1) { //
                     ?>
                     <input name="dd_privacy[]" value="<? echo $privacy_key; ?>" type="checkbox" class="dd_privacy mr"/><?php echo $typ1 ?><br>    
                     <?php
                  }
                  ?>


               </div>
            </div>
            <div class="col two last"> <a class="button-blue-color clicky" rel="menu" >Food &amp; Drinks <i class="icon-chevron-down right"></i></a>
               <div class="menu popdown hidden" style=" width: 250px !important;">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <div class="text-center backgrnd-menu">
                     <input type="checkbox" class="mr" value="12"/>
                     Not Required </div>
                  <hr color="#dddddd">
                  <div class="scroll text-color line-height-sort-strip">
                     <div class="left">
                        <p class="h orange text-center"> Food </p>
                        <?php
                        $dd_food = $taxonomy[7];
                        foreach ($dd_food AS $food_key => $typ3) {
                           ?>
                           <input name="dd_food[]" value="<? echo $food_key; ?>" type="checkbox" class="dd_food mr"/><?php echo $typ3 ?><br/>    
                           <?php
                        }
                        ?>
                     </div>
                     <div class="right">
                        <p class="h orange text-center"> Drinks </p>
                        <?php
                        $dd_drinks = $taxonomy[8];
                        foreach ($dd_drinks AS $drinks_key => $typ4) {
                           ?>
                           <input name="dd_drinks[]" value="<? echo $drinks_key; ?>" type="checkbox" class="dd_drinks mr"/>
                           <?php echo $typ4 ?><br/>    
                           <?php
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/.row --> 
      </div>
   </div>
   <?php
   if (count($nodes) == 0) {
      __('No items found.');
   } else {
      foreach ($this->params['named'] AS $nn => $nv) {
         $paginator->options['url'][$nn] = $nv;
      }
   }
   ?>
   <div class="clear"></div>
</div>
<div class="loading">
   <img src="http://venuemob.com.au/assets/img/loading.gif">
   <br>
   Loading...
</div>
<? //print_r($nodes);  ?>
<div class="fullWidth" id="collect_ajax_source" style="background-color: #ececec"> <!-- Page Content Full Width(Collections)-->
   <div class="wrapper">
      <div class="body-content page-content padding-end">
         <div class=" left result-fetch darkblue-color">
            <?
            $venues_count = $count_results;
            // $total_count = $count_results;
            $start = 0;
            $limit = count($nodes);
            if ($venues_count < $limit) {
               echo 'Showing ' . $venues_count . ' Results';
            } else {         // if($limit < $venues_count){ $limit = $venues_count; }
               echo 'Showing ' . $start . ' - ' . $limit . ' of ' . $venues_count . ' Results';
            }
            ?>
            <input type="hidden" id="pgNumber" name="pgNumber" value="<?= $pagenumsend + 1; ?>" />
            <input type="hidden" id="pgLimit" name="pgLimit" value="<? echo Configure::read('Reading.nodes_per_page'); ?>" />
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
                         'action' => 'view_list',
                         'type' => $node['Node']['type'],
                         'slug' => $title_slug,
                     ));
                     ?>
                  </div>

                                                                                                                                                                               <!--                        <div class="single-collection-venues text-color"> <?php // echo $venue_count;                                                           ?> venues </div>-->
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
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));                                                                                                                                   ?></div>
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
      <div class="clear"></div>
   </div>


   <div class="container pagination" style="display: block;text-align:center;">
      <div class="pagination">
         <?php
         if ($pagenumsend == 1) {
            
         } else {
            echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1'> <<-First</a> ";
            echo " ";
            $previous = $pagenumsend - 1;
            echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> <-Previous</a> ";
         }


         if ($pagenumsend == $last) {
            
         } else { //echo 'yahoo' ;
            $next = $pagenumsend + 1;
//            echo '<div class="numbers">' ;
//            echo " <a data-pagenum='1' style='cursor:pointer;' >Next -></a> ";
//            echo " ";
//            echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>Last ->></a> ";
//            echo '</div>' ;
            ?>

            <div class="numbersk">
               <?
               for ($k = 0, $i = 1; $k < $count_results; $k++) {
                  if ($k % $page_rows == 0) {
                     ?>
                     <a data-pagenum="<? echo $i; ?>" 
                     <? if ($i == $pagenumsend) {
                        echo 'class="selected"';
                        $m = $i;
                     } ?>
                        val="<?= $pagenumsend + $i - 1; ?>"> <? echo $i; ?></a>
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
      </div>
   </div>

   <div class="clear"></div>
</div>


<div class="clear"></div>
<div class="clear"></div>
<!--	<div class="paging"><?php //echo $this->Paginator->numbers();                                                                                                                                   ?></div>-->

<script type="text/javascript">
   $(document).ready(function(){
      $('.loading').hide();  
   })
   event_type = "birthday-party";
   mixpanel.track("Land on browse page");
</script>
<div class="topgradient"></div>
<!--<script src="js/jquery.js" type="text/javascript"></script> -->
<!--<script src="js/options.js" type="text/javascript"></script> 
<script src="js/browse.js" type="text/javascript"></script>-->
<?php
echo $this->Html->script(array(
    'front_js/options.js',
    'front_js/browse.js',
        //'jquery/supersubs',
        //'theme',
));
?>
<?php
//echo $this->element('front/header');   ?>