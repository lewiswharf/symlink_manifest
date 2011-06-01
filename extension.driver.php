<?php
	
	class Extension_symlink_manifest extends Extension {
		
		public function about() {
			return array(
				'name'			=> 'Symlink Manifest',
				'version'		=> '0.1',
				'release-date'	=> '2011-06-01',
				'author'		=> array(
					'name'			=> 'Mark Lewis',
					'website'		=> 'http://casadelewis.com',
					'email'			=> 'mark@casadelewis.com'
				)
			);
		}
		
		public function install() {
			if(!is_dir(MANIFEST . '.dev') && is_dir(MANIFEST . '.live') && is_dir(MANIFEST)) {
				if(is_dir($this->recurse_copy(MANIFEST . '.dev'))) {
					if($this->rrmdir(MANIFEST) && symlink(MANIFEST . '.dev', MANIFEST)) return true;
				}
			} elseif(!is_dir(MANIFEST . '.live') && is_dir(MANIFEST . '.dev') && is_dir(MANIFEST)) {
				if(is_dir($this->recurse_copy(MANIFEST . '.live'))) {
					if($this->rrmdir(MANIFEST) && symlink(MANIFEST . '.live', MANIFEST)) return true;
				}
			} elseif(!is_dir(MANIFEST . '.dev') && !is_dir(MANIFEST . '.live') && is_dir(MANIFEST)) {
				if(is_dir($this->recurse_copy(MANIFEST . '.dev')) && is_dir($this->recurse_copy(MANIFEST . '.live'))) {
					if($this->rrmdir(MANIFEST) && symlink(MANIFEST . '.dev', MANIFEST)) return true;
				}
			}
			return false;
		}
		
		public function uninstall() {
  		if(linkinfo(MANIFEST)) {
				unlink(MANIFEST);
			}
		}
		
		/*-------------------------------------------------------------------------
			Utilities:
		-------------------------------------------------------------------------*/
	
		function recurse_copy($src,$dst) {
			$dir = opendir($src);
			@mkdir($dst);
			while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
						if ( is_dir($src . '/' . $file) ) {
								recurse_copy($src . '/' . $file,$dst . '/' . $file);
						}
						else {
								copy($src . '/' . $file,$dst . '/' . $file);
						}
				}
			}
			closedir($dir);
		} 
		
		function rrmdir($dir) {
		 if (is_dir($dir)) {
			 $objects = scandir($dir);
			 foreach ($objects as $object) {
				 if ($object != "." && $object != "..") {
					 if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
				 }
			 }
			 reset($objects);
			 if(rmdir($dir)) return true;
		 }
		} 
	}
	
?>