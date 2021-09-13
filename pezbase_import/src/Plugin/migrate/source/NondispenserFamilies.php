<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "nondispenser_families",
 *   source_module = "pezbase_import",
 * )
 */
class NondispenserFamilies extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('non_family', 'f')
      ->fields('f', [
          'non_family_id',
          'non_family_name',
          'non_family_predecessor',
        ])
      // We sort this way to ensure parent terms are imported first.
      ->orderBy('non_family_predecessor', 'ASC');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'non_family_id'    => $this->t('ID'),
      'non_family_name'   => $this->t('Name' ),
      'non_family_parent' => $this->t('Parent'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'non_family_id' => [
        'type' => 'integer',
        'alias' => 'f',
      ],
    ];
  }
}
