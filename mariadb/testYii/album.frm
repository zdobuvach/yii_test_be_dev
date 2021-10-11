TYPE=VIEW
query=select `testYii`.`album_change`.`id` AS `id`,`testYii`.`album_change`.`user_id` AS `user_id`,`testYii`.`album_change`.`title` AS `title`,(select json_arrayagg(`p`.`id`) from `testYii`.`photo` `p` where `p`.`album_id` = `testYii`.`album_change`.`id`) AS `photos` from `testYii`.`album_change`
md5=eeae83e9bc5af262fc6f5e61cf6e9bf9
updatable=1
algorithm=0
definer_user=root
definer_host=%
suid=2
with_check_option=0
timestamp=2021-10-08 07:39:41
create-version=2
source=SELECT album_change.id, album_change.user_id, album_change.title, (select JSON_ARRAYAGG(id) from photo p WHERE p.album_id = album_change.id) AS photos FROM album_change
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `testYii`.`album_change`.`id` AS `id`,`testYii`.`album_change`.`user_id` AS `user_id`,`testYii`.`album_change`.`title` AS `title`,(select json_arrayagg(`p`.`id`) from `testYii`.`photo` `p` where `p`.`album_id` = `testYii`.`album_change`.`id`) AS `photos` from `testYii`.`album_change`
mariadb-version=100604
