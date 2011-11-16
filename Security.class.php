<?php

	/**
	 * @brief Handles all security functions.
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 * @license http://creativecommons.org/licenses/by-sa/3.0
	 */
	class Security {
		
		/**
		 * @brief Creates a random password of a specified length.
		 * @param string $length The length of the password to generate.
		 * @return string The generated password.
		 * @note This method generates pseudorandom numbers,
		 * because some numbers are <i>too</i> random for humans.
		 */
		function create_random_password($length) {
			
			$chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789';

			srand((double)microtime() * 1000000);

			$i = 0;

			$pass = '';

			while ($i < abs($length)) {
				
				$num = rand() % 59;

				$tmp = substr($chars, $num, 1);

				$pass = $pass . $tmp;

				$i++;

			}

			return $pass;
		}
	}

?>
