# ✨ Brief description

- This project is a simple TASK MANAGEMENT TOOL which gives you the ability to add new tasks, modifiy and delete tasks.

- No words are hardcoded, so even though the primary language is italian, if you go to src/resources/lang and delete the "ita" folder, the whole project will be in english.

- I used bootstrap and a little css for styling.

- You also have a way to FLAG THE TASK AS COMPLETED OR NOT.Once a task is flaged as completed, a tick appears near it so it can be seen when amongst all the other tasks, and if you click on the "show" button to see it in more details, the card containing its information is green, different from the gray color it has when the task is still to be completed

# ⚙️ Setup Instructions

## 1-When inside the project folder run

### `docker-compose run --rm composer install`

## 2-Add the .env file inside the src folder and fix the database connection inside

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=task_list
    DB_USERNAME=myuser
    DB_PASSWORD=mypassword

## 3-Start the app containers, except bootstrap

### `docker-compose up -d --build server php mysql`

## 4-Fix possible permission issues with the app containers still up

### `docker-compose exec php chmod -R 775 storage bootstrap/cache`

### `docker-compose exec php chown -R www-data:www-data storage bootstrap/cache`

## 5-Generate the app key with the app containers still up

### `docker-compose exec php php artisan key:generate`

## 6-Enter the php conatiner and run the migrations

### `docker-compose exec php php artisan migrate`

## 7-Set up the boostrap part

### `docker-compose run --rm npm install`

### `docker-compose up -d npm`

The app runs in the development mode.\
Open [http://localhost:8080](http://localhost:8080) to view it in your browser.

## 8-To stop all the app containers

### `docker-compose down`
