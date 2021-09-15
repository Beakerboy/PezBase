mysql -u root -p -e "CREATE DATABASE pezbase"
mysql -u root -p -e "CREATE USER pezbase@localhost IDENTIFIED BY 'password';"
mysql -u root -p -e "grant all privileges on pezbase.* to pezbase@localhost;"
git clone git@github.com:Beakerboy/Pezbase
composer create-project drupal/recommended-project pezbase
cd pezbase
wget https://ftp.drupal.org/files/projects/default_content-2.0.0-alpha1.tar.gz
tar -xzf default_content-2.0.0-alpha1.tar.gz
rm default_content-2.0.0-alpha1.tar.gz
composer require drush/drush
vendor/bin/drush site-install --db-url=mysql://pezbase:password@localhost/pezbase --account-pass password
ln -s ../../../Pezbase/pezbase_data web/modules
ln -s ../../../Pezbase/pezbase_examples web/modules
cp -r default_content web/modules
vendor/bin/drush en pezbase_examples

