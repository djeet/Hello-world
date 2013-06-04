 <?php
       
        //print_r($nodes);
         //foreach ($nodes AS $node) {
           //$this->Layout->setNode($node);
            // print_r($node['Node']['id']);
            //$image = $node['Meta'][0]['value'];
        //print_r();
        ?>

<div class="fullWidth" style="border-bottom: 3px solid #F86800; "> <!-- Heading Full Width(About)-->
  <div class="wrapper">
    <div class="body-content page-heading darkblue-color"> <?php print_r($nodes['Node']['excerpt']);?>
      <div class="clear"></div>
    </div>
  </div>
</div>

<div class="fullWidth grey-color">
    
    <?php //print_r($nodes['Node']['body']);?>
    
    <!-- Page Content Full Width(About)-->
  <div class="wrapper">
    <div class="body-content page-content ">
	<div class="pageContent">
			  <div class="eachSection" style="padding-top:0;">

	      <div class="content-text text-color">
                  <?php print_r($nodes['Node']['body']);?></div>
		  </div>
		  
		  <div class="ListingOfContent">
		   <div class="terms-main-heading text-color">
           <ul class="definition-list"> 
           <li><?php print_r($nodes['Meta'][2]['value']);?></li>
           </ul>
           </div><?php print_r($nodes['Meta'][2]['value_x']);?>
           <div class="terms-main-heading text-color">
           <ul class="definition-list"> 
           <li><?php print_r($nodes['Meta'][3]['value']);?></li>
           </ul>
           </div>
            <div class="terms-point-heading text-color">
          <?php print_r($nodes['Meta'][3]['value_x']);?> 
           </div>
           <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		  </div>
          <div class="footerSep"></div>