<?php

namespace ZMP\Plugin;

class Form {

  /**
  *
  * \ZMP\Plugin\Form Class
  *
  * Funktion um Formulare zu generieren; all types - get, post oder ajax forms!
  * Input Field Creator
  * Auto Register Fields types: options (adminforms)
  *
  * Required Classes:
  *
  *   Helpers to create create Elements and attributes
  *
  * ---Settings of different Form Types---
  *
  * Admin Form populating options_table
  *
  * to create an admin form to create, read, update, delete values from options_table
  * you need ZMForm with this minimal settings defined before adding fields:
  *
  * ==> the formhandler will care about everything: create, read, update and delete values! just setttings and fields to create!
  *
  *     new ZMForm
  *
  *     setOptionsgroupName = präfix string! to better organize, avoid duplicates and shorter names in addfield
  *     setAction = options.php
  *     setMethod = post
  *     xxxsetFormHandler = optionsxxx
  *     setSettingsFields = 1 //to add necessary hidden fields and simple nonce sec.
  *
  *   -- register_setting $args
  *
  *     default: sets default value, when form does not have to save to db.
  *     so this value is already defined in function.. also empty fields or checkboxes wont be saved to db
  *
  *     sanitize_callback: uses \ZMP\Plugin\Validation to validate and sanitize input.
  *     minimal sanitizing is htmlspecialchars for strings and arrays! so a check is alwasy happening!
  *
  *
  *   add fields:
  *
  *     default field type:     only set name           => addField(uniquename); --> text input field with name=uniquename
  *     simple field type:      set fieldtype and name  => addField(uniquename,name); --> name is a string
  *     usual field type:       set fieldtype and array => addField(uniquename,arr); --> arr is an array with name - value pairs
  *
  *   --Checkboxes Buggy behavior--
  *
  *     mainly because of checkboxes 0 === NULL wenn array usw problems (& radio and select fields! von hack betroffen, 0 = 1!)
  *     better do not use value="0" as a value  for select-options field-values! its buggy! others work, but best avoid completly
  *     auto created select-option arrays without defined values starts always with value="1" instead of 0 so don't set numnbers by yourself or just 1-n
  *
  *   --Sanitizing--
  *
  *     Default Sanitizing and Validation is: htmlspecialchars!
  *
  *     Available: sanitize, int, str, bool, email, url, ...
  *
  *     Arrays needs different validation method! --> only checkboxes with multiple selection... sonst normale validations
  *
  *     Available: sanitizearray, intarray, strarray, boolarray, emailarray, urlarray, ...
  *
  * add input submit or button:
  *
  *   be careful not to add name and value to input type submit, so it doesnt register field and doesnt updates option
  *   but can be useful, to just send value with one button sometimes! eg. to confirm or approve something..
  *
  * getForm in the end!
  *
  */

  /**
    * Element <form></form>
    * Attributes: name, class, charset, action, autocomplete, enctype, method, novalidate, target, custom attribute string
  */

  /**
    * OptionsgroupName/Formname -> set optionsgroup praefix so input field names / option_names are unique
    * Format string [a-z_]
    * @var string
    * @access private
    */
    private $optionsgroup_name = 'SET_UNIQUE_OPTIONS_GROUP_NAME';

  /**
    * form element
    * Format [a-z]
    * @var string
    * @access private
    */
    private $form_element = 'form'; //Required to create <form> tags, if NULL, no <form></form>, just fields output

  /**
    * class
    * Format [A-Za-z0-9-_]
    * @var string
    * @access private
    */
    private $class;

  /**
    * accept-charset
    * Format character_set
    * @var string
    * @access private
    */
    private $charset;

  /**
    * action
    * Format URL
    * @var url
    * @access private
    */
    private $action;

  /**
    * autocomplete
    * Format on | off
    * @var string
    * @access private
    */
    private $autocomplete;

  /**
    * enctype
    * Format application/x-www-form-urlencoded | multipart/form-data | text/plain
    * @var string
    * @access private
    */
    private $enctype;

  /**
    * method
    * Format get | post
    * @var string
    * @access private
    */
    private $method;

  /**
    * target
    * Format _blank | _self| _parent | _top
    * @var string
    * @access private
    */
    private $target;

  /**
    * add nonce field
    * Format true / false
    * @var bool
    * @access private
    */
    private $wp_nonce;

