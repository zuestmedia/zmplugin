/**
 * JS & jQuery Functions Lib
 */
 function zmMultiCheckboxInit(api){

   zmMultiCheckboxOnclick(api);

   zmMultiCheckboxChangeVal(api);

   zmMultiCheckboxToggle();

 }
 function zmMultiCheckboxOnclick(api){

   jQuery('.zm-multicheckbox-virtual-input').on('click', function(e) {

     //important to have get here, to get real array not jquery array!
     var cleanarray = jQuery(this).closest('.zm-multicheckbox').find(':checked').map(function() {
          return this.value;
      }).get();

      var datasettingname = jQuery(this).closest('.zm-multicheckbox').attr('zm-datasettingname');

      /*var commaseplistofvals = cleanarray.join(',');
      console.log(commaseplistofvals);*/

      api( datasettingname ).set( cleanarray );

   });

 }
 //if value in field changes, update all checkboxes according to this value!
 function zmMultiCheckboxChangeVal(api){

   jQuery('.zm-multicheckbox').each(function(i) {

     var settingname = jQuery(this).attr('zm-datasettingname');

     api( settingname, function( setting ) {

         setting.bind( function( array ) {

           zmMultiCheckboxRemoveButtons( jQuery('#zmmulticheckbox-buttons-'+settingname) );

           jQuery('#zmmulticheckbox-'+settingname).children().each(function(aa) {

             var inputobj = jQuery(this).find('input');

             inputobj.prop('checked',false);

             var thisvalue = inputobj.val();

             if( jQuery.inArray(thisvalue, array) !== -1 ){

               var thislabel = inputobj.attr('zm-datachoicelabel');
               var thisforid = inputobj.attr('zm-dataforid');

               zmMultiCheckboxAddButton( jQuery('#zmmulticheckbox-buttons-'+settingname), thisforid, thislabel );

               inputobj.prop('checked',true);

             }

           });

         });

     });

   });

 }

 function zmMultiCheckboxAddButton(targetel,thisforid,thislabel){

   if( targetel.length ){

     var label = jQuery("<label>").attr(
       {
         "class": 'uk-button uk-button-default uk-box-shadow-medium uk-button-small uk-margin-small-bottom',
         "for": thisforid,
       }
     );

     var icon = jQuery("<i>").attr(
       {
         "uk-icon": 'icon:close;ratio:0.7;',
         "class": 'uk-margin-small-right',
       }
     );

     var buttonlabel = label.append(icon);
     var result = buttonlabel.append(thislabel);

     targetel.append(result);


   }

 }

 function zmMultiCheckboxRemoveButtons(targetel){

   if( targetel.length ){

     targetel.empty();

   }

 }

 function zmMultiCheckboxToggle(){

   jQuery('.zm-multicheckbox-toggle').on('click', function(e) {

     jQuery(this).children().toggle();

     var toggletarget = jQuery(this).attr('zm-datamulticheckboxtoggletarget');

     jQuery('#'+toggletarget).toggle();

   });


 }

/**
  * the toggle class of items that use active_callback func is
  * !!!!!!!!!!!!!! not allowed to have display:none; !!!!!!!!!!
  * if has, those li-elements wont be handled
  * anymore proper by active callback.
  * Solution is in css to use visibility!
  * --> .zm-toggled in customizer-controls.css
  */
  function zmSectionHeaderToggleInit(){

    //hides all items
    zmSectionHeaderToggleHideItems();

    //hides empty headers without items
    zmSectionHeaderToggleHide();

    //inits on click toggle
    zmSectionHeaderToggleClick();

  }

/**
  * Customizer section_headers initial hide all controlls and toggleheaders without items
  */
  function zmSectionHeaderToggleHideItems(){

    jQuery('.zmtoggleheaderitem').each(function(i) {

      if( jQuery(this).attr('class').indexOf('-tohe-settings') >= 0 ){
        //console.log('do nothing');
      } else {
        jQuery(this).closest('.customize-control').toggleClass("zm-toggled");
      }

    });

  }
  function zmSectionHeaderToggleHide(){

    jQuery('.zm-toggleheader').each(function(i) {

      var comid = jQuery(this).attr('data-zmtoggleheader-comid');
      var section_group = jQuery(this).attr('data-zmtoggleheader-section_group');

      if (jQuery('.'+comid+'-tohe-'+section_group)[0]){
          // Do nothing if class exists
          if(section_group == 'settings'){
            jQuery(this).closest('.customize-control').addClass("zmtoggleopen");
          }
      } else {
          // hide toggleheader
          jQuery(this).closest('.customize-control').toggleClass("uk-hidden");
      }

    });

  }
