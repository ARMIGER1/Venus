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
		
		// Add link
		// Add image link
		
		// ========== Image functions ==========
		
		// Add image
		
	}
?>