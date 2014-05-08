<?php namespace Fastwebmedia\UKMobileValidator;

class UKMobileValidator {
		
	/**
	 * validMobileNumber function.
	 * 
	 * @param string UK Mobile Number
	 * @access public
	 * @return boolean
	 */
	public static function validMobileNumber( $value )
	{
		return preg_match('/^(\+44|0044|44|0)7\d{9}$/', preg_replace('/\s+/', '', $value)) === 1;
	}
	
	/**
	 * validMobileNumberInternational function.
	 * 
	 * @param string International UK Mobile Number
	 * @access public
	 * @return boolean
	 */
	public static function validMobileNumberInternational( $value )
	{
		return preg_match('/^\+447\d{9}$/', preg_replace('/\s+/', '', $value)) === 1;
	}
	
	
	/**
	 * formatMobile function.
	 * 
	 * @param string UK Mobile Number
	 * @access public
	 * @return string
	 */
	public static function formatMobile($mobileNumber)
	{
		if ( self::validMobileNumber($mobileNumber) ) {
			return '07'.substr($mobileNumber, -9, 9);
		} else {
			return $mobileNumber;
		}
		
	}	
	
	
	/**
	 * formatMobileInternational function.
	 * 
	 * @param string UK Mobile Number in international format
	 * @access public
	 * @return string
	 */
	public static function formatMobileInternational($mobileNumber)
	{
		if ( self::validMobileNumber($mobileNumber) ) {
			return '+447'.substr($mobileNumber, -9, 9);
		} else {
			return $mobileNumber;
		}
		
	}
}