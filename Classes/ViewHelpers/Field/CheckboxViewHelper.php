<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class CheckboxViewHelper extends AbstractFieldViewHelper {

	/**
	 * @return string
	 */
	public function render() {
		$content = $this->renderInputTag();
		$content .= $this->renderFieldLabel();
		$this->arguments['wrapClass'] .= ' ' . $this->getInputClass();
		return $this->wrapContent($content);
	}

	/**
	 * @return string
	 */
	protected function renderInputTag() {
		$inputContent = sprintf(
			'<input type="hidden" name="%s" value="%s"/>',
			$this->getInputName(),
			'0'
		);
		$inputContent .= sprintf(
			'<input type="checkbox" id="%s" name="%s" class="%s" value="%s" %s/>',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass(),
			'1',
			$this->getOptionChecked('1')
		);
		return $inputContent;
	}

}
