TYPE=VIEW
query=select `testYii`.`users_change`.`id` AS `id`,`testYii`.`users_change`.`first_name` AS `first_name`,`testYii`.`users_change`.`last_name` AS `last_name`,(select json_arrayagg(`ac`.`id`) from `testYii`.`album_change` `ac` where `ac`.`user_id` = `testYii`.`users_change`.`id`) AS `albums` from `testYii`.`users_change`
md5=4b6cbe0b774239c1c89caee1ddeee35a
updatable=1
algorithm=0
definer_user=root
definer_host=%
suid=2
with_check_option=0
timestamp=2021-10-08 14:54:50
create-version=2
source=SELECT users_change.id, users_change.first_name, users_change.last_name, (select JSON_ARRAYAGG(id) from album_change ac  WHERE ac.user_id = users_change.id) AS albums FROM users_change
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `testYii`.`users_change`.`id` AS `id`,`testYii`.`users_change`.`first_name` AS `first_name`,`testYii`.`users_change`.`last_name` AS `last_name`,(select json_arrayagg(`ac`.`id`) from `testYii`.`album_change` `ac` where `ac`.`user_id` = `testYii`.`users_change`.`id`) AS `albums` from `testYii`.`users_change`
mariadb-version=100604
