# laraveltest

控制器再test里的UserController; post方法是store();

建表语句
create table if not exists `user` (
`id` int not null auto_increment,
`id1` int not null,
`id2` int not null,
`userID` char(36)  not null,
primary key (`id`),
unique key `userID` (`userID`)
) engine=InnoDB default charset=utf8;

流程图在Candidates Test.docx

不会docker1
