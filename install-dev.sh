mysql -u root -p -e "CREATE DATABASE pezbase;CREATE USER pezbase@localhost IDENTIFIED WITH mysql_native_password BY 'password';grant all privileges on pezbase.* to pezbase@localhost;"
git clone git@github.com:Beakerboy/Pezbase
mkdir pezbase
cp Pezbase/pezbase-composer.json-dev pezbase/composer.json
cp Pezbase/pezbase-composer.lock-dev pezbase/composer.lock
cd pezbase
composer install
sudo chmod 777 web/sites/default/files/
vendor/bin/drush site-install --db-url=mysql://pezbase:password@localhost/pezbase --site-name PezBase --account-pass password
vendor/bin/drush en pezbase_examples
