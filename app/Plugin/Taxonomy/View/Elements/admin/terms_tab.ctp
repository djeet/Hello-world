<?php
if (count($taxonomy) > 0):
	$taxonomyIds = Hash::extract($this->data, 'Taxonomy.{n}.id');
	foreach ($taxonomy as $vocabularyId => $taxonomyTree):
		echo '<div class="tax_layout">'.$this->Form->input('TaxonomyData.' . $vocabularyId, array(
			'label' => $vocabularies[$vocabularyId]['title'],
			'type' => 'select',
			'multiple' => true,
			'options' => $taxonomyTree,
			'value' => $taxonomyIds,
			'class' => false,
			)).'</div>';
	endforeach;
endif;
?>
<div style="clear:both;"></div>
<!--<div>hello Brother</div>-->