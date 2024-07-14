<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# How to use it -- Steps
1. Get pull from repo
2. cd /directory
3. composer update
4. Create database "taskDB" or any custom and update in .env file
5. Run Database migration command "php artisan migrate --seed"
6. Run server using "php artisan serve"

This project complete below points
 
1. Tasks should appear dynamically on the frontend without requiring a page refresh.
2. Clicking on a checkbox marks a task as completed and removes it from the display.
3. Clicking on a button displays both completed and non-completed tasks. 
4. Tasks can be deleted by clicking a delete button, with a confirmation prompt. 
5. Ensure that no duplicate tasks can be added to the list.


Notes:
1. Ensure your environment meets the Laravel framework requirements.
2. Customize the .env file according to your database settings.
3. Modify routes, controllers, and views as per your specific project requirements.

