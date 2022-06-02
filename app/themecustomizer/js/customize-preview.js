( function( api ) {

/**
  * Pane → Preview && Preview → Pane
  * action: wp_enqueue_scripts if is_customize_preview()
  * dependency: customize-preview (javascript to load with before)
  * Work together: customize-preview.js / customize-controls.js
  * https://wordpress.stackexchange.com/questions/300963/passing-data-from-customize-controls-js-to-the-customize-preview-js
  * jQuery .bind() = depecated --> use .on()
  * oder: https://code.tutsplus.com/tutorials/customizer-javascript-apis-the-previewer--cms-27313 !!!!
  */
  console.log('ZMTHEME ===== Preview starting...');

/**
  * Pane → Preview
  */
  api.bind( 'preview-ready', function() {
    api.preview.bind( 'greeting', function( message ) {
       console.info( 'ZMTHEME ===== Get Data from Pane Connection-Test: - - - - ', message );
    });
  });

/**
  * Preview → Pane
  */
  jQuery( document ).ready(function() {

    console.log('ZMTHEME ===== Preview ready!');
    api.preview.send( 'greeting', 'Success' );

  /**
    * Removes ShiftClick Titles!
    * with delay, because are loaded after rendering has finished
    */
    zmTimeoutRemoveTitle(5000);

  /**
    * Remove again after Component Reload
    */
    api.selectiveRefresh.bind( 'partial-content-rendered', function( particalrenderedobj ) {
      zmTimeoutRemoveTitle(2000);
    });

  /**
    * show / hide sidebar
    */
    zmReceiveControlsfromPane(api);

  /**
    * Focus Panels or Sections
    */
    zmFocusPreview(api);

  /**
    * Hover Pane Section => Highlight component by class
    */
    zmHoverPaneReceivefromPane(api);

  /**
    * Receive CSS Vars changes from pane
    */
    zmCssVarsSettings(api);

  /**
    * jQuery HoverMenu with shortlinks to customizer sections
    */
    zmHoverMenu();



  }); // jQuery( document ).ready

} )( wp.customize );
