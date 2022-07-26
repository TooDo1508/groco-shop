<?php

namespace Drupal\ffw_custom\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Office entities.
 */
class officeViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
