/** Functions here */

jQuery(document).ready(function($){

/**
  * Init Functions here
  */
  console.log('yay designexplorer.js');

  /**
    * Authenticated with nonce!!!! beforeSend --> nonce!
    */
  $('.zminstallbutton').click(function() {

    var pid;
    if( $(this).attr('data-pid') ){
      var pid = $(this).attr('data-pid');
    }

    zmpdesexpupdatebutton($,pid,'zminstalling',0);

    var installtype = 'full';
    if( $(this).hasClass('part') ){
      var installtype = 'partial';
    }


    var apiurl;
    if( $(this).attr('data-url') ){
      var apiurl = $(this).attr('data-url');
    }

    var Datatosend = {
      'installtype':installtype,
      'pid':pid,
      'apiurl':apiurl
    }

    $.ajax({
      type: 'GET',
      url: zmpdesignexplorer_object.restURL + 'zmp/v1/designdata/' + pid,
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', zmpdesignexplorer_object.restNonce )
      },
      data: Datatosend,
      sentData: Datatosend,//success function cannot access data!!! but sentData works!
      //success: function(response) { console.log( 'success' ); },
      error: function(response){

        //error if internal rest api is deactivated...
        console.log('error');
        //error
        zmpdesexpupdatebutton($,this.sentData.pid,'zminstallfailed',0);
        //back to default
        zmpdesexpupdatebutton($,this.sentData.pid,'zminstall', 1000);

      },
      cache:false
    }).done( function ( response ) {

        if(response == "error"){

          //error if file can not be downloaded due to server...
          console.log( response );
          //error
          zmpdesexpupdatebutton($,this.sentData.pid,'zminstallfailed',0);
          //back to default
          zmpdesexpupdatebutton($,this.sentData.pid,'zminstall', 1000);

        } else {

          console.log( response );

          //console.log( 'success' + response + this.sentData.pid + this.url );

          //success
          zmpdesexpupdatebutton($,this.sentData.pid,'zminstalled',0);

          //back to default
          zmpdesexpupdatebutton($,this.sentData.pid,'zminstall', 1000);

        }

    });


  });


});//jquery document ready


function zmpdesexpupdatebutton($,pid,buttonclass,timeout){

  setTimeout(() => {

    var dropdownelement = $('.zminstallbuttonid-'+pid).next();

    UIkit.dropdown(dropdownelement).hide();

    //first hide all
    $('.zminstallbuttonid-'+pid).children().addClass('uk-hidden');

    $('.zminstallbuttonid-'+pid).children('.'+buttonclass).removeClass('uk-hidden');

  }, timeout)

}
