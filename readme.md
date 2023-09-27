## Study mage (2015)

Flashcard software that uses spaced repetition techniques. Warning - this is an old application stack using an outdated version of PHP and Laravel that is now containerized using Docker.

Back end: Laravel 4.2/PHP 5.4/MySQL
Front end: AngularJS + Foundation

## Setup app
docker-compose build  
docker-compose up  
docker-compose exec web composer install  
docker-compose exec web php artisan migrate   
docker-compose exec web php artisan db:seed  

## errors
"Error in exception handler" - Ensure correct permissions are set:  
sudo chown -R www-data:www-data app/storage  
sudo chmod -R 755 app/storage  