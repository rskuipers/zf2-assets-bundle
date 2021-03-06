<?php
namespace AssetsBundle\View\Strategy;
class ViewHelperStrategy extends \AssetsBundle\View\Strategy\AbstractStrategy{
    /**
     * Render asset file
     * @param string $sPath
     */
	public function renderAsset($sPath,$iLastModified){
    	$sExtension = strtolower(pathinfo($sPath, PATHINFO_EXTENSION));

    	$sPath = $this->getBaseUrl().$sPath.(strpos($sPath, '?')?'&':'?').($iLastModified?:time());
        switch($sExtension){
            case 'js':
            	$this->getRenderer()->plugin('InlineScript')->appendFile($sPath);
                break;
            case 'css':
                $this->getRenderer()->plugin('HeadLink')->appendStylesheet($sPath);
                break;
        }
    }
}