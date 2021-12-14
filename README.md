# test_SolvIT_AS

## task

### PHP BE Dev test task (YII2)


Create application from scratch, using YII2 or Laravel advanced or basic template


Model structure:

User (modify existing model):

    • First name
    • Last name
    • Albums - hasMany Album

Album
    • Id
    • user_id
    • Title
    • Photos - hasMany Photo

Photo
    • Id
    • album_id
    • Title
    • url (virtual attribute, should generate random link to one of static images, for this purposes add add 5-10 static images to project )


API

Create rest controller, which will provide API endpoint for such calls (expected json result)


GET /users -  paginated list of users (id,first_name,last_name) <br>
GET /users/{id} - detail data of user (id,first_name,last_name,albums[]) <br>
GET /albums - paginated list of albums (id, title) <br>
GET /albums/{id} - detail data of album (id,first_name,last_name,photos[]) <br>


Seeders

Create seeder that creates 10 demo users, using password from configuration file. Password should not be included in repo

Create seeders for 100 albums of this users and 1000 respective photos

Seeders should be able to run from console, name generating is up to you, can be ‘user_1’, ‘user_2’ and so on

Deploy

Send result code as link to git repository

Test
 
Write some tests - it is not required to have 100% coverage, just to show understanding of different testing scenarios


## solution

### run servers

docker-compose up -d  --build

### entrance to console Yii

docker-compose exec web sh

### run add users, albums, photos

-c - count users, albums, photos
-m - message

yii addinfo/users -m="Add users" -c=10 <br>
yii addinfo/album -m="Add albums" -c=100 <br>
yii addinfo/photo -m="Add photos" -c=1000 <br>


### run tests

 ./vendor/bin/codecept run

### Before you begin, you need to rename src/basic/config/users_example.php to src/basic/config/users.php and add users with the passwords according to the template 

### run webpage

http://localhost:808/

### run create photos webpage

http://localhost:808/create/photos

### run api

http://localhost:808/users <br>
http://localhost:808/users/1 <br>
http://localhost:808/photos <br>
http://localhost:808/photos/1106 <br>
http://localhost:808/albums <br>
http://localhost:808/albums/304 <br>

Paginated output is available, for example like this:<br>

http://localhost:808/users?page=2&per-page=5<br>

where:<br>

page=2 - page output 2<br>
per-page=5 - output of five records per page<br>

## done

### db tables

testYii.album_change, testYii.users_change, testYii.photo

### db view

testYii.album, testYii.users

### Yii

#### add users, albums, photos (console Yii)

src/basic/commands/AddinfoController.php

#### controllers

src/basic/controllers/AlbumController.php <br>  
src/basic/controllers/CreateController.php <br>
src/basic/controllers/JsonResponse.php <br>
src/basic/controllers/PhotoController.php <br>
src/basic/controllers/UsersController.php <br>


#### models

src/basic/models/Album.php <br>
src/basic/models/Album_change.php <br>
src/basic/models/Arsec.php <br>
src/basic/models/Photo.php <br>
src/basic/models/SetPrimaryKey.php <br>
src/basic/models/Users.php <br>
src/basic/models/Users_change.php <br>


#### tests

src/basic/tests/api/ApiJsonCest.php <br>
src/basic/tests/acceptance/AddUsersAndAlbumsCest.php
