<?php

use App\Deck;
use App\Slide;

class ParseTest extends PHPUnit\Framework\TestCase
{

    /** @test */
    public function it_parses_background_movies()
    {
        $movie = '<img src="http://slides.com/joy.mp4" alt="hmmm" />';
        $expected = '<section data-background-video="http://slides.com/joy.mp4"></section>';
        $slide = new Slide($movie);
        $this->assertSame($expected, $slide->render());
    }


    /** @test */
    public function it_expands_relative_paths()
    {
        $imageTag = '<img src="image1.jpg" alt="hmmm" />';
        $slide = new Slide($imageTag, "http://slides.com");
        $expected = '<section data-background-image="http://slides.com/image1.jpg"></section>';
        $this->assertSame($expected, $slide->render());

        $imageTag = '<p>Test</p>' . "\n" . '<p><img src="image1.jpg" alt="hmmm" /></p>';
        $slide = new Slide($imageTag, "http://slides.com");
        $expected = '<section><p>Test</p><p><img src="http://slides.com/image1.jpg" alt="hmmm" /></p></section>';
        $this->assertSame($expected, $slide->render());

        $imageTag = '<p>Test</p>' . "\n" . '<p><img src="https://another.com/image1.jpg" alt="hmmm" /></p>';
        $slide = new Slide($imageTag, "http://slides.com");
        $expected = '<section><p>Test</p><p><img src="https://another.com/image1.jpg" alt="hmmm" /></p></section>';
        $this->assertSame($expected, $slide->render());


    }

    /** @test */
    public function it_parses_background_images()
    {
        $md_image = "![hmmm](image1.jpg)\n\none\n\n------\ntwo";
        $expected = <<<EOS
<section data-background-image="image1.jpg"><p>one</p></section>
<section><p>two</p></section>
EOS;
        $deck = new Deck($md_image);
        $this->assertSame($expected, $deck->parsed());

    	$inline = "one\n\n![hmmm](image1.jpg)\n\n------\ntwo";
        $expected = <<<EOS
<section><p>one</p><p><img src="image1.jpg" alt="hmmm" /></p></section>
<section><p>two</p></section>
EOS;
        $deck = new Deck($inline);
        $this->assertSame($expected, $deck->parsed());

    }

	/** @test */
    public function it_does_slides()
    {
    	$deck = new Deck("one\n\n------\n\ntwo");
        $expected = <<<EOS
<section><p>one</p></section>
<section><p>two</p></section>
EOS;
    	$this->assertSame($expected, $deck->parsed());
    }
}