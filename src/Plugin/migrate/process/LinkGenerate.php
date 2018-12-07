<?php
/**
 * Created by PhpStorm.
 * User: malabya
 * Date: 27/11/18
 * Time: 6:07 PM
 */

namespace Drupal\drupal_migrate_demo\Plugin\migrate\process;


use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Create a media entity corresponding to an image.
 *
 * @MigrateProcessPlugin(
 *   id = "link_generate"
 * )
 */
class LinkGenerate extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $title = explode(', ', $value[0]);
    $url = explode(', ', $value[1]);
    $link = [];
    if (count($title) === count($url)) {
      foreach ($title as $key => $value) {
        $link[] = [
          'uri' => $url[$key],
          'title' => $title[$key]
        ];
      }
    }
    return ($link);
  }
}