  /**
    * add settings_fields --> for options pages!
    * Format true / false
    * @var bool
    * @access private
    */
    private $settings_fields;

  /**
    * Default Styling Form & Fields
    */
    private $outerclass = 'uk-margin';
    private $outerelement = 'div';
    private $innerclass;
    private $innerelement = 'div';
    private $labelclass = 'uk-form-label';

  /**
    * temporary form html
    * Format html
    * @var string
    * @access private
    */
    private $temp_form;

  /**
    * tempform array
    * Format arrays
    * @var array
    * @access private
    */
    private $temp_form_array = array();


    //options group with präefix when optionsgroupname is set!
    public function getOptionsgroupName() {

      return $this->optionsgroup_name;

    }
    public function setOptionsgroupName($optionsgroup_name) {

      $this->optionsgroup_name = $optionsgroup_name;

    }


    public function getFormElement() {

      return $this->form_element;

    }
    public function setFormElement($form_element) {

      $this->form_element = $form_element;

    }

    public function getClass() {

      return $this->class;

    }
    public function setClass($class) {

      $this->class = $class;

    }

    public function getCharset() {

      return $this->charset;

    }
    public function setCharset($charset) {

      $this->charset = $charset;

    }

    public function getAction() {

      return $this->action;

    }
    public function setAction($action) {

      $this->action = $action;

    }

    public function getAutocomplete() {

      return $this->autocomplete;

    }
    public function setAutocomplete($autocomplete) {

      $this->autocomplete = $autocomplete;

    }

    public function getEnctype() {

      return $this->enctype;

    }
    public function setEnctype($enctype) {

      $this->enctype = $enctype;

    }

    public function getMethod() {

      return $this->method;

    }
    public function setMethod($method) {

      $this->method = $method;

    }

    public function getTarget() {

      return $this->target;

    }
    public function setTarget($target) {

      $this->target = $target;

    }

    public function getWpNonce() {

      return $this->wp_nonce;

    }
    public function setWpNonce($wp_nonce) {

      $this->wp_nonce = $wp_nonce;

    }

    public function getSettingsFields() {

      return $this->settings_fields;

    }
    public function setSettingsFields($settings_fields) {

      $this->settings_fields = $settings_fields;

    }

    public function getOuterClass() {

      return $this->outerclass;

    }
    public function setOuterClass($outerclass) {

      $this->outerclass = $outerclass;

    }

    public function getOuterElement() {

      return $this->outerelement;

    }
    public function setOuterElement($outerelement) {

      $this->outerelement = $outerelement;

    }

    public function getInnerClass() {

      return $this->innerclass;

    }
    public function setInnerClass($innerclass) {

      $this->innerclass = $innerclass;

    }

    public function getInnerElement() {

      return $this->innerelement;

    }
    public function setInnerElement($innerelement) {

      $this->innerelement = $innerelement;

    }

    public function getLabelClass() {

      return $this->labelclass;

    }
    public function setLabelClass($labelclass) {

      $this->labelclass = $labelclass;

    }

    protected function getTempForm() {

      return $this->temp_form;

    }
    protected function expandTempForm($html) {

      $this->temp_form .= $html;

    }

    protected function getTempFormArray() {

      return $this->temp_form_array;

    }
    protected function expandTempFormArray($temp_form_array) {

      $this->temp_form_array[] = $temp_form_array;

    }

    static function get_settings_fields( $option_group ) {
      $html = '<input type="hidden" name="option_page" value="' . esc_attr( $option_group ) . '" />';
      $html .= '<input type="hidden" name="action" value="update" />';
      $html .= wp_nonce_field( $option_group.'-options', '_wpnonce', true, false );
      return $html;
    }

    public function showNotifictionAlert($attributes_array_or_name) {

      $html = NULL;

      /* get success or error message out off array if has been prepared before */

      return $html;

    }

    private $toggle_count = 1;
    public function getToggleCount(){

      return $this->toggle_count;

    }
    public function plusoneToggleCount(){

      ++$this->toggle_count;

    }

  /**
    * Prepare Values (from DB: getOption -> option or option_mod or even theme_mod)
    * and register/prepare fields for save / update (eg. add_option and register_setting)
    * add sanitize and validation
    */
    public function prepareField(
      $fieldtype,
      $attributes_array_or_name,
      $type = 'option',
      $option_mod = NULL,
      $validation_type = NULL
    ) {

      return $attributes_array_or_name;

    }

