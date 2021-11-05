<?php declare(strict_types = 1);

namespace WebChemistry\FormLatteRenderer;

use Nette\Forms\FormRenderer;
use WebChemistry\FormLatteRenderer\Template\LatteFormTemplate;

interface LatteFormRendererFactoryInterface
{

	public function create(string $template, LatteFormTemplate $object): FormRenderer;

}
