<?php  //print_r($child_metas); ?>
<?php if($child_metas[0]['taxonomies']['parent_id'] == 58){
    $mts = 'Melbourne';
}
else{
   $mts = 'Sydeny'; 
    
}
?>

<div class="fullwidth blueBg orange-border-bottom" >

<div class="wrapper">

<div class="FunctionVenues" style="min-height:599px;">
			<div class="destName">Function Venues in <?php echo $terms[0]['Term']['title']; ?></div>
			<div class="abtFunctVenuesL left">
			<p>
                            
                            <?php echo $terms[0]['Term']['description']; ?>
                        </p>
</div>
<div class="abtFunctVenuesR right">
<div class="abtFunctVenueMap" >
  <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
                  <div id="map" style="width: 341px; height:182px;"></div> 
                  <?php
                  $idss = $_GET['a'];
                  $Map_address = $idss;
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
    </a>
<div class="clear"></div>
</div>

<div class="MoreFunctVenueClk" style="min-height:194px;">
<div align="center" class="MoreFunctVenueBtn">
    <a class="button " style="display:inline !important;" href="<?php DOMAIN_NAME ?>browse">
        Browse Venues in <?php echo $mts; ?></a></div>
<p>Look, compare and enquire from hundreds of venues in <?php echo $mts; ?>.</p>
<div class="clear"></div>
<div  align="center" class="MoreFunctVenueBtn"> <a class="button" style="display:inline !important;" href="<?php DOMAIN_NAME ?>concierge">Concierge</a>  </div>
<p>Leave the details of your event, and we can do all the work. For FREE!</p>
     </div>
<div class="clear"></div>

</div>



<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
<!-- full width ends here of  about function venue -->


<div class="fullWidth grey-color pb30">
<div class="wrapper">

		
		<div class="ListingHeading blue">Here are function venues in <span style="font-weight:600;"><?php echo $terms[0]['Term']['title']; ?></span></div>
		<div class="clear"></div>
		<!--sfsdgfhgfhgj -->
		
		<div class="collection-row">
        
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color">Virginia Plain</div>
            <div class="single-collection-venues text-color"> Lounge</div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image">
                <?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?>
            </div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 60 </div>
            <div class="right from-strip text-color"> From $1500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Sarti</div>
            <div class="single-collection-venues text-color"> Courtyard </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 80</div>
            <div class="right from-strip text-color"> From $0</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Sarti</div>
            <div class="single-collection-venues text-color"> Bar Side  </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 50</div>
            <div class="right from-strip text-color"> From $1000</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        <div class="left single-collection last2" >
            <div class="single-collection-heading darkblue-color"> Cecconi's Cantina</div>
            <div class="single-collection-venues text-color"> Private Dining Room </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 30</div>
            <div class="right from-strip text-color"> From $3500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>

        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Sarti</div>
            <div class="single-collection-venues text-color"> Dining Room</div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 60</div>
            <div class="right from-strip text-color"> From $1000</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
          
     
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> The Aylesbury</div>
            <div class="single-collection-venues text-color"> Rooftop </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $4000</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
    
          
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Front Main Dining</div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 40</div>
            <div class="right from-strip text-color"> From $1500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
         
        <div class="left single-collection last2" >
            <div class="single-collection-heading darkblue-color"> Papa Goose</div>
            <div class="single-collection-venues text-color"> Entire Venue</div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 500</div>
            <div class="right from-strip text-color"> Enquire</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>


        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Sarti</div>
            <div class="single-collection-venues text-color"> Terrace </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $1000</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
          
     
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Sarti</div>
            <div class="single-collection-venues text-color"> Entire Venue </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 200</div>
            <div class="right from-strip text-color"> From $5000</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
    
          
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
         
        <div class="left single-collection last2" >
            <div class="single-collection-heading darkblue-color">Papa Goose</div>
            <div class="single-collection-venues text-color"> Restaurant </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"> <?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 100</div>
            <div class="right from-strip text-color"> Enquire</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>



        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
          
     
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
    
          
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
         
        <div class="left single-collection last2" >
            <div class="single-collection-heading darkblue-color">Papa Goose</div>
            <div class="single-collection-venues text-color"> Restaurant </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 100</div>
            <div class="right from-strip text-color"> Enquire</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>



        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
          
     
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
    
          
        <div class="left single-collection" >
            <div class="single-collection-heading darkblue-color"> Virginia Plain</div>
            <div class="single-collection-venues text-color"> Back Main Dining </div>
            <hr color="#dddddd"/>
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 70</div>
            <div class="right from-strip text-color"> From $2500</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
     
         
        <div class="left single-collection last2" >
            <div class="single-collection-heading darkblue-color">Papa Goose</div>
            <div class="single-collection-venues text-color"> Restaurant </div>
            <hr color="#dddddd" />
            <div class="single-collection-large-image"><?php echo $this->Html->image('venue/images/mezzanine_feature.png', array('width' =>'225', 'height'=>'143')); ?></div>
           <div class="single-title-strip"><?php echo $terms[0]['Term']['title']; ?></div>
            <hr color="#dddddd"/>
            <div class="up-from-strip">
            <div class="left up-to text-color"> Up to 100</div>
            <div class="right from-strip text-color"> Enquire</div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        
          <div class="clear"></div>
        </div>
		<!--sfsdgfhgfhgj -->

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<div class="footerSep"></div>
<!-- main content ends here -->

</body>
</html>
