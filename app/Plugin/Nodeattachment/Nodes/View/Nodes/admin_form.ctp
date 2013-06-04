<?php
$this->extend('/Common/admin_edit');
$this->Html->script(array('Nodes.nodes'), false);

$this->Html
        ->addCrumb('', '/admin', array('icon' => 'home'))
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
            echo $this->Form->input('parent_id', array('type' => 'select', 'options' => $nodes, 'empty' => true));
            echo $this->Form->input('id');
            $this->Form->inputDefaults(array(
                'class' => 'span10',
            ));
            echo $this->Form->input('title', array(
                'label' => false,
                'placeholder' => __('Title'),
            ));
            echo $this->Form->input('slug', array(
                'label' => false,
                'readonly'=>true,
                'class' => 'span10 slug',
                'placeholder' => __('Slug'),
            ));
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


            if ($typeAlias == 'node') {
               ?>
               <script>
                  $(document).ready(function(){
                     if($('#NodeParentId').val()==''){
                        $('#event_child').hide();
                     }
                     $('#NodeParentId').change(function(){
                        // alert($('#NodeParentId').val());
                        $.ajax({
                           dataType: "html",
                           type: "POST",
                           evalScripts: true,
                           url: '<?php echo Router::url(array('controller' => 'nodes', 'action' => 'parentget')); ?>',
                           data: ({id:$('#NodeParentId').val()}),
                           success: function (data){
                              alert(data);
                           }
                        });
                        //<?php //  echo Router::url(array('controller' => 'nodes', 'action' => 'parent_get'));         ?>',    
                                                     
                        if($('#NodeParentId').val()==''){
                           $('#event_child').hide();
                        }else{
                           $('#event_child').show();
                        }
                     })
                  })   
               </script>
               <?php
               echo '<div id="event_child">';
               echo $this->Form->input('Price', array(
                   'label' => false,
                   'placeholder' => __('Price'),
               ));
               echo $this->Form->input('Capacity_Available', array(
                   'label' => false,
                   'placeholder' => __('Capacity_Available'),
               ));
               echo $this->Form->input('Seats_Available', array(
                   'label' => false,
                   'placeholder' => __('Seats_Available'),
               ));
               echo $this->Form->input('Deposit', array(
                   'label' => false,
                   'placeholder' => __('Deposit'),
               ));
               echo $this->Form->input('Cancellation', array(
                   'label' => false,
                   'placeholder' => __('Cancellation'),
               ));
               echo $this->Form->input('Notes', array(
                   'label' => false,
                   'placeholder' => __('Notes'),
               ));
               echo '</div>';
               echo $this->Form->input('Map', array(
                   'label' => false,
                   'placeholder' => __('Map Address'),
               ));
            }
            
            /**  meta code to retrieve  the data * */
            if (!empty($this->data['Meta'])) {
               $fields = Hash::combine($this->data['Meta'], '{n}.key', '{n}.value');
               $fieldsKeyToId = Hash::combine($this->data['Meta'], '{n}.key', '{n}.id');
               $fieldsKeyToId2 = Hash::combine($this->data['Meta'], '{n}.key', '{n}.value_x');
               $fieldsKeyUsedByMeta = Hash::combine($this->data['Meta'], '{n}.key', '{n}.used_by_meta');
            } else {
               $fields = $fieldsKeyToId = array();
            }

            if (count($fields) > 0) {
               foreach ($fields as $fieldKey => $fieldValue) {
                  if (!$fieldsKeyUsedByMeta[$fieldKey]) {
                     ?>
                     <div class="input text required">
                         <label for="NodeParentId">Heading Title</label>
                        <input type="hidden" id="Meta12345Key" class="span12" value="<?php echo $fieldKey; ?>"   name="data[Meta][12345][key]">
                        <input type="text" id="Meta12345Key" class="span12" value="<?php echo $fieldValue; ?>"   name="data[Meta][12345][value]"  data-title="Heading title" data-trigger="focus" data-placement="right" placeholder="Heading title" >
                        <input type="hidden" id="Meta12345Key" class="span12" value="0" name="data[Meta][12345][used_by_meta]">
                     </div>               
                     <?
                  }
                  //,array('key'=>array('type'=>'select','options'=>array(1,2,3)))
               }
            } else {
               ?>
               <div class="input text required">
                  <label for="NodeParentId">Heading Title</label>
                  <input type="hidden" id="Meta12345Key" class="span12" value=""   name="data[Meta][12345][key]">
                  <input type="text" id="Meta12345Key" class="span12" value=""  maxlength="255" data-title="Heading title" data-trigger="focus" data-placement="right" placeholder="Heading title"  name="data[Meta][12345][value]">
                  <input type="hidden" id="Meta12345Key" class="span12" value="0" name="data[Meta][12345][used_by_meta]">
               </div>
               <?
            }
     
              
            /** end of  meta code to retrieve  the data * */
            ?>

         </div>

            <div id="node-access" class="tab-pane">
               <?php echo $this->Form->input('Role.Role', array('class' => false)); ?>
            </div>

         <?php
          echo $this->Croogo->adminTabs();
          echo '<div class="clear" style="line-height:10px;">&nbsp;</div>';

          echo $this->Croogo->adminBoxes();
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