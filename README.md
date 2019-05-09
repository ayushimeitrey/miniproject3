# Final Project

Web Application for Frequently Asked Questions in Laravel

Project Link - http://am2862miniproject3.herokuapp.com/

#SetUp

 1) Clone the code from github using https://github.com/ayushimeitrey/miniproject3
 2) Install Composer
 3) Rename the .env file
 4) Setup the database with sqlite
 5) Copy path of sqlite and change .env file for the database
 6) Run php artisan key:generate to generate the key
 7) Run php artisan migrate:refresh to setup the database
 8) Done!
 
 
#Epic 1

This feature allows only the authorized users to create or edit the questions and answers.

#User Story

1)As a user, only I should be able to delete my questions, so that other users are not able to delete it.

2)As a user, only I should be able to delete my answers, so that other users are not able to delete it.

3)As a user, only I should be able to edit my questions, so that other users are not able to edit it.

4)As a user, only I should be able to edit my answers, so that other users are not able to edit it.


#Epic 2

This feature allows users to search, sort and view all the questions.

#User Story

1)As a user, I should be able to search any question with exact name, so that I can find the questions easily.

2)As a user, I should be able to see all the questions and answers created by other users, so that I can view them.

3)As a user, I should be able to sort all the questions created by me based on recently updated, so that I can find the most recent questions created by me.

4)As a user, I should be able to see the email of the users who created the questions, so that I know who all created the questions.

5)As a user, I should be able to sort all the questions created by other users based on recently updated, so that I can find the most recent questions created by other users.

6)As a user, I should be able to see all the questions and answers created by me, so that I can view them.