    

<script language="javascript" type="text/javascript">

   jQuery(function($) {

      $(document).ready(function(){

         var inputBorder = $('#product_edit_form input').css('border');

         $('#product_edit_form, #product_edit_form input,#product_edit_form textarea ,#product_edit_form select').bind('change submit',function(e){

            var pass = true;

            $('.required').each(function(e1){  

               //  $(this).attr('type') == 'text' &&

               if( ($(this).val()==null || $(this).val()=='' || $(this).val()==' ')){ 

                  $(this).css('border','1px solid #B00853');

                       

                  if($(this).attr('name')=='pr_image_path' && $(this).val()=='' || $(this).val()==' '){

                     $('.uploadify-button').css('border','3px solid #B00853');

                  }

                  pass = false;

               } else {

                  $(this).css('border',inputBorder);

                  //pass = true;   

               }

            }) 

            if(e.type == 'submit'){        

               if(pass == false) { 

                 //alert('your Enquiry has been submitted successfully');
                 
                $('.alert_popup').trigger('click');

                  return false;  e.preventDefault();  e1.preventDefault();

               }

            }

         })

      })

   })

</script>



<?php
$this->Layout->setNode($node);
$parent_id = $node['Node']['parent_id'];
//print_r($node);
//echo $parent_id;
if (!$parent_id) {
   //starting Parent node
   ?>
   <div class="fullWidth blueBg orange-border-bottom">
      <div class="wrapper">
         <div class="strip-above-accordian">
            <div class="destName"><?php echo $node['Node']['title']; ?></div>
            <div class="other-venue-strip-browse">
               <div class="left BackSearchBtn left">
                   <?php echo $this->Html->link('Browse Venues', '/browse', array('class' => 'button bkBtn', 'target' => '_blank')); ?>
<!--                   <a class="button bkBtn" href="#"> Browse Venues</a>-->
               </div>
               <div class="left BreadCrumb left"> <a href="#">Browse</a> / <a href="#">Melbourne</a> / <a href="#"><?php echo $node['Node']['title']; ?></a></div>
               <div class="right other-venue-share"> 
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style"> 
                     <a class="addthis_button_tweet"></a> 
                     <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> 
                     <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> 
                  </div>
                  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script> 
                  <!-- AddThis Button END --> 
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="container main-venue other-venue">
            <div class="row" style="margin-top:30px">
               <div class="twelve last">
                  <div class="row" style="margin-bottom: 50px;">
                     <?php if ($parent_id == '') { ?>
                        <div class="col five other-venues-accordian-content left">
                           <h2>Function Spaces</h2>
                           <div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="accordion">
                              <? foreach ($child_array as $key => $childval) { ?>
                                 <h3 tabindex="0" aria-selected="true" aria-controls="ui-accordion-accordion-panel-0" id="ui-accordion-accordion-header-0" role="tab" class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-header-active ui-state-active ui-corner-top"><?= $childval['nodes']['title'] ?></h3>
                                 <div aria-hidden="false" aria-expanded="true" role="tabpanel" aria-labelledby="ui-accordion-accordion-header-0" id="ui-accordion-accordion-panel-0" style="display: block; height: auto;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active">
                                    <ul>
                                       <?= $childval['nodes']['excerpt'] ?>
                                       <li>Fits up to <?= $childval['nodes']['Capacity_Available'] ?> people</li>
                                       <li>Price: From $<?= $childval['nodes']['Price'] ?></li>
                                    </ul>
                                    <? //=  $this->Html->link('Read More', array('action' => 'view','action'=>$childval['nodes']['slug']));   ?>
                                    <a class="link-to-space" href="<?= $childval['nodes']['slug']; ?>">Read More </a> 
                                 </div>
                                 <?php
                              }
                              ?> 
                           </div>
                        </div>
                        <div class="col seven last other-venues-accordian-images right">
                           <? foreach ($child_array as $key => $childval) {  // replace  class for active image "venue-images active left" to venue-images   ?>
                              <div class="venue-images">
                                 <div class="images">
                                    <a class="link-to-space" title="Opium Den function venue at Golden Monkey" href="#">
                                       <?php
                                       if ($image_query[$key]['nodeattachments']['node_id'] == $childval['nodes']['id']) {
                                          $image_path = $image_query[$key]['nodeattachments']['path'];
                                          echo $this->Html->image('..' . $image_path, array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '635', 'height' => '380'));
                                       } else {
                                          ?>
                                          <img src="images/opium_den_1.png" alt="Opium Den function venue at Golden Monkey" width="635px" height="380px" />
                                       <? } ?>

                                    </a> 
                                 </div>
                                 <input id="space-id" value="123" type="hidden"/>
                                 <div class="image-nav">
                                    <p><?php echo $childval['nodes']['title']; ?></p>
                                    <a class="link-to-space button" href="#"><span>View this space <i class="icon-chevron-right"></i></span></a> </div>
                                 <div class="clear"></div>
                              </div>
                           <? } ?>
                        </div>
                     <? } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="FunctionVenues" style="min-height:599px;"> 
            <!--			<div class="destName">Function Venues in Melbourne CBD</div>-->
            <div class="abtFunctVenuesL left">
               <p><?php echo $node['Node']['body']; ?></p>
            </div>
            <div class="abtFunctVenuesR right">
               <div class="EnquiryBtn "> <div class="button destRBtn"><a rel="popup1" href="#?w=760" class="poplight" style="color:#fff">Make Enquiry</a></div> </div>
               <div class="clear"></div>
               <div class="text-Below-Btn"  align="center">
