<?php

	/**
	 * 
	 * A class for managing sessions.
	 * @author Nick Smith <1hockeyplayer+github@gmail.com>
	 *
	 */
	class SessionManager {
		
		/**
		 * 
		 * @brief Starts an HTTP Session for the current page and user.
		 * @param string $name The name of the cookie.
		 * @param int $limit Self-explanatory.
		 * @param URL $path The path to the current directory.
		 * @param URL $domain The domain of the site serving the cookie.
		 * @param boolean $secure TRUE if using HTTP, FALSE if another method is used.
		 * @note Setting $secure to FALSE increases the chance of a cross-site scripting attack.
		 */
		static function session_start($name, $limit = 0, $path = '/', $domain = null, $secure = null) {
			
			// Set the cookie name before we start
			session_name($name . '_Session');
			
			// Set the domain to default to the current domain.
			$domain = isset($domain) ? $domain : isset($_SERVER['SERVER_NAME']);
			
			// Set the default secure value to whether the site is being accessed with SSL
			$https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);
			
			// Set the cookie settings and start the session
			session_set_cookie_params($limit, $path, $domain, $secure, true);
			session_start();
			
			// Ensure session has not expired, destroying it if it has
			if(self::validate_session()) {
				
				// Check to see if the current session is new or a hijack attempt
				if(!self::security_check()) {
					
					// Reset session data and regenerate ID
					$_SESSION = array();
					$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
					$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
					self::regenerate_session();
					
				} else if (rand(1, 100) <= 5) {
					
					self::regenerate_session();
					
				}
			} else {
				
				$_SESSION = array();
				session_destroy();
				session_start();
				
			}
			
		}
		
		/**
		 * 
		 * @brief Security checking module.
		 * @details Checks to see if either:
		 * <ol>
		 * <li>A new session has been started</li>
		 * <li>The current session is loaded by a host with a different IP or user-agent</li>
		 * </ol>
		 * 
		 * If either of the above two cases are met, the method returns FALSE.  Else, it
		 * returns TRUE.
		 */
		static protected function security_check() {
			
			if(!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent'])) {
				
				return false;
				
			}
			
			if($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR']) {
				
				return false;
				
			}
			
			if($_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']) {
				
				return true;
			}
			
		}
		
		/**
		 * 
		 * @brief Regenerates the session, allowing time for AJAX requests to complete.
		 */
		static function regenerate_session() {
			
			// If this session is obsolete it means that there's already a new id.
			if(isset($_SESSION['OBSOLETE']) || $_SESSION['OBSOLETE'] == true) {
				
				return;
			}
			
			// Set the current session to expire in 10 seconds (AJAX fix)
			$_SESSION['OBSOLETE'] = true;
			$_SESSION['EXPIRES'] = time() + 10;
			
			// Create a new session without destroying the old one
			session_regenerate_id(false);
			
			// Grab the current SESSIONID and close both sessions so other scripts may use them
			$new_session = session_id();
			session_write_close();
			
			// Set SESSIONID to the new session, starting it back up again
			session_id($new_session);
			session_start();
			
			// Finally, unset the obsolete and expiration flags for the new session we're keeping
			unset($_SESSION['OBSOLETE']);
			unset($_SESSION['EXPIRES']);
			
		}
		
		/**
		 * 
		 * @brief Validates the session.
		 * @details Checks whether the session is valid by checking whether
		 * the OBSOLETE and/or EXPIRES flags are set.
		 */
		static protected function validate_session() {
			
			if (isset($_SESSION['OBSOLETE']) && !isset($_SESSION['EXPIRES'])) {
				
				return false;
				
			}
			
			if (isset($_SESSION['EXPIRES']) && $_SESSION['EXPIRES'] < time()) {
				
				return false;
			}
			
			return true;
			
		}
	}
?>