# Deck Server 

An app to serve a Markdown file as a slide deck in your browser. [Check out the live demo](http://kyk.kiekies.net)

### What it does

You might have some notes on a topic in markdown. This can become your slide deck for a talk by simply chopping the content up in screen-sized chunks, like this:

```
# Cambodia

--------------------

- Capital: Phnom Penh
- 15 million people
- Khmer language
- King Norodom Sihamoni

--------------------

## Flag

![](https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg)

--------------------

![](https://player.vimeo.com/video/22093145)

```

and feeding the note to Deck Server. You can either paste the notes into the app or host your deck file on the internet. 

Here is a running instance of the app which also has more detailed usage instructions: [http://kyk.kiekies.net](http://kyk.kiekies.net)

### Installation

To install Deck Server locally, clone the repository and install the vendor dependencies:

```
composer install
```

We just link to CDN assets so there is no build step. Simply point your webserver to the `/public` folder and enjoy. If you don't need to present offline, you are welcome to just use the hosted instance referenced above.

### Testing

To run the unit tests:

```
vendor/bin/phpunit
```

### Configuration

Under the hood we are standing on the shoulders of giants. Most notably [reveal.js](https://github.com/hakimel/reveal.js) and [cebe/markdown](https://github.com/cebe/markdown)

If you want to change the flavour of Markdown to GFM or need the features of Markdown Extra, you can replace the parser in `app/Deck.php` class.

If you want to tweak the reveal.js slideshow player defaults, you can do that at the bottom of the `views/layout.php` file.

### Contributing

Hey, who knows where this can go? Pull requests wellcome!