<?php


namespace Drupal\modal_form\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;



class ModalForm extends FormBase{

    /** 
   * {@inheritdoc}
     
     * 
    */
    /**
   * {@inheritdoc}
   */

    public function getFormId(){
        return 'modal_form';
    }

    // 

    /**
    * {@inheritdoc}
    */
   
    public function buildForm(array $form, FormStateInterFace $form_state){
        $form['user_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('User Name'),
        ];

        $form['password'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Password'),
        ];

       
        
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Login'),
        ];
        
        return $form;
    }


    


    public function submitForm(array &$form, FormStateInterFace $form_state){
        drupal_set_message($form_state->getValue('user_name') + $form_state->getValue('password'));
        
    }
}