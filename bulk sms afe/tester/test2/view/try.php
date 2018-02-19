<?php
$s = array('a','b','c','d','e','f') ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>

	<script type="text/javascript">
		function hello(){
			var htmlString = "<?php $me = 'Anthony'; ?>";
			alert(htmlString);
		}
	</script>
</head>

<body>
	Hi!

	<script type="text/javascript">
		<?php foreach($s as $a){ ?>

			alert('<?=$a?>');

			<?php } ?>
		</script>
	</body>
	</html>
