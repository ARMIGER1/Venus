<?php

	include_once 'Page.class.php';
	
	/**
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 * @license http://creativecommons.org/licenses/by-sa/3.0/
	 */
	class Header extends Page {
		
		/**
		 * 
		 * @brief Adds a linked file to the header.
		 * @param string $filetype The filetype of the linked file.
		 * @param url $url The URL of the linked file.
		 * @param string $title The title of the linked file, if necessary.
		 * @note The $title attribute is not required unless including
		 * an alternate stylesheet, at this time.
		 */
		function linked_file($filetype = 'stylesheet', $url = '#', $title = '') {
			
			if ($url == '' || $url == null) {
				
				echo 'No URL specified.';
				
			} else {
				
				// Examine filetype
				switch ($filetype) {
					case 'stylesheet':
						echo "<link rel='stylesheet' href='$url' />\n";
						break;
					case 'alternate stylesheet':
						if ($title != '') {
							echo "<link rel='alternate stylesheet' type='text/css' href='$url' title='$title' />";
						} else {
							echo 'No title specified!  You must include a title to use an alternate stylesheet.';
						}
						break;
					case 'javascript':
						echo "<script type='text/javascript' src='$url'></script>\n";
						break;
					default:
						echo "Invalid filetype specified";
						break;
				}
				
			}
			
		}
		
		function mobile_stylesheet($url, $mobile_device) {
			//
		}
	//
	}
?>