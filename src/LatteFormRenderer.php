<?php declare(strict_types = 1);

namespace WebChemistry\FormLatteRenderer;

use Latte\Engine;
use Nette\Bridges\ApplicationLatte\LatteFactory;
use Nette\Bridges\FormsLatte\FormMacros;
use Nette\Bridges\FormsLatte\FormsExtension;
use Nette\Forms\Form;
use Nette\Forms\FormRenderer;
use WebChemistry\FormLatteRenderer\Template\LatteFormTemplate;

class LatteFormRenderer implements FormRenderer
{

	public function __construct(
		private string $template,
		private LatteFormTemplate $object,
		private LatteFactory $latteFactory,
	)
	{
	}

	public function render(Form $form): string
	{
		$this->object->form = $form;

		$engine = $this->latteFactory->create();
		if (version_compare(Engine::VERSION, '3', '<')) {
			$engine->onCompile[] = function (Engine $engine): void {
				FormMacros::install($engine->getCompiler());
			};
		} else {
			$engine->addExtension(new FormsExtension());
		}

		return $engine->renderToString($this->template, $this->object);
	}

}
