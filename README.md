1)oc new-project promotion

2)部署一个mysql<br>
oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=demo

3)创建表AB<br>
mysql -h127.0.0.1 -P3306 -uopenshift -ppassword<br>
use demo;

drop table AB;<br>
create table AB (AppVersion varchar(100), Step varchar(10));<br>
insert into AB values("discount","look");<br>
insert into AB values("buy1get1","buy");

4)创建三个应用和相关route<br>
打折促销应用<br>
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#discount --name=discount --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

买一送一促销应用<br>
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#buy1get1free --name=buy1get1free --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc discount --name=promotion<br>
oc set route-backends promotion discount=1 buy1get1free=1

统计应用<br>
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#statistic --name=statistic --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc statistic
