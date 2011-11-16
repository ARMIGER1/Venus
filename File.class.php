<?php
	
	/**
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 * @license http://creativecommons.org/licenses/by-sa/3.0/
	 * @brief Handles all file operations.
	 */
	class File {
		
		/**
		 * @brief Converts html into a .txt file.
		 * @param string $file The file to be converted.
		 * @return Object The converted file.
		 * @note Usage:<br /><br />
		 * <code>
		 * $html_source = file_get_contents('example.html');<br />
		 * $txt = html_to_text($html_source);
		 * </code>
		 */
		function html_to_text($file){
     		$search = array('@<script[^>]*?>.*?</script>@si', // Strip out javascript
		     '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		     '@<[?]php[^>].*?[?]>@si', //scripts php
		     '@<[?][^>].*?[?]>@si', //scripts php
		     '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
		     '@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments including CDATA
		     );$text = preg_replace($search, '', $file);
		     
		     return $text;
		}

	}
	
?>