/**
  * Customizer section_headers toggle by input/select class
  */
  function zmSectionHeaderToggleClick(){

    jQuery('.zm-toggleheader').on('click', function(e) {

      var comid = jQuery(this).attr('data-zmtoggleheader-comid');
      var section_group = jQuery(this).attr('data-zmtoggleheader-section_group');

      if(jQuery(this).closest('.customize-control').hasClass('zmtoggleopen')){

        jQuery(this).closest('.customize-control').removeClass("zmtoggleopen");

        zmSectionHeaderHideItemsBeforeToggleAgain(comid);

      } else {

        //remove open and re-add
        jQuery('.zm-toggleheader[data-zmtoggleheader-comid="'+comid+'"]').each(function(i) {

          jQuery(this).closest('.customize-control').removeClass("zmtoggleopen");

        });
        jQuery(this).closest('.customize-control').addClass("zmtoggleopen");

        //rehide all items via add class!
        zmSectionHeaderHideItemsBeforeToggleAgain(comid);

        jQuery( '.'+comid+'-tohe-'+section_group ).each(function(i) {

          jQuery(this).closest('.customize-control').toggleClass("zm-toggled");

        });

      }

    });

  }
  function zmSectionHeaderHideItemsBeforeToggleAgain(comid){

    jQuery('span[class*="'+comid+'-tohe-"]').each(function(i) {

      jQuery(this).closest('.customize-control').addClass("zm-toggled");
      //jQuery(this).closest('.customize-control').attr("zm-toggled","1");

    });

  }

