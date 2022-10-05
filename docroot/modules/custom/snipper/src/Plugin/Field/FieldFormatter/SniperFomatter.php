<?php

/**
 * @file
 * Contains \Drupal\snipper\Plugin\field\formatter\SnippersDefaultFormatter.
 */

namespace Drupal\snipper\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;



/**
 * Plugin implementation of the 'snipper_default' formatter.
 *
 * @FieldFormatter(
 *   id = "snipper_default",
 *   label = @Translation("Snippers default"),
 *   field_types = {
 *     "snipper_code"
 *   }
 * )
 */
class SnipperDefaultFormatter extends FormatterBase { 

    /**
    * {@inheritdoc}
    */
    public function viewElements(FieldItemListInterface $items, $langcode) {

        $elements = [];

        $countries = \Drupal::service('country_manager')->getList();

        foreach($items as $delta => $item){
            if(isset($countries[$item->value])){

                $elements[$delta] = [
                    '#type' => 'markup',
                    '#markup' => '<h1>'.$countries[$item->value].'</h1>',
                ];
            }

        }

        return $elements;



    }

}