<?php $req30=$bdd1->query("SELECT * FROM colors");
$col=$req30->fetch();
//background page
$bacColP=$col['bacColP'];
//color page
$colP=$col['colP'];
?>
<footer>
<script>
	$(document).ready(function(){
    $( "body" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
    });    
</script>
</footer>