<!--<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/popup.js"></script>-->

		
		
          <p><a rel="popup1" href="#?w=760" class="poplight" style="position: static! important;">Or <span>book now</span> directly with the venue</a></p>
        </div>
               <div class="clear"></div>
               <div class="abtFunctVenueMap" style="min-height:238px;">
                  <div class="DestBoxHeading font16 blue"><?php echo $node['Node']['Map']; ?></div>
                  <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
                  <div id="map" style="width: 341px; height:182px;"></div> 
                  <?php
                  $Map_address = $node['Node']['Map'];
                  if (!empty($Map_address)) {
                     $Mapaddress = str_replace(' ', '+', $Map_address);
                     $state = 'Melbourne';
                  } else {
                     $state = 'Melbourne';
                     $Map_address = '349 Flinders Lane Melbourne 3000 VIC';
                     $Mapaddress = '349+Flinders+Lane+Melbourne+3000+VIC';
                  }
                  ?>
                  <?
                  $address_array = array();
                  $address_array = array($state => $Mapaddress);

                  foreach ($address_array as $state => $address) {
                     // echo $address;
                     $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
                     $output = json_decode($geocode); //Store values in variable
                     // print_r($output);
//                  echo "<br/>";
//                  echo "Latitude : " . 
                     $lat = $output->results[0]->geometry->location->lat; //Returns Latitude
//                  echo "<br/>";
//                  echo "Longitude : " . 
                     $long = $output->results[0]->geometry->location->lng; // Returns Longitude
                     //if ($output->status == 'OK') { // Check if address is available or not
                  }
                  ?>

                  <script type="text/javascript">
                     var locations = [
                        ['<?= $Map_address; ?>', <?= $lat ?>, <?= $long ?>, 4]//,
                        //      ['Coogee Beach', -33.923036, 151.259052, 5],
                                                                              
                     ];

                     var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: new google.maps.LatLng(<?= round($lat, 2) ?>, <?= round($long, 2) ?>),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                     });

                     var infowindow = new google.maps.InfoWindow();

                     var marker, i;

                     for (i = 0; i < locations.length; i++) {  
                        marker = new google.maps.Marker({
                           position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                           map: map
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                           return function() {
                              infowindow.setContent(locations[i][0]);
                              infowindow.open(map, marker);
                           }
                        })(marker, i));
                     }
                  </script>
   <!--              <img src="images/staticmap.png" width="341" height="182" alt="" title=""/>-->
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               <div class="DestPrices mt20 mb20" style="min-height:285px; ">
                  <div class="DestBoxHeading font16 blue">Function Availabilities</div>
                  <div class="clear"></div>
                  <div class="pricetable" style="min-height:200px;">
                     <div class="clear-10"></div>
                     
                     
                    <?php  //print_r($child_meta); ?>
                     
                     
                     <div class="tableRowFunct ">
                        <div class="day left " > Monday</div>
                        <div class="status left"><?php //$node['CustomFields']['time_avail_monday'];  ?></div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct " >
                        <div class="day left " > Tuesday</div>
                        <div class="status left">All Day</div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct ">
                        <div class="day left " > Wednesday</div>
                        <div class="status left">All Day</div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct ">
                        <div class="day left " > Thursday</div>
                        <div class="status left">All Day</div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct ">
                        <div class="day left " > Friday</div>
                        <div class="status left">All Day</div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct ">
                        <div class="day left " > Saturday</div>
                        <div class="status left">All Day</div>
                        <div class="clear"></div>
                     </div>
                     <div class="tableRowFunct ">
                        <div class="day left " > Sunday</div>
                        <div class="status left">Open for exclusive events</div>
                        <div class="clear"></div>
                     </div>
                     <div class="clear-10"></div>
                  </div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div align="center">
