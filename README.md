# README #

This is the repository of **Hebsix Agency** website.


### What is this repository for? ###

* Do maintance on the agency website

### How do I get set up? ###

* Get the project
```
git clone https://github.com/hebsix/hebsix_website
```

* Install node package module and run:
```
npm install
``` 

### Configure Xampp ###

#### Windows

Open the ***"C:\xampp\apache\conf\extra\httpd-vhosts.conf"*** and add:

```
<VirtualHost *:30005>
    DocumentRoot "C:\xampp\htdocs\hebsix_site"
    ServerName localhost:30005
</VirtualHost>
```

Then open the ***"C:\xampp\apache\conf\httpd.conf"***, search by (CTRL + F) "Listen 80" and add:

```
Listen 30005
```

Completed the steps above you might start the Xampp and run on ***"http://localhost:30005"***.