# Deaf Business Directory
Deaf business Directory is a open source directory that contain the directory of Businesses that are both
Deaf owned or for Deaf individuals. This may also include businesses that are deaf friendly (optional)

# Features
<li> Explore </li>
<li> Search for a company</li>
<li> Bookmark / save company contact in personal contact book</li>
<li> Add a business </li>
<li> Review a company </li>
<li> User's Dashboard </li>
<ul>
    <li> My Reviews</li>
    <li> Reveived Reviews</li>
    <li> My Bookmarks </li>
    <li> My Profile</li>
    <li> My Listings</li>
</ul>

# Developers section
Deaf Business directory is developed use DRY framework. Read below DRY Framework
section for a brief introduction to the framework.

## Environment and set up
1. Each developers will have a copy of the source codes on their localhost machine. For this
reason, it is recommend that you are familar with LAMP stack set up. You can use XAMPP, MAMP
or other
2. You need to know PHP, CSS, HTML5, understand OOP especially MVC design patterns
3. cd into your htdoc or public folder and git clone https://github.com/kemoycampbell/deafbusinessdirectory
4. To view in your browser, make sure your server is running and go to localhost/deafbusinessdirectory
5. Add your codes or changes
6. submit a pull request

# Dry Framework

## What is DRY(Dont Repeat Yourself)
![alt text](https://github.com/kemoycampbell/Dry/blob/master/dry.PNG?raw=true "DRY")

# Components
### Config
This allows you to define the configuration environment for both your hosting and database
of your app. Environment range from dev,prod and test. This can be found in
config/config.php

#### Routing
This let you set up all routes that your app needs such as 
/index , /about , /api as well as associated controller and other parameters. In DRY, you 
can find this in src/app.php. It is recommend that you add your routes only between the 

    ############################
    #  ADD YOUR APP ROUTES HERE
    ############################

see http://symfony.com/doc/current/components/routing.html for more info
#### Model
This component allow you to define your model, model logics often have to do with the database
interaction as well as data interaction logics.

#### View
This will contain all your view and templates. Currently all view must end with .php

#### Controller
This allows you to ties both model and view together, all requests will goes through the 
controller which will then call the appropriate action (method) as defined in the src/app.php
routes

#### Additional 
Since this framework was built using symfony, you may consult symfony doc on how a specific class 
function works. For example Response, HttpKernel, Requests, etc

Our framework was built using therefore to get the basic idea read this doc https://symfony.com/doc/current/create_framework/index.html


## Contribution
contributions are welcome so feel free to submit a pull request. I will merge the change it if fits
DRY's vision and there are no conflict with the existence code bases.

