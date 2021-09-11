<?php

namespace Drupal\pezbase_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Minimalistic example for a SqlBase source plugin.
 *
 * @MigrateSource(
 *   id = "pezbase_users",
 *   source_module = "pezbase_import",
 * )
 */
class Users extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('users', 'u')
      ->fields('u', [
          'user_id',
          'username',
          'crypt',
          'email_address',
          'created',
          'last_access',
        ])
      ->condition('username', '', '<>')
      ->condition('username', 'pezadmin', '<>');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'user_id' => $this->t('ID'),
      'username' => $this->t('Username'),
      'crypt'   => $this->t('Password Hash'),
      'email_address' => $this->t('Email Address'),
      'created' => $this->t('Created'),
      'last_access' => $this->t('Last Access'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'user_id' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }
}
