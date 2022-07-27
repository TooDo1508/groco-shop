<?php

namespace Drupal\ffw_custom;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ffw_custom\Entity\officeInterface;

/**
 * Defines the storage handler class for Office entities.
 *
 * This extends the base storage class, adding required special handling for
 * Office entities.
 *
 * @ingroup ffw_custom
 */
interface officeStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Office revision IDs for a specific Office.
   *
   * @param \Drupal\ffw_custom\Entity\officeInterface $entity
   *   The Office entity.
   *
   * @return int[]
   *   Office revision IDs (in ascending order).
   */
  public function revisionIds(officeInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Office author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Office revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ffw_custom\Entity\officeInterface $entity
   *   The Office entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(officeInterface $entity);

  /**
   * Unsets the language for all Office with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
