<div id="meta-fields" class="abc">
   <?php
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
         if ($fieldsKeyUsedByMeta[$fieldKey] == 1) {
            echo $this->Meta->field($fieldKey, $fieldValue, $fieldsKeyToId2[$fieldKey], $fieldsKeyToId[$fieldKey]);
         }
         //,array('key'=>array('type'=>'select','options'=>array(1,2,3)))
      }
   }
   ?>
   <div class="clear"></div>
</div>
<?php
echo $this->Html->link(
        __('Add Box'), array('action' => 'add_meta'), array('class' => 'add-meta')
);
?>
