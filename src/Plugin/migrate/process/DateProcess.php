<?php
/**
 * Created by PhpStorm.
 * User: malabya
 * Date: 27/11/18
 * Time: 6:34 PM
 */

namespace Drupal\drupal_migrate_demo\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Create a media entity corresponding to an image.
 *
 * @MigrateProcessPlugin(
 *   id = "date_process"
 * )
 */
class DateProcess extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    return strtotime($value);
  }
}