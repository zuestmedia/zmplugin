<?php

namespace ZMP\Plugin;

use WP_Error;
use WP_Customize_Setting;

class  Validation {

	/**
	*  \ZMP\Plugin\Validation Class
	*	 	Sanitizing and Validating User input
	*		Error Handler - Return Error Messages
	*/

	/**
		* ErrorHandler
		* Format [a-z]
		* @var int
		* @access private
		*/
	private $errorhandler = NULL;

	/**
		* inputname
		* Format [a-zA-Z0-9-_]
		* @var string
		* @access private
		*/
	private $inputname = NULL;

	/**
		* old value
		* Format string or array
		* @var string / array
		* @access private
		*/
	private $old_value = NULL;


	/**
		* option_mod
		* @var bool
		* @access private
		*/
	private $option_mod = false;


	public function getErrorHandler() {

    return $this->errorhandler;

  }
  public function setErrorHandler($errorhandler) {

    $this->errorhandler = $errorhandler;

  }

	public function getInputName() {

    return $this->inputname;

  }
	public function setInputName($inputname) {

    $this->inputname = $inputname;

  }

	public function getOldValue() {

    return $this->old_value;

  }
	public function setOldValue($old_value) {

    $this->old_value = $old_value;

  }

	public function getOptionMod() {

    return $this->option_mod;

  }
	public function setOptionMod($option_mod) {

    $this->option_mod = $option_mod;

  }

