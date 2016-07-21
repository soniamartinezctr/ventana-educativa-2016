<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>Parallax.js | Simple Example</title>

	<!-- Behavioral Meta Data -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="js/parallaxCapas/examples/styles/styles.css"/>

</head>
<body>

	<div id="container" class="container">
		<ul id="scene" class="scene">
			<li class="layer" data-depth="1.00"><img src="imagenes/ventana/parallaxCapas/layer1.png"></li>
			<li class="layer" data-depth="0.80"><img src="imagenes/ventana/parallaxCapas/layer2.png"></li>
			<li class="layer" data-depth="0.60"><img src="imagenes/ventana/parallaxCapas/layer3.png"></li>
			<li class="layer" data-depth="0.40"><img src="imagenes/ventana/parallaxCapas/layer4.png"></li>
			<li class="layer" data-depth="0.20"><img src="imagenes/ventana/parallaxCapas/layer5.png"></li>
			<li class="layer" data-depth="0.00"><img src="imagenes/ventana/parallaxCapas/layer6.png"></li>
		</ul>
	</div>

	<!-- Scripts -->
	<script src="js/parallaxCapas/source/parallax.js"></script>
	<script>

	// Pretty simple huh?
	var scene = document.getElementById('scene');
	var parallax = new Parallax(scene);

	</script>

</body>
</html>
