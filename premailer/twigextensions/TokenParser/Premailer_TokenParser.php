<?php

namespace Craft;

class Premailer_TokenParser extends \Twig_TokenParser
{
	
	public function getTag()
	{
		return 'premailer';
	}
	
	public function decidePremailerEnd(\Twig_Token $token)
	{
		return $token->test('endpremailer');
	}

	public function parse(\Twig_Token $token)
	{
		Craft::import('plugins.premailer.twigextensions.Node.Premailer_Node');
		
		$lineno = $token->getLine();
		$stream = $this->parser->getStream();
		
		$nodes = array(
			"body" => null,
			"options" => null
		);
		$attributes = array();
		
		if ($stream->test(\Twig_Token::NAME_TYPE, 'with'))
		{
			$stream->next();
			$nodes['options'] = $this->parser->getExpressionParser()->parseExpression();
		}
		
		$stream->expect(\Twig_Token::BLOCK_END_TYPE);
		
		$nodes['body'] = $this->parser->subparse(array($this, 'decidePremailerEnd'), true);
		
		$stream->expect(\Twig_Token::BLOCK_END_TYPE);
		
		return new Premailer_Node($nodes, $attributes, $lineno, $this->getTag());
	}
}
