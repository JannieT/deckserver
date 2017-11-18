<?php

namespace App;


class Slide 
{

	protected $content;
	protected $background;
	protected $path;

	public function __construct($content, $path = "")
	{
		$this->content = $content;
		$this->path = $path;
		$this->background = "";
	}

	private function parse()
	{
		$lines = explode("\n", $this->content);


		// remove blank lines
		$lines = array_values(array_filter($lines, function($line){
			return !empty(trim($line));
		}));

		if (empty($lines)) {
			$this->content = "&nbsp;";
			return;
		}

		// extract background
		if (preg_match('/img src="(.+?)" alt="(.*?)"/', $lines[0], $matches)) {
			$this->background = $this->getBackGround($matches[1]);
			array_shift($lines);
		}

		foreach ($lines as $key => $line) {
			$lines[$key] = $this->fixLinks($line);
		}

		$this->content = implode("", $lines);
	}

	private function fixLinks($line)
	{
		return preg_replace_callback(
			'/src="(.+?)"/', 
			function($matches) {
				return 'src="' . $this->qualifiedPath($matches[1]) .'"';
			},
			$line
		);
	}

	private function getBackGround($src)
	{
		$src = $this->qualifiedPath($src);
		
		if (preg_match('/\.(mov|mp4|webm)$/', $src) == 1) {
			return ' data-background-video="' . $src . '"';
		}

		if (preg_match('/\.(jpeg|jpg|png|gif|svg)$/', $src) == 1) {
			return ' data-background-image="' . $src . '"';
		}

		return ' data-background-iframe="' . $src . '"';
	}

	private function qualifiedPath($relative)
	{
		if ($this->path == "") return $relative;
		if (substr($relative, 0, 4) == "http") return $relative;
		return $this->path . "/" . $relative;
	}

	public function render()
	{
		$this->parse();
		return "<section" . $this->background . ">" 
			. $this->content
			. "</section>";
	}

}
