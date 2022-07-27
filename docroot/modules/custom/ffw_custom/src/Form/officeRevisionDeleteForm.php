<?php

namespace Drupal\ffw_custom\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a form for deleting a Office revision.
 *
 * @ingroup ffw_custom
 */
class officeRevisionDeleteForm extends ConfirmFormBase {

  /**
   * The Office revision.
   *
   * @var \Drupal\ffw_custom\Entity\officeInterface
   */
  protected $revision;

  /**
   * The Office storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $officeStorage;

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->officeStorage = $container->get('entity_type.manager')->getStorage('office');
    $instance->connection = $container->get('database');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'office_revision_delete_confirm';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete the revision from %revision-date?', [
      '%revision-date' => \Drupal::service('date.formatter')->format($this->revision->getRevisionCreationTime()),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('entity.office.version_history', ['office' => $this->revision->id()]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $office_revision = NULL) {
    $this->revision = $this->officeStorage->loadRevision($office_revision);
    $form = parent::buildForm($form, $form_state);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->officeStorage->deleteRevision($this->revision->getRevisionId());

    $this->logger('content')->notice('Office: deleted %title revision %revision.', ['%title' => $this->revision->label(), '%revision' => $this->revision->getRevisionId()]);
    $this->messenger()->addMessage(t('Revision from %revision-date of Office %title has been deleted.', ['%revision-date' => \Drupal::service('date.formatter')->format($this->revision->getRevisionCreationTime()), '%title' => $this->revision->label()]));
    $form_state->setRedirect(
      'entity.office.canonical',
       ['office' => $this->revision->id()]
    );
    if ($this->connection->query('SELECT COUNT(DISTINCT vid) FROM {office_field_revision} WHERE id = :id', [':id' => $this->revision->id()])->fetchField() > 1) {
      $form_state->setRedirect(
        'entity.office.version_history',
         ['office' => $this->revision->id()]
      );
    }
  }

}
