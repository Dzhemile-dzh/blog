MICROBLOG PROJECT.

Fixed issues after the code review: 
    · OS incompatibility, Directory Separator
    · No template engine
    · Controllers are too fat
    · DB inconsistency - "Add blog" throws a fatal error
    · No error handling, no exceptions, no check if the DB queries are successful
    · Try to move the validation logic outside the controllers
    · Inconsistent, ex. some files have the correct directory separator others don’t, etc
    · No Middleware
    · Plain DB password
    · Dashboard is accessible by bypassing the login with empty data
    · There is no Session starting in the project
    · Plain queries without DB layer
    · DB Conn Singleton's class Connection doesn't follow the best practices
    · TestCase base class is missing
!! Not included Slim 3.0 as it's needed to change all project structure, routing, controllers and time defeated me in this struggle

This Microblog project includes:
    -public page: includes all blog post visible to all users
    -login form
    -new user registration form 
    -admin page: admin can edit/add/delete blog posts, users, images

 Business Logic: 
    - admin can change the blog status - blog status could be 'active' and 'not active' . As 'not active' blogs are not visible on public blogs section
    - every image have 2 types: main and secondary. Images with 'main' type can be used as the related to post image visible on the top and 'secondary' could be images used on the body section in blog post.
    - every blog type has to be choosen from dropdown menu , which includes types - home decor, art, bussinees.
    - on public blog section posts are created with relation between images and blog tables, ordered by last published date and have blog status 'active'.
