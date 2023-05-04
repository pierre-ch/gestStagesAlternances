CREATE TABLE PROMOTION (
    idPromotion INT AUTO_INCREMENT NOT NULL,
    annee INT(4),
    constraint PK_PROMOTION primary key (idPromotion)
)engine = INNODB;

insert into PROMOTION values(1, 2022);
insert into PROMOTION values(2, 2023);

CREATE TABLE ETUDIANT (
    idEtudiant INT AUTO_INCREMENT,
    nom CHAR(30),
    prenom CHAR(30),
    tel CHAR(20),
    mail CHAR(50),
    idPromotion INT not null,
    constraint PK_ETUDIANT primary key (idEtudiant),
    constraint FK_ETUDIANT_PROMOTION foreign key (idPromotion) references PROMOTION (idPromotion)
)engine=INNODB;

insert into ETUDIANT values(1, "Vide","Vide","0000000000","vide@example.com", 1);
insert into ETUDIANT values(2, "Deacon","Matthieu","0651445327","matthieudeacon18@gmail.com", 2);
insert into ETUDIANT values(3, "Marboeuf","Anais","0785806103","anais.mrb@outlook.fr", 2);
insert into ETUDIANT values(4, "Vozelle","Maxime","0674288778","maxime.vozelle@gmail.com", 2);
insert into ETUDIANT values(5, "Rautureau","Esteban","0769857147","rautureauesteban@gmail.com", 2);
insert into ETUDIANT values(6, "Ropars","Kristen","0761382028","kristen.ropars@gmail.com", 2);
insert into ETUDIANT values(7, "Repel","Clément","0670130740","contact@clement-repel.fr", 2);
insert into ETUDIANT values(8, "Elangui","Kaleb","0699689055","kalebemk@yahoo.com", 2);
insert into ETUDIANT values(9, "Steunou","Yann","","", 2);
insert into ETUDIANT values(10, "Merchadou","Victor","0760930696","victor.merchadou@gmail.com", 2);
insert into ETUDIANT values(11, "Tadil","Taha","0665367567","tahatadil8@gmail.com", 2);
insert into ETUDIANT values(12, "Mouezant","Antoine","0782829098","antoine@mouezant.fr", 2);
insert into ETUDIANT values(13, "Acamer","Guillaume","0778043910","acamer.guillaume@gmail.com", 2);
insert into ETUDIANT values(14, "Sepierre","Marius","0788507695","m.sepierrepro@gmail.com", 2);
insert into ETUDIANT values(15, "Wadoux","Thibaud","0750304647","thibaud.wax@gmail.com", 2);
insert into ETUDIANT values(16, "Hemery","Nathan","0783578958","azerly.hn@gmail.com", 2);
insert into ETUDIANT values(17, "Richoux","Killian","0658559880","kyrito35@gmail.com", 2);
insert into ETUDIANT values(18, "Bouron","Thomas","0641285124","thomasbouron18@gmail.com", 2);
insert into ETUDIANT values(19, "Miguel","Bradley","0638360615","bradley.miguel02@gmail.com", 2);


CREATE TABLE ENTREPRISE (
    idEntreprise INT AUTO_INCREMENT,
    nom CHAR(40),
    adresse CHAR(40),
    cp INT(6),
    ville CHAR(40),
    tel CHAR(20),
    nomcontact CHAR(40),
    fonctioncontact CHAR(40),
    mailcontact CHAR(50),
    telcontact CHAR(20),
    constraint PK_ENTREPRISE primary key (idEntreprise)
)engine=INNODB;

