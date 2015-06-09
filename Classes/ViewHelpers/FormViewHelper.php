<?php
namespace AppZap\FormhandlerFluid\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class FormViewHelper extends AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'form';

	public function initializeArguments() {
		$this->registerArgument('step', 'integer', 'The form step number', TRUE);
		$this->registerUniversalTagAttributes();
	}

	/**
	 * @return string
	 */
	public function render() {
		$this->tag->addAttribute('method', 'post');
		$this->tag->addAttribute('enctype', 'multipart/form-data');
		$this->tag->addAttribute('action', '###REL_URL###');
		$content = $this->renderChildren();
		$this->tag->setContent($content);
		return '<!-- ###TEMPLATE_FORM' . $this->arguments['step'] . '### begin -->' . $this->tag->render() . '<!-- ###TEMPLATE_FORM' . $this->arguments['step'] . '### end -->';
	}

}