  /**
    * addField to Temp Form
    * Default Settings: type=text & name=$var
    * Attributes in array: name, class, id, usw.
    */
    public function addField(
      $fieldtype = 'input',
      $attributes_array_or_name = NULL,
      $type = 'option',
      $option_mod = NULL,
      $validation_type = NULL
    ) {

      if( $attributes_array_or_name ) {

        /**
        * Prepare Array for further processing:
        *   Get and set Value or set default value to value & Register Settings if Formhandler is for example options
        */

        //register Fields before output and get and set value or default value!
        $attributes_array_or_name = $this->prepareField($fieldtype,$attributes_array_or_name,$type,$option_mod,$validation_type);

        //add prepared array to temp array... ////////////maybe at the end is better, depends on ajax processing or other forms.....///////
        $this->expandTempFormArray($attributes_array_or_name);

        $html = '';

        if( $fieldtype != 'html' ) {

          //default outerelement = div
          $outerelement = Helpers::getValuebyKeyorDefault('outerelement',$attributes_array_or_name,$this->getOuterElement());
          $outerclass = Helpers::getValuebyKeyorDefault('outerclass',$attributes_array_or_name,$this->getOuterClass());

          if($outerelement){

            $html .= '<'.esc_attr( $outerelement ).Helpers::getAttribute($outerclass,NULL,' class="%s"').'>';

          }

        }

        //innerelement and label
        if(Helpers::getValuebyKeyorDefault('label',$attributes_array_or_name)) {

          $labelclass = Helpers::getValuebyKeyorDefault('labelclass',$attributes_array_or_name,$this->getLabelClass());
          $labelid = Helpers::getValuebyKeyorDefault('id',$attributes_array_or_name);

          $innerelement = Helpers::getValuebyKeyorDefault('innerelement',$attributes_array_or_name,$this->getInnerElement());
          $innerclass = Helpers::getValuebyKeyorDefault('innerclass',$attributes_array_or_name,$this->getInnerClass());

          $toggle_icon = NULL;
          $toggle_attr = NULL;
          if(Helpers::getValuebyKeyorDefault('description_toggle',$attributes_array_or_name)) {
            $toggle_id = '#zm_descr_toggle_'.$this->getToggleCount();
            $toggle_attr = ' uk-toggle="target: '.esc_attr( $toggle_id ).'"';
            $toggle_icon = ' <span uk-icon="icon:question;ratio:0.6"></span>';
          }

          $html .= '<label'.Helpers::getAttribute($labelid,NULL,' for="%s"').Helpers::getAttribute($labelclass,NULL,' class="%s"').$toggle_attr.'>'.esc_html( $attributes_array_or_name['label'] ).$toggle_icon.'</label>';

          $html .= '<'.esc_attr( $innerelement ).Helpers::getAttribute($innerclass,NULL,' class="%s"').'>';

        }

        if(Helpers::getValuebyKeyorDefault('icon',$attributes_array_or_name)) {

          $html .= '<div class="uk-inline uk-width-1-1">';

          $html .= '<span class="uk-form-icon" uk-icon="icon: '.esc_attr( $attributes_array_or_name['icon'] ).'"></span>';

        }

        if($fieldtype == 'input') {

          if( is_array($attributes_array_or_name) ) {

                //process array and add all attributes to input element besides type.
                $allatts = Helpers::processAttributesArray($attributes_array_or_name);

                $html .= '<input'.$allatts.'>';

              } else {

                //create minimal input element with type & name
                $html .= '<input type="text" name="'.esc_attr( $attributes_array_or_name ).'">';

              }

          } elseif( $fieldtype == 'textarea' ) {

              /**
                * Element = Textarea
              */

              if( is_array($attributes_array_or_name) ) {

                //default textarea value = null
                $value = NULL;
                if( array_key_exists('value',$attributes_array_or_name) ) {

                  //defines preset value if has one
                  $value = $attributes_array_or_name['value'];
                  //removes value from array! so its not added with attributes??
                  unset($attributes_array_or_name['value']);

                }

                //after checking value var and removing it process array and add all attributes textarea
                $allatts = Helpers::processAttributesArray($attributes_array_or_name);

                //add value back to array!
                $attributes_array_or_name['value'] = $value;

                $html .= '<textarea'.$allatts.'>'.esc_textarea( $value ).'</textarea>';

              } else {

                //create minimal input element with type & name
                $html .= '<textarea name="'.esc_attr( $attributes_array_or_name ).'"></textarea>';

              }

          } elseif( $fieldtype == 'select' ) {

            /**
            * Select-Options-Array ($key=> 'options') required! or certain values --> yesno, noyes, onoff, offon
            * array( 'options' => array( array('option'=>'Xxx','value'=>'xxx','selected'=>1,'disabled'=>1), array('option'=>'Xxx','value'=>'xxx','selected'=>1,'disabled'=>1) ) )
            */

            if( is_array($attributes_array_or_name) ) {

              //temporary create var with value if has one
              $value = Helpers::getValuebyKeyorDefault('value',$attributes_array_or_name);
              //removes value from array! so its not added with attributes??
              unset($attributes_array_or_name['value']);

              //add attributes to select element
              $allatts = Helpers::processAttributesArray($attributes_array_or_name);

              //re-add value to array (reasen, no value needed in select element!)
              $attributes_array_or_name['value'] = $value;

              //start with select field
              $html .= '<select'.$allatts.'>';

              if( is_array($attributes_array_or_name['options']) ) {

                foreach ($attributes_array_or_name['options'] as $optionnr => $singleoptionsarr) {

                  //never set first value to 0 of options or radio & checkbox input group! sonst probleme weil 0 == NULL 0 === Null false usw.
                  $optionnr = $optionnr + 1;

                  //if no value is set in array, it automtically adds integers from 0-n
                  $valueornr = Helpers::getValuebyKeyorDefault('value',$singleoptionsarr,$optionnr);

                  //check which input , radio or checkbox, is checked and set checked key. reset anywhere else!
                  if($value == $valueornr){

                    $singleoptionsarr['selected'] = 1;

                  } else {

                    unset($singleoptionsarr['selected']);

                  }

                  //add value to optionsarray if none or overwrite existing with same value again:)
                  $singleoptionsarr['value'] = $valueornr;

                  $allattsopt = Helpers::processAttributesArray($singleoptionsarr);

                  $html .= '<option'.$allattsopt.'>'.esc_html( $singleoptionsarr['option'] ).'</option>';

                }

              }

              $html .= '</select>';

            }

          } elseif( $fieldtype == 'radio' || $fieldtype == 'checkbox') {

            if( is_array($attributes_array_or_name) ) {

              $name = Helpers::getValuebyKeyorDefault('name',$attributes_array_or_name);
              $class = Helpers::getValuebyKeyorDefault('class',$attributes_array_or_name);


              /**
              * Select-Options-Array ($key=> 'options')
              * required   option, value
              * array( 'options' => array( array('option'=>'Xxx','value'=>'xxx','selected'=>1,'disabled'=>1), array('option'=>'Xxx','value'=>'xxx','selected'=>1,'disabled'=>1) ) )
              */

              //process value against options-array and check which value is checked or whatever...
              $value = Helpers::getValuebyKeyorDefault('value',$attributes_array_or_name);

              if( is_array($attributes_array_or_name['options']) ) {

                foreach ($attributes_array_or_name['options'] as $optionnr => $singleoptionsarr) {

                  //never set first value to 0 of options or radio & checkbox input group! sonst probleme weil 0 == NULL 0 === Null false usw.
                  $optionnr = $optionnr + 1;

                  //if no value is set in array, it automtically adds integers from 0-n
                  $valueornr = Helpers::getValuebyKeyorDefault('value',$singleoptionsarr,$optionnr);

                  //if multiple checkboxes, data is saved as serialized object...
                  if(is_array($value)){

                    foreach($value as $key => $checkedval) {

                      if($checkedval == $valueornr){

                        $singleoptionsarr['checked'] = 1;

                      }

                    }

                  } else {

                    //check which input , radio or checkbox, is checked and set checked key. reset anywhere else!
                    if($value == $valueornr && $value !== NULL){

                      $singleoptionsarr['checked'] = 1;

                    } else {

                      unset($singleoptionsarr['checked']);

                    }

                  }

                  //add value to optionsarray if none or overwrite existing with same value again:)
                  $singleoptionsarr['value'] = $valueornr;

                  //process new updated array with values and checkmarks
                  $allattsopt = Helpers::processAttributesArray($singleoptionsarr);

                  $html .= '<label for="'.esc_attr( $name.$valueornr ).'">';

                  if( $fieldtype == 'radio' ) {

                    $html .= '<input type="radio" name="'.esc_attr( $name ).'" id="'.esc_attr( $name.$valueornr ).'"'.Helpers::getAttribute($class,NULL,' class="%s"').$allattsopt.'> ';

                  }

                  if( $fieldtype == 'checkbox') {

                    $html .= '<input type="checkbox" name="'.esc_attr( $name ).'[]" id="'.esc_attr( $name.$valueornr ).'"'.Helpers::getAttribute($class,NULL,' class="%s"').$allattsopt.'> ';

                  }

                  $html .= esc_html( $singleoptionsarr['option'] );
                  $html .= '</label><br>';

                }

              }

            }

          } elseif( $fieldtype == 'html') {

            $html .= $attributes_array_or_name;

          }

        if(Helpers::getValuebyKeyorDefault('icon',$attributes_array_or_name)) {

          $html .= '</div>';

        }

        if(Helpers::getValuebyKeyorDefault('description_toggle',$attributes_array_or_name)) {
          $toggle_id = 'zm_descr_toggle_'.$this->getToggleCount();
          $this->plusoneToggleCount();
          $html .= '<div hidden id="'.esc_attr( $toggle_id ).'" class="uk-card uk-card-default uk-card-body uk-card-small uk-margin-small">'.$attributes_array_or_name['description_toggle'].'</div>';
        }

        if(Helpers::getValuebyKeyorDefault('description',$attributes_array_or_name)) {

          $html .= '<p class="uk-article-meta uk-text-italic">'.esc_html( $attributes_array_or_name['description'] ).'</p>';

        }

        //innerelement and label
        if(Helpers::getValuebyKeyorDefault('label',$attributes_array_or_name)) {

          $html .= '</'.esc_attr( $innerelement ).'>';

        }

        if( $fieldtype != 'html' ) {

          $html .= '</'.esc_attr( $outerelement ).'>';

        }

        //print out error messages
        $html .= $this->showNotifictionAlert($attributes_array_or_name);

        //add to temp form
        $this->expandTempForm($html);

      } else {

        //Errormessage shows up if mandatory var $attributes_array_or_name is missing
        $this->expandTempForm('<p><strong>Error:</strong> Second addField() Argument cant be empty or NULL</p>');
        //do nothing
        return;

      }

    }

