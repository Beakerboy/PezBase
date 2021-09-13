mysql -u root -p -e "CREATE DATABASE pezbase"
mysql -u root -p -e "CREATE USER pezbase@localhost IDENTIFIED BY 'password';"
mysql -u root -p -e "grant all privileges on pezbase.* to pezbase@localhost;"

git clone git@github.com:Beakerboy/Pezbase
composer create-project drupal/recommended-project pezbase
cd pezbase
composer require drush/drush
vendor/bin/drush site-install --db-url=mysql://pezadmin:password@localhost/pezbase
cd web/modules
ln -s ../../../Pezbase/pezbase_data
ln -s ../../../Pezbase/pezbase_examples

