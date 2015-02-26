<?php

namespace Fastwebmedia\UKMobileValidator;

/**
 * @group fwm
 * @group fwm.ukmobilevalidator
 * 
 */
class UKMobileValidatorTest extends \PHPUnit_Framework_TestCase {
	public static function provider_for_it_validates_a_mobile_with_valid_params()
	{
		return array(
			array('07956 294847'),
			array('07956 294 847'),
			array('07956294847'),
			array('447956294847'),
			array('447956 294 847'),
			array('00447956294847'),
			array('00447956 294847'),
		);
	}

	/**
	 * @dataProvider provider_for_it_validates_a_mobile_with_valid_params
	 * @test
	 */
	public function it_validates_a_mobile_with_valid_params($mobileNumber)
	{
		
		$result = UKMobileValidator::validMobileNumber($mobileNumber);
		$this->assertTrue($result);
	}

	public static function provider_for_it_validates_a_mobile_with_invalid_params()
	{
		return array(
			array('mobilenumber'),
			array('01234'),
			array('079562948477'),
			array('0795629484'),
			array('+457956294847'),
			array('79562948470'),
			array('o7956294847')
		);
	}
	
	public static function provider_for_it_validates_a_fq_mobile_with_valid_params()
	{
		return array(
			array('+447956294847'),
			array('+447956 294847'),
			array('+447956 294 847'),
			array('+447 9 5 6 294 847'),
		);
	}

	/**
	 * @dataProvider provider_for_it_validates_a_fq_mobile_with_valid_params
	 * @test
	 */
	public function it_validates_a_fq_mobile_with_valid_params($mobileNumber)
	{
		$result = UKMobileValidator::validMobileNumberInternational($mobileNumber);
		$this->assertTrue($result);
	}

	public static function provider_for_it_validates_a_fq_mobile_with_invalid_params()
	{
		return array(
			array('07956 294847'),
			array('07956 294 847'),
			array('07956294847'),
			array('447956294847'),
			array('447956 294 847'),
			array('00447956294847'),
			array('00447956 294847'),
			array('+4407956 294 847'),
			array('+4407956294847'),
		);
	}

	/** 
	 * @dataProvider provider_for_it_validates_a_fq_mobile_with_invalid_params
	 * @test
	 */
	public function it_validates_a_fq_mobile_with_invalid_params($mobileNumber)
	{
		$result = $result = UKMobileValidator::validMobileNumberInternational($mobileNumber);
		$this->assertFalse($result);
	}

	/** 
	 * @dataProvider provider_for_it_validates_a_mobile_with_invalid_params
	 * @test
	 */
	public function it_validates_a_mobile_with_invalid_params($mobileNumber)
	{
		$result = $result = UKMobileValidator::validMobileNumberInternational($mobileNumber);
		$this->assertFalse($result);
	}
	
public static function provider_for_it_formats_mobile_number_correctly()
	{
		return array(
			array('07111444555'),
			array('07111 444555')
		);
	}

	/** 
	 * @dataProvider provider_for_it_formats_mobile_number_correctly
	 * @test
	 */
	public function it_formats_mobile_number_correctly($mobileNumber)
	{
		$formattedMobileNumber = UKMobileValidator::formatMobile($mobileNumber);
		$result = UKMobileValidator::validMobileNumber( $formattedMobileNumber);
		
		$this->assertTrue($result);
	}


	public static function provider_for_it_formats_international_mobile_number_correctly()
	{
		return array(
			array('07111444555'),
			array('07111 444555')
		);
	}

	/** 
	 * @dataProvider provider_for_it_formats_international_mobile_number_correctly
	 * @test
	 */
	public function it_formats_international_mobile_number_correctly($mobileNumber)
	{
		$formattedMobileNumber = UKMobileValidator::formatMobileInternational($mobileNumber);
		$result = UKMobileValidator::validMobileNumberInternational( $formattedMobileNumber);
		
		$this->assertTrue($result);
	}

    public static function provider_for_valid_uk_phone_numbers()
    {
        return array(
            array('0161 4123895'),
            array('9123495'),
            array('+44041238959')
        );
    }

    /**
     * @dataProvider provider_for_valid_uk_phone_numbers
     * @test
     */
    public function it_should_allow_valid_uk_phone_numbers($number)
    {
        $result = UKMobileValidator::validPhoneNumber($number);
        $this->assertTrue($result);
    }

}
