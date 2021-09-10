<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "colors",
 *   source_module = "pezbase_import",
 * )
 */
class Colors extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('colors', 'c')
      ->fields('c', [
          'color_id',
          'color_name',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'color_id'   => $this->t('ID'),
      'color_name' => $this->t('Name' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'color_id' => [
        'type' => 'integer',
        'alias' => 'c',
      ],
    ];
  }
}
