<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "candy_countries",
 *   source_module = "pezbase_import",
 * )
 */
class CandyCountries extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('candy_countries', 'c')
      ->fields('c', [
          'candy_country_id',
          'candy_country_name',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'candy_country_id'   => $this->t('ID'),
      'candy_country_name' => $this->t('Name' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'candy_country_id' => [
        'type' => 'integer',
        'alias' => 'c',
      ],
    ];
  }
}
