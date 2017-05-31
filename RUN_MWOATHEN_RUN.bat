cd C:\xampp\htdocs\Webs2
SET /P refreshDB=RefreshDB (y/n)?
IF "%uname%"=="n" GOTO SERVE
php artisan migrate:refresh
php artisan db:seed
:SERVE
php artisan serve