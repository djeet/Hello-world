<?php //include 'header.php';  ?>
<!--<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />-->

<div class="container hero">
    <div class="row">
        <div class="col twelve last">
            <a href="http://unlimitedpractice.com/venue50//browse/?events=birthday-party" class="button right">Browse</a> 
            <span class="lobster"> Find the perfect venue for your 
          <a href="#" class="hero_dropdown"><span>Birthday Party</span><i class="icon-chevron-down right"></i></a> 
            </span> 
        </div>
        <div class="col twelve last text-center">
            <p class="hero-text">Start by selecting the type of event you are organising. Over 974 function rooms and spaces profiled.</p>
        </div>
    </div>
    <div class="row hidden">
        <div class="col eleven"> <span class="lobster">Choose an event type:</span> </div>
        <div class="col one last"> <br>
            <a href="#close" class="close"> <i class="icon-remove-sign"></i> </a> </div>
            
            
        <div class="col three">
            <a class="white" href="#" data-value="<?php echo $dd_events[0]['terms']['slug'] ?>"><?php echo $dd_events[0]['terms']['title'] ?></a>
            <a class="white" href="#" data-value="<?php echo $dd_events[1]['terms']['slug'] ?>"><?php echo $dd_events[1]['terms']['title'] ?></a> 
            <a class="white" href="#" data-value="<?php echo $dd_events[2]['terms']['slug'] ?>"><?php echo $dd_events[2]['terms']['title'] ?></a>
            
        </div>
        <div class="col three">
            <a class="white" href="#" data-value="<?php echo $dd_events[3]['terms']['slug'] ?>"><?php echo $dd_events[3]['terms']['title'] ?></a>
            <a class="white" href="#" data-value="<?php echo $dd_events[4]['terms']['slug'] ?>"><?php echo $dd_events[4]['terms']['title'] ?></a>
            <a class="white" href="#" data-value="<?php echo $dd_events[5]['terms']['slug'] ?>"><?php echo $dd_events[5]['terms']['title'] ?></a>
        </div>
        <div class="col three">
            <a class="white" href="#" data-value="<?php echo $dd_events[6]['terms']['slug'] ?>"><?php echo $dd_events[6]['terms']['title'] ?></a>
            <a class="white" href="#" data-value="<?php echo $dd_events[7]['terms']['slug'] ?>"><?php echo $dd_events[7]['terms']['title'] ?></a> 
            <a class="white" href="#" data-value="<?php echo $dd_events[8]['terms']['slug'] ?>"><?php echo $dd_events[8]['terms']['title'] ?></a> 
        </div>
        <div class="col three">
            <a class="white" href="#" data-value="<?php echo $dd_events[9]['terms']['slug'] ?>"><?php echo $dd_events[9]['terms']['title'] ?></a>
            <a class="white" href="#" data-value="<?php echo $dd_events[10]['terms']['slug'] ?>"><?php echo $dd_events[10]['terms']['title'] ?></a> 
            <a class="white" href="#" data-value="<?php echo $dd_events[11]['terms']['slug'] ?>"><?php echo $dd_events[11]['terms']['title'] ?></a> </div>
    </div>
</div>



<div class="fullWidth "><!--logos starts here -->
    <div class="wrapper">
        <div class="seenOn">
            <p>As Seen On</p>
            <ul>
                <li><img src="<?php echo strip_tags($nodes['Meta'][0]['value_x']) ?>" alt="" width="165" height="35" /></li>
                <li><img src="<?php echo strip_tags($nodes['Meta'][1]['value_x']) ?>" alt="" width="165" height="35" /></li>
                <li><img src="<?php echo strip_tags($nodes['Meta'][2]['value_x']) ?>" alt="" width="165" height="35" /></li>
                <li><img src="<?php echo strip_tags($nodes['Meta'][3]['value_x']) ?>" alt="" width="165" height="35" /></li>
                <li><img src="<?php echo strip_tags($nodes['Meta'][4]['value_x']) ?>" alt="" width="165" height="35" /></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!--logos ends here -->

<div class="fullwidth orangeBorder">
    <div class="Collections" style="min-height:197px;"> </div>
    <div class="clear"></div>
</div>
<!--fullwidth of col;lection ends here -->
<div class="clear"></div>
<div class="wrapper">
    <div class="moreCollectionBtn"><a class="button right font16" style="width: 150px;" href="#">See More Collections</a>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="fullWidth blueBg">
    <div class="wrapper">
        <div class="HomeBanner2" style="min-height:138px;">
            <div class="Box1 left">
                <div class="Box1Head"><?php echo strip_tags($nodes['Meta'][5]['value']) ?></div>
                <p><?php echo strip_tags($nodes['Meta'][5]['value_x']) ?></p>
            </div>
            <div class="Box1 left">
                <div class="Box1Head"><?php echo strip_tags($nodes['Meta'][6]['value']) ?></div>
                <p><?php echo strip_tags($nodes['Meta'][6]['value_x']) ?></p>
            </div>
            <div class="Box1 right" style="margin-right:0 !important;">
                <div class="Box1Head"><?php echo strip_tags($nodes['Meta'][7]['value']) ?></div>
                <p><?php echo strip_tags($nodes['Meta'][7]['value_x']) ?></p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!-- full width of header banner2 ends here -->

<div class="fulLwidth">
    <div class="HomeSlider" style="min-height:426px; background: url('<?php echo trim(strip_tags($nodes['Meta'][8]['value_x'])) ?>');">

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php //include 'footer.php'; ?>

</body>
</html>
<?php
echo $this->Html->script(array(
    //'front_js/jquery',
    //'front_js/jquery-ui',
    'front_js/cat',
    //'front_js/jquery.min',
    'front_js/home',
));
?>
