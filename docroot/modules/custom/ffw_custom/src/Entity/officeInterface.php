<?php

namespace Drupal\ffw_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Office entities.
 *
 * @ingroup ffw_custom
 */
interface officeInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Office name.
   *
   * @return string
   *   Name of the Office.
   */
  public function getName();

  /**
   * Sets the Office name.
   *
   * @param string $name
   *   The Office name.
   *
   * @return \Drupal\ffw_custom\Entity\officeInterface
   *   The called Office entity.
   */
  public function setName($name);

  /**
   * Gets the Office creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Office.
   */
  public function getCreatedTime();

  /**
   * Sets the Office creation timestamp.
   *
   * @param int $timestamp
   *   The Office creation timestamp.
   *
   * @return \Drupal\ffw_custom\Entity\officeInterface
   *   The called Office entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Office revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Office revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ffw_custom\Entity\officeInterface
   *   The called Office entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Office revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Office revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ffw_custom\Entity\officeInterface
   *   The called Office entity.
   */
  public function setRevisionUserId($uid);

}
