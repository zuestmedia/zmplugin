<?php

namespace ZMP\Plugin\ThemeCustomizer;

use WP_Customize_Control;

class CustomizerControlls extends WP_Customize_Control {

  //https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2/
  //https://github.com/maddisondesigns/customizer-custom-controls --> auswahl von setting controlls!

    /**
    * https://developer.wordpress.org/reference/classes/wp_customize_control/#user-contributed-notes
    * add custom controll class extensions to create own controlls!
    */
    //public $type = 'toggleswitch';        

    public $zm_kses = false;

    public function __construct( $manager, $id, $args ) {

      parent::__construct( $manager, $id, $args );      

      if(array_key_exists('zm_kses',$args)){

        $this->zm_kses = $args['zm_kses'];

      }

    }

    /**
    * Render the control's content.
    */
    public function render_content() {

      $input_id         = '_customize-input-' . $this->id;
      $description_id   = '_customize-description-' . $this->id;

      $input_attrs = $this->input_attrs;

      if(strpos($this->type, 'zm-') !== false){

        if(strpos($this->type, 'zm-toggleheader') !== false){

          ?>

      			<a href="#" class="zm-toggleheader uk-display-block uk-link-reset" data-zmtoggleheader-section_group="<?php echo esc_attr( $this->input_attrs['section_group'] ); ?>" data-zmtoggleheader-comid="<?php echo esc_attr( $this->input_attrs['com_id'] ); ?>">
      				<?php if( !empty( $this->label ) ) { ?>
      					<span class=""><?php echo esc_html( $this->label ); ?></span>
                <span class="uk-align-right uk-margin-remove uk-icon" uk-icon="chevron-down"></span>
      				<?php } ?>
      			</a>

      		<?php

        } elseif(strpos($this->type, 'zm-multicheckbox') !== false){

          if ( empty( $this->choices ) ) {
            return;
          } ?>

          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <?php

            $hideifmorethanseven = NULL;
            $overflowauto = NULL;
            $heightmax = NULL;


            if(count($this->choices) >= 7){

            //display or not select list if more than 7 hide
            $hideifmorethanseven = 'display:none;';
            $overflowauto = 'uk-overflow-auto';
            $heightmax = 'uk-height-max-small ';
           ?>

            <div class="zm-multicheckbox-buttons" id="zmmulticheckbox-buttons-<?php echo esc_attr( $this->id ); ?>" >

              <?php foreach ( $this->choices as $value => $label ) {

                if( $this->getMCBChecked( $value, $this->value() ) ){

                  $multiinputid = sanitize_title( $this->id.''.$value ); ?>

                  <label class="uk-button uk-button-default uk-box-shadow-medium uk-button-small uk-margin-small-bottom" for="<?php echo esc_attr( $multiinputid ); ?>">
                    <i class="uk-margin-small-right" uk-icon="icon:close;ratio:0.7;"></i><?php echo esc_html( $label ); ?>
                  </label>

                <?php }

              } ?>

            </div>

          <?php } ?>

          <div
            class="<?php echo esc_attr( $heightmax ); ?>zm-multicheckbox"
            <?php echo esc_attr( $overflowauto ); ?>
            id="zmmulticheckbox-<?php echo esc_attr( $this->id ); ?>"
            zm-datasettingname="<?php echo esc_attr( $this->id ); ?>"
            style="<?php echo esc_attr( $hideifmorethanseven ); ?>"
          >

            <?php foreach ( $this->choices as $value => $label ) { ?>

                <div class="zm-multicheckbox-label">

                  <?php $multiinputid = sanitize_title( $this->id.''.$value ); ?>

                  <input
                    class="zm-multicheckbox-virtual-input"
                    id="<?php echo esc_attr( $multiinputid ); ?>"
                    zm-datachoicelabel="<?php echo esc_attr( $label ); ?>"
                    zm-dataforid="<?php echo esc_attr( $multiinputid ); ?>"
                    type="checkbox"
                    value="<?php echo esc_attr( $value ); ?>"
                    <?php echo $this->getMCBChecked( $value, $this->value() ); ?>
                  />
                  <label for="<?php echo esc_attr( $multiinputid ); ?>">
                  
                    <?php 

                      if($this->zm_kses){

                        echo wp_kses( $label, $this->zm_kses );

                      } else {

                        echo esc_html( $label ); 

                      }
                    
                    ?>
                
                  </label>

                </div>

                <?php

            }

            ?>

          </div>

          <?php /*is next element of zm-multicheckbox (has to be)!!*/ ?>
          <input
            id="<?php echo esc_attr( $input_id ); ?>"
            class=""
            <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
            type="hidden"
            <?php $this->link(); ?>
          />



          <?php if(count($this->choices) >= 7){ ?>

            <hr>
            <div class="zm-multicheckbox-toggle" zm-datamulticheckboxtoggletarget="zmmulticheckbox-<?php echo esc_attr( $this->id ); ?>">
              <a href="#" class="uk-align-right uk-margin-remove" style="display:none;"><i uk-icon="ratio:0.7;icon:chevron-up;"></i> Hide</a>
              <a href="#" class="uk-align-right uk-margin-remove" ><i uk-icon="ratio:0.7;icon:chevron-down;"></i> Show</a>
            </div>

          <?php } ?>

          <?php

        } elseif(strpos($this->type, 'zm-toggleswitch') !== false){

          //options: 'toggleswitch-small', '-inverted', '-round' (one or multiple, order is not important)
          $displayoptions = NULL;
          if(strpos($this->type, '-small') !== false){
            $displayoptions .= ' small';
          }
          if(strpos($this->type, '-inverted') !== false){
            $displayoptions .= ' inverted';
          }
          if(strpos($this->type, '-round') !== false){
            $displayoptions .= ' round';
          }

          ?>

            <div uk-grid class="uk-child-width-auto uk-grid">
              <div class="uk-width-expand">
                <label class="customize-control-title" for="<?php echo esc_attr( $input_id ); ?>">
                  <?php echo esc_html( $this->label ); ?>
                </label>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
              </div>
              <div class="uk-flex uk-flex-middle">
                <label class="zm-switch<?php echo esc_attr( $displayoptions ); ?>">
                  <input
                      id="<?php echo esc_attr( $input_id ); ?>"                      
                      <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                      type="checkbox"
                      value="<?php echo esc_attr( $this->value() ); ?>"
                      <?php $this->link(); ?>
                      <?php checked( $this->value() ); ?>
                  />
                  <span class="zm-slider<?php echo esc_attr( $displayoptions ); ?>"></span>
                </label>
              </div>
            </div>

          <?php

        } elseif(strpos($this->type, 'zm-radiobutton') !== false){

          //_class_background_pos

          if ( empty( $this->choices ) ) {
              return;
          }

          $radioactiveclass = NULL;
          if(strpos($this->type, '-valueisbuttonclass') == false){
            $radioactiveclass = ' active';
          }

          $gridclass = ' uk-child-width-1-2';
          if(strpos($this->type, '-w-1-3') !== false){
            $gridclass = ' uk-child-width-1-3';
          }
          if(strpos($this->type, '-w-1-5') !== false){
            $gridclass = ' uk-child-width-1-5';
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-grid uk-grid-collapse<?php echo esc_attr( $gridclass ); ?> zm-radio-buttons<?php echo esc_attr( $radioactiveclass ); ?>">

            <?php foreach ( $this->choices as $value => $label ) :

              $radiobuttonclass = ' uk-button-default';
              if(strpos($this->type, '-valueisbuttonclass') !== false){
                $radiobuttonclass = ' '.str_replace("-section-", "-button-", $value);
                //$radiobuttonclass = ' '.$value;
              }

              ?>

              <div class="">

                <div class="zm-radio-buttons-control">
                    <input
                        id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                        type="radio"                      
                        <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                        value="<?php echo esc_attr( $value ); ?>"
                        name="<?php echo esc_attr( $name ); ?>"
                        <?php $this->link(); ?>
                        <?php checked( $this->value(), $value ); ?>
                        class="uk-hidden"
                        />
                    <label class="uk-button<?php echo esc_attr( $radiobuttonclass ); ?> uk-width-1-1 uk-position-relative" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">
                      <?php if(strpos($this->type, '-valueisbuttonclass') !== false){ ?>
                        <span class="zm-radio-buttons-active uk-icon uk-animation-stroke uk-hidden" style="--uk-animation-stroke: 50;" uk-icon="icon:paint-bucket;ratio:1.2"></span>
                        <span class="zm-radio-buttons-inactive uk-icon" uk-icon="icon:plus;ratio:0.7"></span>
                      <?php } else {

                        if($this->zm_kses){

                          echo wp_kses( $label, $this->zm_kses );

                        } else {

                          echo esc_html( $label ); 

                        }

                      } ?></label>
                </div>

              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-radiocolors') !== false){

          //_class_color_background

          if ( empty( $this->choices ) ) {
              return;
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-grid-collapse uk-child-width-expand uk-text-center">

            <?php foreach ( $this->choices as $value => $label ) : ?>

              <div class="zm-newradio-button radiocolors">
                <input
                    id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                    type="radio"                      
                    <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                    value="<?php echo esc_attr( $value ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( $this->value(), $value ); ?>
                    class="uk-hidden"
                    />

                <?php $radiobuttonclass = str_replace( array( "-section-", "-card-"), "-background-", $value); ?>
                <?php $radiobuttonclass .= ' '.str_replace( array( "-section-", "-card-"), "-button-", $value); ?>
                <?php $color_key = str_replace( array( "uk-section-", "uk-card-"), "", $value); //overwrites style from global colors to controlls?>

                <label
                  class="<?php echo esc_attr( $radiobuttonclass ); ?> uk-box-shadow-small uk-icon-button"
                  <?php echo $this->getColorByKey($color_key); ?>
                  title="<?php echo esc_attr( $label ); ?>"
                  for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                >

                  <div class="zm-newradio-active uk-animation-stroke uk-hidden" style="--uk-animation-stroke: 100;"><i class="uk-text-center" uk-icon="check"></i></div>

                </label>
              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-radioverticalpadding') !== false){

          //_class_section

          if ( empty( $this->choices ) ) {
              return;
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-child-width-expand uk-grid-collapse zmgridsmall">

            <?php foreach ( $this->choices as $value => $label ) : ?>

              <div class="uk-text-center zm-newradio-button radioverticalpadding">
                <input
                    id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                    type="radio"                      
                    <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                    value="<?php echo esc_attr( $value ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( $this->value(), $value ); ?>
                    class="uk-hidden"
                    />
                <label class="" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">

                  <div class="uk-section-default uk-box-shadow-small" style="padding: calc( (64px - <?php echo esc_attr( $label ); ?>) / 2 ) 2px;">

                    <div class="uk-button uk-button-default zmactive uk-button-small uk-padding-remove uk-flex uk-flex-middle" style="height: <?php echo esc_attr( $label ); ?> ;">

  					             <div class="uk-section-default uk-width-1-1">

                           <div class="zm-newradio-inactive"><i class="uk-text-center" uk-icon="menu"></i></div>
                           <div class="zm-newradio-active uk-animation-stroke uk-hidden" style="--uk-animation-stroke: 100;"><i class="uk-text-center" uk-icon="check"></i></div>

                         </div>

  		              </div>

			            </div>

                </label>
              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-radiocontainerwidth') !== false){

          if ( empty( $this->choices ) ) {
              return;
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-child-width-expand uk-grid-collapse zmgridsmall">

            <?php foreach ( $this->choices as $value => $label ) : ?>

              <div class="uk-text-center zm-newradio-button radiocontainerwidth">
                <input
                    id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                    type="radio"                      
                    <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                    value="<?php echo esc_attr( $value ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( $this->value(), $value ); ?>
                    class="uk-hidden"
                    />
                <label class="" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">

                  <div class="uk-section-default uk-box-shadow-small uk-text-center" style="height: 60px;padding: 2px;">

          					<div class="uk-button uk-button-default zmactive uk-button-small uk-padding-remove uk-display-inline-block uk-height-1-1 uk-width-1-1">

                      <div class="uk-section-default uk-position-relative uk-display-inline-block uk-height-1-1 " style="width:<?php echo esc_attr( $label ); ?>;">

                        <div class="zm-newradio-inactive uk-position-center"><i class="uk-text-center" uk-icon="menu"></i></div>
                        <div class="zm-newradio-active uk-position-center uk-animation-stroke uk-hidden" style="--uk-animation-stroke: 100;"><i class="uk-text-center" uk-icon="check"></i></div>

                      </div>

                    </div>

                  </div>

                </label>
              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-radiocontainercardpadding') !== false){

          if ( empty( $this->choices ) ) {
              return;
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-child-width-expand uk-grid-small">

            <?php foreach ( $this->choices as $value => $label ) : ?>

              <div class="uk-text-center zm-newradio-button radiocontainercardpadding">
                <input
                    id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                    type="radio"                      
                    <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                    value="<?php echo esc_attr( $value ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( $this->value(), $value ); ?>
                    class="uk-hidden"
                    />
                <label class="" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">

                  <div class="uk-section-default uk-box-shadow-small uk-margin-auto" style="height: 60px;padding: 2px;max-width: 64px;">

          					<div class="uk-button uk-button-default zmactive uk-button-small uk-padding-remove uk-display-inline-block uk-height-1-1 uk-width-1-1">

                      <div class="uk-section-default uk-position-relative uk-display-inline-block" style="width: <?php echo esc_attr( $label ); ?>;margin: calc( (100% - <?php echo esc_attr( $label ); ?>) / 2 ) 0;height: <?php echo esc_attr( $label ); ?>;">

                        <div class="zm-newradio-inactive uk-position-center"><i class="uk-text-center" uk-icon="menu"></i></div>
                        <div class="zm-newradio-active uk-position-center uk-animation-stroke uk-hidden" style="--uk-animation-stroke: 100;"><i class="uk-text-center" uk-icon="check"></i></div>

                      </div>

                    </div>

                  </div>

                </label>
              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-radiobackgroundsize') !== false){

          if ( empty( $this->choices ) ) {
              return;
          }

          $name = '_customize-radio-' . $this->id;
          ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <div uk-grid class="uk-child-width-expand uk-grid-small">

            <?php foreach ( $this->choices as $value => $label ) : ?>

              <div class="uk-text-center zm-newradio-button radiobackgroundsize">
                <input
                    id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                    type="radio"                      
                    <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
                    value="<?php echo esc_attr( $value ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    <?php $this->link(); ?>
                    <?php checked( $this->value(), $value ); ?>
                    class="uk-hidden"
                    />
                <label class="" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">

                  <div class="uk-section-default uk-box-shadow-small uk-margin-auto" style="height: 60px;padding: 2px;max-width: 90px;">

          					<div class="uk-button uk-button-default zmactive uk-button-small uk-padding-remove uk-display-inline-block uk-height-1-1 uk-width-1-1">

                      <div class="uk-section-default uk-position-relative uk-display-inline-block uk-overflow-hidden" style="width:82%;margin:10% 0;height:70%;">

                      <?php 

                        if($this->zm_kses){

                          echo wp_kses( $label, $this->zm_kses );

                        } else {

                          echo esc_html( $label ); 

                        }

                      ?>

                      </div>

                    </div>

                  </div>

                </label>
              </div>

            <?php endforeach; ?>

          </div>

          <?php

        } elseif(strpos($this->type, 'zm-range') !== false){

          /**
           * Uses Script to send / receive value from range slider
           * func 'zmRangeSlider' in customizer.js
           *
           * zm-range + -marginremove removes margin on bottom! via css!
           */

          $range_val = $this->value();
          if( array_key_exists( 'unit', $input_attrs ) ) {
            if($this->value()){
              $range_val = str_replace( $input_attrs['unit'], '', $this->value() );
            }
          }

          ?>

          <?php if ( ! empty( $this->description ) ) : ?>
          <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>
          <div uk-grid class="uk-grid-row-collapse uk-grid-column-small ">
            <div class="uk-width-1-1">
              <?php if( array_key_exists( 'heading', $input_attrs ) ) {
                echo '<div class="customize-control-title">'.esc_html( $input_attrs['heading'] ).'</div>';
              } ?>
            </div>
            <div class="uk-width-1-4 uk-flex uk-flex-middle">
              <label for="<?php echo esc_attr( $input_id ); ?>-zmrange">
                <?php echo esc_html( $this->label ); ?>
              </label>
            </div>
            <div class="uk-width-1-2 uk-flex uk-flex-middle">
              <input
                  type="range"
                  class="zmsendrangetoinput"
                  id="<?php echo esc_attr( $input_id ); ?>-zmrange"
                  zm-datasettingname="<?php echo esc_attr( $this->id ); ?>"
                  zm-datarangeunit="<?php if( array_key_exists( 'unit', $input_attrs ) ) { echo esc_attr( $input_attrs['unit'] ); } ?>"
                  value="<?php echo esc_attr( $range_val ); ?>"
                  <?php if( array_key_exists( 'min', $input_attrs ) )  { echo 'min="'.esc_attr( $input_attrs['min'] ).'"'; } ?>
                  <?php if( array_key_exists( 'max', $input_attrs ) )  { echo 'max="'.esc_attr( $input_attrs['max'] ).'"'; } ?>
                  <?php if( array_key_exists( 'step', $input_attrs ) ) { echo 'step="'.esc_attr( $input_attrs['step'] ).'"'; } ?>
              />
            </div>
            <div class="uk-width-1-4 uk-flex uk-flex-middle">
              <input
                id="<?php echo esc_attr( $input_id ); ?>"
                class="uk-input uk-form-small"
                value="<?php echo esc_attr( $this->value() ); ?>"
                <?php $this->link(); ?>                      
                <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
              />
            </div>
          </div>

          <?php

        } elseif(strpos($this->type, 'zm-alphacolor') !== false){

          // Process the palette
          $palette = 'true';
          if( array_key_exists( 'palette', $input_attrs ) ) {
        		if ( is_array( $input_attrs['palette'] ) ) {
        			$palette = implode( '|', $input_attrs['palette'] );
        		} else {
        			// Default to true.
        			$palette = ( false === $input_attrs['palette'] || 'false' === $input_attrs['palette'] ) ? 'false' : 'true';
        		}
          }

      		// Support passing show_opacity as string or boolean. Default to true.
      		$show_opacity = 'true';
      		if( array_key_exists( 'show_opacity', $input_attrs ) ) {
        		$show_opacity = ( false === $input_attrs['show_opacity'] || 'false' === $input_attrs['show_opacity'] ) ? 'false' : 'true';
          }

      		// Begin the output. ?>
          <?php if ( ! empty( $this->label ) ) : ?>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

      		<label>
      			<input
              class="alpha-color-control"
              type="text"
              data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>"
              data-palette="<?php echo esc_attr( $palette ); ?>"
              data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>"
              zm-dataonlyhex="<?php if ( array_key_exists( 'onlyhexcolors', $input_attrs ) && $input_attrs['onlyhexcolors'] == true ) { echo '1'; } ?>"
              zm-datalabel="<?php /*if ( isset( $this->label ) && '' !== $this->label ) {
                echo '<span class=\'customize-control-title\'>'.esc_attr( $this->label ).'</span>';
              } */?>"
              zm-datadescr="<?php /*if ( isset( $this->description ) && '' !== $this->description ) {
                echo '<span class=\'description customize-control-description\'>'.esc_attr( $this->description ).'</span>';
              } */?>"
              <?php $this->link(); ?>
            />
      		</label>
      		<?php

        } elseif(strpos($this->type, 'zm-select-presets') !== false){

          if ( empty( $this->choices ) ) {
              return;
          }

          ?>

          <?php if ( ! empty( $this->label ) ) : ?>
              <label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif; ?>

          <select
            class="zm-presets"
            zm-datasettingname="<?php echo esc_attr( str_replace( '_args_presets', '', $this->id ) ); ?>"
            id="<?php echo esc_attr( $input_id ); ?>"                      
            <?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
            <?php $this->link(); ?>
          >
              <?php
              foreach ( $this->choices as $value => $label ) {
                  echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
              }
              ?>
          </select>

          <?php

        } elseif(strpos($this->type, 'zm-sortable-sections') !== false){

          if ( ! empty( $this->label ) ) : ?>
              <label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
          <?php endif; ?>
          <?php if ( ! empty( $this->description ) ) : ?>
              <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
          <?php endif;

          $template_editor_string = NULL;
          if( array_key_exists( 'template_editor', $input_attrs ) ){
            $template_editor_string = $input_attrs['template_editor'];
          }

          echo $this->getSortableModulesbyParent(str_replace( '_args_sortable', '', $this->id ), $template_editor_string );

        }


      }//zm-"Controlls"


    }//render_content

    public function getMCBChecked($value, $thisvalue){

      $checked = NULL;
      if(is_array( $thisvalue )){
        $checked = ( in_array( $value, $thisvalue ) ) ? checked( 1, 1, false ) : '';
      } elseif( $thisvalue == $value ) {
        $checked = checked( 1, 1, false);
      }

      return $checked;

    }

    public function getColorByKey($key){

      $result = NULL;

      if( $key == 'default' || $key == 'primary' || $key == 'secondary' || $key == 'muted' ){

        global $zmtheme;

        if(array_key_exists( 'globals__colors', $zmtheme )){

          $color = $zmtheme[ 'globals__colors' ]->getArg( 'color_background_'.$key );

          $result = ' style="background-color:'.esc_attr( $color ).' !important"';

        }

      }

      return $result;

    }


    public function getSortableModulesbyParent( $com_id, $template_editor_string ){

      global $zmtheme;

      $component_type = substr($com_id, 0, strpos($com_id, '__'));
      $component_name = substr($com_id, strpos($com_id, '__') + 2);

      $result = NULL;
      $modules = array();

      if( property_exists( $zmtheme['default_components'], $component_type ) ){

        $com_types_object = $zmtheme['default_components']->$component_type;

        foreach($com_types_object as $key => $com){

          if( $zmtheme[ $component_type.'__'.$key ]->getArg('parent_container') == $component_name ){

            $child_com_id = $component_type.'__'.$key;

            $com_lock_status = false;
            if( method_exists( $zmtheme[ $child_com_id ], 'getComLockStatus' ) ){
              $com_lock_status = $zmtheme[ $child_com_id ]->getComLockStatus();
            }

            $com_status = '1';
            if( method_exists( $zmtheme[ $child_com_id ], 'getComStatus' ) ){
              $com_status = $zmtheme[ $child_com_id ]->getComStatus();
            }

            $com_label = NULL;
            if( method_exists( $zmtheme[ $child_com_id ], 'getComLabel' ) ){
              $com_label = $zmtheme[ $child_com_id ]->getComLabel();
            }
            if($com_label == NULL){
              $com_label = \ZMT\Theme\Helpers::transformObjectKeystoLabel($key);
            }

            if( $com_status == '1' && $com_lock_status == false ){

              $modules[$key]['content'] =
              '<li zm-datasortableitemid="'.$child_com_id.'" class="ui-state-default uk-box-shadow-medium zmhovercomid">
                <div uk-grid class="uk-card uk-card-default uk-card-body uk-padding-small uk-grid-small uk-flex-middle uk-sortable-handle">
                  <div><i uk-icon="table"></i></div>
                  <div class="uk-text-small">'.esc_html( $com_label ).'</div>
                  <div class="uk-width-expand uk-text-right">
                  '.$this->getSortableItemsInternalLinks($key,$child_com_id).'
                    <a href="javascript:wp.customize.section( \''.esc_attr( $child_com_id ).'\' ).focus();"><i uk-icon="icon:cog;ratio:0.8" class="uk-margin-small-left"></i></a>
                  </div>
                </div>
              </li>';
              $modules[$key]['item_position'] = $zmtheme[ $child_com_id ]->getArg('item_position');

            }

          }

        }

      }

      //SORT ARRAY --> see modContainerSortable
      $ordered = array();
      $i = 0;
      foreach ($modules as $key2 => $row){

          //if item_position = 0 add zero, if item_position = 0 twice or more, start adding positions $i++
          if( $row['item_position'] == 0 ){
            $row['item_position'] = $i;
            $i++;
          }

          $ordered[$key2] = $row['item_position'];

      }
      array_multisort($ordered, SORT_ASC, $modules);

      //get ordered items
      foreach($modules as $key3 => $item){
        $result .= $item['content'];
      }

      //create ul list if has result
      if($result){
         $result = '<ul zm-datasortablecontainer="'.esc_attr( $com_id ).'" class="zm-sortable">'.$result.'</ul>';
       }

       if( $zmtheme['theme']->getSettingsStatus() >= 3 && \ZMP\Plugin\PluginHelper::isPremiumVersion() ){

         //get the switcher position of this editor link
         $pos = 0;
         foreach($zmtheme['default_components'] as $key => $value) {
            if ($key == $component_type) {
                break;//stop if position is found!
            }
            $pos++;
        }

         $result .= '<div class="uk-text-right uk-text-small uk-margin-small-top">';
           $result .= '<a class="zm-template-editor-button zm-template-editor-button-active" data-switcher-pos="'.esc_attr( $pos ).'" href="#">'.esc_html( $template_editor_string ).'<span uk-icon="ratio:0.7;icon:settings" class="uk-margin-small-left"></span></a>';
         $result .= '</div>';

       }

      return $result;

    }

    public function getSortableItemsInternalLinks($key,$id){

      global $zmtheme;

      $result = NULL;

      if( get_class($zmtheme[ $id ]) == 'ZMT\Theme\Modules\modMenu' ){

        $result .= '<a href="javascript:wp.customize.section( \'menu_locations\' ).focus();"><i uk-icon="icon:pencil;ratio:0.8"></i></a>';

      }

      if( get_class($zmtheme[ $id ]) == 'ZMT\Theme\Modules\modLogo' ){

        $result .= '<a href="javascript:wp.customize.section( \'title_tagline\' ).focus();"><i uk-icon="icon:pencil;ratio:0.8"></i></a>';

      }

      if( get_class($zmtheme[ $id ]) == 'ZMT\Theme\Modules\modSection' || get_class($zmtheme[ $id ]) == 'ZMT\Theme\Modules\modContainer' ){

        $section_content_type = $zmtheme[ $id ]->getSectionContentType();
        if( $section_content_type == 'default' ){

          $result .= '<a href="javascript:wp.customize.section( \'sidebar-widgets-'.esc_attr( $id ).'_defsidebar\' ).focus();"><i uk-icon="icon:pencil;ratio:0.8"></i></a>';

        }

      }

      if( get_class($zmtheme[ $id ]) == 'ZMT\Theme\Modules\modSidebar' ){

        $result .= '<a href="javascript:wp.customize.section( \'sidebar-widgets-'.esc_attr( $id ).'\' ).focus();"><i uk-icon="icon:pencil;ratio:0.8"></i></a>';

      }

      return $result;

    }




}
