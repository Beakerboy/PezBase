<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "patent_numbers",
 *   source_module = "pezbase_import",
 * )
 */
class PatentNumbers extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Source data is queried from 'families' table.
    $query = $this->select('patent_numbers', 'p')
      ->fields('p', [
          'patent_number_id',
          'patent_number_name',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'patent_number_id'    => $this->t('ID'),
      'patent_number_name'   => $this->t('Name' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'patent_number_id' => [
        'type' => 'integer',
        'alias' => 'p',
      ],
    ];
  }
}
