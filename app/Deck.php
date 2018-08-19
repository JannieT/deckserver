<?php

namespace App;

class Deck 
{

	protected $source;
	protected $path = null;

	public function __construct($source, $path = null)
	{
		$this->source = $source;
		if ( is_null($path) ) return;

		// parse the path
		$pieces = explode('/', $path);
		array_pop($pieces);
		$this->path = implode('/', $pieces);

	}

	public function parsed()
	{
		$parser = new SafeMarkdown();
		$raw = $parser->parse($this->source);
		$slides = array_map(function($content) {
			$slide = new Slide($content, $this->path);
			return $slide->render();
		}, explode('<hr>', $raw));

		return implode("\n", $slides);
	}

	public static function slides($source, $path = null)
	{
		$deck = new Deck($source, $path);
		return $deck->parsed();
	}

}
