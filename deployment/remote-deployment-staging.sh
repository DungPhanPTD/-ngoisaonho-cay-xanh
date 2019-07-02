
#!/bin/bash
DOMAIN=cayxanh.ngoisaonho.net

GIT_REPO=git@github.com:DungPhanPTD/ngoisaonho-cay-xanh.git

HOME_FOLDER=/usr/share/nginx/html/cayxanh

DB_NAME=cay_xanh

DB_NAME_LOCAL=nsncayxanh

LOCAL_URL=localhost/nsncayxanh


# rsync -v -a -h --delete ./ root@ngoisaonho.net:/usr/share/nginx/html/ngoisaonho-home-page
echo "========Going to home folder..."
mkdir $HOME_FOLDER

set -e
cd $HOME_FOLDER
pwd
echo "========global git config..."
git config --global user.email "ngnclht@gmail.com"
git config --global user.name "Nam Nguyen"

echo "check if git is existed"
if [ -d .git ]; then
echo "git is existed, do nothing";
else
echo "git is not existed, clone";
git clone $GIT_REPO $HOME_FOLDER;
fi;

echo "========Fetching git origin..."
git fetch origin
echo "========Checking out the staging branch..."
git checkout staging
git reset --hard HEAD
echo 'git reset --hard HEAD'

echo "========Pull lastest change the staging branch..."
git pull origin staging
echo "========Applying database migration..."
# echo "========back up current db..."
# mysqldump --user=root --password=Ngoisaonho@2019 $DB_NAME --single-transaction --quick --lock-tables=false > /usr/share/nginx/html/backupdb/$DB_NAME-$(date +%F).sql
echo "========Remove current db and create empty db..."
mysql --user=root --password=Ngoisaonho@2019 < $HOME_FOLDER/deployment/reset_db_staging.sql
echo "========Modify db file before import..."
echo "chmod -x deployment/migration.php"
chmod -x deployment/migration.php
echo "php deployment/migration.php"
php deployment/migration.php
echo "========Import new db..."
mysql --user=root --password=Ngoisaonho@2019 $DB_NAME < $HOME_FOLDER/deployment/db.sql

git reset --hard HEAD
echo 'git reset --hard HEAD'

echo 'Remove and recreate cache folder'
rm -rf wp-content/cache
mkdir wp-content/cache
echo "---Finished---"
