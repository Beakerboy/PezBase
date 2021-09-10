<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "flavors",
 *   source_module = "pezbase_import",
 * )
 */
class Flavors extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('flavors', 'f')
      ->fields('f', [
          'flavor_id',
          'flavor_name',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'flavor_id'   => $this->t('ID'),
      'flavor_name' => $this->t('Name' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'flavor_id' => [
        'type' => 'integer',
        'alias' => 'f',
      ],
    ];
  }
}
