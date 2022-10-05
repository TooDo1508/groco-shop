<?php



namespace Drupal\snipper\Plugin\Field\FieldWidget;


use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
// FieldItemListInterface
// Symfone violation interface
use Symfony\Component\Validator\ConstraintViolationInterface;




/**
 * Plugin implementation of the 'snipper_widget' widget
 *
 * @FieldWidget(
 *   id = "snipper_widget",
 *   label = @Translation("snipper widget"),
 *   field_types = {
 *     "text",
 *     "text_long"
 *   },
 *   settings = {
 *     "size" = "600",
 *   }
 * )
 */

class SnipperDefaultWidget extends WidgetBase{

    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
        
        $elements = [];

        $elements['value'] = [

            '#type' =>'select',
            '#options' => \Drupal::service('country_manager')->getList(),
            '#title' => t('Select Ur Country'),
        ];
        return $elements;


    }

}