<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "package",
 *   source_module = "pezbase_import",
 * )
 */
class Package extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('package', 'p')
      ->fields('p', [
          'package_id',
          'package_name',
        ]);

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'package_id'   => $this->t('ID'),
      'package_name' => $this->t('Name' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'package_id' => [
        'type' => 'integer',
        'alias' => 'p',
      ],
    ];
  }
}
