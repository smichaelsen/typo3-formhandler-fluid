<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class SelectViewHelper extends AbstractFieldViewHelper {

	const RENDER_MODE_CHECKBOXES = 'checkboxes';
	const RENDER_MODE_SELECT = 'select';

	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('options', 'array', 'The options', TRUE);
		$this->registerArgument('renderMode', 'string', 'The render mode', FALSE, self::RENDER_MODE_SELECT);
	}

	/**
	 * @return string
	 */
	public function render() {
		switch ($this->arguments['renderMode']) {
			case self::RENDER_MODE_CHECKBOXES:
				$content = $this->renderFieldHeadline();
				$content .= $this->renderCheckboxes();
				break;
			case self::RENDER_MODE_SELECT:
				$content = $this->renderFieldLabel();
				$content .= $this->renderSelectTag();
				break;
			default:
				throw new \InvalidArgumentException('Render mode ' . $this->arguments['renderMode'] . ' is not supported.', 1433835277);
		}
		return $this->wrapContent($content);
	}

	/**
	 * @return string
	 */
	protected function renderSelectTag() {
		return sprintf(
			'<select id="%s" name="%s" class="%s">%s</select>',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass(),
			$this->renderSelectOptions()
		);
	}

	/**
	 * @return string
	 */
	protected function renderSelectOptions() {
		$optionsContent = '';
		foreach ($this->arguments['options'] as $option) {
			$optionsContent .= sprintf(
				'<option value="%s" %s>%s</option>',
				$option,
				$this->getOptionSelected($option),
				$this->getOptionLabel($option)
			);
		}
		return $optionsContent;
	}

	/**
	 * @return string
	 */
	protected function renderFieldHeadline() {
		return '<h3>###LLL:field.' . $this->arguments['fieldname'] . '.label######required_' . $this->arguments['fieldname'] . '###</h3>';
	}

	/**
	 * @return string
	 */
	protected function renderCheckboxes() {
		$checkboxesContent = '';
		foreach ($this->arguments['options'] as $option) {
			// input
			$checkboxesContent .= sprintf(
				'<input type="checkbox" id="%s" name="%s" value="%s" %s/>',
				$this->getOptionId($option),
				$this->getInputName() . '[]',
				$option,
				$this->getOptionChecked($option)
			);
			// label
			$checkboxesContent .= sprintf(
				'<label for="%s">%s</label><br>',
				$this->getOptionId($option),
				$this->getOptionLabel($option)
			);
		}
		return '<div class="' . $this->getInputClass() . '">' . $checkboxesContent . '</div>';
	}

}
