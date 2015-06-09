<?php
namespace AppZap\FormhandlerFluid\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class MailViewHelper extends AbstractViewHelper {

	/**
	 * @var \AppZap\FormhandlerFluid\Library\Html2Text
	 * @inject
	 */
	protected $html2Text;

	public function initializeArguments() {
		$this->registerArgument('to', 'string', 'To user or to admin?', TRUE);
	}

	/**
	 * @return string
	 */
	public function render() {
		$mailContent = $this->renderChildren();
		$content = '<!-- ###TEMPLATE_EMAIL_' . strtoupper($this->arguments['to']) . '_HTML### begin -->' . $mailContent . '<!-- ###TEMPLATE_EMAIL_' . strtoupper($this->arguments['to']) . '_HTML### begin -->';
		$this->html2Text->setHtml($mailContent);
		$content .= '<!-- ###TEMPLATE_EMAIL_' . strtoupper($this->arguments['to']) . '_PLAIN### begin -->' . $this->html2Text->getText() . '<!-- ###TEMPLATE_EMAIL_' . strtoupper($this->arguments['to']) . '_PLAIN### begin -->';
		return $content;
	}

}
