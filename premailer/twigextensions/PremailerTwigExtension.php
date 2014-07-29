<?php

namespace Craft;

class PremailerTwigExtension extends \Twig_Extension
{
	public function __construct()
	{
		
	}

	public function getName()
	{
		return 'premailer';
	}

	public function getTokenParsers()
	{
		Craft::import('plugins.premailer.twigextensions.TokenParser.Premailer_TokenParser');
		return array(
			new Premailer_TokenParser()
		);
	}
}