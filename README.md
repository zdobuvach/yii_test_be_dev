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


GET /users -  paginated list of users (id,first_name,last_name)
GET /users/{id} - detail data of user (id,first_name,last_name,albums[])
GET /albums - paginated list of albums (id, title)
GET /albums/{id} - detail data of album (id,first_name,last_name,photos[])


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

yii addinfo/users -m="Add users" -c=10
yii addinfo/album -m="Add albums" -c=100
yii addinfo/photo -m="Add photos" -c=1000


### run tests

 ./vendor/bin/codecept run

### run webpage

http://localhost:808/

### run create photos webpage

http://localhost:808/create/photos

### run api

http://localhost:808/users
http://localhost:808/users/1
http://localhost:808/photos
http://localhost:808/photos/1106
http://localhost:808/albums
http://localhost:808/albums/304

## done

### db tables

testYii.album_change, testYii.users_change, testYii.photo

### db view

testYii.album, testYii.users

### Yii

#### add users, albums, photos (console Yii)

src/basic/commands/AddinfoController.php

#### controllers

src/basic/controllers/AlbumController.php  
src/basic/controllers/CreateController.php
src/basic/controllers/JsonResponse.php
src/basic/controllers/PhotoController.php
src/basic/controllers/UsersController.php


#### models

src/basic/models/Album.php
src/basic/models/Album_change.php
src/basic/models/Arsec.php
src/basic/models/Photo.php
src/basic/models/SetPrimaryKey.php
src/basic/models/Users.php
src/basic/models/Users_change.php


#### tests

src/basic/tests/api/ApiJsonCest.php
src/basic/tests/acceptance/AddUsersAndAlbumsCest.php