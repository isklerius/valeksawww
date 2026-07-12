<?PHP

  if ($this->mId != 174 && $this->mId != 1488 && $this->mId != 1490) {

	$imgsrc = '<table>';
	  
	  $depth = sizeOf(explode(".",$this->mIdHierarchy));
	  if ($this->mId == 15) 
		$hgt = 'hgttitle';
	  else	
		$hgt = 'hgt';
		
		
		if (!$config['root_path']){
			global $gCms;
			$config = &$gCms->GetConfig();
		}
		

 
	    $imgsrc .= '<tr><td style="vertical-align:top;">'.lang('headerimage').'('.lang('wdt').'px x '.lang($hgt).'px):</td></tr>';
	
		$furl = $config['root_path']."/uploads/images/pages/".$this->mId."/header_image.png";
		$frurl = $config['root_url']."/uploads/images/pages/".$this->mId."/header_image.png";

	   if (file_exists($furl))
	    $imgsrc .= '<tr><td style="vertical-align:top;"><img src="'.$frurl.'" height=100 /><br/></td></tr>';		
		
	    $imgsrc .= '</tr><td style="vertical-align:top;">&nbsp;<input type="file" name="header_image" />';
	    $imgsrc .= '<input type="checkbox" name="rm_header_image" /><label for="rm_header_image">'.lang('deleteimage').'</label>';
	    $imgsrc .= '</td></tr>';

	$imgsrc .= '</table>';
	$ret[] = array(lang('pslimages').':', $imgsrc);
	}
	?>
	