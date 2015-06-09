<?php
namespace AppZap\FormhandlerFluid\ViewHelpers;

use AppZap\FormhandlerFluid\ViewHelpers\Field\SubmitViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class FieldValuesSummaryViewHelper extends AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'dl';

	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerUniversalTagAttributes();
	}

	/**
	 * @return string
	 */
	public function render() {
		if (!$this->templateVariableContainer->exists('_formhandler_fluid_fields')) {
			return '';
		}
		$content = '';
		$fields = $this->templateVariableContainer->get('_formhandler_fluid_fields');
		foreach ($fields as $fieldname => $data) {
			$fieldContent = '';
			/** @var AbstractViewHelper $viewHelper */
			$fieldViewHelper = $data['viewHelper'];
			if ($fieldViewHelper instanceof SubmitViewHelper) {
				continue;
			}
			$fieldContent .= '<dt>###LLL:field.' . $fieldname . '.label###</dt>';
			$fieldContent .= '<dd>###value_' . $fieldname . '###</dd>';
			$content .= $fieldContent;
		}
		$this->tag->setContent($content);
		return $this->tag->render();
	}

}
