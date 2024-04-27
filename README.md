# Redirect domain config

- cd /opt/bitnami/apache/conf/vhosts
-

# http

- sudo rm -rf nilis-mis-prod-http-vhost.conf
- sudo nano nilis-mis-prod-http-vhost.conf

<VirtualHost _default_:80>
      ServerAlias *
      DocumentRoot /opt/bitnami/apache/htdocs/NILIS-MIS/public
     <Directory "/opt/bitnami/apache/htdocs/NILIS-MIS/public">
          Options -Indexes +FollowSymLinks -MultiViews
          AllowOverride All
          Require all granted
     </Directory>
</VirtualHost>

**restart apache**

- sudo /opt/bitnami/ctlscript.sh restart apache

# install mysql

cd /tmp

wget https://dev.mysql.com/get/mysql-apt-config_0.8.22-1_all.deb

sudo dpkg -i mysql-apt-config\*

sudo apt update

_if you get a public key error use the below and re-run sudo apt update_
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys B7B3B788A8D3785C

sudo apt install mysql-server

sudo systemctl status mysql.service

sudo systemctl start mysql.service

# view processes

netstat -na | grep LISTEN

# stop mariadb

sudo /opt/bitnami/ctlscript.sh stop mariadb

# change model and controller names to lower case

mv repeatStudents.model.php repeatstudents.model.php  
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv admissionToken.model.php admissiontoken.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv examiner3Subject.model.php examiner3subject.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv resultSheet.model.php resultsheet.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv studentAttendance.model.php studentattendance.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv examParticipants.model.php examparticipants.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv medicalStudents.model.php medicalstudents.model.php  
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv StudentModel.model.php studentmodel.model.php
bitnami@ip-172-26-14-159:~/htdocs/NILIS-MIS/app/models$ mv notificationModel.model.php notificationmodel.model.php

# give permission to all files

sudo chmod -R a+rwx csv
