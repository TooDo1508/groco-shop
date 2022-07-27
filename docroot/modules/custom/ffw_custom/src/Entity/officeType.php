<?php

namespace Drupal\ffw_custom\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Office type entity.
 *
 * @ConfigEntityType(
 *   id = "office_type",
 *   label = @Translation("Office type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ffw_custom\officeTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\ffw_custom\Form\officeTypeForm",
 *       "edit" = "Drupal\ffw_custom\Form\officeTypeForm",
 *       "delete" = "Drupal\ffw_custom\Form\officeTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\ffw_custom\officeTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "office_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "office",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/office/office_type/{office_type}",
 *     "add-form" = "/office/office_type/add",
 *     "edit-form" = "/office/office_type/{office_type}/edit",
 *     "delete-form" = "/office/office_type/{office_type}/delete",
 *     "collection" = "/office/office_type"
 *   }
 * )
 */
class officeType extends ConfigEntityBundleBase implements officeTypeInterface {

  /**
   * The Office type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Office type label.
   *
   * @var string
   */
  protected $label;

}
