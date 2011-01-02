delete FROM tm_profile;
delete from  tm_partnerpreference;
delete from tm_family;

delete FROM tm_profile where ProfileId='BGHND1';
delete from tm_partnerpreference where ProfileId='BGHND1';
delete from tm_family where ProfileId='BGHND1';

select * from tm_profile;
select * from tm_partnerpreference;

update tm_profile set register_stage='simple' where LoginId='testA';

insert into tm_profile(ProfileId,register_stage,ProfileCategory,CreatedBy,LoginId,Emailid,Gender,Password,ProfileStatus,FirstName,Age,Religion,CastDivision,Subcaste,tm_autoid,tmid_count,visit_id,Adminstatus,DOJ,DOM) values ('BGHND1','simple','Hindi','testA@testa.com','testA','testA@testa.com','M','test','A','testA','23','','','','99','1',1,'B',now(),now());

insert into tm_partnerpreference='third','BGHND1','20','30','UnMarried','','Hindu','Lambani','bhukya','Bachelors - Engineering/ Computers','Salaried','Doesn\'t Matter','Doesn\'t Matter','Select','','','Non-Vegetatrian','blah','Doesn\'t Matter','165cm','177cm','No'