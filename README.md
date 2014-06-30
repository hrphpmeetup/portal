Hampton Roads PHP Meetup Website
=======================
[![Build Status](https://travis-ci.org/hrphp/portal.png)](https://travis-ci.org/hrphpmeetup/portal)  

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with ZF2.

Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com" zendframework/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/zendframework/ZendSkeletonApplication.git
    cd ZendSkeletonApplication
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative for downloading the project is to grab it via `curl`, and
then pass it to `tar`:

    cd my/project/dir
    curl -#L https://github.com/zendframework/ZendSkeletonApplication/tarball/master | tar xz --strip-components=1

You would then invoke `composer` to install dependencies per the previous
example.

Using Git submodules
--------------------
Alternatively, you can install using native git submodules:

    git clone git://github.com/zendframework/ZendSkeletonApplication.git --recursive

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>


Twitter config setup
--------------------
In order to hit the twitter API, we must authenticate our application with a set of keys and tokens.  Releasing this information to the public
exposes security vulnerabilities.  Because we can not release our group's twitter application's credentials, each developer will have to set up a
 dev twitter application and add that application's keys and tokens to a local config file that will stay on your local machine only.  Doing this
 allows developers to authenticate with the twitter API (and therefore not be able to reach the API) and run the site locally.

**Note: Must have twitter account to create a twitter application

Creating Twitter Dev application
* Go to https://dev.twitter.com/
* Click "Sign in" and sign in with your twitter account credentials
* Click on your picture in the top right, then "my applications"
* Click "Create New App"
* Fill in Name and Description (can be anything, this will not be used outside of your dev environment however name must be unique)
  * Example Name - {YourFullName}HrPhpDevApp
* For website, type http://hrphp.org
* Click the agree checkbox, then the "Create your Twitter application" button
* Click the "API Keys" tab
* Scroll down to "Your access token" and click "Create my access token"
* After a few moments, your access token will appear at the bottom of that page

Creating local config file to place Twitter Dev application credentials
* In the portal code, copy root/config/autoload/local.php.dist to the same directory and name it local.php
* Go back to your twitter dev application (API Keys tab from earlier)
  * Copy the "API key" value and paste it inside the quotes double quotes of 'consumer_key' => "" in the local.php file
  * Copy the "API secret" value and paste it inside the quotes double quotes of 'consumer_secret' => "" in the local.php file
  * Copy the "Access token" value and paste it inside the quotes double quotes of 'oauth_access_token' => "" in the local.php file
  * Copy the "Access token secret" value and paste it inside the quotes double quotes of 'oauth_access_token_secret' => "" in the local.php file

Now the twitter section on the home page should be populated with tweets.