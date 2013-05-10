<?php
/**
 * @file
 * API documentation for jplayer_text module.
 *
 * @addtogroup hooks
 * @{
 */

/**
 * Allow modules to alter the text urls before they are sent to the player
 *
 * @param array &$items
 *   These are the items that the player sees as the audio files
 * @param object $entity
 * @param array $field
 *
 */
function hook_jplayer_text_media_alter(&$items, $entity, $field) {
  // Convert our text fields to the cdn url of the media
  if (isset($entity->field_url)) {
    foreach (array_keys($items) as $key) {
      $items[$key]['uri'] = gop3_media_cdn_url($entity->type, $items[$key]['value']);
    }
  }
}

/** @} */ //end of group hooks
