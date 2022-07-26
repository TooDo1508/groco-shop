<?php

/**
 * @file
 * Contains office.page.inc.
 *
 * Page callback for Office entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Office templates.
 *
 * Default template: office.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_office(array &$variables) {
  // Fetch office Entity Object.
  $office = $variables['elements']['#office'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
