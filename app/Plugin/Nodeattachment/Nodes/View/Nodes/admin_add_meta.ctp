<?php

Configure::write('debug', 0);
// echo 'hello';
?>
<script>
   $(document).ready(function(){
      var len = $('.pk').length ;
      var heading_page = $('#NodeSlug').val();
      $('.pk:last').val(heading_page+'_'+len);
   })
</script>
<?php

echo $this->Meta->field($key);
?>