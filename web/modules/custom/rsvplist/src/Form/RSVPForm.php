<?php

namespace Drupal\rsvplist\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class RSVPForm extends FormBase {

  public function getFormId() {
    return 'rsvplist_email_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $node = \Drupall::routeMatch()->getParamter('node');
    $nid = $node->nid->value;
    $form['email'] = [
      '#title' => t('Email Address'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t("We'll send update to ur email"),
      '#require' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('RSVP'),
    ];
    $form['nid'] = [
      '#type' => 'hidden',
      '#value' => $nid,
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message(t('The form is working!'));
  }

}
