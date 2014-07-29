<?php

namespace Craft;

class PremailerPlugin extends BasePlugin
{
	function getName()
	{
		 return Craft::t('Premailer');
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'Roi Kingon';
	}

	function getDeveloperUrl()
	{
		return 'http://www.roikingon.com';
	}
	
	public function addTwigExtension()
	{
		Craft::import('plugins.premailer.twigextensions.PremailerTwigExtension');
		return new PremailerTwigExtension();
	}
}