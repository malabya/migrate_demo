<?php

namespace Drupal\drupal_migrate_demo\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;
use Drupal\user\Entity\User;

/**
 * Create a media entity corresponding to an image.
 *
 * @MigrateProcessPlugin(
 *   id = "user_generate"
 * )
 */
class UserGenerate extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (!empty($value)) {
      $user = user_load_by_name($value);
    }
    // If user does not exists, Return super user.
    if (empty($user)) {
      $user = User::create([
        'name' => $value,
        'status' => 1
      ])->save();
    }
    return $user->id();
  }
}