<?php

namespace App;

class Controller 
{
	const DEFAULT_THEME = "league";

	public $sections;
	public $theme;
	protected $redirect;

	public function __construct($get, $post)
	{
		$this->theme = $this->getTheme($get, $post);
		$this->redirect = $this->getRedirect($post);
		if ($this->redirect != null) return;

		$this->sections = $this->getSections($get, $post);
	}

	public function showRemote()
	{
		if ($this->redirect == null) return;
		header($this->redirect, true, 302);
		die();
	}

	protected function getRedirect($post)
	{
		if (!isset($post['slides'])) return null;

	    $slides = $this->sanitize($post['slides']);

		if (preg_match('/^http/', $slides) == 1) {
			$url = explode("\n", $slides)[0];
			return "Location: ?src=$url&theme={$this->theme}";
	    }

	    return null;
	}
	
	protected function getSections($get, $post)
	{
		if (isset($post['slides'])) {
	    	$slides = $this->sanitize($post['slides']);
		    return Deck::slides($slides);
		}

		if (isset($get['src'])) {
			$path = $this->sanitize($get['src']);
		    $source = $this->sanitize(Hosted::fetch($path));
			return Deck::slides($source, $path);
		}

		ob_start();
		include '../views/intro.php';
		return ob_get_clean();
	}


	protected function getTheme($get, $post)
	{
		if (isset($get['theme'])) return $this->sanitize($get['theme']);
		if (isset($post['theme'])) return $this->sanitize($post['theme']);

		return self::DEFAULT_THEME;
	}

    protected function sanitize($dangerous)
    {
        return strip_tags($dangerous);
        // return htmlspecialchars($dangerous); doesn't strip php tags
    }

}
