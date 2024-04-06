# Symfony application

This Symfony application provides a simple interface to perform CRUD (Create, Read, Update, Delete) operations on users.

## Usage

> **Note:** Before you start, make sure you have [PHP](https://www.php.net/downloads) and [Composer](https://getcomposer.org/download/) installed.

1. Clone this repository.
2. Copy the `.env.example` file and rename it to `.env`.
3. Run the following commands to deploy the application: <br> `composer install`<br>`docker compose up`

## Routes

> **Register**<br>
Route: /api/register<br>
Method: POST<br>
Description: Create a new user with the specified data<br>
Request body (json):
`email` `name` `age` `sex` `birthday` `phone`

> **Find user data**<br>
Route: /api/find_user_data<br>
Method: GET<br>
Description: Retrieve user data based on the specified email<br>
Request body (json):
`email`

> **Update user data**<br>
Route: /api/update_user_data<br>
Method: PUT<br>
Description: Update user data (email and phone) based on the specified email<br>
Request body (json):
`email` `newEmail` `newPhone`

> **Delete user**<br>
Route: /api/delete_user<br>
Method: DELETE<br>
Description: Delete user based on the specified email<br>
Request body (json):
`email`