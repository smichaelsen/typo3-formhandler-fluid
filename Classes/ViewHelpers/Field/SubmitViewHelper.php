<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class SubmitViewHelper extends AbstractFieldViewHelper {

	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('step', 'string', 'Does the button point to "next" or "prev"?', FALSE, FALSE);
	}

	public function render() {
		$content = sprintf(
			'<input type="submit" %s value="%s" />',
			$this->getSubmitStep(),
			$this->getButtonLabel()
		);
		return $this->wrapContent($content);
	}

	/**
	 * @return string
	 */
	protected function getSubmitStep() {
		if (!$this->arguments['step']) {
			return '';
		}
		return '###submit_' . $this->arguments['step'] . 'Step###';
	}

	/**
	 * @return string
	 */
	protected function getButtonLabel() {
		return '###LLL:button.' . $this->arguments['fieldname'] . '.label###';
	}

}
