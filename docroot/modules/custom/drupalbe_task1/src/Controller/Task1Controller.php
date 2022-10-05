<?php
/**
 * @file
 * Contains \Drupal\drupalbe_task1\Controller\Task1Controller.
 */
namespace Drupal\drupalbe_task1\Controller;
class Task1Controller {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('View Content Types Article!'),
    );
  }
}