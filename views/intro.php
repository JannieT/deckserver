<section>
	<div class="intro">Submit a link to your hosted slide file or paste the file content below</div>
	<form method="POST" action="/">
		<div id="wrap">
			
		<div class="fake-area">
			
		<textarea name="slides"># Topic

-------------------

## Slide two

to start a new slide   
leave one line blank   
and draw a line:  

-------------------

Points for slide three

- Monday
- Tuesday
- Any day</textarea>
		</div>

		<div>
			<select name="theme" onchange="onChanged(this)">
				<option data-hue="#42affa" selected>league</option>
				<option data-hue="#c0a86e">beige</option>
				<option data-hue="#42affa">black</option>
				<option data-hue="#a23">blood</option>
				<option data-hue="#268bd2">moon</option>
				<option data-hue="#e7ad52">night</option>
				<option data-hue="#51483D">serif</option>
				<option data-hue="#00008B">simple</option>
				<option data-hue="#3b759e">sky</option>
				<option data-hue="#268bd2">solarized</option>
				<option data-hue="#2a76dd">white</option>
			</select>
			<input type="submit" name="submit" value="Show" />
		</div>
			
		</div>
	</form>
</section>

<section class="docs">
	<h3>Building your deck</h3>
	<p>Use <a href="http://commonmark.org/help/" target="_blank">Markdown</a> to write your slides</p>
	<p>If the first line of a slide is an image element, then it will be used for the background.</p>
</section>

<section class="docs">
	<h3>Sharing your deck</h3>

	<p>If you prefer to host your deck file on the internet so that you can share your slide show, you can enter the url of your hosted file instead of the slide content.</p> 

	<p>It might look like <a href="/?src=https://ccwaterkloof.github.io/prayer/slides/cambodia.md&theme=beige" target="_blank">this</a>.</p>
</section>

<section class="docs">
	<h3>More on backgrounds</h3>
	<p>If the image url ends with jpeg, png, gif or svg the slide will have an image background</p>
	<p>If the url ends in webm, mp4 or mov it will have a video background</p>
	<p>Any other url will set the slide to have an iframe background</p>
</section>

<section class="docs">
	<h3>More on sharing</h3>
	<p>You can use relative urls for assets linked in your slides if those assets are hosted in the same folder as your deck file.</p>
	<p>This is useful for preparing an offline presentation and later moving it online.</p>
</section>

<section class="docs">
	<p>Fork me on <a href="https://github.com/JannieT/deckserver" target="_blank">Github</a></p>
</section>

<script>
	(function(document, window) {

		
		var setTheme = function(theme, hue) {
			var themeLink = 'https://cdn.jsdelivr.net/npm/reveal.js@3.5.0/css/theme/' + theme + '.css';
			document.getElementById('theme').setAttribute('href', themeLink);


			var frame = document.querySelector('div.fake-area');
			frame.style['box-shadow'] = '0px 0px 12px 0px ' + hue;

			var dropdown = document.querySelector('select');
			dropdown.style['color'] = hue;
			dropdown.style['border-color'] = hue;

			var button = document.querySelector('input');
			button.style['color'] = hue;
			button.style['border-color'] = hue;

		}

		window.onChanged = function(e) {
			setTheme(e.value, e.selectedOptions[0].dataset.hue);
		};

		setTheme('league', '#42affa');

	})(document, window);
</script>