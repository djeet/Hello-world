
<?php
if (count($nodes) == 0) {
   __('No items found.');
} else {
   foreach ($this->params['named'] as $nn => $nv) {
      $this->Paginator->options['url'][$nn] = $nv;
   }
}
?>



<div class="paging"><?php //echo $paginator->numbers();       ?></div>
</div>

<?php ?>
<div class="fullWidth blueBg ">
   <div class="wrapper">
      <div id="browse-menu-div" class="left browse-refine-result">
         <div class="browse-refine-heading whiteC"> Refine your results </div>
         <div class="browse-refine-shorttext whiteC">
            <p>Provide some details about your event then view your results below. </p>
         </div>
         <div class="search-elements inner-shadow-border">
            <div style="padding: 0 23px;">
               <h5 class="whiteC search-name" style="float:left; ">Events:</h5>
               <div class="inner-shadow-border rightFloat"> <a class="button white clicky text-left" rel="event"> <i class="icon-chevron-down right">&nbsp;</i> <span id="event-value" data-value="birthday-party" class="default-value">Birthday Party</span> </a>
                  <div class="event popdown hidden">
                     <div class="arrow-border"></div>
                     <div class="arrow"></div>
                     <div style="height:115px;overflow:auto" class="jquery-hyperlinks line-height-sort-strip">

                        <!--               <a href="javascript:void(0)" data-value="birthday-party">Birthday Party</a>
                                        <a href="javascript:void(0)" data-value="corporate-function">Corporate Function</a><br/>
                                        <a href="javascript:void(0)" data-value="reception">Reception</a><br/>
                                        <a href="javascript:void(0)" data-value="after-work-drinks">After Work Drinks</a><br/>
                                        <a href="javascript:void(0)" data-value="product-launch">Product Launch</a><br/>
                                        <a href="javascript:void(0)" data-value="christmas-function">Christmas Function</a><br/>
                                        <a href="javascript:void(0)" data-value="engagement-party">Engagement Party</a><br/>
                                        <a href="javascript:void(0)" data-value="hens-night">Hens Night</a><br/>
                                        <a href="javascript:void(0)" data-value="bucks-night">Bucks Night</a><br/>
                                        <a href="javascript:void(0)" data-value="meetup-event">Meetup Event</a><br/>
                                        <a href="javascript:void(0)" data-value="charity-event">Charity Event</a><br/>
                                        <a href="javascript:void(0)" data-value="other">Other</a>--> 
                        <?php
                        foreach ($dd_events AS $typ) {
                           ?>
                           <a href="javascript:void(0)" data-value="birthday-party"><?php echo $typ['terms']['title'] ?></a><br>    
                           <!--                       <li> 
                                                     <input <?php //if(count(@$this->data['TaskCategory']['catList'])>0){ foreach($this->data['TaskCategory']['catList'] as $key=>$valCat){  if($valCat==$value['Category']['id']){ echo ' checked="yes"'; }    } }        ?>  type="checkbox" class="tooltip" name="data[TaskCategory][catList][]" value="<?php //echo $value['Category']['id']       ?>" /><?php //echo $value['Category']['name']       ?>
                                                  
                                                  </li>-->


                           <?php
                        }
                        ?>

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
                  <input id="txtAttendees" class="text-center darkblue-color" type="text"  placeholder="Please Enter" min="1"/>
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
                        <a data-value="100">Up to $100</a> <br/>
                        <a data-value="500">Up to $500</a> <br/>
                        <a data-value="1000">Up to $1,000</a> <br/>
                        <a data-value="2000">Up to $2,000</a> <br/>
                        <a data-value="5000">Up to $5,000</a> <br/>
                        <a data-value="10000">Up to $10,000</a> <br/>
                        <a data-value="20000">Up to $20,000</a> <br/>
                        <a data-value="50000">Up to $50,000</a> <br/>  

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
               <div class="box"> <a href="javascript:void(0)" data-value="1">
                     <div class="circle-outer">
                        <div class="circle-inner bar"></div>
                     </div>
                     Bar</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="2">
                     <div class="circle-outer">
                        <div class="circle-inner restaurant"></div>
                     </div>
                     Restaurant</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="3">
                     <div class="circle-outer">
                        <div class="circle-inner conference"></div>
                     </div>
                     Conference</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="4">
                     <div class="circle-outer">
                        <div class="circle-inner pub"></div>
                     </div>
                     Pub</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="5">
                     <div class="circle-outer">
                        <div class="circle-inner reception"></div>
                     </div>
                     Reception</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="6">
                     <div class="circle-outer">
                        <div class="circle-inner activities"></div>
                     </div>
                     Activities</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="7">
                     <div class="circle-outer">
                        <div class="circle-inner outdoor"></div>
                     </div>
                     Outdoor</a> </div>
               <!--/box -->

               <div class="box"> <a href="javascript:void(0)" data-value="8">
                     <div class="circle-outer">
                        <div class="circle-inner other"></div>
                     </div>
                     Other</a> </div>
               <!--/box -->

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
                  <a href="javascript:void(0)" data-value="1">Recommendations</a> <br/>
                  <hr color="#dddddd"/>
                  <a href="javascript:void(0)" data-value="2">Price - Low to High</a> <br/>
                  <a href="javascript:void(0)" data-value="3">Price - High to Low</a> <br/>
                  <hr color="#dddddd"/>
                  <a href="javascript:void(0)" data-value="4">Capacity - Low to High</a> <br/>
                  <a href="javascript:void(0)" data-value="5">Capacity - High to Low</a> <br/>
               </div>
            </div>
            <div class="col one"> &nbsp; </div>
            <div class="col two"> <a class="button-blue-color clicky" rel="loc">Location <i class="icon-chevron-down right"></i></a>
               <div class="loc popdown hidden">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <div class="scroll-1" style="padding-bottom: 7px;">
                     <div class="scroll line-height-sort-strip">
                        <input name="city" class="select-all" value="city" style="margin-top:3px;float:left" type="checkbox"/>
                        <label for="city" style="color:#025d9a; ">City</label>
                        <div class="city text-color" style="border-top:1px solid #ccc; ">
                           <label for="docklands"><input name="docklands" value="9" style="margin-top:3px;float:left" type="checkbox"/>
                              Docklands</label>
                           <label for="melbourne-cbd"><input name="melbourne-cbd" value="1" style="margin-top:3px;float:left" type="checkbox"/>
                              Melbourne CBD</label>
                           <label for="southbank"><input name="southbank" value="6" style="margin-top:3px;float:left" type="checkbox"/>
                              Southbank</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="inner-east" class="select-all" value="inner-east" style="margin-top:3px;float:left" type="checkbox"/>
                        <label for="inner-east" style="color:#025d9a; ">Inner East</label>
                        <div class="inner-east text-color" style="border-top:1px solid #ccc; ">
                           <label for="abbotsford">
                              <input name="abbotsford" value="5" style="margin-top:3px;float:left" type="checkbox"/>
                              Abbotsford</label>
                           <label for="collingwood">
                              <input name="collingwood" value="2" style="margin-top:3px;float:left" type="checkbox"/>
                              Collingwood</label>
                           <label for="east-melbourne">
                              <input name="east-melbourne" value="17" style="margin-top:3px;float:left" type="checkbox"/>
                              East Melbourne</label>
                           <label for="richmond">
                              <input name="richmond" value="3" style="margin-top:3px;float:left" type="checkbox"/>
                              Richmond</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="inner-north" class="select-all" value="inner-north" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="inner-north" style="color:#025d9a; ">
                           Inner North</label>
                        <div class="inner-north text-color" style="border-top:1px solid #ccc; ">
                           <label for="carlton">
                              <input name="carlton" value="16" style="margin-top:3px;float:left" type="checkbox"/>
                              Carlton</label>
                           <label for="fitzroy">
                              <input name="fitzroy" value="7" style="margin-top:3px;float:left" type="checkbox"/>
                              Fitzroy</label>
                           <label for="north-melbourne">
                              <input name="north-melbourne" value="113" style="margin-top:3px;float:left" type="checkbox"/>
                              North Melbourne</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="inner-south" class="select-all" value="inner-south" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="inner-south" style="color:#025d9a; ">
                           Inner South</label>
                        <div class="inner-south text-color" style="border-top:1px solid #ccc; ">
                           <label for="balaclava">
                              <input name="balaclava" value="305" style="margin-top:3px;float:left" type="checkbox"/>
                              Balaclava</label>
                           <label for="prahran">
                              <input name="prahran" value="11" style="margin-top:3px;float:left" type="checkbox"/>
                              Prahran</label>
                           <label for="south-melbourne">
                              <input name="south-melbourne" value="344" style="margin-top:3px;float:left" type="checkbox"/>
                              South Melbourne</label>
                           <label for="south-yarra">
                              <input name="south-yarra" value="10" style="margin-top:3px;float:left" type="checkbox"/>
                              South Yarra</label>
                           <label for="st-kilda">
                              <input name="st-kilda" value="4" style="margin-top:3px;float:left" type="checkbox"/>
                              St Kilda</label>
                           <label for="toorak">
                              <input name="toorak" value="241" style="margin-top:3px;float:left" type="checkbox"/>
                              Toorak</label>
                           <label for="windsor">
                              <input name="windsor" value="13" style="margin-top:3px;float:left" type="checkbox"/>
                              Windsor</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="inner-west" class="select-all" value="inner-west" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="inner-west" style="color:#025d9a; ">
                           Inner West</label>
                        <div class="inner-west text-color" style="border-top:1px solid #ccc; ">
                           <label for="west-melbourne">
                              <input name="west-melbourne" value="18" style="margin-top:3px;float:left" type="checkbox"/>
                              West Melbourne</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="eastern-suburbs" class="select-all" value="eastern-suburbs" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="eastern-suburbs" style="color:#025d9a; ">
                           Eastern Suburbs</label>
                        <div class="eastern-suburbs text-color" style="border-top:1px solid #ccc; ">
                           <label for="blackburn">
                              <input name="blackburn" value="209" style="margin-top:3px;float:left" type="checkbox"/>
                              Blackburn</label>
                           <label for="hawthorn">
                              <input name="hawthorn" value="14" style="margin-top:3px;float:left" type="checkbox"/>
                              Hawthorn</label>
                        </div>
                        <div class="clear"></div>
                        <br/>
                        <input name="northern-suburbs" class="select-all" value="northern-suburbs" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="northern-suburbs" style="color:#025d9a; ">Northern Suburbs</label>
                        <div class="northern-suburbs text-color" style="border-top:1px solid #ccc; ">
                           <label for="brunswick">
                              <input name="brunswick" value="117" style="margin-top:3px;float:left" type="checkbox"/>
                              Brunswick</label>
                           <label for="brunswick-east">
                              <input name="brunswick-east" value="15" style="margin-top:3px;float:left" type="checkbox"/>
                              Brunswick East</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="western-suburbs" class="select-all" value="western-suburbs" style="margin-top:3px;float:left; " type="checkbox"/>
                        <label for="western-suburbs" style="color:#025d9a; ">
                           Western Suburbs</label>
                        <div class="western-suburbs text-color" style="border-top:1px solid #ccc; ">
                           <label for="taylors-lakes">
                              <input name="taylors-lakes" value="12" style="margin-top:3px;float:left" type="checkbox"/>
                              Taylors Lakes</label>
                           <label for="williamstown">
                              <input name="williamstown" value="33" style="margin-top:3px;float:left" type="checkbox"/>
                              Williamstown</label>
                        </div>
                        <div class="clear"></div>
                        <br/>

                        <input name="melbourne-region" class="select-all" value="melbourne-region" style="margin-top:3px;float:left;" type="checkbox"/>
                        <label for="melbourne-region" style="color:#025d9a; ">
                           Melbourne Region</label>
                        <div class="melbourne-region text-color" style="border-top:1px solid #ccc;">
                           <label for="albert-park">
                              <input name="albert-park" value="345" style="margin-top:3px;float:left" type="checkbox"/>
                              Albert Park</label>
                           <label for="altona-north">
                              <input name="altona-north" value="56" style="margin-top:3px;float:left" type="checkbox"/>
                              Altona North</label>
                           <label for="armadale">
                              <input name="armadale" value="242" style="margin-top:3px;float:left" type="checkbox"/>
                              Armadale</label>
                           <label for="bentleigh">
                              <input name="bentleigh" value="341" style="margin-top:3px;float:left" type="checkbox"/>
                              Bentleigh</label>
                           <label for="brighton">
                              <input name="brighton" value="311" style="margin-top:3px;float:left" type="checkbox"/>
                              Brighton</label>
                           <label for="camberwell">
                              <input name="camberwell" value="199" style="margin-top:3px;float:left" type="checkbox"/>
                              Camberwell</label>
                           <label for="carlton-north">
                              <input name="carlton-north" value="115" style="margin-top:3px;float:left" type="checkbox"/>
                              Carlton North</label>
                           <label for="clayton">
                              <input name="clayton" value="284" style="margin-top:3px;float:left" type="checkbox"/>
                              Clayton</label>
                           <label for="clifton-hill">
                              <input name="clifton-hill" value="132" style="margin-top:3px;float:left" type="checkbox"/>
                              Clifton Hill</label>
                           <label for="elsternwick">
                              <input name="elsternwick" value="308" style="margin-top:3px;float:left" type="checkbox" />
                              Elsternwick</label>
                           <label for="elwood">
                              <input name="elwood" value="307" style="margin-top:3px;float:left" type="checkbox"/>
                              Elwood</label>
                           <label for="northcote">
                              <input name="northcote" value="134" style="margin-top:3px;float:left" type="checkbox"/>
                              Northcote</label>
                           <label for="port-melbourne">
                              <input name="port-melbourne" value="347" style="margin-top:3px;float:left" type="checkbox"/>
                              Port Melbourne</label>
                           <label for="templestowe">
                              <input name="templestowe" value="186" style="margin-top:3px;float:left" type="checkbox"/>
                              Templestowe</label>
                           <label for="yarraville">
                              <input name="yarraville" value="29" style="margin-top:3px;float:left" type="checkbox"/>
                              Yarraville</label>
                        </div>
                        <div class="clear"></div>
                        <br/>
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
                     <div class="scroll-2">


                        <div class="fac1 line-height-sort-strip" style="float: left; ">
                           <?php
                           foreach ($dd_facilities AS $typ) {
                              ?>
                              <input value="6" type="checkbox" class="mr"/><?php echo $typ['terms']['title'] ?><br>    
                              <?php
                           }
                           ?>
                        </div>

                        <!--					<div class="fac1 line-height-sort-strip" style="float: left; ">
                                                      <input value="6" type="checkbox"/>
                                                      A/V Equipment<br/>
                                                      <input value="11" type="checkbox"/>
                                                      Bar Tab<br/>
                                                      <input value="2" type="checkbox"/>
                                                      BYO<br/>
                                                      <input value="1" type="checkbox"/>
                                                      Dance Floor<br/>
                                                      <input value="4" type="checkbox"/>
                                                      External Catering<br/>
                                                      <input value="3" type="checkbox"/>
                                                      External Music<br/>
                                                      <input value="9" type="checkbox"/>
                                                      Handicap Access<br/>
                                                 </div>-->

                        <!--					
                                                 <div class="fac2 line-height-sort-strip" style="float: left; ">
                                                      <input value="7" type="checkbox"/>
                                                      Parking<br/>
                                                      <input value="5" type="checkbox"/>
                                                      Smoking Area<br/>
                                                      <input value="10" type="checkbox"/>
                                                      Stage<br/>
                                                      <input value="8" type="checkbox"/>
                                                      WiFi<br/>
                                                 </div>-->
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
                  foreach ($dd_privacy AS $typ1) {
                     ?>
                     <input value="1" type="checkbox" class="mr"/><?php echo $typ1['terms']['title'] ?><br>    
                     <?php
                  }
                  ?>
                  <!--				<div class="priv1 line-height-sort-strip">
                                  <input value="1" type="checkbox"/>
                                      Private<br/>
                                      <input value="2" type="checkbox"/>
                                      Partitioned<br/>
                                      <input value="3" type="checkbox"/>
                                      Shared<br/>
                                  </div>-->

               </div>
            </div>
            <div class="col two last"> <a class="button-blue-color clicky" rel="menu" >Food &amp; Drinks <i class="icon-chevron-down right"></i></a>
               <div class="menu popdown hidden">
                  <div class="arrow-border"></div>
                  <div class="arrow"></div>
                  <div class="text-center backgrnd-menu">
                     <input type="checkbox" class="mr"/>
                     Not Required </div>
                  <hr color="#dddddd">
                  <div class="scroll text-color line-height-sort-strip">
                     <div class="left">
                        <p class="h orange text-center"> Food </p>

                        <?php
                        foreach ($dd_food AS $typ3) {
                           ?>
                           <input value="1" type="checkbox" class="mr"/><?php echo $typ3['terms']['title'] ?><br/>    



                           <?php
                        }
                        ?>
     <!--	<input value="1" type="checkbox"/>
           Breakfast<br/>
           <input value="2" type="checkbox"/>
           Lunch<br/>
           <input value="3" type="checkbox"/>
           Dinner<br/>
           <input value="4" type="checkbox"/>
           Canapes<br/>  -->
                     </div>
                     <div class="right">
                        <p class="h orange text-center"> Drinks </p>

                        <?php
                        foreach ($dd_drinks AS $typ4) {
                           ?>
                           <input value="1" type="checkbox" class="mr"/>
                           <?php echo $typ4['terms']['title'] ?><br/>    



                           <?php
                        }
                        ?>

