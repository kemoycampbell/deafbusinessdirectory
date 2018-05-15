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


## Setup
1. clone the repo into your htdoc or www folder
2. navigate to config/config.php and set up your environment accordily
3. If you need to use User feature or the isGranted method, you need to ensure
   you have already uploaded the account.sql to your database. Ensure to correct the 
   database name in config/config.php
  
4. To see a sample of DRY homepage navigate to yoururl/index
5. Happy coding


## Contribution
contributions are welcome so feel free to submit a pull request. I will merge the change it if fits
DRY's vision and there are no conflict with the existence code bases.


## Current TODO:
1. Add onKernelException to the core so we can remove the execption checker out of public/index.php.
see https://symfony.com/doc/current/components/event_dispatcher.html and http://symfony.com/doc/current/event_dispatcher.html
for detail on how to implement as well as background information

2. Intensive security testings 

3. Document

4. Open Source