<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class view_conditions extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';

    //$this->label = NULL;
    $this->description = 'hide';

    //$this->validation = 'bool';
    $this->validation = 'slugarray';

    //$this->transport = 'refresh';
    $this->choices = \ZMP\Plugin\ThemeHelper::getViewConditionsChoices();

  }

}
