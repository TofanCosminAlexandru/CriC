drop table person_finder;
/
drop table earthquakes;
/
drop table fires;
/
drop table floods;
/
drop table tshunamis;
/
drop table eruptions;
/
drop table avalanches;
/
drop table users;
/

create table users(
  id integer primary key,
  first_name varchar2(50) not null,
  last_name varchar2(50) not null,
  password varchar2(100) not null,
  email varchar2(100) not null,
  country varchar2(100),
  city varchar2(100),
  date_of_birth varchar2(50),
  hobbies varchar2(200),
  phone_number varchar2(15),
  grade varchar2(100),
  section varchar2(100),
  profile_picture varchar2(200)
  
);
/

drop table cric_code;
/
create table cric_code(
  id integer primary key,
  cric_code varchar2(10) unique
);
/

insert into cric_code(id, cric_code) values (1, 'CRIC');
insert into cric_code(id, cric_code) values (2, 'HELP');
insert into cric_code(id, cric_code) values (3, 'PEOPLE');

create table earthquakes(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  magnitude number(10, 2) not null,
  surface integer not null,
  depth number(10, 2) not null,
  continent varchar2(100) not null,
  country varchar2(100) not null,
  location varchar2(200) not null,
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table fires(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  surface integer not null,
  continent varchar2(100) not null,
  country varchar2(100) not null,
  location varchar2(200) not null,
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table floods(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  surface integer not null,
  continent varchar2(100) not null,
  country varchar2(100) not null,
  location varchar2(200) not null,
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table tshunamis(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  area varchar2(200) not null,
  magnitude number(10, 2) not null,
  surface integer not null,
  location varchar2(200) not null,
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table eruptions(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  volcano_name varchar2(100) not null unique,
  volcano_type varchar2(100) not null,
  explosivity_index integer not null,
  continent varchar2(100) not null,
  country varchar2(100) not null,
  location varchar2(200) not null,
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table avalanches(
  id integer primary key,
  user_cric_code varchar2(10) references cric_code(cric_code),
  event_date date not null,
  continent varchar2(100) not null,
  country varchar2(100) not null,
  location varchar2(200) not null,
  mountains varchar2(100),
  risc_grade varchar2(200) not null,
  safe_date date,
  evacuated integer,
  disappeared integer,
  deaths integer,
  eventType varchar2(200) not null
);
/

create table person_finder(
  id integer primary key,
  first_name varchar2(50) not null,
  last_name varchar2(50) not null,
  sex integer check (sex in (0,1,2)),
  email varchar2(100),
  phone_number varchar2(15),
  street_name varchar2(100),
  neighborhood varchar2(100),
  city varchar2(100),
  zip_code varchar2(100),
  home_country varchar2(100),
  description clob,
  photo varchar2(100)
);
/



drop sequence user_seq;
CREATE SEQUENCE user_seq START WITH 1;

drop trigger user_trigger;
 CREATE OR REPLACE TRIGGER user_trigger 
    BEFORE INSERT ON USERS
    FOR EACH ROW

    BEGIN
    SELECT user_seq.NEXTVAL
    INTO   :new.id
    FROM   dual;
   END;
  /
  
  commit
  select * from cric_code where cric_code='HELP';
commit;