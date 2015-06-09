<?php
namespace AppZap\FormhandlerFluid\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class ConfirmationViewViewHelper extends AbstractViewHelper {

	public function render() {
		return '<!-- ###TEMPLATE_SUBMITTEDOK### begin -->' . $this->renderChildren() . '<!-- ###TEMPLATE_SUBMITTEDOK### end -->';
	}

}
