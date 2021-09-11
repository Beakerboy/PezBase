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
    $query = $this->select('countries', 'c')
      ->fields('c', [
          'country_id',
          'country_name',
          'country_imc',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'country_id'   => $this->t('ID'),
      'country_name' => $this->t('Name'),
      'country_imc'  => $this->t('IMC'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'country_id' => [
        'type' => 'integer',
        'alias' => 'c',
      ],
    ];
  }

  public function prepareRow(Row $row) {
    $country_name = $row->getSourceProperty('country_name');
    $country_imc = $row->getSourceProperty('country_imc');
    $row->setSourceProperty('country_name', $country_name . '-' . $country_imc);
    return parent::prepareRow($row);
  }

}
