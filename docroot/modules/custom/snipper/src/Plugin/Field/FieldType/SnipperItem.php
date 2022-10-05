<?php 



/**
 * @file
 * Contains \Drupal\snippers\Plugin\Field\FieldType\SnippersItem.
 */

namespace Drupal\snipper\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;


/**
 * Plugin implementation of the 'snippers' field type.
 *
 * @FieldType(
 *   id = "snippers_code",
 *   label = @Translation("snippers field"),
 *   description = @Translation("This field stores code snippers in the database."),
 *   default_widget = "snippers_default",
 *   default_formatter = "snippers_default"
 * )
 */
class SnipperItem extends FieldItemBase { 
  
  public static function propertyDefinitions(FieldStorageDefinitionInterFace $field_definition)
  {
    $properties['value'] = DataDefinition::create('string')->setLabel(t('Snipper'));

    return $properties; 


  }
  
  
  
  
  
  
  
  /**
  * {@inheritdoc}
  */
    public static function schema(FieldStorageDefinitionInterface $field) {
        return array(
        'columns' => array(
          'value' => [
              'type' => 'varchar',
              'description' => t('Country'),
              'length' => 20,
              'not null' => FALSE,
          ]
        
        ),
        'indexs' => [
          'value' => ['value'],
        ]

    );
  }
} 

