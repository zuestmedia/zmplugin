<?php

namespace ZMP\Plugin;

class VirtualPage {

  /**
    * ?queryvar=
    * @var string
    * @access private
    */
    private $query_var = false;

  /**
    * Value of Query Var
    * eg. ?queryvar=queryvarvalue
    * @var string
    * @access private
    */
    private $query_var_value = false;

  /**
    * Add Rewrite Rule?
    * @var string
    * @access private
    */
    private $rewrite_rule = false;

  /**
    * HTML Header
    * @var string
    * @access private
    */
    private $html_header = 'Content-Type: application/json';

  /**
    * Content
    * @var string
    * @access private
    */
    private $content;



  /**
    * QueryVar Getters n Setters
    */
    public function setQueryVar( $query_var ) {

      $this->query_var = $query_var;

    }
    public function getQueryVar() {

      return $this->query_var;

    }

  /**
    * QueryVarValue Getters n Setters
    */
    public function setQueryVarValue( $query_var_value ) {

      $this->query_var_value = $query_var_value;

    }
    public function getQueryVarValue() {

      return $this->query_var_value;

    }
  /**
    * RewriteRule Getters n Setters
    */
    public function setRewriteRule( $rewrite_rule ) {

      $this->rewrite_rule = $rewrite_rule;

    }
    public function getRewriteRule() {

      return $this->rewrite_rule;

    }

  /**
    * HtmlHeader Getters n Setters
    */
    public function setHtmlHeader( $html_header ) {

      $this->html_header = $html_header;

    }
    public function getHtmlHeader() {

      return $this->html_header;

    }

  /**
    * Set, Add, and Get Content!
    */
    public function setContent($content) {

      $this->content = $content;

    }
    public function addContent($content) {

      $this->content .= $content;

    }
    public function getContent() {

      return $this->content;

    }

    //virtual site for json object of components usw.
    //https://mattwatson.codes/blog/create-a-virtual-file-in-wordpress-with-support-for-wordpress-multisite/
    public function addRewriteRule() {

      global $wp;

      $wp->add_query_var( $this->getQueryVar() );

      add_rewrite_rule( $this->getQueryVarValue().'$', 'index.php?'.$this->getQueryVar().'='.$this->getQueryVarValue(), 'top' );

    }

    public function VirtualSiteContent( $template ){

      if( $this->getQueryVar() && $this->getQueryVarValue() ) {

        $defcomsjsonobj = get_query_var( $this->getQueryVar() );

        if ( ! empty( $defcomsjsonobj ) ) {

          if (  $this->getQueryVarValue() === $defcomsjsonobj ) {

            header( $this->getHtmlHeader() );

            echo $this->getContent();

            die();

          }

        }

      }

      return $template;

    }

    public function addVirtualSite(){

      if( $this->getRewriteRule() ){

        add_action( 'init', array( $this, 'addRewriteRule' ), 99 );

      }

      add_action( 'template_include', array( $this, 'VirtualSiteContent' ) );

    }


}
