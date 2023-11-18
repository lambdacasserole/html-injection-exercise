# HTML Injection Exercise

This repository contains a deliberately vulnerable web application exhibiting a HTML injection vulnerability.

## Purpose

![Screenshot](screenshot.png)

I use this as part of a practical activity in my seminars on cybersecurity for business students. It allows students to get hands-on in conducting a cyberattack aimed at phishing credentials from the website administrator without leaving the browser.

## Setup

**Do not deploy this intentionally vulnerable web application on any webserver you don't mind destroying.**

Now, configure Apache to separately serve (under different subdomains, for example) the three folders under the root of this project (`/attacker-service`, `/vulnerable-service`, and `/victim-service`). Alternatively, to run the project locally, ensure that PHP 7.0+ is installed and run the following from either of the aforementioned folders:

```bash
php -S localhost:8080
```

You'll then be able to access the relevant web application at:

```
http://localhost:8080
```

### Deployment

If you want to add this application to your vhosts, config files are included in the `/vhosts` folder to get you started. 

Rename these, update them with your server names/document roots and copy them to `/etc/apache2/sites-available`. Activate them with `a2ensite` and run `letsencrypt` or similar to configure HTTPS automatically.

## Usage

Follow this workflow to conduct the cyberattack on the web application:

1. First, go to the attacker service.
2. You should see several files here. Open “monitor.php” in a new tab.
3. Now, navigate into the "payloads" folder and copy-paste the contents of "tracker.html.txt" into the email field on the vulnerable service. Hit submit.
4. Now, visit the victim service and browse to the "Beta Invite Requests" page. You'll see that "monitor.php" is now showing you the IP address of the victim.
5. Next, go back to the attacker service and open "monitorcreds.php" in a new tab.
6. Now, navigate into the "payloads" folder and copy-paste the contents of "phishing-one-line.html.txt" into the email field on the vulnerable service. Hit submit.
7. Now, visit the victim service again and browse to the "Beta Invite Requests" page. Your phishing payload will execute, showing a form blocking the victim from using the web application and requesting their credentials. You’ll see “monitorcreds.php” change to show you these once they submit them.

### Patching the Application

In case the audience is more technical, you may want to show how to patch the vulnerabilities in the application.

To do so, perform a project-wide search for `TODO` to find each code change that needs to be made. Patched code is included as comments.

Apache will need to be reconfigured to disallow the download of the `/emails.txt` user database. Do this my renaming `.htaccess.patch` (under `/vulnerable-service`) to `.htaccess`. Ensure that your Apache installation [allows .htaccess overrides](https://httpd.apache.org/docs/2.4/howto/htaccess.html) in the web root directory.

## Acknowledgements

The following libraries are used by the project frontend, but are committed to the repository (i.e. not dependency-managed) for ease of deploying the project and resetting it for the next group of students:

* [jQuery v3.5.1](https://jquery.com)
* [jQuery UI Easing v1.4.1](https://jqueryui.com/easing/)
* [Bootstrap v4.5.0](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [FontAwesome v5.13.0](https://fontawesome.com/v5/search)
* [Chart.js v2.9.3](https://www.chartjs.org)
* [DataTables v1.10.21](http://www.datatables.net)

Fonts used include: 

* [Source Sans 3](https://fonts.google.com/specimen/Source+Sans+3)
* [Merriweather](https://fonts.google.com/specimen/Merriweather)
* [Nunito](https://fonts.google.com/specimen/Nunito)

The frontends for this project are based on:

* The [StartBootstrap Coming Soon Template](https://startbootstrap.com/theme/coming-soon)
* The [SB Admin 2 Template](https://startbootstrap.com/theme/sb-admin-2)

## Copyright and License

Copyright 2023 Saul Johnson. Code released under the [MIT](https://github.com/StartBootstrap/startbootstrap-blog-post/blob/gh-pages/LICENSE) license.