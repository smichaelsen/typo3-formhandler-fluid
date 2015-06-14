<?php
namespace AppZap\FormhandlerFluid\ViewHelpers\Field;

class UploadViewHelper extends AbstractFieldViewHelper {

	/**
	 * @return string
	 */
	public function render() {
		$content = $this->renderFieldLabel();
		$content .= $this->renderInputTag();
		$content .= $this->renderUploadedFilesInfo();
		return $this->wrapContent($content);
	}

	/**
	 * @return string
	 */
	protected function renderInputTag() {
		return sprintf(
			'<input type="file" id="%s" name="%s" class="%s" />',
			$this->getInputId(),
			$this->getInputName(),
			$this->getInputClass()
		);
	}

	/**
	 * @return string
	 */
	protected function renderUploadedFilesInfo() {
		$this->templateVariableContainer->add('allowedTypes', '###' . $this->arguments['fieldname'] . '_allowedTypes###');
		$this->templateVariableContainer->add('fileCount', '###' . $this->arguments['fieldname'] . '_fileCount###');
		$this->templateVariableContainer->add('maxCount', '###' . $this->arguments['fieldname'] . '_maxCount###');
		$this->templateVariableContainer->add('maxTotalSize', '###' . $this->arguments['fieldname'] . '_maxTotalSize###');
		$this->templateVariableContainer->add('uploadedFiles', '###' . $this->arguments['fieldname'] . '_uploadedFiles###');
		$content = $this->renderChildren();
		$this->templateVariableContainer->remove('allowedTypes');
		$this->templateVariableContainer->remove('fileCount');
		$this->templateVariableContainer->remove('maxCount');
		$this->templateVariableContainer->remove('maxTotalSize');
		$this->templateVariableContainer->remove('uploadedFiles');
		return $content;
	}

}
