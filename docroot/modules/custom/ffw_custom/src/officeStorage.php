<?php

namespace Drupal\ffw_custom;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class officeStorage extends SqlContentEntityStorage implements officeStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(officeInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {office_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {office_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(officeInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {office_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('office_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
