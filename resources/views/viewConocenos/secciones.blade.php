<!--	********* Incluir Jquery	***************	-->
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->
<script src="js/ScrollMagic/scrollmagic/uncompressed/ScrollMagic.js"></script>
<script src="js/ScrollMagic/js/lib/greensock/plugins/debug.addIndicators.js" ></script>
<script src="js/ScrollMagic/js/lib/greensock/TweenMax.min.js"></script>
<script src="js/ScrollMagic/js/lib/greensock/plugins/animation.gsap.js" ></script>
<link rel="stylesheet" href="js/ScrollMagic/css/style.css" type="text/css">
<link rel="stylesheet" href="js/ScrollMagic/css/examples.css" type="text/css">
<script>
	// init controller
	var controller = new ScrollMagic.Controller();
</script>
<div id="content-wrapper">
	<div id="example-wrapper">
		<div class="scrollContent" style="height:1500px;">
			<section class="demo" >
				<div class="spacer s2" style="height:200px;"></div>
				<div id="trigger1" class="spacer s0"></div>
				<div id="animate1" class="box1 skin" style="left: -100px;">
					<p>tick. tack.</p>
				<a href="#" class="viewsource">view source</a>
				</div>
				<div class="spacer s2"></div>
			</section>
		</div>
	</div>
</div>
<script>
	// build tween
	var tween = TweenMax.fromTo("#animate1", 1,
								{left: -100},
								{left: 100, repeat: -1, yoyo: true, ease: Circ.easeInOut}
							);
	// build scene
	var scene = new ScrollMagic.Scene({triggerElement: "#trigger1", duration: 200, offset: -50})
					.setTween(tween)
					.addIndicators({name: "loop"}) // add indicators (requires plugin)
					.addTo(controller);
</script>
