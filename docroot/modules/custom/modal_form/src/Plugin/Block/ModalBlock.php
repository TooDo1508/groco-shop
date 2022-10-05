<?php

/**
 * Provides a 'modal_form' block.
 *
 * @Block(
 *  id = "modal_form",
 *  admin_label = @Translation("Modal Block"),
 * )
 */

namespace Drupal\modal_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Database\Database;

class ModalBlock extends BlockBase {


  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\modal_form\Form\ModalForm');

    // $query = \Drupal::database()->select('users_field_data', 'uid');
    // $query->fields('nfd', ['nid', 'title']);
    // $query->condition('nfd.type', 'vegetable');
    // $query->range(0, 1);
    // $vegetable = $query->execute()->fetchAssoc();

    $query = \Drupal::database()->select('users_field_data', 't');
    $count = $query->countQuery()->execute()->fetchField();
  
    // dump($count);

    $db = \Drupal::database();
    $query = $db->query("SELECT name,pass FROM `users_field_data` WHERE 1");
    $result = $query->fetchAll();
    foreach($result as $item){
      // dump($item);
      // echo $item->name . "<br>";
      // echo $item->pass;
      
    }
    // dump($result);

    return $form;


  }
}



// namespace Drupal\modal_form\Plugin\Block;



// use Drupal\Core\Block\BlockBase;
// use Drupal\Core\Form\FormInterface;



// class ModalBlock extends BlockBase {

 
//   public function build() {
    
//     $name= 'Duong';

//     return $name;
//   }

// }