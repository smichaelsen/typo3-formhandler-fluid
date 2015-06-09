<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class TextareaViewHelper extends AbstractFieldViewHelper {

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
			'<textarea id="%s" name="%s" class="%s">%s</textarea>',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass(),
			$this->getInputValue()
		);
	}

}
