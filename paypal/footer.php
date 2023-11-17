<?php $req30=$bdd1->query("SELECT * FROM colors");
$col=$req30->fetch();
//background page
$bacColP=$col['bacColP'];
//color page
$colP=$col['colP'];
?>
<footer>
<script>
	//recup 
	var pageCol=document.getElementById('bloc_page');
		//background
		pageCol.style.backgroundColor="<?php echo $bacColP;?>";
		pageCol.style.color="<?php echo $colP;?>";
</script>
</footer>