/**
  * Customizer Control Range Slider to Input
  */
  function zmRangeSlider(api){

    api.previewer.bind( 'ready', function() {
      jQuery('.zmsendrangetoinput').on('input', function() {
        var datasettingname = jQuery(this).attr('zm-datasettingname');
        var datarangeunit = jQuery(this).attr('zm-datarangeunit');
        api( datasettingname ).set( jQuery(this).val()+datarangeunit );
      });
    });

  }

  function zmTimeoutRemoveTitle(msec) {
    myVar = setTimeout(zmRevmoveTitle, msec);
  }

  function zmRevmoveTitle() {
    jQuery(".zm-customizer-component").removeAttr("title");
    jQuery(".widget").removeAttr("title");
  }


  function zmHideControls(){

    //Use each: 'i' is the postion in the array, obj is the DOM object that you are iterating (can be accessed through the jQuery wrapper jQuery(this) as well).
    //jQuery('.zm-prev-menu-modul').each(function(i, obj) {
    jQuery('.zm-prev-menu-modul').each(function(i) {

        //first make itself element hidden
        jQuery(this).addClass("hidden-zm-prev-menu-modul");

        //then if has other neighbor elemnts, check if they are also hidden. if all are, next step is to hide the first parent above with com_id
        //mit self and this kann variable aus funktion out of scope geholt werden!!
        //https://stackoverflow.com/questions/12309264/jquery-each-closure-how-to-access-outside-variable
        this.allhidden = 'hideparent';
        var self = this;
        jQuery(this).parent().children().each(function(i) {

          var chiildrenclasses = jQuery(this).attr("class");
          if( chiildrenclasses == undefined ){
          /** only add chiildrenclasses if <style>!
            * in special cases eg blog list:
            * articles having and not having tags mixed;
            * there can be, next to zm-prev-menu-modul elements,
            * elements without id in a comcontainer
            */
            var chiildrenclasses = "do-not-hide";
            if(jQuery(this).is("style")){
              //console.log(jQuery(this).text());
              var chiildrenclasses = "hidden-zm-prev-menu-modul";
            }
          }

          if (chiildrenclasses.indexOf("hidden-zm-prev-menu-modul") >= 0){
            //return nothing, is hidden
          } else {
            self.allhidden = 'stillactivechildren';
          }

        });

        if(this.allhidden == 'hideparent'){

          //if is a _defsidebar in posts loop, parents has not always
          //zm-customizer-component class, so these need other hide action
          var classofstartingitem = jQuery(this).attr('class');
          if( classofstartingitem.indexOf('_defsidebar') >= 0 ){

            var classnames = classofstartingitem.split(/\s+/);
            jQuery.each( classnames, function(index,value ) {
              if( value.indexOf('_defsidebar') >= 0 ){
                var parentclasstohide = value.replace('_defsidebar', '');
                jQuery('.'+parentclasstohide).addClass("hidden-zm-prev-menu-modul");
              }
            });

          } else {

            //get classes of first parent to check if its a nav container, so section can be hidden if it is the only element
            var parentelement = jQuery(this).parents('.zm-customizer-component').first();
            var parentclass = jQuery(this).parents('.zm-customizer-component').first().attr("class");
            if( parentclass.indexOf("com_id_nav_") >= 0 ){
              parentelement.parents('.zm-customizer-component').first().addClass("hidden-zm-prev-menu-modul");
            }

            //check if next to hide element has children with zm-nohide-articles, so stopp if has
            if( parentelement.find('.zm-nohide-articles').length ){

              //console.log( parentelement.children('.zm-nohide-articles') );
              console.log( 'not hide article list containers' );

            } else {

              jQuery(this).parents('.zm-customizer-component').first().addClass("hidden-zm-prev-menu-modul");

            }

          }

        }

    });

  }

  function zmTimeoutShowControls(msec) {
    myVar = setTimeout(zmShowControls, msec);
  }

  function zmShowControls(){

    jQuery('.hidden-zm-prev-menu-modul').each(function(i) {

      jQuery(this).removeClass("hidden-zm-prev-menu-modul");

    });

  }

  function zmSendControlstoPreview(api){

    //collapse-sidebar
    api.previewer.bind( 'ready', function() {//check if previewer ready
      jQuery('.collapse-sidebar').click(function () {

        var ariaexp = jQuery(this).attr('aria-expanded');

        var obj = new Object();
         obj.aria  = ariaexp;

        api.previewer.send( 'zmcollapsesidebar', obj );

      });
    });


  }

  function zmReceiveControlsfromPane(api){

      api.preview.bind( 'zmcollapsesidebar', function( data ) {
         if(data.aria == 'true'){
           zmShowControls();
         }else if(data.aria == 'false'){
           zmHideControls();
         }
      });

  }


  function zmFocusPane(api){

     api.previewer.bind( 'paneview', function( data ) {
        if(data.type == 'panel'){
          var zmpanel = wp.customize.panel( data.name );
          zmpanel.focus();
        } else if (data.type == 'section'){
          var section = wp.customize.section( data.name );
          section.focus();
        }
      });

  }

  function zmFocusPreview(api){

    jQuery( document.body ).on( 'click', '.zm-focuspane', function(){
      api.preview.send( 'paneview', jQuery( this ).data( 'control' ) );
    });

  }

  function zmHoverPaneReceivefromPane(api){

    api.preview.bind( 'hoverpanemouse', function( data ) {

       var hoverclass = '.com_id_'+data.id;

       if(data.type == 'enter'){

         jQuery( hoverclass ).css({"box-shadow":"inset 0 0 2px rgb(30 140 190 / 80%)", "-webkit-box-shadow":"inset 0 0 2px rgb(30 140 190 / 80%)","z-index":"1","position":"relative"})

       }else if(data.type == 'leave'){

         jQuery( hoverclass ).css({"box-shadow":"", "-webkit-box-shadow":"","z-index":"","position":""})

       }

    } );

  }

/*function zmConvertSectionIDtoComID(sectionid){

    var result = sectionid.replace('accordion-section-','com_id_');

    return result;

  }*/

  function zmHoverPaneSendtoPreview(api){

    jQuery( document.body ).on( 'mouseenter', '.zmhovercomid', function(){

      var obj = new Object();
        obj.type  = 'enter';
        obj.id  = jQuery(this).attr('zm-datasortableitemid');

      api.previewer.send( 'hoverpanemouse', obj );

    });

    jQuery( document.body ).on( 'mouseleave', '.zmhovercomid', function(){

      var obj = new Object();
        obj.type  = 'leave';
        obj.id  = jQuery(this).attr('zm-datasortableitemid');

      api.previewer.send( 'hoverpanemouse', obj );

    });

  }

  function convertHEXtoRGBA( hex ){

    hex = hex.replace('#','');
    if( hex.length == 3 ){
      hex = hex.substr(0,1) + hex.substr(0,1) + hex.substr(1,2) + hex.substr(1,2) + hex.substr(2,3) + hex.substr(2,3);
    }
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);

    //result = ‘rgba(‘+r+’,’+g+’,’+b+’,’+opacity/100+’)’;//opacity removed from function args
    result = r+', '+g+', '+b;

    return result;

  }

  function zmCssVarsConnectSetting(api,settingname,settingcssvar){

    api( settingname, function( setting ) {

        setting.bind( function( value ) {

          if(settingcssvar === 'color_text_inverse'){

            value = convertHEXtoRGBA( value );

          }

          document.documentElement.style.setProperty( '--'+settingcssvar, value );

        } );

    } );

  }

