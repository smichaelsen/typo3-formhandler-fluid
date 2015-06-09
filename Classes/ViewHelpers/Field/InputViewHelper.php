<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class InputViewHelper extends AbstractFieldViewHelper {

	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('fieldname', 'string', 'The fieldname', TRUE);
	}

	/**
	 * @return string
	 */
	public function render() {
		$content = $this->renderFieldLabel();
		$content .= $this->renderInputTag();
		return $this->wrapContent($content);
	}

	/**
	 * @return string
	 */
	protected function renderInputTag() {
		return sprintf(
			'<input type="text" id="%s" name="%s" class="%s" value="%s"/>',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass(),
			$this->getInputValue()
		);
	}

}
