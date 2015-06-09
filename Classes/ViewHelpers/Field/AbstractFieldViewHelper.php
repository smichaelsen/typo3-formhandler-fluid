<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractFieldViewHelper extends AbstractViewHelper{

	public function initializeArguments() {
		$this->registerArgument('excludeFromSummary', 'boolean', 'If true this field will not appear in ff:fieldValuesSummary', FALSE, FALSE);
		$this->registerArgument('fieldname', 'string', 'The fieldname', TRUE);
		$this->registerArgument('wrapClass', 'string', 'Class for the wrapping tag', FALSE, 'input-field');
	}

	public function initialize() {
		parent::initialize();
		$this->addToSummary();
	}

	protected function addToSummary() {
		if ($this->arguments['excludeFromSummary']) {
			return;
		}
		if (!$this->templateVariableContainer->exists('_formhandler_fluid_fields')) {
			$this->templateVariableContainer->add('_formhandler_fluid_fields', array());
		}
		$fields = $this->templateVariableContainer->get('_formhandler_fluid_fields');
		$fields[$this->arguments['fieldname']] = array(
			'viewHelper' => $this,
		);
		$this->templateVariableContainer->remove('_formhandler_fluid_fields');
		$this->templateVariableContainer->add('_formhandler_fluid_fields', $fields);
	}

	/**
	 * @return string
	 */
	protected function renderFieldLabel() {
		return '<label for="' . $this->getInputId() . '">###LLL:field.' . $this->arguments['fieldname'] . '.label######required_' . $this->arguments['fieldname'] . '###</label>';
	}

	/**
	 * @param string $content
	 * @return string
	 */
	protected function wrapContent($content) {
		return '<div class="' . $this->arguments['wrapClass'] . '">' . $content . '</div>';
	}

	/**
	 * @return string
	 */
	protected function getInputClass() {
		return '###is_error_' . $this->arguments['fieldname'] . '###';
	}

	/**
	 * @return string
	 */
	protected function getInputId() {
		return '###formValuesPrefix###_' . $this->arguments['fieldname'];
	}

	/**
	 * @return string
	 */
	protected function getInputName() {
		return '###formValuesPrefix###[' . $this->arguments['fieldname'] . ']';
	}

	/**
	 * @return string
	 */
	protected function getInputValue() {
		return '###value_' . $this->arguments['fieldname'] . '###';
	}

	/**
	 * @param string $option
	 * @return string
	 */
	protected function getOptionChecked($option) {
		return '###checked_' . $this->arguments['fieldname'] . '_' . $option . '###';
	}

	/**
	 * @param string $option
	 * @return string
	 */
	protected function getOptionId($option) {
		return '###formValuesPrefix###_' . $this->arguments['fieldname'] . '_' . $option;
	}

	/**
	 * @param string $option
	 * @return string
	 */
	protected function getOptionLabel($option) {
		return '###LLL:field.' . $this->arguments['fieldname'] . '.option.' . $option . '###';
	}

	/**
	 * @param string $option
	 * @return string
	 */
	protected function getOptionSelected($option) {
		return '###selected_' . $this->arguments['fieldname'] . '_' . $option . '###';
	}

	/**
	 * @param string $option
	 * @return string
	 */
	protected function getOptionValue($option) {
		return '###LLL:field.' . $this->arguments['fieldname'] . '.option.' . $option . '###';
	}

}
