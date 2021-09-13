composer create-project drupal/recommended-project pezbase
cd pezbase
composer require drush/drush
vendor/bin/drush site-install --db-url=mysql://pezadmin:password@localhost/pezbase
