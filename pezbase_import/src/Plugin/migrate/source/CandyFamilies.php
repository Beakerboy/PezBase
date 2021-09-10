<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "candy_families",
 *   source_module = "pezbase_import",
 * )
 */
class CandyFamilies extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Source data is queried from 'families' table.
    $query = $this->select('candy_families', 'f')
      ->fields('f', [
          'candy_family_id',
          'candy_family_name',
          'candy_family_description',
        ])
      // We sort this way to ensure parent terms are imported first.
      ->orderBy('candy_family_predecessor', 'ASC');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'candy_family_id'          => $this->t('ID'),
      'candy_family_name'        => $this->t('Name' ),
      'candy_family_description' => $this->t('Description'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'candy_family_id' => [
        'type' => 'integer',
        'alias' => 'f',
      ],
    ];
  }
}
