<?php

namespace Drupal\findict_translator\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Findict Translation From' Block
 *
 * @Block(
 *   id = "findict_translator_search_block",
 *   admin_label = @Translation("Findict translator search"),
 * )
 */
class TranslatorSearchBlock extends BlockBase {
  /**
  * {@inheritdoc}
  */
  public function build() {
      return array(
        '#theme' => 'findict_translator_search_form_block',
      );
  }
}
