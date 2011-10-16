<?php

	include_once 'Page.class.php';
	
	/**
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 */
	class Header extends Page {
		
		/**
		 * 
		 * @brief Adds a linked file to the header.
		 * @param string $filetype The filetype of the linked file.
		 * @param url $url The URL of the linked file.
		 */
		function linked_file($filetype = 'stylesheet', $url = '#') {
			
			if ($url == '' || $url == null) {
				
				echo 'No URL specified.';
				
			} else {
				
				// Examine filetype
				switch ($filetype) {
					case 'stylesheet':
						echo "<link rel='stylesheet' href='$url' />\n";
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
	}
?>