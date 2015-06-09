<?php
namespace AppZap\FormhandlerFluid\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class TranslateViewHelper extends AbstractViewHelper{

	public function initializeArguments() {
		$this->registerArgument('key', 'string', 'The locallang key', TRUE);
	}

	/**
	 * @return string
	 */
	public function render() {
		return '###LLL:' . $this->arguments['key'] . '###';
	}

}
