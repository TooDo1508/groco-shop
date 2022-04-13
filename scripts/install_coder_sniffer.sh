sudo composer self-update --1
composer global require drupal/coder:8.2.12
echo 'export PATH=$HOME/.composer/vendor/bin:$PATH' >> $BASH_ENV && source $BASH_ENV
phpcs --config-set installed_paths ~/.composer/vendor/drupal/coder/coder_sniffer
