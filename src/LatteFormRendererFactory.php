<?php declare(strict_types = 1);

namespace WebChemistry\FormLatteRenderer;

use Nette\Bridges\ApplicationLatte\LatteFactory;
use Nette\Forms\FormRenderer;
use WebChemistry\FormLatteRenderer\Template\LatteFormTemplate;

final class LatteFormRendererFactory implements LatteFormRendererFactoryInterface
{

	public function __construct(
		private LatteFactory $latteFactory,
	)
	{
	}

	public function create(string $template, ?LatteFormTemplate $object = null): FormRenderer
	{
		$object ??= new LatteFormTemplate();

		return new LatteFormRenderer($template, $object, $this->latteFactory);
	}

}
