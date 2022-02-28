<p align="center"><img src="public/images/logo.jpg" width="200"></a></p>


## About Test

This is a test of coding fo Luis Simões by Daniel Candido

This test was created with Docker, then is necessary run Docker for run the project.
In files already exists the files for create the images necessary for porject

### Initialization
- Initial Docker `docker-compose up -build -d`
- Install the libraries with command `composer install`
- Is necessary create a database with name ls
- In Docker go to the folder database and run the command `php Seeder.php`for create the tables and include the registers in tables by files .json
- URL_BASE: `http://localhost`
- User default for test: `email => test@ls.com, password => 123456`

### Execution
- In browser open the url localhost
- Just click on any article so that the related table is created

### Libraries
For this project was use the libraries:
- illuminate/routing: for create the routes of projects
- illuminate/database: for create the migrations of projects
- twig/twig: for render the views of projects
- firebase/php-jwt: for implements JWT
- phpfastcache/phpfastcache: for working with cache

