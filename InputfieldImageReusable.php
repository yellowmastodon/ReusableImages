<?php

namespace ProcessWire;

class InputfieldImageReusable extends InputfieldImage
{
  public function ___render()
  {
    // Add your custom CSS class

    $this->addClass('InputfieldImage', 'wrapClass');    

    // Then call parent to render
    return parent::___render();
  }

  public function ___install()
  {
    parent::install();
    //$this->pages->get()
  }

  protected function renderItemWrap($out)
  {
    $item = $this->currentItem;
    $id = $item && !$this->renderValueMode ? " id='file_$item->hash'" : "";
    $class = "ImageOuter $this->itemClass";
    if ($item->hidden()) $class .= ' InputfieldFileItemHidden';
    return "<li$id class='$class'>isreference$out</li>";
  }
  public function init()
  {
    parent::init();
    $this->set('noCustomButton', false);
    $this->labels['choose-file'] = _('Upload new image');
    $this->labels['choose-file'] = _('Upload new images');
    $this->labels['choose-desc'] = _('Upload to current page');

    $this->labels['drag-drop'] = _('drag and drop images in here to upload to current page');
    $this->labels['reuse-files'] = _('Reuse already uploaded images');
  }

  /**
	 * Render upload area
	 * 
	 * @param Pagefiles|null $value
	 * @return string
	 * 
	 */
	protected function ___renderUpload($value) {
		if($value) {}
		if($this->noUpload || $this->renderValueMode) return '';

		// enables user to choose more than one file
		if($this->maxFiles != 1) $this->setAttribute('multiple', 'multiple'); 

		$attrs = $this->getAttributes();
		unset($attrs['value']); 
		if(substr($attrs['name'], -1) != ']') $attrs['name'] .= '[]';
		
		$formatExtensions = $this->formatExtensions();
		$chooseLabel = $this->labels['choose-file'];
    $chooseDesc = $this->labels['choose-desc'];
    $reuseLabel = $this->labels['reuse-files'];
		$dragDropLabel = $this->labels['drag-drop'];
		$attrStr = $this->getAttributesString($attrs);

		$uploadAttrStr = $this->getAttributesString($this->getUploadAttrs());
		
		$out = "<div $uploadAttrStr class='InputfieldFileUpload'>";


		if($this->getSetting('noCustomButton')) {
			$out .= "<input $attrStr>";
			
		} else {
			$out .= "
					<div class='ui-button-desc-wrapper'>
            <div class='InputMask ui-button ui-state-default'>
              <span class='ui-button-text'>
                <i class='fa fa-fw fa-folder-open-o'></i>$chooseLabel
              </span>
              <input $attrStr>
            </div>
            <span class='ui-button-desc detail'>$chooseDesc</span>
          </div>
					";
		}
    $out .= "
					<a href='#' class='InputMask ReuseModalTrigger ui-button ui-state-default'>
						<span class='ui-button-text'>
							<i class='fa fa-fw fa-repeat'></i>$reuseLabel
						</span>
					</a>
					";
		
		$out .= "  		
				<span class='InputfieldFileValidExtensions InputfieldMask detail'>$formatExtensions</span>
				<input type='hidden' class='InputfieldFileMaxFiles' value='$this->maxFiles' />
			";
		
		if(!$this->noAjax) $out .= "
				<span class='AjaxUploadDropHere description'>
					<span>
						<i class='fa fa-cloud-upload upload-icon'></i>&nbsp;<span>$dragDropLabel</span>
					</span>
				</span>
			";	

		$out .= "</div>"; // .InputfieldFileUpload

		return $out; 
	}
}
