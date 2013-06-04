<?php
$this->extend('/Common/admin_edit');
$this->Html->script(array('Nodes.nodes'), false);

$this->Html->addCrumb('', '/admin', array('icon' => 'home'))
        ->addCrumb(__('Content'), array('controller' => 'nodes', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_add') {
   $formUrl = array('action' => 'add', $typeAlias);
   $this->Html
           ->addCrumb(__('Create'), array('controller' => 'nodes', 'action' => 'create'))
           ->addCrumb($type['Type']['title'], $this->here);
}

if ($this->request->params['action'] == 'admin_edit') {
   $formUrl = array('action' => 'edit');
   $this->Html->addCrumb($this->request->data['Node']['title'], $this->here);
}

echo $this->Form->create('Node', array('url' => $formUrl));
?>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<div class="row-fluid">
   <div class="span8">

      <ul class="nav nav-tabs">
         <li><a href="#node-main" data-toggle="tab"><?php echo __($type['Type']['title']); ?></a></li>
         <li><a href="#node-access" data-toggle="tab"><?php echo __('Access'); ?></a></li>
         <?php echo $this->Croogo->adminTabs(); ?>
      </ul>

      <div class="tab-content">
         <div id="node-main" class="tab-pane">
            <?php
            $no_child = array();
            foreach ($nodes as $key => $filters) {
               if (!strstr($filters, '_')) {
                  $no_child[$key] = $filters;
               }
            }
            echo $this->Form->input('parent_id', array('type' => 'select', 'options' => $no_child, 'empty' => true));
            echo $this->Form->input('id');
            $this->Form->inputDefaults(array(
                'class' => 'span10',
            ));
            echo $this->Form->input('title', array(
                'label' => __('Title'),
                'placeholder' => __('Title'),
            ));
            echo $this->Form->input('slug', array(
                'label' => __('Slug'),
                'readonly' => false,
                'class' => 'span10 slug',
                'placeholder' => __('Slug'),
            ));
            if ($typeAlias == 'node') {
               echo $this->Form->input('excerpt', array(
                   'label' => __('Highlights'),
                   'id' => 'editor1',
                   'class' => 'ckeditor',
                   //'label' => false,
                   'placeholder' => __('Highlights'),
               ));
               echo $this->Form->input('body', array(
                   'label' => __('Descriptions (The Space)'),
               ));
            } else {
               echo $this->Form->input('excerpt', array(
                   'label' => __('Excerpt'),
                   'id' => 'editor1',
                   'class' => 'ckeditor',
                   //'label' => false,
                   'placeholder' => __('Excerpt'),
               ));
               echo $this->Form->input('body', array(
                   'label' => __('Body'),
               ));
            }

            if ($typeAlias == 'node') {
               ?>
               <script>
                  function child_status(){
                     $.ajax({
                        dataType: "html",
                        type: "GET",
                        evalScripts: true,
                        url: '<?php echo Router::url(array('controller' => 'nodes', 'action' => 'parent_get')); ?>',
                        data: ({id:$('#NodeParentId').val()}),
                        success: function (data){ 
                           if(data!=" "){  
                              $('#event_child').show(); 
                              $('#parent_map').hide();
                           }else{
                             
                              $('#event_child').hide();
                              $('#parent_map').show();
                           }
                        }
                     });
                  }
                                                                                                                                                                                                            
                  $(document).ready(function(){
                     if($('#NodeParentId').val()==''){
                        child_status();
                     }else{
                        child_status();
                     }
                     $('#NodeParentId').change(function(){
                        child_status();
                     })
                  })   
               </script>
               <?php
               echo '<div id="event_child">';
               ?>
               <div class="row-fluid">
                  <div class="span12">
                     <div class="box">
                        <div class="box-title">
                           <i class="icon-list"></i>
                           Venue Details
                        </div>
                        <div class="box-content">
                           <div id="meta-fields">
                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Price</strong>
                                    </div>
                                 </div>
                              </div>

                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:0px;" class="input text">
                                        <?php //print_r($nodes);?>
                                       <?
                                       if(empty($this->data['Node']['Price']) || $this->data['Node']['Price'] == 0){
                                         
                                       echo $this->Form->input('Price', array(
                                           'label' => false,
                                           'value' => 0,
                                           'placeholder' => __('Price'),
                                       ));
                                       }
                                        else {
                                           echo $this->Form->input('Price', array(
                                           'label' => false,
                                           //'value' => $this->data['Node']['Price'],
                                           'placeholder' => __('Price'),
                                       ));  
                                        }
                                       ?>
                                    </div>
                                 </div>
                              </div>

                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Capacity Available</strong>
                                    </div>
                                 </div>
                              </div>
                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:0px;" class="input text">
                                       <?
                                       if(empty($this->data['Node']['Capacity_Available']) || $this->data['Node']['Capacity_Available'] == 0){
                                         
                                       echo $this->Form->input('Capacity_Available', array(
                                           'label' => false,
                                           'value' => 0,
                                           'placeholder' => __('Capacity_Available'),
                                       ));
                                       }
                                        else {
                                           echo $this->Form->input('Capacity_Available', array(
                                           'label' => false,
                                           //'value' => $this->data['Node']['Price'],
                                           'placeholder' => __('Capacity_Available'),
                                       ));  
                                        }
                                       ?>
                                    </div>
                                 </div>
                              </div>

                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Seats Available</strong>
                                    </div>
                                 </div>
                              </div>
                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                     <div style="margin-top:0px;" class="input text">
                                       <?
                                       if(empty($this->data['Node']['Seats_Available']) || $this->data['Node']['Seats_Available'] == 0){
                                         
                                       echo $this->Form->input('Seats_Available', array(
                                           'label' => false,
                                           'value' => 0,
                                           'placeholder' => __('Seats_Available'),
                                       ));
                                       }
                                        else {
                                           echo $this->Form->input('Seats_Available', array(
                                           'label' => false,
                                           //'value' => $this->data['Node']['Price'],
                                           'placeholder' => __('Seats_Available'),
                                       ));  
                                        }
                                       ?>
                                    </div>
                                 </div>
                              </div>


                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Deposit</strong>
                                    </div>
                                 </div>
                              </div>
                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:0px;" class="input text">
                                       <?
                                       echo $this->Form->input('Deposit', array(
                                           'label' => false,
                                           'placeholder' => __('Deposit'),
                                       ));
                                       ?>
                                    </div>
                                 </div>
                              </div>


                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Cancellation</strong>
                                    </div>
                                 </div>
                              </div>
                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:0px;" class="input text">
                                       <?
                                       echo $this->Form->input('Cancellation', array(
                                           'label' => false,
                                           'placeholder' => __('Cancellation'),
                                       ));
                                       ?>
                                    </div>
                                 </div>
                              </div>


                              <div style="float:left; width:20%" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:5px;" class="input text">
                                       <strong>Notes</strong>
                                    </div>
                                 </div>
                              </div>
                              <div style="float:left; width:80%;" class="meta">
                                 <div class="fields">
                                    <div style="margin-top:0px;" class="input text">
                                       <?
                                       echo $this->Form->input('Notes', array(
                                           'label' => false,
                                           'placeholder' => __('Notes'),
                                       ));
                                       ?>
                                    </div>
                                 </div>
                              </div>

                              <div class="clear"></div>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>

               <?
               //  meta code to retrieve  the data 
               if (!empty($this->data['Meta'])) {
                  $fields = Hash::combine($this->data['Meta'], '{n}.key', '{n}.value');
                  $fieldsKeyToId = Hash::combine($this->data['Meta'], '{n}.key', '{n}.id');
                  $fieldsKeyToId2 = Hash::combine($this->data['Meta'], '{n}.key', '{n}.value_x');
                  $fieldsKeyUsedByMeta = Hash::combine($this->data['Meta'], '{n}.key', '{n}.used_by_meta');
               } else {
                  $fields = $fieldsKeyToId = array();
               }
               $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Notes');
               ?>
               <div class="row-fluid">
                  <div class="span12">
                     <div class="box">
                        <div class="box-title">
                           <i class="icon-list"></i>
                           <strong>Pricing</strong>
                        </div>
                        <div class="box-content">
                           <div class="abc" id="meta-fields">
                              <div class="meta"  style="float:left; width:15%">
                                 <div class="fields">
                                    <div class="input text">
                                       <label><strong>Days</strong></label>

                                    </div>
                                 </div>
                              </div>

                              <div class="meta"  style="float:left; width:40%;">
                                 <div class="fields">
                                    <div class="input text">
                                       <label><strong>Hire</strong></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="meta" style="float:left; width:40%">
                                 <div class="fields">
                                    <div class="input text">
                                       <label><strong>Min Spend</strong></label>
                                    </div>
                                 </div>
                              </div>

                              <?
                              foreach ($days as $day) {
                                 $rand = rand(1, 1000000);

                                 if (array_key_exists('price_hire_' . strtolower($day), $fields)) {
                                    $value_hire_id = $fieldsKeyToId['price_hire_' . strtolower($day)];
                                    $value_hire = $fields['price_hire_' . strtolower($day)];
                                 } else {
                                    $value_hire_id = NULL;
                                    $value_hire = NULL;
                                 }

                                 if (array_key_exists('price_min_spend_' . strtolower($day), $fields)) {
                                    $value_min_spende_id = $fieldsKeyToId['price_min_spend_' . strtolower($day)];
                                    $value_min_spende = $fields['price_min_spend_' . strtolower($day)];
                                 } else {
                                    $value_min_spende_id = NULL;
                                    $value_min_spende = NULL;
                                 }

                                 if (array_key_exists('price_notes', $fields)) {
                                    $value_price_notes_id = $fieldsKeyToId['price_notes'];
                                    $value_price_notes = $fields['price_notes'];
                                 } else {
                                    $value_price_notes_id = NULL;
                                    $value_price_notes = NULL;
                                 }
                                 ?>  
                                 <div class="meta"  style="float:left; width:15%">
                                    <div class="fields">
                                       <div class="input text" style="margin-top:5px;">
      <?php echo $day; ?>
                                       </div>
                                    </div>
                                 </div>
      <? if ($day != 'Notes') { ?>
                                    <div class="meta"  style="float:left; width:40%;">
                                       <div class="fields">
                                          <div class="input text" style="margin-top:0px;">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="<?php echo $value_hire_id; ?>"   name="data[Meta][<?php echo $rand; ?>][id]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="price_hire_<? echo strtolower($day); ?>" name="data[Meta][<?php echo $rand; ?>][key]">
                                             <input type="text" id="Meta<?php echo $rand; ?>Key" class="span12" value="<? echo $value_hire ?>"  maxlength="255" data-title="Hire" data-trigger="focus" data-placement="right" placeholder="Hire"  name="data[Meta][<?php echo $rand; ?>][value]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="2" name="data[Meta][<?php echo $rand; ?>][used_by_meta]">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="meta" style="float:left; width:40%">
                                       <div class="fields">
                                          <div class="input text" style="margin-top:0px;">
         <? $rand = rand(1, 1000000); ?>
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="<?php echo $value_min_spende_id; ?>"   name="data[Meta][<?php echo $rand; ?>][id]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="price_min_spend_<? echo strtolower($day); ?>" name="data[Meta][<?php echo $rand; ?>][key]">
                                             <input type="text" id="Meta<?php echo $rand; ?>Key" class="span12" value="<? echo $value_min_spende ?>"  maxlength="255" data-title="Min Spend" data-trigger="focus" data-placement="right" placeholder="Min Spend"  name="data[Meta][<?php echo $rand; ?>][value]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="2" name="data[Meta][<?php echo $rand; ?>][used_by_meta]">
                                          </div>
                                       </div>
                                    </div>
      <? } else { ?> 
                                    <div class="meta"  style="float:left; width:80%;">
                                       <div class="fields">
                                          <div class="input text" style="margin-top:0px;">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="<?php echo $value_price_notes_id; ?>"   name="data[Meta][<?php echo $rand; ?>][id]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="price_<? echo strtolower($day); ?>" name="data[Meta][<?php echo $rand; ?>][key]">
                                             <input type="text" id="Meta<?php echo $rand; ?>Key" class="span12" value="<? echo $value_price_notes ?>"  maxlength="255" data-title="Notes" data-trigger="focus" data-placement="right" placeholder="Notes"  name="data[Meta][<?php echo $rand; ?>][value]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="2" name="data[Meta][<?php echo $rand; ?>][used_by_meta]">
                                          </div>
                                       </div>
                                    </div>

                                 <? } ?> 
   <? } ?> 
                              <div class="clear"></div>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>
               <style>
                  .clear{clear:both;}
               </style>
               <div class="row-fluid">
                  <div class="span12">
                     <div class="box">
                        <div class="box-title">
                           <i class="icon-list"></i>
                           Function Availabilities
                        </div>
                        <div class="box-content">
                           <div class="abc" id="meta-fields">
                              <div class="meta"  style="float:left; width:20%">
                                 <div class="fields">
                                    <div class="input text">
                                       <label for="Meta122Key">Days</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="meta"  style="float:left; width:70%">
                                 <div class="fields">
                                    <div class="input text">
                                       <label for="Meta122Key">Time Available</label>
                                    </div>
                                 </div>
                              </div>

                              <?
                              foreach ($days as $day) {
                                 $rand = rand(1, 1000000);

                                 if (array_key_exists('time_avail_' . strtolower($day), $fields)) {
                                    $value_time_avail_id = $fieldsKeyToId['time_avail_' . strtolower($day)];
                                    $value_time_avail = $fields['time_avail_' . strtolower($day)];
                                 } else {
                                    $value_time_avail_id = NULL;
                                    $value_time_avail = NULL;
                                 }
                                 if (array_key_exists('time_avail_notes', $fields)) {
                                    $value_time_avail_notes_id = $fieldsKeyToId['time_avail_notes'];
                                    $value_time_avail_notes = $fields['time_avail_notes'];
                                 } else {
                                    $value_time_avail_notes_id = NULL;
                                    $value_time_avail_notes = NULL;
                                 }
                                 ?>
                                 <div class="meta"  style="float:left; width:20%">
                                    <div class="fields">
                                       <div class="input text" style="margin-top:5px;">
                                          <strong><?php echo $day; ?></strong>
                                       </div>
                                    </div>
                                 </div>
      <? if ($day != 'Notes') { ?>
                                    <div class="meta"  style="float:left; width:70%;">
                                       <div class="fields">
                                          <div class="input text" style="margin-top:0px;">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="<?php echo $value_time_avail_id; ?>"   name="data[Meta][<?php echo $rand; ?>][id]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="time_avail_<? echo strtolower($day); ?>" name="data[Meta][<?php echo $rand; ?>][key]">
                                             <input type="text" id="Meta<?php echo $rand; ?>Key" class="span12" value="<? echo $value_time_avail ?>"  maxlength="255" data-title="Time Available" data-trigger="focus" data-placement="right" placeholder="Time Available"  name="data[Meta][<?php echo $rand; ?>][value]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="2" name="data[Meta][<?php echo $rand; ?>][used_by_meta]">
                                          </div>
                                       </div>
                                    </div>

      <? } else { ?>
                                    <div class="meta"  style="float:left; width:70%;">
                                       <div class="fields">
                                          <div class="input text" style="margin-top:0px;">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="<?php echo $value_time_avail_notes_id; ?>"   name="data[Meta][<?php echo $rand; ?>][id]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="time_avail_<? echo strtolower($day); ?>" name="data[Meta][<?php echo $rand; ?>][key]">
                                             <input type="text" id="Meta<?php echo $rand; ?>Key" class="span12" value="<? echo $value_time_avail_notes ?>"  maxlength="255" data-title="Notes" data-trigger="focus" data-placement="right" placeholder="Notes"  name="data[Meta][<?php echo $rand; ?>][value]">
                                             <input type="hidden" id="Meta<?php echo $rand; ?>Key" class="span12" value="2" name="data[Meta][<?php echo $rand; ?>][used_by_meta]">
                                          </div>
                                       </div>
                                    </div>

                                 <? } ?>
   <? } ?>
                              <div class="clear"></div>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>

               <? //*/ ?>
               <?
               if (array_key_exists('head_title_x', $fields)) {
                  $value_head_title_x_id = $fieldsKeyToId['head_title_x'];
                  $value_head_title_x = $fields['head_title_x'];
               } else {
                  $value_head_title_x_id = NULL;
                  $value_head_title_x = NULL;
               }

               if (array_key_exists('thumbnail_id', $fields)) {
                  $value_thumbnail_id = $fieldsKeyToId['thumbnail_id'];
                  $value_thumbnail_value = $fields['thumbnail_id'];
               } else {
                  $value_thumbnail_id = NULL;
                  $value_thumbnail_value = NULL;
               }

               if (array_key_exists('venue_download', $fields)) {
                  $venue_download_id = $fieldsKeyToId['venue_download'];
                  $venue_download_value = $fields['venue_download'];
               } else {
                  $venue_download_id = NULL;
                  $venue_download_value = NULL;
               }
               ?>


               <div class="input text required">
                  <label for="NodeParentId">Downloads</label>
                  <input type="hidden" id="Meta1234Key" class="span12" value="<?php echo $venue_download_id; ?>"   name="data[Meta][1234][id]">
                  <input type="hidden" id="Meta1234Key" class="span12" value="venue_download"   name="data[Meta][1234][key]">
                  <textarea id="Meta1234Key" class="span12 ckeditor" name="data[Meta][1234][value]" ><?php echo $venue_download_value; ?></textarea>
                  <input type="hidden" id="Meta1234Key" class="span12" value="0" name="data[Meta][1234][used_by_meta]">
               </div>



               <?
               /** end of  meta code to retrieve  the data * */
               echo '</div>';
               echo '<div id="parent_map">';
               echo $this->Form->input('Map', array(
                   'label' => __('Map Address'),
                   'placeholder' => __('Map Address'),
               ));
               echo '</div>';
               ?>

               <? /* ?>

                 <script>
                 function upload_image(){
                 $.ajax({
                 dataType: "html",
                 type: "GET",
                 evalScripts: true,
                 url: '<?php echo Router::url(array('controller' => 'nodes', 'action' => 'image_upload')); ?>',
                 data: ({id:$('#Meta123456Key').val()}),
                 success: function (data){
                 alert(data);
                 }
                 });
                 }

                 $(document).ready(function(){
                 //                     $('#upload_image').click(function(){ alert($('#Meta123456Key').val());
                 //                        if($('#Meta123456Key').val()!=''){
                 //                           upload_image();
                 //                        }
                 //                     })
                 })


                 //                  $(document).ready(function(){
                 //                     $("#upload").live("click", function() {
                 //                        var file_data = $("#avatar").prop("files")[0];   // Getting the properties of file from file field
                 //                        var form_data = new FormData();                  // Creating object of FormData class
                 //                        form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
                 //                        form_data.append("user_id", 123)                 // Adding extra parameters to form_data
                 //                        $.ajax({
                 //                           url: "/upload_avatar",
                 //                           dataType: 'script',
                 //                           cache: false,
                 //                           contentType: false,
                 //                           processData: false,
                 //                           data: form_data,                         // Setting the data attribute of ajax with file_data
                 //                           type: 'get'
                 //                        })
                 //                     })

                 $(document).ready(function()
                 {
                 $('#Meta123456Key').live('change', function()
                 {
                 $("#preview").html('');
                 $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
                 var file_data = $("#Meta123456Key").prop("files")[0];   // Getting the properties of file from file field
                 var form_data = new FormData();

                 //                        $("#NodeAdminEditForm").ajaxForm(
                 //                        {
                 //                           target: '#preview'
                 //                        }).submit();
                 //
                 form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
                 form_data.append("user_id", 123)
                 $.ajax(
                 {
                 url: '<?php echo Router::url(array('controller' => 'nodes', 'action' => 'image_upload')); ?>',
                 cache: false,
                 contentType: 'multipart/form-data',
                 processData: true,
                 data: form_data,                         // Setting the data attribute of ajax with file_data
                 type: 'POST'
                 });
                 });
                 });

                 </script>




                 <div class="input text required">
                 <label for="NodeParentId">Upload Image</label>
                 <input type="hidden"  class="span12" value="<?php echo $value_thumbnail_id; ?>"   name="data[Meta][123456][id]">
                 <input type="hidden"  class="span12" value="thumbnail_id"   name="data[Meta][123456][key]">
                 <input type="file" id="Meta123456Key" class="span12" value="<?php echo $value_thumbnail_value; ?>"   name="data[Meta][123456][value]"  data-title="Heading title" data-trigger="focus" data-placement="right">
                 <a id="upload_image" style="cursor:pointer;">Upload Image</a>
                 <input type="hidden"  class="span12" value="0" name="data[Meta][123456][used_by_meta]">
                 </div>
                 <div id='preview'></div>
                 <? */ ?>

               <?php
            }

            // echo $ajaxupload->upload('upload_button', array('controller' => 'image', 'action' => 'upload')); 

            echo '<div class="clear" style="line-height:10px;">&nbsp;</div>';
            if ($typeAlias != 'node') {
               echo $this->Croogo->adminBoxes();
            }
            ?>

         </div>

         <div id="node-access" class="tab-pane">
<?php echo $this->Form->input('Role.Role', array('class' => false)); ?>
         </div>

         <?php
         echo $this->Croogo->adminTabs();
         echo '<div class="clear" style="line-height:10px;">&nbsp;</div>';

// echo $this->Croogo->adminBoxes();
         ?>



      </div>

   </div>
   <div class="span4">
      <?php
      echo $this->Html->beginBox(__('Publishing')) .
      $this->Form->button(__('Apply'), array('name' => 'apply', 'class' => 'btn')) .
      $this->Form->button(__('Save'), array('class' => 'btn btn-primary')) .
      $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'cancel btn btn-danger')) .
      $this->Form->input('status', array(
          'label' => __('Published'),
          'checked' => 'checked',
          'class' => false,
      )) .
      $this->Form->input('promote', array(
          'label' => __('Promoted to front page'),
          'checked' => 'checked',
          'class' => false,
      )) .
      $this->Form->input('user_id', array(
          'label' => __('Publish as '),
      )) .
      $this->Form->input('created', array(
          'type' => 'text',
          'class' => 'span10',
      ));

      echo $this->Html->endBox();
      ?>
   </div>
</div>
<?php echo $this->Form->end(); ?>