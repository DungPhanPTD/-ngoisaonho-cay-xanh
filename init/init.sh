#!/bin/bash
echo "REMOVE wp-config"
rm $PWD/wp-config.php
echo "CREATE NEW wp-config"
cp $PWD/deployment/wp-config.php.sample $PWD/wp-config.php
echo "APPLY config from env to site"
source $PWD/deployment/site.env
php $PWD/init/worker.php
echo "DONE"
