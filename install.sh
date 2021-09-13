git clone git@github.com:Beakerboy/Pezbase
composer create-project drupal/recommended-project pezbase
cd pezbase
composer require drush/drush
vendor/bin/drush site-install --db-url=mysql://pezadmin:password@localhost/pezbase
cd modules
ln -s ../../Pezbase/pezbase_data
ln -s ../../Pezbase/pezbase_examples