    //function to display html form
    public function getForm() {

      $html = '';

      //form element and attributes name, class, charset, action, autocomplete, enctype, method, novalidate, target, custom attribute
      $form_element = $this->getFormElement();
      if($form_element) {

        //Start of form
        $html .= '<'.esc_attr( $form_element ).
          Helpers::getAttribute($this->getOptionsgroupName(),NULL,' name="%s"').
          Helpers::getAttribute($this->getClass(),NULL,' class="%s"').
          Helpers::getAttribute($this->getCharset(),NULL,' accept-charset="%s"').
          Helpers::getAttribute($this->getAction(),NULL,' action="%s"').
          Helpers::getAttribute($this->getAutocomplete(),NULL,' autocomplete="%s"').
          Helpers::getAttribute($this->getEnctype(),NULL,' enctype="%s"').
          Helpers::getAttribute($this->getMethod(),NULL,' method="%s"').
          Helpers::getAttribute($this->getTarget(),NULL,' target="%s"').
        '>';

      }

      //add input elements
      $html .= $this->getTempForm();

      //add nonce security field
      if ($this->getWpNonce()) {

        //wp nonce field security
        $html .= wp_nonce_field($this->getOptionsgroupName().'_no_action',$this->getOptionsgroupName().'_no_name', true, false );

      }

      //add for admin pages settings_fields and nonce
      if ($this->getSettingsFields()) {

        //wp settings_fields security for admin setting pages!
        //needed own function to get values instead of echo! get_settings_fields
        $html .= self::get_settings_fields( $this->getOptionsgroupName() );

      }

      //End of form
      if($form_element) {

        $html .= '</'.esc_attr( $form_element ).'>';

      }

      return $html;

    }

}
