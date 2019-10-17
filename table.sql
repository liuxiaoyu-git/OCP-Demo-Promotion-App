mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use demo;

drop table AB;
create table AB (AppVersion varchar(100), Step varchar(10));
insert into AB values("discount","look");
insert into AB values("buy1get1","buy");
