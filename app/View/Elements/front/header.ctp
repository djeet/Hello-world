<?php
echo $this->Html->script(array(
    'front_js/jquery.min.js',
    'front_js/popup.js',
));
?>

<?php
$db = ConnectionManager::getDataSource('default');

$logo = "SELECT * FROM posts WHERE id = '26' ";
$logoes = $db->fetchAll($logo);
?>

<?
if (!isset($_SESSION['area'])) {
   ?><script> 
      $(document).ready(function(){
         $('#pop_light').trigger('click');
      })
   </script>
   <?
   // $_SESSION['area'] = 'melbourne';
}

if (isset($_GET['area'])) {
   if ($_GET['area'] == 'sydney') {
      $_SESSION['area'] = 'sydney';
      ?> 
      <script>  window.location = '<?php echo $_SERVER['HTTP_REFERER'] ?>'; </script>
      <?
   } else {
      $_SESSION['area'] = 'melbourne';
      ?><script>  window.location = '<?php echo $_SERVER['HTTP_REFERER'] ?>'; </script>
      <?
   }
}
//print_r($_SESSION['area']);
?>

<script>
   var image_path = '<a href="#" class="close"><img src="<?php echo DOMAIN_NAME; ?>/img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>' ;
</script>

<!-- header starts here -->
<div class="fullWidth headerHgt">
   <div class="wrapper">
      <div class="header"> 
         <div class="logo left"><a title="Venuemob" href="<? echo DOMAIN_NAME; ?>">
               <?php if (!empty($logoes[0]['posts']['path'])) { ?>
                  <?php echo $this->Html->image($logoes[0]['posts']['path'], array('alt' => Configure::read('Site.title'), 'width' => '260', 'height' => '80')) ?>
               <?php } ?>
            </a>
         </div>
         <div class="searching right"> <a class="button right login" href="<? echo DOMAIN_NAME; ?>list_your_venues">List your venue</a>
            <div class="search right"><? //print_r($venue_data);                                        ?>
               <select tabindex="-1" class="top-search select2-offscreen" data-placeholder="Search for a venue..." style="border-right:0;float:left;margin:0;">
                  <option selected="selected"></option>
                  <optgroup label="Venues">
                     <?
                     foreach ($venue_data as $venue_key => $venue_value) {
                        ?>
                        <option value="<? echo DOMAIN_NAME . $venue_value['nodes']['path'] ?>"><? echo $venue_value['nodes']['title'] ?></option>
                     <? } ?>
                  </optgroup>

                  <optgroup label="Melbourne">
                     <?
                     foreach ($melbourne_data as $melbourne_key => $melbourne_value) { //$melbourne_value[0]['state'] . '/' .
                        ?>
                        <option value="<? echo DOMAIN_NAME . 'nodes/nodes/location?a=' .  $melbourne_value['b']['slug'] ?>"><? echo $melbourne_value['b']['city'] ?></option>
                     <? } ?>
                  </optgroup>

                  <optgroup label="Sydney">
                     <?
                     foreach ($sydney_data as $sydney_key => $sydney_value) { //$sydney_value[0]['state'] . '/' .
                        ?>
                        <option value="<? echo DOMAIN_NAME . 'nodes/nodes/location?a=' .  $sydney_value['b']['slug'] ?>"><? echo $sydney_value['b']['city'] ?></option>
                     <? } ?>
                  </optgroup>

                  <optgroup label="Events">
                     <?
                     foreach ($events_data as $events_key => $events_value) {
                        ?>
                        <option value="<? echo DOMAIN_NAME . '/browse/?events=' . $events_value['b']['slug'] ?>"><? echo $events_value['b']['title'] ?></option>
                     <? } ?>
                  </optgroup>

               </select>
            </div>
            <div class="supportNo right">Support: <?php echo Configure::read('Site.phone_number'); ?></div>
         </div>
      </div>
      <!--header ends here --> 
   </div>
   <!-- wrapper ends here -->
   <div class="clear"></div>
</div>
<!-- full width ends here -->
<div style="display: none; width:400px; min-height:100px;  margin-top: -160px; margin-left: -290px; border:5px solid #F86800" id="popup2" class="popup_block">
   <div style="text-align:left" class="font22  orangeC  formSubhead">Select Location</div>
   <style>
      #popup2 a{margin:0 49px; color:#000; font-size:20px; font-family:'Allerta-Regular'; text-align:center;}
   </style>

   <a class="location_catch" data-value="melbourne" href="<?php echo DOMAIN_NAME . '/?area=melbourne' ?>">Melbourne</a>
   <a class="location_catch" data-value="sydney" href="<?php echo DOMAIN_NAME . '/?area=sydney' ?>">Sydeny</a>

</div>
<input type="hidden" name="state_selection" id="state_selection" value="<?php
                     if (isset($_SESSION['area'])) {
                        echo $_SESSION['area'];
                     } else {
                        echo 'melbourne';
                     }
                     ?>"  />
<div class="fullWidth headBg">
   <div class="wrapper">
      <div class="headerLow">
         <div class="Location left"><a id="pop_light" rel="popup2" href="#?w=400" class="poplight" style="position: static! important;"><?php
       if (isset($_SESSION['area'])) {
          echo ucfirst($_SESSION['area']);
       } else {
          echo 'Select Location';
       }
                     ?></a>
         </div>
         <!--location ends -->

         <div class="headerMenu right">
            <ul>
               <li>
                  <?php echo $this->Menus->menu('main', array('dropdown' => true)); ?>
               </li>
            </ul>
         </div>

         <!--header menu ends here -->
         <div class="clear"></div>
      </div>
      <!--header Low ends here --> 
   </div>
   <!-- wrapper ends here -->
   <div class="clear"></div>
</div>
<!-- full width ends here --> 

<!--header portion ends here -->