jQuery( document ).ready( function() {

/**
  * Pane → Preview && Preview → Pane
  * action: customize_controls_enqueue_scripts
  * dependency: customize-controls
  * Works together: customize-preview.js / customize-controls.js
  * https://wordpress.stackexchange.com/questions/300963/passing-data-from-customize-controls-js-to-the-customize-preview-js
  * jQuery .bind() = depecated --> use .on()
  */
  console.log('ZMTHEME ===== Pane starting...');

/**
  * Pane → Preview
  */
  wp.customize.previewer.bind( 'ready', function() {
    console.log('ZMTHEME ===== Pane ready!');
    wp.customize.previewer.send( 'greeting', 'Success' );
  });
/**
  * Preview → Pane
  */
  wp.customize.previewer.bind( 'greeting', function( message ) {
    console.info( 'ZMTHEME ===== Get Data from Preview Connection-Test: - - - - ', message );
  });

  ( function( api ) {

    zmMultiCheckboxInit(api);

  /**
    * Receive Choices of Presets Select
    */
    zmReceivePresetChoice(api);

  /**
    * Range Slider Customizer Control Connector
    */
    zmRangeSlider(api);

  /**
    * Sortable Control
    */
    zmControlSortable(api);

  /**
    * Show / Hide Preview Menus & dummy modules
    */
    zmSendControlstoPreview(api);

  /**
    * Focus Panel or Section
    */
    zmFocusPane(api);

  /**
    * On mouseover of Panel or Section highlight previewer elements
    */
    zmHoverPaneSendtoPreview(api);

  /**
    * Customizer section_headers Toggle
    *
    * !!! Problem with active_callback when adding class to display none to li.customize-control !!!
    *
    * --> Solution:
    * the toggle class is not allowed to have display:none; as css style!!!
    * if has, those li-elements wont be handled by active callback.
    * so used instead --> visibility: hidden;overflow: hidden;
    * height: 0px !important;padding: 0px !important;margin: 0px !important;
    *
    */
    zmSectionHeaderToggleInit();

  /**
    * show / hide custom_section_content options in select_list
    */
    //zmcustomsectioncontentshownhide(api);
    //zmcustomsectioncontentreload(api);


  } )( wp.customize );

} ); // jQuery( document ).ready
