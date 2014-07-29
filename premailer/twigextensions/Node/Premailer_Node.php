<?php

namespace Craft;

class Premailer_Node extends \Twig_Node
{
	public function compile(\Twig_Compiler $compiler)
	{
		$options = $this->getNode('options');
		
		$compiler
			->write("ob_start();\n")
			->subcompile($this->getNode('body'))
			->write("\$body = ob_get_clean();\n")
			->write("echo \Craft\craft()->premailer->compile(\$body");
			
		if($options)
		{
			$compiler
				->raw(",")
				->subcompile($options);
		}
			
		$compiler->raw(");\n");
	}
}