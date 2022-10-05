<?php

namespace Drupal\simple_form\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;



class SimpleForm extends FormBase{

    /** 
   * {@inheritdoc}
     
     * 
    */
    /**
   * {@inheritdoc}
   */

    public function getFormId(){
        return 'simple_form';
    }

    // 

    /**
    * {@inheritdoc}
    */
   
    public function buildForm(array $form, FormStateInterFace $form_state){
        $form['number_1'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First Number'),
        ];

        $form['number_2'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Second Number'),
        ];

        
        $country_options = array('' => t('---Select---'),
        'HaNoi' => t('HN'),
        'SaiGon' => t('SG'))
        ;

        // dump($country_options);
        
        $vid = 'category';
        $terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
        foreach ($terms as $term) {
        $term_data[] = array(
            'id' => $term->tid,
            'name' => $term->name
            );
        }   

        $tax_job = 'job_function';
        $terms_job =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($tax_job);
        foreach ($terms_job as $term) {
            $term_job_data[$term->name] = $term->name;
        }  
        
        
        
        
        $tax_country = 'country';
        $terms_country =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($tax_country);
        foreach ($terms_country as $term) {
            $terms_country_data[] = array(
                $term->name => $term->name
            );
        }  
        
        // dump($term_job_data);
        // dump($terms_country_data);
        
        $form['JobFunction'] = [
            '#type' => 'select',
            '#title' => $this->t('JobFunction'),
            '#description' => 'Pick your Job',
            '#options' =>   $term_job_data
            
        ];


        $form['country'] = [
            '#type' => 'select',
            '#title' => $this->t('Country'),
            '#description' => 'Pick your country',
            '#options' => $terms_country_data
            
        ];
        
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Calculaet'),
        ];
        
        return $form;
    }


    // 


    public function submitForm(array &$form, FormStateInterFace $form_state){
        drupal_set_message($form_state->getValue('number_1') + $form_state->getValue('number_2'));
        drupal_set_message($form_state->getValue('JobFunction'));
        drupal_set_message($form_state->getValue('country'));
    }
}