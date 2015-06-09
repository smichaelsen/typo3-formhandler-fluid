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
		$this->tag->addAttributes(array(
			'type' => 'checkbox',
			'id' => $this->getInputId(),
			'name' => $this->getInputName(),
			'class' => trim($this->arguments['class'] . ' ' . $this->getInputClass()),
			'value' => '1',
			$this->getOptionChecked('1') => NULL
		));
		$inputContent .= $this->tag->render();
		return $inputContent;
	}

}