<!--                <a rel="popup1" href="#?w=760" class="poplight" style="position: static! important;">-->
               <div class="EnquiryBtn " ><div class="button destRBtn"> <a rel="popup1" href="#?w=760" class="poplight" style="color:#fff">Make Enquiry</a></div> </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="clear"></div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- small details full width ends here -->
   <div class="fullWidth grey-color">
      <div class="wrapper">
         <div class="recommendVenue mb20">
            <div class="MainContentCentHead"> Recommended Venues </div>
            <div align="center" style="width:auto">
               <div class="recommendFunctVenue2"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[0]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue2"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue2.jpg', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16" href="#"><?php echo $nodesn[1]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue2"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue3.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16" href="#"><?php echo $nodesn[2]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue2"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue4.jpg', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16" href="#"><?php echo $nodesn[3]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue2"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue5.jpg', array('width' => '160', 'height' => '100')) ?>


                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16" href="#"><?php echo $nodesn[4]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- main-content ends here -->
   <div class="footerSep"></div>
   <?php
} else {
   //starting child node
   if (count($parent_array) > 0) {
      $parent_title = $parent_array[0]['nodes']['title'];
      $parent_slug = $parent_array[0]['nodes']['title'];
      $parent_description = $parent_array[0]['nodes']['body'];
   }
   if ($node['Node']['title']) {
      $child_title = $node['Node']['title'];
   } else {
      $child_title = 'no title';
   }

   if ($node['Node']['excerpt']) {
      $highlights = $node['Node']['excerpt'];
   } else {
      $highlights = '<li>no highlights</li>';
   }
   ?>

   <div class="fullWidth blueBg orange-border-bottom">
      <div class="wrapper">
         <div class="DestinationDiv " style="min-height:671px;">
            <div class="destName"><?= $parent_title; ?> - <?php echo $child_title; ?></div></a>
            <div class="destLeft left">
               <div class="destEnquiry "><!-- destination enquiry starts -->
                  <div class="BackSearchBtn left"> <a class="button bkBtn" href="#"> Search Results</a> </div>
                  <div class="BreadCrumb left"> <a href="#">Melbourne</a> / <a href="<?php echo $parent_slug; ?>"><?php echo $parent_title; ?></a> / <a href="<?php echo $node['Node']['slug']; ?>"><?php echo $node['Node']['title']; ?> </a></div>
                  <div class="clear"></div>
               </div>
               <!-- destination enquiry ends -->
               <div class="clear"></div>
               <div class="DestPreview"> 

                  <?php
                  //print_r($node);
                  if (!empty($node['Nodeattachment'][0])) {
                     if ($node['Nodeattachment'][0]['path']) {
                        $image_path = $node['Nodeattachment'][0]['path'];
                        echo $this->Html->image('..' . $image_path, array('alt' => $child_title, 'width' => '700', 'height' => '420'));
                     }
                  } else {
                     ?>
                     <img src="/venue50/img/venue/images/destPic.jpg" width="700" height="420" alt="" title=""/> 
   <? } ?>



                  <div class="clear"></div>
                  <!-- AddThis Button BEGIN -->
                  <div class="socialBTns left" style="padding:5px 8px;">
                     <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> </div>
                     <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script> </div>
                  <!-- AddThis Button END --> 
               </div>
            </div>
            <div class="destR right">
               <div class="EnquiryBtn "><div class="button destRBtn"><a rel="popup1" href="#?w=760" class="poplight" style="color:#fff">Make Enquiry</a></div> </div>
               <div class="clear"></div>
               <div class="DestHighlights " style="min-height:149px;">
                  <div class="DestBoxHeading  font16 blue"> Highlights</div>
                  <ul>
   <? echo $highlights; ?>
                  </ul>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               <div class="DestPrices" style="min-height:285px;">
                  <div class="DestBoxHeading font16 blue">Prices</div>
                  <div class="clear"></div>
                  <div class="pricetable" style="min-height:218px;">
                     <div class="tableRow ">
                        <div class="day left " > &nbsp;</div>
                        <div class="hire left">Hire</div>
                        <div class="minSpeed left">Min Spend</div>
                        <div class="clear"></div>
                     </div>
   <? if (array_key_exists('price_hire_monday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > MON</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_monday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_monday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_tuesday', $node['CustomFields'])) { ?>
                        <div class="tableRow " >
                           <div class="day left " > TUE</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_tuesday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_tuesday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_wednesday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > WED</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_wednesday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_wednesday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_thursday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > THU</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_thursday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_thursday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_friday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > FRI</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_friday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_friday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_saturday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > SAT</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_saturday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_saturday'] ?></div>
                           <div class="clear"></div>
                        </div>
   <? } if (array_key_exists('price_hire_sunday', $node['CustomFields'])) { ?>
                        <div class="tableRow ">
                           <div class="day left " > SUN</div>
                           <div class="hire left">$<?php echo $node['CustomFields']['price_hire_sunday'] ?></div>
                           <div class="minSpeed left"><?php echo $node['CustomFields']['price_min_spend_sunday'] ?></div>
                           <div class="clear"></div>
                        </div>
                     <? } if (array_key_exists('price_notes', $node['CustomFields'])) {
                        if (!empty($node['CustomFields']['price_notes'])) {
                           ?>
                           <div class="tableRow ">
                              <div class="day left "> &nbsp;</div>
                              <div class="hire left">Notes:- </div>
                              <div class="minSpeed left"><?php echo $node['CustomFields']['price_notes'] ?></div>
                              <div class="clear"></div>
                           </div>
      <? }
   }
   ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clear"></div>
   </div>
   <!--     -->

   <div class="fullWidth orange-border-bottom">
      <div class="wrapper">
          
          <div class="smallDetails">
              
              
            <div class="smallDetailDest left">
                <?
   foreach ($node['Taxonomy'] as $taxi) {
      if ($taxi['parent_id'] != '' && $taxi['Vocabulary']['title'] == 'Location') { ?>
                
               <div class="smallDetailPic left"><img src="/venue50/img/venue/images/loc.png" width="24" height="38" alt="" title=""/></div>
               <div class="smallDetailText font16 left">
         <?php echo $taxi['Term']['title']; ?>
     </div>
               <div class="clear"></div>
               <?
                }
   }
   ?>
               
            </div>
          
          
        
                   <div class="smallDetailText font16 left">
     
            <div class="smallDetailDest left">
               <?
   if ($node['Node']['Capacity_Available'] != '') { ?> 
               <div class="smallDetailPic left">
                   <img src="/venue50/img/venue/images/group.png" width="42" height="27" alt="" title=""/></div>
               <div class="smallDetailText font16 left"><?php echo $node['Node']['Capacity_Available'] ?> People</div>
               <div class="clear"></div>
                <?                 
     
   }
   ?>
            </div>
                       
                       
            <div class="smallDetailDest left">
              <?
   if ($node['Node']['Seats_Available'] != '') { ?>
                
               <div class="smallDetailPic left"><img src="/venue50/img/venue/images/chair.png" width="33" height="33" alt="" title=""/></div>
               <div class="smallDetailText font16 left"><?php echo $node['Node']['Seats_Available'] ?> Seats</div>
               <div class="clear"></div>
               
                <?                 
      
   }
   ?>
            </div>
                       
                       
            <div class="smallDetailDest left">
               <?
   
      if ($node['Node']['Price'] != '') {
        ?>
                
               <div class="smallDetailPic blue left"> Min Spend:</div>
               <div class="smallDetailText font16 left">From $<?php echo $node['Node']['Price'] ?></div>
               <div class="clear"></div>
                <?                 
      }
  
   ?>
               
            </div>
                       
                       
            <div class="smallDetailsBtn"><div class="button"> <a rel="popup1" href="#?w=760" class="poplight" style="color:#fff">Make Enquiry</a></div> </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- small details full width ends here -->

   <div class="fullWidth grey-color">
      <div class="wrapper">
         <div class="mainContent" style="min-height:677px;">
            <div class="tabpanel left">
               <div id="TabbedPanels1" class="VTabbedPanels">
                  <ul class="TabbedPanelsTabGroup">
                     <li class="TabbedPanelsTab" tabindex="0">The Space</li>
                     <li class="TabbedPanelsTab" tabindex="0">Pricing</li>
                     <li class="TabbedPanelsTab" tabindex="0">The Venue</li>
                     <li class="TabbedPanelsTab" tabindex="0">Map</li>
                     <li class="TabbedPanelsTab" tabindex="0">Downloads</li>
                  </ul>
                  <div class="TabbedPanelsContentGroup">
                     <div class="TabbedPanelsContent">
                        <div class="ContentHead"> <?php echo $child_title; ?></div>
                        <div class="TabContent">
                           <p><?php echo $node['Node']['body'] ?></p>

                           <div class="facilities"><div class="ContentSubHead font16 blue">Facilities</div>
                              <ul>
                                 <?php
                                 $term_id = array();
                                 if (!empty($node['Taxonomy'])) {
                                    foreach ($node['Taxonomy'] as $taxis) {
                                       if ($taxis['Vocabulary']['id'] == 9) {
                                          $term_id[] = $taxis['Term']['id'];
                                       }
                                    }
                                 } else {
                                    $taxis = array();
                                 }


                                 foreach ($dd_facilities AS $typ) {
                                    if (!empty($node['Taxonomy'])) {
                                       if ($taxis['Term']['id'] != '') {
                                          if (in_array($typ['terms']['id'], $term_id)) {
                                             ?>
                                             <li class="available left"><?php echo $typ['terms']['title'] ?></li>
                                          <?php } else {
                                             ?>
                                             <li class="unavailable left"><?php echo $typ['terms']['title'] ?></li>   
                                             <?
                                          }
                                       }
                                    } else {
                                       ?>
                                       <li class="unavailable left"><?php echo $typ['terms']['title'] ?></li>   
                                       <?
                                    }
                                 }
                                 ?>
                              </ul>
                              <div class="clear"></div>
                           </div>



                           <div class="clear"></div>
                           <?php
                           if (!empty($child_parent_childs_array)) {
                              ?>
                              <div class="ContentSubHead font16 blue">Other spaces at <?= $parent_title; ?></div>
                              <?php
                              //print_r($child_parent_childs_array);

                              foreach ($child_parent_childs_array as $key => $other_child) {
                                 if ($other_child['a']['id'] != $node['Node']['id']) {
                                    ?>
                                    <div class="OtherSpaces left"> <a href="#">
                                          <?php
                                          if ($other_child['b']['path']) {
                                             $image_paths = $other_child['b']['path'];
                                             echo $this->Html->image('..' . $image_paths, array('alt' => $child_title, 'width' => '160', 'height' => '100'));
                                          } else {
                                             ?>
                                             <img src="/venue50/img/venue/images/destPic.jpg" width="160" height="100" alt="" title=""/> 
            <? } ?>
            <!--                     <img src="/venue50/img/venue/images/lounge_feature1.png" width="160" height="100" alt="" title=""/>-->
                                       </a>
                                       <p style="width:160px;"><a class="font16" href="<?= $other_child['a']['slug'] ?>"><?= $other_child['a']['title']; ?></a></p>
                                    </div>
                                    <?php
                                 }
                              }
                           }
                           ?>


                        </div>
                     </div>
                     <div class="TabbedPanelsContent">
                        <div class="ContentHead"> Pricing</div>
                        <div class="TabContent">

                           <div class="destSmallTable">
                              <div class="smallTableRow">
                                 <div class="col1 left">&nbsp;</div>
                                 <div class="col2 left">Hire</div>	
                                 <div class="col3 left">Min Spend</div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php  if(array_key_exists('price_hire_monday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">MON</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_monday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_monday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                                 <?php } if (array_key_exists('price_hire_tuesday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">TUE</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_tuesday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_tuesday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php } if (array_key_exists('price_hire_wednesday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">WED</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_wednesday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_wednesday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php } if (array_key_exists('price_hire_thursday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">THU</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_thursday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_thursday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php } if (array_key_exists('price_hire_friday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">FRI</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_friday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_friday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php } if (array_key_exists('price_hire_saturday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">SAT</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_saturday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_saturday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <div class="clear"></div>
                               <?php } if (array_key_exists('price_hire_sunday', $node['CustomFields'])) { ?>
                              <div class="smallTableRow">
                                 <div class="col1 left">SUN</div>
                                 <div class="col2 left">$<?php echo $node['CustomFields']['price_hire_sunday'] ?></div>	
                                 <div class="col3 left"><?php echo $node['CustomFields']['price_min_spend_sunday'] ?></div>	
                                 <div class="clear"></div>					
                              </div>
                              <?php } ?>
                           </div>




                           <div class="ContentSubHead font16 blue"> Deposit</div>
                           <p><?= $node['Node']['Deposit']; ?></p>

                           <div class="clear"></div>
                           <div class="ContentSubHead font16 blue">Cancellations</div>
                           <p><?= $node['Node']['Cancellation']; ?></p>

                           <div class="clear"></div>
                           <div class="ContentSubHead font16 blue">Notes</div>
                           <p><?= $node['Node']['Notes']; ?></p>



                           <div class="clear"></div>
                        </div>
                     </div>
                     <div class="TabbedPanelsContent">
                        <div class="ContentHead"><?= $parent_title; ?></div>
                        <div class="TabContent">
   <?= $parent_description; ?>
   <!--                           <p>The Harbour Kitchen claim that they're in possession of Melbourne's "best views of the Docklands" is frankly, one that is probably declared with quite a bit of truth. Located on the "sunny side" of Melbourne's newest harbourside precinct, the Harbour Kitchen have seen their popularity grow in leaps and bounds since setting up shop.</p>
                           <p>With sprawling, picturesque views through the glass pavillion and spaces for occasions of any size, Harbour Kitchen Docklands pride themselves in providing a sublime function venue for every need. The Pavillion looks out onto the Docklands and the glittering lights of the skyline, while floor to ceiling glass protects party-goers from whatever Melbourne's weather has thrown into the mix. The Lounge area couples an open fire with stylish decor, and glass that opens up on sunny days. Catering packages are easily constructed to suit any occasion or budget, and each room is adaptable for any occasion. </p>
                           <p>Sit down dinners as well as cocktail parties find themselves in a beautiful setting just a stone's throw from the CBD. Both large and small groups, casual or formal, find themselves right at home in this Docklands gem. Harbour Kitchen Docklands is unique, effortlessly stylish, and manages to bring a point of difference to every event, that's as unique as the people who attend them.</p>-->
                        </div>
                        <div class="ContentSubHead font16 blue"> Function Availabilities</div>
                        <div class="destSmallTable">
                            <?php if(array_key_exists('time_avail_monday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Monday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_monday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                            <?php } if(array_key_exists('time_avail_tuesday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Tuesday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_tuesday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                             <?php } if(array_key_exists('time_avail_wednesday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Wednesday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_wednesday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                            <?php } if(array_key_exists('time_avail_thursday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Thursday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_thursday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                            <?php } if(array_key_exists('time_avail_friday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Friday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_friday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                            <?php } if(array_key_exists('time_avail_saturday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Saturday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_saturday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                            <?php } if(array_key_exists('time_avail_sunday',$node['CustomFields'])) { ?>
                           <div class="smallTableRow">
                              <div class="col4 left">Sunday</div>
                              <div class="col5 left"><?= $node['CustomFields']['time_avail_sunday']; ?></div>	
                              <div class="clear"></div>					
                           </div>
                           <div class="clear"></div>
                           <?php } ?>
                        </div>


                        <?php
                        if (!empty($child_parent_childs_array)) {
                           // print_r($child_parent_childs_array);
                           ?>
                           <div class = "ContentSubHead font16 blue">Other spaces at <?php echo $parent_title; ?> </div>
                           <?php
                           foreach ($child_parent_childs_array as $key => $other_child) {
                              if ($other_child['a']['id'] != $node['Node']['id']) {
                                 ?>
                                 <div class="OtherSpaces left"> 
                                    <? if ($other_child['b']['path']) { ?>
                                       <a href="#"><img src="../<?= $other_child['b']['path'] ?>" width="160" height="100" alt="" title=""/></a>
            <? } else { ?>
                                       <img src="/venue50/img/venue/images/lounge_feature1.png" width="160" height="100" alt="" title=""/>
                                 <? } ?>
                                    <p style="width:160px;"><a class="font16" href="<?= $other_child['a']['slug'] ?>"><?= $other_child['a']['title']; ?></a></p>
                                 </div>
                                 <?php
                              }
                           }
                        }
                        ?>
                        <div class="clear"></div>
                     </div>
                     <div class="TabbedPanelsContent">
                        <div class="ContentHead">Map
                           <div class="TabContent"><p>
                              <?php echo $node['Node']['Map']; ?></p>							
                              <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
                              <div id="map" style="width: 425px; height:350px;"></div> 
                              <?php
                              $Map_address = $node['Node']['Map'];
                              if (!empty($Map_address)) {
                                 $Mapaddress = str_replace(' ', '+', $Map_address);
                                 $state = 'Melbourne';
                              } else {
                                 $state = 'Melbourne';
                                 $Map_address = '349 Flinders Lane Melbourne 3000 VIC';
                                 $Mapaddress = '349+Flinders+Lane+Melbourne+3000+VIC';
                              }
                              ?>
                              <?
                              $address_array = array();
                              $address_array = array($state => $Mapaddress);

                              foreach ($address_array as $state => $address) {
                                 // echo $address;
                                 $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
                                 $output = json_decode($geocode); //Store values in variable
                                 // print_r($output);
//                  echo "<br/>";
//                  echo "Latitude : " . 
                                 $lat = $output->results[0]->geometry->location->lat; //Returns Latitude
//                  echo "<br/>";
//                  echo "Longitude : " . 
                                 $long = $output->results[0]->geometry->location->lng; // Returns Longitude
                                 //if ($output->status == 'OK') { // Check if address is available or not
                              }
                              ?>

                              <script type="text/javascript">
                                 var locations = [
                                    ['<?= $Map_address; ?>', <?= $lat ?>, <?= $long ?>, 8]//,
                                    //      ['Coogee Beach', -33.923036, 151.259052, 5],
                                                                              
                                 ];

                                 var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 10,
                                    center: new google.maps.LatLng(<?= round($lat, 2) ?>, <?= round($long, 2) ?>),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                 });

                                 var infowindow = new google.maps.InfoWindow();

                                 var marker, i;

                                 for (i = 0; i < locations.length; i++) {  
                                    marker = new google.maps.Marker({
                                       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                       map: map
                                    });

                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                       return function() {
                                          infowindow.setContent(locations[i][0]);
                                          infowindow.open(map, marker);
                                       }
                                    })(marker, i));
                                 }
                              </script>
                           </div>
                           <div class="clear"></div>

                        </div>
                     </div>

                     <div class="TabbedPanelsContent">
                        <div class="ContentHead">Downloads</div>

                        <div class="TabContent">
                           <div class="functionMenu">
                              <a href="#"><?php echo $node['CustomFields']['venue_download'] ?></a>
                           </div>


                        </div><div class="clear"></div>							

                     </div>
                  </div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="destDeatilsTable right" style="min-height:648px;"> 
               <div class="InnerTable" style="min-height:544px;">
                  <div class="tableRow1 greyborderBottom "><!-- row starts here -->
                     <div class="col1 left font16 blue">Type:</div>
                     <div class="col2 left">
                        <ul>
                           <li>
                              <?
                              foreach ($node['Taxonomy'] as $taxis) {
                                 if ($taxis['Vocabulary']['title'] == 'Category') {
                                    echo $taxis['Term']['title'] . '</br>';
                                 }
                              }
                              ?></li><br>
                           <!--                           <li>Bar</li>
                                                      <li>Restaurant</li>-->
                        </ul>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div><!-- row ends here -->
                  <div class="clear"></div>
                  <div class="tableRow1 greyborderBottom"><!-- row starts here -->
                     <div class="col1 left font16 blue">Food &amp; Drinks:</div>
                     <div class="col2 left">
                        <ul>
                           <li>
                              <?
                              foreach ($node['Taxonomy'] as $taxis) {
                                 if ($taxis['Vocabulary']['title'] == 'Food') {
                                    echo $taxis['Term']['title'] . '</br>';
                                 }
                              }
                              ?> 
                           </li>
                           <!--                           <li>Breakfast</li>
                                                      <li>Lunch</li>
                                                      <li>Canapes</li>
                                                      <li>Alcoholic</li>
                                                      <li>Non-alcoholic</li>-->
                        </ul>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div><!-- row ends here -->
                  <div class="clear"></div>
                  <div class="tableRow1 greyborderBottom"><!-- row starts here -->
                     <div class="col1 left font16 blue">Privacy:</div>
                     <div class="col2 left">
                        <ul>
                           <li>
                              <?php
                              foreach ($node['Taxonomy'] as $taxis) {
                                 if ($taxis['Vocabulary']['title'] == 'Privacy') {
                                    echo $taxis['Term']['title'] . '</br>';
                                 }
                              }
                              ?>
                           </li>

                           <!--                           <li>Private</li>-->
                        </ul>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div><!-- row ends here -->

                  <div class="clear"></div>
                  <div class="tableRow1 "><!-- row starts here -->
                     <div class="col1 left font16 blue">Suitable For:</div>
                     <div class="col2 left">
                        <ul>

                           <?php
                           foreach ($node['Taxonomy'] as $taxis) {
                              if ($taxis['Vocabulary']['title'] == 'Event') {
                                 //echo $taxis['Term']['title'].'</br>' ;
                                 //echo "<a href=\"" . $url . "\">Click Me</a>";
                                 echo "<li><a href=browse/" . $taxis['Term']['title'] . ">" . $taxis['Term']['title'] . "</a></li>";
                              }
                           }
                           ?>
                           <!--                           <li><a href="#">Birthday Party</a></li>
                                                      <li><a href="#">Corporate Function</a></li>
                           
                                                      <li><a href="#">Reception</a></li>
                           
                                                      <li><a href="#"> After Work Drinks</a></li>
                           
                                                      <li><a href="#">Product Launch</a></li>
                                                      <li><a href="#"> Christmas Function</a></li>
                                                      <li><a href="#"> Engagement Party</a></li>
                                                      <li><a href="#">Hens Night</a></li>
                                                      <li><a href="#"> Bucks Night</a></li>
                                                      <li><a href="#">Meetup Event</a></li>
                                                      <li><a href="#"> Charity Event</a></li>-->

                        </ul>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div><!-- row ends here -->


               </div> <div class="clear"></div>
               <div align="center">
                  <div class="InnerTableBtn" > <div class="button font16" ><a rel="popup1" href="#?w=760" class="poplight" style="color:#fff">Make Enquiry</a></div> </div><div class="clear"></div></div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div> <!-- main-content ends here -->

   <div class="fullWidth blueBg" style="min-height:326px;">
      <div class="wrapper">

         <div class="recommendVenue">

            <div align="center" style="width:auto">
               <div class="HeadingBlueBg">Recommended Venues   </div><div class="clear"></div></div>
            <div align="center" style="width:auto">
               <div class="recommendFunctVenue"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[0]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[0]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>

               <div class="recommendFunctVenue"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[1]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[1]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[2]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[2]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[3]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[3]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="recommendFunctVenue"> <a href="#">
                     <?php echo $this->Html->image('venue/images/venue1.png', array('width' => '160', 'height' => '100')) ?>

                  </a><?php if (!empty($nodesn[4]['Node']['title'])) { ?>
                  <p><a class="font16 " href="#"><?php echo $nodesn[4]['Node']['title'] ?></a></p>
                    <?php } ?>
               </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
   </div>

   <script type="text/javascript">
       
      var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
      $(window).load(function(){
       $(".TabbedPanelsTab:first").trigger('click');
  
});
      
   </script>
<? } ?>
   
   <div style="display: none; width:760px; min-height:370px;  margin-top: -160px; margin-left: -290px;" id="popup1" class="popup_block">
