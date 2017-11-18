<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reveal.js@3.5.0/css/reveal.css">
	<link rel="stylesheet" href="<?php echo "https://cdn.jsdelivr.net/npm/reveal.js@3.5.0/css/theme/$theme.css"; ?>">
	<link rel="stylesheet" href="/assets/intro.css">
</head>
<body>
	<div class="reveal">
		<div class="slides">
			<?php echo $sections; ?>
		</div>
	</div>

	<script src='https://cdn.jsdelivr.net/npm/reveal.js@3.5.0/js/reveal.min.js'></script>
	<script>
		Reveal.initialize();
	</script>
</body>
</html>
