<?php 

namespace Drupal\drupal_controller\Controller;

class ArticleController {
    public function page(){

        $items = array(
            array('name' => 'Article 1'),
            array('name' => 'Article 2'),
            array('name' => 'Article 3'),
            array('name' => 'Article 4'),
        );

        return array(
            '#theme' => 'article_list',
            '#items' => $items,
            '#title' => 'Our article list'
        );

    }
}