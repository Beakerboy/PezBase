<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "families",
 *   source_module = "pezbase_import",
 * )
 */
class Taxonomy extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Source data is queried from 'families' table.
    $query = $this->select('families', 'f')
      ->fields('f', [
          'family_id',
          'family_name',
          'family_predecessor',
        ]);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'tid'    => $this->t('ID'),
      'name'   => $this->t('Name' ),
      'parent' => $this->t('Parent'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'family_id' => [
        'type' => 'integer',
        'alias' => 'f',
      ],
    ];
  }
}
