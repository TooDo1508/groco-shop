<?php

namespace Drupal\drupalbe_task2\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "get_articles",
 *   label = @Translation("Get Articles"),
 *   uri_paths = {
 *     "canonical" = "/get/articles"
 *   }
 * )
 */



class GetArticles extends ResourceBase {       

    /**
    * Responds to entity GET requests.
    * @return \Drupal\rest\ResourceResponse
    */

    public function get() {
        
        
        // $response = ['message' => 'Hello, this is a rest service'];

        // $bundle_fields = \Drupal::entityManager()->getFieldDefinitions('node', 'article');

        
        $nids = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', 'artcle_task')
        ->range(0, 5)
        ->sort('nid', 'DESC')
        ->execute(5);
        
        
        $items_art=[];
        foreach ($nids as $nid){
            
            $my_node = \Drupal\node\Entity\Node::load($nid);
            $items_art = $my_node;
        }

        // $nodes = Node::loadMultiple($nids);

        $response = $items_art;

        return new ResourceResponse($response);
    }
}