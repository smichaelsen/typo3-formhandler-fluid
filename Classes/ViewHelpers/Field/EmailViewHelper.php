<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class EmailViewHelper extends AbstractFieldViewHelper {

	/**
	 * @var string
	 */
	protected $defaultFieldname = 'email';

	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('fieldname', 'string', 'The fieldname', FALSE, $this->defaultFieldname);
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
			'<input type="email" id="%s" name="%s" class="%s" value="%s"/>',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass(),
			$this->getInputValue()
		);
	}

}
