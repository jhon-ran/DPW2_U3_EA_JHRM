# DPW2_U3_EA_JHRM
Fullstack web app with PHP, HTML, CSS, Bootstrap &amp; MySQL for property management

## Config
This web app is configured to connect to a remote DB. To change conexion to a local DB in port 80:
1. Go to *conexion.php file*
2. Uncomment this:
```php
//Variables de conexion local
//$dbname="condominio";
//$user="root";
//$password="";
```
3. Change the name of the DB to whatever DB you are going to use.
4. This is the DB schema compatible with this project:
![image](https://github.com/jhon-ran/DPW2_U3_EA_JHRM/assets/38293508/cd56b977-babd-4307-b1c5-6f978854e477)

## Test
Click [here](https://high-class-harm.000webhostapp.com/condominio3/index.php) to test the site. You can sign up and navigate through it.
There are 2 kids of users: CO (regular) & AD (amin).

When you signup you are automatically assigned a CO status.

If you need an admin user, enter it directly in the database. 

## Dependencies
1. Bootstrap@5.3.1
2. PHP 8.2.4

## Disclaimer
This a poof of concept app not suited for production. It requires more configuration to make it production-ready. 




