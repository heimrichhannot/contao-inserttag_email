<?php

namespace HeimrichHannot;

class InserttagEmail extends \Frontend
{
	protected $singleSRC;

	protected $objFile;

	protected $linkTitle;

	protected $strHref;

	public function getEmailElement($strTag)
	{
		$params = preg_split('/::/', $strTag);

		if(is_array($params) && !empty($params))
		{
			// general parameters
			$strInsertTag	= $params[0];
			$strEmail		= \StringUtil::encodeEmail($params[1]);

			if($strEmail === null || $strEmail === '') return false;

			switch($strInsertTag)
			{
				case 'email_label':
					// label parameters
					$strLabel	= ($params[2] !== null && $params[2] !== "") ? $params[2] : preg_replace('/\?.*$/', '', $strEmail);
					$strClasses = ($params[3] !== null && $params[3] !== '') ? $params[3] . ' ' : '';
					$strId		= ($params[4] !== null && $params[4] !== '') ? 'id="' . $params[4] . '" ' : '';

					$strEmailLink = '<a '. $strId . 'href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;' . $strEmail . '" class="' . $strClasses . 'email">' . $strLabel . '</a>';
					return $strEmailLink;

				default:
					return false;
			}
		}
		return false;
	}

}