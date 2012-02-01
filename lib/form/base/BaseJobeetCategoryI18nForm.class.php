<?php

/**
 * JobeetCategoryI18n form base class.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 */
class BaseJobeetCategoryI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInput(),
      'slug'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'JobeetCategory', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'JobeetCategoryI18n', 'column' => 'culture', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255)),
      'slug'    => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('jobeet_category_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetCategoryI18n';
  }


}
