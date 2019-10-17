1)oc new-project promotion

2)部署一个mysql
oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=demo

3)创建表AB
mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use demo;

drop table AB;
create table AB (AppVersion varchar(100), Step varchar(10));
insert into AB values("discount","look");
insert into AB values("buy1get1","buy");

4)创建三个应用和相关route
打折促销应用
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#discount --name=discount --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

买一送一促销应用
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#buy1get1free --name=buy1get1free --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc discount --name=promotion
oc set route-backends promotion discount=1 buy1get1free=1

统计应用
oc new-app https://github.com/liuxiaoyu-git/OCP-Demo-AB-App#statistic --name=statistic --env MYSQL_SERVICE_HOST=mysql.promotion.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demo DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc statistic
