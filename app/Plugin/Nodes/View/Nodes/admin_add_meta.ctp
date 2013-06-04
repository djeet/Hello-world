<?php

Configure::write('debug', 0);
// echo 'hello';
?>
<script>
   $(document).ready(function(){
      var len = $('.pk').length ;
      var heading_page = $('#NodeSlug').val();
      if(len==1 && heading_page != ''){
         $('.pk:last').val(heading_page+'_'+len);
         $('.abc').show();
      }else if(len > 1 && heading_page != ''){
         var num = len - 2 ;
         heading_page = $('.pk').eq(num).val().split('_');
         var ken = 1 ;
         len = parseInt(heading_page[1],10) + parseInt(ken,10);
         $('.pk:last').val(heading_page[0]+'_'+len);
         $('.abc').show();
      }else{
         alert('please Input the title before adding extra fields.');
         $('.abc').hide();
      }
   })
</script>
<?php

echo $this->Meta->field($key);
?>