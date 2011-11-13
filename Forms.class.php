<?php
	/**
	 * @brief Handles all form functions
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 * @copyright Copyright (c) 2011, Nick Smith
	 * @version 1.0
	 * @license http://creativecommons.org/licenses/by-sa/3.0/
	 */
	class Forms extends Page implements Email {
		
		/**
		 * 
		 * @brief Verifies an email address.
		 * @note DOES NOT VERIFY WHETHER THE ACCOUNT ACTUALLY EXISTS
		 * @param string $email The email address to validate.
		 * @return boolean TRUE or FALSE.  If TRUE, email is valid.
		 * else, email is invalid.
		 */
		function validate_email_address($email) {
			
			if (eregi("^[a-z0-9._-]+@[a-z0-9._-]+.[a-z]{2,6}$", $email)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		/**
		 * 
		 * @brief Matches a string between the minimum
		 * and maximum user-defined values.
		 * @param string $string The string to match.
		 * @param int $min The minimum length of the string.
		 * @param int $max The maximum length of the string.
		 * @return boolean
		 */
		function match_limited_string($string, $min, $max)
		{
			$matches = FALSE;
			
			if (!preg_match('#^(.){$min,$max}$#', $string)) {
				$matches = FALSE;
			} else {
				$matches = TRUE;
			}
			
			return $matches;
		}
		
		/**
		 * 
		 * @brief Calculates a person's age.
		 * @param int $day The person's birthday day.
		 * @param int $month The person's birth month.
		 * @param int $year The person's birth year.
		 * @param int $required_age The minimum age to check for.
		 * @return boolean TRUE if older than required age, FALSE if younger.
		 */
		function calculate_age($day, $month, $year, $required_age = 13)
		{
			$age = (date("Y") - $year);
			
			if ( (date("n") < $month) or (date("n") == $month and date("j") < $day) ) {
				$age--;
			}
			
			$result;
			
			if ($age >= $required_age) {
				$result = TRUE;
			} else if ($age < $required_age) {
				$result = FALSE;
			}
			
			return $result;
		}
		
		/**
		 * 
		 * @brief Checks if a valid phone number is entered.
		 * @param int $number The phone number to check, in a supported
		 * country's format.
		 * @param string $country The country code for the country of origin.
		 * @note The DEFAULT country code is 'US'.
		 */
		function verify_valid_phone($number, $country = 'US')
		{
			$result = FALSE;
			
			switch ($country) {
				case 'US':
					if (preg_match("/^[0-9]{3,3}[-]{1,1}[0-9]{3,3}[-]{1,1}[0-9]{4,4}$/", $number)) {
						$result = TRUE;
					} else {
						$result = FALSE;
					}
					break;
				case 'UK':
					if (preg_match("/^[0-9]{11,11}$/", $number)) {
						$result = TRUE;
					} else {
						$result = FALSE;
					}
			}
		}
	}
?>