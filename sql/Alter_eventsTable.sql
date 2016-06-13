alter table event add event_date varchar(20);
alter table event add location varchar(50);
alter table event add description varchar(400);

alter table event drop even_name;
alter table event add event_name varchar(50);