insert into ENTREPRISE values(1, "explore", "1 bd ampère", 44470, "Carquefou", "0251890934", "MROGUET Sylvain", "", "sylvain.roguet@explore.fr", "0251890934");
insert into ENTREPRISE values(2, "Joyeux CSE", "60 Boulevard Maréchal Juin", 44100, "Nantes", "", "LEVRON Josselin", "", " josselin@joyeux-cse.fr", "0645110601");
insert into ENTREPRISE values(3, "scr informatiques", "ZI Bignon", 44110, "Erbray", "0240818949", "Claude", "", "contact@scrinfo.net", "0240818949");
insert into ENTREPRISE values(4, "APPLICAMP", "54 av. Georges Clemenceau", 85500, "Les Herbiers", "", "Nadine PUBERT", "", "nadine.pubert@aimcia.fr", "0688703319");
insert into ENTREPRISE values(5, "selva", "ZI des Dorices", 44330, "Vallet", "0240363246", "Romain MAINDON", "", "romain.maindon@selva.fr", "0240363246");
insert into ENTREPRISE values(6, "motion4ever", "5 bd ampère", 44700, "Carquefou", "0255994453", "regoin jerome", "", "jerome@motion4ever.com", "0255994453");
insert into ENTREPRISE values(7, "web-id", "88 rue saint martin", 14000, "Caen", "", "ELORE J.", "", "bretagne@oxiane.com", "");
insert into ENTREPRISE values(8, "SAMSAM de la sevre", "5 bd Mendes France", 44400, "Rezé", "0649669980", "Samuel DADOUIS", "", "s.dadouis@apajh44.org", "0649669980");
insert into ENTREPRISE values(9, "IDIESE", "1 rue Jean Rouxel", 44700, "Orvault", "", "KPEDIO Yannick", "", "yannick.k@idiese.com", "0622977451");
insert into ENTREPRISE values(10, "SNCF", "CNIT - BP 440", 92053, "Paris La Défense CEDEX", "", "Emmanuel le bris", "", "emmanuel_lebris@connect-tech.sncf", "0750323325");
insert into ENTREPRISE values(11, "OCEANET technologie", "2 Impasse Joséphine Baker", 44800, "Saint-Herblain", "0228037878", "HOPPENOT Benoit", "", "bhoppenot@groupeot.com", "0228037878");
insert into ENTREPRISE values(12, "ECONOCOM", "Chemin du vigneau", 44800, "Saint-Herblain", "0175449655", "gaelle DUCOURET", "", "gaelle.ducouret@econocom.com", "0175449655");
insert into ENTREPRISE values(13, "SL WEB", "28 bd benoni Goullin", 44200, "Nantes", "0634119058", "Sarah LIGEROT", "", "sarah@ligerot.fr", "0634119058");
insert into ENTREPRISE values(14, "DIGITAL USER", "22 rue du tillou", 44550, "Montoir de bretagne", "0633461293", "Alexandre GRIERE", "", "alexandre.griere@digitaluser.com", "0633461293");
insert into ENTREPRISE values(15, "OPERIS", "27 rue jules vernes", 44700, "Orvault CEDEX", "0169100000", "cecile LEVEQUE", "", "cecile.leveque@operis.fr", "169100000");
insert into ENTREPRISE values(16, "sigma informatique", "8 rue newton", 44245, "la chapelle sur erdre", "0240371400", "Cécile SERGENT", "", "epoumord@sigma.fr", "0240371400");
insert into ENTREPRISE values(17, "VA SOLUTIONS", "3 rue du tisserand", 44800, "Saint-Herblain", "0240717121", "PINEL Vincent", "", "christophe@va-solutions.fr", "0240717121");
insert into ENTREPRISE values(18, "ACCENTURE TECHNOLOGIE", "68 BD MARCEL PAUL ", 44800, "Saint-Herblain", "0272343053", "LAURENT hado", "", "laurent.hado@accenture.com", "272343053");


CREATE TABLE CONTACT (
    idEntreprise INT not null,
    idContact INT NOT NULL,
    date DATE not null,
    commentaire TEXT,
    choixtype CHAR(40),
    statut CHAR(40),
    idEtudiant INT not null,
    constraint PK_CONTACT primary key (idEntreprise, idContact),
    constraint FK_CONTACT_ENTREPRISE foreign key (idEntreprise) references ENTREPRISE (idEntreprise),
    constraint FK_CONTACT_ETUDIANT foreign key (idEtudiant) references ETUDIANT (idEtudiant)
)engine = innodb;

insert into CONTACT values (1, 1, "2022-01-01", "blablabla", "stage", "negociation", 1);
insert into CONTACT values (4, 8, "2022-01-08", "blablabla", "alternance", "conclu", 1);
insert into CONTACT values (3, 6, "2022-02-20", "blablabla", "alternance", "conclu", 1);
insert into CONTACT values (7, 2, "2022-02-21", "blablabla", "stage", "negatif", 1);
insert into CONTACT values (10, 7, "2022-04-02", "blablabla", "alternance", "negociation", 1);

CREATE TABLE APPRENDRE (
    idEtudiant INT,
    idEntreprise INT,
	dateContrat date not null,
    constraint PK_APPRENDRE primary key (idEtudiant, idEntreprise,dateContrat)
);

CREATE TABLE ECOLE (
    idEcole INT AUTO_INCREMENT,
    libelle char(40),
    academie char(40),
    constraint PK_ECOLE primary key (idEcole)
);

insert into ECOLE values (1, "admin", "21232f297a57a5a743894a0e4a801fc3");