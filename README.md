This is how to start up the developer environment
first if you do not have docker-compose installed please install docker-compose


1) open your terminal
2) type in terminal 'docker-compose up -d --build site'
  -this should start the basic servers
3) then type in terminal 'docker-compose run --rm composer install'
3) then type in terminal 'docker-compose run --rm artisan migrate'
  -this will run the migrations within the laravel application
  -NOTE: IF YOU ENCOUNTER AN ERROR WHEN TRYING TO MIGRATE PLEASE WAIT FOR 5 SECOND AND
    RUN THE COMMAND AGAIN, IT MIGHT TAKE A SECOND FOR DOCKER TO FINISH SETTING UP THE DB
4) then type 'docker-compose run --rm artisan db:seed'
  -this will seed the database with dummy user
4) the LAMP server is connected to http://localhost:8080


NOTE:
  -if you need access to the database please use command 'docker-compose exec mysql bash'

NOTE:
  -if you are having access errors with the log files that means that you don't have proper access to the storage files in the server to have acces open terminal and type in command 'sudo chmod 777 -R src'
