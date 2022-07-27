<?php

namespace Drupal\ffw_custom\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class officeTypeForm.
 */
class officeTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $office_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $office_type->label(),
      '#description' => $this->t("Label for the Office type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $office_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\ffw_custom\Entity\officeType::load',
      ],
      '#disabled' => !$office_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $office_type = $this->entity;
    $status = $office_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Office type.', [
          '%label' => $office_type->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Office type.', [
          '%label' => $office_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($office_type->toUrl('collection'));
  }

}
