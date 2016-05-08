# PSN: Professional Social Network
How to Use Our GitHub Repository
* 1. Clone the PSN Repository onto your own virtual machine
* 2. We are utilizing a LAMP stack and we recommend that the user downloads it onto their system as well
    * D3.js and Bootstrap are needed as well however the files we imported are linked directly from their websites
* 3. Set up your own MySQL database using your favorite client
* 4. Import the database from the datadump.sql file
    * Login to MySQL: mysql -h [host] -u [username] -p[password]
    * Create database schema: create database webdata;
    * quit
    * Use the command mysql -h [host] -u [username] -p[password] < /DB/datadump.sql
* 4. Make a dbcreds file in the controller folder and import your own database login credentials
* 5. Our website utilizes HTTPS, so you will need to either get an SSL Certificate for your site or remove the HTTPS requirement headers from our pages
* 6. Test your website by going to the url you assigned to your database
