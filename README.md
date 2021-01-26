# Clearmagentoshoppingcarts
Clear all non ordered shopping carts with a cron job

the magento extension should be uploadet to folder app/code/
then create a cron job on your server and run the extension every night you need so the mysql table with non ordered shopping carts will be deleted.

* How to install Clearmagentoshoppingcarts *

1. upload app/code/Custom/ the extension zip file via FTP
2. unzip Clearmagentoshoppingcarts.zip
3. php bin/magento module:enable Custom_Clearmagentoshoppingcarts
4. deploy the site using below cli
 -php bin/magento maintenance:enable
 -rm -rf var/cache/* var/view_preprocessed/* generated/* pub/static/*
 -php bin/magento setup:upgrade
 -php bin/magento setup:di:compile
 -php bin/magento setup:static-content:deploy en_US -f
 -php bin/magento setup:static-content:deploy de_DE -f
 -php bin/magento cache:flush
 -php bin/magento maintenance:disable
 
Cron tab rule => 59 23 * * *

5. In order to run cron job
 Please execute below cli
 php bin/magento cron:install
 php bin/magento cron:run
 
6. Please verify cronjob working
 crontab -l
 
7. We can execute Clear cart using command line
php bin/magento berggut:cart:clear


 


