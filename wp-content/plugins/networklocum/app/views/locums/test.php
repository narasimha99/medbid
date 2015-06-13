<div class="midcol">

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="http://fancyapps.com/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Wrap it inside a hidden div so it won't show on load -->
<div style="display:none">
    <div id="myDivID">
         <span>Hey this is what is shown inside fancybox.</span>
         <span>Apparently I can show all kinds of stuff here!</span>
         <img src="../images/unicorn.png" alt="" />
         <input type="text" value="Add some text here" />
    </div>
</div>

<a href="#myDivID" id="fancyBoxLink">Click me to show this awesome div</a>


<script type="text/javascript">
    $("a#fancyBoxLink").fancybox({
        'href'   : '#myDivID',
        'titleShow'  : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic'
    });
	//$("#fancybox-title").show();

</script>

<div style="display:none">
	<form id="login_form" method="post" action="">
	    	<p id="login_error">Please, enter data</p>
		<p>
			<label for="login_name">Login: </label>
			<input type="text" id="login_name" name="login_name" size="30" />
		</p>
		<p>
			<label for="login_pass">Password: </label>
			<input type="password" id="login_pass" name="login_pass" size="30" />
		</p>
		<p>
			<input type="submit" value="Login" />
		</p>
		<p>
		    <em>Leave empty so see resizing</em>
		</p>
	</form>
</div>
</div>
