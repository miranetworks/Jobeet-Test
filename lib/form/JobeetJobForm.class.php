<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 */
class JobeetJobForm extends BaseJobeetJobForm
{
       public function __construct(BaseObject $object = null, $options = array(), $CSRFSecret = null)
   {
      parent::__construct($object, $options, false);
   }
    
   public function configure()
   {
      $this->removeFields();

      $this->validatorSchema['email'] = new sfValidatorAnd( array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(),
      ));

      //Update email schema
      $this->validatorSchema['email'] = new sfValidatorAnd( array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(),
      ));

      //Convert Type to radio box
      $this->widgetSchema['type'] = new sfWidgetFormChoice( array(
            'choices' => JobeetJobPeer::$types,
            'expanded' => true,
      ));

      //Limit Type input
      $this->validatorSchema['type'] = new sfValidatorChoice( array('choices' => array_keys(JobeetJobPeer::$types), ));

      //Covert Logo to input field
      $this->widgetSchema['logo'] = new sfWidgetFormInputFile( array('label' => 'Company logo', ));
      //Limit Logo Input
      $this->validatorSchema['logo'] = new sfValidatorFile( array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir') . '/jobs',
            'mime_types' => 'web_images',
      ));

      //Change Default Labels
      $this->widgetSchema->setLabels(array(
            'category_id' => 'Category',
            'is_public' => 'Public?',
            'how_to_apply' => 'How to apply?',
      ));

      //Change Default Validator Message from is_public
      $this->widgetSchema->setHelp('is_public', 'Whether the job can also be published on affiliate websites or not.');

      $this->widgetSchema->setNameFormat('job[%s]');
   }

   protected function removeFields()
   {
      unset($this['created_at'], $this['updated_at'], $this['expires_at'], $this['is_activated'], $this['token']);
   }


}