	public function getWPSettingsErrors($option_mod_key = NULL) {

		//if not global, will output only once!
		//global $zmwpsettingserrors;
		global $zmwpsettingserrors;

		$setting = $this->getInputName().$option_mod_key;

		//if has value in transient api gets value one time, then checks the whole array on each loop again from global var
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] && get_transient( 'settings_errors' ) ) {

			$zmwpsettingserrors = array_merge( (array) $zmwpsettingserrors, get_transient( 'settings_errors' ) );
			delete_transient( 'settings_errors' );

		}
		// Check global in case errors have been added on this pageload.
		if ( empty( $zmwpsettingserrors ) ) {

			return array();

		}
		// Filter the results to those of a specific setting if one was set.
		if ( $setting ) {

			$setting_errors = array();
			foreach ( (array) $zmwpsettingserrors as $singleerror ) {

				if ( $setting == $singleerror['setting'] ) {

					$setting_errors[] = $singleerror;

				}

				//name=general input field receives error and success message popup
				//is predefined in settingstemplate clas
				//else addfield in form if needed.
				if ( $setting == 'general' && $singleerror['setting'] != 'general') {

					$setting_errors[0] = array(
	            'setting' => 'general',
	            'code' => '100',
	            'message' => 'There have been errors! Please check your input again.',
	            'type' => 'error'
	        );

				}

			}

			return $setting_errors;

		}

	}

	public function createErrorObject(
		$errorcode = 900,
		$errormessage = 'There have been errors! Please check your input again.',
		$option_mod_key = NULL,
		$errortype = 'error'
	) {

		//if errorhandler is set, start
		if($this->getErrorHandler()) {

			// Options Error Handler
			if($this->getErrorHandler() == 'WPSettingsErrors') {

				//adds entry to transient api on updating with custom message, code n errortype!
				//to check the value in transient api, deactivate output function getWPSettingsErrors, because it deletes entry after getting it.
				add_settings_error( $this->getInputName().$option_mod_key, $errorcode, $errormessage, $errortype );

				//its an option_mod Array of Values!
				if($this->getOptionMod()){

					$options = $this->getOldValue();

					if( $options !== false && is_array( $options ) ) {

						if( array_key_exists( $option_mod_key, $options ) ) {

							return $options[ $option_mod_key ];

						}

					}

					return NULL;//to not return full option field like below.

				}

				return $this->getOldValue();//old value will be returned back to form if any validation issue/failure!

			}

			// Options Error Handler
			if($this->getErrorHandler() == 'WPAjaxErrors') {

				$result = array(
					'errorcode' => $errorcode,
					'errormessage' => $errormessage,
					'errortype' => $errortype
				);

				return $result;//old value will be returned back to form if any validation issue/failure!

			}

			if($this->getErrorHandler() == 'WPAjaxErrorsNEW') {


				return 'jasodlfaosdfisdfjsferrrrroooorrrr';//old value will be returned back to form if any validation issue/failure!

			}

			if($this->getErrorHandler() == 'WPCusotmizerErrors') {

				//WPCustomizer ErrorHandler!!
				//Validating via Sanitization --> https://make.wordpress.org/core/2016/07/05/customizer-apis-in-4-6-for-setting-validation-and-notifications/
	      //https://developer.wordpress.org/themes/customize-api/tools-for-improved-user-experience/#validating-settings%c2%a0in-php
				if( method_exists( 'WP_Customize_Setting', 'validate' ) ){
					return new WP_Error( $errorcode, $errormessage, $errortype ); //creates custom Error Message
				} else {
					return NULL; //make sure that you opt to return null in WP≤4.5,
				}

			}

		}

	}


	/**
	* -- Sanitizing and Validation Functions --
	*
	* 	Always create two functions for strings and arrays!
	*
	* 	Naming:
	* 		Functions to validate and sanitize strings: name
	* 		Functions to validate and sanitize arrays: name + array = namearray
	*
	*/

	public function sanitize($val){
		$val =  trim(htmlspecialchars($val));
		//$this->createErrorObject(900,'Check passed!');
		return $val;
	}
	//Recursivly check all array values--> &before$ see link
	public function sanitizearray($array) {
		//-->https://wordpress.stackexchange.com/questions/24736/wordpress-sanitize-array
		//when you iterate an array in a foreach statement, it works on a copy of that array. so if you really want to modify $value, you have to add & before it.

		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.

	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->sanitizearray($value);
	        }
	        else {
	            $value = $this->sanitize( $value );
	        }
	    }

		}

    return $array;
	}

	public function int($val,$key=false) {
		$val = filter_var($val, FILTER_VALIDATE_INT);
		if ($val === false && $val) {
			return $this->createErrorObject(901,'Please enter an integer! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function intarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->intarray($value);
	        }
	        else {
	            $value = $this->int( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function float($val,$key=false) {
		$val = filter_var($val, FILTER_VALIDATE_FLOAT);
		if ($val === false && $val) {
			return $this->createErrorObject(901,'Please enter a float number! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function floatarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->floatarray($value);
	        }
	        else {
	            $value = $this->float( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function numeric($val,$key=false) {
		if (!is_numeric($val)) {
			return $this->createErrorObject(901,'Please enter a number! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function numericarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->numericarray($value);
	        }
	        else {
	            $value = $this->numeric( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function str($val,$key=false) {
		if (!is_string($val)) {
			return $this->createErrorObject(902,'Please enter a string! Your Input could not be processed.',$key);
		}
		$val = trim(htmlspecialchars($val));
		return $val;
	}
	public function strarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->strarray($value);
	        }
	        else {
	            $value = $this->str( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function bool($val,$key=false) {
		$val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
		if ($val === false && $val ) {
			return $this->createErrorObject(903,'Please enter a boolean value! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function boolarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
			foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
					if ( is_array( $value ) ) {
							$value = $this->boolarray($value);
					}
					else {
							$value = $this->bool( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
					}
			}
		}
		return $array;
	}

	public function email($val,$key=false) {
		$val = filter_var($val, FILTER_VALIDATE_EMAIL);
		if ($val === false && $val) {
			return $this->createErrorObject(904,'Please enter a valid E-Mail Adress! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function emailarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
			foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
					if ( is_array( $value ) ) {
							$value = $this->emailarray($value);
					}
					else {
							$value = $this->email( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
					}
			}
		}
		return $array;
	}

	public function url($val,$key=false) {
		$val = filter_var($val, FILTER_VALIDATE_URL);
		if ($val === false && $val) {
			return $this->createErrorObject(905,'Please enter a valid URL! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function urlarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
			foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
					if ( is_array( $value ) ) {
							$value = $this->urlarray($value);
					}
					else {
							$value = $this->url( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
					}
			}
		}
		return $array;
	}


	/*public function json($val,$key=false) {
		//{"post_type":"docs","tax_query":{"0":{"taxonomy":"documentation","field":"slug","terms":["setup"],"operator":"IN"},"relation":"AND"}}
		if(!preg_match('/^[a-z0-9"_,:{}\[\]\-\s]+$/i', $val)  && $val ) {
			return $this->createErrorObject(906,'Please enter valid simple json (a-zA-Z0-9"_-,:{}[])! Your Input could not be processed.',$key);
		}
		return $val;
	}*/
	public function json($val,$key=false) {
		$result = json_decode($val);
		if (json_last_error() !== JSON_ERROR_NONE  && $val) {
			return $this->createErrorObject(906,'Please enter valid json syntax! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function jsonarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->jsonarray($value);
	        }
	        else {
	            $value = $this->json( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	//not used anymore instead json-wrappers rendered with Element class!
	public function html($val,$key=false) {
		//vorsichtig sein und jedes zeichen prüfen!! alle mit \ vornedran (\=\-\/) bewirken sonst fehler!!!
		//   \s ist für leerschläge    /i für case-insensitive
		// 1. if check: preg_match ob andere als diese zeichen im string enthalten sind
		// 2. if check: ob varialbe != '' oder NULL, damit kein Fehler oder default_value bei absichtlich leerem Feld zurückgegeben wird
		if(!preg_match('/^[a-z0-9@%#+*$?&<>"_.,:;\=\-\/\s]+$/i', $val)  && $val ) { //no functions & js when no "()[]{}" allowed!!
			return $this->createErrorObject(906,'Please enter valid simple html (a-zA-Z0-9<>="_.:;-/@#+*$%?&)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function htmlarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->htmlarray($value);
	        }
	        else {
	            $value = $this->html( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function percent($val,$key=false) {
		//vorsichtig sein und jedes zeichen prüfen!! alle mit \ vornedran (\=\-\/) bewirken sonst fehler!!!
		//   \s ist für leerschläge    /i für case-insensitive
		// 1. if check: preg_match ob andere als diese zeichen im string enthalten sind
		// 2. if check: ob varialbe != '' oder NULL, damit kein Fehler oder default_value bei absichtlich leerem Feld zurückgegeben wird
		if(!preg_match('/^[0-9%\s]+$/i', $val)  && $val ) { //no functions & js when no "()[]{}" allowed!!
			return $this->createErrorObject(906,'Please enter valid simple percent values (0-9%)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function percentarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->percentarray($value);
	        }
	        else {
	            $value = $this->percent( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function color($val,$key=false) {
		if(!preg_match('/^[a-z0-9()#.,\s]+$/i', $val)  && $val ) {
			return $this->createErrorObject(906,'Please enter valid color syntax in hex or rgb (a-z0-9()#.,)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function colorarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->colorarray($value);
	        }
	        else {
	            $value = $this->color( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function class($val,$key=false) {
		if(!preg_match('/^[a-z0-9@_\-\s]+$/i', $val)  && $val ) {
			return $this->createErrorObject(907,'Please enter a valid css class string (a-zA-Z0-9_-@)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function classarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){//returns false if key error!
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->classarray($value);
	        }
	        else {
	            $value = $this->class( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function slug($val,$key=false) {
		if(!preg_match('/^[a-z0-9._\-\s]+$/', $val)  && $val ) {
			return $this->createErrorObject(908,'Please enter a slug (a-z0-9-._)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function slugarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->slugarray($value);
	        }
	        else {
	            $value = $this->slug( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function text($val,$key=false) {
		if(!preg_match('/^[a-z0-9.,_\-\s]+$/i', $val)  && $val ) {
			return $this->createErrorObject(909,'Please enter text (a-zA-Z0-9-.,_)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function textarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->textarray($value);
	        }
	        else {
	            $value = $this->text( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	public function lc($val,$key=false) {
		if(!preg_match('/^[a-z\s]+$/', $val)  && $val ) {
			return $this->createErrorObject(910,'Please enter only lowercase letters (a-z)! Your Input could not be processed.',$key);
		}
		return $val;
	}
	public function lcarray($array) {
		if($array){// to only start foreach if has value (has to be array or object), if null returns just null no php warning then.
	    foreach ( $array as $key => &$value ) {
				if( $this->keycheck($key) === false ){
					return $this->createErrorObject(911,'Please enter a valid option_mod_key (a-zA-Z0-9_-)! Your Input could not be processed.');
				}
	        if ( is_array( $value ) ) {
	            $value = $this->lcarray($value);
	        }
	        else {
	            $value = $this->lc( $value, $key );
							if(is_object($value)||is_array($value)){return $value;}//return errorobject instead of array! so its showing error in multiselect fields eg...
	        }
	    }
		}
    return $array;
	}

	//special validation for theme settings_status
	public function onetwo($val) {
		if($val > 2 ) {
			return $this->createErrorObject(910,'Error! Your Input could not be processed.');
		}
		return $val;
	}

	//special for auth!
	public function uuid($val) {
		if( !class_exists('\ZMP\Pro\App') || strlen($val) != 36 || (!preg_match('/^[a-z0-9\-\s]+$/', $val)  && $val) ) {
			return $this->createErrorObject(910,'Error! The license key entered is invalid.');
		}
		$auth = new \ZMP\Pro\App();
		$auth->setLicenseKey( $val );
		if($auth->getLicenseStatus(true) && $auth->isRegisteredDomain() ){//force to check with api not cache!!! once is ok and check both if is active or expired license and if domain is auth
			return $val;
		}
		return $this->createErrorObject(910,'Error! The license key entered is invalid.');

	}


	//special for optionmods key check!!!
	public function keycheck($key) {
		if( $this->getOptionMod() ){
			if( !preg_match('/^[a-z0-9_\-\s]+$/i', $key) ) {
				return false;
			}
		}
		return $key;
	}


}