/**
  * Color root Variables Setting Connection
  * @return {[type]} [description]
  */
  function zmCssVarsSettings(api){

   //get json object of all components !!!
   jQuery.getJSON( wphomeurl+"?virtualjsonobj=default_theme_components", function( data ) {

     jQuery.each(data.globals, function(index, value){

       var settingnameprafix = 'globals__'+index+'_args_';

       if(value.type === 'CssVars'){

         jQuery.each(value.args, function(index2, value2){

           var settingname = settingnameprafix+index2;

           zmCssVarsConnectSetting(api,settingname,index2);

         });

       }

     });

   });

  }

  function zmReceivePresetChoice(api){

   jQuery('.zm-presets').on('input', function() {

     var datasettingname = jQuery(this).attr('zm-datasettingname');

     zmSetPreset(api,datasettingname,jQuery(this).val());

   });

  }

  function zmSetPreset(api,comid,presetid){

   jQuery.getJSON( wphomeurl+'?virtualjsonobj=presetsdynamicobj&com_id='+comid+'&preset_id='+presetid+'', function( data ) {

     jQuery.each(data, function(index, value){

       if(index !== 'args_sidebar'){

         arg_control = api( comid+'_args_'+ index );

         if( arg_control !== undefined ){

           arg_control.set( value );

         }

       } else {

         jQuery.each(value, function(index2, value2){

           arg_sb_control = api( comid+'_defsidebar_args_'+ index2 );

           if( arg_sb_control !== undefined ){

             arg_sb_control.set( value2 );

           }

         });

       }

     });

   });

  }

  function zmControlSortable(api){

   //add jquery sortable drag n drop to setting via class!
   jQuery( function() {
     jQuery( '.zm-sortable' ).sortable();
   });

   //rearange items in preview on update
   jQuery( ".zm-sortable" ).on( "sortupdate", function( event, ui ) {

     var el = jQuery( this );

     //outer sortablecontainer needs to start to be refreshed before the items,
     //but refreshing will be stopped, before it can refresh alone and will refresh together with items finally
     //reason: if sortablecontainer refresh is inited after items, it will refresh items without mostouterclasses and com_id's!
     var randomdummyrefreshnr = Math.floor((Math.random() * 100) + 1);
     var parentid = jQuery( this ).attr('zm-datasortablecontainer');
     api( parentid+'_args_sortable' ).set( randomdummyrefreshnr );

     el.children().each(function(i, obj) {

       var comid = jQuery( this ).attr('zm-datasortableitemid');

       api( comid+'_args_item_position' ).set( i );

     });

   });

  }

  //foreach custom_section_content input bind one value check function
  function zmcustomsectioncontentreload(api){

    jQuery('.zm-presets').each(function(i) {

       var datasettingname = jQuery(this).attr("zm-datasettingname");

       if( jQuery('#_customize-input-' + datasettingname + '_args_custom_section_content' ).length !== 0 ) {

         zmcustomsectioncontentconnectsetting(api,datasettingname + '_args_custom_section_content');

      }

    });

  }

  //on change of value reload zmcustomsectioncontentshownhide to show and hide options
  function zmcustomsectioncontentconnectsetting(api,settingname){

    api( settingname, function( setting ) {

        setting.bind( function( value ) {

          zmcustomsectioncontentshownhide2(api,settingname);

        } );

    });

  }

  //show and hide correct custom_section_content options!
  function zmcustomsectioncontentshownhide(api){

    console.log('ZMTHEME ===== Pane Custom Section Content Check!');

    jQuery('.zm-presets').each(function(i) {

     var settingname = jQuery(this).attr("zm-datasettingname") + '_args_custom_section_content' ;

     zmcustomsectioncontentshownhide2(api,settingname);

    });

  }

  //show and hide correct custom_section_content options!
  function zmcustomsectioncontentshownhide2(api,settingname){

    //console.log('ZMTHEME ===== Pane Custom Section Content Check!');

    var inputsettingname = '#_customize-input-' + settingname;

    if( jQuery( inputsettingname ).length !== 0 ) {

      var hascustomsectioncontent = jQuery( inputsettingname + ' option:selected' ).val();

      if(hascustomsectioncontent){

        //first remove all hiddens in select list, then re-add
        jQuery( inputsettingname ).children().each(function(i) {
         jQuery(this).removeAttr('hidden');
        });

        //if has widget (default) hide all nav_ and offcanvas_
        if(hascustomsectioncontent == 'default' || hascustomsectioncontent == 'queryloop' || hascustomsectioncontent.indexOf("extensions__") >= 0 ){

          jQuery( inputsettingname ).children().each(function(i) {

           if( jQuery(this).val().indexOf("nav_") >= 0 || jQuery(this).val().indexOf("offcanvas_") >= 0  ){

             jQuery(this).prop('hidden', true);

           }

          });

         //if is nav hide all others than nav_
        } else if( hascustomsectioncontent.indexOf("nav_") >= 0 ){

          jQuery( inputsettingname ).children().each(function(i) {

            if( jQuery(this).val().indexOf("nav_") === -1 ){

              jQuery(this).prop('hidden', true);

            }

          });

         //if is offcanvas hide all others than offcanvas_
        } else if( hascustomsectioncontent.indexOf("offcanvas_") >= 0 ){

          jQuery( inputsettingname ).children().each(function(i) {

            if( jQuery(this).val().indexOf("offcanvas_") === -1 ){

              jQuery(this).prop('hidden', true);

            }

          });

        }

      }

    }

  }

