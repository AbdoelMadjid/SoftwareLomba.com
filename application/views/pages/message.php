<?php
echo $message.'<br/>';
echo 'you will be redirected in 2 seconds, if not please click <a href="'.base_url().$next.'">here</a>';
?>
<script>
setTimeout(function(){
  window.location.href = '<?php echo base_url().$next;?>';
},2000)
</script>