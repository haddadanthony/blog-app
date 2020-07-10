# Basic Project Setup
----------------

## Installing packages & dependencies
`npm install && composer install`
<br> 
<br>
<hr>

## Database
• You might want to change the DB config inside the **.env** file, I changed the default port to 3307 <br>
• `php artisan migrate`<br>
<br>
<br>
<hr>

## Task Scheduler for publishing a Post
I have set up a Cronjob that runs every minute on my machine (I'm using Linux), this cronjob navigates to my project folder and runs the scheduler which fires a *publish* method that checks the **Posts** table and loops over all the records that have a status of **draft**.
It then checks the **publish time** if it's less than the **current time**, the post will then become published.

Logic sits inside this directory >> *blog-app/app/Console/Commands/publish.php*

In order to set up a Cronjob on **Linux** or **Mac**<br>  
1- Install **cronie** package<br>
2- Run `env EDITOR=vim(or whichever you prefer) crontab -e` //To register your command(s)<br>
3- Enter the following commad:<br>
`* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`<br>
4- Enable the service using system control:<br>
`sudo systemctl enable cronie.service`<br>
Then you're good to go...
