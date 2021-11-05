<?php declare(strict_types = 1);

namespace WebChemistry\FormLatteRenderer\DI;

use Nette\DI\CompilerExtension;
use WebChemistry\FormLatteRenderer\LatteFormRendererFactory;
use WebChemistry\FormLatteRenderer\LatteFormRendererFactoryInterface;

final class LatteFormRendererExtension extends CompilerExtension
{

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('renderer'))
			->setType(LatteFormRendererFactoryInterface::class)
			->setFactory(LatteFormRendererFactory::class);
	}

}
