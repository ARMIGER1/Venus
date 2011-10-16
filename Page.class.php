<?php
	/**
	 * 
	 * @brief Handles all global page functions.
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 *
	 */
	class Page {
		
		var $page_title;
		var $page_subtitle;
		var $section_title;
		var $section_subtitle;
		
		/**
		 * 
		 * @brief Verifies that the class has been included and is in fact working.
		 */
		function test() {
			
			echo "<div style=\"border: 1px solid white; width: auto; float: left; color: white; padding: 1%; background(200,200,200,0.5);\">Page.class.php Test Success!</div>";
			
		}
		
		// ========== Title functions ==========
		
		/**
		 * 
		 * @brief Sets the title of the entire page
		 * @param string $title The main title of the page.
		 */
		function set_page_title($title) {
			
			$this->page_title = $title;
			
		}
		
		/**
		 * 
		 * @brief Gets the title of the entire page.
		 * @return string The main title of the page.
		 */
		function get_page_title() {
			
			return $this->page_title;
			
		}
		
		/**
		 * 
		 * @brief Sets the subtitle of the entire page.
		 * @param string $subtitle The main subtitle of the page.
		 */
		function set_page_subtitle($subtitle) {
			
			$this->page_subtitle = $subtitle;
			
		}
		
		/**
		 * 
		 * @brief Gets the main subtitle of the page.
		 * @return string The main subtitle of the page.
		 */
		function get_page_subtitle() {
			
			return $this->page_subtitle;
			
		}
		
		/**
		 * 
		 * @brief Sets the title of the current section.
		 * @param string $title The new title for the current section.
		 */
		function set_section_title($title) {
			
			$this->section_title = $title;
			
		}
		
		/**
		 * 
		 * @brief Gets the title of the current section.
		 * @return string The title of the current section.
		 */
		function get_section_title() {
			
			return $this->section_title;
			
		}

		/**
		 * 
		 * @brief Sets the subtitle of the current section.
		 * @param string $subtitle The subtitle of the current section.
		 */
		function set_section_subtitle($subtitle) {
			
			$this->section_subtitle = $subtitle;
			
		}
		
		/**
		 * 
		 * @brief Gets the subtitle of the current section.
		 * @return string
		 */
		function get_section_subtitle() {
			
			return $this->section_subtitle;
			
		}
		
		// ========== List functions ==========
		
		/**
		 * 
		 * @brief Adds an unordered list.
		 * @param array $items An array of list items to add.
		 */
		function unordered_list($items) {
			
			echo "<ul>";
			
			foreach($items as $listitems) {
				
				echo "<li>" . $listitems . "</li>";
				
			}
			
			echo "</ul>";
			
		}

		/**
		 * 
		 * @brief Adds an ordered list.
		 * @param array $items An array of list items to add.
		 * @see unordered_list()
		 */
		function ordered_list($items) {
			
			echo "<ol>";
			
			foreach ($items as $listitems) {
				
				echo "<li>" . $listitems . "</li>";
				
			}
			
			echo "</ol>";
			
		}
		
		// ========== Link functions ==========
		
		/**
		 * 
		 * @brief Adds a link to the page.
		 * @param string $title The title of the new link as displayed on the page.
		 * @param url $url The URL of the page being linked to.
		 * @param string $target The specified target of the link.
		 * 
		 * @details $target may have 1 of 4 parameters:<br />
		 * <ol>
		 * <li><b><i>_blank</i></b> - Opens the link in a new window or tab.</li>
		 * <li><b><i>_self</i></b> - Opens the link in the same frame
		 * as the link that was clicked. <b>DEFAULT</b> </li>
		 * <li><b><i>_parent</i></b> - Opens the link in the parent frameset.</li>
		 * <li><b><i>_top</i></b> - Opens the link in the full body of the window.</li>
		 * </ol>
		 */
		function link($title = 'New Link', $url = '#', $target = '_self') {
			
			echo "<a href='$url' target='$target'>$title</a>";
			
		}

		/**
		 * 
		 * @brief Adds an image link to the page.
		 * @param url $image_src The source url of the image.
		 * @param string $title The title of the link.
		 * @param url $url The URL of the page being linked to.
		 * @param string $target The specified target of the link.
		 * 
		 * @see link()
		 */
		function image_link($image_src = 'http://placehold.it/75x75', $title = 'New Link', $url = '#', $target = '_self') {
			
			echo "<a href='$url' target='$target'><img src='$image_src' /></a>";
			
		}
		
		// ========== Image functions ==========
		
		// Add image
		/**
		 * 
		 * Adds a new image to the page.
		 * @param url $image_src The source URL of the image.
		 * @param string $title The title of the image, in case it cannot be displayed.
		 */
		function image($image_src = 'http://placehold.it/75x75', $title = 'New Image') {
			 
			echo "<img src='$image_src' alt='$title' />";
		}
		
	}
?>