<div class="font22  orangeC  formSubhead" style="text-align:left">Book Directly with the venue</div>
 <div class="FormLeft left" > <?php
                        echo $this->Form->create('Message', array( 'id' => 'product_edit_form',
                            'url' => array(
                                'plugin' => 'contacts',
                                'controller' => 'contacts',
                                'action' => 'view1',
                                
                                //$contact['Contact']['alias'],
                            ),
                        ));
                        
                        ?>
                            <?php echo $this->Form->input('Message.contact_id', array('type' => 'hidden',  'value' => '2')); ?>
                          <?php echo $this->Form->input('Message.status', array('type' => 'hidden',  'value' => '2')); ?>
                        <?php echo $this->Form->input('Message.body', array('type' => 'hidden',  'value' => $this->Html->url( null, true ))); ?>
				<div class="formRow">
					<label >Your name:</label>
                                        <?php echo $this->Form->input('Message.name', array('type' => 'text', 'label' => '', 'class' => 'required', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Venue name:</label>
                                        <?php echo $this->Form->input('Message.lname', array('type' => 'text', 'label' => '', 'class' => 'required', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Email address:</label>
                                        <?php echo $this->Form->input('Message.email', array('type' => 'text', 'label' => '', 'class' => 'required', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Phone:</label>
                                        <?php echo $this->Form->input('Message.phone', array('type' => 'text', 'label' => '', 'class' => 'required', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
                                <div class="submit">
                                    <input type="submit" class="button formBtn" value="Submit">
                                   
</div>
                                
                            <?php        //echo $this->Form->end(__('Send')); ?>
			</div>
			
<div class="FormR left">
				<div class="formRow">
					<label>State:</label>
					<?php
                              echo $this->Form->input('Message.enquiry_form_state', array('class' => 'required',
                                  'options' => array('VIC' => 'VIC', 'NSW' => 'NSW', 'QLD' => 'QLD', 'SA' => 'SA', 'WA' => 'WA', 'NT' => 'NT', 'ACT' => 'ACT', 'TAS' => 'TAS'),
                                  'empty' => '(choose one)',
                                  'label' => '',
                                  'style' => 'padding-top:25;'
                              ));?>
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Additional Comments (optional):</label>
                                        <?php echo $this->Form->input('Message.enquiry_form_comment', array('type' => 'textarea', 'label' => '', 'class' => 'required', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<textarea name=""  rows="" cols="" ></textarea>-->
				</div>
				<div class="clear"></div>
				</div>			

</div>
   
   
<?php
echo $this->Html->script(array(
    'front_js/jquery',
    'front_js/jquery-ui',
    'front_js/venue',
    //'front_js/jquery.min',
    'front_js/popup',
));
?>