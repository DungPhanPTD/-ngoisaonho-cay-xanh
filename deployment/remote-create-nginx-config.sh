#!/bin/bash
DOMAIN=cayxanh.ngoisaonho.net

GIT_REPO=git@github.com:DungPhanPTD/ngoisaonho-cay-xanh.git

HOME_FOLDER=/usr/share/nginx/html/cayxanh

DB_NAME=/usr/share/nginx/html/cayxanh

DB_NAME_LOCAL=nsncayxanh

LOCAL_URL=localhost/nsncayxanh


TARGET_NGINX_VIRTUALHOST=/etc/nginx/conf.d/$DOMAIN.conf

echo "check if nginx virtual host existed"
if test -f "$TARGET_NGINX_VIRTUALHOST"; then
echo "nginx virtual host is existed, do nothing";
else
echo "nginx virtual host is NOT existed, creating";
cp $HOME_FOLDER/deployment/nginx.conf $TARGET_NGINX_VIRTUALHOST
echo "restarting nginx"
systemctl restart nginx
echo "DONE"
fi;