<!--						<input value="5" type="checkbox"/>
Alcoholic<br/>
<input value="6" type="checkbox"/>
Non-alcoholic<br/>-->
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
<div class="fullWidth" style="background-color: #ececec"> <!-- Page Content Full Width(Collections)-->
   <div class="wrapper">
      <div class="body-content page-content padding-end">
         <div class=" left result-fetch darkblue-color">
            Showing 1 - 20 of 395 Results <?php //echo Hellowparent();      ?>
         </div>
         <div class="clear"></div>
         <div class="collection-row">
            <?php
            // $qry =  mysql_query("SELECT parent_id FROM nodes WHERE  id != '3'");
            // $array = mysql_fetch_array($qry);
            // print_r($nodes);
            foreach ($nodes AS $key => $node) {
               $this->Layout->setNode($node);
               $title_array = $pk->query("SELECT title,slug FROM nodes WHERE  id = '" . $nodes[$key]['Node']['parent_id'] . "'");
               $title_name = $title_array[0]['nodes']['title'];
               $title_slug = $title_array[0]['nodes']['slug'];
               $venue_array = $pk->query("SELECT title,slug FROM nodes WHERE  parent_id = '" . $nodes[$key]['Node']['parent_id'] . "'");
               $venue_count = count($venue_array);
               // print_r($title_array);
               // print_r($node['Node']['id']);
               //$image = $node['Meta'][0]['value'];
               //print_r();
               //http://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&zoom=12&size=400x400&sensor=false
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

                  <div class="single-collection-venues text-color"> <?php echo $venue_count; ?> venues </div>
                  <?php //echo $this->Html->image($img[0]['Nodeattachment']['path']); ?>
                  <hr color="#dddddd"/>
                  <div class="single-collection-large-image"><?php echo $this->Html->image($node['Nodeattachment'][0]['path'], array('alt' => '', 'class' => '', 'width' => '225', 'height' => '143', $node['Node']['id'])); ?></div>
                  <div class="single-title-strip"><?php //echo $node['Taxonomy'][0]['Term']['title']      ?></div>
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
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                    <div class="left single-collection last2" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
            
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                      
                 
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                
                      
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                     
                    <div class="left single-collection last2" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
            
            
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                      
                 
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                
                      
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                     
                    <div class="left single-collection last2" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
            
            
            
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
            
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                      
                 
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                
                      
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                     
                    <div class="left single-collection last2" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd"/>
                        <div class="single-collection-large-image"><?php //echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143'));       ?></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
            
            
            
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"> <img src="/venue/img/imagesvenue/mezzanine_feature.png" alt="" title="" width="225px" height="143px" /></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                      
                 
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"> <img src="/venue/img/imagesvenue/mezzanine_feature.png" alt="" title="" width="225px" height="143px" /></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                
                      
                    <div class="left single-collection" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"> <img src="/venue/img/imagesvenue/mezzanine_feature.png" alt="" title="" width="225px" height="143px" /></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                 
                     
                    <div class="left single-collection last2" >
                        <div class="single-collection-heading darkblue-color"> 21st Birthday Venues in Melbourne</div>
                        <div class="single-collection-venues text-color"> 12 venues </div>
                        <hr color="#dddddd" />
                        <div class="single-collection-large-image"> <img src="/venue/img/imagesvenue/mezzanine_feature.png" alt="" title="" width="225px" height="143px" /></div>
                       <div class="single-title-strip"> Docklands </div>
                        <hr color="#dddddd"/>
                        <div class="up-from-strip">
                        <div class="left up-to text-color"> Up to 350</div>
                        <div class="right from-strip text-color"> From $1000</div>
                        <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>-->

            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
   <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<!--	<div class="paging"><?php //echo $this->Paginator->numbers();       ?></div>-->

<script type="text/javascript">
   event_type = "birthday-party";
   mixpanel.track("Land on browse page");
</script>
<div class="topgradient"></div>
<!--<script src="js/jquery.js" type="text/javascript"></script> -->
<!--<script src="js/options.js" type="text/javascript"></script> 
<script src="js/browse.js" type="text/javascript"></script>-->
<?php
echo $this->Html->script(array(
    'front_js/jquery.js',
    'front_js/options.js',
    'front_js/browse.js',
        //'jquery/supersubs',
        //'theme',
));
?>
<?php //echo $this->element('front/header');  ?>



