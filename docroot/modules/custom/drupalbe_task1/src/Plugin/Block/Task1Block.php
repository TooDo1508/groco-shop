<?php

namespace Drupal\drupalbe_task1\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use \Drupal\node\Entity\Node; 
use Drupal\media\Entity\Media;
use Drupal\file\Entity\File;
/**
 * Provides a 'Tasl1' Block.
 *
 * @Block(
 *   id = "task1_block",
 *   admin_label = @Translation("Task1 block"),
 *   category = @Translation("Drupal BE Task1"),
 * )
 */
class Task1Block extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
      
    
    // Load a node for which you want to get the field values
    // Get info node with 1 nid
    $my_nid = 1;
    $my_node = \Drupal\node\Entity\Node::load($my_nid);
    // foreach (array_keys($definitions) as $field_name) {
    //     // Get the values for your node
    //     // Use getValue() if you want to get an array instead of text.
    //     $values[$field_name] = $my_node->get($field_name)->value;
    // }

    dump($my_node);
    
    // get info content types
    $bundle_fields = \Drupal::entityManager()->getFieldDefinitions('node', 'article');
    // dump($bundle_fields);
    


    $types = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple();

    // $entityTypeManager = \Drupal::service('entity_type.manager');

    // $types = [];
    // $contentTypes = $entityTypeManager->getStorage('articles')->loadMultiple();
    // foreach ($contentTypes as $contentType) {
    // $types[$contentType->id()] = $contentType->label();
    // }

    // Get all nid from node Article

    $nids = \Drupal::entityQuery('node')
    ->condition('status', 1)
    ->condition('type', 'artcle_task')
    ->range(0, 5)
    ->sort('nid', 'DESC')
    ->execute(5);

    // dump($nids);

    // check node with single nid
    $items_art=[];
    $node_art=[];
    $nodes = Node::loadMultiple($nids); 
    // Loop over your node objects here
    // dump($nodes);
    // dump($nodes->values);
    foreach($nodes as $node) {
        // dump($nodes['#values']);
    
        $title = $node->getTitle();             
        
        $img_art_value='';
        $field_img_art = $node->get('field_image_art')->getValue();
        // dump($field_img_art);

        $desc_art_value='';
        $field_desc_art = $node->get('field_description_art')->getValue();

        foreach($field_img_art as $item){
            $target_id = $item['target_id'];
            // dump($img_art_value);
            $file = File::load($target_id);
            $url = $file->url();
            $img_art_value = $url;
        }

        foreach($field_desc_art as $item){
            $desc_art_value = $item['value'];
        }

        $node_art = [
            'title' => $title,
            'img_art' => $img_art_value, 
            'desc_art' => $desc_art_value, 
            
        ];
        $items_art[] =$node_art;
    }

    // dump($items_art);



    return [
        '#theme' => 'task1_block',
        '#items' => $items_art,
    ];
   
    }
    
}