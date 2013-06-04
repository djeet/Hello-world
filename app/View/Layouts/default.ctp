<?php
/**
 * Default Theme for Croogo CMS
 *
 * @author Fahad Ibnay Heylaal <contact@fahad19.com>
 * @link http://www.croogo.org
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_for_layout; ?> &raquo; <?php  echo Configure::read('Site.title'); ?></title>
	<?php
		echo $this->Layout->meta();
		echo $this->Layout->feed();
		echo $this->Html->css(array(
			//'reset',SpryAssets/SpryTabbedPanels.js
			//'960',
			'SpryTabbedPanels',
                    'jquery-ui',
                    'style',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			//'jquery/jquery.min',
			//'jquery/jquery.hoverIntent.minified',
			//'jquery/superfish',
			//'jquery/supersubs',
                    'front_js/jquery',
			'front_js/venue',
                        'front_js/SpryTabbedPanels',
                    //'front_js/search-options',
                    //'front_js/modernizr',
                    //'front_js/select2',
                    //'front_js/app',
                    'front_js/browse',
                    'front_js/pages',
                    'front_js/jquery-ui',
                    
                    
                    
		));
		echo $this->Blocks->get('css');
		echo $this->Blocks->get('script');
	?>
        
        <?php
$db = ConnectionManager::getDataSource('default');
            //$result  = $db->rawQuery($child_meta);
            $blocks = "SELECT * FROM blocks";
            $blockss = $db->fetchAll($blocks);
           // print_r($logoes[0]['posts']['path']);

?>
</head>
<body>
	<div id="wrapper">
		<?php echo $this->element('front/header'); ?>

		<div id="main" class="container_16">
			<div id="content" class="grid_11">
			<?php
				echo $this->Layout->sessionFlash();
				echo $content_for_layout;
			?>
			</div>
                
			<div class="wrapper">

        <div class="footerUp">
            <div class="footerBox2 left">
                <div class="Fheading font16">Sign up to our newsletter</div>
                <p>
                    <?php  echo Configure::read('Site.newsletter_footer_text'); ?>
                </p>
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
                        echo $this->Form->create('Message', array( 'id' => 'product_edit_form',
                            'url' => array(
                                'plugin' => 'contacts',
                                'controller' => 'contacts',
                                'action' => 'news_letter',
                                
                                //$contact['Contact']['alias'],
                            ),
                        ));
                        
                        ?>
                <?php echo $this->Form->input('Message.contact_id', array('type' => 'hidden',  'value' => '2')); ?>
                          <?php echo $this->Form->input('Message.status', array('type' => 'hidden',  'value' => '3')); ?>
                   <?php //echo $this->Form->create('Newsletter', array('url' => array('plugin' => 'contacts' ,'controller' => 'newsletters', 'action' =>'add'))); ?>
                <div class="FooterField ">
                    <?php echo $this->Form->input('Message.name', array('placeholder' => 'Name','type' => 'text','label' => '','class'=>'required','div'=>'','value'=>'','style'=>'display: inline-block; margin-right:0;')); ?>
<!--                    <input type="text" name=""  placeholder="Name"/>-->
                </div>
                <div class="clear"></div>
                <div class="FooterField ">
                   <?php echo $this->Form->input('Message.email', array('placeholder' => 'Email','type' => 'text','label' => '','class'=>'required','div'=>'','value'=>'','style'=>'display: inline-block; margin-right:0;')); ?>
<!--                    <input type="text" name=""  placeholder="Email"/>-->
                </div>
                <div class="clear"></div>
                <?php //echo $this->Form->end('Save Post'); ?>
                <input  class="button font16" type="submit" value="Submit"/>
                <?php //echo $this->element('front/add'); ?>

            </div>

            <div class="footerBox2 left">
                <div class="Fheading font16">Get Connected</div>

                <ul>
                    <li class="left "><a href="<?php  echo Configure::read('Site.facebook_link'); ?>"><?php echo $this->Html->image('venue/images/fb.jpg', array('alt' => '', 'width' => '40', 'height' => '37')) ?></a></li>
                    <li class="left"><a href="<?php  echo Configure::read('Site.twitter_link'); ?>"><?php echo $this->Html->image('venue/images/tw.png', array('alt' => '', 'width' => '40', 'height' => '37')) ?></a></li>
                    <li class="left"><a href="<?php  echo Configure::read('Site.pinterest_link'); ?>"><?php echo $this->Html->image('venue/images/unknown.png', array('alt' => '', 'width' => '40', 'height' => '37')) ?></a></li>
                    <li class="left"><a href="<?php  echo Configure::read('Site.googleplus_link'); ?>"><?php echo $this->Html->image('venue/images/g+.png', array('alt' => '', 'width' => '40', 'height' => '37')) ?></a></li>




                </ul>
                <div class="clear-20"></div>
                <div class="Fheading font16">Like us on Facebook</div>
                <?php //echo $this->Html->image('venue/images/likebox.jpg', array('alt' => '', 'width' =>'40', 'height' => '37')) ?>


            </div>



            <div class="footerBox2 left">
                <div class="Fheading font16">Support</div>
                <p><?php //print_r($blockss[2]['blocks']['body']); ?>
                <?php  echo Configure::read('Site.support_footer_text'); ?>
                </p>
                <a class=" button font16"  style="width: auto;" href="#"><?php  echo Configure::read('Site.phone_number'); ?></a>
            </div>


            <div class="footerBox2 right block4">
                <p>
                    <?php  echo Configure::read('Site.footer_right_text'); ?> 
                    <?php //print_r($blockss[3]['blocks']['body']); ?>
                </p>
            </div>


        </div>


        <div class="clear"></div>
    </div>

			<div class="clear"></div>
		</div>

		<?php echo $this->element('front/footer'); ?>
	</div>
	<?php
		//echo $this->Blocks->get('scriptBottom');
		echo $this->Js->writeBuffer();
	?>
	</body>
</html>