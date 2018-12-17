# Social-Media
i created a PHP web app that lets a single user log in and manage (i.e. view, add, remove, and modify) the contents of a table stored in a MySQL database. The default idea is to create a “collection manager” to manage some collection of objects (i.e. coins, vinyl, blog posts, etc.)
# The Data Table 
my table must have at least 6 fields, one of which must be a primary key. I make use of each of the four main data types: Int, Varchar, Text, and Date. When you hand in, your database should have at least 10 records in it.

# Logging In and Out
The index page of your site should present the user with a login form. This form should redirect to a 
page that “logs in” the user by checking the id and password against a pair of hard -coded values. If the login is successful, use the $_SESSION object to keep track of the fact that the browser is logged in. If someone tries to load any page other than the login page without logging in first, they should get an error message.It should be possible to log out when the user is finished.

# Managing the Table
It is up to you how to structure the table management part of your site. However, it must be possible to view the records in some sorted order, search (by at least one field), insert a new record, delete a record, and update a record. It might be possible to do all of this on a cleverly-designed single page, or you might prefer to use multiple pages. If you decide to use multiple pages,make sure that it is easy to navigate back and forth. 

 All SQL queries 
should be prepared using parameters to avoid SQL Injection attacks.
 All exceptions and errors should be 
caught and handled gracefully. The user should never be exposed to a raw error or warning from the 
PHP interpreter.
