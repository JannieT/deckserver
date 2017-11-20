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
				<option>league</option>
				<option selected>beige</option>
				<option>black</option>
				<option>blood</option>
				<option>moon</option>
				<option>night</option>
				<option>serif</option>
				<option>simple</option>
				<option>sky</option>
				<option>solarized</option>
				<option>white</option>
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