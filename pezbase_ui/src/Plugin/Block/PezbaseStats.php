<?php

namespace Drupal\pezbase_ui\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides site statistics Block.
 *
 * @Block(
 *   id = "pezbase_stats_block",
 *   admin_label = @Translation("Pezbase Statistics block"),
 *   category = @Translation("Statistics"),
 * )
 */
class PezbaseStats extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Hello, World!'),
    ];
  }

}
