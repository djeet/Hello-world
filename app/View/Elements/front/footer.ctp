<div class="fullWidth"><!--footer portion starts here -->
    
    <div class="clear"></div>
</div>

<div class="fullWidth">
    <div class="hr"></div>
    <div class="wrapper">

        <?php $foots = $this->Menus->menu_dig('footer'); ?>
        <?php //print_r($foots); ?>
        <div class="footerLow">
            <div class="footerBoxA left">
                <div class="Fheading blue"><?php echo $foots['threaded'][0]['Link']['title'] ?> </div>
                <?php ?>
                <ul>
                    <?php foreach ($foots['threaded'][0]['children'] as $abts_title) { ?> 

                        <li><?php echo $this->Html->link($abts_title['Link']['title'], array('action' => $abts_title['Link']['link'])) ?></li>

                    <?php } ?>
                </ul>
                <?php ?>
            </div>
            <div class="footerBoxA left">
                <div class="Fheading blue"><?php echo $foots['threaded'][1]['Link']['title']  ?> </div>
                <ul>
                    <?php foreach ($foots['threaded'][1]['children'] as $abts_title) { ?> 

                        <li><?php echo $this->Html->link($abts_title['Link']['title'], array('action' => $abts_title['Link']['link'])) ?></li>

                    <?php } ?>
                </ul>
            </div>
            <div class="footerBox1 left">
                <div class="Fheading blue"><?php echo $foots['threaded'][2]['Link']['title'] ?> </div>
                <ul>
                    <?php foreach ($foots['threaded'][2]['children'] as $abts_title) { ?> 

                        <li><?php echo $this->Html->link($abts_title['Link']['title'], array('action' => $abts_title['Link']['link'])) ?></li>

                    <?php } ?>

                </ul>
            </div>
            <div class="footerBox left">
                <div class="Fheading blue"><?php  echo $foots['threaded'][3]['Link']['title']  ?> </div>
                <ul>
                    <?php foreach ($foots['threaded'][3]['children'] as $abts_title) { ?> 

                        <li><?php echo $this->Html->link($abts_title['Link']['title'], array('action' => $abts_title['Link']['link'])) ?></li>

                    <?php } ?>
                    
                    

                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="copyright" >
            <p class="copyright"> Â© 2013 Munchmob Ltd Pty | <?php echo $this->Html->link('Terms', array('action' => 'terms')); ?> | <?php echo $this->Html->link('Privacy', array('action' => 'privacy')); ?> </p>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<?php
echo $this->Html->script(array(
    'front_js/jquery',
    'front_js/search-options',
    'front_js/modernizr',
    'front_js/select2',
    'front_js/app',
));
?>




<!--footer portion endss here --> 



