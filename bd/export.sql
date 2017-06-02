create table USERS(
ID NUMBER,
FIRST_NAME VARCHAR2(500),
LAST_NAME VARCHAR2(500),
PASSWORD VARCHAR2(500),
EMAIL VARCHAR2(500),
COUNTRY VARCHAR2(500),
CITY VARCHAR2(500),
DATE_OF_BIRTH VARCHAR2(500),
HOBBIES CLOB,
PHONE_NUMBER VARCHAR2(500),
GRADE VARCHAR2(500),
SECTION VARCHAR2(500),
PROFILE_PICTURE VARCHAR2(500)
);
/
create table CRIC_CODE(
ID NUMBER,
CRIC_CODE VARCHAR2(500)
);
/
create table EARTHQUAKES(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
MAGNITUDE NUMBER,
SURFACE NUMBER,
DEPTH NUMBER,
CONTINENT VARCHAR2(500),
COUNTRY VARCHAR2(500),
LOCATION VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table FIRES(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
SURFACE NUMBER,
CONTINENT VARCHAR2(500),
COUNTRY VARCHAR2(500),
LOCATION VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table FLOODS(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
SURFACE NUMBER,
CONTINENT VARCHAR2(500),
COUNTRY VARCHAR2(500),
LOCATION VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table TSHUNAMIS(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
AREA VARCHAR2(500),
MAGNITUDE NUMBER,
SURFACE NUMBER,
LOCATION VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table ERUPTIONS(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
VOLCANO_NAME VARCHAR2(500),
VOLCANO_TYPE VARCHAR2(500),
EXPLOSIVITY_INDEX NUMBER,
CONTINENT VARCHAR2(500),
COUNTRY VARCHAR2(500),
LOCATION VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table AVALANCHES(
ID NUMBER,
USER_CRIC_CODE VARCHAR2(500),
EVENT_DATE DATE,
CONTINENT VARCHAR2(500),
COUNTRY VARCHAR2(500),
LOCATION VARCHAR2(500),
MOUNTAINS VARCHAR2(500),
RISC_GRADE VARCHAR2(500),
SAFE_DATE DATE,
EVACUATED NUMBER,
DISAPPEARED NUMBER,
DEATHS NUMBER,
EVENTTYPE VARCHAR2(500)
);
/
create table PERSON_FINDER(
ID NUMBER,
FIRST_NAME VARCHAR2(500),
LAST_NAME VARCHAR2(500),
SEX NUMBER,
EMAIL VARCHAR2(500),
PHONE_NUMBER VARCHAR2(500),
STREET_NAME VARCHAR2(500),
NEIGHBORHOOD VARCHAR2(500),
CITY VARCHAR2(500),
ZIP_CODE VARCHAR2(500),
HOME_COUNTRY VARCHAR2(500),
DESCRIPTION CLOB,
PHOTO VARCHAR2(500)
);
/

alter table USERS add constraint SYS_C0017351 check (FIRST_NAME is not null); 
/
alter table USERS add constraint SYS_C0017352 check (LAST_NAME is not null); 
/
alter table USERS add constraint SYS_C0017353 check (PASSWORD is not null); 
/
alter table USERS add constraint SYS_C0017354 check (EMAIL is not null); 
/
alter table USERS add constraint SYS_C0017355 primary key (ID); 
/
alter table CRIC_CODE add constraint SYS_C0017356 primary key (ID); 
/
alter table CRIC_CODE add constraint SYS_C0017357 unique (CRIC_CODE); 
/
alter table EARTHQUAKES add constraint SYS_C0017358 check (EVENT_DATE is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017359 check (MAGNITUDE is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017360 check (SURFACE is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017361 check (DEPTH is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017362 check (CONTINENT is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017363 check (COUNTRY is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017364 check (LOCATION is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017365 check (RISC_GRADE is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017366 check (EVENTTYPE is not null); 
/
alter table EARTHQUAKES add constraint SYS_C0017367 primary key (ID); 
/
alter table FIRES add constraint SYS_C0017369 check (EVENT_DATE is not null); 
/
alter table FIRES add constraint SYS_C0017370 check (SURFACE is not null); 
/
alter table FIRES add constraint SYS_C0017371 check (CONTINENT is not null); 
/
alter table FIRES add constraint SYS_C0017372 check (COUNTRY is not null); 
/
alter table FIRES add constraint SYS_C0017373 check (LOCATION is not null); 
/
alter table FIRES add constraint SYS_C0017374 check (RISC_GRADE is not null); 
/
alter table FIRES add constraint SYS_C0017375 check (EVENTTYPE is not null); 
/
alter table FIRES add constraint SYS_C0017376 primary key (ID); 
/
alter table FLOODS add constraint SYS_C0017378 check (EVENT_DATE is not null); 
/
alter table FLOODS add constraint SYS_C0017379 check (SURFACE is not null); 
/
alter table FLOODS add constraint SYS_C0017380 check (CONTINENT is not null); 
/
alter table FLOODS add constraint SYS_C0017381 check (COUNTRY is not null); 
/
alter table FLOODS add constraint SYS_C0017382 check (LOCATION is not null); 
/
alter table FLOODS add constraint SYS_C0017383 check (RISC_GRADE is not null); 
/
alter table FLOODS add constraint SYS_C0017384 check (EVENTTYPE is not null); 
/
alter table FLOODS add constraint SYS_C0017385 primary key (ID); 
/
alter table TSHUNAMIS add constraint SYS_C0017387 check (EVENT_DATE is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017388 check (AREA is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017389 check (MAGNITUDE is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017390 check (SURFACE is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017391 check (LOCATION is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017392 check (RISC_GRADE is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017393 check (EVENTTYPE is not null); 
/
alter table TSHUNAMIS add constraint SYS_C0017394 primary key (ID); 
/
alter table ERUPTIONS add constraint SYS_C0017402 check (LOCATION is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017403 check (RISC_GRADE is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017404 check (EVENTTYPE is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017405 primary key (ID); 
/
alter table ERUPTIONS add constraint SYS_C0017406 unique (VOLCANO_NAME); 
/
alter table ERUPTIONS add constraint SYS_C0017396 check (EVENT_DATE is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017397 check (VOLCANO_NAME is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017398 check (VOLCANO_TYPE is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017399 check (EXPLOSIVITY_INDEX is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017400 check (CONTINENT is not null); 
/
alter table ERUPTIONS add constraint SYS_C0017401 check (COUNTRY is not null); 
/
alter table AVALANCHES add constraint SYS_C0017408 check (EVENT_DATE is not null); 
/
alter table AVALANCHES add constraint SYS_C0017409 check (CONTINENT is not null); 
/
alter table AVALANCHES add constraint SYS_C0017410 check (COUNTRY is not null); 
/
alter table AVALANCHES add constraint SYS_C0017411 check (LOCATION is not null); 
/
alter table AVALANCHES add constraint SYS_C0017412 check (RISC_GRADE is not null); 
/
alter table AVALANCHES add constraint SYS_C0017413 check (EVENTTYPE is not null); 
/
alter table AVALANCHES add constraint SYS_C0017414 primary key (ID); 
/
alter table PERSON_FINDER add constraint SYS_C0017416 check (FIRST_NAME is not null); 
/
alter table PERSON_FINDER add constraint SYS_C0017417 check (LAST_NAME is not null); 
/
alter table PERSON_FINDER add constraint SYS_C0017418 check (SEX is not null); 
/
alter table PERSON_FINDER add constraint SYS_C0017419 primary key (ID); 
/

alter table EARTHQUAKES add constraint SYS_C0017368 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/
alter table FIRES add constraint SYS_C0017377 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/
alter table FLOODS add constraint SYS_C0017386 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/
alter table TSHUNAMIS add constraint SYS_C0017395 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/
alter table ERUPTIONS add constraint SYS_C0017407 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/
alter table AVALANCHES add constraint SYS_C0017415 foreign key (USER_CRIC_CODE) references CRIC_CODE (CRIC_CODE); 
/

insert into USERS values (1, 'Bogdan', 'M', 'bogdan', 'bm@cric.tw', 'RO', 'IS', '07-07-1980', null, '0777888999', null, null, null); 
insert into users values (2, 'Cosmin', 'T', 'cosmin', 'ct@cric.tw', 'RO', 'IS', '07-07-1950', null, '0777888000', null, null, null);
insert into CRIC_CODE values (1, 'CRIC'); 
insert into CRIC_CODE values (2, 'HELP'); 
insert into CRIC_CODE values (3, 'PEOPLE'); 
insert into EARTHQUAKES values (5711, 'CRIC', to_date('28-05-2017','dd-mm-yyyy'),5.1, 3408, 3.4, 'Asia', 'Rusia', 'Sakhalin, Severo-Kuril''sk', 'images/grad_mare_de_risc.png', to_date('28-05-2017','dd-mm-yyyy'),35, 23, 2, 'earthquakes'); 
insert into EARTHQUAKES values (8255, 'CRIC', to_date('29-05-2017','dd-mm-yyyy'),2, 500, 1.2, 'Australia', 'Noua Zeelanda', 'Te Kaha', 'images/grad_mic_de_risc.png', to_date('29-05-2017','dd-mm-yyyy'),12, 12, 1, 'earthquakes'); 
insert into EARTHQUAKES values (8889, 'CRIC', to_date('30-05-2017','dd-mm-yyyy'),2.5, 890, 1.7, 'America de Nord', 'SUA', 'Alaska, Manley Hot Springs', 'images/grad_mic_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'earthquakes'); 
insert into EARTHQUAKES values (5615, 'CRIC', to_date('31-05-2017','dd-mm-yyyy'),4.5, 2080, 2.7, 'Europa', 'Italia', 'Sicilia, Castel di Tusa	', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'earthquakes'); 
insert into EARTHQUAKES values (6639, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),6.8, 5609, 4.5, 'Asia', 'Turcia', 'Sakarya, Karasu', 'images/grad_urias_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'earthquakes'); 
insert into FIRES values (7482, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),1509, 'Europa', 'Bulgaria', 'Yambol, Bolyarovo', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'fires'); 
insert into FIRES values (5523, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),5090, 'America de Sud', 'Ecuador', 'Manabi, Manta', 'images/grad_urias_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'fires'); 
insert into FIRES values (8360, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),370, 'Europa', 'Grecia', 'Grecia Centrala, Afration', 'images/grad_mic_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'fires'); 
insert into FIRES values (1802, 'CRIC', to_date('02-06-2017','dd-mm-yyyy'),600, 'Asia', 'Turcia', 'Sakarya, Karasu', 'images/grad_mic_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'fires'); 
insert into FIRES values (9742, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),3020, 'America Centrala', 'Mexic', 'Guerrero, Pericotepec', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'fires'); 
insert into FLOODS values (5473, 'CRIC', to_date('31-05-2017','dd-mm-yyyy'),4800, 'America de Nord', 'SUA', 'California, Cobb', 'images/grad_mare_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'floods'); 
insert into FLOODS values (4722, 'CRIC', to_date('01-06-2017','dd-mm-yyyy'),1020, 'America de Nord', 'SUA', 'Oklahoma, Meno', 'images/grad_mic_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'floods'); 
insert into FLOODS values (7673, 'CRIC', to_date('31-05-2017','dd-mm-yyyy'),3278, 'Europa', 'Grecia', 'North Aegean, Mithymna', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'floods'); 
insert into TSHUNAMIS values (5229, 'CRIC', to_date('28-05-2017','dd-mm-yyyy'),'Oceanul Atlantic de Nord', 6, 6079, 'Regiunea Dominican Republic', 'images/grad_urias_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'tshunamis'); 
insert into TSHUNAMIS values (9015, 'CRIC', to_date('30-05-2017','dd-mm-yyyy'),'Marea Solomon', 5.2, 4070, 'West New Britain, Papua New Guinea', 'images/grad_mare_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'tshunamis'); 
insert into ERUPTIONS values (6421, 'CRIC', to_date('17-05-2017','dd-mm-yyyy'), 'Poas', 'Stratovulcan', 7, 'America Centrala', 'Costa Rica', 'Alajuela Province', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'), 0, 0, 0, 'eruptions'); 
insert into ERUPTIONS values (196, 'CRIC', to_date('19-05-2017','dd-mm-yyyy'), 'Katla', 'Subglaciar', 7, 'Europa', 'Islanda', 'Islanda de Sud', 'images/grad_mediu_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'), 0, 0, 0, 'eruptions'); 
insert into AVALANCHES values (2041, 'CRIC', to_date('14-02-2017','dd-mm-yyyy'),'Europa', 'Elvetia', 'Stanserhorn', 'Muntii Alpi', 'images/grad_mare_de_risc.png', to_date('01-01-2000','dd-mm-yyyy'),0, 0, 0, 'avalanches'); 

create sequence USER_SEQ;
/
 
create or replace trigger user_trigger 
    BEFORE INSERT ON USERS
    FOR EACH ROW

    
BEGIN
    SELECT user_seq.NEXTVAL
    INTO   :new.id
    FROM   dual;
   END;
/
 
 
 
 
 
create index on USERS (ID); 
/
create index on TSHUNAMIS (ID); 
/
create index on PERSON_FINDER (ID); 
/
create index on FLOODS (ID); 
/
create index on FIRES (ID); 
/
create index on ERUPTIONS (ID); 
/
create index on ERUPTIONS (VOLCANO_NAME); 
/
create index on EARTHQUAKES (ID); 
/
create index on CRIC_CODE (ID); 
/
create index on CRIC_CODE (CRIC_CODE); 
/
create index on AVALANCHES (ID); 
/
