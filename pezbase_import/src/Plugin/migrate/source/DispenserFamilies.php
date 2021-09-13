<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "dispenser_families",
 *   source_module = "pezbase_import",
 * )
 */
class DispenserFamilies extends SqlBase {

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
        ])
      // We sort this way to ensure parent terms are imported first.
      ->orderBy('family_predecessor', 'ASC');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'family_id'          => $this->t('ID'),
      'family_name'        => $this->t('Name' ),
      'family_predecessor' => $this->t('Parent'),
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