/**
  * Modal for notifications in customizer
  */
 function zmAddNotification(notification){

   if(jQuery("#zm-previewer-notification-modal").length == 0) {

     //add new modal with content
     zmAddNotificationModaltoPreviewer(notification);

   } else {

      //replace content and reopen existing modal
     jQuery("#zm-previewer-notification-content").html(notification);

     jQuery("#zm-previewer-notification-modal").attr(
       {
         "style": 'display: block;z-index:1000005;',
       }
     );
     jQuery("#zm-previewer-notification-modal").addClass('uk-open');
   }

 }

 function zmCloseNotification(){

   jQuery('#zm-previewer-notification-modal-close-button').on('click', function(e) {

     jQuery("#zm-previewer-notification-modal").removeAttr('style');
     jQuery("#zm-previewer-notification-modal").removeClass('uk-open');
     //console.log('close notification');

   });

 }


  function zmAddNotificationModaltoPreviewer(notification){

    var modal = jQuery('<div>').attr(
      {
        "class": 'uk-modal-full uk-open zm-modal',
        "id": 'zm-previewer-notification-modal',
        "style": 'display: block;z-index:1000005;',
        "uk-modal": ''
      }
    );
    var modalbox = jQuery('<div>').attr(
      {
        "class": 'uk-modal-dialog uk-height-viewport',
      }
    );

    var modalclosebutton = jQuery('<a>').attr(
      {
        "class": 'uk-position-absolute uk-link-reset zm-modal-close',
        "href": '#',
        "id": 'zm-previewer-notification-modal-close-button',
      }
    );
    var modalcloseicon = jQuery('<i>').attr(
      {
        "uk-icon": 'icon:close;',
      }
    );
    modalclosebutton.append(modalcloseicon);

    var modalinner = jQuery('<div>').attr(
      {
        "class": 'uk-flex-middle uk-position-center uk-text-center',
        "id": 'zm-previewer-notification-content',
      }
    ).append(notification);

      modalbox.append(modalclosebutton);
      modalbox.append(modalinner);

    modal.append(modalbox);

    jQuery('body').append(modal);

    zmCloseNotification();

  }

  function zmHoverMenu(){

    jQuery( document.body ).on( 'mouseenter', '.zmdata-custonav', function(){

      //add active class
      jQuery(this).addClass('now-active');

      //always remove deepest class
      jQuery('.zmdata-custonav').removeClass('now-deepest');

      //need to remove all other active menus on entering new div with menu
      jQuery('.now-active-div').remove();

      //add menu to deepest element hoovered
      zmGetDeepestElementbyCalss( 'now-active' );

    });

    jQuery( document.body ).on( 'mouseleave', '.zmdata-custonav', function(){

      //remove active classe
      jQuery(this).removeClass('now-active');

      //always remove deepest class
      jQuery('.zmdata-custonav').removeClass('now-deepest');

      //need to remove all other active menus on leaving this div with menu
      jQuery('.now-active-div').remove();

      //add menu to deepest element hoovered
      zmGetDeepestElementbyCalss( 'now-active' );

    });

  }

  //finds the deepest element by class in a tree!
  function zmGetDeepestElementbyCalss( active_class ){

    var elems = jQuery( '.' + active_class ), deepest, lowestLevel = 0;

    if(elems.length){

      elems.each(function() {
          var depth = jQuery(this).parents().length;
          if (depth > lowestLevel) {
              deepest = jQuery(this);
              lowestLevel = depth;
          }
      });

      deepest.addClass('now-deepest');//used for hovering and adding pos relative!

      zmCreateIconMenu(deepest);

    }

  }

  function zmCreateIconMenu($element){

    var html = jQuery('<div>').attr(
      {
        "class": 'now-active-div uk-text-small uk-position-top-left uk-animation-slide-top uk-animation-fast',
      }
    );

    var innerhtml = jQuery('<ul>').attr(
      {
        "class": 'uk-grid-collapse zm-customizer-button-nav',
        "uk-grid": '',
      }
    );

    //link to parent modulesortable or section ---> means to all navs!
    if( $element.hasClass('zmdata-custonav') ){

      var icon_el_1 = $element.parents('[zmcustonav-comid]').first();

      if(icon_el_1.length){

        //var section_icon_1 = 'move';
        var section_icon_1 = 'reply';
        if( icon_el_1.hasClass('section') ){
          var section_icon_1 = 'cog';
        }

        var sections_link = icon_el_1.attr('zmcustonav-comid');

        var icon_link_sections = jQuery('<a>').attr(
          {
            "class": 'zm-focuspane uk-icon-button zm-customizer-button',
            "uk-icon": section_icon_1,
            "data-control": '{ "name":"' + sections_link + '", "type":"section" }',
          }
        );

        var list_el_sections = jQuery('<li>');

        list_el_sections.append(icon_link_sections);

        innerhtml.append(list_el_sections);

      }

    }

    //link actual hovered com - section
    if( $element.hasClass('section') || $element.hasClass('module') ){

      var section_link = $element.attr('zmcustonav-comid');

      //section icon --> if section = cog if module = thumbnails
      var section_icon = 'cog';
      if( $element.hasClass('module') ){
        var section_icon = 'thumbnails';
      }
      if( $element.hasClass('custom-module') ){
        var section_icon = 'cog';
      }

      var icon_link = jQuery('<a>').attr(
        {
          "class": 'zm-focuspane uk-icon-button zm-customizer-button',
          "uk-icon": section_icon,
          "data-control": '{ "name":"' + section_link + '", "type":"section" }',
        }
      );

      var list_el = jQuery('<li>');

      list_el.append(icon_link);

      innerhtml.append(list_el);

    }

    //link to widget or module inside section
    if( $element.hasClass('section') || $element.hasClass('custom-module') ){

      var icon_el_2 = $element.find(".widget").first();


      if(icon_el_2.length){

        var el_2_attrs = jQuery(icon_el_2).data('customize-partial-placement-context');

        if(el_2_attrs){

          var widget_link = el_2_attrs.sidebar_id;

          if (widget_link.indexOf("_defsidebar") >= 0){

            var widget_link_sections = jQuery('<a>').attr(
              {
                "class": 'zm-focuspane uk-icon-button zm-customizer-button',
                "uk-icon": 'pencil',
                "data-control": '{ "name":"sidebar-widgets-' + widget_link + '", "type":"section" }',
              }
            );

            var list_el_widget = jQuery('<li>');

            list_el_widget.append(widget_link_sections);

            innerhtml.append(list_el_widget);

          }

        }

      }


    }

    html.append(innerhtml);

    $element.append(html);

  }


  console.log('ZMTHEME ===== customizer.js initialised');
