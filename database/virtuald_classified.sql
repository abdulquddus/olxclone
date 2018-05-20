-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 02:51 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtuald_classified`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(112) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(112) NOT NULL,
  `sms_verify` int(11) NOT NULL,
  `state` int(112) NOT NULL,
  `status` smallint(6) DEFAULT '10',
  `role` smallint(11) NOT NULL,
  `is_company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `mobile`, `sms_verify`, `state`, `status`, `role`, `is_company`, `created_at`, `updated_at`) VALUES
(1, 'pm@webexdesigners.com', '', 'gBH_Zf8YMObcD2MlGxm82qJFYGhtYcr9', '$2y$13$rH4EwEmf..t6D/7D0gZWm.Y7LB6YawxCjHKey8sFKccp4.DjeBmXy', 'hp9hthVPzJqtrkdaGWn3Ul3b8IlspMds_1443942536', 'pm@webexdesigners.com', '', 0, 0, 10, 30, 0, '2015-09-05 23:53:02', '0000-00-00 00:00:00'),
(50, 'webex', '', 'p6MRm4cx3HjxQh7MIp1pcS6Gplqo8g3c', '$2y$13$T/3lZb2XRqCcLEYGvNktD.7KwwkCJlHIrnHh3idOCbDpWpK9g8.wS', NULL, 'imranaashique@gmail.com', '', 0, 0, 10, 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'jawad', '', 'XkqyDJZlFLDA_QrwO4IhT83Dk5LC2Dob', '$2y$13$ufveGBJpaL/P6Ila5v8.RuS5QYDaIY66.lQr5n2QKvKFymd6qYKz.', NULL, 'jawad@test.com', '', 0, 0, 10, 20, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'shavez@webexdesigner.com', '', 'TCf7i0WT5J61qOX_0wPxHJoHBaf_qPZ3', '$2y$13$/KhwuIjuwkxc3hEuzYQ7F.64UBEFS2WVkbsXjfwBHmqomhyvTPxqi', NULL, 'shavez@webexdesigner.com', '', 0, 0, 10, 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ads_credit`
--

CREATE TABLE IF NOT EXISTS `ads_credit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit` int(100) NOT NULL,
  `created` date NOT NULL,
  `status` enum('Active','De-active') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_credit`
--

INSERT INTO `ads_credit` (`id`, `user_id`, `credit`, `created`, `status`) VALUES
(42, 0, 12, '0000-00-00', 'Active'),
(43, 42, 12, '0000-00-00', 'Active'),
(44, 42, 12, '0000-00-00', 'Active'),
(45, 42, 12, '2015-12-29', 'Active'),
(46, 42, 100, '2015-12-29', 'Active'),
(47, 48, 123, '2015-12-30', 'Active'),
(48, 48, 111, '2015-12-30', 'Active'),
(49, 48, 111, '2015-12-30', 'Active'),
(50, 62, 10, '2016-04-02', 'Active'),
(51, 62, 10, '2016-04-02', 'Active'),
(52, 62, 10, '2016-04-02', 'Active'),
(53, 62, 10, '2016-04-02', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `advertise_title` varchar(120) NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `condition` varchar(12) NOT NULL,
  `type` int(11) NOT NULL,
  `contact_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `address` text NOT NULL,
  `po_id` int(11) NOT NULL,
  `v_code` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `ad_status` int(11) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL,
  `sold_status` int(11) DEFAULT '0',
  `com_url` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `user_id`, `category_id`, `advertise_title`, `photo_name`, `description`, `price`, `condition`, `type`, `contact_name`, `email`, `mobile_number`, `state_id`, `city_id`, `address`, `po_id`, `v_code`, `status`, `created_date`, `ad_status`, `views`, `sold_status`, `com_url`, `link`) VALUES
(3, 64, 80, 'Daelim S-FIVE', '', 'Selger min trofaste scooter, har kun brukt den til og fra jobb i sommerhalvåret. Starter og går som ei kule, men kunne sikkert trengt en overhaling. Mangler speil på venstre side( har speilet) Ta kontakt om du har noen spørsmål.', 3000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'New Norway', 0, 1, 1, '2016-11-29 07:06:18', 1, 28, 0, '', ''),
(2, 64, 80, 'Piaggio Typhoon 502T', '', 'Med scooter drevet ikke mye, brukes på ansvarlig, ikke fallet. Legge en hjelm. Er det noen få riper.', 10000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 11223355, 7, 142, 'New Norway ', 0, 1, 1, '2016-11-29 06:46:16', 1, 25, 0, '', ''),
(4, 64, 80, 'Rieju MRT 50 Racing', '', 'Kjempe flott Rieju moped den er fint kjørt.\r\nDet har aldri våre problem med mopeden.\r\nDen er helt original,og ikke blitt skrudd i. Ble registrert første gang den 03.12.2015 Har garanti til mars i 2017.\r\nVi velger og selge denne flotte mopeden da gutten vår ikke er interessert i og kjøre lengre. Bør ses.', 3000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'New Norway', 0, 1, 1, '2016-11-29 07:11:42', 1, 29, 0, '', ''),
(6, 64, 80, 'Yamaha Tzr', '', 'Yamaha tzr 50 2009 modell selges.\r\nMopeden er pålitelig og starter som oftest med en gang. Yamaha bruker de slitesterke minarelli am6 motorene, som er lette å få deler til.\r\nAlle orginaldeler står på mopeden uten om eksosanlegg. Eksosen er et LeoVince v6 effektanlegg, uten plumbering. Så mopeden går over 45 og er ikke lovelig å kjøre på veien før det skaffes ny eksos eller plumberig.\r\nSkilt står på og alle parpir er i orden, så det er bare til å kjøre. Jeg tar ikke annsvar hvis mopeden blir tatt for trim av ny eier.\r\nKåpene har vert knekt og har en del riper. Kåpene ble fikset med stifter som blir sveiset fast for å holde kåpene sammen, så er det lagt lim over. Dette resulterer i en reprasjon med god styrke. Ripene sees bare på nært hold.\r\nMopeden har akkuratt fått ny orginalforgasser og nytt stempel. Varmeholker kan følge med om ønskelig.\r\n\r\nDet kan følge med et trimsett for et lite pristilegg, trimsettet består av TopPerformance Trophy 70cc sylinder, DellOrto Black Edition PHBG21 DS forgasser, innsug og Div drev.', 12900, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'new norway', 0, 1, 1, '2016-11-29 07:57:19', 1, 26, 0, '', ''),
(7, 64, 80, 'Dirtbike 125cc AGB-37 CRF', '', 'Nå som midsize med 12" bakhjul och 14" forhjul.\r\nDette er modellen mange har ventet på. Bygd og utviklet av en av de største leverandørene av Dirtbikes i Europa. Dette er 2015-modellen med LIFAN 125cc luftavkjølt motor.\r\nDet er nå du ligger i vinnersporet! Justerbare dempere bak. 12"/14" dekk. Solid monosving med avtakbar bakdel. Ordentlig proforgasser som sitter på de dyrere modellene. Den bare venter på å bli levert på døren til deg. Denne maskinen vil ikke stå stille. Bigboore eksosanlegg som holder klassen i konkurranse, 1170 mm akselavstand gjør at den er godkjent till konkurranse i Skandinavien.\r\nIkke glem å kjøpe med hjelm og olje!\r\n\r\n\r\nMotor:125cc, 4-takt, 1 sylinder, luftavkjølt\r\nSylinder:54mm x 54mm\r\nForgasser:26mm\r\nEffekt:8,5kw(11,56hk) / 9500 rpm\r\nStartanordning:Kick\r\nGirkasse:Manuell, 4-trinns, (01234)\r\nDrift:Kedje KMC 428\r\nRamme:High strength Stålramme med deler av polert aluminium (6061)\r\nDemping foran:Orion X-gaffel med kraftige fjærben\r\nDemping bak:Kraftig justerbar\r\nBremser foran:Hydraulisk skivebroms,\r\nBremser bak:Hydraulisk skivebroms,\r\nTankvolum:3 L\r\nOljevolum:1.1 L\r\nHjuldimensjon:12" bak, 14" foran\r\nAkselavstand:1170 mm\r\nStørrelse:165x75x91 cm\r\nSittehøyde:82cm\r\nUtveksling:\r\nVekt:67kg\r\nTenning:CDI\r\nTennplugg:NGK', 7495, 'new', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'c-134', 0, 1, 1, '2016-11-29 08:14:02', 1, 24, 0, '', ''),
(8, 64, 80, 'Sachs ESTATE', '', 'Har stått uten skilt siden 2013. Skilter er bare å hente på statens vegvesen for kr 70. Ingen heftelser eller skyldige avgifter.\r\nNy pris 11500kr, på RX sport Landås. Skal være greit å få tak i deler. Den har vert lagret inne siste årene.\r\nKan gå ned i pris ved hurtig avgjørelse.', 5700, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'c-1345', 0, 1, 1, '2016-11-29 08:26:15', 1, 34, 0, '', ''),
(9, 64, 80, 'Yamaha TZR', '', 'Som ny, ingen skader, hel og pen moped. Byttet drev og potte. Originaldeler følger med.', 25000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'c-134', 0, 1, 1, '2016-11-29 08:32:29', 1, 25, 0, '', ''),
(11, 64, 80, 'Honda Dax ST50', '', 'Original Honda Dax selges.\r\nSykkelen er noe ombygd med annet sete + styre, men kan lett settes tilbake til orginal stand. Dax''en er opprinnelig blå metallic og etter hva jeg veit solgt ny i Drammen 1971.\r\nSitter nå en 150cc lifan motor montert, original motor følger med.\r\nRing gjerne etter kl 17:00', 22000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'C-134', 0, 1, 1, '2016-11-29 21:55:04', 1, 27, 0, '', ''),
(12, 64, 80, 'Sachs Madass 50CC', '', 'Produkt info:\r\nMotor: Honda 4 takt luft kjølt\r\nStart: El,\r\nBatteri: 12V 7Ah.\r\nGir: automat gir\r\nMax ytelse: 2KW/3,2Hk 7000 omdr.\r\nHastighet: 45km/h\r\nBremser: Skive/SKIVE\r\nVekt: 85 kg\r\nMakslast: 235kg\r\nTankkapasitet: 6 liter\r\nDrivstoff: 95 Blyfri\r\nForbruk:\r\nDreiemoment:  3,2N.m/4300 Omdr.\r\nLxBxH: 1840x760x1035\r\nMopeden leveres i kasse , styre må monteres.\r\n\r\nFor mer informasjon om objektet og budgivning besøk vår nettside Auksjonen.no\r\n\r\nObjektet selges på nettauksjon på siden \r\nww.auksjonen.no, for direkte link til objektet trykk på linken som står under "send melding" Gå til auksjonen.', 7000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'C-132', 0, 1, 1, '2016-11-29 22:03:25', 1, 26, 0, '', ''),
(13, 64, 80, 'Suzuki Rmx/smx', '', 'Vurderer da og selge mopen da den allderig blir brukt. Den er nyoppussa helt fra bånn! Ramme lakert i orginal mercedes farge. Kåper lakert vinrøde! Motor har vært totalt kløyvd i biter for og sette den sammen igjen men bytte ut alle deler som ikke var helt 100% perfekt! Så motoren er klin strøken! Og står på trim! Følger også med nye syller med stempler og topper pluss 3 delemotorer pluss delemoped pluss masse felger og dekk pluss noen forgassere osv osv osv! Mopeden er som ny da alt er gjort så vanvittig nøye! Dette er som bare må prøves og ikke bare leses!', 17000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'C-134', 0, 1, 1, '2016-11-29 23:04:15', 1, 27, 0, '', ''),
(14, 72, 97, 'Ford S-MAX', '', 'TITANIUM UTGAVE. 140 HK\r\nBLUETOOTH,AUX,USB\r\nSTEMMESTYRT HANDSFREE\r\nBRA PIGGDEKK.\r\nSISTE SERVICE PÅ 101"KM.\r\nEU.GODKJENT UT MAI 2018.\r\nSKIBOKS KAN FØLGE MED.\r\nHELT PROBLEMFRI BIL I VÅRT EIE!', 228588, 'used', 2, 'Per Arne Oppegaard', 'jhellmill@gmail.com', 2147483647, 14, 349, '7600 Levanger', 0, 4999, 1, '2016-11-29 23:28:46', 1, 26, 0, '', ''),
(15, 72, 97, 'Opel Combo', '', 'Kjekk varebil med nytt reg reim sett og nylig eu godkjent.', 16020, 'used', 2, 'Kåre Skeie', 'jhellmill@gmail.com', 2147483647, 6, 102, '4250 Kopervik', 0, 4994, 1, '2016-11-29 23:38:44', 1, 25, 0, '', ''),
(16, 72, 97, 'Audi A6', '', 'Nydelig kombinasjon av Mingblau metallic og Fine Nappa lys beige skinninteriør. \r\n\r\nBilen fremstår som meget strøken og godt velholdt. Gjennom tiden er den også påkostet betydelige beløp. En perfekt sommer-og vinterbil med V6-motor, automatkasse og firehjulsdrift!\r\n\r\nEU-Godkjent helt frem til Mai 2018.\r\nServicehistorikk fra merkeverksted.\r\n\r\nEkstra utstyr som er verdt å legge merke til: \r\n- S-line \r\n- Sportsunderstell \r\n- Lys beige skinninteriør \r\n- Sportsseter og sportsratt \r\n- Setevarmer foran og bak\r\n- Rattvarmer\r\n- Bluetooth/Handsfree opplegg\r\n- Musikkanlegg (kan følges med) \r\n\r\nGode sommer-og vinterhjul.\r\n\r\nFor mer informasjon ring 988 19 087.\r\n\r\nForbehold om feil i annonsen.', 44538, 'used', 2, 'M.A ', 'jhellmill@gmail.com', 2147483647, 9, 217, 'Jordstjerneveien 25, 1283 Oslo', 0, 6333, 1, '2016-11-29 23:47:04', 1, 25, 0, '', ''),
(17, 72, 97, 'Skoda Octavia Scout', '', 'Perfekt vinterbil til salgs. Vi har kjøpt oss en litt mindre pendler bil og en mye større reise bil. Det blir for mye å ha tre biler for to sjåfører. Så vi har bestemt oss å selge Skodaen som har tatt oss trygt og uten problemer rundt hele Europa i vårt eie. \r\n\r\nDenne tar deg trygt fram på såpeglatte Tromsø-veger. Med firehjulstrekk, 140 dieselgjerrige hester, Nokian dekk, ESP og ABS er denne ustoppelig på all slags føre. \r\n\r\nBilen har komplett servisbok, og alle servisene var tatt hos Sulland i Tromsø. Siste i sommer.\r\n\r\nDen bruker fantastiske 0,49l diesel per mil på langkjøring.\r\n\r\nDette er en direktør bil med spesielle ekstrapolstrede og behagelige seter i svart skinn (disse finnes bare i de dyreste golfene). Dvd spiller fra Alpine kan man bruke til å se på filmene når man venter på kolonne. Vil du høre på musikken fra mobilen? Er det bare å koble den på.\r\n\r\nDenne har absolutt alt man trenger. Se utstyrslista lengre ned. Med full DEFA pakke (motor og kupe varmer med fjernkontroll) er det bare å starte bilen og dra av gårde uten å fryse og skrape. Dessuten holder motoren lengre om den slipper kaldstartene. Cruisekontroll hjelper til å ikke bli stiv i kroppen når man kjører over vidda (eller bare til Nordkjosbotn). Tosoners klima gir deg friheten å bestemme om du vil ha det varmere eller kladere enn pasasjeren.\r\n\r\nSkal du ha med henger eller campingvogn? Ingen problem. Vi kjørete gjennom Finnland siste vinter med en fin Cabby på slepp. Det blåste og det var storm, men vi merket ikke noe til at vi hade vogna bak oss. På den samme turen var vi også i Tsjekkia. Bilen hadde ingen problemer å holde 120 km/t med den fine og stabile vogna. Og ja, det er tillatt å kjøre så fort med vogna der!\r\n\r\nUtstyr:\r\n- firehjulstrekk (denne kan sammenlignes med Subaru sin)\r\n- cruisekontroll\r\n- bakkeholder\r\n- tosoners automatisk klima\r\n- full DEFA pakke med fjernkontroll (motor og kupe varmer), kan programeres\r\n- Alpine DVD/CD spiller (her kan du se på film mens du venter)\r\n- ekstra komfortable skinn seter med justerbar varme\r\n- mørke ruter\r\n- gitter mellom bagasjerommet og resten av bilen (kan tas ut i løpet av 2 sekunder) / denne kan redde liv ved kollisjon\r\n- både gumi og stoff matter (ubrukte) til hele bilen.\r\n- gode sommer og vinter dekk (med pigg)\r\n- 12v uttak i bagasjerommet\r\n- avtakbart hengerfeste\r\n\r\nSkambud blir ikke besvart, men fornuftige bud blir vurdert.\r\n\r\nBilen selges som forevist og det tas forbehold om feil i annonsen.', 118888, 'used', 2, 'Mikal', 'jhellmill@gmail.com', 2147483647, 9, 217, '9011 Tromsø', 0, 5636, 1, '2016-11-29 23:52:12', 1, 30, 0, '', ''),
(18, 72, 97, 'Audi S6', '', 'Her har du en original Audi s6 2.2turbo med 6 trins MANUELL!!\r\nBilen går som den skal uten ulyder og fusking\r\nden er chippet og har oppgradert coilsystem,\r\nden er fin i giringen og clutchen er som den skal.\r\nIkke noe lekkasje og bruker ikke vann eller olje,bremser bak må byttes pga over 25% rust.\r\nMå fikse litt diverse lys pga noen pærer har gått og noe er led.\r\nBilen ser grei ut, men er litt rust nederst på dører og i skjermer foran.\r\n2 stk nye skjermer og lakkering fra listen og ned på dørene så blir denne veldig fin. \r\n\r\nSelger rett og slett fordi jeg vil ikke la den stå uten om å bli gjort noe med, da denne er et bra utgangspunkt for å få en grom s6.\r\nHar hatt noen av disse bilene og det er den fineste jeg har hatt med tanke på motorrom og innvendig, så her må det bare fikses litt kosmetisk.\r\nHatt samme eier i 10 år nå og ble byttet ventil løftere for 500km siden. stått i garasje i 2 år nå.\r\nFelgene på første bildet følger ikke med!!\r\n\r\n\r\nObs lite hull i tank lett å fikse. Selges ferdig prutet til 35000!\r\n\r\nDenne er kjørbar og det kan hentes prøveskilter for og få kjørt den hjem ! Trenger ikke tilhenger!!', 36500, 'used', 2, 'Leon Lekaj ', 'jhellmill@gmail.com', 2147483647, 10, 241, 'Nordtvetveien 9a, 0952 Oslo', 0, 9899, 1, '2016-11-29 23:57:17', 1, 25, 0, '', ''),
(19, 64, 99, 'Hobby 720 UFKe', '', 'Vi selger vårt lille "vinterparadis" midt i Sirdalens "indrefilet"\r\n\r\nUngene har blitt større og bruken av campingvogna våres i Sirdalen har blitt mindre, derfor har vi nå besluttet å legge den ut for salg, dog med litt vedmod.\r\n\r\nI tillegg til ei tipp topp campingvogn, med 3 x 5 meter Isocamp, samt 1 x 1 meter skibod, så kan vi også garantere perfekt beliggenhet på Haugen Camping i Sirdal, med fantastiske langrennsløyper rett utenfor terrassen.\r\nHer er det bare å stikke nesen ut døra og vips er man midt i løypene.\r\n\r\nCampingvognen ligger på fast plass, og har aldri blitt flyttet siden den var ny i 2010. Isocampen kjøpte vi ny i 2008.\r\n\r\nLeien for vintersesongen 2016/17 er betalt. ', 390000, 'used', 2, 'Abdul Quddus', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'c-134', 0, 1, 1, '2016-11-30 00:01:56', 1, 33, 0, '', ''),
(20, 72, 97, 'Mercedes-Benz Sprinter', '', 'Selger min Mercedes-Benz Sprinter 313 CDI kjølebil 2003. Kjølerom isolert med Kerstner og forsterkede bakdempere for økt belastningsevne av vekt. Digital styring termostat fremme i dashboardet for kjølerom. Bilen er i bruk og fungerer fint. \r\n\r\nBilen har blitt brukt av tidligere eier til å selge fisk. Også blitt brukt til varetransport. Kan gjerne byttes i annen varebil da kjølerom ikke er nødvendig for mitt bruk lengre.\r\n\r\nPris kan diskuteres! Bilen kan vises der den står i Malm. Eller kan etter avtale møtes på Steinkjer, Verdal, Levanger eller omkringliggende.', 50000, 'used', 2, 'Steffen Lind ', 'jhellmill@gmail.com', 2147483647, 9, 217, '7790 Malm', 0, 2866, 1, '2016-11-30 00:02:02', 1, 25, 1, '', ''),
(21, 72, 97, 'Ford', '', 'Flott A ford som vekker stor oppsikt i god stand \r\n\r\nBilen ble solgt ny i Norge var restaurert for 30 år siden, men har ikke vært i bruk siste 10 årene kun startet. Før dette var det kun korte koseturer på utstillinger og søndagturer, har derfor holdt seg godt, men ble alikevel nettopp restaurert igjenn, med ny lakk nye speil, nye hjulbolter og hjulkapsler og speil i krom og kuffertholder bak.Bilen fremstår som rustfri i karosseri og understell som nettopp ble tectylert. Den er nettopp bygd om til elektronisk tenning for at den skal være forutsigbar på langturer, mere økonomisk bedre utnyttelse av motorkreftene. El tenning er ikke synlig og for og etter tennings justering på rattet er beholdt som orginalt. Bilen har en smakfull fargekombinasjon av dyp blå med ett lite fiolett skjær mot sorte skjermer og topp samt gull farget felger og gull stripe i farge overgangen. Bilen er lakket og vannslipt samt klarlakket 3-4 lag og vannslipt igjenn deretter rubbet og polert for glatt resultat !\r\n\r\nMotor fungerer helt fint og drar overaskende godt for å være 40 hester motoren er på hele 3,3 liter.\r\nClutch og bremser er optimalt, mener at begge deler er byttet tidliger og overhalt motor og gir deretter svært lite brukt.\r\nAll krom er i flott stand ! Taket ble byttet tved forrige restaurering samt montert inn ekstra stålplate under venylbelegget og alt treverk i dørk er byttet\r\nNytt reservehjul beskyttelse.\r\nny startmotor er nettopp montert samt nytt batteri. \r\n\r\nBilen har væert brukt til brudebil fremsetene foldes frem slik at en lett kommer inn i baksetet. følger med rundt Nygift skilt som er laget for å settes på reservehjulet bak.\r\n\r\nFølger med ordentlig detaljert verstedsmanual og instruksbok.\r\nDet kan følge med helt nytt rep sett til styresnekka med nye lager tannhjul etc om en ønsker 0 slark og lettere styring, skal være enkelt å bytte.\r\n\r\nGratis omregistrering ingen krav til EU kontroll 200 i forsikring.\r\nSelges for 190 000 eller bud over !\r\n\r\nForden står i Ålesund Mob 97173094', 190000, 'used', 2, 'Per Arne Oppegaard', 'jhellmill@gmail.com', 2147483647, 2, 23, 'c-134', 0, 3068, 1, '2016-11-30 00:16:55', 0, 0, 1, '', ''),
(22, 61, 82, 'Suzuki SV 1000 S mc til salg i oslo', '', 'Suzuki SV 1000 S', 300, 'used', 2, 'shahvez', 'yarsas@hotmail.com', 47177477, 1, 18, 'Granbergstubben 19', 0, 1, 1, '2016-12-01 09:43:53', 1, 24, 0, '', ''),
(23, 61, 99, 'KABE ROYAL 740 E TDL E9 camping van', '', 'KJØPS PRIS KR. 623 000.-\r\nPRIVATLEASING KR. 4899.- PR MND X 48 MND\r\nKONTANT KR. 62 300.- / REST ETTER 48 MND KR. 342 650.-\r\nAlde 3020\r\nVannbåren Gulv varme m. AGS 11 Pro\r\nKomfyr Gass  med 4 bluss\r\nEdmonton Putestof\r\nATC - Antiskrenssystem\r\nBlanke / slette  plater\r\nSki luke + lasteluke\r\nStort kjøleskap m. frys\r\nBelysning gasskasse + skiluke\r\nSentral støvsuger\r\nSE ALT AV STANDARDUTSTYR I KATALOG\r\nBestilt med følgende Ekstra utstyr\r\nKr.   3890.- Mørke Vinduer + Dør\r\nKr. 11 500.- Speilvendt Bad\r\nKr.   4170.- City vanntilkobling\r\nKr.   1972.- Avtrekksvifte Dusj\r\nKr.   3142.- Lyse kjøkkenskap\r\nKr.   4142.- Mikro i overskap\r\nKr.   1292.- 70Liter vanntanke', 498, 'new', 2, 'shahvez', 'yarsas@hotmail.com', 47177477, 1, 18, 'Granbergstubben 19', 0, 1, 1, '2016-12-01 10:26:09', 1, 29, 0, '', ''),
(24, 61, 97, 'Ford Focus 1,6  Titanium Styling 2010, 64000', '', 'Toppmodell av Ford Focus selges. Dette er en Titaniumversjon med Fords orginale utvendige styling. Bilen har hatt en voksen tidligere eier. Focus er en romslig og driftssikker bil. Bilen har den velprøvde dieselmotoren på 90 HK.\r\n\r\nAv flott utstyr på denne bilen finner du :\r\n\r\n-Delskinnseter\r\n-Oppvarmet frontrute\r\n-Xenonlys\r\n-Fords orginale styling\r\n-Fabrikkmontert handsfree\r\n-Tilhengerfeste\r\nmm.\r\n\r\nVår påstand er at denne bilen har en av markedets mest drivstoffgjerrige motorer. Norsk landeveiskjøring kjøres på ca 0,4 pr mil.', 120000, 'used', 2, 'shahvez', 'yarsas@hotmail.com', 47177477, 1, 18, 'Granbergstubben 19', 0, 1, 1, '2016-12-01 10:41:24', 1, 31, 0, '', ''),
(25, 72, 97, 'Volvo V40 Cross Country', '', '2013 Volvo V40 Cross Country (XC) D2 Summum med alt utstyr!\r\n\r\nEn av Norges best utstyrte V40 Cross Country står klar for levering hos oss! \r\n\r\n\r\nBilen er solgt ny hos Volvo i Norge i 2013, følgelig med full 5 år / 100.000 km nybilgaranti fra Volvo. Kun 1 tidligere eier som har passet bilen meget godt. Alle servicer er fulgt hos Bilia siden ny, sist sommeren 2016.\r\n\r\nKomplett historikk, aldri hatt skader. Fremstår som strøken både innvendig og utvendig. Selvfølgelig røykfritt interiør\r\n\r\nLeveres som en Motornova PLUSS bruktbil:\r\n\r\n- Bil solgt ny av Volvo Norge (Bilia)\r\n- Garantert fri for skader\r\n- Garantert historikk\r\n- Garantert KM-stand\r\n- 5 år / 100.000 km fabrikkgaranti (Volvo)\r\n- Gunstige finansiering og forsikringsløsninger\r\n- Fri levering på Oslo lufthavn Gardermoen\r\n- Mulighet for levering på hjemmeadresse\r\n\r\nFra den meget komplette utstyrslisten bør følgende trekkes spesielt frem:\r\n\r\n- Summum utstyr og designlinje \r\n- VOC Volvo OnCall system (Fjernstyring av Webasto, sporing, og andre funksjoner via APP på telefon)\r\n- Webasto dieselvarmer med timer og OnCall styring\r\n- Avtagbart hengerfeste\r\n- Keyless entry / start \r\n- Driver Support pakke\r\n- Driver Alert system \r\n- BLIS (Blindsone varsling)\r\n- ACC Adaptiv Cruise m/autobrems og fotgjengervarsling (Holder avstand til forankjørende)\r\n- Filskiftevarsler (lane departure warning)\r\n- City Safety pakke\r\n- Plusspakke VOC V40\r\n- Teknikkpakke High perf.\r\n- Aktive Bi-Xenon hovedlys (Adaptive, følger vegbanen)\r\n- Fjernlysautomatikk (Automatiske fjernlys) \r\n- Varmeseter foran\r\n- Varmeseter bak\r\n- Trafikkskilt gjenkjenning/visning \r\n- Digital instrumentpanel med 3 valg\r\n- High Performance Soundsystem (meget god lyd)\r\n- DAB + Digital radio\r\n- RTI Navigasjonssystem med 7" skjerm\r\n- Bluetooth telefon handsfree \r\n- Bluetooth overføring av musikk etc.\r\n- AUX / USB interface\r\n- CD / DVD Spiller\r\n- Parkeringssensorer foran og bak\r\n- Ryggekamera\r\n- 2 sone klimaanlegg\r\n- Helskinn interiør m/kontrastsøm \r\n- Elektrisk regulering av førersete med memory\r\n- Lyspakke\r\n- Originalt alarmsystem\r\n- Alupaneler\r\n- Aut avblendbare speil\r\n- El innfellbare speil\r\n- Kompass i innvendig speil\r\n- ISOFIX barnesetefester\r\n- Girspak med lys\r\n- 18" Volvo Mefitis alufelger på sommerdekk\r\n- 17" Volvo XC40 Larenta alufelger på vinterdekk\r\n\r\n\r\nMed forbehold om feil i annonse\r\n\r\n\r\nVelkommen til vår bilutstilling i Nedre holmen veg 1 i Hunndalen (Gjøvik)!\r\n\r\nVåre åpningstider er:\r\n\r\nMandag-Fredag: 10:00-17:00 (Visning utenom tidene kan selvfølgelig avtales! )\r\nLørdag: Etter avtale\r\n\r\n\r\nTa kontakt med salgsavdelingen, også på kveldstid og helg for en hyggelig bilprat!\r\n\r\n\r\nInnbytte vurderes og inntil 100% finans formidles!\r\n\r\nMotorNova er medlem av Norges Bilbransjeforbund og spesialiserer seg på import og formidling av nye og nyere biler. Vi har et stort kontaktnett av merkeforhandlere i Tyskland som vi henter våre biler hos. Alle våre import biler har selvfølgelig full garantert historikk og leveres med KM-stand garanti! Alle våre biler leveres med full gjennomgang. Feilfri tilstandsrapport er en selvfølge hos oss!\r\n\r\nFør kjøp av bilene har vi en uavhengig samarbeidspartner i Tyskland, som går over alle biler og verifiserer historikk. På denne måten sikrer vi topp kvalitet i alle ledd.\r\n\r\nTrygt for oss, trygt for deg!\r\n\r\nRapporter annonse', 269000, 'used', 2, 'MotorNova', 'jhellmill@gmail.com', 90133990, 2, 23, 'NEDRE HOLMEN VEG 1 A, 2827 Hunndalen', 0, 8447, 0, '2016-12-02 04:08:38', 1, 24, 0, '', ''),
(26, 72, 97, 'Volkswagen Caddy Maxi', '', 'Caddy Maxi 2.0TDI 110hk 4-Motion selges. Bilen er utstyrt med Fjernstyrt webasto, skyvedører begge sider, Ryggesensor bak, kjørecomputer, hengerfeste, innredning++\r\n\r\nFlere Caddy Maxi på lager. \r\n\r\n\r\n*1 eiers bil kjøpt ny i Norge\r\n\r\n*Restererende nybilgaranti 5år/100 000km. \r\n\r\nUtstyr:\r\n- AC\r\n- El-vinduer\r\n- El-speil\r\n- Fjernstyrt webasto\r\n- Kjørecomputer\r\n- Ryggesensor \r\n- Skyvedører begge sider\r\n- Hengerfeste\r\n- Takstativer\r\n- Alufelger på vinterhjul\r\n++\r\n\r\nInnbytte vurderes\r\n\r\nFinansiering ordnes gjennom Santander\r\n\r\nTa kontakt for mer info:\r\nMail: thomas@baekkenbil.no\r\nTlf: 99108192\r\n\r\nMed forehold om feil i annonsen.', 178000, 'used', 2, 'Thomas', 'jhellmill@gmail.com', 99108192, 6, 120, 'FJORDLINNA 919, 2750 Gran', 0, 2422, 0, '2016-12-02 04:12:52', 1, 20, 0, '', ''),
(27, 72, 97, 'Honda CR-V', '', 'Velkommen til Prøven Bil.\r\n\r\nVi har mange fine brukte og nye biler på lager.\r\nKom innom så kan vi hjelpe deg med din nye bil. Vi kan være behjelpelig med gunstig forsikring og finansiering.\r\n\r\nRing oss gjerne på 73804260\r\n\r\nPrøven Bil 75 år på trønderske veier!', 169000, 'used', 2, 'Prøven Bil AS Trondheim', 'jhellmill@gmail.com', 73804260, 8, 173, 'Østre Rosten 8, 7075 Tiller', 0, 2031, 0, '2016-12-02 04:17:07', 1, 24, 0, '', ''),
(28, 72, 97, 'Fiat Punto', '', 'Pen og god bil med ny service , byttet bl.a clutch.\r\nEu-godkjent, Webasto varmer, gode sommer og vinterhjul.\r\n\r\nVi tilbyr gunstig finansiering og forsikring.\r\n100% finans er mulig.\r\nVi ta innbytte, alt av intr.\r\n\r\nRing Ulf\r\nTlf 90245499\r\n0800-2200.\r\n\r\nMed forbehold om feil.', 59900, 'used', 2, 'Ulf', 'jhellmill@gmail.com', 90245499, 4, 59, 'Elveveien 10, 3262 Larvik', 0, 4188, 0, '2016-12-02 04:20:47', 1, 24, 0, '', ''),
(29, 72, 97, 'Volvo V60', '', 'Meget godt utstyrt Volvo V60, med Volvo OnCall m/ sporing, nødanropsfunksjon etc. Bilen har også skinninteriør, navi, ryggekamera, avtagbart hengerfeste +++. Med andre ord en godt utstyrt bil! Bilen kommer også med en utrolig fin og drivstoffgjerrig dieselmotor. Med denne kommer du under 0,4 liter på mila på langkjøring. I tillegg får du selvsagt Volvos uovertrufne komfort. Med denne bilen kommer du til å kose deg på tur! \r\n\r\nØnsker du nærmere informasjon, ta kontakt med\r\nRashid Elatyaoui\r\nMobil: 90 01 43 45\r\nEpost: re@bnh.no\r\n\r\nMed vår avtalepartner på finans kan du velge å legge i kontantandel eller om du ønsker å finansiere helebeløpet 100%. Spør oss, så gir vi deg et godt finanstilbud. Vi tilbyr finans opp til 10 år.\r\n\r\nVelkommen til Birger N. Haug AS, Norges største Nissan- og Subaruforhandler!\r\n\r\n-Vi tar selvfølgelig din bil i innbytte!\r\n\r\nGaranti\r\nI vårt topp moderne verksted er du garantert at din bil blir godt ivaretatt av engasjerte og dedikerte medarbeidere med høyt kunnskapsnivå og lang erfaring. \r\n\r\nFinans\r\nHar du innbyttebil - tar vi gjerne din i bytte!\r\nVed behov for finansiering av endten hele eller deler av kjøpesummen er vi behjelpelige med dette. Vi har et nært sammarbeid med Nordea og Santander noe som sikrer en trygg og sikker kjøpsprosess. \r\n\r\nForsikring\r\nVi er behjelpelige med forsikring for din nye bil, uansett hvilke selskap du ønsker å flytte til. \r\n\r\nRegistrering\r\nSom godkjent Autoreg forhandler av Statens Vegvesen ordner vi registreringen selv og dermed levere bil på minutter.\r\n\r\n- Rimelig Nissan og Subaru forsikring\r\n- Gunstig forsikring også på andre merker enn våre egne\r\n- Gunstig finansiering\r\n- Alle biler er garantert fri for heftelser\r\n- Komplett bilanlegg med verksted, delelager,skade og salgavdeling\r\n\r\nBirger N Haug AS er Norges ledende Nissan og Subaru forhandler. \r\nVi har 60 års erfaring innen bilsalg, og alle biler levers med tilstandsrapport og 5 års reklamasjonsrett.\r\n\r\n\r\nDet tas forbehold om feil i annonse!', 309000, 'used', 2, 'Rashid Elatyaoui', 'jhellmill@gmail.com', 90014345, 3, 38, 'Haraldrudveien 9, 0581 Oslo', 0, 3633, 0, '2016-12-02 04:35:14', 1, 25, 0, '', ''),
(30, 72, 97, 'Nissan Leaf', '', 'Her må du være rask! Ta kontakt i dag! \r\nBilen kommer med helt nye piggfrie vinterdekk og fremstår som meget pen. Det følger selvsagt med full servicehistorikk og fortsatt full nybilgaranti helt frem til 31.03.2019/ 100.000km!!\r\n\r\nBilen er leveringsklar! \r\n\r\nGjør et trygt og godt kjøp hos landets største Nissan forhandler! \r\n\r\nAv utstyr du får på denne bilen kan blant annet følgende nevnes;\r\n- Navigasjon\r\n- Carwings/ Nissan Connect app\r\n- Setevarmer foran og bak\r\n- Oppvarmet ratt\r\n- Lyktespylere\r\n- Ryggekamera\r\n- USB/ AUX koblinger\r\n- Bluetooth telefonoppkobling\r\n- Isofix i baksetene m.m\r\n\r\nØnsker du nærmere informasjon, ta kontakt med\r\nRashid Elatyaoui\r\nMobil: 90 01 43 45\r\nEpost: re@bnh.no\r\n\r\nDenne bilen vil koste deg kun kr 1790.- pr mnd med vårt finansieringseksempel.\r\n\r\n-Vi tar selvfølgelig din bil i innbytte!\r\n-Vi leverer våre brukte biler med garanti, og to sett komplette hjul!\r\n-Vi kan tilby markedets beste løsninger for forsikring og finansiering. Inntil 100% finansiering med 10 års løpetid er mulig. Vi skreddersyr løsning for ditt behov.\r\n\r\nVelkommen til Birger N. Haug AS, Norges største autoriserte Nissan- og Subaruforhandler!\r\nKvalitet og omtanke, siden 1947.\r\n\r\nVi tar forbehold om trykkfeil i annonse og utstyrsliste.', 174900, 'used', 2, 'Rashid Elatyaoui', 'jhellmill@gmail.com', 90014345, 12, 292, 'Haraldrudveien 9, 0581 Oslo', 0, 9563, 0, '2016-12-02 05:15:48', 1, 26, 0, '', ''),
(31, 61, 82, 'Mc for sale 1999', '', 'Kj ', 888888, 'used', 2, 'shahvez', 'yarsas@hotmail.com', 47177477, 1, 18, 'Granbergstubben 19', 0, 6700, 0, '2016-12-25 15:43:08', 0, 0, 0, '', ''),
(32, 1, 36, 'Boligtomt/tomter på Laksvatn', '', 'Adkomst\r\n\r\nAdkomst via kommunal vei, Antonbakken.\r\n\r\n\r\nBeliggenhet\r\n\r\nTomt/tomteområde i Laksvatn boligfelt.\r\nNærhet til barnehage, barne- og ungdomsskole.\r\nBeskaffenhet\r\n\r\nTomtene selges som råtomter.\r\nTomtreområdet består hovedsaklig av delvis overdekket fjell.\r\nKommunalt vann og avløp er anlagt til hver tomt.\r\nMatrikkelinformasjon\r\n\r\nKommunenr: 1933\r\nGårdsnr: 9\r\nBruksnr: 164\r\n\r\nRapporter annonse\r\n\r\nFINN-kode: 88328836\r\n\r\nSist endret: 2. jan 2017 12:00', 200000, 'used', 2, 'Muhammad Imran', 'pm@webexdesigners.com', 2147483647, 2, 24, 'New Norway', 0, 1, 1, '2017-01-02 06:17:55', 1, 12, 0, '', ''),
(33, 1, 36, 'Lura Tomt uten byggeklausel Utsikt Sentralt', '', 'Beliggenhet\r\n\r\nSvarthyllveien ligger i et meget attraktivt og etablert boligområde på Lura. Nabolaget er rolig og barnevennlig med villabebyggelse. Her har man nærhet til det meste av butikker og servicetilbud. Kort vei til dagligvarebutikker som Rema 1000, Kiwi og Coop Obs. Gangavstand til Kvadrat kjøpesenter med 160 butikker fordelt på ulike bransjer som klær/sko/mote, bank, vinmonopol, apotek, skomaker, systue, renseri med mer. Gode turmuligheter i Rundeskogen/Håholen like ved Lura kirke, eller turveien langs Gandsfjorden som følger sjøkanten fra Luravika og inn i Stavanger kommune. For annen type trening ligger Sats Elixia og Actionball innen kort avstand. Actionball er et treningsanlegg på 3500 m2, hvor barn og vokse gjennom hele året, kan spille innendørs fotball, squash, beachvolleyball og golf på Full Swing Golf-simulatorer.\r\n\r\nKort og enkel vei til Sandnes sentrum med alle servicetilbud som byen byr på. Gode shoppingmuligheter, kino og sjarmerende restauranter og Caféer.\r\n\r\nAv skoler i nærheten har man Lura skole og Porsholen skole (1-7 klasse). Tryggheim skole (1-10 klasse) og Lurahammaren ungdomsskole (8-10 klasse), samt flere barnehager\r\n\r\n\r\nSe vedlagte nabolagsprofil i prospektet for ytterligere informasjon om nærområdet.\r\nBebyggelse\r\n\r\nHovedsaklig eneboliger\r\nAdkomst\r\n\r\nDet vil bli skiltet med visningsskilt på visningsdagen.\r\nTomten\r\n\r\nAreal: 353 kvm, Eierform: Eiet tomt\r\n\r\nTomt uten byggeklausel.\r\nParkering\r\n\r\nParkering må etableres på egen grunn.\r\nVei/vann/avløp\r\n\r\nEiendommen er tilknyttet privat vei. Stikkledning for vann og avløp er ligger klar på tomten\r\nLigningsverdi\r\n\r\nLigningsverdi er forsøkt innhentet, men er ikke regnet ut for denne eiendommen enda på Altinn.no.\r\nFaste løpende kostnader\r\n\r\nIngen pr. tidspunkt.\r\nDet vil komme kommunale avgifter, strøm, forsikrting, tv, internett m.m.\r\n', 2250000, 'new', 2, 'Muhammad Imran', 'pm@webexdesigners.com', 2147483647, 2, 24, 'Svarthyllveien, 4315 Sandnes', 0, 1, 1, '2017-01-02 07:16:53', 1, 12, 0, '', ''),
(34, 1, 36, 'Utsikts arkitekt tegnet funkisbolig til salgs', '', 'Beliggenhet\r\n\r\nTomten ligger i enden av Utsiktvegen med utsikt mot \r\n\r\nSandnes og Lifjell. Rolig og etablert området uten \r\n\r\ngjennomgående trafikk, stor lekeplass rett over veien for \r\n\r\ntomten.\r\n\r\n\r\nBeskaffenhet\r\n\r\nTomten selges som den står, det foreligger \r\n\r\nrammegodkjent enebolig med hybel. Tomten selges \r\n\r\nmed byggeklausul, men kan og kjøpes uten \r\n\r\nbyggeklausul for 2,49 mill. Ta kontakt for mer info.\r\n', 2386000, 'new', 2, 'Muhammad Imran', 'pm@webexdesigners.com', 2147483647, 13, 314, 'Rogaland', 0, 1, 1, '2017-01-02 07:26:52', 1, 13, 0, '', ''),
(35, 64, 35, 'NÆR MARKA ', '', 'Fremdrift\r\nLeiligheten er innflyttingsklar.\r\nFasiliteter\r\n\r\n    Aircondition/Ventilasjon\r\n    Balkong/Terrasse\r\n    Barnevennlig\r\n    Bredbåndstilknytning\r\n    Garasje/P-plass\r\n    Heis\r\n    Kabel-TV\r\n    Offentlig vann/kloakk\r\n    Parkett\r\n    Vaktmester-/vektertjeneste\r\n    Turterreng\r\n\r\nBeliggenhet\r\n\r\nLeiligheten ligger kun et steinkast i fra Skihytta i Fredrikstad, som er inngangen til Fredrikstadmarka, og en gåtur i fra Fredrikstad Sentrum.', 3495000, 'new', 2, 'Lilja M. Hansen Guthu', 'dev.teslavault@gmail.com', 98246552, 7, 142, 'Åsebråtveien, 1605 Fredrikstad', 0, 1, 1, '2017-01-07 12:08:32', 1, 2, 0, '', ''),
(36, 64, 34, 'Koselig leilighet til leie i Sørumlia', '', 'Fasiliteter\r\n\r\n    Umøblert\r\n    Bredbåndstilknytning\r\n    Garasje/P-plass\r\n    Kabel-TV\r\n    Moderne\r\n    Parkett\r\n    Rolig\r\n    Sentralt', 95000, 'new', 2, 'Morten Bjørmark', 'dev.teslavault@gmail.com', 123456789, 7, 142, 'Har vært på FINN i 11 år og bor i Buskerud', 0, 1, 1, '2017-01-07 12:19:13', 1, 1, 0, '', ''),
(37, 64, 270, 'Gatekjøkken i Porsgrunn sentrum', '', 'Salg av gatekjøkken sentralt i byen\r\nmed meget bra beliggenhet.\r\n2 timers gratis parkering rett utenfor.\r\nLokalenes størrelse er på ca 50kvm.\r\nHusleie pr. mnd. 8000kr + mva.\r\nFelleskostnader 1200kr\r\nPris kan diskuteres ved hurtig avgjørelse\r\nTlf. +47 938 47 757', 38000, 'used', 2, 'Natasha H.', 'dev.teslavault@gmail.com', 2147483647, 7, 142, 'Jernbanegata 2, 3916 Porsgrunn', 0, 1, 1, '2017-01-08 00:43:15', 1, 0, 0, '', ''),
(38, 64, 69, 'Wiking', '', 'For kunde (eier nr. 3) selges en særdeles pen og velholdt Wiking 28 fra 1982 m/ 212 HK Ford diesel. Båten som bl.a. tidligere har vært godkjent og brukt som ambulansebåt ble overtatt av nåværende eier i 2007. Båten er påkostet og oppgradert av nåværende eier som har sørget for en tilnærmet total renovering av båt og motor. Båten som fremstår som pen og velholdt selges av helsemessige grunner.\r\n\r\nInnvendig er båten svært romslig med høy bo komfort båtens størrelse tatt i betraktning (ståhøyde over det meste). Ved hjelp av en spesialbygget plattform av aluminium som er fagmessig montert på solide støtter over akterkabinen og utstyrt med en smart og romslig cockpitkalesje/telt, har båten rikelig med innvendig/utvendig plass for mange på tur.\r\n\r\n\r\n\r\n\r\nMed egen sovelugar, romslig toalettrom med WC og vask + adskilt dusj og rikelig skapplass forut, romslig lukket styrehus/dekksalong + en stor akterlugar/salong m/ velutstyrt pentry med 2 bluss gass koke-apparat vask og kjøleskap, kraftig dieselvarmer, varmt/kaldt vann, romslig uteplass på plattformen over akter-kabin + fly-bridge med manøverkontroll, kraftig \r\n\r\n\r\ncockpitkalesje/telt, er båten velegnet som helårs turbåt /bobåt (for langtur, eventuelt som »student-hybel etc.).', 279000, 'used', 2, 'Asbjørn Bremnes', 'dev.teslavault@gmail.com', 92857004, 7, 142, 'Flere annonser fra Master Marine ', 0, 1, 1, '2017-01-08 00:57:29', 1, 0, 0, '', ''),
(39, 64, 69, '33 Ft Reketråler', '', 'Enkel og praktisk, liten tråler perfekt for en mann. Lunt og tørt arbeidesdekk Det er montert ny splitt vinsj med kapasitet på ca 900m wire Hydraulisk kjøredavider. Ls hydraulikk pumpe 40 l\r\nDet medfølger ny Flekkerøya trål 1150 i 30mm nye Tyborøn 63"tråldører + Dangren 76" Sandblåst og malt med nye dra kjettinger. Har også en ny Refa trål. Sollemaskin og koke er av nyere dato Rønning reke soll.', 130000, 'used', 2, 'Einar/Joakim', 'dev.teslavault@gmail.com', 90614163, 7, 142, 'oslo, 0198 Oslo', 0, 1, 1, '2017-01-08 12:19:50', 1, 2, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_additional_fields`
--

CREATE TABLE IF NOT EXISTS `advertise_additional_fields` (
  `id` int(11) NOT NULL,
  `advertise_id` int(11) NOT NULL,
  `optional_field_id` int(11) NOT NULL,
  `optional_field_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advertise_comment`
--

CREATE TABLE IF NOT EXISTS `advertise_comment` (
  `id` int(10) NOT NULL,
  `advertise_id` int(10) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `author_email` varchar(100) DEFAULT NULL,
  `body` text,
  `enabled` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `mark_spam` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1443982861);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'Admin of the website', 'admin', NULL, 1443509656, 1443982622),
('test', 2, 'test', 'admin', NULL, 1443982828, 1443982828);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 'O:23:"backend\\rbac\\AuthorRule":3:{s:4:"name";s:5:"admin";s:9:"createdAt";i:1443982581;s:9:"updatedAt";i:1443982581;}', 1443982581, 1443982581);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(55) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=379 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `description`, `parent_id`, `credits`, `status`) VALUES
(1, 'Eiendom', 'bulding.png', 'Property', 0, 0, 1),
(272, 'Kantinde Restuarant', 'Restaurant Scene Hall.jpg', 'canteen Restaurant', 33, 0, 1),
(3, 'Kjøretøy', 'car.png', 'Vehicle', 0, 0, 1),
(4, 'Motorsykkel', 'mc2.png', 'Motorcycle', 0, 0, 1),
(5, 'Båt', 'boat.png', 'Boat', 0, 0, 1),
(6, 'Jobb', 'jobb.png', 'Jobs', 0, 0, 1),
(7, 'Restauranter', 'rest1.jpg', 'Restaurants', 0, 0, 1),
(8, 'Reise', 'trv1.jpg', 'Travel', 0, 0, 1),
(9, 'Utdanning', 'image.jpeg', 'Education', 0, 0, 1),
(10, 'Katalog', 'IMG_8567.jpg', 'Directory', 0, 0, 1),
(11, 'Nettbutikker', 'netbutiker.jpg', 'Online Shops', 0, 0, 1),
(12, 'Kjøpesenter', 'property.png', 'Mall', 0, 0, 1),
(13, 'Merkevarer Tilbud', 'bid.jpg', 'Brands Sale', 0, 0, 1),
(142, 'Data Mobil', 'elek.jpg', 'Mobiles Computer', 19, 0, 1),
(15, 'Stahjuling', 'segway2.png', 'Segway', 3, 0, 1),
(19, 'Til Salgs', 'sofa.jpeg', 'For Sale', 0, 0, 1),
(20, 'Aktiviteter', '7-Free-Teamwork-Clip-Art-Of-A-Circle-Of-Diverse-People-Holding-Hands.png', 'Activities', 0, 0, 1),
(21, 'Tjenester', 'serv7.jpg', 'Services', 0, 0, 1),
(128, 'Kjøpesenter', 'property.png', 'Shopping centers', 12, 0, 1),
(132, 'Barne', 'barne.png', 'Kid Clothes and accessories', 19, 0, 1),
(131, 'Hjem  Hage', 'home hage.png', 'Home Garage Garden', 19, 0, 1),
(130, 'Dekor Interior', 'vase.png', 'Decoration  Interior', 19, 0, 1),
(27, 'Maglerne', 'IMG_8570.jpg', 'Brokers ', 1, 0, 1),
(28, 'Parkerings til leie', 'parking1.png', 'Parking for Rent', 1, 0, 1),
(29, 'Parkerings til Salg', 'parking 2.png', 'Parking for Sale', 1, 0, 1),
(30, 'Hytte til salg', 'hytte1.gif', 'Holiday Home for Sale', 1, 0, 1),
(31, 'Hytte til leie', 'hytte2.jpg', 'Holiday Home for Rent', 1, 0, 1),
(32, 'Næringseiendom   Til Leie', 'naring til leie.jpg', 'Commercial Properties for Rent', 1, 0, 1),
(33, 'Næringseiendom   Til Salg', 'naring 1.jpg', 'Commercial Properties for Sale', 1, 0, 1),
(34, 'Hus til leie', 'hus til salg.jpg', 'House for Rent', 1, 0, 1),
(35, 'Hus til salg', 'hus til salg 2.jpg', 'House for Sale', 1, 0, 1),
(36, 'Tomter', 'tomte.png', 'Plots', 1, 0, 1),
(129, 'Hvitevarer', 'hvetevare.jpg', 'Appliances', 19, 0, 1),
(127, 'Merkervarer', '20-70.jpg', 'Brands', 12, 0, 1),
(38, 'Bedrifter / Tjenster', 'services 3.jpg', 'Enterprises / Services)', 22, 0, 1),
(124, 'Praksisplass', 'internships.jpg', 'Internships', 6, 0, 1),
(126, 'Jobbyrå', 'jobb.png', 'Job agency', 6, 0, 1),
(41, 'Valuta', 'exch 1.png', 'Currency', 8, 0, 1),
(42, 'Taxi Buss', 'taxi-cab9.png', 'Taxi / Bus', 8, 0, 1),
(43, 'Risepakke', 'reise.png', 'Travel Package', 8, 0, 1),
(44, 'Hotell Hytte', 'hotel 2.png', 'Hotel / Motel / Cabin', 8, 0, 1),
(45, 'Billetter', 'passport-plane-ticket.png', 'Tickets (Plane, Train, Boat)', 8, 0, 1),
(46, 'Leiebil', 'tilleie.png', 'Rent a Car', 8, 0, 1),
(47, 'Helse Trening Skjonnhet', 'fitness.gif', 'Health – Fitness – Beauty', 9, 0, 1),
(48, 'Trafikk Skole', 'traffik skole 2.jpg', 'Driving School', 9, 0, 1),
(49, 'IT Kurs', 'it kurse 2.png', 'IT Course', 9, 0, 1),
(50, 'Hobby Class', 'hoby2.png', 'Hobby Class)', 9, 0, 1),
(51, 'Musik Danse', 'dance.gif', 'Dance/Music Classes', 9, 0, 1),
(52, 'Coaching Tuition', 'study.jpg', 'Coaching / Tuition', 9, 0, 1),
(53, 'Skole Universitet', 'skole.jpg', 'School / University', 9, 0, 1),
(54, 'Barnehage', 'barnehage.jpg', 'Kindergarten', 9, 0, 1),
(55, 'Annet', 'annet.jpg', 'Others', 9, 0, 1),
(56, 'Kino Teater', 'kino 2.gif', 'Movie Theater Actor Film', 20, 0, 1),
(57, 'Aktivieters', 'Aktivieter.png', 'Activities', 20, 0, 1),
(58, 'Bil Markedsdag', 'tilleie.png', 'Car Market Day', 20, 0, 1),
(60, 'Festival', 'festival.gif', 'Festival Dances Music Concert', 20, 0, 1),
(61, 'Markedsdag Nattapent', 'Shopping_cart_with_veggies_and_fruit.jpg', 'Market Day', 20, 0, 1),
(62, 'Annet', 'annet.jpg', 'Other Events', 20, 0, 1),
(144, 'Bøker', 'bøker.jpg', 'Books', 19, 0, 1),
(63, 'Catering  Event', 'resturant 2.jpg', 'Catering  Event Services', 21, 0, 1),
(168, 'Renhold', 'Renhold.jpg', 'Cleaning', 165, 0, 1),
(65, 'Mat Varer', 'kake.jpeg', 'Food Products', 7, 0, 1),
(66, 'Restauranter', 'resturant.png', 'Restaurants', 7, 0, 1),
(67, 'Båt til leie', 'båt til leie.png', 'Boat for rent', 5, 0, 1),
(68, 'Ferge', 'ferry2.png', 'Ferry', 5, 0, 1),
(69, 'Båt til salgs', 'båt til salg.png', 'Boat', 5, 0, 1),
(70, 'Deler', 'båt deler.jpg', 'Parts', 5, 0, 1),
(71, 'Verksted', 'båt service.gif', 'Workshop', 5, 0, 1),
(72, 'Sjøskole', 'traffik skole 2.jpg', 'Boat School', 5, 0, 1),
(73, 'Båtplasser', 'parcking.gif', 'Boat Parking', 5, 0, 1),
(74, 'Utstyr', 'båt life ring.jpg', 'Equipment', 5, 0, 1),
(75, 'Forhandlere', 'båt forhandler.jpg', 'Retailers', 5, 0, 1),
(76, 'Til Leie', 'motorsykkel til leie.jpg', 'For rent', 4, 0, 1),
(141, 'Delebil Vrakbil', 'delebil.png', 'Scrap car', 3, 0, 1),
(78, 'Verksted', 'verksted 4.png', 'Workshop', 4, 0, 1),
(79, 'Deler', 'tank motorc.jpg', 'Parts', 4, 0, 1),
(80, 'Scooter Og Moped', 'moped.png', 'Scooter And Moped', 4, 0, 1),
(81, 'Snoscooter', 'snoscooter.jpg', 'Snow Scooter', 4, 0, 1),
(82, 'MC til salgs', 'motorsykkel til salg.png', 'MC til salgs', 4, 0, 1),
(83, 'Forhandlere', 'forhandler.jpeg', 'Retailers', 4, 0, 1),
(84, 'Utstyr', 'motorsykkelutstyr.png', 'Equipment', 4, 0, 1),
(85, 'Bygg Oppussing', 'bygg anleg.jpg', 'Building  Construction  Renovation', 21, 0, 1),
(145, 'Billett Gavekort', 'gavekort.jpg', 'Ticket Gift card', 19, 0, 1),
(87, 'Meglere Advokat', 'advokat.jpg', 'Real Estate Agents', 21, 0, 1),
(88, 'Industri  Business ', 'pict---industrial-transport---vector-stencils-library.png--diagram-flowchart-example.png', 'Industry  Business  Excavation', 21, 0, 1),
(89, 'Helse  Hudpleie', 'nail.jpg', 'Health  BodyCare', 21, 0, 1),
(90, 'IT Web', 'web.png', 'IT', 21, 0, 1),
(171, 'Varmepumpe', 'AC-repair.png', 'AC', 165, 0, 1),
(92, 'Flytting  Hjem hjelp', 'flating.jpg', 'Moving  work for home help', 21, 0, 1),
(169, 'Rørlegger', 'rørlegger.jpg', 'Plumber', 165, 0, 1),
(170, 'Flislegger', 'snekker.jpg', 'Tiles maker', 165, 0, 1),
(95, 'Elektronikk  Data Telefoni', 'images.jpg', 'Electronics  Computers  Telephone', 21, 0, 1),
(96, 'Annet', 'annet.jpg', 'Other', 21, 0, 1),
(97, 'Biler', 'car.png', 'Cars', 3, 0, 1),
(273, 'Tomter til Salgs', 'Land for rent.jpg', 'Land for sale', 33, 0, 1),
(99, 'Campingvogn', 'campingvogen2.png', 'Caravan', 3, 0, 1),
(100, 'Bobil', 'bobil1.jpg', 'Motorhome', 3, 0, 1),
(102, 'Truck', 'truk.png', 'Truck', 3, 0, 1),
(103, 'Buss og minibuss', 'buss.jpg', 'Bus', 3, 0, 1),
(104, 'Forsikring  Veihjelp', 'veihjelp 2.png', 'Auto Insurance  Road Assistance', 3, 0, 1),
(105, 'Bilopphuggeri', 'bil haugeri 2.jpg', 'Scape Yard', 3, 0, 1),
(106, 'Deler', 'bil deler.jpg', 'Parts', 3, 0, 1),
(107, 'Sykler', 'cycle.gif', 'Cycles', 3, 0, 1),
(108, 'Verksted', 'verksted.png', 'Workshop', 3, 0, 1),
(109, 'Trafik Skole', 'traffik skole 2.jpg', 'Driving School', 3, 0, 1),
(110, 'Andrekjoretory', 'pict---industrial-transport---vector-stencils-library.png--diagram-flowchart-example.png', 'Others Vehicles', 3, 0, 1),
(111, 'Forhandlere', 'carkey.jpg', 'Retailers', 3, 0, 1),
(112, 'Bilvask', 'car wash.png', 'Car Wash', 3, 0, 1),
(113, 'Tilhenger', 'tilhangere.png', 'Trailer', 3, 0, 1),
(114, 'Til Leie', 'tilleie.png', 'For Rent', 3, 0, 1),
(117, 'Utstyer  Invente', 'wheel.png', 'Supplies & Equipment', 2, 0, 1),
(118, 'Bygg Og Anlegg', 'bygge.jpg', 'Building  Construction', 2, 0, 1),
(271, 'Landburk', 'Agriculture.jpg', 'Agriculture', 3, 0, 1),
(121, 'Bedrifter Til Slag', 'eiendom.png', 'Businesses For Sale', 2, 0, 1),
(122, 'aant', 'annet.jpg', 'Others', 2, 0, 1),
(123, 'Bedrifter  Tjenster', 'IMG_8570.jpg', 'Businesses Services', 21, 0, 1),
(125, 'Jobb', 'job.png', 'Jobs', 6, 0, 1),
(133, 'Elektronikk', 'elektronikk.jpg', 'Electronics  Appliances', 19, 0, 1),
(134, 'Møbler', 'møbler 2.png', 'Furniture', 19, 0, 1),
(135, 'Kjæledyr', 'dyr.png', 'Pets Pet Equipment', 19, 0, 1),
(136, 'Hobby  Sport', 'friluft.png', 'Hobbies  Sports', 19, 0, 1),
(137, 'Kunst  Antikk', 'antikk.jpg', 'Art Antique', 19, 0, 1),
(139, 'Klær og stil', 'styl.png', 'Fashion', 19, 0, 1),
(140, 'Annet', 'annet.jpg', 'Other', 19, 0, 1),
(176, 'Tablet', 'tablet.png', 'Tablet', 142, 0, 1),
(177, 'Bærbar PC', 'barbær pc.jpg', 'Laptop', 142, 0, 1),
(178, 'Stasjonær PC', 'Stasjonær PC.jpg', 'Computer', 142, 0, 1),
(154, ';lkkljkl', '3.JPG', ';kp', 150, 0, 1),
(179, 'Mobiltelefoner', 'Mobiltelefon.jpg', 'Mobile Phones', 142, 0, 1),
(157, 'fourth', '3.JPG', 'lksdflks', 150, 0, 1),
(180, 'Telefontilbehør', 'blutooth.jpg', 'Phone accessories', 142, 0, 1),
(159, 'Foto Modellbyrå', 'fotov.gif', 'Photos Model agency', 21, 0, 1),
(160, 'Revisjon Regnskap', 'revisjon.jpg', '', 21, 0, 1),
(161, 'Tannlege', 'tannlege.jpg', 'Dentist', 21, 0, 1),
(162, 'Trykkeri', 'Publisher.jpg', 'Publisher', 21, 0, 1),
(163, 'Transport', 'transport2.png', 'Transportation', 21, 0, 1),
(166, 'Trafikkskole', 'trafikkskole.jpg', 'Driving School', 21, 0, 1),
(165, 'Håndverk', 'håndverk1.png', 'Crafts', 21, 0, 1),
(167, 'Maling og Tapet', 'Dekør malere.png', 'Paint and Wallpaper', 165, 0, 1),
(172, 'Uteområde', 'hage.jpg', 'Garden', 165, 0, 1),
(173, 'Entreprenører', 'Entreprenører.jpg', 'contractors', 165, 0, 1),
(174, 'Elektriker', 'images.png', 'electrician', 165, 0, 1),
(175, 'Plakater', 'Plakater.jpg', '\r\nPosters', 162, 0, 1),
(181, 'Barnemøbler', 'barna stol.jpg', 'kids Furniture', 132, 0, 1),
(182, 'Barnevogner', 'Barnevogner.jpg', '\r\nPrams', 132, 0, 1),
(183, 'Barne bilseter', 'Barneseter.jpg', 'Car seat Baby ', 132, 0, 1),
(184, 'Barnesko og klær', 'barnesko.png', 'baby Shoes  clothing', 132, 0, 1),
(185, 'Leker', 'leker.jpg', 'toys', 132, 0, 1),
(186, 'Annet alt', 'baby.jpg', 'Others for baby', 132, 0, 1),
(187, 'Baderom', 'Bathroom.jpg', 'Bathroom', 131, 0, 1),
(188, 'Kjøkken', 'Kitchen.png', 'Kitchen', 131, 0, 1),
(189, 'Garasje Hage', 'hage 1.jpg', 'Garage Garden', 131, 0, 1),
(190, 'Oppussing Byggevarer', 'snekker.jpg', 'Renovation Construction', 131, 0, 1),
(191, 'Ventilasjon Oppvarming', 'oppvarming.jpg', 'Ventilation Heating', 131, 0, 1),
(192, 'Sofaer', 'sofa.jpg', 'Sofas', 134, 0, 1),
(193, 'Stoler Bord', 'stol.jpg', 'chairs Tables', 134, 0, 1),
(194, 'Senger', 'seng.jpg', 'beds', 134, 0, 1),
(195, 'Hyller Skap', 'skap.jpg', 'shelving cabinet', 134, 0, 1),
(196, 'Annet', 'barna stol.jpg', 'other', 134, 0, 1),
(197, 'Kjøkkenutstyr', 'kjokken1.jpg', 'Kitchenware', 130, 0, 1),
(198, 'Dekorasjon', 'Decoration.jpg', 'Decoration', 130, 0, 1),
(199, 'Lamper', 'lampe.jpg', 'Light', 130, 0, 1),
(200, 'Tekstiler og Tepper', 'teppe.jpg', 'Textiles and Carpets', 130, 0, 1),
(201, 'Vaskemaskiner', 'Vaskemaskiner.jpg', 'Washing machines', 129, 0, 1),
(202, 'Oppvaskmaskiner', 'oppvaskmasion.png', 'Dishwashers', 129, 0, 1),
(203, 'Kjøleskap', 'kjøleskap.jpg', 'Refrigerator', 129, 0, 1),
(204, 'Frysere', 'freezers.jpg', 'freezers', 129, 0, 1),
(205, 'Komfyrer', 'komfyr.jpg', 'cookers', 129, 0, 1),
(206, 'Ovner ', 'ovens.jpg', 'ovens', 129, 0, 1),
(207, 'Mikrobølgeovner', 'mikro.jpg', 'Microwaves', 129, 0, 1),
(208, 'Tørketromler', 'Tørketmoler.jpg', 'Dryers', 129, 0, 1),
(209, 'Andre', 'mikro.jpg', 'Others', 129, 0, 1),
(210, 'Hjemmeapparater', 'husholdning apparator.jpg', 'Home appliances', 19, 0, 1),
(211, 'Kamera Foto', 'kamera.jpg', 'camera Photo', 133, 0, 1),
(212, 'Audio Video', 'audio videooo.jpg', 'Audio Video', 133, 0, 1),
(213, 'Spillere', 'spill.jpg', 'Games', 133, 0, 1),
(214, 'Vesker', 'veske.png', 'Bags', 139, 0, 1),
(215, 'Sko', 'sko.jpg', 'Shoes', 139, 0, 1),
(216, 'Klær', 'klær billig.png', 'Clothes', 139, 0, 1),
(217, 'Kostyme', 'kostyme.png', 'Costume', 139, 0, 1),
(218, 'Smykker', 'smyke.jpg', 'Jewelry', 139, 0, 1),
(219, 'Linser Briller', 'briller.png', 'Lenses Glasses', 139, 0, 1),
(220, 'Kosmetikk', 'Kosmetikk.jpg', 'cosmetics', 139, 0, 1),
(221, 'Kroppspleie', 'bodycare.jpg', 'bodycare', 139, 0, 1),
(224, '4th Level Cateogry', 'test8 (3).jpg', '4th Level Cateogry', 175, 50, 1),
(225, 'Samleobjekter', 'collectibles1.jpg', 'collectibles', 136, 0, 1),
(226, 'Film Musikk', 'musikk.jpg', 'Film and Music', 136, 0, 1),
(227, 'Musikkelementer', 'Musical.png', 'Musical', 136, 0, 1),
(228, 'RC Produkter', 'rc utstyr.jpg', 'Remort control prod', 136, 0, 1),
(255, 'Kontor til leie', 'kontor til leie.jpg', 'Office for rent', 32, 0, 1),
(235, 'Industri Næringsliv', 'Industri Næringsliv.jpg', 'industry Business', 19, 0, 1),
(248, 'Lagerinnredning', 'lagerinredninig1.jpg', 'Godam', 235, 0, 1),
(247, 'Butikkelementer', 'butikkineredning.jpg', 'Shoping fitting', 235, 0, 1),
(246, 'Kontorelementer', 'kontor.jpg', 'Office fitting', 235, 0, 1),
(237, 'Skjønnlitteratur', 'fiction book.jpg', 'fiction', 144, 0, 1),
(238, 'Lydbøker', 'lydbøker.jpg', 'audiobooks', 144, 0, 1),
(239, ' Faglitteratur', 'nonfiction.jpg', 'nonfiction', 144, 0, 1),
(240, 'Fakta', 'fakta bøker.png', 'facts', 144, 0, 1),
(241, 'Hobby Fritid', 'fritid bøker.jpg', 'Hobby books', 144, 0, 1),
(242, 'Kokebøker', 'Kokebøker.jpg', 'cookbooks', 144, 0, 1),
(243, 'Pensumbøker', 'curriculum Books.jpg', 'Curriculum Books', 144, 0, 1),
(244, 'Andre bøker', 'andre bøker.jpg', 'Ohers books', 144, 0, 1),
(245, 'Oppslagsverk', 'Encyclopedias.jpg', 'Encyclopedias', 144, 0, 1),
(249, 'Verkstedutstyr', 'verksted utstyr.jpg', 'workshop ', 235, 0, 1),
(252, 'Landbruksutstyr', 'Agriculture.jpg', 'Agriculture', 235, 0, 1),
(251, 'Restaurant  Scene  Hall', 'Restaurant Scene Hall.jpg', 'Restaurant Scene Hall', 235, 0, 1),
(253, 'kroppspleie utstyr', 'body care equipment.png', 'body care equipment', 235, 0, 1),
(254, 'Annet', 'annet.jpg', 'other', 235, 0, 1),
(256, 'Lager til leie', 'lager til leie.jpg', 'whare house for rent', 32, 0, 1),
(257, 'Butikk til leie', 'butikk til leie.jpg', 'Shop for rent', 32, 0, 1),
(258, 'Verksted til leie', 'verksted bil.jpg', 'Workshop for rent', 32, 0, 1),
(259, 'Blande lokaler', 'blending premises.jpg', 'mix premises', 32, 0, 1),
(260, 'Industri til leie', 'lager til leie.jpg', 'Industrial for rent', 32, 0, 1),
(261, 'Kantine restaurant', 'canteen restaurant.jpg', 'canteen restaurant', 32, 0, 1),
(262, 'Tomte til leie', 'Land for rent.jpg', 'Land for rent', 32, 0, 1),
(263, 'Andre til leie', 'annet.jpg', 'others for rent', 32, 0, 1),
(264, 'Kontor til Salg', 'kontor til leie.jpg', 'Office for sale', 33, 0, 1),
(265, 'Lager til salg', 'lager til leie.jpg', 'Godam for sale', 33, 0, 1),
(266, 'Butikk til salg', 'butikk til leie.jpg', 'Shop for sale', 33, 0, 1),
(267, 'Verksted for salg', 'verksted bil.jpg', 'Workshop for salg', 33, 0, 1),
(268, 'Blande lokaler', 'kontor til leie.jpg', 'mixing premises', 33, 0, 1),
(269, 'Industri til salg', 'blending premises.jpg', 'Manufacturing to Sales', 33, 0, 1),
(270, 'Business Til Slags', 'kontor.jpg', 'Business for sale', 1, 0, 1),
(274, 'Andre til salgs', 'annet.jpg', 'Others commerical pro for sale', 33, 0, 1),
(275, 'ATV', 'atv.jpg', 'ATV', 4, 0, 1),
(276, 'Festivaler', 'samfun.jpg', 'Festivals', 0, 0, 1),
(277, 'Hjemmelaget mat', 'hjemelaget mat.jpg', 'Homemade food', 7, 0, 1),
(278, 'Takeaway Restauranter', 'Restaurant Scene Hall.jpg', 'Takeaway Restaurants', 7, 0, 1),
(279, 'MerkeVesker', 'veske.png', 'Brand Bags', 13, 0, 1),
(280, 'Merke Sko', 'sko.jpg', 'Bands Shoes', 13, 0, 1),
(281, 'Merke klær', 'klær billig.png', 'Brands Clothes', 13, 0, 1),
(282, 'Merke Kostyme', 'kostyme.png', 'Brand Costume', 13, 0, 1),
(283, 'Merke Smykker', 'smyke.jpg', 'Brand Jewelry', 13, 0, 1),
(284, 'Merke Briller', 'briller.png', 'Brand Glasses', 13, 0, 1),
(285, 'Merke Kosmetikk', 'Brand Cosmetics.jpg', 'Brand Cosmetics', 13, 0, 1),
(286, 'Kroppspleievarer', '20-70.jpg', 'Body Care Products', 13, 0, 1),
(287, 'Kjøkken Merkevarer', 'kjokken1.jpg', 'kitchen Brands', 13, 0, 1),
(288, 'Andre Merkevarer', 'blutooth.jpg', 'other Brands products', 13, 0, 1),
(289, 'TV', 'tv til salg.jpg', 'TV', 212, 0, 1),
(290, 'Projektor og utstyr', 'Projector and equipment.jpg', 'Projector and equipment', 212, 0, 1),
(291, 'DVD-CD-Blu Ray spillere', 'dvd spiler.png', 'DVD CD Blu Ray Players', 212, 0, 1),
(292, 'MP3 MP4 spillere ', 'mp3 spiller.jpg', 'mp4 players', 212, 0, 1),
(293, 'Mediabokser', 'mediabokser.jpg', 'mediabox', 212, 0, 1),
(294, 'receivere ', 'receivers.jpg', 'receivers', 212, 0, 1),
(295, 'Høyttalere', 'Speakers.png', 'Speakers', 212, 0, 1),
(296, 'Annet Audio Video', 'annet.jpg', 'Ohters', 212, 0, 1),
(297, 'Power Inverter', 'Power Inverter.jpg', 'Power Inverter', 133, 0, 1),
(298, 'Network Elementer', 'Network elements.jpg', 'Network elements', 133, 0, 1),
(299, 'Router', 'Router network.jpg', 'Router', 298, 0, 1),
(300, 'network switch', 'network switch.jpg', 'network switch', 298, 0, 1),
(301, 'Network utstyr', 'Network utstyr.jpg', 'Network Elements', 298, 0, 1),
(302, 'Ladere og kabler', 'Chargers and Cables.jpg', 'Chargers & Cables', 133, 0, 1),
(303, 'Batterier', 'batteri.jpg', 'Batteries', 133, 0, 1),
(304, 'Ander Elek varer', 'annet.jpg', 'Other Elec items', 133, 0, 1),
(305, 'Objektiver', 'Camera Lenses.jpg', 'Camera Lenses', 211, 0, 1),
(306, 'Kameraer', 'cameras.jpg', 'cameras', 211, 0, 1),
(307, 'Kamerautstyr', 'camera Equipment.jpg', 'camera Equipment', 211, 0, 1),
(308, 'SikkerhetsKamera', 'security Camera.jpg', 'security Camera', 211, 0, 1),
(310, 'Støvsuger', 'Vacuum cleaner.png', 'Vacuum cleaner', 309, 0, 1),
(316, 'Støvsuger', 'Vacuum cleaner.png', 'Vacuum cleaner', 210, 0, 1),
(311, 'Kaffemaskin', 'Coffeemaker.jpg', 'Coffeemaker', 210, 0, 1),
(312, 'Toastjern og Vaffel', 'toast Iron.png', 'toast Iron', 210, 0, 1),
(313, 'Blender', 'Blender.png', 'Blender', 210, 0, 1),
(314, 'Miksere', 'Mixers.png', 'Mixers', 210, 0, 1),
(315, 'Strykejern', 'Iron.png', 'Iron', 210, 0, 1),
(317, 'Brødrister', 'Toaster.jpg', 'Toaster', 210, 0, 1),
(318, 'Vannkoker', 'kettle.jpg', 'kettle', 210, 0, 1),
(319, 'Andre apparater', 'annet.jpg', 'other appliances', 210, 0, 1),
(320, 'Pledd og Puter', 'Blankets and Pillows.jpg', 'Blankets and Pillows', 200, 0, 1),
(321, 'Gardiner', 'Curtains.jpg', 'Curtains', 200, 0, 1),
(322, 'Duker', 'Tablecloths.jpg', 'Tablecloths', 200, 0, 1),
(323, 'Andre tekstiler', 'annet.jpg', 'Other Tekstiale', 200, 0, 1),
(324, 'Vaser  Blomster', 'Vases  Flowers.png', 'Vases  Flowers', 198, 0, 1),
(325, 'Bilder  Rammer', 'Photos  Frames.png', 'Photos  Frames', 198, 0, 1),
(326, 'Andre dekor', 'annet.jpg', 'others', 198, 0, 1),
(327, 'Speil  Glass', 'Mirror  Glass.png', 'Mirror  Glass', 198, 0, 1),
(328, 'Landbruk tjenester', 'Agriculture.jpg', 'Agriculture', 21, 0, 1),
(329, ' Elektromateriell', 'Electrical products.jpg', 'Electrical products', 190, 0, 1),
(330, 'Trapper', 'Trapper.jpg', 'stairs', 190, 0, 1),
(331, 'Plater', 'gipsplate.jpg', 'Sheets', 190, 0, 1),
(332, 'Isolasjon', 'Isolasjon.png', 'Insulation', 190, 0, 1),
(333, 'Fliser', 'Fliser.jpg', 'tiles', 190, 0, 1),
(334, 'Maling Tapet', 'Wallpaper.jpg', 'Paint  Wallpaper', 190, 0, 1),
(335, 'Vinduer', 'windows.jpg', 'windows', 190, 0, 1),
(336, 'Dører', 'Dører.jpg', 'doors', 190, 0, 1),
(337, 'Gulv', 'Floor.jpg', 'Floor', 190, 0, 1),
(338, 'Tak', 'tak.png', 'ceiling', 190, 0, 1),
(339, 'Rør', 'rør.png', 'Pipes', 190, 0, 1),
(340, 'Glass', 'Glasssheet.jpg', 'Glass', 190, 0, 1),
(341, 'Andre', 'annet.jpg', 'others', 190, 0, 1),
(342, 'Maskiner og Verktøy', 'Machines & Tools.png', 'Machines & Tools', 131, 0, 1),
(343, 'Varmepumper', 'Varmepumper.jpg', 'Heat pumps', 191, 0, 1),
(344, 'Vifter og AC', 'Vifter og AC.jpg', 'Fans & Air condition', 191, 0, 1),
(345, 'Elektriske ovner', 'electric furnaces.jpg', 'electric furnaces', 191, 0, 1),
(346, 'Peis', 'peis 2.png', 'Fireplace', 191, 0, 1),
(347, 'Brensel og ved', 'Fuel and wood.jpg', 'Fuel and wood', 191, 0, 1),
(348, 'Ovner', 'ovens.jpg', 'ovens', 191, 0, 1),
(349, 'Annet', 'annet.jpg', 'Other', 131, 0, 1),
(350, 'Ringer', 'ringer.png', 'Rings', 218, 0, 1),
(351, 'Klokker', 'klokke.jpg', 'Watches', 218, 0, 1),
(352, 'Øredobber', 'øredobber.jpg', 'earrings', 218, 0, 1),
(353, 'Halskjeder', 'Necklaces.jpg', 'Necklaces', 218, 0, 1),
(354, 'Armbånd', 'Bracelet.jpg', 'Bracelet', 218, 0, 1),
(355, 'Andre smykker', 'annet.jpg', 'Other jewellery', 218, 0, 1),
(356, 'Anklets', 'ANKLETS.jpg', 'Anklets', 218, 0, 1),
(357, 'Pensjonert Smykker', 'Retired Jewelry.jpg', 'Retired Jewelry\r\n', 218, 0, 1),
(358, 'Smykker sett', 'Jewelry set.jpg', 'Jewelry set', 218, 0, 1),
(359, 'Barna smykker', 'kids jewelry.jpg', 'kids jewelry', 218, 0, 1),
(360, 'Caps og luer', 'caps and hats.png', 'caps and hats', 139, 0, 1),
(361, 'Jakker', 'Jackets.jpg', 'Jackets', 139, 0, 1),
(362, 'Skjorter', 'Shirts.png', 'Shirts', 216, 0, 1),
(363, 'Bukser', 'Bukser.jpg', 'Pants', 216, 0, 1),
(364, 'Dresser', 'Dresser.jpg', 'Dresses', 216, 0, 1),
(365, 'Gensere', 'Sweaters.jpg', 'Sweaters', 216, 0, 1),
(366, 'Smokinger', 'Tuxedos.jpg', 'Tuxedos', 216, 0, 1),
(367, 'Skjerf', 'Mittens and scarves.png', ' scarves', 216, 0, 1),
(368, 'Hansker', 'gloves.png', 'gloves', 216, 0, 1),
(369, 'Undertøy', 'Underwear.png', 'Underwear', 216, 0, 1),
(370, 'Ytterklær', 'Outerwear.jpg', 'Outerwear', 216, 0, 1),
(371, 'Topper', 'Tops.png', 'Tops', 216, 0, 1),
(372, 'Kjoler', 'Kjoler.png', 'Dresses', 216, 0, 1),
(373, 'Annet', 'annet.jpg', 'others', 216, 0, 1),
(374, 'Belter', 'Belter.jpg', 'Belts', 139, 0, 1),
(378, 'Alle Festivaler', 'festivaler.jpg', 'All Festivals', 276, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_additional_fields`
--

CREATE TABLE IF NOT EXISTS `category_additional_fields` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `optional_field_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_additional_fields`
--

INSERT INTO `category_additional_fields` (`id`, `category_id`, `optional_field_id`) VALUES
(74, 97, 525),
(97, 81, 242),
(49, 102, 430),
(39, 99, 366),
(89, 80, 169),
(28, 100, 346),
(27, 100, 343),
(26, 100, 278),
(25, 100, 258),
(24, 100, 255),
(29, 100, 347),
(30, 100, 348),
(31, 100, 349),
(32, 100, 354),
(33, 100, 355),
(34, 100, 356),
(35, 100, 357),
(36, 100, 361),
(37, 100, 364),
(38, 100, 365),
(40, 99, 369),
(41, 99, 389),
(42, 99, 423),
(43, 99, 424),
(44, 99, 425),
(45, 99, 426),
(46, 99, 427),
(47, 99, 428),
(48, 99, 429),
(50, 102, 431),
(51, 102, 432),
(52, 102, 433),
(53, 102, 465),
(73, 103, 524),
(72, 103, 523),
(71, 103, 522),
(70, 103, 505),
(69, 103, 485),
(75, 97, 530),
(76, 97, 531),
(77, 97, 532),
(78, 97, 533),
(79, 97, 553),
(80, 97, 564),
(81, 97, 571),
(82, 97, 588),
(83, 97, 589),
(84, 97, 590),
(85, 97, 594),
(86, 97, 597),
(87, 97, 600),
(88, 97, 602),
(90, 80, 606),
(91, 80, 607),
(92, 80, 608),
(93, 80, 609),
(94, 80, 613),
(95, 80, 633),
(96, 80, 634),
(98, 81, 635),
(99, 81, 636),
(100, 81, 637),
(101, 81, 638),
(102, 81, 658),
(103, 81, 659),
(104, 275, 660),
(105, 275, 702),
(106, 275, 703),
(107, 275, 704),
(108, 275, 705),
(109, 275, 725),
(110, 275, 726),
(128, 82, 831),
(127, 82, 830),
(126, 82, 810),
(125, 82, 795),
(124, 82, 794),
(123, 82, 793),
(122, 82, 792),
(121, 82, 730),
(120, 82, 727),
(129, 378, 832),
(130, 69, 833),
(131, 69, 836),
(132, 69, 839),
(133, 69, 852),
(134, 69, 1291),
(135, 69, 1292),
(136, 69, 1293),
(137, 69, 1294),
(138, 69, 1297),
(139, 69, 1301),
(140, 69, 1321),
(141, 67, 1322),
(142, 67, 1332),
(143, 67, 1358),
(144, 67, 1359),
(145, 67, 1360),
(146, 67, 1361),
(147, 67, 1364),
(148, 67, 1384),
(149, 36, 1385),
(150, 36, 1406),
(151, 36, 1407),
(152, 35, 1408),
(153, 35, 1429),
(154, 35, 1432),
(155, 35, 1435),
(156, 35, 1436),
(157, 35, 1437),
(158, 35, 1438),
(159, 35, 1439),
(160, 35, 1446),
(161, 35, 1447),
(162, 35, 1461),
(163, 35, 1467),
(164, 35, 1477),
(165, 35, 1486),
(166, 35, 1494),
(167, 34, 1495),
(168, 34, 1516),
(169, 34, 1530),
(170, 34, 1531),
(171, 34, 1532),
(172, 34, 1539),
(173, 34, 1541),
(174, 34, 1545),
(175, 34, 1554),
(179, 270, 1584),
(178, 270, 1563),
(180, 270, 1592);

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int(10) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image`) VALUES
(1, 3, 'image.png'),
(2, 5, 'image.png');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) NOT NULL,
  `region_id` int(10) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `country_code` char(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=464 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `region_id`, `name`, `slug`, `country_code`, `status`) VALUES
(1, 1, 'Asker', 'asker', '2', 1),
(2, 1, 'Aurskog Høland', 'Aurskog Høland', '2', 1),
(3, 1, 'Bærum', 'Bærum', '2', 1),
(4, 1, 'Eidsvoll ', 'Eidsvoll ', '2', 1),
(5, 1, 'Enebakk', 'Enebakk', '2', 1),
(6, 1, 'Fet', 'Fet', '2', 1),
(7, 1, 'Frogn - Drøbak', 'Frogn - Drøbak', '2', 1),
(8, 1, 'Gjerdrum', 'Gjerdrum', '2', 1),
(9, 1, 'Hole', 'Hole', '2', 1),
(10, 1, 'Lørenskog', 'Lørenskog', '2', 1),
(11, 1, 'Nannestad', 'Nannestad', '2', 1),
(12, 1, 'Nes', 'Nes', '2', 1),
(13, 1, 'Nesodden', 'Nesodden', '2', 1),
(14, 1, 'Nittedal', 'Nittedal', '2', 1),
(15, 1, 'Oppegård', 'Oppegård', '2', 1),
(16, 1, 'Rælingen', 'Rælingen', '2', 1),
(17, 1, 'Skedsmo', 'Skedsmo', '2', 1),
(18, 1, 'Ski', 'Ski', '2', 1),
(19, 1, 'Sørum', 'Sørum', '2', 1),
(20, 1, 'Ullensaker', 'Ullensaker', '2', 1),
(21, 1, 'Vestby - Son', 'Vestby - Son', '2', 1),
(22, 1, 'Ås', 'Ås', '2', 1),
(23, 2, 'Åmli', 'amli', 'no', 1),
(24, 2, 'Arendal', 'arendal', 'no', 1),
(25, 2, 'Birkenes', 'birkenes', 'no', 1),
(26, 2, 'Bygland', 'bygland', 'no', 1),
(27, 2, 'Bykle', 'bykle', 'no', 1),
(28, 2, 'Evje Og Hornnes', 'evje-og-hornnes', 'no', 1),
(29, 2, 'Froland', 'froland', 'no', 1),
(30, 2, 'Gjerstad', 'gjerstad', 'no', 1),
(31, 2, 'Grimstad', 'grimstad', 'no', 1),
(32, 2, 'Iveland', 'iveland', 'no', 1),
(33, 2, 'Lillesand', 'lillesand', 'no', 1),
(34, 2, 'Risør', 'ris%c3%b8r', 'no', 1),
(35, 2, 'Tvedestrand', 'tvedestrand', 'no', 1),
(36, 2, 'Valle', 'valle', 'no', 1),
(37, 2, 'Vegårshei', 'vegarshei', 'no', 1),
(38, 3, 'Ål', 'al', 'no', 1),
(39, 3, 'Drammen', 'drammen', 'no', 1),
(40, 3, 'Flesberg', 'flesberg', 'no', 1),
(41, 3, 'Flå', 'fla', 'no', 1),
(42, 3, 'Gol', 'gol', 'no', 1),
(43, 3, 'Hemsedal', 'hemsedal', 'no', 1),
(44, 3, 'Hol', 'hol', 'no', 1),
(45, 3, 'Hole', 'hole', 'no', 1),
(46, 3, 'Hurum', 'hurum', 'no', 1),
(47, 3, 'Kongsberg', 'kongsberg', 'no', 1),
(48, 3, 'Krødsherad', 'kr%c3%b8dsherad', 'no', 1),
(49, 3, 'Lier', 'lier', 'no', 1),
(50, 3, 'Modum', 'modum', 'no', 1),
(51, 3, 'Nedre Eiker', 'nedre-eiker', 'no', 1),
(52, 3, 'Nes', 'nes', 'no', 1),
(53, 3, 'Nore Og Uvdal', 'nore-og-uvdal', 'no', 1),
(54, 3, 'Øvre Eiker', '%c3%98vre-eiker', 'no', 1),
(55, 3, 'Ringerike', 'ringerike', 'no', 1),
(56, 3, 'Rollag', 'rollag', 'no', 1),
(57, 3, 'Røyken', 'r%c3%b8yken', 'no', 1),
(58, 3, 'Sigdal', 'sigdal', 'no', 1),
(59, 4, 'Alta', 'alta', 'no', 1),
(60, 4, 'Batsfjord', 'batsfjord', 'no', 1),
(61, 4, 'Berlevag', 'berlevag', 'no', 1),
(62, 4, 'Hammerfest', 'hammerfest', 'no', 1),
(63, 4, 'Hasvik', 'hasvik', 'no', 1),
(64, 4, 'Havoysund', 'havoysund', 'no', 1),
(65, 4, 'Honningsvag', 'honningsvag', 'no', 1),
(66, 4, 'Kamoyvaer', 'kamoyvaer', 'no', 1),
(67, 4, 'Karasjok', 'karasjok', 'no', 1),
(68, 4, 'Kautokeino', 'kautokeino', 'no', 1),
(69, 4, 'Kirkenes', 'kirkenes', 'no', 1),
(70, 4, 'Lakselv', 'lakselv', 'no', 1),
(71, 4, 'Mehamn', 'mehamn', 'no', 1),
(72, 4, 'North Cape', 'north-cape', 'no', 1),
(73, 4, 'Oksfjord', 'oksfjord', 'no', 1),
(74, 4, 'Repvag', 'repvag', 'no', 1),
(75, 4, 'Skarsvag', 'skarsvag', 'no', 1),
(76, 4, 'Talvik', 'talvik', 'no', 1),
(77, 4, 'Tana', 'tana', 'no', 1),
(78, 4, 'Vadso', 'vadso', 'no', 1),
(79, 4, 'Vardo', 'vardo', 'no', 1),
(80, 5, 'Alvdal', 'alvdal', 'no', 1),
(81, 5, 'Eidskog', 'eidskog', 'no', 1),
(82, 5, 'Elverum', 'elverum', 'no', 1),
(83, 5, 'Engerdal', 'engerdal', 'no', 1),
(84, 5, 'Folldal', 'folldal', 'no', 1),
(85, 5, 'Grue', 'grue', 'no', 1),
(86, 5, 'Hamar', 'hamar', 'no', 1),
(87, 5, 'Kongsvinger', 'kongsvinger', 'no', 1),
(88, 5, 'Løten', 'l%c3%b8ten', 'no', 1),
(89, 5, 'Nord-odal', 'nord-odal', 'no', 1),
(90, 5, 'Os', 'os', 'no', 1),
(91, 5, 'Rendalen', 'rendalen', 'no', 1),
(92, 5, 'Ringsaker', 'ringsaker', 'no', 1),
(93, 5, 'Stange', 'stange', 'no', 1),
(94, 5, 'Stor-elvdal', 'stor-elvdal', 'no', 1),
(95, 5, 'Sør-odal', 's%c3%b8r-odal', 'no', 1),
(96, 5, 'Tolga', 'tolga', 'no', 1),
(97, 5, 'Trysil', 'trysil', 'no', 1),
(98, 5, 'Tynset', 'tynset', 'no', 1),
(99, 5, 'Våler', 'valer', 'no', 1),
(100, 5, 'Åmot', 'amot', 'no', 1),
(101, 5, 'Åsnes', 'asnes', 'no', 1),
(102, 6, 'Askøy', 'ask%c3%b8y', 'no', 1),
(103, 6, 'Austevoll', 'austevoll', 'no', 1),
(104, 6, 'Austrheim', 'austrheim', 'no', 1),
(105, 6, 'Bergen', 'bergen', 'no', 1),
(106, 6, 'Bømlo', 'b%c3%b8mlo', 'no', 1),
(107, 6, 'Eidfjord', 'eidfjord', 'no', 1),
(108, 6, 'Etne', 'etne', 'no', 1),
(109, 6, 'Fedje', 'fedje', 'no', 1),
(110, 6, 'Fitjar', 'fitjar', 'no', 1),
(111, 6, 'Fjell', 'fjell', 'no', 1),
(112, 6, 'Fusa', 'fusa', 'no', 1),
(113, 6, 'Granvin', 'granvin', 'no', 1),
(114, 6, 'Jondal', 'jondal', 'no', 1),
(115, 6, 'Kvam', 'kvam', 'no', 1),
(116, 6, 'Kvinnherad', 'kvinnherad', 'no', 1),
(117, 6, 'Lindås', 'lindas', 'no', 1),
(118, 6, 'Masfjorden', 'masfjorden', 'no', 1),
(119, 6, 'Meland', 'meland', 'no', 1),
(120, 6, 'Modalen', 'modalen', 'no', 1),
(121, 6, 'Odda', 'odda', 'no', 1),
(122, 6, 'Os', 'os', 'no', 1),
(123, 6, 'Osterøy', 'oster%c3%b8y', 'no', 1),
(124, 6, 'Øygarden', '%c3%98ygarden', 'no', 1),
(125, 6, 'Radøy', 'rad%c3%b8y', 'no', 1),
(126, 6, 'Samnanger', 'samnanger', 'no', 1),
(127, 6, 'Stord', 'stord', 'no', 1),
(128, 6, 'Sund', 'sund', 'no', 1),
(129, 6, 'Sveio', 'sveio', 'no', 1),
(130, 6, 'Tysnes', 'tysnes', 'no', 1),
(131, 6, 'Ullensvang', 'ullensvang', 'no', 1),
(132, 6, 'Ulvik', 'ulvik', 'no', 1),
(133, 6, 'Vaksdal', 'vaksdal', 'no', 1),
(134, 6, 'Voss', 'voss', 'no', 1),
(135, 7, 'Ålesund', 'alesund', 'no', 1),
(136, 7, 'Aukra', 'aukra', 'no', 1),
(137, 7, 'Aure', 'aure', 'no', 1),
(138, 7, 'Averøy', 'aver%c3%b8y', 'no', 1),
(139, 7, 'Eide', 'eide', 'no', 1),
(140, 7, 'Fræna', 'fr%c3%a6na', 'no', 1),
(141, 7, 'Frei', 'frei', 'no', 1),
(142, 7, 'Giske', 'giske', 'no', 1),
(143, 7, 'Gjemnes', 'gjemnes', 'no', 1),
(144, 7, 'Halsa', 'halsa', 'no', 1),
(145, 7, 'Haram', 'haram', 'no', 1),
(146, 7, 'Hareid', 'hareid', 'no', 1),
(147, 7, 'Herøy', 'her%c3%b8y', 'no', 1),
(148, 7, 'Kristiansund', 'kristiansund', 'no', 1),
(149, 7, 'Midsund', 'midsund', 'no', 1),
(150, 7, 'Molde', 'molde', 'no', 1),
(151, 7, 'Nesset', 'nesset', 'no', 1),
(152, 7, 'Norddal', 'norddal', 'no', 1),
(153, 7, 'Ørskog', '%c3%98rskog', 'no', 1),
(154, 7, 'Ørsta', '%c3%98rsta', 'no', 1),
(155, 7, 'Rauma', 'rauma', 'no', 1),
(156, 7, 'Rindal', 'rindal', 'no', 1),
(157, 7, 'Sande', 'sande', 'no', 1),
(158, 7, 'Sandøy', 'sand%c3%b8y', 'no', 1),
(159, 7, 'Skodje', 'skodje', 'no', 1),
(160, 7, 'Smøla', 'sm%c3%b8la', 'no', 1),
(161, 7, 'Stordal', 'stordal', 'no', 1),
(162, 7, 'Stranda', 'stranda', 'no', 1),
(163, 7, 'Sula', 'sula', 'no', 1),
(164, 7, 'Sunndal', 'sunndal', 'no', 1),
(165, 7, 'Surnadal', 'surnadal', 'no', 1),
(166, 7, 'Sykkylven', 'sykkylven', 'no', 1),
(167, 7, 'Tingvoll', 'tingvoll', 'no', 1),
(168, 7, 'Tustna', 'tustna', 'no', 1),
(169, 7, 'Ulstein', 'ulstein', 'no', 1),
(170, 7, 'Vanylven', 'vanylven', 'no', 1),
(171, 7, 'Vestnes', 'vestnes', 'no', 1),
(172, 7, 'Volda', 'volda', 'no', 1),
(173, 8, 'Alstahaug', 'alstahaug', 'no', 1),
(174, 8, 'Andøy', 'and%c3%b8y', 'no', 1),
(175, 8, 'Ballangen', 'ballangen', 'no', 1),
(176, 8, 'Beiarn', 'beiarn', 'no', 1),
(177, 8, 'Bindal', 'bindal', 'no', 1),
(178, 8, 'Bø', 'b%c3%b8', 'no', 1),
(179, 8, 'Bodø', 'bod%c3%b8', 'no', 1),
(180, 8, 'Brønnøy', 'br%c3%b8nn%c3%b8y', 'no', 1),
(181, 8, 'Dønna', 'd%c3%b8nna', 'no', 1),
(182, 8, 'Evenes', 'evenes', 'no', 1),
(183, 8, 'Fauske', 'fauske', 'no', 1),
(184, 8, 'Flakstad', 'flakstad', 'no', 1),
(185, 8, 'Gildeskål', 'gildeskal', 'no', 1),
(186, 8, 'Grane', 'grane', 'no', 1),
(187, 8, 'Hadsel', 'hadsel', 'no', 1),
(188, 8, 'Hamarøy', 'hamar%c3%b8y', 'no', 1),
(189, 8, 'Hattfjelldal', 'hattfjelldal', 'no', 1),
(190, 8, 'Hemnes', 'hemnes', 'no', 1),
(191, 8, 'Herøy', 'her%c3%b8y', 'no', 1),
(192, 8, 'Leirfjord', 'leirfjord', 'no', 1),
(193, 8, 'Lødingen', 'l%c3%b8dingen', 'no', 1),
(194, 8, 'Lurøy', 'lur%c3%b8y', 'no', 1),
(195, 8, 'Meløy', 'mel%c3%b8y', 'no', 1),
(196, 8, 'Moskenes', 'moskenes', 'no', 1),
(197, 8, 'Narvik', 'narvik', 'no', 1),
(198, 8, 'Nesna', 'nesna', 'no', 1),
(199, 8, 'Øksnes', '%c3%98ksnes', 'no', 1),
(200, 8, 'Rana', 'rana', 'no', 1),
(201, 8, 'Rødøy', 'r%c3%b8d%c3%b8y', 'no', 1),
(202, 8, 'Røst', 'r%c3%b8st', 'no', 1),
(203, 8, 'Saltdal', 'saltdal', 'no', 1),
(204, 8, 'Sømna', 's%c3%b8mna', 'no', 1),
(205, 8, 'Sørfold', 's%c3%b8rfold', 'no', 1),
(206, 8, 'Sortland', 'sortland', 'no', 1),
(207, 8, 'Steigen', 'steigen', 'no', 1),
(208, 8, 'Tjeldsund', 'tjeldsund', 'no', 1),
(209, 8, 'Træna', 'tr%c3%a6na', 'no', 1),
(210, 8, 'Tysfjord', 'tysfjord', 'no', 1),
(211, 8, 'Værøy', 'v%c3%a6r%c3%b8y', 'no', 1),
(212, 8, 'Vågan', 'vagan', 'no', 1),
(213, 8, 'Vefsn', 'vefsn', 'no', 1),
(214, 8, 'Vega', 'vega', 'no', 1),
(215, 8, 'Vestvågøy', 'vestvag%c3%b8y', 'no', 1),
(216, 8, 'Vevelstad', 'vevelstad', 'no', 1),
(217, 9, 'Flatanger', 'flatanger', 'no', 1),
(218, 9, 'Fosnes', 'fosnes', 'no', 1),
(219, 9, 'Frosta', 'frosta', 'no', 1),
(220, 9, 'Grong', 'grong', 'no', 1),
(221, 9, 'Høylandet', 'h%c3%b8ylandet', 'no', 1),
(222, 9, 'Inderøy', 'inder%c3%b8y', 'no', 1),
(223, 9, 'Leka', 'leka', 'no', 1),
(224, 9, 'Leksvik', 'leksvik', 'no', 1),
(225, 9, 'Levanger', 'levanger', 'no', 1),
(226, 9, 'Lierne', 'lierne', 'no', 1),
(227, 9, 'Meråker', 'meraker', 'no', 1),
(228, 9, 'Mosvik', 'mosvik', 'no', 1),
(229, 9, 'Nærøy', 'n%c3%a6r%c3%b8y', 'no', 1),
(230, 9, 'Namdalseid', 'namdalseid', 'no', 1),
(231, 9, 'Namsos', 'namsos', 'no', 1),
(232, 9, 'Namsskogan', 'namsskogan', 'no', 1),
(233, 9, 'Overhalla', 'overhalla', 'no', 1),
(234, 9, 'Røyrvik', 'r%c3%b8yrvik', 'no', 1),
(235, 9, 'Snåsa', 'snasa', 'no', 1),
(236, 9, 'Steinkjer', 'steinkjer', 'no', 1),
(237, 9, 'Stjørdal', 'stj%c3%b8rdal', 'no', 1),
(238, 9, 'Verdal', 'verdal', 'no', 1),
(239, 9, 'Verran', 'verran', 'no', 1),
(240, 9, 'Vikna', 'vikna', 'no', 1),
(241, 10, 'Dovre', 'dovre', 'no', 1),
(242, 10, 'Etnedal', 'etnedal', 'no', 1),
(243, 10, 'Gausdal', 'gausdal', 'no', 1),
(244, 10, 'Gjøvik', 'gj%c3%b8vik', 'no', 1),
(245, 10, 'Gran', 'gran', 'no', 1),
(246, 10, 'Jevnaker', 'jevnaker', 'no', 1),
(247, 10, 'Lesja', 'lesja', 'no', 1),
(248, 10, 'Lillehammer', 'lillehammer', 'no', 1),
(249, 10, 'Lom', 'lom', 'no', 1),
(250, 10, 'Lunner', 'lunner', 'no', 1),
(251, 10, 'Nord-aurdal', 'nord-aurdal', 'no', 1),
(252, 10, 'Nord-fron', 'nord-fron', 'no', 1),
(253, 10, 'Nordre Land', 'nordre-land', 'no', 1),
(254, 10, 'Østre Toten', '%c3%98stre-toten', 'no', 1),
(255, 10, 'Øyer', '%c3%98yer', 'no', 1),
(256, 10, 'Øystre Slidre', '%c3%98ystre-slidre', 'no', 1),
(257, 10, 'Ringebu', 'ringebu', 'no', 1),
(258, 10, 'Sel', 'sel', 'no', 1),
(259, 10, 'Skjåk', 'skjak', 'no', 1),
(260, 10, 'Søndre Land', 's%c3%b8ndre-land', 'no', 1),
(261, 10, 'Sør-aurdal', 's%c3%b8r-aurdal', 'no', 1),
(262, 10, 'Sør-fron', 's%c3%b8r-fron', 'no', 1),
(263, 10, 'Vågå', 'vaga', 'no', 1),
(264, 10, 'Vang', 'vang', 'no', 1),
(265, 10, 'Vestre Slidre', 'vestre-slidre', 'no', 1),
(266, 10, 'Vestre Toten', 'vestre-toten', 'no', 1),
(267, 11, 'Bjerke', 'bjerke', 'no', 1),
(268, 11, 'Bygdøy-frogner', 'bygd%c3%b8y-frogner', 'no', 1),
(269, 11, 'Bøler', 'b%c3%b8ler', 'no', 1),
(270, 11, 'Ekeberg-bekkelaget', 'ekeberg-bekkelaget', 'no', 1),
(271, 11, 'Furuset', 'furuset', 'no', 1),
(272, 11, 'Gamle Oslo', 'gamle-oslo', 'no', 1),
(273, 11, 'Grefsen-kjelsås', 'grefsen-kjelsas', 'no', 1),
(274, 11, 'Grorud', 'grorud', 'no', 1),
(275, 11, 'Grünerløkka-sofienberg', 'grunerl%c3%b8kka-sofienberg', 'no', 1),
(276, 11, 'Hellerud', 'hellerud', 'no', 1),
(277, 11, 'Helsfyr-sinsen', 'helsfyr-sinsen', 'no', 1),
(278, 11, 'Lambertseter', 'lambertseter', 'no', 1),
(279, 11, 'Manglerud', 'manglerud', 'no', 1),
(280, 11, 'Nordstrand', 'nordstrand', 'no', 1),
(281, 11, 'Romsås', 'romsas', 'no', 1),
(282, 11, 'Røa', 'r%c3%b8a', 'no', 1),
(283, 11, 'Sagene-torshov', 'sagene-torshov', 'no', 1),
(284, 11, 'Sogn', 'sogn', 'no', 1),
(285, 11, 'St. Hanshaugen-ullevål', 'st-hanshaugen-ulleval', 'no', 1),
(286, 11, 'Stovner', 'stovner', 'no', 1),
(287, 11, 'Søndre Nordstrand', 's%c3%b8ndre-nordstrand', 'no', 1),
(288, 11, 'Ullern', 'ullern', 'no', 1),
(289, 11, 'Uranienborg-majorstuen', 'uranienborg-majorstuen', 'no', 1),
(290, 11, 'Vinderen', 'vinderen', 'no', 1),
(291, 11, 'Østensjø', '%c3%98stensj%c3%b8', 'no', 1),
(292, 12, 'Aremark', 'aremark', 'no', 1),
(293, 12, 'Askim', 'askim', 'no', 1),
(294, 12, 'Eidsberg', 'eidsberg', 'no', 1),
(295, 12, 'Fredrikstad', 'fredrikstad', 'no', 1),
(296, 12, 'Halden', 'halden', 'no', 1),
(297, 12, 'Hobøl', 'hob%c3%b8l', 'no', 1),
(298, 12, 'Hvaler', 'hvaler', 'no', 1),
(299, 12, 'Marker', 'marker', 'no', 1),
(300, 12, 'Moss', 'moss', 'no', 1),
(301, 12, 'Rakkestad', 'rakkestad', 'no', 1),
(302, 12, 'Rygge', 'rygge', 'no', 1),
(303, 12, 'Rømskog', 'r%c3%b8mskog', 'no', 1),
(304, 12, 'Råde', 'rade', 'no', 1),
(305, 12, 'Sarpsborg', 'sarpsborg', 'no', 1),
(306, 12, 'Skiptvet', 'skiptvet', 'no', 1),
(307, 12, 'Spydeberg', 'spydeberg', 'no', 1),
(308, 12, 'Trøgstad', 'tr%c3%b8gstad', 'no', 1),
(309, 12, 'Våler', 'valer', 'no', 1),
(310, 13, 'Bjerkreim', 'bjerkreim', 'no', 1),
(311, 13, 'Bokn', 'bokn', 'no', 1),
(312, 13, 'Eigersund', 'eigersund', 'no', 1),
(313, 13, 'Finnøy', 'finn%c3%b8y', 'no', 1),
(314, 13, 'Forsand', 'forsand', 'no', 1),
(315, 13, 'Gjesdal', 'gjesdal', 'no', 1),
(316, 13, 'Haugesund', 'haugesund', 'no', 1),
(317, 13, 'Hjelmeland', 'hjelmeland', 'no', 1),
(318, 13, 'Hå', 'ha', 'no', 1),
(319, 13, 'Karmøy', 'karm%c3%b8y', 'no', 1),
(320, 13, 'Klepp', 'klepp', 'no', 1),
(321, 13, 'Kvitsøy', 'kvits%c3%b8y', 'no', 1),
(322, 13, 'Lund', 'lund', 'no', 1),
(323, 13, 'Randaberg', 'randaberg', 'no', 1),
(324, 13, 'Rennesøy', 'rennes%c3%b8y', 'no', 1),
(325, 13, 'Sandnes', 'sandnes', 'no', 1),
(326, 13, 'Sauda', 'sauda', 'no', 1),
(327, 13, 'Sokndal', 'sokndal', 'no', 1),
(328, 13, 'Sola', 'sola', 'no', 1),
(329, 13, 'Stavanger', 'stavanger', 'no', 1),
(330, 13, 'Strand', 'strand', 'no', 1),
(331, 13, 'Suldal', 'suldal', 'no', 1),
(332, 13, 'Time', 'time', 'no', 1),
(333, 13, 'Tysvær', 'tysv%c3%a6r', 'no', 1),
(334, 13, 'Utsira', 'utsira', 'no', 1),
(335, 13, 'Vindafjord', 'vindafjord', 'no', 1),
(336, 14, 'Årdal', 'ardal', 'no', 1),
(337, 14, 'Askvoll', 'askvoll', 'no', 1),
(338, 14, 'Aurland', 'aurland', 'no', 1),
(339, 14, 'Balestrand', 'balestrand', 'no', 1),
(340, 14, 'Bremanger', 'bremanger', 'no', 1),
(341, 14, 'Eid', 'eid', 'no', 1),
(342, 14, 'Fjaler', 'fjaler', 'no', 1),
(343, 14, 'Flora', 'flora', 'no', 1),
(344, 14, 'Førde', 'f%c3%b8rde', 'no', 1),
(345, 14, 'Gaular', 'gaular', 'no', 1),
(346, 14, 'Gloppen', 'gloppen', 'no', 1),
(347, 14, 'Gulen', 'gulen', 'no', 1),
(348, 14, 'Hornindal', 'hornindal', 'no', 1),
(349, 14, 'Høyanger', 'h%c3%b8yanger', 'no', 1),
(350, 14, 'Hyllestad', 'hyllestad', 'no', 1),
(351, 14, 'Jølster', 'j%c3%b8lster', 'no', 1),
(352, 14, 'Lærdal', 'l%c3%a6rdal', 'no', 1),
(353, 14, 'Leikanger', 'leikanger', 'no', 1),
(354, 14, 'Luster', 'luster', 'no', 1),
(355, 14, 'Naustdal', 'naustdal', 'no', 1),
(356, 14, 'Selje', 'selje', 'no', 1),
(357, 14, 'Sogndal', 'sogndal', 'no', 1),
(358, 14, 'Solund', 'solund', 'no', 1),
(359, 14, 'Stryn', 'stryn', 'no', 1),
(360, 14, 'Vågsøy', 'vags%c3%b8y', 'no', 1),
(361, 14, 'Vik', 'vik', 'no', 1),
(362, 15, 'Åfjord', 'afjord', 'no', 1),
(363, 15, 'Agdenes', 'agdenes', 'no', 1),
(364, 15, 'Bjugn', 'bjugn', 'no', 1),
(365, 15, 'Frøya', 'fr%c3%b8ya', 'no', 1),
(366, 15, 'Hemne', 'hemne', 'no', 1),
(367, 15, 'Hitra', 'hitra', 'no', 1),
(368, 15, 'Holtålen', 'holtalen', 'no', 1),
(369, 15, 'Klæbu', 'kl%c3%a6bu', 'no', 1),
(370, 15, 'Malvik', 'malvik', 'no', 1),
(371, 15, 'Meldal', 'meldal', 'no', 1),
(372, 15, 'Melhus', 'melhus', 'no', 1),
(373, 15, 'Midtre Gauldal', 'midtre-gauldal', 'no', 1),
(374, 15, 'Oppdal', 'oppdal', 'no', 1),
(375, 15, 'Orkdal', 'orkdal', 'no', 1),
(376, 15, 'Ørland', '%c3%98rland', 'no', 1),
(377, 15, 'Osen', 'osen', 'no', 1),
(378, 15, 'Rennebu', 'rennebu', 'no', 1),
(379, 15, 'Rissa', 'rissa', 'no', 1),
(380, 15, 'Roan', 'roan', 'no', 1),
(381, 15, 'Røros', 'r%c3%b8ros', 'no', 1),
(382, 15, 'Selbu', 'selbu', 'no', 1),
(383, 15, 'Skaun', 'skaun', 'no', 1),
(384, 15, 'Snillfjord', 'snillfjord', 'no', 1),
(385, 15, 'Trondheim', 'trondheim', 'no', 1),
(386, 15, 'Tydal', 'tydal', 'no', 1),
(387, 16, 'Bamble', 'bamble', 'no', 1),
(388, 16, 'Bø', 'b%c3%b8', 'no', 1),
(389, 16, 'Drangedal', 'drangedal', 'no', 1),
(390, 16, 'Fyresdal', 'fyresdal', 'no', 1),
(391, 16, 'Hjartdal', 'hjartdal', 'no', 1),
(392, 16, 'Kragerø', 'krager%c3%b8', 'no', 1),
(393, 16, 'Kviteseid', 'kviteseid', 'no', 1),
(394, 16, 'Nissedal', 'nissedal', 'no', 1),
(395, 16, 'Nome', 'nome', 'no', 1),
(396, 16, 'Notodden', 'notodden', 'no', 1),
(397, 16, 'Porsgrunn', 'porsgrunn', 'no', 1),
(398, 16, 'Sauherad', 'sauherad', 'no', 1),
(399, 16, 'Seljord', 'seljord', 'no', 1),
(400, 16, 'Siljan', 'siljan', 'no', 1),
(401, 16, 'Skien', 'skien', 'no', 1),
(402, 16, 'Tinn', 'tinn', 'no', 1),
(403, 16, 'Tokke', 'tokke', 'no', 1),
(404, 16, 'Vinje', 'vinje', 'no', 1),
(405, 17, 'Balsfjord', 'balsfjord', 'no', 1),
(406, 17, 'Bardu', 'bardu', 'no', 1),
(407, 17, 'Berg', 'berg', 'no', 1),
(408, 17, 'Bjarkøy', 'bjark%c3%b8y', 'no', 1),
(409, 17, 'Dyrøy', 'dyr%c3%b8y', 'no', 1),
(410, 17, 'Gratangen', 'gratangen', 'no', 1),
(411, 17, 'Harstad', 'harstad', 'no', 1),
(412, 17, 'Ibestad', 'ibestad', 'no', 1),
(413, 17, 'Kåfjord', 'kafjord', 'no', 1),
(414, 17, 'Karlsøy', 'karls%c3%b8y', 'no', 1),
(415, 17, 'Kvæfjord', 'kv%c3%a6fjord', 'no', 1),
(416, 17, 'Kvænangen', 'kv%c3%a6nangen', 'no', 1),
(417, 17, 'Lavangen', 'lavangen', 'no', 1),
(418, 17, 'Lenvik', 'lenvik', 'no', 1),
(419, 17, 'Lyngen', 'lyngen', 'no', 1),
(420, 17, 'Målselv', 'malselv', 'no', 1),
(421, 17, 'Nordreisa', 'nordreisa', 'no', 1),
(422, 17, 'Salangen', 'salangen', 'no', 1),
(423, 17, 'Skånland', 'skanland', 'no', 1),
(424, 17, 'Skjervøy', 'skjerv%c3%b8y', 'no', 1),
(425, 17, 'Sørreisa', 's%c3%b8rreisa', 'no', 1),
(426, 17, 'Storfjord', 'storfjord', 'no', 1),
(427, 17, 'Torsken', 'torsken', 'no', 1),
(428, 17, 'Tranøy', 'tran%c3%b8y', 'no', 1),
(429, 17, 'Tromsø', 'troms%c3%b8', 'no', 1),
(430, 18, 'Åseral', 'aseral', 'no', 1),
(431, 18, 'Audnedal', 'audnedal', 'no', 1),
(432, 18, 'Farsund', 'farsund', 'no', 1),
(433, 18, 'Flekkefjord', 'flekkefjord', 'no', 1),
(434, 18, 'Hægebostad', 'h%c3%a6gebostad', 'no', 1),
(435, 18, 'Kristiansand', 'kristiansand', 'no', 1),
(436, 18, 'Kvinesdal', 'kvinesdal', 'no', 1),
(437, 18, 'Lindesnes', 'lindesnes', 'no', 1),
(438, 18, 'Lyngdal', 'lyngdal', 'no', 1),
(439, 18, 'Mandal', 'mandal', 'no', 1),
(440, 18, 'Marnardal', 'marnardal', 'no', 1),
(441, 18, 'Sirdal', 'sirdal', 'no', 1),
(442, 18, 'Songdalen', 'songdalen', 'no', 1),
(443, 18, 'Søgne', 's%c3%b8gne', 'no', 1),
(444, 18, 'Vennesla', 'vennesla', 'no', 1),
(445, 19, 'Andebu', 'andebu', 'no', 1),
(446, 19, 'Hof', 'hof', 'no', 1),
(447, 19, 'Holmestrand', 'holmestrand', 'no', 1),
(448, 19, 'Horten', 'horten', 'no', 1),
(449, 19, 'Lardal', 'lardal', 'no', 1),
(450, 19, 'Larvik', 'larvik', 'no', 1),
(451, 19, 'Nøtterøy', 'n%c3%b8tter%c3%b8y', 'no', 1),
(452, 19, 'Re', 're', 'no', 1),
(453, 19, 'Sande', 'sande', 'no', 1),
(454, 19, 'Sandefjord', 'sandefjord', 'no', 1),
(455, 19, 'Stokke', 'stokke', 'no', 1),
(456, 19, 'Svelvik', 'svelvik', 'no', 1),
(457, 19, 'Tjøme', 'tj%c3%b8me', 'no', 1),
(458, 19, 'Tønsberg', 't%c3%b8nsberg', 'no', 1),
(459, NULL, 'Billingstad', 'billingstad', '1', 1),
(460, NULL, 'Haslum', 'haslum', '1', 1),
(461, NULL, 'Hosle', 'hosle', '1', 1),
(462, NULL, 'ggggggggggggg', 'yyyyyyyyyyyyyyyyy', '1', 1),
(463, NULL, 'Hurdal', 'Hurdal', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commercial_ads`
--

CREATE TABLE IF NOT EXISTS `commercial_ads` (
  `id` int(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `category_id` int(12) NOT NULL,
  `top_ad` varchar(200) DEFAULT NULL,
  `top_ad_url` varchar(225) DEFAULT NULL,
  `left_ad` varchar(200) DEFAULT NULL,
  `left_ad_url` varchar(225) DEFAULT NULL,
  `right_ad` varchar(200) DEFAULT NULL,
  `right_ad_url` varchar(225) DEFAULT NULL,
  `centre_ad` varchar(200) DEFAULT NULL,
  `centre_ad_url` varchar(225) DEFAULT NULL,
  `bottom_ad` varchar(200) DEFAULT NULL,
  `bottom_ad_url` varchar(225) DEFAULT NULL,
  `status` int(12) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercial_ads`
--

INSERT INTO `commercial_ads` (`id`, `name`, `url`, `category_id`, `top_ad`, `top_ad_url`, `left_ad`, `left_ad_url`, `right_ad`, `right_ad_url`, `centre_ad`, `centre_ad_url`, `bottom_ad`, `bottom_ad_url`, `status`) VALUES
(1, 'Category Page (category)', 'http://localhost/classified/frontend/web/', 0, 'top-banner.jpg', 'https://www.google.com', 'left-bannar.jpg', 'https://www.google.com', 'right-bannar.jpg', 'https://www.google.com', 'bottom-ad.png', 'https://www.google.com', 'center-ad.jpg', 'https://www.google.com', 0),
(40, 'Category Page (Sub category)', 'localhost/classified/frontend/web/index.php?r=category%2Fcategories&id=1', 1, 'cate_top_size_image.png', '', 'cate_left_size_image.png', '', 'cate_right_size_image.png', '', '', '', '', '', 0),
(41, ' Kjøretøy ', 'test', 3, 'CAR_cate_top_size_image - Copy.png', '', 'CAR_cate_left_size_image.png', '', 'CAR_cate_left_size_image.png', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `commercial_search_ads`
--

CREATE TABLE IF NOT EXISTS `commercial_search_ads` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(12) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `notes` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `image_type` varchar(35) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercial_search_ads`
--

INSERT INTO `commercial_search_ads` (`id`, `title`, `category_id`, `url`, `image`, `notes`, `user_id`, `image_type`, `price`, `status`) VALUES
(1, 'This is it', 10, 'http://www.google.com', 0x89504e470d0a1a0a0000000d494844520000005a0000004608060000004cbc83e20000200049444154789c84bb59b0e5d779ddf7dbc37f3af3b96377df9e0034664e204109a41442b46c32962bb2625ba9a44a8e145552192a8f49552a55aae28b9ff398d84aaa9cc8e544a622d9a6a39244911485109c091040636c347abef319fff39ef2f0bf0d92f290fb72ee3df79c3bacfded6faf6fadb585f73e84101042f0d38f3ffdf1f0b9e57a4ed3e66c8c7758aee754ed092a1ef2c3f7fe9472dd609b8a716f9bc5c99c955962db86a8efd0a18fb30555056b738c7596611691648e75d122091495a1f615e5b2473fce30f18c2475600383b887148e281d70f720e7e870cd381b1074838e2dcbb5a517252002e361866f7b1c2d8ed99ac68ca28ca355c5649a725a16843266d2cff83b5ffc6dae7ff03dde7dfd3a7e20184c13825b134719de6af6361f67988e11f18227ae7e962b3b1f6732de0614107e069b871f7f15b79fc1d07bff6fffeed99b1f026d6dc3c9ea3e8db3accb398bfc0e753be368b6c0b5122d149e1ce51dc7b335fd38234d62da2a67301a319bb7a8b8c4d120d39238788e16062f242114045ad29e403b8f45924409090df7f72b1a17519682c589a23639593f3099c2b52724c73385291382d32c561545a1f1758b5486cd8d2ddae0699b3952492e5f7c0c1f1d112b4f53370cd4801fbf77cae624c30bcd78b0c1b50b9f61344879fcea73f47b7dfafd0dc6832952083a5cfff562fcff035aff3b4126606d8d5011ce59ee9f7cc069fe3602c972bd222f4b5679c1626db18d21d19e205a9c09182fd0c3161b6608623c069f34cc8f5bcab2a0959e7e56e19da0585bceef0e91bd9cfda32503a9c89229555cb2c81d650541a5ac9635836c48ee57547520b39efde33ec679c663c3bd5b0dab798dad331c2d7162385e1f10eb09d31d8dc0b2ac6f82912404e24c735aacb1417274d2d0eff54823c1d6ce36a91a5255357bbb57b8fede77f9c4b32fa28482f0937a0e217c5888defb7f1794e87ffb2a745b422a8db11eef1c79b16055b534654ba402b6f0c4ed80ed698ffb470ff041d37ac3f1ec94ed8d14eb2dc67b6ce37870700f132cf552311c09b468c8648fd186c49e6f7036600cc432e668d93019ccc9748f265468ad58d7258d5ca3db1e936407d49a7e4f7078b8440a0dd51e7b3bdb9c3c7885c6ad1122209c24b331242b8c0d1c1db5282dd898a634b242ae86d40d681138cd4b1a2fa9dc8a975ef90a9ffde88b6c6f66042a1e7fe429944c512210f837e3f510f0bfda7a1f3eafff6a8f79f8f5c3cf95883054acab39de3ba6d90eb9abd0ca92edc48c7b57b877ff030e9a07b4b2a62d1a5219813254b541a030de518786a65194a665aa636c29185f6c89079ebe4cf1ce305f6af21c66ab1a9d0db0e582fcc8736eeb1cc82577f65b8c5ff389a79ee7c1e207b83662b568984e270c26317973139180ca0571df2152c97251b27731c31a435d4854a2c9eb964b9b113986d5bc653bdb420c34c629341623e6bc77f05dd6f531afbcf143b4dae0fcf655ce6f5ee4d2de45b4968487b80510a2abf21002a2fbe4c39ee07dc007df55f44fafc2bf69359aa606a1b8b0f51887f3dbd4769f81d2cc8a7bdc3dbe8b701a2b4b308ab236f4c611934d497eaaa08dc8eb196d6319c40e3510786d196e1aa228e6783f50bb35a6161c1e5744fd04a5071cdda9d9dbc9180fc72ccb9c93e31655f5294ccea9fb017ab0e2e848d21bc6b461c1d1e18aaa4a70ad60f7b184c5a261304a51a245861a2b2417af3a8ad3c0fc10b6fa09c34d8317827befeea37a194dddd01fed206c6098ecb03bf908dfbaf115ca3ce2c76fbdc6289bf2ece3cff1c2a75e200888548473ae033a04aaaa26d21a29012465d120b5224e53b473ee6700feab151d42002119f7365122a055c2a2b8c1b23ca6ca255555921733e238d0da86c6956ca7038ad99a750eb66a7864ef125eb42cf27b88a865bc59515586776f42b17058e9e8c95d1a33a7bcef99ad5688d8331804b636fa6c6d0b44df50b94075ead8bf9d53d701ddab69ad44ab08dd57480757b7cfa3fa479810313bce194f7aa43dc9ecb4a53502a1255a594e571585355cd81db3fbd93e21ecb05ce49465c9a8dfa76d977cf0de034e0f24eb62cddec5094d932322cfe1f10312dd47478ac16048d3189c735807520a4200ef1d524a9490d8d6a09552ff5a0587b35d21ce8abb478ad61a1f1c657d445d43ecb75917ef625c492fab290b8f9219fdd873ff7ec5681c31c8622e3d7281621598af6fb1cac152b378a01151ccfed12934096569d1f22695753851b1a1375888131a3c5ead0841334907945b156d6d708d20728a44044a5b8155489571e7e088c1d0608f2d593a6077a7606bd7e0a4e2e2ae2608d83f00b10021245932c61b453ce9717c7444a4121a63288da5d7dc454ac7a38f059c53a017b876c0fce43ae73753b4dac49a84a9da201d6548a9102200028120f800b2ebe801f9b3ac4308f193561f7e02be52114dd37030bbc7697ec4c17c9fbacec9b23ee56a411c4fb07ece7c7d82c483305cd8f80c1b5b8aa699335fce99af2b564b816a3658358e78634d2fcdc89d25ee1bdac21344201d049a2a478440beaa99cb3e559372fbf62deacae305f85c130749b611a3ac43268aba0db495e3a03e21960a537ab6ce0d59150d79d5d0f78278a448534d1dc53cf8e084fa9ca3d9904479c1c6b08f6f6a1496811298754131de27b47dbc97481b706a45adeff2fd1b0f88549f27af7e9e34e9d31f8e88a31e4a0882f708290922e0acc51970a6e980fee961e5a7c978c0315f1da3554612274c871b780a86c900674b7082cde10eb70f6f12858ce79ff91c37efbe8ea2c7dd931f72581448a158af3cab85238a233636071c9ddea71586611651d4966ad5e06d8c51063f17c499410bd8deec9325810fde58b32e346dd3a2080c0603e8d714a664321a81ce2957016f03d64bb6461768ca35a7f72dd1d0b22c7396aec776b5c5747491c1a6a5356b6814c1394e4e6ae6479ecd210cb384c63510149b2266e54aea42a07484947067754024354a469c1c7f999dcd0b8ce25dbc031162b6a68f30194f316d4ef02d8b7c4694c4a8dff99ddff9d2435af2d3b4ce7b87b10d21487a5946ac63a49254f59a440f385dceb0ac98cdd7486198ade714eb438a5541de1e110d5bca55c37c59a0649fbac9b162c9717e847382a6b644fdc06c91636d200485af1559df319846544d606ba258342b149ed61bf2b547f808997afa5b8eb6b13869196ea494cd9ae063aaa5a56ed7643dc96023a66a4a621db33ddae3e69d5b54e69048195001d21a9578e64712a11dc642d00d521bb4541cde561034f355db51d526b02e2ca1f5b46dc3743261980dc8f303aa6686129a679ff914e3c936c78bf7d93fbac1d52b4f311e5d405bd712cb841004010fc8333e2889a31e49dcf51d3c9465cee9ec00834458c934bbc2bde2c7b4b621531b2ce72d6d288832cbc1fd15994c40054e9687a459c05887ad3c2e58b234667f7f89aea73466463f9d727bff01dbe787348b16b14e68ada45e421b72fa5b8a2851d445cbfc784d948e20021d02da2ab48ef1d2e1434729ab7acdc14149bf9740d6929bfb649124d49a225ad1eb4bd646e07d60b46918660352a1591525224df1c2a193409e5b9a00cdaa45590332106d0ce8f5625cdb72b87f074b8b9603f0735e7dfdab0cfb23eeefbf8e52296fbefb2a9ff8d82fa1feb3dffacd2f496909780e8fee9124095a2b0492b2ac5052764d3e044e57c71c2cee72ebfe5b2408445c32ea0dc8c479523d62301ce2a2234cdd50ad15e5da630a10ca800f98c2b2386cd12a6194f6e9eb146163fa63c9bc3a25e9795c21b976e569caa2a48d57180ceb95255fb40c7b9a68e0c99781f634a63f8d890681d255782fe9479a7259311944a4d3140f78d722d16829c94482948eddf3134619a848d01ac1609422454b3f6b49921ed2c608a5312e707a6c308dc73b8f45108423488740621a8b771e21244a41bfd7a3ad96e4cb07c8e0d1b2479a4df042a0fea3dff87b5fbafece2bb4b6e564becf7c3e6777fb3c22487ef0daeb2cf31c81e6c1e22d5e7df36b9c1e9fa0931527f323168b15c60aca72c6fce401972fee61bde1e46889f41952490c8628f6346d0b750fa515423ba2d8625a98d747547e8512016f0547b75b6ce1c8db395638d244727ad710ca94d196022339b7abb97fa7a62a1ac63b11ebb6824652978232afd063853b5b58ad40441e07b4a121edc744b1c40b41aa26a44253542bf6c603a2482023c3c628416a58cf12f23ca0bcc4fa8e2f8ffb2959344058686a83c3831764598af40a5f39daa6a6110123a058e6ccf303f43b6fbf830f8ef5fa75a4d4384e684d60bd5c1370dcbc7bc2c664c8babecb2c3f60d0ef7332ef58c1aa9cb3bbb5c17863877931e7c6ad0fc87a8a38ee11456374dc70e76481121ae324455512bb3e892c7118565585091eeb1cbd2446e6111115ab7c4db613f05816c79232f788d0e05dca6261199e1b93254baac6b0ff41ceb5a736b9f3c129bdfe9024ee019ed058c6bd313ad588c853ae2d562cf141524b43241de3812253318328224a1cf3d31ec13b8e8e055e26acaa1665244de31049a0df8bd156132bc5a26c48644c2f8988b5c2150d8d10843650044b1406f8a24436394919a15e78f1335f72a1a5692b6a57d1eb3b96c509b3c59cc604d68b82d3f58ca38335daa7548de0eecd9a621df052922f05d819e3de1ebb1b17d8180f682ac9c1f18c4c6e329b55946e892b2274c8e84f5bd082b4a7299b96b686c63ae224c679105e23ad4265926a29989d34b4ae254e15f3d38a2687b2a96985c19b40ec06e8083009556e198c7a94554d9e7b149aaa2ec8c490cde9109216250d9bbb7d7ab1c03629cbf59c74ac48f490a65118b389f5127c44a4522c2dd3c910613bc9368e525a6369ad65920e89907803aa97e1a5201302973a826d10da21128db5163d3fa8b9b0b7c7b31f7f82612fa11f6b9c4a489288c9604c92f6a916336e5dbfce70638b9d2b9738385df0eebbef73e7f43ab3f280a5356ca892417685a393130e1e1458a7d0c335c989c0fb01c920653e6bc9579247b612526f39cc2db110f447438aaa6271ea990c120eab35516ea9f300444422a238f4f854a1d30657496239403435956db9fdc19a484a4414f0bac6fb801481a2cc51bdc0786bccb52b4ff2e8e567f9d11b5fe660f580c9b4cfc776ff1af70e6ee3e54de6b38232f409614d3aca084e92e71599ee616a8b358224498948a99a9a49364688800d11e3f198a2cc69ab0ab9b349ec7a2867c9ed1211eb6e47bcfcadef84ab572fa39178295021105c8b0d0253d5cc0e6fa2db25c1d42c5bc57cbe24dbb8884e7b9c9687bcfcfa4bb8daf3c8a52d362617180fcfb1581f50db39bb1b3199da204d238c51bc79e34dbccab973e72e32686eddbfcd7c65897a01494c7592e093054a29ccbac16ba84d8bd611e4b02a1a7422194d3490e2d635512f62b00dbd2c669917f4fb195bc31dce9ddfe5fabbafd2cffafcfa7ff09ff3d6db7f864a7be8c471f3ce6dca7ccd783a80fa19eedcbbc1e6b9c0c191a7a91c837e4422351a8d0890e818e92549acd9dd1e837024bd84755ba188d1c4648301765eb076158d768c2584da824e89d218f59bbff6852fd5cb53eebdf55d74a439fae05d0eefbdcd703ce5fe6b7fc178d86772ed598e576bb2dd47685dc5683262324e78eae9679866439eb97a8dcf7ef217d9dbbb86d609c3be627b6bc26a798f54261c9ede66ddd6f47b1b1476c53c2ff9e28b7f931fbef3238474d826666fb4479c7a882a1adfd256012103512c31adc0d7312ad148dd478b31bde106c43d06c35dbc18809892c657e86797714c1061c4b9cda789a209d83ec14e39383ec0d686733b57385d9f328cce21cd846a0587872b7c2bf095c42e0dca47ac8f1b6ce57026a08442484ba4055248e64541b082348bc89773ecbaa18e3dd239540c320e58129c1554798e78e3bb7f1cb676f658dd7e8f734f3f4755e428ad904a90efdf45a53da6579e64b55cd21f6f7170e73ac139948fd97bf223d8b6a4cc6724f188c67b8c2910c1b3281e60ad2403a486376fbdceb5c77e813ffaf37f88332d97b6aef0c3b75ec55bcbaa743c72fe129ba30bfce1d7fe88d25a2824693c211e5e66637295e1f832321920b38848f7f0487c90782f4963503a2578898e23a43004015a6a94141dd391824809848e68ab1ce197c4aa25b2967c7ec0f7bffbc7983227f29a7e9a10494f7f9c219380ca047114d3139289eab1df2c114e31994ca85230ad23d8c02456a4590fef3d615da04609ac02c6d4e89e4e698a539c8e983d788fcdc79e4329c1e9dd9be85411920ca56336ce5d023c5b171ee3de8d57188e4628ad916a485db5d43610270991ce48071983a64f92ec70e7f62bdcf8e07b6422d0e4eff2c4a5984bbb9f80d6f1b1277e95e5ba64516f73f3e6ebfcf2e77e91fdd55d5e7de32d7ae34b6c5cfbbbe8de1e69e4e9c5b06a028488b89711a7194a4b648811c57d643a62315b32ecf750ed8a68bc8b9309ded418d7e90e8db104e7102181b0cdacf66c9e3fcff6958cfff4b3bfcafd1b3fe0cd6ffd09cdeaa013ab82673488287c89a9002dc84603d25a13477d56aea65a5a9ab261777393755dd36a85b1255ba32958834b2cb18a10f7de7c39b86010dea1e3115b8f3c8bc0e19d63797aca70730785c5eb04814278cf6c7ecc68b849a405c6d5d8b6c6d812e762469bbb086f097681f33ddeb9fd06c3acc7284d180d079ccc0e89a314190251dae7645172eec2e3fcfe1ffe43764703feafaffe29567d84f1ee2f80148c86238e67a7dcbdf51e663d270a154a7994b44819ba2a0d2dbe91f4476396cb198da991518c208210619d476a4d1011014d90112a4ad9dc9ed08b13185c62b2f70897b6fb8c534b75f41af35bdfe1e0de3be475c3f17ac974dca7efe163c939eea40e95094e960f7091844a30d998b2ae0ba412a810318ea0d015fd24236d1ac4f19dd7c37a718a42333977856cbc05389c87a0348280f00d881821342148acaf99cfefd25473da72890e35d9648fcddd8f22548cf48e604f414c286c45960c689b1cd91604d7d018f0d631989e8338c6d89aaf7fe36b7cedbbd711c34fb3ac3dd3d184fbefbdcee2f8c7ec6cf4b970f102d9b8df595478029a486aa224422ac1ad37dfa72e4a927ec660730382440868ea86b49775939d7538ebb0cee18ca5a96a9a6285730175fe0506173ece70d8677b92b03bd2f4dc030edefd4b6ebdf53dda72cd603022e0513dc17ab5a6adc166012cf4a3841683902089912a9017a74c2753221710f9ba08d8ba939274d4b9bc020202a162845004bfc279817511499a0082b65ee3ac41e91821245a2a441413444006f0768e943d3c11488903a40f4801018f77012be0e0ee6ddebd738fb7eec5bc7f68696b4b702d076f7f95f397fa0c06e33313d403022d054a6a94d6e828466b4d5b579cdcdbc7989638eb118f2628e1695a439265040fc1399c77b8d0edd6e03d048dab6b848c58cf8f09d34f307df4e749e3982c8dd89846ec0e32a6f19cf9adeff0fe9bdfc19882c146ca7cb1a4692dc62bf262414fc5acab9a244bc9fa7d826bc97444e425cbb242cc66f3509505b6aeb04d4bd2cb88b24ec856714ca4630225a669a96b4196c6a4599fd6d6803c73140202ce162660adc5d92549dc47c81e1e475595246976e6e404f2d58cb7df7f9f5b0bc3bb47538eeeaf8863c9d1ed57994473a65b3d6a1b70c61382c75afb3306e899800e3ee0db165fd4b46d8348225aa1bb228834de77b67508be33567df8d04d521e44b038112122895f97f8d1b34c1e7b91388e48a39838538c078a8d41c4f951c9fcd6f7f8e0bd6fd2da05a7a5a5ae6a14025f7baad6d1cf6222e518f61411922c1de16d403cb877af0bd0c880372dabd592b8d7238e3350925ed2a3aae6c860a95b897796e168429474443c8a156d5d118420d60901870f81ba3a22cb4684a0f1ce52e46b7494727272c26030e5d67ac51b375bee9e6694b312644e79fc2a97f7a658ef69db16673b8bc839df9de4a17b7c68edbbe009d6e3da069a9610028d35148d41c7c9d94e80101c8140f09d711a7cc01883168a7e3fc3788f40e09c471883987c8c8dc75f24d2314a0b94d6c4b1a2d7d76cf42497a735f5fe0f79ffbdefb3ac5714eb25ebc51a95246c6c6c304c12b6867d863aa14d34a3518af8da3fffdf83d682e03cc880b186284a9052134420af6a8ca9694dc9e9bc617b7bcacef6186703ad31a43ac236254105f011699691a43d9406a9628e4fd7eccf72befdf22b3cf5d4137cfa859fe3adbce5dd930d96b7977807f9f23d76fa0b26d309693fa65c15040fd65a5ad3e09ced003e03dcdaaec28d3158677145455316c471cc7c9dd3fa00be73871e2ecac30cc6438f5429850c30ecf7294dfb13ebce39a4d0a88d9f67f2e8f344914609491c2be248216345120b76c78abd41cb6cff07dc79f76dca6a456b5b6414e8f7122e4c47ac4e0fd00426ba8778f59bff4f105a4370282970ce82e848b9b10e4ba74d4b65695639499221748cd4292a8e996e6e912409b57524498f341b12271a2534a78b39fff33ffaa7548de1d1ab5b3cf2e815bef9e3bbb8e1f35c9c0a12bfe0dd5b473cf378cc746f8b203c2104def8c1db2c4e17586bf1de75adc87b827f58d11d80ce39bc75b8a2a4692ab4d6aceb96d607827567bb207cf828844076163500324096a654ce744f7887f092e01cd6d68caefc87a47b4f91205191248a24320a4452126b18f452c63dc5b9a1a71f374853d0362b6cb3c6b635cbd5115bb1c5340bf4feec1469218e62aabaa635358240a413d234a6319e74d84328c1d6ee15363677487b53fac32151a43fcc33acab9a1bb7ef61da05376e1df0f60787c4499ffb458fbffeef7d94c6c0fffb2e2ce34f71ffc7dfe2577eeb73bcfa5ecc9dd3c0e1fd97f9e2afbe483cea639d63b65a75cc20387cf02005120542a38423c880310e632d755d826d71b6c5398fb12dde0341810409c47142a4145a6aa48a400662a50952d18b63848a083a22123d9cd0581163ac422a45d934b469421c04d259821068051ec93a6f581782e319447144126f13a91d222d988c35e72e44486a86277f81f8f23ffe47210447aa358480f39ea26e7001149ead0b97188e36397ff932e7ce5d20493a661108344d8b9092e5bae6c6dd43deba3de774511154c6f1d250d596de70031dc5ac5b8929720e5fff0af5e226213ecf7a6590c272f1bc4527119f79f1b39c1c2d393d98e382c37a8f4022954248890c0a2d22840e08d169ce8d6969d605c609a27e9f7e3604a5e1cc2552522354425011426940814c412578a90932c6a3303ec23b4fe72749bc8e48b144344c467d64b0102cca3ba4964c37373e3c98b592041fb0ce635da06d0c756308384cb9e68a7e071dc70a6f3deb7cd94d7b52a0054449ca687387673ffe4936b7b73b8081d63bdad6e3bc20afe0745d723c37dc3fcd5885049b05f2a20115e86f64782128ac432b30a6e2f2332f60ddcff1a397ff92f9fc886b4f3c8dd87e94e9ee396e2f87882c267d54e3a1a3964882e84cfcd0f14ecabac2566b86932d0651c6503aaa55413ae88308dd7b42e85e2f3c52044410046ff14e6081e045c7443c786338bcfd36c5d11de274c2ded39f04e9295d407881c82dd57a46341c217d841096fbf3078cc763bc73b4c652371d3575d60092380ef45285f48659758278e94ffe5988a4a4692d0188e201d3dd3dd2f1265b3b1bf4e21827c0b68155d9b0581b66ab96796158d79eaa09ac4ac1ba6ac98dc25a8ff3e07dc04a49081225c1964bb2d10864d4b187aae0fa8f7ec8ad9bb7b9faf4c77191e6da938fa250d82070c19cf5e2ce97f7dea3bc45fa8afb6fbf46bd2a199fbbc87073171dc7d8d6227a3d82979dff195cd79f0338e77167bd5af800c11382c0078f72065f9cd0164b8c6de85655a07a637ad3cbf80069ac714d858f6222401268db06a525a9d6645a219444c582484b10012d0c4a4a5647f77876b48f78e5a53f089180a6ac295ccaf6e58f70fed205966bc3dde39afd99e164d992378ebc96b4c61384240849631d8d072702222834a0a42208819402240829c036601c712feb4e2021f1d6636d4b59d4acf29cc1b04714670402ce09081ee73dce069c0f581f688b39c5c93d4c5d239ca1750eaf22fac36dd2de06ad901f56a938ab58d735ecce78f612194c979b0b02e1cd1913f1241a26e301eb7549e502bd7e4a4090465d1baa8b12e2047db65b7a89e3cade26a91434bea56903de3bb494f8e069db9afd3bf7d88a0ff93bbf7805bd5e39f61fdce2d147f720dee0d5f74ef83fbf7e9b526c114702ad354ac518030d012524ad97b820f1219068d50d2d3f150911322065574d4104aa72c96834c5fb871359974e0d2190658a341de383c33bd3b9174db708d6199c3504e771d6d3b40e2706589d2231b8e01001168707087184b18e1004ce7b2ca6cb5a9c811f478a411ad34f14128d140a2f3ba08395e4ad219f6bbc9714b5c36e8e998e47c848605dd78eb433f4334d966ac6fd04616bf2d6d29cd1cfe03dcbd2b05ae75465812edee7852f3ecd30f16853dc6773aac90613ae5c7b96e2fb6f32d49ef9aaa4949a2c83580796ab3575dde2bc27ea0f188fc72459843b1b2244903819f0c6d3960d6ddbd0b486a6a929e7a72c06739c7580eb0e0ddb011bbcede89beb5a45e4da0e1c1110c181f7382199ad0a4e176d172126a065603c48184412e36a74dc8333ce6c1d34b547004a0b0892c62b9c2bb02e6690c64441a184ece403e111b1a7b516a4629245d475453d1cd3945d505e88847e22b972a9f315cbb2265f1b9c0d94eb350707c7ac566b8c691078527b9fffe4573ec1d58bdbf498a3b77612828eb1a1e1fb3f7a89dffb83d771836b5cbed2e3f8f08037dfff3187b7dea1298f70a645e191c9009d6d70eecab34c2f5c43e998aaaeb06d772a07e911c2232d381c4dbdc62eb28e27133eccf43d0caeca3340d55952ca8740c09d35e76ed41ea7d0c6862a5894eef494ed410402646148b5e56162b62410c7164f40284908e0bc42394f681d2658bc9068d56558a41044025414138420684d948da0cdf1d6818ed059c2b9ed5d82b398b61bb7abd59a1b371fb05ace1141a269d0c22143495ade66ffce98f7dfbcceafffcd2710affcf9ff125a325ebb71cc3ffb173fe420dfc1c523a603cff19d57c94fefe1a4e3b14b17b970ee02d920c15bcf62b9e4f0e884aa910c369fa1bfb94b080282e10b9fdde3d927b7f8dd7ffa7d8e5781a6aa502ac1058b770e84444a7906f419a80f7508bad452f73d830f20e892f6c678827288a0f12110451aa125d2b528d989fb5d0beb380a671938211584081102882e022703042c5268b4d2e848d37a85f08ea638a59cdfc5d50b5a5fe31d10f7d8d97d94cb4f3dc7b94b8fb15c2eb97efd26b62e49952596a14bdb7a4f2b0cb16f4109ce4f15fff1ca68c600001b9049444154fd6f3f87f8d1cbff2a8cb7aef27b7ff012fff26b6fe15a439248e6fb6fb05ced331d6ff2ec934fe0da82a228f122904609a38d09bd7e9fd53ce7fd0f3ec0e873a8de054488d0a246d2d084080f58d32254d401204207c6d975047146d938e3a43eb8b3d79d4560cf626a926e6184b008ba935d21504ae26c8dd0090281179dc025fdc3c49523088d171d1727740aa27401af002202e0f0b4d582f2f83a935431998e885437498ae059ad4adebf7d9b562ace5ffd3493dde728ab8a241408d1eddc4425a4fd3e516f44a463742fe5f1cbe7f8f8950471e3cd57c3effdcb57a8f436b31c5ef9d6372867d739397c9f9d8d6d2e5fdc61319b311c6d70edda35eab6c6d996c3837dd6ab153bbbbb0c8723de7cfb2d2abf89ec9debe851f078ba6d695b838c628c0b1d802220a5408aee869314feacc2031270dee2bdec009512ef034202b80e742110b21b48f0e06c83d4094186b36a5684603bc937083cf227a942a9b1d68114686189a4c47b41b1be05d5031ebd7899bc59932fd7a469ca60d023cf73dac6309a4cb97770c8c1d1032e5e7c8168fbc94e3311926c34a23f98800b046b316d816f4b8c59d38b5a7496f4f8f64bdfe238d7f82011aea458ee13ab889d8d11abf9925f7cf16f509994479fb8ca97ffc9ff467e7cc4b56b57b8fa914ff0c6f5d7298b86271f7f9257debc0e3646ea29492f231bef222514ab25d96048f8a9db4c0fa72a11c0bb8e82793aea071eef25beeb2c88878290efa8a50a67f719644009419d1f23bc201b8d0141f0aaa3913f811779962cf442321002bca7c867346d892b66608f78e2d14739b87f97bd471ee789a79f6575baa0c86bae3dfb0c17ce9fe7bbdffa3adbd311de3af6efbdc6d5e1189ded1084c39c56cc678788e091b4101c8480969ef39b7d74d91a7677faacf305d6399a26a7694ab6a753f272c5e73fff458e566baebff65d0a2b79e6a39fe0e5afff31e39319e974979fff855fe2db2f7d9d41bfc723172ff1feed43a261469537d4eb055274712abb3ec27a7f265b3ebcc6f1132c7ce8b6354a20822378813bab642120f880909d64296cb7233ce06520184314a5d893022102ce75fd59d271691f044a6902012904ed999eed9d07db52afeff2f453577970ff0ecf3dff59e2f116a9ab78efc18fb8f1c12d9ef69fe7e2a39fe0f35ff8db7cf79b7f821092d96ccef2f80e1be732e4d92923bae11def6d6754048fd4f0a98f3d858c95e40b7fed7922e5d01a9cab117846fd019bd32d2e5f7b9a375efd01c5ec0ef9ec90f1f83ccf7cf479f63ef939565b4fa0d488a79f7996a3a37b6c6d4e91944857e0cfa643e73a4661ab06ef2dced9338dd9e1bdc33973c6991b826da16dbb0077a8c11bbc31b46d8b755da0d0d60d8daf31b6eef407e7cec6e016635a5a63b0ce116c8bf0e6acb21cae6df06d8bb5673fcf1a5a5350ae3e60effc84c56cc6d52b9739b87f9bfc74c9bdb9e052b4c9f34f7d9a277ffe17b9f7febb7cfba5bfe4f32fbe4853954c2643caf218ef2abc6d096d4368736c5b604d8d7735849a272e8ff9f4c71e471f1f1e33ee0dc8d214d174a948458452f0c8a357d9dbdba63f1ca011d445ce8d9bef90f5b679fd70c65eaf207eed87f49eba4a6303b669d91c4d99ad7242a2ba8a3a2bd9c65aa43fbb1f73b675017c78d81fc0d0b5092f05b86ed2420a84eafab4770209583c2d0a68504242f0e820114ae28243fa402b044e0a9473180221744ca3631d0a2fc1fb86b69a331c3cc5c1bddbec3efd0c27fbb7b9f7836fd07fe633c8cb8f736e38e29def7c9ba74feef09ac911e92fb13d1d53d62debaac05b834320bc4709babf450682108c87199ffb85e7083242afd7258354331dc61cb62d49922265d7e08d09bcf5ce311f7fe15758cd2bf2c5031e1c1bdc5a726d6fc4c18fbf4feb0aec7ccd783466b55a319ef4395d1dd2efede17c675b85e011da631b7f26c03b10dd36160f013f031b7f26f484d05dbe7120da6e285252e14420784f081201675f070c5527da29894602925638f067172e43e806212452740924a1d68cb2188247c511650ddf7bf53a1fbdf008499c70bc86c3c592244b314a20da406960bcb98bdf3f46461aa5154a74b283089df4a0cfcaab0bdbb498f204dd1ff4689b927fff973fc397bff2128d49d1521110ac966b26938c9bef3dc05725bbe72e11e431c56245a237f9c46ffc7dfeef7ff2bb6cf55254dde29c234e22ac6da8aa92877eb50f1eef5a22a2b3115de3cefa1a081e5e935441e0a4e18cfd11798190ea8c5d846eca13e07148ba0af5feec60f4a2bb762644b75e229c0947a08444d201ddfd3e83ee8f886d43ac20088f4a125ef8ebbfcce4ca35721b931f1f5015730270fed214f1d8dfe20be3988f7cf2795efdce370801a228c29a0a1f245a5886a394d130e5fcf6946b97ce71e9e20e8440e362b49231492278e492e0b7fee3bfc1db376ef2f65b1107fb079c9cecf3b9cf7e146f66fcfeeffd1f6c2f0f49767f8ec974409de77ceffa3dfefe7ffd3fb0b5a9f99ffec13f607b678baa2c8885409835d65408df0216610d75e8689ce42737c01c3fb944ea43d752a5909ddb13c00a81f49d806f25083c519a52d50dc209a244d19af0e155b38787ab0c5de38a0220c185ce33543a224885a91ccecf4158322dd8af2a6ede3de2f0788d6f6a0ef7eff191a79fa33f76dc78e32daaaac1b92dae7ffffb1c3db8cfe630a667049b3dcfce4ec4959d5df6f62ea323419625e83826eba7444a53b72ddaf90a1f142a89d8dd9e90248f30e90baafc09fee2e56ff38f7ff77fe5bff86f7e1b2f04df7bf93504969baf7f9b6675801a9ee7fa20c1950fa8ab86f1b0cf9b776ee3db92e06ea3a5408b2e5f21e3409020ce38b40aa29bda94ec8642efa99b1a1d476763b843494d6b2d2aea861a47376c44a1218d044e58940c64d199b015fc1955ec3cc1c6b4dda2f98edcd9e0c0766640aa526a6b6883c786807016d5cea8673778e395ef6383e0da732f30bb7f9f0737dfe4dc638ff16b7ffbd779f91b5fc5d23248343b1b193d551379837119453903e949d34dc6c3095a401c2bd2c1149dc53d6c806655319b9d9c91f306ef0d572feef1bdef7c9be974c27ff9dffe573456335b5a12f90cd63dc1b31ffb14f57ac11ffdfecb8cc71907fb076796ce88348dcfcc02cfb03f224d53dab639e3c396388e69db1625243ad2186b69db96ba6a4104a248755ab4f71f5e7874cea3759737ee7a60777b4f9e5d3bf3e12717df8baa268e2738e750677a870f9e2449ba9c4710b820b0ce309f9d321e0d79e91b7fca7ff73f7e896ffec5235c7ffd6d26b167ddd3fcadbff71bfcdadffd156ebdfb16dff8f33f258d2571a4bb03dcd5f4f49848c5ac960b26e311b6aa695773e28d31759563962de2db5ffb66004751e6acd62beaa6a1c8738a754e5154dc3f38e4fa3b37d83e7781bdc73ec6f39ffe244f3df308fbf70ef9fa57ff8cbffcfa9f9128c5b9dd29b6754449c4b09f31ecf5e8f5529234214d539cb5981090b2bb405a55156ddbe2bd454a85730fa7434f9274af1752d1347577c0688d31862ccbd05137be277142d334c800cbe592a2ae180f06b4c6b0582f504a12c759f71ea9ba56e51c52288207171cc6584e4e4e31ad63b15a920c37f9cddffa4d9effec67f8ea375e6373abcfa79f7e843ffce77fc0bffa175f617314331df6505290f67bc8009b9b23b6479b144dcdf9dd5d948224915cb87c0d1f34691c21befb8daf85cec2b7ac8b922ccb3839390602d53a67be58b158ad78e58db798cd560434420bdaa62278cfcee6842b17ceb3b3bbc5743226ebf7d04ad1ef0f88e2182961b198a355441c27c45946591414e50a82a3df1bb058ad8863fde182a8207080f7026b5aa4ecee16fae0b1c160da16ad35499c9ef57cc1e2f4142941a7194d63887b31c17a4c63904a22e38424d134eb1c8243441175d5628de1e4644659d6cc170b3eb8fb80ba95c449cc70720e6372962733e258f0f8b50b7ceca96b445a639a9aa49722118c467d501aa5225c5bb2b7f7282885695ad2b487d211e29d575e09ce39b4d6346d4d59576469d66d4fefb0deb23c5db0ae6b9cb314754514470cfa3d141225554707b5228a34f26c12733ed0cb32ac35ac8b9c2ccd487a3db22c66753aa3d7ef53b70d6dd3107c204e62a4945867d04262ce069a10026ddbd23415a6ad081efaa38c34195055355276a0445a7fc82eacf128e10902eab661b95e32996c13c511f3f9117114d3ef8f59af4f38393e623cde623cda20e0105251568ee57ac9bddbef2375cc703864673a6130189246313a8ea8cb1ceb1d9bdbe770c112ecd9c4a02571d2234bfac820f0c2128240dc7efbadd0346d27bac70a63ba8c83d68af56a499224b4c6d0dacecdb0ce13eb2e831782a7284ba23806eb08c12223d5fda3eaac7f2a417b1650196fec203034754559d5d475f353598bee0f3d3abe4b3f1bd0eb8d90c1238420493256eb15014796c467e3bba4ae1a06c35ec7587c27797654dca184a3b50d47c7fb0c8713d278441469a238c619830c011f043a8af9ff7a38af5dd9b2b30a7f33af5461c7d3a7bbed76000be1e7e09e17e05d7830ee90c008c916920da251ab031d4ed8a1d24a337231abb92e6949554bf58731bef18730a1b52215b8fbe413b4d0c494f1614117434c01443d75b41d76e494097ea5ddf4906a56510231873a428a82518e9420668f360af1d59fff5c8c95d77558e0fd5ac1411f28b9362e2515b15412531b839f175ce3904a91a939bb1223d3f11dc3f61ed3b424047e5950b24a9fe365e4729ef8ed6f7fcdbcceccf382d6aa8e795a9162be2e3030cf67428a386b388f6784c8bcbc3cf1bbdffd1e4921848c945594aaae8da210afd7613239268c759414b88c27ac6b70b6f97f35420941cad4f34814b4d1c49869daa64e485920b5426949161a95abd42bb5a42441cabe8eee3963db8e12abccf07278a16b3bb4b34804c79727fafd7df5efbffbafff2ee7e989713ab3dfbc258b6a97a7109019e6e98cedb61455b0d69172fd41b43284182ad4981252c0e9f482ebf60c5d5f8dd1b0428e142aeba6b4bab2160a1f22469baa1dabab4014334215624c7cfcf02d4a3ab637b74804ae71c49028b9e2b06db34549c3f1f44c5c677cf0c4e451c6727ffb29d63914a094e0783ef2eefd37dcdfbd61bbb9e3e5e5039bed5d157d1048add9ecf6e4589f5fb444cb6b92382784d458d3f1eec37734aea36dbafa7da4402943a470faf8917eb7e1328d74aea5713d3e468428641f10fff9afff54faed03fef24a8886621ced6620ac17424c9ce667c2321352e1b3cf7e8352861c53ad3f79665dce08dd636c83569a699969aca5e480d18ab6751c4e27d49534fd794c73ce915324c588319654242906421819a70b3967f6bb47a4aa33f2ebe1196b356ddb72394db4ad633c1f59d603651d51baafaeb9814fdffe35ab5fd152e04c839212a5143106620a4cd385100aaee989eb4cdb3a521618e5408bca5c0b816b1a522e94b422a5e67cbeb0bfb9adbbe5151e52cdc0f9f84c675565582e238db63837e0fd859777ff8b6eb7e89685f1e357a8f606dd5bd6e942582b7e2544a18444ef06da6e8353b69ab34aa2a4e4e9c30b3a83d9689c6b505a61ac2193485180903cbf9ee8bab6bae2b98e75a9cc843432b45ba4d1c418304d8794012d0786aeafb695805c123eccc4b4b06dee01e87b4b2905db34b4ede7b504a85a9fb7c3801416a3ce7c7cfdc0f066f7f31d1ea45458a950433d8ba18c060cda36a85c28c12393a278492043aed8f09a56ac6bd9ed6e58d795922ad7b1dbdd10e633eb72a6730f9418283e91756659cf480a4518441168af06ecfd0e2b0ad33cd10fbbdac41a473c793e7bfc35455d39e89449258380758d6cf66fd1aa2e1be50a470aa908eb82948522057dd79372a214c97cb9d4512b498c06a31a66bfe0a723426494b2f83021658b92922212e3f940ca2b7ddb5072669947a679c4af2b9bcd0db251a492701984720865f0eb4a3fec91d22132bc1cdfa1916cf76faa6313024e28c23c9142216bf07122cf2b9bfd8e903c320b969450d2b08c53351f9c8510af346be0f5f595ae57b4c654b531c166b7ff99f8a1c4c4ede3237e9a105fffe5cb620dd702afc939e19aa602de5749526558d6b5269db4aac27c1148a5f06b406b8d5011210c7ef5bc7bf78ecb38d36d376cbb86beb7bcbc3cd1f55d05b373e595ad36d8b625fb99180252839f17b4b2c45c38bc3ea19464b37f20a74211b9260d7266b37f209130da553d7a1c69ba1e6d0cae690831f2f2f281b76fbfe0e5f523719eb8bd7b53f18894293e208c649d27b4312015ebb9661cad1b904a30cd13c3664b2e11592086aa3a66147ddf335ece15eb955716300994b3c410293ea0aea296d402f1f19baf4bc80b6919399e8e286dd9ec1e18c785526a93bb5c9e514ab2bf7d5b5f409c41e81a9750123f9f0931d1361b728957107d2189ccd058c6e9cc6ef380eb2d3164a492accb881286a6edaebc5aaa5655cc1c8ecfacebcc7eff488c2b6bf0ec6f6e50aaa16d1caf4f1f91aec50d3dadb3accb091f32c376cbe57c629ccef46e5b9bb6940812e3e5841496767353278618b16d73ed0b11292492ccbc2c0034b641b40d25ac68671145915364be1ad4d6689c5295bacaa00448a508315f452dc86b20109046a29769664d2bd3f9c0edfd5b7c54041f5122f0fcf107d675e2eefe0d85c2e1e927a4683056611b454ea93695ddc0f19b6f199a9642625d3d77f7f7f814d040db6cd0aad29f15304fe428706dcd9fd47342d5b3ca696599ce6405a669d041d2b50d71f524593dbfede3e7a430119791690948ad699d25fbccd3fbef58fdcaa5bc4769c3edfe13bacd164c537515ab104aa3544ff49e982196c232564ddd3807d792c56a6afebb6bb1aef699a66b98d799cbe985d5b4ec873dd26a48f532a41419a575d5c91d9428699a0de2ab3ffdb194ab03edacc618471192e06704d5bbcbb2f2693905baed8e4cc10849084b157d70185339bb791a6bfec534f810902520954649c9349d787afac0dddd2758e758d799f6ba46a30c2146c23c21b5a6e91ba669461069dc969433ce59b2903cbd7f4f632dc62812d0741d719931aea548d0daf0eefbafe9ba966177cbebeb0bc36683b32da40ab55bd7918b444a982f67e2b2a28d4519454c999212596bca78c1b61d31458a14346d8fd60e3f1d50b621cf91982f882c715d87d68e2ceb84a39400a9d14220befcf73f94beef51b65ec84a61659ccf48211986e12a964b524a1867115aa19d25cc0bda6852494c8767524c0c9b3bb4967c78ff3dc7d32b6f1e3fa7691aa452d7f9bb703e9f68bb0d4de3ea69cdb82044e1c7f71f20c3c3fd1eeb5a10829424ab5f38bebc306c7bace9b17dcfd3d37bb67dc36e7f8f8f81983d619c984262700d85887116d30ce4b060db8ee71fbee7eeed67ac29c09a2bbe5b26a4548471e470fac8b0b961186e91da20458de8fd6c265427591043c0b886e8579a7e434919d32aa24facf35c391555c17921415b475a57c4fffcf10fc539c7e447d610e965cb8797ef797cf3966ee820db8abda684710a29e53507225862228640f6238d7335325c324a2994d48c97034e39facd507dc0ab8c99538d3df865a1884c161abf2e280d5db7a91c5f4eccd34c588f8ca72712866ef7c0667b876d2db2c41a530e85f73f7ec9b21e78bcfb8c75f52034cb72a6df3e7277f7882f60aca2dfdc4008f875e672bed00d96654e5c2ecf150f43e2dc0e1f03d6181aeb70db8e12564acaf52ae55a9305824ccc0952c1f53d3116b432287d452ad2caf932b2ae89dd7e83f8ea4fff56924f3cbdfec0e327bfa2ed1a8a12c8a211421063a6148f314dd541acc2688b7196e5f84a5867c212d06d53b32ceb82941a29157e3d61a421fa3afa99b6416b89d29a357a72aa1cb3738e659aeb3412abd6723a1f5106a6c307760f9fa34d4bd36e59fd8a5496653ad334961c2314094a737cfe896ed8d0f47ba4aeae8db503d37ce2eefe81d7f73f71f3e6177cf91fffccb0bd637bfb0808a6f305dbb564bf62b421fa15a11dab3f305f266e6e1e31b60169c8c1a3ad242c1ea4a2a48091ba8a60b2a08da5b50e990bd3328314b5375ca613fbcd0dbfd8fc0daa165ae23c12f288321dae1d58c785d37a822cd80f772cd385793a2185c46e06741b31ca540314b0a60a45d6dc70be3cf3fafa13dbcd2dc2188c31f835d6cf6dbdf91c62c0a8ba59a10da514eeac655c176c1b888bc7357b528c744dcbec6736fb0d29264a06e70c11c5c3a75f70391d10a5a095426b472901bfcc04ef41489e7ef88e9802c7c33bac7128eb1886961412b66d28b9f072fc809092b76fbe20976764d3d0ed6e4118de7dfd35c3be655903a6b52801a97884d1e4d5832a5c8e27ac31686beba1c194115ffdf15f4a8c826ed82080e972649d5f312874dbc3557b284d4f5c12ca40f6137dd363ba9e14125a2b72a9e5a5dff5e498f08b0724e7f1842c85140a9b6d8f6eda7a5e3204b4b1c490508dc5aa722d174bad734896f9cc321d4829a0ad65bb7d83713fa77b2b072d8d659d2f2c970b45086eefee2009b4d54c9791c3cbbb2baf67b9bd7bcbe2234a445e0e4ff4db7bfa664b082bd66884aadcb436308f63cd4eba01670ce3f44a8c82cef5b8dd16bf782e87d3153ecfa414b14a5eff45867989086b31120eaf4f684aa1dbf5f87926ad23c98f74d6314f2f4c8733a6d9d30ddb9a2729134f3f7e835f16bef8cdef31a6d6e254220283758ee803d3349311f4c386360d2005d31ab824d8cbaad019adaa8ba280b412634d0b344a73194f1c0f152ceffa0d0f8f9f23948254083923514821504a9143c22f0b97d37be27cc6ca42b77da414f0fe4cc99e711af9e4ed6f40198c13347640ab962c0a5a786cabd05ab17a4f95e135ae192a1d2b0b6b88a4acf1fe0279a1e882129ab63594ac8971653a2f14d7e09c65bc4ce42cd114a2844677e869f514b1927d22144d280df3782061b97dbc274e17d6f347869b474481bb87cf695d8b1d76a85289faac0cb61d2a9de36b53f021308f33abf73446b3710d45444a8e350312023f7cf71d8fbff825ca18c23ad1f73de7e94c2172f7f809311594548c87675cab19c719d36ee8fb1d39664e97099d33edb0a7ffe50de20ab917295997c0341e0969c1594b4801957c0d1d298dea34795d385e4e74dd508f8a0881d612212b26218d259748bfdb228e99653a9193bc6eaffaca711794d6f4434f2c19d3982b072ed15a928bc0a882fa87bfffbb7fbc7d78c3f1e5094884585529ad343ffdf025d94fa4e4391c9f30da72f3f0294ddba194823512e38a695b74d75350ac6b204bc9cddd1d948406b49458a328ba665d620c48abe9fbae9aadeb5cc97b6dc949d1f50345489ab6452a4d2e91e7a71f5142d1f73bb4d6486dd1d631dcdc56f6a3e42ba620f1eb82693b8490f49b5bde7cf22ba469c9145e5f3ff2faee5b6c33f0f4fc2d1fbeff6f7c0a58d760db96a6dfa18c434a450c0bda589a6183320dc3fe0e50b46d0352d00e374851b5961822fd66474c1e2d25ded767b6c30dfd7e8beea4e0ebbffc81379ffe8e3904fa7e20c7991fdf7fc3ebf189d0df433ab0d93ca0fb0d7ef6e4c6a04a21c68c2f355f22a691943c252c386759c691653a41b6f56da785e532a35483328ae22b942e9421e782b6b0ae13ca08c6f5fa8294442885b20d778fbf441ac7e6e62dd3eb47c4d56d59e73346352c193ad7305f0ee494985e5fab319104e765c199964db721c5c239d730cfaf7efdb7ac6fff0ad70f18dd703a3d23fd84949ad3e9c27e7fc31257a6c313b61d10579300ad6b0849094208d8b665d8eef0cb4c0a82655ee8da96d3cb33e1dd4f6c6f36fc1f81377e8586ee0c060000000049454e44ae426082, 1, 1, 'image/jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL,
  `page_name` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` mediumtext,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `page_name`, `title`, `content`, `status`) VALUES
(1, 'Who We Are', '<h1>Welcome to <span> Ad-Post</span></h1>', '<p>This is not <strong>Lorem ipsum dolor sit amet</strong>,&nbsp; it is a content <strong>coming from the data base</strong>. consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(2, 'Safety Tips', '<h1>Safety <span> Tips</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(3, 'Terms of Use', '<h1>Terms of  <span> Use</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(4, 'Help and Contact', '<h1>Help and <span> Contact</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit.</p>\r\n', 1),
(5, 'FAQs', '<h1><span> FAQs</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(6, 'Our Mission', '<h1>Our <span> Mission</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(7, 'How It Works', '<h1>How<span> It Works</span></h1>', '<p><strong>Content coming from database</strong>.consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, met, consectetur adipiscing elit. Fusce el</p>\r\n\r\n<p>ementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. Integer elementum congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n', 1),
(8, 'Usage of Application', '<h1>Usage of <span> Application</span></h1>', '<p>Welcome to the Ad-Post</p>\r\n\r\n<p>To give you a clear idea what you&#39;re getting, this is a free version of what our members currently enjoy.</p>\r\n\r\n<p>We have worked hard to mimic the test environment as much as possible so that it can prove to be advantageous when you go to sit the real UKCAT.</p>\r\n\r\n<p>Full members receive mocks and practice with time-limits, performance feedback, and access to our entire question bank. This demo uses the same few questions each time you take it.</p>\r\n\r\n<p>The demo is divided into two subtests (sections), just like the UKCAT:</p>\r\n\r\n<p>Best 3</p>\r\n\r\n<p>Sort Order<br />\r\n<br />\r\nClick Next to proceed with the exam</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_inner`
--

CREATE TABLE IF NOT EXISTS `content_inner` (
  `id` int(11) NOT NULL,
  `title` varchar(112) NOT NULL,
  `content` varchar(112) NOT NULL,
  `status` int(12) NOT NULL,
  `system_title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_inner`
--

INSERT INTO `content_inner` (`id`, `title`, `content`, `status`, `system_title`) VALUES
(4, 'Email title for user', 'Your security code is {link}', 1, 'Classified: SMS Code'),
(5, 'Titl for admin', 'Content for admin', 1, ''),
(6, 'Sell Your Item On Our Website', 'This is your registration verification {code}', 1, 'frontend_left_heading1_index'),
(7, 'Have thing special to sell? just try and use our website.!', 'Have thing to sell? use our website', 1, 'frontend_left_heading2_index'),
(9, 'Just fill the simple form and post your product ad in just few clicks', 'Just fill the simple form and post your product ad in just few clicks', 1, 'frontend_left_heading3_index'),
(10, 'You can sell your products as private customer', 'You can sell your products as private customer', 1, 'frontend_short_heading1_ad-posting'),
(11, 'You can grow your business', 'You can grow your business', 1, 'frontend_short_heading2_ad-posting'),
(12, 'Inlimited ads', 'Inlimited ads', 1, 'frontend_short_heading3_ad-posting'),
(13, 'Work as Dealer and Company', 'Work as Dealer and Company', 1, 'frontend_short_heading4_ad-posting'),
(14, 'Increase your product sales with good offers', 'Increase your product sales with attractive offers', 1, 'frontend_short_heading5_ad-posting'),
(15, 'Inlimited ads', 'Inlimited ads', 1, 'frontend_short_heading6_ad-posting'),
(16, 'By having a password you will have access to My ads where you can:', 'By having a password you will have access to My ads where you can:', 1, 'frontend_centre_heading1_signup'),
(17, 'Edit or Delete your Ads', 'Edit or Delete your Ads', 1, 'frontend_centre_sub_heading2_signup'),
(18, 'Check responses for your Ads', 'Check responses for your Ads', 1, 'frontend_centre_sub_heading3_signup'),
(19, 'See saved Ads', 'See saved Ads', 1, 'frontend_centre_sub_heading4_signup'),
(20, 'Provide your e-mail address & password and click confirm link in e-mail which will be sent to you..', 'Provide your e-mail address & password and click confirm link in e-mail which will be sent to you..', 1, 'frontend_centre_sub_heading5_signup');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `ad_id`, `from`, `to`) VALUES
(17, 34, 63, 62),
(18, 70, 64, 61),
(19, 60, 61, 1),
(20, 10029, 64, 61),
(21, 10022, 1, 61);

-- --------------------------------------------------------

--
-- Table structure for table `conv_status`
--

CREATE TABLE IF NOT EXISTS `conv_status` (
  `id` int(11) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conv_status`
--

INSERT INTO `conv_status` (`id`, `conv_id`, `user_id`, `status`) VALUES
(1, 16, 63, 1),
(2, 17, 63, 1),
(3, 17, 62, 1),
(4, 18, 64, 1),
(5, 18, 61, 1),
(6, 19, 1, 1),
(7, 19, 1, 1),
(8, 17, 61, 1),
(9, 17, 62, 1),
(10, 19, 61, 1),
(11, 19, 1, 1),
(12, 20, 64, 1),
(13, 20, 61, 1),
(14, 21, 61, 1),
(15, 21, 61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) NOT NULL,
  `code` char(2) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `slug`) VALUES
(1, '99', 'Norway', 'norway'),
(2, '47', 'Norge', 'Norway');

-- --------------------------------------------------------

--
-- Table structure for table `credits_details`
--

CREATE TABLE IF NOT EXISTS `credits_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `credits` varchar(100) DEFAULT NULL,
  `amount_paid` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits_details`
--

INSERT INTO `credits_details` (`id`, `user_id`, `credits`, `amount_paid`, `date`) VALUES
(1, 62, '10', 10, '2016-04-15'),
(2, 62, '10', 10, '2016-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `credits_expense`
--

CREATE TABLE IF NOT EXISTS `credits_expense` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `ad_id` int(10) DEFAULT NULL,
  `credit_exp` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits_expense`
--

INSERT INTO `credits_expense` (`id`, `user_id`, `ad_id`, `credit_exp`, `date`, `status`) VALUES
(1, 62, 33, 0, '2016-04-19', 0),
(2, 62, 34, 3, '2016-04-19', 0),
(3, 62, 44, 0, '2016-05-27', 0),
(4, 62, 45, 0, '2016-05-27', 0),
(5, 62, 46, 0, '2016-05-27', 0),
(6, 62, 46, 0, '2016-05-27', 0),
(7, 1, 49, 0, '2016-05-29', 0),
(8, 61, 55, 0, '2016-05-29', 0),
(9, 61, 59, 0, '2016-05-31', 0),
(10, 1, 60, 0, '2016-05-31', 0),
(11, 1, 62, 0, '2016-06-02', 0),
(12, 61, 63, 0, '2016-06-03', 0),
(13, 61, 63, 0, '2016-06-03', 0),
(14, 61, 63, 0, '2016-06-03', 0),
(15, 61, 64, 0, '2016-06-03', 0),
(16, 61, 66, 0, '2016-06-04', 0),
(17, 61, 67, 0, '2016-06-04', 0),
(18, 61, 68, 0, '2016-06-05', 0),
(19, 61, 70, 0, '2016-06-05', 0),
(20, 66, 71, 0, '2016-06-06', 0),
(21, 61, 10001, 0, '2016-06-18', 0),
(22, 61, 10002, 0, '2016-06-18', 0),
(23, 61, 10003, 0, '2016-06-18', 0),
(24, 61, 10004, 0, '2016-06-18', 0),
(25, 1, 10005, 0, '2016-06-19', 0),
(26, 61, 10006, 0, '2016-06-20', 0),
(27, 1, 10007, 0, '2016-06-22', 0),
(28, 61, 10012, 0, '2016-06-22', 0),
(29, 61, 10013, 0, '2016-06-25', 0),
(30, 61, 10014, 0, '2016-06-26', 0),
(31, 61, 10015, 0, '2016-06-26', 0),
(32, 61, 10017, 0, '2016-06-26', 0),
(33, 61, 10018, 0, '2016-06-26', 0),
(34, 61, 10019, 0, '2016-06-26', 0),
(35, 61, 10022, 0, '2016-07-02', 0),
(36, 61, 10023, 0, '2016-07-03', 0),
(37, 61, 10024, 0, '2016-07-07', 0),
(38, 61, 10027, 0, '2016-07-16', 0),
(39, 61, 10028, 0, '2016-07-17', 0),
(40, 61, 10029, 0, '2016-07-21', 0),
(41, 64, 10033, 0, '2016-09-18', 0),
(42, 1, 10034, 0, '2016-09-18', 0),
(43, 61, 10038, 0, '2016-09-30', 0),
(44, 1, 10039, 0, '2016-10-02', 0),
(45, 1, 10039, 0, '2016-10-02', 0),
(46, 1, 10040, 0, '2016-10-19', 0),
(47, 61, 10041, 0, '2016-10-29', 0),
(48, 61, 10042, 0, '2016-10-30', 0),
(49, 61, 10043, 0, '2016-10-30', 0),
(50, 1, 1, 0, '2016-11-13', 0),
(51, 64, 2, 0, '2016-11-29', 0),
(52, 64, 3, 0, '2016-11-29', 0),
(53, 64, 4, 0, '2016-11-29', 0),
(54, 64, 6, 0, '2016-11-29', 0),
(55, 64, 7, 0, '2016-11-29', 0),
(56, 64, 8, 0, '2016-11-29', 0),
(57, 64, 9, 0, '2016-11-29', 0),
(58, 64, 11, 0, '2016-11-29', 0),
(59, 64, 12, 0, '2016-11-29', 0),
(60, 64, 13, 0, '2016-11-29', 0),
(61, 64, 19, 0, '2016-11-30', 0),
(62, 61, 22, 0, '2016-12-01', 0),
(63, 61, 23, 0, '2016-12-01', 0),
(64, 61, 24, 0, '2016-12-01', 0),
(65, 1, 32, 0, '2017-01-02', 0),
(66, 1, 33, 0, '2017-01-02', 0),
(67, 1, 34, 0, '2017-01-02', 0),
(68, 64, 35, 0, '2017-01-07', 0),
(69, 64, 36, 0, '2017-01-07', 0),
(70, 64, 37, 0, '2017-01-08', 0),
(71, 64, 38, 0, '2017-01-08', 0),
(72, 64, 39, 0, '2017-01-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `credit_packages`
--

CREATE TABLE IF NOT EXISTS `credit_packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `crdit` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_packages`
--

INSERT INTO `credit_packages` (`id`, `name`, `crdit`, `price`) VALUES
(1, 'Starter Package (1500 advertisement credits in just Kr 800)', 1500, 800),
(2, 'Small Business (1600 advertisement credits in just Kr 900)', 1600, 900),
(3, 'Med Business (2300 advertisement credits in just Kr 1200)', 2300, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL,
  `title` varchar(112) NOT NULL,
  `content` varchar(112) NOT NULL,
  `status` int(12) NOT NULL,
  `system_title` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `title`, `content`, `status`, `system_title`) VALUES
(4, 'Email title for user', 'Your security code is {link}', 1, 'Classified: SMS Code'),
(5, 'Titl for admin', 'Content for admin', 1, ''),
(6, 'Sell Your Item On Our Website', 'This is your registration verification {code}', 1, 'frontend_left_heading1_index'),
(7, 'Have thing special to sell? just try and use our website.!', 'Have thing to sell? use our website', 1, 'frontend_left_heading2_index'),
(9, 'Just fill the simple form and post your product ad in just few clicks', 'Just fill the simple form and post your product ad in just few clicks', 1, 'frontend_left_heading3_index'),
(10, 'You can sell your products as private customer', 'You can sell your products as private customer', 1, 'frontend_short_heading1_ad-posting'),
(11, 'You can grow your business', 'You can grow your business', 1, 'frontend_short_heading2_ad-posting'),
(12, 'Inlimited ads', 'Inlimited ads', 1, 'frontend_short_heading3_ad-posting'),
(13, 'Work as Dealer and Company', 'Work as Dealer and Company', 1, 'frontend_short_heading4_ad-posting'),
(14, 'Increase your product sales with good offers', 'Increase your product sales with attractive offers', 1, 'frontend_short_heading5_ad-posting'),
(15, 'Inlimited ads', 'Inlimited ads', 1, 'frontend_short_heading6_ad-posting'),
(16, 'By having a password you will have access to My ads where you can:', 'By having a password you will have access to My ads where you can:', 1, 'frontend_centre_heading1_signup'),
(17, 'Edit or Delete your Ads', 'Edit or Delete your Ads', 1, 'frontend_centre_sub_heading2_signup'),
(18, 'Check responses for your Ads', 'Check responses for your Ads', 1, 'frontend_centre_sub_heading3_signup'),
(19, 'See saved Ads', 'See saved Ads', 1, 'frontend_centre_sub_heading4_signup'),
(20, 'Provide your e-mail address & password and click confirm link in e-mail which will be sent to you..', 'Provide your e-mail address & password and click confirm link in e-mail which will be sent to you..', 1, 'frontend_centre_sub_heading5_signup'),
(21, 'ADS by USER Confirmation', 'content for admin', 1, ''),
(22, 'ADMIN Approval Confirmation', 'content for admin', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `filter_name`
--

CREATE TABLE IF NOT EXISTS `filter_name` (
  `id` int(50) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `filter_description` varchar(500) DEFAULT NULL,
  `filter_value` varchar(225) DEFAULT NULL,
  `parent_filter` int(11) NOT NULL DEFAULT '0',
  `display_for_adpost_page` int(11) NOT NULL DEFAULT '1',
  `display_for_screen_page` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1593 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filter_name`
--

INSERT INTO `filter_name` (`id`, `filter_name`, `filter_description`, `filter_value`, `parent_filter`, `display_for_adpost_page`, `display_for_screen_page`, `status`) VALUES
(1, 'Merke', 'Bil', 'Merke (Bil)', 0, 1, 2, 1),
(2, 'Andre8', 'Test', 'Andre8', 1, 1, 2, 1),
(3, 'Audi', 'Test', 'Audi', 1, 1, 2, 1),
(4, 'Austin', 'Test', 'Austin', 1, 1, 2, 1),
(5, 'Bentley', 'Test', 'Bentley', 1, 1, 2, 1),
(6, 'BMW', 'Test', 'BMW', 1, 1, 2, 1),
(7, 'Buddy', 'Test', 'Buddy', 1, 1, 2, 1),
(8, 'Buick', 'Test', 'Buick', 1, 1, 2, 1),
(9, 'Cadillac', 'Test', 'Cadillac', 1, 1, 2, 1),
(10, 'Chevrolet', 'Test', 'Chevrolet', 1, 1, 2, 1),
(11, 'Chrysler', 'Test', 'Chrysler', 1, 1, 2, 1),
(12, 'Citroen', 'Test', 'Citroen', 1, 1, 2, 1),
(13, 'Dacia', 'Test', 'Dacia', 1, 1, 2, 1),
(14, 'Daewoo', 'Test', 'Daewoo', 1, 1, 2, 1),
(15, 'DAF', 'Test', 'DAF', 1, 1, 2, 1),
(16, 'Daihatsu', 'Test', 'Daihatsu', 1, 1, 2, 1),
(17, 'Datsun', 'Test', 'Datsun', 1, 1, 2, 1),
(18, 'Dodge', 'Test', 'Dodge', 1, 1, 2, 1),
(19, 'DS', 'Test', 'DS', 1, 1, 2, 1),
(20, 'Ferrari', 'Test', 'Ferrari', 1, 1, 2, 1),
(21, 'Fiat', 'Test', 'Fiat', 1, 1, 2, 1),
(22, 'Fisker', 'Test', 'Fisker', 1, 1, 2, 1),
(23, 'Ford', 'Test', 'Ford', 1, 1, 2, 1),
(24, 'GMC', 'Test', 'GMC', 1, 1, 2, 1),
(25, 'Honda', 'Test', 'Honda', 1, 1, 2, 1),
(26, 'Hummer', 'Test', 'Hummer', 1, 1, 2, 1),
(27, 'Hyundai', 'Test', 'Hyundai', 1, 1, 2, 1),
(28, 'Infiniti', 'Test', 'Infiniti', 1, 1, 2, 1),
(29, 'Isuzu', 'Test', 'Isuzu', 1, 1, 2, 1),
(30, 'Iveco', 'Test', 'Iveco', 1, 1, 2, 1),
(31, 'Jaguar', 'Test', 'Jaguar', 1, 1, 2, 1),
(32, 'Jeep', 'Test', 'Jeep', 1, 1, 2, 1),
(33, 'Kewet', 'Test', 'Kewet', 1, 1, 2, 1),
(34, 'Kia', 'Test', 'Kia', 1, 1, 2, 1),
(35, 'Lada', 'Test', 'Lada', 1, 1, 2, 1),
(36, 'Lamborghini', 'Test', 'Lamborghini', 1, 1, 2, 1),
(37, 'Lancia', 'Test', 'Lancia', 1, 1, 2, 1),
(38, 'Land Rover', 'Test', 'Land Rover', 1, 1, 2, 1),
(39, 'Lexus', 'Test', 'Lexus', 1, 1, 2, 1),
(40, 'Lincoln', 'Test', 'Lincoln', 1, 1, 2, 1),
(41, 'Lotus', 'Test', 'Lotus', 1, 1, 2, 1),
(42, 'Maserati (22)', 'Test', 'Maserati (22)', 1, 1, 2, 1),
(43, 'Matra', 'Test', 'Matra', 1, 1, 2, 1),
(44, 'Maybach', 'Test', 'Maybach', 1, 1, 2, 1),
(45, 'Mazda', 'Test', 'Mazda', 1, 1, 2, 1),
(46, 'McLaren', 'Test', 'McLaren', 1, 1, 2, 1),
(47, 'Mercedes-Benz', 'Test', 'Mercedes-Benz', 1, 1, 2, 1),
(48, 'Mercury', 'Test', 'Mercury', 1, 1, 2, 1),
(49, 'MG', 'Test', 'MG', 1, 1, 2, 1),
(50, 'MINI', 'Test', 'MINI', 1, 1, 2, 1),
(51, 'Mitsubishi', 'Test', 'Mitsubishi', 1, 1, 2, 1),
(52, 'Morgan', 'Test', 'Morgan', 1, 1, 2, 1),
(53, 'Morris', 'Test', 'Morris', 1, 1, 2, 1),
(54, 'Nissan', 'Test', 'Nissan', 1, 1, 2, 1),
(55, 'Oldsmobile', 'Test', 'Oldsmobile', 1, 1, 2, 1),
(56, 'Opel', 'Test', 'Opel', 1, 1, 2, 1),
(57, 'Peugeot', 'Test', 'Peugeot', 1, 1, 2, 1),
(58, 'Plymouth', 'Test', 'Plymouth', 1, 1, 2, 1),
(59, 'Pontiac', 'Test', 'Pontiac', 1, 1, 2, 1),
(60, 'Porsche', 'Test', 'Porsche', 1, 1, 2, 1),
(61, 'Radical', 'Test', 'Radical', 1, 1, 2, 1),
(62, 'Renault', 'Test', 'Renault', 1, 1, 2, 1),
(63, 'Rolls Royce', 'Test', 'Rolls Royce', 1, 1, 2, 1),
(64, 'Rover', 'Test', 'Rover', 1, 1, 2, 1),
(65, 'Saab', 'Test', 'Saab', 1, 1, 2, 1),
(66, 'Seat', 'Test', 'Seat', 1, 1, 2, 1),
(67, 'Skoda', 'Test', 'Skoda', 1, 1, 2, 1),
(68, 'Smart', 'Test', 'Smart', 1, 1, 2, 1),
(69, 'Ssangyong', 'Test', 'Ssangyong', 1, 1, 2, 1),
(70, 'Subaru', 'Test', 'Subaru', 1, 1, 2, 1),
(71, 'Suzuki', 'Test', 'Suzuki', 1, 1, 2, 1),
(72, 'Tesla', 'Test', 'Tesla', 1, 1, 2, 1),
(73, 'Think', 'Test', 'Think', 1, 1, 2, 1),
(74, 'Toyota', 'Test', 'Toyota', 1, 1, 2, 1),
(75, 'Triumph', 'Test', 'Triumph', 1, 1, 2, 1),
(76, 'Volkswagen', 'Test', 'Volkswagen', 1, 1, 2, 1),
(77, 'Volvo', 'Test', 'Volvo', 1, 1, 2, 1),
(78, 'Salgsform', 'Salgsform', 'Salgsform', 0, 2, 2, 1),
(169, 'Merke', 'Merke for scooter og moped', 'Merke (scooter og moped)', 0, 1, 2, 1),
(170, 'Access', 'scooter og moped', 'Access', 169, 1, 2, 1),
(171, 'Aeon', 'scooter og moped', 'Aeon', 169, 1, 2, 1),
(172, 'Agirra', 'scooter og moped', 'Agirra', 169, 1, 2, 1),
(173, 'Aixam', 'scooter og moped', 'Aixam', 169, 1, 2, 1),
(174, 'Aprilia', 'scooter og moped', 'Aprilia', 169, 1, 2, 1),
(175, 'Bajaj', 'scooter og moped', 'Bajaj', 169, 1, 2, 1),
(176, 'Baotian', 'scooter og moped', 'Baotian', 169, 1, 2, 1),
(177, 'Benelli', 'scooter og moped', 'Benelli', 169, 1, 2, 1),
(178, 'Beta', 'scooter og moped', 'Beta', 169, 1, 2, 1),
(179, 'Bultaco', 'scooter og moped', 'Bultaco', 169, 1, 2, 1),
(180, 'Chatenet', 'scooter og moped', 'Chatenet', 169, 1, 2, 1),
(181, 'Cobra', 'scooter og moped', 'Cobra', 169, 1, 2, 1),
(182, 'CPI', 'scooter og moped', 'CPI', 169, 1, 2, 1),
(183, 'Daelim', 'scooter og moped', 'Daelim', 169, 1, 2, 1),
(184, 'Derbi', 'scooter og moped', 'Derbi', 169, 1, 2, 1),
(185, 'Fantic', 'scooter og moped', 'Fantic', 169, 1, 2, 1),
(186, 'FYM', 'scooter og moped', 'FYM', 169, 1, 2, 1),
(187, 'Generic', 'scooter og moped', 'Generic', 169, 1, 2, 1),
(188, 'Gilera', 'scooter og moped', 'Gilera', 169, 1, 2, 1),
(189, 'Honda', 'scooter og moped', 'Honda', 169, 1, 2, 1),
(190, 'Husqvarna', 'scooter og moped', 'Husqvarna', 169, 1, 2, 1),
(191, 'Hyosung', 'scooter og moped', 'Hyosung', 169, 1, 2, 1),
(192, 'Italjet', 'scooter og moped', 'Italjet', 169, 1, 2, 1),
(193, 'Jonway', 'scooter og moped', 'Jonway', 169, 1, 2, 1),
(194, 'Junak', 'scooter og moped', 'Junak', 169, 1, 2, 1),
(195, 'Kawasaki', 'scooter og moped', 'Kawasaki', 169, 1, 2, 1),
(196, 'Keeway', 'scooter og moped', 'Keeway', 169, 1, 2, 1),
(197, 'Kubota', 'scooter og moped', 'Kubota', 169, 1, 2, 1),
(198, 'Kymco', 'scooter og moped', 'Kymco', 169, 1, 2, 1),
(199, 'Ligier', 'scooter og moped', 'Ligier', 169, 1, 2, 1),
(200, 'Lingben', 'scooter og moped', 'Lingben', 169, 1, 2, 1),
(201, 'Linhai', 'scooter og moped', 'Linhai', 169, 1, 2, 1),
(202, 'Malaguti', 'scooter og moped', 'Malaguti', 169, 1, 2, 1),
(203, 'Mancini', 'scooter og moped', 'Mancini', 169, 1, 2, 1),
(204, 'Mega', 'scooter og moped', 'Mega', 169, 1, 2, 1),
(205, 'MGB', 'scooter og moped', 'MGB', 169, 1, 2, 1),
(206, 'Microcar', 'scooter og moped', 'Microcar', 169, 1, 2, 1),
(207, 'MotoNordic', 'scooter og moped', 'MotoNordic', 169, 1, 2, 1),
(208, 'Motorbike', 'scooter og moped', 'Motorbike', 169, 1, 2, 1),
(209, 'Motorhispania', 'scooter og moped', 'Motorhispania', 169, 1, 2, 1),
(210, 'Motrac', 'scooter og moped', 'Motrac', 169, 1, 2, 1),
(211, 'Peugeot', 'scooter og moped', 'Peugeot', 169, 1, 2, 1),
(212, 'Pgo', 'scooter og moped', 'Pgo', 169, 1, 2, 1),
(213, 'Piaggio', 'scooter og moped', 'Piaggio', 169, 1, 2, 1),
(214, 'Puch', 'scooter og moped', 'Puch', 169, 1, 2, 1),
(215, 'QINGQI', 'scooter og moped', 'QINGQI', 169, 1, 2, 1),
(216, 'Rieju', 'scooter og moped', 'Rieju', 169, 1, 2, 1),
(217, 'Sachs', 'scooter og moped', 'Sachs', 169, 1, 2, 1),
(218, 'Senda', 'scooter og moped', 'Senda', 169, 1, 2, 1),
(219, 'Sherco', 'scooter og moped', 'Sherco', 169, 1, 2, 1),
(220, 'Simson', 'scooter og moped', 'Simson', 169, 1, 2, 1),
(221, 'Skyteam', 'scooter og moped', 'Skyteam', 169, 1, 2, 1),
(222, 'SMC', 'scooter og moped', 'SMC', 169, 1, 2, 1),
(223, 'Sonik', 'scooter og moped', 'Sonik', 169, 1, 2, 1),
(224, 'Starway', 'scooter og moped', 'Starway', 169, 1, 2, 1),
(225, 'Suzuki', 'scooter og moped', 'Suzuki', 169, 1, 2, 1),
(226, 'SYM', 'scooter og moped', 'SYM', 169, 1, 2, 1),
(227, 'Tempo', 'scooter og moped', 'Tempo', 169, 1, 2, 1),
(228, 'TGB', 'scooter og moped', 'TGB', 169, 1, 2, 1),
(229, 'Tms', 'scooter og moped', 'Tms', 169, 1, 2, 1),
(230, 'Vectra', 'scooter og moped', 'Vectra', 169, 1, 2, 1),
(231, 'Veli', 'scooter og moped', 'Veli', 169, 1, 2, 1),
(232, 'Vespa', 'scooter og moped', 'Vespa', 169, 1, 2, 1),
(233, 'Viarelli', 'scooter og moped', 'Viarelli', 169, 1, 2, 1),
(234, 'Victory', 'scooter og moped', 'Victory', 169, 1, 2, 1),
(235, 'XWAY', 'scooter og moped', 'XWAY', 169, 1, 2, 1),
(236, 'Yamaha', 'scooter og moped', 'Yamaha', 169, 1, 2, 1),
(237, 'Yamoto', 'scooter og moped', 'Yamoto', 169, 1, 2, 1),
(238, 'Zundapp', 'scooter og moped', 'Zundapp', 169, 1, 2, 1),
(239, '4W-Moto', 'scooter og moped', '4W-Moto', 169, 1, 2, 1),
(240, 'Andre', 'scooter og moped', 'Andre', 169, 1, 2, 1),
(241, 'Pris', 'scooter og moped', 'Pris', 169, 1, 2, 1),
(242, 'Merke', 'Snoscooter', 'Merke (Snoscooter)', 0, 1, 2, 1),
(243, 'Apex', 'snowscooter', 'Apex', 242, 1, 2, 1),
(244, 'Arctic-cat', 'snowscooter', 'Arctic-cat', 242, 1, 2, 1),
(245, 'Can-Am', 'snowscooter', 'Can-Am', 242, 1, 2, 1),
(246, 'Kawasaki', 'snowscooter', 'Kawasaki', 242, 1, 2, 1),
(247, 'Lynx', 'snowscooter', 'Lynx', 242, 1, 2, 1),
(248, 'Ockelbo', 'snowscooter', 'Ockelbo', 242, 1, 2, 1),
(249, 'Panthera', 'snowscooter', 'Panthera', 242, 1, 2, 1),
(250, 'Polaris', 'snowscooter', 'Polaris', 242, 1, 2, 1),
(251, 'Ski-doo', 'snowscooter', 'Ski-doo', 242, 1, 2, 1),
(252, 'Yamaha', 'snowscooter', 'Yamaha', 242, 1, 2, 1),
(253, '4W-Moto', 'snowscooter', '4W-Moto', 242, 1, 2, 1),
(254, 'Andre', 'snowscooter', 'Andre', 242, 1, 2, 1),
(255, 'Salgsform', 'Salgsform', 'Salgsform (Bobil)', 0, 1, 2, 1),
(256, 'Leie ut', 'Leie ut', 'Leie ut', 255, 1, 2, 1),
(257, 'Selge', 'Selge', 'Selge', 255, 1, 2, 1),
(258, 'Område', 'Område', 'Område (Bobil)', 0, 1, 2, 1),
(259, 'Akershus', 'Bobil', 'Akershus', 258, 1, 2, 1),
(260, 'Aust-Agder', 'Bobil', 'Aust-Agder', 258, 1, 2, 1),
(261, 'Buskerud', 'Bobil', 'Buskerud', 258, 1, 2, 1),
(262, 'Finnmark', 'Bobil', 'Finnmark', 258, 1, 2, 1),
(263, 'Hedmark', 'Bobil', 'Hedmark', 258, 1, 2, 1),
(264, 'Hordaland', 'Bobil', 'Hordaland', 258, 1, 2, 1),
(265, 'Møre og Romsdal', 'Bobil', 'Møre og Romsdal', 258, 1, 2, 1),
(266, 'Nordland', 'Bobil', 'Nordland', 258, 1, 2, 1),
(267, 'Nord-Trøndelag', 'Bobil', 'Nord-Trøndelag', 258, 1, 2, 1),
(268, 'Oppland', 'Bobil', 'Oppland', 258, 1, 2, 1),
(269, 'Oslo', 'Bobil', 'Oslo', 258, 1, 2, 1),
(270, 'Rogaland', 'Bobil', 'Rogaland', 258, 1, 2, 1),
(271, 'Sogn og Fjordane', 'Bobil', 'Sogn og Fjordane', 258, 1, 2, 1),
(272, 'Sør-Trøndelag', 'Bobil', 'Sør-Trøndelag', 258, 1, 2, 1),
(273, 'Telemark', 'Bobil', 'Telemark', 258, 1, 2, 1),
(274, 'Troms', 'Bobil', 'Troms', 258, 1, 2, 1),
(275, 'Vestfold', 'Bobil', 'Vestfold', 258, 1, 2, 1),
(276, 'Vest-Agder', 'Bobil', 'Vest-Agder', 258, 1, 2, 1),
(277, 'Østfold', 'Bobil', 'Østfold', 258, 1, 2, 1),
(278, 'Merke', 'Bobil', 'Merke (Bobil)', 0, 1, 2, 1),
(279, 'Adria', 'Bobil', 'Adria', 278, 1, 2, 1),
(280, 'Ahorn', 'Bobil', 'Ahorn', 278, 1, 2, 1),
(281, 'Autostar', 'Bobil', 'Autostar', 278, 1, 2, 1),
(282, 'Bavaria', 'Bobil', 'Bavaria', 278, 1, 2, 1),
(283, 'Benimar', 'Bobil', 'Benimar', 278, 1, 2, 1),
(284, 'Bravia', 'Bobil', 'Bravia', 278, 1, 2, 1),
(285, 'Bürstner', 'Bobil', 'Bürstner', 278, 1, 2, 1),
(286, 'Cabby', 'Bobil', 'Cabby', 278, 1, 2, 1),
(287, 'Carado', 'Bobil', 'Carado', 278, 1, 2, 1),
(288, 'Carthago', 'Bobil', 'Carthago', 278, 1, 2, 1),
(289, 'Challenger', 'Bobil', 'Challenger', 278, 1, 2, 1),
(290, 'Chausson', 'Bobil', 'Chausson', 278, 1, 2, 1),
(291, 'Chevrolet', 'Bobil', 'Chevrolet', 278, 1, 2, 1),
(292, 'CI', 'Bobil', 'CI', 278, 1, 2, 1),
(293, 'Clever', 'Bobil', 'Clever', 278, 1, 2, 1),
(294, 'Concorde', 'Bobil', 'Concorde', 278, 1, 2, 1),
(295, 'Dethleffs', 'Bobil', 'Dethleffs', 278, 1, 2, 1),
(296, 'Dreamer', 'Bobil', 'Dreamer', 278, 1, 2, 1),
(297, 'Elnagh', 'Bobil', 'Elnagh', 278, 1, 2, 1),
(298, 'Eura Mobil', 'Bobil', 'Eura Mobil', 278, 1, 2, 1),
(299, 'Fendt', 'Bobil', 'Fendt', 278, 1, 2, 1),
(300, 'Fiat', 'Bobil', 'Fiat', 278, 1, 2, 1),
(301, 'Ford', 'Bobil', 'Ford', 278, 1, 2, 1),
(302, 'Frankia', 'Bobil', 'Frankia', 278, 1, 2, 1),
(303, 'GG', 'Bobil', 'GG', 278, 1, 2, 1),
(304, 'Giottiline', 'Bobil', 'Giottiline', 278, 1, 2, 1),
(305, 'Globecar', 'Bobil', 'Globecar', 278, 1, 2, 1),
(306, 'Glucksmobil', 'Bobil', 'Glucksmobil', 278, 1, 2, 1),
(307, 'Hobby', 'Bobil', 'Hobby', 278, 1, 2, 1),
(308, 'Hymer', 'Bobil', 'Hymer', 278, 1, 2, 1),
(309, 'Itineo', 'Bobil', 'Itineo', 278, 1, 2, 1),
(310, 'KABE', 'Bobil', 'KABE', 278, 1, 2, 1),
(311, 'Karmann', 'Bobil', 'Karmann', 278, 1, 2, 1),
(312, 'Knaus', 'Bobil', 'Knaus', 278, 1, 2, 1),
(313, 'Laika', 'Bobil', 'Laika', 278, 1, 2, 1),
(314, 'La Strada', 'Bobil', 'La Strada', 278, 1, 2, 1),
(315, 'Le Voyageur', 'Bobil', 'Le Voyageur', 278, 1, 2, 1),
(316, 'LMC/Münsterland', 'Bobil', 'LMC/Münsterland', 278, 1, 2, 1),
(317, 'Malibu', 'Bobil', 'Malibu', 278, 1, 2, 1),
(318, 'Mclouis', 'Bobil', 'Mclouis', 278, 1, 2, 1),
(319, 'Mercedes-Benz', 'Bobil', 'Mercedes-Benz', 278, 1, 2, 1),
(320, 'Miller', 'Bobil', 'Miller', 278, 1, 2, 1),
(321, 'Mirage', 'Bobil', 'Mirage', 278, 1, 2, 1),
(322, 'Mobilvetta', 'Bobil', 'Mobilvetta', 278, 1, 2, 1),
(323, 'Morelo', 'Bobil', 'Morelo', 278, 1, 2, 1),
(324, 'Niesmann-Bischoff', 'Bobil', 'Niesmann-Bischoff', 278, 1, 2, 1),
(325, 'Orangecamp', 'Bobil', 'Orangecamp', 278, 1, 2, 1),
(326, 'Peugeot', 'Bobil', 'Peugeot', 278, 1, 2, 1),
(327, 'Pilote', 'Bobil', 'Pilote', 278, 1, 2, 1),
(328, 'Pøssl', 'Bobil', 'Pøssl', 278, 1, 2, 1),
(329, 'P.L.A', 'Bobil', 'P.L.A', 278, 1, 2, 1),
(330, 'Rapido', 'Bobil', 'Rapido', 278, 1, 2, 1),
(331, 'Rimor', 'Bobil', 'Rimor', 278, 1, 2, 1),
(332, 'Roller Team', 'Bobil', 'Roller Team', 278, 1, 2, 1),
(333, 'Scania', 'Bobil', 'Scania', 278, 1, 2, 1),
(334, 'Solifer', 'Bobil', 'Solifer', 278, 1, 2, 1),
(335, 'Sunlight', 'Bobil', 'Sunlight', 278, 1, 2, 1),
(336, 'Sun Living', 'Bobil', 'Sun Living', 278, 1, 2, 1),
(337, 'Swift', 'Bobil', 'Swift', 278, 1, 2, 1),
(338, 'Tec', 'Bobil', 'Tec', 278, 1, 2, 1),
(339, 'VANTourer', 'Bobil', 'VANTourer', 278, 1, 2, 1),
(340, 'Volkswagen', 'Bobil', 'Volkswagen', 278, 1, 2, 1),
(341, 'Weinsberg', 'Bobil', 'Weinsberg', 278, 1, 2, 1),
(342, 'Westfalia', 'Bobil', 'Westfalia', 278, 1, 2, 1),
(343, 'Kjøretøyet står i', 'Kjøretøyet står i', 'Kjøretøyet står i (Bobil)', 0, 1, 2, 1),
(344, 'Norge', 'Norge', 'Norge', 343, 1, 2, 1),
(345, 'Utlandet', 'Utlandet', 'Utlandet', 343, 1, 2, 1),
(346, 'Årsmodell', 'Årsmodell', 'Årsmodell (Bobil)', 0, 3, 5, 1),
(347, 'Pris', 'Pris', 'Pris (Bobil)', 0, 3, 5, 1),
(348, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Bobil)', 0, 3, 5, 1),
(349, 'Type bobil', 'Type bobil', 'Type bobil (Bobil)', 0, 1, 2, 1),
(350, 'Alkove', 'Alkove', 'Alkove', 349, 1, 2, 1),
(351, 'Bybobil', 'Bybobil', 'Bybobil', 349, 1, 2, 1),
(352, 'Delintegrert', 'Delintegrert', 'Delintegrert', 349, 1, 2, 1),
(353, 'Integrert', 'Integrert', 'Integrert', 349, 1, 2, 1),
(354, 'Sengeplasser', 'Sengeplasser', 'Sengeplasser (Bobil)', 0, 4, 5, 1),
(355, 'Registrerte sitteplasser', 'Registrerte sitteplasser', 'Registrerte sitteplasser (Bobil)', 0, 3, 5, 1),
(356, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Bobil)', 0, 3, 5, 1),
(357, 'Hjuldrift', 'Hjuldrift', 'Hjuldrift (Bobil)', 0, 1, 2, 1),
(358, 'Bakhjulsdrift ', 'Bakhjulsdrift ', 'Bakhjulsdrift ', 357, 1, 2, 1),
(359, 'Firehjulsdrift ', 'Firehjulsdrift ', 'Firehjulsdrift ', 357, 1, 2, 1),
(360, 'Forhjulsdrift', 'Forhjulsdrift', 'Forhjulsdrift', 357, 1, 2, 1),
(361, 'Girkasse', 'Girkasse', 'Girkasse (Bobil)', 0, 1, 2, 1),
(362, 'Automat ', 'Automat ', 'Automat', 361, 1, 2, 1),
(363, 'Manuell', 'Manuell', 'Manuell', 361, 1, 2, 1),
(364, 'Lengde', 'Lengde', 'Lengde (Bobil)', 0, 3, 5, 1),
(365, 'Totalvekt', 'Totalvekt', 'Totalvekt (Bobil)', 0, 3, 5, 1),
(366, 'Salgsform', 'Salgsform', 'Salgsform (Campingvogner)', 0, 1, 2, 1),
(367, 'Leie ut ', 'Leie ut ', 'Leie ut ', 366, 1, 2, 1),
(368, 'Selge', 'Selge', 'Selge', 366, 1, 2, 1),
(369, 'Område', 'Område', 'Område (Campingvogn)', 0, 1, 2, 1),
(370, 'Akershus', 'Bobil', 'Akershus', 369, 1, 2, 1),
(371, 'Aust-Agder', 'Bobil', 'Aust-Agder', 369, 1, 2, 1),
(372, 'Buskerud', 'Bobil', 'Buskerud', 369, 1, 2, 1),
(373, 'Finnmark', 'Bobil', 'Finnmark', 369, 1, 2, 1),
(374, 'Hedmark', 'Bobil', 'Hedmark', 369, 1, 2, 1),
(375, 'Hordaland', 'Bobil', 'Hordaland', 369, 1, 2, 1),
(376, 'Møre og Romsdal', 'Bobil', 'Møre og Romsdal', 369, 1, 2, 1),
(377, 'Nordland', 'Bobil', 'Nordland', 369, 1, 2, 1),
(378, 'Nord-Trøndelag', 'Bobil', 'Nord-Trøndelag', 369, 1, 2, 1),
(379, 'Oppland', 'Bobil', 'Oppland', 369, 1, 2, 1),
(380, 'Oslo', 'Bobil', 'Oslo', 369, 1, 2, 1),
(381, 'Rogaland', 'Bobil', 'Rogaland', 369, 1, 2, 1),
(382, 'Sogn og Fjordane', 'Bobil', 'Sogn og Fjordane', 369, 1, 2, 1),
(383, 'Sør-Trøndelag', 'Bobil', 'Sør-Trøndelag', 369, 1, 2, 1),
(384, 'Telemark', 'Bobil', 'Telemark', 369, 1, 2, 1),
(385, 'Troms', 'Bobil', 'Troms', 369, 1, 2, 1),
(386, 'Vestfold', 'Bobil', 'Vestfold', 369, 1, 2, 1),
(387, 'Vest-Agder', 'Bobil', 'Vest-Agder', 369, 1, 2, 1),
(388, 'Østfold', 'Bobil', 'Østfold', 369, 1, 2, 1),
(389, 'Merke', 'Merke', 'Merke (campingvogn)', 0, 1, 2, 1),
(390, 'Adria', 'Campingvogn', 'Adria', 389, 2, 2, 1),
(391, 'Atlas', 'Campingvogn', 'Atlas', 389, 1, 2, 1),
(392, 'Bjølseth', 'Campingvogn', 'Bjølseth', 389, 1, 2, 1),
(393, 'Bürstner', 'Campingvogn', 'Bürstner', 389, 1, 2, 1),
(394, 'Cabby', 'Campingvogn', 'Cabby', 389, 1, 2, 1),
(395, 'Carado', 'Campingvogn', 'Carado', 389, 2, 2, 1),
(396, 'Caravelair', 'Campingvogn', 'Caravelair', 389, 1, 2, 1),
(397, 'Cavalier', 'Campingvogn', 'Cavalier', 389, 1, 2, 1),
(398, 'Dethleffs', 'Campingvogn', 'Dethleffs', 389, 1, 2, 1),
(399, 'Eifelland', 'Campingvogn', 'Eifelland', 389, 1, 2, 1),
(400, 'Fendt', 'Campingvogn', 'Fendt', 389, 1, 2, 1),
(401, 'Fleetwood', 'Campingvogn', 'Fleetwood', 389, 1, 2, 1),
(402, 'Frankia', 'Campingvogn', 'Frankia', 389, 1, 2, 1),
(403, 'Hobby', 'Campingvogn', 'Hobby', 389, 1, 2, 1),
(404, 'Home-car', 'Campingvogn', 'Home-car', 389, 1, 2, 1),
(405, 'Husvogner', 'Campingvogn', 'Husvogner', 389, 1, 2, 1),
(406, 'Hymer', 'Campingvogn', 'Hymer', 389, 1, 2, 1),
(407, 'KABE', 'Campingvogn', 'KABE', 389, 1, 2, 1),
(408, 'Kip', 'Campingvogn', 'Kip', 389, 1, 2, 1),
(409, 'Knaus', 'Campingvogn', 'Knaus', 389, 1, 2, 1),
(410, 'LMC/Münsterland', 'Campingvogn', 'LMC/Münsterland', 389, 1, 2, 1),
(411, 'Monaco', 'Campingvogn', 'Monaco', 389, 1, 2, 1),
(412, 'Polar', 'Campingvogn', 'Polar', 389, 1, 2, 1),
(413, 'Poletta', 'Campingvogn', 'Poletta', 389, 1, 2, 1),
(414, 'Savsjø', 'Campingvogn', 'Savsjø', 389, 1, 2, 1),
(415, 'Solifer', 'Campingvogn', 'Solifer', 389, 1, 2, 1),
(416, 'Sterckeman', 'Campingvogn', 'Sterckeman', 389, 1, 2, 1),
(417, 'Sunlight', 'Campingvogn', 'Sunlight', 389, 1, 2, 1),
(418, 'Tabbert', 'Campingvogn', 'Tabbert', 389, 1, 2, 1),
(419, 'Tec', 'Campingvogn', 'Tec', 389, 1, 2, 1),
(420, 'Weinsberg', 'Campingvogn', 'Weinsberg', 389, 1, 2, 1),
(421, 'Wilk', 'Campingvogn', 'Wilk', 389, 1, 2, 1),
(422, 'Willerby', 'Campingvogn', 'Willerby', 389, 1, 2, 1),
(423, 'Årsmodell', 'Årsmodell', 'Årsmodell (Campingvogn)', 0, 3, 5, 1),
(424, 'Pris', 'Pris', 'Pris (Campingvogn)', 0, 3, 5, 1),
(425, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Campingvogn)', 0, 3, 5, 1),
(426, 'Sengeplasser', 'Sengeplasser', 'Sengeplasser (Campingvogn)', 0, 3, 5, 1),
(427, 'Lengde', 'Lengde', 'Lengde (Campingvogn)', 0, 3, 5, 1),
(428, 'Bredde', 'Bredde', 'Bredde (Campingvogn)', 0, 3, 5, 1),
(429, 'Totalvekt', 'Totalvekt', 'Totalvekt (Campingvogn)', 0, 3, 5, 1),
(430, 'Pris', 'Pris', 'Pris (Truck)', 0, 3, 5, 1),
(431, 'Årsmodell', 'Årsmodell', 'Årsmodell (Truck)', 0, 3, 5, 1),
(432, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Truck)', 0, 3, 5, 1),
(433, 'Merke', 'Merke', 'Merke (Truck)', 0, 1, 2, 1),
(434, 'Atlet', 'Truck', 'Atlet', 242, 1, 2, 1),
(435, 'Attack', 'Truck', 'Attack', 242, 1, 2, 1),
(436, 'BT', 'Truck', 'BT', 242, 1, 2, 1),
(437, 'Cat', 'Truck', 'Cat', 242, 1, 2, 1),
(438, 'Cesab', 'Truck', 'Cesab', 242, 1, 2, 1),
(439, 'Clark', 'Truck', 'Clark', 242, 1, 2, 1),
(440, 'Crown', 'Truck', 'Crown', 242, 1, 2, 1),
(441, 'Daewoo', 'Truck', 'Daewoo', 242, 1, 2, 1),
(442, 'Dan Truck', 'Truck', 'Dan Truck', 242, 1, 2, 1),
(443, 'Doosan', 'Truck', 'Doosan', 433, 1, 2, 1),
(444, 'Hangcha', 'Truck', 'Hangcha', 433, 1, 2, 1),
(445, 'Hyster', 'Truck', 'Hyster', 433, 1, 2, 1),
(446, 'Hyundai', 'Truck', 'Hyundai', 433, 1, 2, 1),
(447, 'JAC', 'Truck', 'JAC', 433, 1, 2, 1),
(448, 'JCB', 'Truck', 'JCB', 433, 1, 2, 1),
(449, 'Jungheinrich', 'Truck', 'Jungheinrich', 433, 1, 2, 1),
(450, 'Kalmar', 'Truck', 'Kalmar', 433, 1, 2, 1),
(451, 'Komatsu', 'Truck', 'Komatsu', 433, 1, 2, 1),
(452, 'KramerAllrad', 'Truck', 'KramerAllrad', 433, 1, 2, 1),
(453, 'Linde', 'Truck', 'Linde', 433, 1, 2, 1),
(454, 'Logitrans', 'Truck', 'Logitrans', 433, 1, 2, 1),
(455, 'Manitou', 'Truck', 'Manitou', 433, 1, 2, 1),
(456, 'Maximal', 'Truck', 'Maximal', 433, 1, 2, 1),
(457, 'Mitsubishi', 'Truck', 'Mitsubishi', 433, 1, 2, 1),
(458, 'Nissan', 'Truck', 'Nissan', 433, 1, 2, 1),
(459, 'Rocla', 'Truck', 'Rocla', 433, 1, 2, 1),
(460, 'SMV', 'Truck', 'SMV', 433, 1, 2, 1),
(461, 'Still', 'Truck', 'Still', 433, 1, 2, 1),
(462, 'Toyota', 'Truck', 'Toyota', 433, 1, 2, 1),
(463, 'Weidemann', 'Truck', 'Weidemann', 433, 1, 2, 1),
(464, 'Andre', 'Truck', 'Andre', 433, 1, 2, 1),
(465, 'Område', 'Område', 'Område (Truck)', 0, 1, 2, 1),
(466, 'Akershus', 'Truck', 'Akershus', 465, 1, 2, 1),
(467, 'Aust-Agder', 'Truck', 'Aust-Agder', 465, 1, 2, 1),
(468, 'Buskerud', 'Truck', 'Buskerud', 465, 1, 2, 1),
(469, 'Finnmark', 'Truck', 'Finnmark', 465, 1, 2, 1),
(470, 'Hedmark', 'Truck', 'Hedmark', 465, 1, 2, 1),
(471, 'Hordaland', 'Truck', 'Hordaland', 465, 1, 2, 1),
(472, 'Møre og Romsdal', 'Truck', 'Møre og Romsdal', 465, 1, 2, 1),
(473, 'Nordland', 'Truck', 'Nordland', 465, 1, 2, 1),
(474, 'Nord-Trøndelag', 'Truck', 'Nord-Trøndelag', 465, 1, 2, 1),
(475, 'Oppland', 'Truck', 'Oppland', 465, 1, 2, 1),
(476, 'Oslo', 'Truck', 'Oslo', 465, 1, 2, 1),
(477, 'Rogaland', 'Truck', 'Rogaland', 465, 1, 2, 1),
(478, 'Sogn og Fjordane', 'Truck', 'Sogn og Fjordane', 465, 1, 2, 1),
(479, 'Sør-Trøndelag', 'Truck', 'Sør-Trøndelag', 465, 1, 2, 1),
(480, 'Telemark', 'Truck', 'Telemark', 465, 1, 2, 1),
(481, 'Troms', 'Truck', 'Troms', 465, 1, 2, 1),
(482, 'Vestfold', 'Truck', 'Vestfold', 465, 1, 2, 1),
(483, 'Vest-Agder', 'Truck', 'Vest-Agder', 465, 1, 2, 1),
(484, 'Østfold', 'Truck', 'Østfold', 465, 1, 2, 1),
(485, 'Område', 'Område', 'Område (Bus)', 0, 1, 2, 1),
(486, 'Akershus', 'Bus', 'Akershus', 485, 1, 2, 1),
(487, 'Aust-Agder', 'Bus', 'Aust-Agder', 485, 1, 2, 1),
(488, 'Buskerud', 'Bus', 'Buskerud', 485, 1, 2, 1),
(489, 'Finnmark', 'Bus', 'Finnmark', 485, 1, 2, 1),
(490, 'Hedmark', 'Bus', 'Hedmark', 485, 1, 2, 1),
(491, 'Hordaland', 'Bus', 'Hordaland', 485, 1, 2, 1),
(492, 'Møre og Romsdal', 'Bus', 'Møre og Romsdal', 485, 1, 2, 1),
(493, 'Nordland', 'Bus', 'Nordland', 485, 1, 2, 1),
(494, 'Nord-Trøndelag', 'Bus', 'Nord-Trøndelag', 485, 1, 2, 1),
(495, 'Oppland', 'Bus', 'Oppland', 485, 1, 2, 1),
(496, 'Oslo', 'Bus', 'Oslo', 485, 1, 2, 1),
(497, 'Rogaland', 'Bus', 'Rogaland', 485, 1, 2, 1),
(498, 'Sogn og Fjordane', 'Bus', 'Sogn og Fjordane', 485, 1, 2, 1),
(499, 'Sør-Trøndelag', 'Bus', 'Sør-Trøndelag', 485, 1, 2, 1),
(500, 'Telemark', 'Bus', 'Telemark', 485, 1, 2, 1),
(501, 'Troms', 'Bus', 'Troms', 485, 1, 2, 1),
(502, 'Vestfold', 'Bus', 'Vestfold', 485, 1, 2, 1),
(503, 'Vest-Agder', 'Bus', 'Vest-Agder', 485, 1, 2, 1),
(504, 'Østfold', 'Bus', 'Østfold', 485, 1, 2, 1),
(505, 'Merke', 'Merke', 'Merke (BUS)', 0, 1, 2, 1),
(506, 'DAF', 'Bus', 'DAF', 505, 1, 2, 1),
(507, 'Fiat', 'Bus', 'Fiat', 505, 1, 2, 1),
(508, 'Ford', 'Bus', 'Ford', 505, 1, 2, 1),
(509, 'Irisbus Iveco', 'Bus', 'Irisbus Iveco', 505, 1, 2, 1),
(510, 'Iveco', 'Bus', 'Iveco', 505, 1, 2, 1),
(511, 'MAN', 'Bus', 'MAN', 505, 1, 2, 1),
(512, 'Mercedes-Benz', 'Bus', 'Mercedes-Benz', 505, 1, 2, 1),
(513, 'Neoplan', 'Bus', 'Neoplan', 505, 1, 2, 1),
(514, 'Peugeot', 'Bus', 'Peugeot', 505, 1, 2, 1),
(515, 'Renault', 'Bus', 'Renault', 505, 1, 2, 1),
(516, 'Scania', 'Bus', 'Scania', 505, 1, 2, 1),
(517, 'Setra', 'Bus', 'Setra', 505, 1, 2, 1),
(518, 'VDL', 'Bus', 'VDL', 505, 1, 2, 1),
(519, 'Volkswagen', 'Bus', 'Volkswagen', 505, 1, 2, 1),
(520, 'Volvo', 'Bus', 'Volvo', 505, 1, 2, 1),
(521, 'Annet', 'Bus', 'Annet', 505, 1, 2, 1),
(522, 'Pris', 'Pris', 'Pris (Bus)', 0, 3, 5, 1),
(523, 'Årsmodell', 'Årsmodell', 'Årsmodell (Bus)', 0, 3, 5, 1),
(524, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Bus)', 0, 3, 5, 1),
(525, 'Salgsform', 'Salgsform', 'Salgsform (Biler)', 0, 1, 2, 1),
(526, 'Auksjon', 'Auksjon', 'Auksjon', 525, 1, 2, 1),
(527, 'Bruktbil til salgs', 'Bruktbil til salgs', 'Bruktbil til salgs', 525, 1, 2, 1),
(528, 'Leasing', 'Leasing', 'Leasing', 525, 1, 2, 1),
(529, 'Nybil til salgs', 'Nybil til salgs', 'Nybil til salgs', 525, 1, 2, 1),
(530, 'Årsmodell', 'Årsmodell', 'Årsmodell (Bobiler)', 0, 3, 5, 1),
(531, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Bobiler)', 0, 3, 5, 1),
(532, 'Pris', 'Pris', 'Pris (Bobiler)', 0, 3, 5, 1),
(533, 'Område', 'Område', 'Område (Bobiler)', 0, 1, 2, 1),
(534, 'Akershus', 'Biler', 'Akershus', 533, 1, 2, 1),
(535, 'Aust-Agder', 'Biler', 'Aust-Agder', 533, 1, 2, 1),
(536, 'Buskerud', 'Biler', 'Buskerud', 533, 1, 2, 1),
(537, 'Finnmark', 'Biler', 'Finnmark', 533, 1, 2, 1),
(538, 'Hedmark', 'Biler', 'Hedmark', 533, 1, 2, 1),
(539, 'Hordaland', 'Biler', 'Hordaland', 533, 1, 2, 1),
(540, 'Møre og Romsdal', 'Biler', 'Møre og Romsdal', 533, 1, 2, 1),
(541, 'Nordland', 'Biler', 'Nordland', 533, 1, 2, 1),
(542, 'Nord-Trøndelag', 'Biler', 'Nord-Trøndelag', 533, 1, 2, 1),
(543, 'Oppland', 'Biler', 'Oppland', 533, 1, 2, 1),
(544, 'Oslo', 'Biler', 'Oslo', 533, 1, 2, 1),
(545, 'Rogaland', 'Biler', 'Rogaland', 533, 1, 2, 1),
(546, 'Sogn og Fjordane', 'Biler', 'Sogn og Fjordane', 533, 1, 2, 1),
(547, 'Sør-Trøndelag', 'Biler', 'Sør-Trøndelag', 533, 1, 2, 1),
(548, 'Telemark', 'Biler', 'Telemark', 533, 1, 2, 1),
(549, 'Troms', 'Biler', 'Troms', 533, 1, 2, 1),
(550, 'Vestfold', 'Biler', 'Vestfold', 533, 1, 2, 1),
(551, 'Vest-Agder', 'Biler', 'Vest-Agder', 533, 1, 2, 1),
(552, 'Østfold', 'Biler', 'Østfold', 533, 1, 2, 1),
(553, 'Karosseri', 'Karosseri', 'Karosseri (Biler)', 0, 1, 2, 1),
(554, 'Cabriolet', 'biler', 'DAF', 553, 1, 2, 1),
(555, 'Coupe', 'biler', 'Fiat', 553, 1, 2, 1),
(556, 'Flerbruksbil', 'biler', 'Ford', 553, 1, 2, 1),
(557, 'Kasse', 'biler', 'Irisbus Iveco', 553, 1, 2, 1),
(558, 'Kombi 3-dørs', 'biler', 'Iveco', 553, 1, 2, 1),
(559, 'Kombi 5-dørs', 'biler', 'MAN', 553, 1, 2, 1),
(560, 'Pickup', 'biler', 'Mercedes-Benz', 553, 1, 2, 1),
(561, 'Sedan', 'biler', 'Neoplan', 553, 1, 2, 1),
(562, 'Stasjonsvogn', 'biler', 'Peugeot', 553, 1, 2, 1),
(563, 'SUV/Offroad', 'biler', 'Renault', 553, 1, 2, 1),
(564, 'Drivstoff', 'Drivstoff', 'Drivstoff (Biler)', 0, 1, 2, 1),
(565, 'Bensin', 'Bensin', 'Bensin', 564, 1, 2, 1),
(566, 'Diesel ', 'Diesel ', 'Diesel ', 564, 1, 2, 1),
(567, 'Elektrisite', 'Elektrisite', 'Elektrisite', 564, 1, 2, 1),
(568, 'Gass', 'Gass', 'Gass', 564, 1, 2, 1),
(569, 'Gass+bensin', 'Gass+bensin', 'Gass+bensin', 564, 1, 0, 1),
(570, 'Hybrid', 'Hybrid', 'Hybrid', 564, 1, 2, 1),
(571, 'Farge', 'Farge', 'Farge (Biler)', 0, 1, 2, 1),
(572, 'Beige', 'Beige', 'Beige', 571, 1, 2, 1),
(573, 'Blå ', 'Blå ', 'Blå ', 571, 1, 2, 1),
(574, 'Bronse', 'Bronse', 'Bronse', 571, 1, 2, 1),
(575, 'Brun', 'Brun', 'Brun', 571, 1, 2, 1),
(576, 'Grønn ', 'Grønn ', 'Grønn ', 571, 1, 2, 1),
(577, 'Grå', 'Grå', 'Grå', 571, 1, 2, 1),
(578, 'Gul ', 'Gul ', 'Gul ', 571, 1, 2, 1),
(579, 'Gull', 'Gull', 'Gull', 571, 1, 2, 1),
(580, 'Hvit', 'Hvit', 'Hvit', 571, 1, 2, 1),
(581, 'Lilla', 'Lilla', 'Lilla', 571, 1, 2, 1),
(582, 'Oransje', 'Oransje', 'Oransje', 571, 1, 2, 1),
(583, 'Rosa ', 'Rosa ', 'Rosa', 571, 1, 2, 1),
(584, 'Rød', 'Rød', 'Rød', 571, 1, 2, 1),
(585, 'Svart ', 'Svart ', 'Svart', 571, 1, 2, 1),
(586, 'Sølv', 'Sølv', 'Sølv', 571, 1, 2, 1),
(587, 'Turkis', 'Turkis', 'Turkis', 571, 1, 2, 1),
(588, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Biler)', 0, 3, 5, 1),
(589, 'Seter', 'Seter', 'Seter (Biler)', 0, 3, 5, 1),
(590, 'Hjuldrift', 'Hjuldrift', 'Hjuldrift (Biler)', 0, 1, 2, 1),
(591, 'Bakhjulsdrift', 'Bakhjulsdrift', 'Bakhjulsdrift (Biler)', 590, 1, 2, 1),
(592, 'Firehjulsdrift', 'Firehjulsdrift', 'Firehjulsdrift', 590, 1, 2, 1),
(593, 'Forhjulsdrift', 'Forhjulsdrift', 'Forhjulsdrift', 590, 1, 2, 1),
(594, 'Girkasse', 'Girkasse', 'Girkasse (biler)', 0, 1, 2, 1),
(595, 'Automat', 'Automat', 'Automat', 594, 1, 2, 1),
(596, 'Manuell', 'Manuell', 'Manuell', 594, 1, 2, 1),
(597, 'Hjulsett', 'Hjulsett', 'Hjulsett (biler)', 0, 1, 2, 1),
(598, 'Ett hjulsett', 'Ett hjulsett', 'Ett hjulsett', 25, 1, 2, 1),
(599, 'To hjulsett ', 'To hjulsett ', 'To hjulsett ', 597, 1, 2, 1),
(600, 'Garanti og forsikringer', 'Garanti og forsikringer', 'Garanti og forsikringer (Biler)', 0, 1, 2, 1),
(601, 'Forhandlergaranti ', 'Forhandlergaranti ', 'Forhandlergaranti ', 600, 1, 2, 1),
(602, 'Bilens tilstand', 'Bilens tilstand', 'Bilens tilstand (Biler)', 0, 1, 2, 1),
(603, 'Servicehistorikk', 'Servicehistorikk', 'Servicehistorikk', 602, 1, 2, 1),
(604, 'Testrapport ', 'Testrapport ', 'Testrapport', 602, 1, 2, 1),
(605, 'Tilstandsrapport m/garanti ', 'Tilstandsrapport m/garanti ', 'Tilstandsrapport m/garanti ', 602, 1, 2, 1),
(606, 'Pris', 'Pris', 'Pris (Scooter Og Moped)', 0, 3, 5, 1),
(607, 'Årsmodell', 'Årsmodell', 'Årsmodell (Scooter Og Moped)', 0, 3, 5, 1),
(608, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Scooter Og Moped)', 0, 3, 5, 1),
(609, 'Type', 'Type', 'Type (Scooter Og Moped)', 0, 1, 2, 1),
(610, 'Moped ', 'Moped ', 'Moped', 609, 1, 2, 1),
(611, 'Motorman', 'Motorman', 'Motorman', 609, 1, 2, 1),
(612, 'Scooter', 'Scooter', 'Scooter', 609, 1, 2, 1),
(613, 'Område', 'Område', 'Område (Scooter Og Moped', 0, 1, 2, 1),
(614, 'Akershus', 'Scooter Og Moped', 'Akershus', 613, 1, 2, 1),
(615, 'Aust-Agder', 'Scooter Og Moped', 'Aust-Agder', 613, 1, 2, 1),
(616, 'Buskerud', 'Scooter Og Moped', 'Buskerud', 613, 1, 2, 1),
(617, 'Finnmark', 'Scooter Og Moped', 'Finnmark', 613, 1, 2, 1),
(618, 'Hedmark', 'Scooter Og Moped', 'Hedmark', 613, 1, 2, 1),
(619, 'Hordaland', 'Scooter Og Moped', 'Hordaland', 613, 1, 2, 1),
(620, 'Møre og Romsdal', 'Scooter Og Moped', 'Møre og Romsdal', 613, 1, 2, 1),
(621, 'Nordland', 'Scooter Og Moped', 'Nordland', 613, 1, 2, 1),
(622, 'Nord-Trøndelag', 'Scooter Og Moped', 'Nord-Trøndelag', 613, 1, 2, 1),
(623, 'Oppland', 'Scooter Og Moped', 'Oppland', 613, 1, 2, 1),
(624, 'Oslo', 'Scooter Og Moped', 'Oslo', 613, 1, 2, 1),
(625, 'Rogaland', 'Scooter Og Moped', 'Rogaland', 613, 1, 2, 1),
(626, 'Sogn og Fjordane', 'Scooter Og Moped', 'Sogn og Fjordane', 613, 1, 2, 1),
(627, 'Sør-Trøndelag', 'Scooter Og Moped', 'Sør-Trøndelag', 613, 1, 2, 1),
(628, 'Telemark', 'Scooter Og Moped', 'Telemark', 613, 1, 2, 1),
(629, 'Troms', 'Scooter Og Moped', 'Troms', 613, 1, 2, 1),
(630, 'Vestfold', 'Scooter Og Moped', 'Vestfold', 613, 1, 2, 1),
(631, 'Vest-Agder', 'Scooter Og Moped', 'Vest-Agder', 613, 1, 2, 1),
(632, 'Østfold', 'Scooter Og Moped', 'Østfold', 613, 1, 2, 1),
(633, 'Slagvolum', 'Slagvolum', 'Slagvolum (Scooter Og Mopped)', 0, 3, 5, 1),
(634, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Scooter Og Moped)', 0, 3, 5, 1),
(635, 'Pris', 'Pris', 'Pris (Snoscooter)', 0, 3, 5, 1),
(636, 'Årsmodell', 'Årsmodell', 'Årsmodell (Snoscooter)', 0, 3, 5, 1),
(637, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Snoscooter)', 0, 3, 5, 1),
(638, 'Område', 'Område', 'Område (Snoscooter)', 0, 1, 2, 1),
(639, 'Akershus', 'Scooter Og Moped', 'Akershus', 638, 1, 2, 1),
(640, 'Aust-Agder', 'Scooter Og Moped', 'Aust-Agder', 638, 1, 2, 1),
(641, 'Buskerud', 'Scooter Og Moped', 'Buskerud', 638, 1, 2, 1),
(642, 'Finnmark', 'Scooter Og Moped', 'Finnmark', 638, 1, 2, 1),
(643, 'Hedmark', 'Scooter Og Moped', 'Hedmark', 638, 1, 2, 1),
(644, 'Hordaland', 'Scooter Og Moped', 'Hordaland', 638, 1, 2, 1),
(645, 'Møre og Romsdal', 'Scooter Og Moped', 'Møre og Romsdal', 638, 1, 2, 1),
(646, 'Nordland', 'Scooter Og Moped', 'Nordland', 638, 1, 2, 1),
(647, 'Nord-Trøndelag', 'Scooter Og Moped', 'Nord-Trøndelag', 638, 1, 2, 1),
(648, 'Oppland', 'Scooter Og Moped', 'Oppland', 638, 1, 2, 1),
(649, 'Oslo', 'Scooter Og Moped', 'Oslo', 638, 1, 2, 1),
(650, 'Rogaland', 'Scooter Og Moped', 'Rogaland', 638, 1, 2, 1),
(651, 'Sogn og Fjordane', 'Scooter Og Moped', 'Sogn og Fjordane', 638, 1, 2, 1),
(652, 'Sør-Trøndelag', 'Scooter Og Moped', 'Sør-Trøndelag', 638, 1, 2, 1),
(653, 'Telemark', 'Scooter Og Moped', 'Telemark', 638, 1, 2, 1),
(654, 'Troms', 'Scooter Og Moped', 'Troms', 638, 1, 2, 1),
(655, 'Vestfold', 'Scooter Og Moped', 'Vestfold', 638, 1, 2, 1),
(656, 'Vest-Agder', 'Scooter Og Moped', 'Vest-Agder', 638, 1, 2, 1),
(657, 'Østfold', 'Scooter Og Moped', 'Østfold', 638, 1, 2, 1),
(658, 'Slagvolum', 'Slagvolum', 'Slagvolum (Snoscooter)', 0, 3, 5, 1),
(659, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Snoscooter)', 0, 3, 5, 1),
(660, 'Merke', 'Merke', 'Merke (ATV)', 0, 1, 2, 1),
(661, 'Access', 'ATV', 'Access', 660, 1, 2, 1),
(662, 'Adly', 'ATV', 'Adly', 660, 1, 2, 1),
(663, 'Aeon', 'ATV', 'Aeon', 660, 1, 2, 1),
(664, 'Allroad', 'ATV', 'Allroad', 660, 1, 2, 1),
(665, 'Apex', 'ATV', 'Apex', 660, 1, 2, 1),
(666, 'Arctic-cat', 'ATV', 'Arctic-cat', 660, 1, 2, 1),
(667, 'Barossa', 'ATV', 'Barossa', 660, 1, 2, 1),
(668, 'Bombardier', 'ATV', 'Bombardier', 660, 1, 2, 1),
(669, 'Can-Am', 'ATV', 'Can-Am', 660, 1, 2, 1),
(670, 'Cectek', 'ATV', 'Cectek', 660, 1, 2, 1),
(671, 'CFMOTO', 'ATV', 'CFMOTO', 660, 1, 2, 1),
(672, 'Dinli', 'ATV', 'Dinli', 660, 1, 2, 1),
(673, 'E-ton', 'ATV', 'E-ton', 660, 1, 2, 1),
(674, 'Hisun', 'ATV', 'Hisun', 660, 1, 2, 1),
(675, 'Hisun', 'ATV', 'Hisun', 660, 1, 2, 1),
(676, 'Honda', 'ATV', 'Honda', 660, 1, 2, 1),
(677, 'Kawasaki', 'ATV', 'Kawasaki', 660, 1, 2, 1),
(678, 'Keeway', 'ATV', 'Keeway', 660, 1, 2, 1),
(679, 'KTM', 'ATV', 'KTM', 660, 1, 2, 1),
(680, 'Kubota', 'ATV', 'Kubota', 660, 1, 2, 1),
(681, 'Kudaki', 'ATV', 'Kudaki', 660, 1, 2, 1),
(682, 'Kymco', 'ATV', 'Kymco', 660, 1, 2, 1),
(683, 'Linhai', 'ATV', 'Linhai', 660, 1, 2, 1),
(684, 'Loncin', 'ATV', 'Loncin', 660, 1, 2, 1),
(685, 'Lynx', 'ATV', 'Lynx', 660, 1, 2, 1),
(686, 'Mancini', 'ATV', 'Mancini', 660, 1, 2, 1),
(687, 'Mikilon', 'ATV', 'Mikilon', 660, 1, 2, 1),
(688, 'Odes', 'ATV', 'Odes', 660, 1, 2, 1),
(689, 'Pgo', 'ATV', 'Pgo', 660, 1, 2, 1),
(690, 'Polaris', 'ATV', 'Polaris', 660, 1, 2, 1),
(691, 'QINGQI', 'ATV', 'QINGQI', 660, 1, 2, 1),
(692, 'Sachs', 'ATV', 'Sachs', 660, 1, 2, 1),
(693, 'SMC', 'ATV', 'SMC', 660, 1, 2, 1),
(694, 'Suzuki', 'ATV', 'Suzuki', 660, 1, 2, 1),
(695, 'SYM', 'ATV', 'SYM', 660, 1, 2, 1),
(696, 'TGB', 'ATV', 'TGB', 660, 1, 2, 1),
(697, 'Viarelli', 'ATV', 'Viarelli', 660, 1, 2, 1),
(698, 'Yamaha', 'ATV', 'Yamaha', 660, 1, 2, 1),
(699, '4Speed', 'ATV', '4Speed', 660, 1, 2, 1),
(700, '4W-Moto', 'ATV', '4W-Moto', 660, 1, 2, 1),
(701, 'Andre', 'ATV', 'Andre', 660, 1, 2, 1),
(702, 'Pris', 'Pris', 'Pris (ATV)', 0, 3, 5, 1),
(703, 'Årsmodell', 'Årsmodell', 'Årsmodell (ATV)', 0, 3, 5, 1),
(704, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (ATV)', 0, 3, 5, 1),
(705, 'Område', 'Område', 'Område (ATV)', 0, 1, 2, 1),
(706, 'Akershus', 'Scooter Og Moped', 'Akershus', 705, 1, 2, 1),
(707, 'Aust-Agder', 'Scooter Og Moped', 'Aust-Agder', 705, 1, 2, 1),
(708, 'Buskerud', 'Scooter Og Moped', 'Buskerud', 705, 1, 2, 1),
(709, 'Finnmark', 'Scooter Og Moped', 'Finnmark', 705, 1, 2, 1),
(710, 'Hedmark', 'Scooter Og Moped', 'Hedmark', 705, 1, 2, 1),
(711, 'Hordaland', 'Scooter Og Moped', 'Hordaland', 705, 1, 2, 1),
(712, 'Møre og Romsdal', 'Scooter Og Moped', 'Møre og Romsdal', 705, 1, 2, 1),
(713, 'Nordland', 'Scooter Og Moped', 'Nordland', 705, 1, 2, 1),
(714, 'Nord-Trøndelag', 'Scooter Og Moped', 'Nord-Trøndelag', 705, 1, 2, 1),
(715, 'Oppland', 'Scooter Og Moped', 'Oppland', 705, 1, 2, 1),
(716, 'Oslo', 'Scooter Og Moped', 'Oslo', 705, 1, 2, 1),
(717, 'Rogaland', 'Scooter Og Moped', 'Rogaland', 705, 1, 2, 1),
(718, 'Sogn og Fjordane', 'Scooter Og Moped', 'Sogn og Fjordane', 705, 1, 2, 1),
(719, 'Sør-Trøndelag', 'Scooter Og Moped', 'Sør-Trøndelag', 705, 1, 2, 1),
(720, 'Telemark', 'Scooter Og Moped', 'Telemark', 705, 1, 2, 1),
(721, 'Troms', 'Scooter Og Moped', 'Troms', 705, 1, 2, 1),
(722, 'Vestfold', 'Scooter Og Moped', 'Vestfold', 705, 1, 2, 1),
(723, 'Vest-Agder', 'Scooter Og Moped', 'Vest-Agder', 705, 1, 2, 1),
(724, 'Østfold', 'Scooter Og Moped', 'Østfold', 705, 1, 2, 1),
(725, 'Slagvolum', 'Slagvolum', 'Slagvolum (ATV)', 0, 3, 5, 1),
(726, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (ATV)', 0, 3, 5, 1),
(727, 'Tilstand', 'Tilstand', 'Tilstand (Motorsykkel)', 0, 1, 2, 1),
(728, 'Brukt MC', 'Brukt MC', 'Brukt MC', 727, 1, 2, 1),
(729, 'Ny MC ', 'Ny MC ', 'Ny MC ', 727, 1, 3, 1),
(730, 'Merke', 'Merke', 'Merke (Motorsykkel)', 0, 1, 2, 1),
(731, 'American Iron Horse', 'Motorsykkel', 'American Iron Horse', 730, 1, 2, 1),
(732, 'Aprilia', 'Motorsykkel', 'Aprilia', 730, 1, 2, 1),
(733, 'Baotian', 'Motorsykkel', 'Baotian', 730, 1, 2, 1),
(734, 'Beta', 'Motorsykkel', 'Beta', 730, 1, 2, 1),
(735, 'Big Dog', 'Motorsykkel', 'Big Dog', 730, 1, 2, 1),
(736, 'BMW', 'Motorsykkel', 'BMW', 730, 1, 2, 1),
(737, 'Boss Hoss', 'Motorsykkel', 'Boss Hoss', 730, 1, 2, 1),
(738, 'BSA', 'Motorsykkel', 'BSA', 730, 1, 2, 1),
(739, 'Buell', 'Motorsykkel', 'Buell', 730, 1, 2, 1),
(740, 'Cagiva', 'Motorsykkel', 'Cagiva', 730, 1, 2, 1),
(741, 'Can-Am', 'Motorsykkel', 'Can-Am', 730, 1, 2, 1),
(742, 'CPI', 'Motorsykkel', 'CPI', 730, 1, 2, 1),
(743, 'Daelim', 'Motorsykkel', 'Daelim', 730, 1, 2, 1),
(744, 'Derbi', 'Motorsykkel', 'Derbi', 730, 1, 2, 1),
(745, 'Ducati', 'Motorsykkel', 'Ducati', 730, 1, 2, 1),
(746, 'Energica', 'Motorsykkel', 'Energica', 730, 1, 2, 1),
(747, 'GasGas', 'Motorsykkel', 'GasGas', 730, 1, 2, 1),
(748, 'Harley-Davidson', 'Motorsykkel', 'Harley-Davidson', 730, 1, 2, 1),
(749, 'Hisun', 'Motorsykkel', 'Hisun', 730, 1, 2, 1),
(750, 'Hisun', 'Motorsykkel', 'Hisun', 730, 1, 2, 1),
(751, 'Honda', 'Motorsykkel', 'Honda', 730, 1, 2, 1),
(752, 'Husaberg', 'Motorsykkel', 'Husaberg', 730, 1, 2, 1),
(753, 'Husqvarna', 'Motorsykkel', 'Husqvarna', 730, 1, 2, 1),
(754, 'Hyosung', 'Motorsykkel', 'Hyosung', 730, 1, 2, 1),
(755, 'INDIAN', 'Motorsykkel', 'INDIAN', 730, 1, 2, 1),
(756, 'Jawa/CZ', 'Motorsykkel', 'Jawa/CZ', 730, 1, 2, 1),
(757, 'Kawasaki', 'Motorsykkel', 'Kawasaki', 730, 1, 2, 1),
(758, 'Keeway', 'Motorsykkel', 'Keeway', 730, 1, 2, 1),
(759, 'Kinroad', 'Motorsykkel', 'Kinroad', 730, 1, 2, 1),
(760, 'KTM', 'Motorsykkel', 'KTM', 730, 1, 2, 1),
(761, 'Kymco', 'Motorsykkel', 'Kymco', 730, 1, 2, 1),
(762, 'Lifan', 'Motorsykkel', 'Lifan', 730, 1, 2, 1),
(763, 'Mancini', 'Motorsykkel', 'Mancini', 730, 1, 2, 1),
(764, 'Microcar', 'Motorsykkel', 'Microcar', 730, 1, 2, 1),
(765, 'Motorhispania', 'Motorsykkel', 'Motorhispania', 730, 1, 2, 1),
(766, 'Moto Guzzi', 'Motorsykkel', 'Moto Guzzi', 730, 1, 2, 1),
(767, 'MV Agusta', 'Motorsykkel', 'MV Agusta', 730, 1, 2, 1),
(768, 'MZ', 'Motorsykkel', 'MZ', 730, 1, 2, 1),
(769, 'Ossa', 'Motorsykkel', 'Ossa', 730, 1, 2, 1),
(770, 'Peugeot', 'Motorsykkel', 'Peugeot', 730, 1, 2, 1),
(771, 'Piaggio', 'Motorsykkel', 'Piaggio', 730, 1, 2, 1),
(772, 'Polaris', 'Motorsykkel', 'Polaris', 730, 1, 2, 1),
(773, 'Rieju', 'Motorsykkel', 'Rieju', 730, 1, 2, 1),
(774, 'Royal Enfield', 'Motorsykkel', 'Royal Enfield', 730, 1, 2, 1),
(775, 'Scorpa', 'Motorsykkel', 'Scorpa', 730, 1, 2, 1),
(776, 'Sherco', 'Motorsykkel', 'Sherco', 730, 1, 2, 1),
(777, 'Starway', 'Motorsykkel', 'Starway', 730, 1, 2, 1),
(778, 'Suzuki', 'Motorsykkel', 'Suzuki', 730, 1, 2, 1),
(779, 'Tempo', 'Motorsykkel', 'Tempo', 730, 1, 2, 1),
(780, 'TGB', 'Motorsykkel', 'TGB', 730, 1, 2, 1),
(781, 'TM', 'Motorsykkel', 'TM', 730, 1, 2, 1),
(782, 'Tms', 'Motorsykkel', 'Tms', 730, 1, 2, 1),
(783, 'Triumph', 'Motorsykkel', 'Triumph', 730, 1, 2, 1),
(784, 'Veli', 'Motorsykkel', 'Veli', 730, 1, 2, 1),
(785, 'Vespa', 'Motorsykkel', 'Vespa', 730, 1, 2, 1),
(786, 'Victory', 'Motorsykkel', 'Victory', 730, 1, 2, 1),
(787, 'Yamaha', 'Motorsykkel', 'Yamaha', 730, 1, 2, 1),
(788, 'Zero', 'Motorsykkel', 'Zero', 730, 1, 2, 1),
(789, 'Zundapp', 'Motorsykkel', 'Zundapp', 730, 1, 2, 1),
(790, '4W-Moto', 'Motorsykkel', '4W-Moto', 730, 1, 2, 1),
(791, 'Andre', 'Motorsykkel', 'Andre', 730, 1, 2, 1),
(792, 'Pris', 'Pris', 'Pris (Motorsykkel)', 0, 3, 5, 1),
(793, 'Årsmodell', 'Årsmodell', 'Årsmodell (Motorsykkel)', 0, 3, 5, 1),
(794, 'Kilometerstand', 'Kilometerstand', 'Kilometerstand (Motorsykkel)', 0, 3, 5, 1),
(795, 'Type', 'Type', 'Type (Motorsykkel)', 0, 1, 2, 1),
(796, 'Chopper', 'Motorsykkel', 'Chopper', 795, 1, 2, 1),
(797, 'Classic/Nakne', 'Motorsykkel', 'Classic/Nakne', 795, 1, 2, 1),
(798, 'Cross/Enduro/Trial', 'Motorsykkel', 'Cross/Enduro/Trial', 795, 1, 2, 1),
(799, 'Cruiser', 'Motorsykkel', 'Cruiser', 795, 1, 2, 1),
(800, 'Custom', 'Motorsykkel', 'Custom', 795, 1, 2, 1),
(801, 'Lett MC', 'Motorsykkel', 'Lett MC', 795, 1, 2, 1),
(802, 'Offroad/Motard', 'Motorsykkel', 'Offroad/Motard', 795, 1, 2, 1),
(803, 'Scooter', 'Motorsykkel', 'Scooter', 795, 1, 2, 1),
(804, 'Sidevogn', 'Motorsykkel', 'Sidevogn', 795, 1, 2, 1),
(805, 'Sport', 'Motorsykkel', 'Sport', 795, 1, 2, 1),
(806, 'Touring', 'Motorsykkel', 'Touring', 795, 1, 2, 1),
(807, 'Trike', 'Motorsykkel', 'Trike', 795, 1, 2, 1),
(808, 'Veteran', 'Motorsykkel', 'Veteran', 795, 1, 2, 1),
(809, 'Andre', 'Motorsykkel', 'Andre', 795, 1, 2, 1),
(810, 'Område', 'Område', 'Område (Motorsykkel)', 0, 1, 2, 1),
(811, 'Akershus', 'Motorsykkel', 'Akershus', 810, 1, 2, 1),
(812, 'Aust-Agder', 'Motorsykkel', 'Aust-Agder', 810, 1, 2, 1),
(813, 'Buskerud', 'Motorsykkel', 'Buskerud', 810, 1, 2, 1),
(814, 'Finnmark', 'Motorsykkel', 'Finnmark', 810, 1, 2, 1),
(815, 'Hedmark', 'Motorsykkel', 'Hedmark', 810, 1, 2, 1),
(816, 'Hordaland', 'Motorsykkel', 'Hordaland', 810, 1, 2, 1),
(817, 'Møre og Romsdal', 'Motorsykkel', 'Møre og Romsdal', 810, 1, 2, 1),
(818, 'Nordland', 'Motorsykkel', 'Nordland', 810, 1, 2, 1),
(819, 'Nord-Trøndelag', 'Motorsykkel', 'Nord-Trøndelag', 810, 1, 2, 1),
(820, 'Oppland', 'Motorsykkel', 'Oppland', 810, 1, 2, 1),
(821, 'Oslo', 'Motorsykkel', 'Oslo', 810, 1, 2, 1),
(822, 'Rogaland', 'Motorsykkel', 'Rogaland', 810, 1, 2, 1),
(823, 'Sogn og Fjordane', 'Motorsykkel', 'Sogn og Fjordane', 810, 1, 2, 1),
(824, 'Sør-Trøndelag', 'Motorsykkel', 'Sør-Trøndelag', 810, 1, 2, 1),
(825, 'Telemark', 'Motorsykkel', 'Telemark', 810, 1, 2, 1),
(826, 'Troms', 'Motorsykkel', 'Troms', 810, 1, 2, 1),
(827, 'Vestfold', 'Motorsykkel', 'Vestfold', 810, 1, 2, 1),
(828, 'Vest-Agder', 'Motorsykkel', 'Vest-Agder', 810, 1, 2, 1),
(829, 'Østfold', 'Motorsykkel', 'Østfold', 810, 1, 2, 1),
(830, 'Slagvolum', 'Slagvolum', 'Slagvolum (Motorsykkel)', 0, 3, 5, 1),
(831, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Motorsykkel)', 0, 3, 5, 1),
(832, 'Event', 'Event', 'Event (Aktiviteter)', 0, 6, 6, 1),
(833, 'Tilstand', 'Tilstand', 'Tilstand (Bat Til Slag)', 0, 1, 2, 1),
(834, 'Brukt båt ', 'Brukt båt ', 'Brukt båt', 833, 1, 2, 1),
(835, 'Ny båt ', 'Ny båt ', 'Ny båt ', 833, 1, 2, 1),
(836, 'Båten ligger i', 'Båten ligger i', 'Båten ligger i (Bat Til Slag)', 0, 1, 2, 1),
(837, 'Norge', 'Norge', 'Norge', 836, 1, 2, 1),
(838, 'Utlandet', 'Utlandet', 'Utlandet', 836, 1, 2, 1),
(839, 'Båttype', 'Båttype', 'Båttype (Bat Til Slags)', 0, 1, 2, 1),
(840, 'Cabincruiser', 'Bat Til Slags', 'Cabincruiser', 839, 1, 2, 1),
(841, 'Daycruiser', 'Bat Til Slags', 'Daycruiser', 839, 1, 2, 1),
(842, 'Gummibåt/Jolle', 'Bat Til Slags', 'Gummibåt/Jolle', 839, 1, 2, 1),
(843, 'RIB', 'Bat Til Slags', 'RIB', 839, 1, 2, 1),
(844, 'Seilbåt/Motorseiler', 'Bat Til Slags', 'Seilbåt/Motorseiler', 839, 1, 2, 1),
(845, 'Skjærgårdsjeep/Landstedsbåt', 'Bat Til Slags', 'Skjærgårdsjeep/Landstedsbåt', 839, 1, 2, 1),
(846, 'Speedbåt', 'Bat Til Slags', 'Speedbåt', 839, 1, 2, 1),
(847, 'Trebåt/Snekke', 'Bat Til Slags', 'Trebåt/Snekke', 839, 1, 2, 1),
(848, 'Vannscooter', 'Bat Til Slags', 'Vannscooter', 839, 1, 2, 1),
(849, 'Yacht', 'Bat Til Slags', 'Yacht', 839, 1, 2, 1),
(850, 'Yrkesbåt/Sjark/Skøyte', 'Bat Til Slags', 'Yrkesbåt/Sjark/Skøyte', 839, 1, 2, 1),
(851, 'Andre', 'Bat Til Slags', 'Andre', 839, 1, 2, 1),
(852, 'Båtmerke', 'Båtmerke', 'Båtmerke (Bat til slags)', 0, 1, 2, 1),
(853, 'Absolute', 'Bat Til Slags', 'Absolute', 852, 1, 2, 1),
(854, 'Achilles', 'Bat Til Slags', 'Achilles', 852, 1, 2, 1),
(855, 'Agder', 'Bat Til Slags', 'Agder', 852, 1, 2, 1),
(856, 'Airship Ribs', 'Bat Til Slags', 'Airship Ribs', 852, 1, 2, 1),
(857, 'AL', 'Bat Til Slags', 'AL', 852, 1, 2, 1),
(858, 'Albin', 'Bat Til Slags', 'Albin', 852, 1, 2, 1),
(859, 'Alicraft', 'Bat Til Slags', 'Alicraft', 852, 1, 2, 1),
(860, 'Alo', 'Bat Til Slags', 'Alo', 852, 1, 2, 1),
(861, 'Alubat', 'Bat Til Slags', 'Alubat', 852, 1, 2, 1),
(862, 'Alucraft', 'Bat Til Slags', 'Alucraft', 852, 1, 2, 1),
(863, 'Alufish', 'Bat Til Slags', 'Alufish', 852, 1, 2, 1),
(864, 'AMT', 'Bat Til Slags', 'AMT', 852, 1, 2, 1),
(865, 'Andy', 'Bat Til Slags', 'Andy', 852, 1, 2, 1),
(866, 'Anytec', 'Bat Til Slags', 'Anytec', 852, 1, 2, 1),
(867, 'Aphrodite', 'Bat Til Slags', 'Aphrodite', 852, 1, 2, 1),
(868, 'Aquador', 'Bat Til Slags', 'Aquador', 852, 1, 2, 1),
(869, 'Aquamar', 'Bat Til Slags', 'Aquamar', 852, 1, 2, 1),
(870, 'Aquaquick', 'Bat Til Slags', 'Aquaquick', 852, 1, 2, 1),
(871, 'Arcona', 'Bat Til Slags', 'Arcona', 852, 1, 2, 1),
(872, 'Arctic', 'Bat Til Slags', 'Arctic', 852, 1, 2, 1),
(873, 'Arctic Blue', 'Bat Til Slags', 'Arctic Blue', 852, 1, 2, 1),
(874, 'Ardea', 'Bat Til Slags', 'Ardea', 852, 1, 2, 1),
(875, 'Arendalsnekke', 'Bat Til Slags', 'Arendalsnekke', 852, 1, 2, 1),
(876, 'Arimar', 'Bat Til Slags', 'Arimar', 852, 1, 2, 1),
(877, 'Arronet', 'Bat Til Slags', 'Arronet', 852, 1, 2, 1),
(878, 'Arvor', 'Bat Til Slags', 'Arvor', 852, 1, 2, 1),
(879, 'Askeladden', 'Bat Til Slags', 'Askeladden', 852, 1, 2, 1),
(880, 'Astondoa', 'Bat Til Slags', 'Astondoa', 852, 1, 2, 1),
(881, 'Atlantic', 'Bat Til Slags', 'Atlantic', 852, 1, 2, 1),
(882, 'Atlantic Marine', 'Bat Til Slags', 'Atlantic Marine', 852, 1, 2, 1),
(883, 'Atlantis', 'Bat Til Slags', 'Atlantis', 852, 1, 2, 1),
(884, 'Avance', 'Bat Til Slags', 'Avance', 852, 1, 2, 1),
(885, 'Aventura', 'Bat Til Slags', 'Aventura', 852, 1, 2, 1),
(886, 'Avon', 'Bat Til Slags', 'Avon', 852, 1, 2, 1),
(887, 'Axopar', 'Bat Til Slags', 'Axopar', 852, 1, 2, 1),
(888, 'Azimut', 'Bat Til Slags', 'Azimut', 852, 1, 2, 1),
(889, 'BAJA', 'Bat Til Slags', 'BAJA', 852, 1, 2, 1),
(890, 'Balt', 'Bat Til Slags', 'Balt', 852, 1, 2, 1),
(891, 'Banner', 'Bat Til Slags', 'Banner', 852, 1, 2, 1),
(892, 'Barracuda', 'Bat Til Slags', 'Barracuda', 852, 1, 2, 1),
(893, 'Bavaria', 'Bat Til Slags', 'Bavaria', 852, 1, 2, 1),
(894, 'Bayliner', 'Bat Til Slags', 'Bayliner', 852, 1, 2, 1),
(895, 'BB', 'Bat Til Slags', 'BB', 852, 1, 2, 1),
(896, 'Bell', 'Bat Til Slags', 'Bell', 852, 1, 2, 1),
(897, 'Bella', 'Bat Til Slags', 'Bella', 852, 1, 2, 1),
(898, 'Beneteau', 'Bat Til Slags', 'Beneteau', 852, 1, 2, 1),
(899, 'BestMarin', 'Bat Til Slags', 'BestMarin', 852, 1, 2, 1),
(900, 'Bever', 'Bat Til Slags', 'Bever', 852, 1, 2, 1),
(901, 'Biam', 'Bat Til Slags', 'Biam', 852, 1, 2, 1),
(902, 'Bianca', 'Bat Til Slags', 'Bianca', 852, 1, 2, 1),
(903, 'Birchwood', 'Bat Til Slags', 'Birchwood', 852, 1, 2, 1),
(904, 'Blesser', 'Bat Til Slags', 'Blesser', 852, 1, 2, 1),
(905, 'Bluesea', 'Bat Til Slags', 'Bluesea', 852, 1, 2, 1),
(906, 'Bombard', 'Bat Til Slags', 'Bombard', 852, 1, 2, 1),
(907, 'Bonanza', 'Bat Til Slags', 'Bonanza', 852, 1, 2, 1),
(908, 'Boston Whaler', 'Bat Til Slags', 'Boston Whaler', 852, 1, 2, 1),
(909, 'Bostrøm', 'Bat Til Slags', 'Bostrøm', 852, 1, 2, 1),
(910, 'BOWI Serai', 'Bat Til Slags', 'BOWI Serai', 852, 1, 2, 1),
(911, 'BRIG', 'Bat Til Slags', 'BRIG', 852, 1, 2, 1),
(912, 'Brioni', 'Bat Til Slags', 'Brioni', 852, 1, 2, 1),
(913, 'Bryant', 'Bat Til Slags', 'Bryant', 852, 1, 2, 1),
(914, 'Buster', 'Bat Til Slags', 'Buster', 852, 1, 2, 1),
(915, 'Campion', 'Bat Til Slags', 'Campion', 852, 1, 2, 1),
(916, 'Cantieri di Sarnico', 'Bat Til Slags', 'Cantieri di Sarnico', 852, 1, 2, 1),
(917, 'Capelli', 'Bat Til Slags', 'Capelli', 852, 1, 2, 1),
(918, 'Caravelle', 'Bat Til Slags', 'Caravelle', 852, 1, 2, 1),
(919, 'Cayenne', 'Bat Til Slags', 'Cayenne', 852, 1, 2, 1),
(920, 'Century', 'Bat Til Slags', 'Century', 852, 1, 2, 1),
(921, 'Champion', 'Bat Til Slags', 'Champion', 852, 1, 2, 1),
(922, 'Chaparral', 'Bat Til Slags', 'Chaparral', 852, 1, 2, 1),
(923, 'Chris Craft', 'Bat Til Slags', 'Chris Craft', 852, 1, 2, 1),
(924, 'Cleopatra', 'Bat Til Slags', 'Cleopatra', 852, 1, 2, 1),
(925, 'Clipper', 'Bat Til Slags', 'Clipper', 852, 1, 2, 1),
(926, 'Coaster', 'Bat Til Slags', 'Coaster', 852, 1, 2, 1),
(927, 'Cobalt', 'Bat Til Slags', 'Cobalt', 852, 1, 2, 1),
(928, 'Cobra', 'Bat Til Slags', 'Cobra', 852, 1, 2, 1),
(929, 'Colin Archer', 'Bat Til Slags', 'Colin Archer', 852, 1, 2, 1),
(930, 'Comet', 'Bat Til Slags', 'Comet', 852, 1, 2, 1),
(931, 'Comfort', 'Bat Til Slags', 'Comfort', 852, 1, 2, 1),
(932, 'Comfortina', 'Bat Til Slags', 'Comfortina', 852, 1, 2, 1),
(933, 'Contessa', 'Bat Til Slags', 'Contessa', 852, 1, 2, 1),
(934, 'Contest', 'Bat Til Slags', 'Contest', 852, 1, 2, 1),
(935, 'Cormate', 'Bat Til Slags', 'Cormate', 852, 1, 2, 1),
(936, 'Cranchi', 'Bat Til Slags', 'Cranchi', 852, 1, 2, 1),
(937, 'Crescent', 'Bat Til Slags', 'Crescent', 852, 1, 2, 1),
(938, 'Crownline', 'Bat Til Slags', 'Crownline', 852, 1, 2, 1),
(939, 'Cruiser', 'Bat Til Slags', 'Cruiser', 852, 1, 2, 1),
(940, 'Cutwater', 'Bat Til Slags', 'Cutwater', 852, 1, 2, 1),
(941, 'Cyber 370', 'Bat Til Slags', 'Cyber 370', 852, 1, 2, 1),
(942, 'Dacapo', 'Bat Til Slags', 'Dacapo', 852, 1, 2, 1),
(943, 'Dehler', 'Bat Til Slags', 'Dehler', 852, 1, 2, 1),
(944, 'Delphia', 'Bat Til Slags', 'Delphia', 852, 1, 2, 1),
(945, 'Delta', 'Bat Til Slags', 'Delta', 852, 1, 2, 1),
(946, 'Dolmøy', 'Bat Til Slags', 'Dolmøy', 852, 1, 2, 1),
(947, 'Donzi', 'Bat Til Slags', 'Donzi', 852, 1, 2, 1),
(948, 'Doral', 'Bat Til Slags', 'Doral', 852, 1, 2, 1),
(949, 'Draco', 'Bat Til Slags', 'Draco', 852, 1, 2, 1),
(950, 'Drago', 'Bat Til Slags', 'Drago', 852, 1, 2, 1),
(951, 'Dragonfly', 'Bat Til Slags', 'Dragonfly', 852, 1, 2, 1),
(952, 'Drake', 'Bat Til Slags', 'Drake', 852, 1, 2, 1),
(953, 'Drive', 'Bat Til Slags', 'Drive', 852, 1, 2, 1),
(954, 'Dromedille', 'Bat Til Slags', 'Dromedille', 852, 1, 2, 1),
(955, 'Dsp', 'Bat Til Slags', 'Dsp', 852, 1, 2, 1),
(956, 'Dufour', 'Bat Til Slags', 'Dufour', 852, 1, 2, 1),
(957, 'Dynamic', 'Bat Til Slags', 'Dynamic', 852, 1, 2, 1),
(958, 'Eikeli', 'Bat Til Slags', 'Eikeli', 852, 1, 2, 1),
(959, 'Elan', 'Bat Til Slags', 'Elan', 852, 1, 2, 1),
(960, 'Elwaro', 'Bat Til Slags', 'Elwaro', 852, 1, 2, 1),
(961, 'Emili', 'Bat Til Slags', 'Emili', 852, 1, 2, 1),
(962, 'Endourance', 'Bat Til Slags', 'Endourance', 852, 1, 2, 1),
(963, 'Enes', 'Bat Til Slags', 'Enes', 852, 1, 2, 1),
(964, 'Explorer', 'Bat Til Slags', 'Explorer', 852, 1, 2, 1),
(965, 'Faeton', 'Bat Til Slags', 'Faeton', 852, 1, 2, 1),
(966, 'Fairline', 'Bat Til Slags', 'Fairline', 852, 1, 2, 1),
(967, 'Falcon', 'Bat Til Slags', 'Falcon', 852, 1, 2, 1),
(968, 'Farr', 'Bat Til Slags', 'Farr', 852, 1, 2, 1),
(969, 'Faster', 'Bat Til Slags', 'Faster', 852, 1, 2, 1),
(970, 'Ferretti', 'Bat Til Slags', 'Ferretti', 852, 1, 2, 1),
(971, 'Fevik', 'Bat Til Slags', 'Fevik', 852, 1, 2, 1),
(972, 'Finnmaster', 'Bat Til Slags', 'Finnmaster', 852, 1, 2, 1),
(973, 'Finnsailer', 'Bat Til Slags', 'Finnsailer', 852, 1, 2, 1),
(974, 'Finnsport', 'Bat Til Slags', 'Finnsport', 852, 1, 2, 1),
(975, 'Firling', 'Bat Til Slags', 'Firling', 852, 1, 2, 1),
(976, 'Fjord', 'Bat Til Slags', 'Fjord', 852, 1, 2, 1),
(977, 'Fjord boats', 'Bat Til Slags', 'Fjord boats', 852, 1, 2, 1),
(978, 'Fjord Terne', 'Bat Til Slags', 'Fjord Terne', 852, 1, 2, 1),
(979, 'Flem', 'Bat Til Slags', 'Flem', 852, 1, 2, 1),
(980, 'Fletcher', 'Bat Til Slags', 'Fletcher', 852, 1, 2, 1),
(981, 'Flipper', 'Bat Til Slags', 'Flipper', 852, 1, 2, 1),
(982, 'FM', 'Bat Til Slags', 'FM', 852, 1, 2, 1),
(983, 'Forbina', 'Bat Til Slags', 'Forbina', 852, 1, 2, 1);
INSERT INTO `filter_name` (`id`, `filter_name`, `filter_description`, `filter_value`, `parent_filter`, `display_for_adpost_page`, `display_for_screen_page`, `status`) VALUES
(984, 'Formula Watercraft', 'Bat Til Slags', 'Formula Watercraft', 852, 1, 2, 1),
(985, 'Fountain', 'Bat Til Slags', 'Fountain', 852, 1, 2, 1),
(986, 'Fountaine Pajot', 'Bat Til Slags', 'Fountaine Pajot', 852, 1, 2, 1),
(987, 'Fram', 'Bat Til Slags', 'Fram', 852, 1, 2, 1),
(988, 'FUN', 'Bat Til Slags', 'FUN', 852, 1, 2, 1),
(989, 'Furuholmen', 'Bat Til Slags', 'Furuholmen', 852, 1, 2, 1),
(990, 'Galeon', 'Bat Til Slags', 'Galeon', 852, 1, 2, 1),
(991, 'Galia', 'Bat Til Slags', 'Galia', 852, 1, 2, 1),
(992, 'Gambling', 'Bat Til Slags', 'Gambling', 852, 1, 2, 1),
(993, 'Gemi', 'Bat Til Slags', 'Gemi', 852, 1, 2, 1),
(994, 'GH', 'Bat Til Slags', 'GH', 852, 1, 2, 1),
(995, 'GibSea', 'Bat Til Slags', 'GibSea', 852, 1, 2, 1),
(996, 'Gilbert', 'Bat Til Slags', 'Gilbert', 852, 1, 2, 1),
(997, 'Gimle', 'Bat Til Slags', 'Gimle', 852, 1, 2, 1),
(998, 'Glastron', 'Bat Til Slags', 'Glastron', 852, 1, 2, 1),
(999, 'Goldfish', 'Bat Til Slags', 'Goldfish', 852, 1, 2, 1),
(1000, 'GP', 'Bat Til Slags', 'GP', 852, 1, 2, 1),
(1001, 'Granada', 'Bat Til Slags', 'Granada', 852, 1, 2, 1),
(1002, 'Grand', 'Bat Til Slags', 'Grand', 852, 1, 2, 1),
(1003, 'Grandezza', 'Bat Til Slags', 'Grandezza', 852, 1, 2, 1),
(1004, 'Grand Banks', 'Bat Til Slags', 'Grand Banks', 852, 1, 2, 1),
(1005, 'Greatline', 'Bat Til Slags', 'Greatline', 852, 1, 2, 1),
(1006, 'Grimsøy', 'Bat Til Slags', 'Grimsøy', 852, 1, 2, 1),
(1007, 'GRP', 'Bat Til Slags', 'GRP', 852, 1, 2, 1),
(1008, 'Gulf Craft', 'Bat Til Slags', 'Gulf Craft', 852, 1, 2, 1),
(1009, 'Guy', 'Bat Til Slags', 'Guy', 852, 1, 2, 1),
(1010, 'Halco', 'Bat Til Slags', 'Halco', 852, 1, 2, 1),
(1011, 'Hallberg Rassy', 'Bat Til Slags', 'Hallberg Rassy', 852, 1, 2, 1),
(1012, 'Hanse', 'Bat Til Slags', 'Hanse', 852, 1, 2, 1),
(1013, 'Hansvik', 'Bat Til Slags', 'Hansvik', 852, 1, 2, 1),
(1014, 'Hanto', 'Bat Til Slags', 'Hanto', 852, 1, 2, 1),
(1015, 'Hardanger', 'Bat Til Slags', 'Hardanger', 852, 1, 2, 1),
(1016, 'Hardangersnekke', 'Bat Til Slags', 'Hardangersnekke', 852, 1, 2, 1),
(1017, 'Hasla', 'Bat Til Slags', 'Hasla', 852, 1, 2, 1),
(1018, 'Hasle', 'Bat Til Slags', 'Hasle', 852, 1, 2, 1),
(1019, 'Hasle Summer Fun', 'Bat Til Slags', 'Hasle Summer Fun', 852, 1, 2, 1),
(1020, 'Hero', 'Bat Til Slags', 'Hero', 852, 1, 2, 1),
(1021, 'Herva', 'Bat Til Slags', 'Herva', 852, 1, 2, 1),
(1022, 'Herwa', 'Bat Til Slags', 'Herwa', 852, 1, 2, 1),
(1023, 'Highfield', 'Bat Til Slags', 'Highfield', 852, 1, 2, 1),
(1024, 'HighPerformance', 'Bat Til Slags', 'HighPerformance', 852, 1, 2, 1),
(1025, 'Hitra', 'Bat Til Slags', 'Hitra', 852, 1, 2, 1),
(1026, 'Hobby', 'Bat Til Slags', 'Hobby', 852, 1, 2, 1),
(1027, 'Hobiecat', 'Bat Til Slags', 'Hobiecat', 852, 1, 2, 1),
(1028, 'Honda', 'Bat Til Slags', 'Honda', 852, 1, 2, 1),
(1029, 'Hortensnekka', 'Bat Til Slags', 'Hortensnekka', 852, 1, 2, 1),
(1030, 'HR', 'Bat Til Slags', 'HR', 852, 1, 2, 1),
(1031, 'Hui', 'Bat Til Slags', 'Hui', 852, 1, 2, 1),
(1032, 'Hurrycane', 'Bat Til Slags', 'Hurrycane', 852, 1, 2, 1),
(1033, 'Husky', 'Bat Til Slags', 'Husky', 852, 1, 2, 1),
(1034, 'Hydrolift', 'Bat Til Slags', 'Hydrolift', 852, 1, 2, 1),
(1035, 'Hydromarin', 'Bat Til Slags', 'Hydromarin', 852, 1, 2, 1),
(1036, 'Ibiza', 'Bat Til Slags', 'Ibiza', 852, 1, 2, 1),
(1037, 'Inter', 'Bat Til Slags', 'Inter', 852, 1, 2, 1),
(1038, 'In Lander', 'Bat Til Slags', 'In Lander', 852, 1, 2, 1),
(1039, 'Irene', 'Bat Til Slags', 'Irene', 852, 1, 2, 1),
(1040, 'ISY', 'Bat Til Slags', 'ISY', 852, 1, 2, 1),
(1041, 'Italmar', 'Bat Til Slags', 'Italmar', 852, 1, 2, 1),
(1042, 'Jeanneau', 'Bat Til Slags', 'Jeanneau', 852, 1, 2, 1),
(1043, 'Joda', 'Bat Til Slags', 'Joda', 852, 1, 2, 1),
(1044, 'Johnson', 'Bat Til Slags', 'Johnson', 852, 1, 2, 1),
(1045, 'Junker', 'Bat Til Slags', 'Junker', 852, 1, 2, 1),
(1046, 'Karmøy', 'Bat Til Slags', 'Karmøy', 852, 1, 2, 1),
(1047, 'Karnic', 'Bat Til Slags', 'Karnic', 852, 1, 2, 1),
(1048, 'Kawasaki', 'Bat Til Slags', 'Kawasaki', 852, 1, 2, 1),
(1049, 'KB Snekke', 'Bat Til Slags', 'KB Snekke', 852, 1, 2, 1),
(1050, 'Kelt', 'Bat Til Slags', 'Kelt', 852, 1, 2, 1),
(1051, 'Kimple', 'Bat Til Slags', 'Kimple', 852, 1, 2, 1),
(1052, 'KMV', 'Bat Til Slags', 'KMV', 852, 1, 2, 1),
(1053, 'Knarr', 'Bat Til Slags', 'Knarr', 852, 1, 2, 1),
(1054, 'Korsø', 'Bat Til Slags', 'Korsø', 852, 1, 2, 1),
(1055, 'Kragerø', 'Bat Til Slags', 'Kragerø', 852, 1, 2, 1),
(1056, 'Kværnø', 'Bat Til Slags', 'Kværnø', 852, 1, 2, 1),
(1057, 'Kaasbøll', 'Bat Til Slags', 'Kaasbøll', 852, 1, 2, 1),
(1058, 'Lagoon', 'Bat Til Slags', 'Lagoon', 852, 1, 2, 1),
(1059, 'Laguna', 'Bat Til Slags', 'Laguna', 852, 1, 2, 1),
(1060, 'Lami', 'Bat Til Slags', 'Lami', 852, 1, 2, 1),
(1061, 'Larson', 'Bat Til Slags', 'Larson', 852, 1, 2, 1),
(1062, 'Laser', 'Bat Til Slags', 'Laser', 852, 1, 2, 1),
(1063, 'Lasse', 'Bat Til Slags', 'Lasse', 852, 1, 2, 1),
(1064, 'Lema', 'Bat Til Slags', 'Lema', 852, 1, 2, 1),
(1065, 'Libra', 'Bat Til Slags', 'Libra', 852, 1, 2, 1),
(1066, 'Linder', 'Bat Til Slags', 'Linder', 852, 1, 2, 1),
(1067, 'Linssen', 'Bat Til Slags', 'Linssen', 852, 1, 2, 1),
(1068, 'LM', 'Bat Til Slags', 'LM', 852, 1, 2, 1),
(1069, 'Lyngør', 'Bat Til Slags', 'Lyngør', 852, 1, 2, 1),
(1070, 'Maestral', 'Bat Til Slags', 'Maestral', 852, 1, 2, 1),
(1071, 'Magnum', 'Bat Til Slags', 'Magnum', 852, 1, 2, 1),
(1072, 'Malibu', 'Bat Til Slags', 'Malibu', 852, 1, 2, 1),
(1073, 'Malø Yachts', 'Bat Til Slags', 'Malø Yachts', 852, 1, 2, 1),
(1074, 'Mamba', 'Bat Til Slags', 'Mamba', 852, 1, 2, 1),
(1075, 'Marex', 'Bat Til Slags', 'Marex', 852, 1, 2, 1),
(1076, 'Mariah', 'Bat Til Slags', 'Mariah', 852, 1, 2, 1),
(1077, 'Marieholm', 'Bat Til Slags', 'Marieholm', 852, 1, 2, 1),
(1078, 'Marina', 'Bat Til Slags', 'Marina', 852, 1, 2, 1),
(1079, 'Mariner', 'Bat Til Slags', 'Mariner', 852, 1, 2, 1),
(1080, 'Marlin', 'Bat Til Slags', 'Marlin', 852, 1, 2, 1),
(1081, 'Master', 'Bat Til Slags', 'Master', 852, 1, 2, 1),
(1082, 'Mastercraft', 'Bat Til Slags', 'Mastercraft', 852, 1, 2, 1),
(1083, 'Maxi', 'Bat Til Slags', 'Maxi', 852, 1, 2, 1),
(1084, 'Maxum', 'Bat Til Slags', 'Maxum', 852, 1, 2, 1),
(1085, 'Mazury', 'Bat Til Slags', 'Mazury', 852, 1, 2, 1),
(1086, 'Mercury', 'Bat Til Slags', 'Mercury', 852, 1, 2, 1),
(1087, 'Meridian Yachts', 'Bat Til Slags', 'Meridian Yachts', 852, 1, 2, 1),
(1088, 'Micore', 'Bat Til Slags', 'Micore', 852, 1, 2, 1),
(1089, 'Millenium', 'Bat Til Slags', 'Millenium', 852, 1, 2, 1),
(1090, 'Minor', 'Bat Til Slags', 'Minor', 852, 1, 2, 1),
(1091, 'Modesty', 'Bat Til Slags', 'Modesty', 852, 1, 2, 1),
(1092, 'Monaco', 'Bat Til Slags', 'Monaco', 852, 1, 2, 1),
(1093, 'Monterey', 'Bat Til Slags', 'Monterey', 852, 1, 2, 1),
(1094, 'Morgan', 'Bat Til Slags', 'Morgan', 852, 1, 2, 1),
(1095, 'Motiva', 'Bat Til Slags', 'Motiva', 852, 1, 2, 1),
(1096, 'MS Boat', 'Bat Til Slags', 'MS Boat', 852, 1, 2, 1),
(1097, 'Musling', 'Bat Til Slags', 'Musling', 852, 1, 2, 1),
(1098, 'Mustang', 'Bat Til Slags', 'Mustang', 852, 1, 2, 1),
(1099, 'Myra', 'Bat Til Slags', 'Myra', 852, 1, 2, 1),
(1100, 'Mørebas', 'Bat Til Slags', 'Mørebas', 852, 1, 2, 1),
(1101, 'Mørejet', 'Bat Til Slags', 'Mørejet', 852, 1, 2, 1),
(1102, 'Najad', 'Bat Til Slags', 'Najad', 852, 1, 2, 1),
(1103, 'Nauticat', 'Bat Til Slags', 'Nauticat', 852, 1, 2, 1),
(1104, 'Nautor', 'Bat Til Slags', 'Nautor', 852, 1, 2, 1),
(1105, 'Navette', 'Bat Til Slags', 'Navette', 852, 1, 2, 1),
(1106, 'NB', 'Bat Til Slags', 'NB', 852, 1, 2, 1),
(1107, 'NEEL', 'Bat Til Slags', 'NEEL', 852, 1, 2, 1),
(1108, 'Neptim', 'Bat Til Slags', 'Neptim', 852, 1, 2, 1),
(1109, 'Neptunus', 'Bat Til Slags', 'Neptunus', 852, 1, 2, 1),
(1110, 'Nidelv', 'Bat Til Slags', 'Nidelv', 852, 1, 2, 1),
(1111, 'Nilsen', 'Bat Til Slags', 'Nilsen', 852, 1, 2, 1),
(1112, 'Nimbus', 'Bat Til Slags', 'Nimbus', 852, 1, 2, 1),
(1113, 'Norbas', 'Bat Til Slags', 'Norbas', 852, 1, 2, 1),
(1114, 'Norcraft', 'Bat Til Slags', 'Norcraft', 852, 1, 2, 1),
(1115, 'Nordic Oceancraft', 'Bat Til Slags', 'Nordic Oceancraft', 852, 1, 2, 1),
(1116, 'Nordic Star', 'Bat Til Slags', 'Nordic Star', 852, 1, 2, 1),
(1117, 'Nordisk folkebåt', 'Bat Til Slags', 'Nordisk folkebåt', 852, 1, 2, 1),
(1118, 'Nordkapp', 'Bat Til Slags', 'Nordkapp', 852, 1, 2, 1),
(1119, 'NordStar', 'Bat Til Slags', 'NordStar', 852, 1, 2, 1),
(1120, 'Nord West', 'Bat Til Slags', 'Nord West', 852, 1, 2, 1),
(1121, 'Norline', 'Bat Til Slags', 'Norline', 852, 1, 2, 1),
(1122, 'Norman', 'Bat Til Slags', 'Norman', 852, 1, 2, 1),
(1123, 'NorPlast', 'Bat Til Slags', 'NorPlast', 852, 1, 2, 1),
(1124, 'NorTech', 'Bat Til Slags', 'NorTech', 852, 1, 2, 1),
(1125, 'Nor Sea', 'Bat Til Slags', 'Nor Sea', 852, 1, 2, 1),
(1126, 'Nor Star', 'Bat Til Slags', 'Nor Star', 852, 1, 2, 1),
(1127, 'Nor-Dan', 'Bat Til Slags', 'Nor-Dan', 852, 1, 2, 1),
(1128, 'Nor-Tech', 'Bat Til Slags', 'Nor-Tech', 852, 1, 2, 1),
(1129, 'Oceanmaster', 'Bat Til Slags', 'Oceanmaster', 852, 1, 2, 1),
(1130, 'Oceanrunner', 'Bat Til Slags', 'Oceanrunner', 852, 1, 2, 1),
(1131, 'Ockelbo', 'Bat Til Slags', 'Ockelbo', 852, 1, 2, 1),
(1132, 'Ocqueteau', 'Bat Til Slags', 'Ocqueteau', 852, 1, 2, 1),
(1133, 'Olympic', 'Bat Til Slags', 'Olympic', 852, 1, 2, 1),
(1134, 'Orrskär', 'Bat Til Slags', 'Orrskär', 852, 1, 2, 1),
(1135, 'Paragon', 'Bat Til Slags', 'Paragon', 852, 1, 2, 1),
(1136, 'Paragon', 'Bat Til Slags', 'Paragon', 852, 1, 2, 1),
(1137, 'Pershing', 'Bat Til Slags', 'Pershing', 852, 1, 2, 1),
(1138, 'Pioner', 'Bat Til Slags', 'Pioner', 852, 1, 2, 1),
(1139, 'Plattgatter', 'Bat Til Slags', 'Plattgatter', 852, 1, 2, 1),
(1140, 'Polar', 'Bat Til Slags', 'Polar', 852, 1, 2, 1),
(1141, 'Polaris', 'Bat Til Slags', 'Polaris', 852, 1, 2, 1),
(1142, 'Poseidon', 'Bat Til Slags', 'Poseidon', 852, 1, 2, 1),
(1143, 'Powercraft', 'Bat Til Slags', 'Powercraft', 852, 1, 2, 1),
(1144, 'Princess', 'Bat Til Slags', 'Princess', 852, 1, 2, 1),
(1145, 'Pro Rib', 'Bat Til Slags', 'Pro Rib', 852, 1, 2, 1),
(1146, 'Pro-Line', 'Bat Til Slags', 'Pro-Line', 852, 1, 2, 1),
(1147, 'Puma', 'Bat Til Slags', 'Puma', 852, 1, 2, 1),
(1148, 'Quicksilver', 'Bat Til Slags', 'Quicksilver', 852, 1, 2, 1),
(1149, 'Ramin', 'Bat Til Slags', 'Ramin', 852, 1, 2, 1),
(1150, 'Rana', 'Bat Til Slags', 'Rana', 852, 1, 2, 1),
(1151, 'Ranger Tugs', 'Bat Til Slags', 'Ranger Tugs', 852, 1, 2, 1),
(1152, 'Ranieri', 'Bat Til Slags', 'Ranieri', 852, 1, 2, 1),
(1153, 'Regal', 'Bat Til Slags', 'Regal', 852, 1, 2, 1),
(1154, 'Reinell', 'Bat Til Slags', 'Reinell', 852, 1, 2, 1),
(1155, 'Ribeye', 'Bat Til Slags', 'Ribeye', 852, 1, 2, 1),
(1156, 'Rinker', 'Bat Til Slags', 'Rinker', 852, 1, 2, 1),
(1157, 'Risør', 'Bat Til Slags', 'Risør', 852, 1, 2, 1),
(1158, 'Riva', 'Bat Til Slags', 'Riva', 852, 1, 2, 1),
(1159, 'Rivena Yachts', 'Bat Til Slags', 'Rivena Yachts', 852, 1, 2, 1),
(1160, 'River', 'Bat Til Slags', 'River', 852, 1, 2, 1),
(1161, 'Riviera', 'Bat Til Slags', 'Riviera', 852, 1, 2, 1),
(1162, 'Rupert', 'Bat Til Slags', 'Rupert', 852, 1, 2, 1),
(1163, 'Ryds', 'Bat Til Slags', 'Ryds', 852, 1, 2, 1),
(1164, 'Saga', 'Bat Til Slags', 'Saga', 852, 1, 2, 1),
(1165, 'Salona', 'Bat Til Slags', 'Salona', 852, 1, 2, 1),
(1166, 'Sand', 'Bat Til Slags', 'Sand', 852, 1, 2, 1),
(1167, 'Sandström', 'Bat Til Slags', 'Sandström', 852, 1, 2, 1),
(1168, 'Sandstø', 'Bat Til Slags', 'Sandstø', 852, 1, 2, 1),
(1169, 'Sandvik', 'Bat Til Slags', 'Sandvik', 852, 1, 2, 1),
(1170, 'Sandøy', 'Bat Til Slags', 'Sandøy', 852, 1, 2, 1),
(1171, 'Sargo', 'Bat Til Slags', 'Sargo', 852, 1, 2, 1),
(1172, 'Saxe', 'Bat Til Slags', 'Saxe', 852, 1, 2, 1),
(1173, 'Scampi', 'Bat Til Slags', 'Scampi', 852, 1, 2, 1),
(1174, 'Scand', 'Bat Til Slags', 'Scand', 852, 1, 2, 1),
(1175, 'Scanmar', 'Bat Til Slags', 'Scanmar', 852, 1, 2, 1),
(1176, 'Seacraft', 'Bat Til Slags', 'Seacraft', 852, 1, 2, 1),
(1177, 'SeaDoo', 'Bat Til Slags', 'SeaDoo', 852, 1, 2, 1),
(1178, 'Seaking', 'Bat Til Slags', 'Seaking', 852, 1, 2, 1),
(1179, 'Sealine', 'Bat Til Slags', 'Sealine', 852, 1, 2, 1),
(1180, 'Seamarin', 'Bat Til Slags', 'Seamarin', 852, 1, 2, 1),
(1181, 'SeaRider', 'Bat Til Slags', 'SeaRider', 852, 1, 2, 1),
(1182, 'Seaside', 'Bat Til Slags', 'Seaside', 852, 1, 2, 1),
(1183, 'Sea Hawk', 'Bat Til Slags', 'Sea Hawk', 852, 1, 2, 1),
(1184, 'Sea Master', 'Bat Til Slags', 'Sea Master', 852, 1, 2, 1),
(1185, 'Sea Ray', 'Bat Til Slags', 'Sea Ray', 852, 1, 2, 1),
(1186, 'Sea Star', 'Bat Til Slags', 'Sea Star', 852, 1, 2, 1),
(1187, 'Seigur', 'Bat Til Slags', 'Seigur', 852, 1, 2, 1),
(1188, 'Selby', 'Bat Til Slags', 'Selby', 852, 1, 2, 1),
(1189, 'Selco', 'Bat Til Slags', 'Selco', 852, 1, 2, 1),
(1190, 'Selfa', 'Bat Til Slags', 'Selfa', 852, 1, 2, 1),
(1191, 'Selva', 'Bat Til Slags', 'Selva', 852, 1, 2, 1),
(1192, 'Sessa', 'Bat Til Slags', 'Sessa', 852, 1, 2, 1),
(1193, 'Shakespeare', 'Bat Til Slags', 'Shakespeare', 852, 1, 2, 1),
(1194, 'Silver', 'Bat Til Slags', 'Silver', 852, 1, 2, 1),
(1195, 'Silver Viking', 'Bat Til Slags', 'Silver Viking', 852, 1, 2, 1),
(1196, 'Sjark', 'Bat Til Slags', 'Sjark', 852, 1, 2, 1),
(1197, 'Sjømann', 'Bat Til Slags', 'Sjømann', 852, 1, 2, 1),
(1198, 'Skager', 'Bat Til Slags', 'Skager', 852, 1, 2, 1),
(1199, 'Skagerak', 'Bat Til Slags', 'Skagerak', 852, 1, 2, 1),
(1200, 'Skarpnes', 'Bat Til Slags', 'Skarpnes', 852, 1, 2, 1),
(1201, 'Skarsvåg', 'Bat Til Slags', 'Skarsvåg', 852, 1, 2, 1),
(1202, 'Skater', 'Bat Til Slags', 'Skater', 852, 1, 2, 1),
(1203, 'Skibsplast', 'Bat Til Slags', 'Skibsplast', 852, 1, 2, 1),
(1204, 'Skilsø', 'Bat Til Slags', 'Skilsø', 852, 1, 2, 1),
(1205, 'Skorgenes', 'Bat Til Slags', 'Skorgenes', 852, 1, 2, 1),
(1206, 'Skøyte', 'Bat Til Slags', 'Skøyte', 852, 1, 2, 1),
(1207, 'Smartliner', 'Bat Til Slags', 'Smartliner', 852, 1, 2, 1),
(1208, 'Smart Rib', 'Bat Til Slags', 'Smart Rib', 852, 1, 2, 1),
(1209, 'Soling', 'Bat Til Slags', 'Soling', 852, 1, 2, 1),
(1210, 'Sollux', 'Bat Til Slags', 'Sollux', 852, 1, 2, 1),
(1211, 'Starcraft', 'Bat Til Slags', 'Starcraft', 852, 1, 2, 1),
(1212, 'Steady', 'Bat Til Slags', 'Steady', 852, 1, 2, 1),
(1213, 'Sting', 'Bat Til Slags', 'Sting', 852, 1, 2, 1),
(1214, 'Stingray', 'Bat Til Slags', 'Stingray', 852, 1, 2, 1),
(1215, 'Storebro', 'Bat Til Slags', 'Storebro', 852, 1, 2, 1),
(1216, 'Storm', 'Bat Til Slags', 'Storm', 852, 1, 2, 1),
(1217, 'Stormway', 'Bat Til Slags', 'Stormway', 852, 1, 2, 1),
(1218, 'Stormy', 'Bat Til Slags', 'Stormy', 852, 1, 2, 1),
(1219, 'Storø', 'Bat Til Slags', 'Storø', 852, 1, 2, 1),
(1220, 'Strandebarmer', 'Bat Til Slags', 'Strandebarmer', 852, 1, 2, 1),
(1221, 'Style', 'Bat Til Slags', 'Style', 852, 1, 2, 1),
(1222, 'Summersport', 'Bat Til Slags', 'Summersport', 852, 1, 2, 1),
(1223, 'Summer Dreams', 'Bat Til Slags', 'Summer Dreams', 852, 1, 2, 1),
(1224, 'Summer Family', 'Bat Til Slags', 'Summer Family', 852, 1, 2, 1),
(1225, 'SUN', 'Bat Til Slags', 'SUN', 852, 1, 2, 1),
(1226, 'Sunbeam', 'Bat Til Slags', 'Sunbeam', 852, 1, 2, 1),
(1227, 'Sunbird', 'Bat Til Slags', 'Sunbird', 852, 1, 2, 1),
(1228, 'Sunrider', 'Bat Til Slags', 'Sunrider', 852, 1, 2, 1),
(1229, 'Sunseeker', 'Bat Til Slags', 'Sunseeker', 852, 1, 2, 1),
(1230, 'Sunwind', 'Bat Til Slags', 'Sunwind', 852, 1, 2, 1),
(1231, 'Sun Quest', 'Bat Til Slags', 'Sun Quest', 852, 1, 2, 1),
(1232, 'Suvi', 'Bat Til Slags', 'Suvi', 852, 1, 2, 1),
(1233, 'Suzumar', 'Bat Til Slags', 'Suzumar', 852, 1, 2, 1),
(1234, 'Swan', 'Bat Til Slags', 'Swan', 852, 1, 2, 1),
(1235, 'Swede', 'Bat Til Slags', 'Swede', 852, 1, 2, 1),
(1236, 'Sweden Yachts', 'Bat Til Slags', 'Sweden Yachts', 852, 1, 2, 1),
(1237, 'Sørlandssnekka', 'Bat Til Slags', 'Sørlandssnekka', 852, 1, 2, 1),
(1238, 'Targa', 'Bat Til Slags', 'Targa', 852, 1, 2, 1),
(1239, 'TB', 'Bat Til Slags', 'TB', 852, 1, 2, 1),
(1240, 'Terhi', 'Bat Til Slags', 'Terhi', 852, 1, 2, 1),
(1241, 'TG-Boat', 'Bat Til Slags', 'TG-Boat', 852, 1, 2, 1),
(1242, 'Tiara', 'Bat Til Slags', 'Tiara', 852, 1, 2, 1),
(1243, 'Tobias', 'Bat Til Slags', 'Tobias', 852, 1, 2, 1),
(1244, 'Tornado', 'Bat Til Slags', 'Tornado', 852, 1, 2, 1),
(1245, 'Trawler', 'Bat Til Slags', 'Trawler', 852, 1, 2, 1),
(1246, 'Tresfjord', 'Bat Til Slags', 'Tresfjord', 852, 1, 2, 1),
(1247, 'Trio', 'Bat Til Slags', 'Trio', 852, 1, 2, 1),
(1248, 'Triton', 'Bat Til Slags', 'Triton', 852, 1, 2, 1),
(1249, 'Troll', 'Bat Til Slags', 'Troll', 852, 1, 2, 1),
(1250, 'Trønder', 'Bat Til Slags', 'Trønder', 852, 1, 2, 1),
(1251, 'Twostar', 'Bat Til Slags', 'Twostar', 852, 1, 2, 1),
(1252, 'Unique', 'Bat Til Slags', 'Unique', 852, 1, 2, 1),
(1253, 'Uttern', 'Bat Til Slags', 'Uttern', 852, 1, 2, 1),
(1254, 'Valiant', 'Bat Til Slags', 'Valiant', 852, 1, 2, 1),
(1255, 'Vernøy', 'Bat Til Slags', 'Vernøy', 852, 1, 2, 1),
(1256, 'Veslefrikk', 'Bat Til Slags', 'Veslefrikk', 852, 1, 2, 1),
(1257, 'Vest', 'Bat Til Slags', 'Vest', 852, 1, 2, 1),
(1258, 'Vestfjord', 'Bat Til Slags', 'Vestfjord', 852, 1, 2, 1),
(1259, 'Viking', 'Bat Til Slags', 'Viking', 852, 1, 2, 1),
(1260, 'Viknes', 'Bat Til Slags', 'Viknes', 852, 1, 2, 1),
(1261, 'Viksund', 'Bat Til Slags', 'Viksund', 852, 1, 2, 1),
(1262, 'Vindø', 'Bat Til Slags', 'Vindø', 852, 1, 2, 1),
(1263, 'Viper', 'Bat Til Slags', 'Viper', 852, 1, 2, 1),
(1264, 'Vista', 'Bat Til Slags', 'Vista', 852, 1, 2, 1),
(1265, 'Walker Bay', 'Bat Til Slags', 'Walker Bay', 852, 1, 2, 1),
(1266, 'Wasa', 'Bat Til Slags', 'Wasa', 852, 1, 2, 1),
(1267, 'Wauquiez', 'Bat Til Slags', 'Wauquiez', 852, 1, 2, 1),
(1268, 'Wellcraft', 'Bat Til Slags', 'Wellcraft', 852, 1, 2, 1),
(1269, 'Wesling', 'Bat Til Slags', 'Wesling', 852, 1, 2, 1),
(1270, 'Westbas', 'Bat Til Slags', 'Westbas', 852, 1, 2, 1),
(1271, 'Wester', 'Bat Til Slags', 'Wester', 852, 1, 2, 1),
(1272, 'Westline', 'Bat Til Slags', 'Westline', 852, 1, 2, 1),
(1273, 'White Shark', 'Bat Til Slags', 'White Shark', 852, 1, 2, 1),
(1274, 'Wiking', 'Bat Til Slags', 'Wiking', 852, 1, 2, 1),
(1275, 'Williams', 'Bat Til Slags', 'Williams', 852, 1, 2, 1),
(1276, 'Willing', 'Bat Til Slags', 'Willing', 852, 1, 2, 1),
(1277, 'Windy', 'Bat Til Slags', 'Windy', 852, 1, 2, 1),
(1278, 'Winrace', 'Bat Til Slags', 'Winrace', 852, 1, 2, 1),
(1279, 'With', 'Bat Til Slags', 'With', 852, 1, 2, 1),
(1280, 'XO', 'Bat Til Slags', 'XO', 852, 1, 2, 1),
(1281, 'X-Yachts', 'Bat Til Slags', 'X-Yachts', 852, 1, 2, 1),
(1282, 'Yamaha', 'Bat Til Slags', 'Yamaha', 852, 1, 2, 1),
(1283, 'Yamarin', 'Bat Til Slags', 'Yamarin', 852, 1, 2, 1),
(1284, 'ZAR', 'Bat Til Slags', 'ZAR', 852, 1, 2, 1),
(1285, 'Zodiac', 'Bat Til Slags', 'Zodiac', 852, 1, 2, 1),
(1286, 'Øien', 'Bat Til Slags', 'Øien', 852, 1, 2, 1),
(1287, 'Ørnvik', 'Bat Til Slags', 'Ørnvik', 852, 1, 2, 1),
(1288, 'Årø', 'Bat Til Slags', 'Årø', 852, 1, 2, 1),
(1289, '5,5 meter', 'Bat Til Slags', '5,5 meter', 852, 1, 2, 1),
(1290, '8 meter', 'Bat Til Slags', '8 meter', 852, 1, 2, 1),
(1291, 'Pris', 'Pris', 'Pris (Bat Til Slag)', 0, 3, 5, 1),
(1292, 'Lengde', 'Lengde', 'Lengde (Bat Til Slag)', 0, 3, 5, 1),
(1293, 'Årsmodell', 'Årsmodell', 'Årsmodell (Bat Til Slag)', 0, 3, 6, 1),
(1294, 'Motor inkludert', 'Motor inkludert', 'Motor inkludert (Bat Til Slag)', 0, 1, 2, 1),
(1295, 'Ja', 'Ja', 'Ja', 1294, 1, 2, 1),
(1296, 'Nei', 'Nei', 'Nei', 1294, 1, 2, 1),
(1297, 'Drivstoff', 'Drivstoff', 'Drivstoff (Bat Til Slag)', 0, 1, 2, 1),
(1298, 'Bensin', 'Bensin', 'Bensin', 1297, 1, 2, 1),
(1299, 'Diesel ', 'Diesel ', 'Diesel ', 1297, 1, 2, 1),
(1300, 'Annet', 'Annet', 'Annet', 1297, 1, 2, 1),
(1301, 'Område', 'Område', 'Område (Bat Til Slag)', 0, 1, 2, 1),
(1302, 'Akershus', 'Truck', 'Akershus', 1301, 1, 2, 1),
(1303, 'Aust-Agder', 'Truck', 'Aust-Agder', 1301, 1, 2, 1),
(1304, 'Buskerud', 'Truck', 'Buskerud', 1301, 1, 2, 1),
(1305, 'Finnmark', 'Truck', 'Finnmark', 1301, 1, 2, 1),
(1306, 'Hedmark', 'Truck', 'Hedmark', 1301, 1, 2, 1),
(1307, 'Hordaland', 'Truck', 'Hordaland', 1301, 1, 2, 1),
(1308, 'Møre og Romsdal', 'Truck', 'Møre og Romsdal', 1301, 1, 2, 1),
(1309, 'Nordland', 'Truck', 'Nordland', 1301, 1, 2, 1),
(1310, 'Nord-Trøndelag', 'Truck', 'Nord-Trøndelag', 1301, 1, 2, 1),
(1311, 'Oppland', 'Truck', 'Oppland', 1301, 1, 2, 1),
(1312, 'Oslo', 'Truck', 'Oslo', 1301, 1, 2, 1),
(1313, 'Rogaland', 'Truck', 'Rogaland', 1301, 1, 2, 1),
(1314, 'Sogn og Fjordane', 'Truck', 'Sogn og Fjordane', 1301, 1, 2, 1),
(1315, 'Sør-Trøndelag', 'Truck', 'Sør-Trøndelag', 1301, 1, 2, 1),
(1316, 'Telemark', 'Truck', 'Telemark', 1301, 1, 2, 1),
(1317, 'Troms', 'Truck', 'Troms', 1301, 1, 2, 1),
(1318, 'Vestfold', 'Truck', 'Vestfold', 1301, 1, 2, 1),
(1319, 'Vest-Agder', 'Truck', 'Vest-Agder', 1301, 1, 2, 1),
(1320, 'Østfold', 'Truck', 'Østfold', 1301, 1, 2, 1),
(1321, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Bat til Slag)', 0, 3, 5, 1),
(1322, 'Båttype', 'Båttype', 'Båttype (Bat Til leie)', 0, 1, 2, 1),
(1323, 'Cabincruiser', 'Bat Til Slags', 'Cabincruiser', 1322, 1, 2, 1),
(1324, 'Daycruiser', 'Bat Til Slags', 'Daycruiser', 1322, 1, 2, 1),
(1325, 'RIB', 'Bat Til Slags', 'RIB', 1322, 1, 2, 1),
(1326, 'Seilbåt/Motorseiler', 'Bat Til Slags', 'Seilbåt/Motorseiler', 1322, 1, 2, 1),
(1327, 'Skjærgårdsjeep/Landstedsbåt', 'Bat Til Slags', 'Skjærgårdsjeep/Landstedsbåt', 1322, 1, 2, 1),
(1328, 'Trebåt/Snekke', 'Bat Til Slags', 'Trebåt/Snekke', 1322, 1, 2, 1),
(1329, 'Yacht', 'Bat Til Slags', 'Yacht', 1322, 1, 2, 1),
(1330, 'Yrkesbåt/Sjark/Skøyte', 'Bat Til Slags', 'Yrkesbåt/Sjark/Skøyte', 1322, 1, 2, 1),
(1331, 'Andre', 'Bat Til Slags', 'Andre', 1322, 1, 2, 1),
(1332, 'Båtmerke', 'Båtmerke', 'Båtmerke (Bat til leie)', 0, 1, 2, 1),
(1333, 'Askeladden', 'Bat Til leie', 'Askeladden', 852, 1, 2, 1),
(1334, 'Bavaria', 'Bat Til leie', 'Bavaria', 852, 1, 2, 1),
(1335, 'Beneteau', 'Bat Til leie', 'Beneteau', 852, 1, 2, 1),
(1336, 'Biam', 'Bat Til leie', 'Biam', 852, 1, 2, 1),
(1337, 'BRIG', 'Bat Til leie', 'BRIG', 852, 1, 2, 1),
(1338, 'Dufour', 'Bat Til leie', 'Dufour', 852, 1, 2, 1),
(1339, 'Hallberg Rassy', 'Bat Til leie', 'Hallberg Rassy', 852, 1, 2, 1),
(1340, 'Hanse', 'Bat Til leie', 'Hanse', 852, 1, 2, 1),
(1341, 'Jeanneau', 'Bat Til leie', 'Jeanneau', 852, 1, 2, 1),
(1342, 'Lagoon', 'Bat Til leie', 'Lagoon', 852, 1, 2, 1),
(1343, 'Mørebas', 'Bat Til leie', 'Mørebas', 852, 1, 2, 1),
(1344, 'Pioner', 'Bat Til leie', 'Pioner', 852, 1, 2, 1),
(1345, 'Princess', 'Bat Til leie', 'Princess', 852, 1, 2, 1),
(1346, 'Ryds', 'Bat Til leie', 'Ryds', 852, 1, 2, 1),
(1347, 'Sandström', 'Bat Til leie', 'Sandström', 852, 1, 2, 1),
(1348, 'Sandstø', 'Bat Til leie', 'Sandstø', 852, 1, 2, 1),
(1349, 'Seabird', 'Bat Til leie', 'Seabird', 852, 1, 2, 1),
(1350, 'Sealine', 'Bat Til leie', 'Sealine', 852, 1, 2, 1),
(1351, 'Sting', 'Bat Til leie', 'Sting', 852, 1, 2, 1),
(1352, 'Sunseeker', 'Bat Til leie', 'Sunseeker', 852, 1, 2, 1),
(1353, 'Viking', 'Bat Til leie', 'Viking', 852, 1, 2, 1),
(1354, 'Viknes', 'Bat Til leie', 'Viknes', 852, 1, 2, 1),
(1355, 'X-Yachts', 'Bat Til leie', 'X-Yachts', 852, 1, 2, 1),
(1356, 'Zodiac', 'Bat Til leie', 'Zodiac', 852, 1, 2, 1),
(1357, '5.5 meter', 'Bat Til leie', '5.5 meter', 852, 1, 2, 1),
(1358, 'Pris', 'Pris', 'Pris (Bat til leie)', 0, 3, 5, 1),
(1359, 'Lengde', 'Lengde', 'Lengde (Bat Til Leie)', 0, 3, 5, 1),
(1360, 'Årsmodell', 'Årsmodell', 'Årsmodell (Bat Til Leie)', 0, 3, 5, 1),
(1361, 'Drivstoff', 'Drivstoff', 'Drivstoff (Bat Til leie)', 0, 1, 2, 1),
(1362, 'Bensin', 'Bensin', 'Bensin (Bat Til Leie)', 1361, 1, 2, 1),
(1363, 'Diesel ', 'Diesel ', 'Diesel ', 1361, 1, 2, 1),
(1364, 'Område', 'Område', 'Område (bat til leie)', 0, 1, 2, 1),
(1365, 'Akershus', 'Truck', 'Akershus', 1364, 1, 2, 1),
(1366, 'Aust-Agder', 'Truck', 'Aust-Agder', 1364, 1, 2, 1),
(1367, 'Buskerud', 'Truck', 'Buskerud', 1364, 1, 2, 1),
(1368, 'Finnmark', 'Truck', 'Finnmark', 1364, 1, 2, 1),
(1369, 'Hedmark', 'Truck', 'Hedmark', 1364, 1, 2, 1),
(1370, 'Hordaland', 'Truck', 'Hordaland', 1364, 1, 2, 1),
(1371, 'Møre og Romsdal', 'Truck', 'Møre og Romsdal', 1364, 1, 2, 1),
(1372, 'Nordland', 'Truck', 'Nordland', 1364, 1, 2, 1),
(1373, 'Nord-Trøndelag', 'Truck', 'Nord-Trøndelag', 1364, 1, 2, 1),
(1374, 'Oppland', 'Truck', 'Oppland', 1364, 1, 2, 1),
(1375, 'Oslo', 'Truck', 'Oslo', 1364, 1, 2, 1),
(1376, 'Rogaland', 'Truck', 'Rogaland', 1364, 1, 2, 1),
(1377, 'Sogn og Fjordane', 'Truck', 'Sogn og Fjordane', 1364, 1, 2, 1),
(1378, 'Sør-Trøndelag', 'Truck', 'Sør-Trøndelag', 1364, 1, 2, 1),
(1379, 'Telemark', 'Truck', 'Telemark', 1364, 1, 2, 1),
(1380, 'Troms', 'Truck', 'Troms', 1364, 1, 2, 1),
(1381, 'Vestfold', 'Truck', 'Vestfold', 1364, 1, 2, 1),
(1382, 'Vest-Agder', 'Truck', 'Vest-Agder', 1364, 1, 2, 1),
(1383, 'Østfold', 'Truck', 'Østfold', 1364, 1, 2, 1),
(1384, 'Hestekrefter', 'Hestekrefter', 'Hestekrefter (Bat til leie)', 0, 3, 5, 1),
(1385, 'Område', 'Område', 'Område (TOMTER)', 0, 1, 2, 1),
(1386, 'Akershus', 'Tomter', 'Akershus', 1385, 1, 2, 1),
(1387, 'Aust-Agder', 'Tomter', 'Aust-Agder', 1385, 1, 2, 1),
(1388, 'Buskerud', 'Tomter', 'Buskerud', 1385, 1, 2, 1),
(1389, 'Finnmark', 'Tomter', 'Finnmark', 1385, 1, 2, 1),
(1390, 'Hedmark', 'Tomter', 'Hedmark', 1385, 1, 2, 1),
(1391, 'Hordaland', 'Tomter', 'Hordaland', 1385, 1, 2, 1),
(1392, 'Møre og Romsdal', 'Tomter', 'Møre og Romsdal', 1385, 1, 2, 1),
(1393, 'Nordland', 'Tomter', 'Nordland', 1385, 1, 2, 1),
(1394, 'Nord-Trøndelag', 'Tomter', 'Nord-Trøndelag', 1385, 1, 2, 1),
(1395, 'Oppland', 'Tomter', 'Oppland', 1385, 1, 2, 1),
(1396, 'Oslo', 'Tomter', 'Oslo', 1385, 1, 2, 1),
(1397, 'Rogaland', 'Tomter', 'Rogaland', 1385, 1, 2, 1),
(1398, 'Sogn og Fjordane', 'Tomter', 'Sogn og Fjordane', 1385, 1, 2, 1),
(1399, 'Sør-Trøndelag', 'Tomter', 'Sør-Trøndelag', 1385, 1, 2, 1),
(1400, 'Telemark', 'Tomter', 'Telemark', 1385, 1, 2, 1),
(1401, 'Troms', 'Tomter', 'Troms', 1385, 1, 2, 1),
(1402, 'Utlandet', 'Tomter', 'Utlandet', 1385, 1, 2, 1),
(1403, 'Vestfold', 'Tomter', 'Vestfold', 1385, 1, 2, 1),
(1404, 'Vest-Agder', 'Tomter', 'Vest-Agder', 1385, 1, 2, 1),
(1405, 'Østfold', 'Tomter', 'Østfold', 1385, 1, 2, 1),
(1406, 'Pris', 'Pris', 'Pris (Tomter)', 0, 3, 5, 1),
(1407, 'Tomtestørrelse', 'Tomtestørrelse', 'Tomtestørrelse (Tomter)', 0, 4, 5, 1),
(1408, 'Område', 'Område', 'Område (Hus Til Salgs)', 0, 1, 2, 1),
(1409, 'Akershus', 'Hus Tils Salg', 'Akershus', 1408, 1, 2, 1),
(1410, 'Aust-Agder', 'Hus Tils Salg', 'Aust-Agder', 1408, 1, 2, 1),
(1411, 'Buskerud', 'Hus Tils Salg', 'Buskerud', 1408, 1, 2, 1),
(1412, 'Finnmark', 'Hus Tils Salg', 'Finnmark', 1408, 1, 2, 1),
(1413, 'Hedmark', 'Hus Tils Salg', 'Hedmark', 1408, 1, 2, 1),
(1414, 'Hordaland', 'Hus Tils Salg', 'Hordaland', 1408, 1, 2, 1),
(1415, 'Møre og Romsdal', 'Hus Tils Salg', 'Møre og Romsdal', 1408, 1, 2, 1),
(1416, 'Nordland', 'Hus Tils Salg', 'Nordland', 1408, 1, 2, 1),
(1417, 'Nord-Trøndelag', 'Hus Tils Salg', 'Nord-Trøndelag', 1408, 1, 2, 1),
(1418, 'Oppland', 'Hus Tils Salg', 'Oppland', 1408, 1, 2, 1),
(1419, 'Oslo', 'Hus Tils Salg', 'Oslo', 1408, 1, 2, 1),
(1420, 'Rogaland', 'Hus Tils Salg', 'Rogaland', 1408, 1, 2, 1),
(1421, 'Sogn og Fjordane', 'Hus Tils Salg', 'Sogn og Fjordane', 1408, 1, 2, 1),
(1422, 'Sør-Trøndelag', 'Hus Tils Salg', 'Sør-Trøndelag', 1408, 1, 2, 1),
(1423, 'Telemark', 'Hus Tils Salg', 'Telemark', 1408, 1, 2, 1),
(1424, 'Troms', 'Hus Tils Salg', 'Troms', 1408, 1, 2, 1),
(1425, 'Utlandet', 'Hus Tils Salg', 'Utlandet', 1408, 1, 2, 1),
(1426, 'Vestfold', 'Hus Tils Salg', 'Vestfold', 1408, 1, 2, 1),
(1427, 'Vest-Agder', 'Hus Tils Salg', 'Vest-Agder', 1408, 1, 2, 1),
(1428, 'Østfold', 'Hus Tils Salg', 'Østfold', 1408, 1, 2, 1),
(1429, 'Type søk', 'Type søk', 'Type søk (Hus Til Salg)', 0, 1, 2, 1),
(1430, 'Til salgs', 'Til salgs', 'Til salgs (Hus Til Salg)', 1429, 1, 2, 1),
(1431, 'Solgt siste 3 dager', 'Solgt siste 3 dager', 'Solgt siste 3 dager (Hus Til Salg)', 1429, 1, 2, 1),
(1432, 'Nytt/brukt', 'Nytt/brukt', 'Nytt/brukt ( Hus Til Salg)', 0, 1, 2, 1),
(1433, 'Brukt bolig', 'Brukt bolig', 'Brukt bolig (Hus Til Salg)', 1432, 1, 2, 1),
(1434, 'Nybygg', 'Nybygg', 'Nybygg (Hus Til Salg)', 1432, 1, 2, 1),
(1435, 'Pris', 'Pris', 'Pris (Hus til salg)', 0, 3, 5, 1),
(1436, 'Pris med fellesgjeld', 'Pris med fellesgjeld', 'Pris med fellesgjeld (Hus Til Salg)', 0, 3, 5, 1),
(1437, 'Fellesutgifter per måned', 'Fellesutgifter per måned', 'Fellesutgifter per måned (Hus Til Salg)', 0, 4, 5, 1),
(1438, 'Størrelse', 'Størrelse', 'Størrelse (Hus Til Salg)', 0, 3, 5, 1),
(1439, 'Antall soverom', 'Antall soverom', 'Antall soverom (Hus Til Salg)', 0, 1, 1, 1),
(1440, 'All', 'All', 'All (Hus Til Salg)', 1439, 1, 1, 1),
(1441, '1+', '1+', '1+ (Hus Til Salg)', 1439, 1, 1, 1),
(1442, '2+', '2+', '2+ ( Hus Til salg)', 1439, 1, 1, 1),
(1443, '3+', '3+', '3+', 1439, 1, 1, 1),
(1444, '4+', '4+', '4+ (Hus Til Salg)', 1439, 1, 1, 1),
(1445, '5+', '5+', '5+ (Hus Til Salg)', 1439, 1, 1, 1),
(1446, 'Byggeår', 'Byggeår', 'Byggeår (Hus Til Salg)', 0, 4, 5, 1),
(1447, 'Boligtype', 'Boligtype', 'Boligtype (Hus Til Salg)', 0, 1, 2, 1),
(1448, 'Leilighet', 'Hus Tils Salg', 'Leilighet', 1447, 1, 2, 1),
(1449, 'Enebolig', 'Hus Tils Salg', 'Enebolig', 1447, 1, 2, 1),
(1450, 'Rekkehus', 'Hus Tils Salg', 'Rekkehus', 1447, 1, 2, 1),
(1451, 'Tomannsbolig', 'Hus Tils Salg', 'Tomannsbolig', 1447, 1, 2, 1),
(1452, 'Prosjekt', 'Hus Tils Salg', 'Prosjekt', 1447, 1, 2, 1),
(1453, 'Gårdsbruk/Småbruk', 'Hus Tils Salg', 'Gårdsbruk/Småbruk', 1447, 1, 2, 1),
(1454, 'Tomter', 'Hus Tils Salg', 'Tomter', 1447, 1, 2, 1),
(1455, 'Bygård/Flermannsbolig', 'Hus Tils Salg', 'Bygård/Flermannsbolig', 1447, 1, 2, 1),
(1456, 'Hytte', 'Hus Tils Salg', 'Hytte', 1447, 1, 2, 1),
(1457, 'Annet fritid', 'Hus Tils Salg', 'Annet fritid', 1447, 1, 2, 1),
(1458, 'Produksjon/Industri', 'Hus Tils Salg', 'Produksjon/Industri', 1447, 1, 2, 1),
(1459, 'Kontor', 'Hus Tils Salg', 'Kontor', 1447, 1, 2, 1),
(1460, 'Andre', 'Hus Tils Salg', 'Andre', 1447, 1, 2, 1),
(1461, 'Eierform', 'Eierform', 'Eierform (Hus Til Salg)', 0, 1, 2, 1),
(1462, 'Aksje', 'Hus Tils Salg', 'Aksje', 1461, 1, 2, 1),
(1463, 'Andel', 'Hus Tils Salg', 'Andel', 1461, 1, 2, 1),
(1464, 'Eier (Selveier)', 'Hus Tils Salg', 'Eier (Selveier)', 1461, 1, 2, 1),
(1465, 'Obligasjon', 'Hus Tils Salg', 'Obligasjon', 1461, 1, 2, 1),
(1466, 'Annet', 'Hus Tils Salg', 'Annet', 1461, 1, 2, 1),
(1467, 'Fasiliteter', 'Fasiliteter', 'Fasiliteter (Hus Til Salg)', 0, 1, 2, 1),
(1468, 'Balkong/Terrasse', 'Hus Tils Salg', 'Balkong/Terrasse', 1467, 1, 2, 1),
(1469, 'Garasje/P-plass', 'Hus Tils Salg', 'Garasje/P-plass', 1467, 1, 2, 1),
(1470, 'Heis', 'Hus Tils Salg', 'Heis', 1467, 1, 2, 1),
(1471, 'Ingen gjenboere', 'Hus Tils Salg', 'Ingen gjenboere', 1467, 1, 2, 1),
(1472, 'Peis/Ildsted', 'Hus Tils Salg', 'Peis/Ildsted', 1467, 1, 2, 1),
(1473, 'Strandlinje', 'Hus Tils Salg', 'Strandlinje', 1467, 1, 2, 1),
(1474, 'Turterreng', 'Hus Tils Salg', 'Turterreng', 1467, 1, 2, 1),
(1475, 'Utsikt', 'Hus Tils Salg', 'Utsikt', 1467, 1, 2, 1),
(1476, 'Vaktmester-/vektertjeneste', 'Hus Tils Salg', 'Vaktmester-/vektertjeneste', 1467, 1, 2, 1),
(1477, 'Etasje', 'Etasje', 'Etasje (Hus Til Salg)', 0, 1, 2, 1),
(1478, 'Ikke 1. etasje', 'Hus Tils Salg', 'Ikke 1. etasje', 1477, 1, 2, 1),
(1479, '1. etasje', 'Hus Tils Salg', '1. etasje', 1477, 1, 2, 1),
(1480, '2. etasje', 'Hus Tils Salg', '2. etasje', 1477, 1, 2, 1),
(1481, '3. etasje', 'Hus Tils Salg', '3. etasje', 1477, 1, 2, 1),
(1482, '4. etasje', 'Hus Tils Salg', '4. etasje', 1477, 1, 2, 1),
(1483, '5. etasje', 'Hus Tils Salg', '5. etasje', 1477, 1, 2, 1),
(1484, '6. etasje', 'Hus Tils Salg', '6. etasje', 1477, 1, 2, 1),
(1485, 'Over 6. etasje', 'Hus Tils Salg', 'Over 6. etasje', 1477, 1, 2, 1),
(1486, 'Energikarakter', 'Energikarakter', 'Energikarakter (Hus Til Salg)', 0, 1, 2, 1),
(1487, 'A', 'Hus Tils Salg', 'A', 1486, 1, 2, 1),
(1488, 'B', 'Hus Tils Salg', 'B', 1486, 1, 2, 1),
(1489, 'C', 'Hus Tils Salg', 'C', 1486, 1, 2, 1),
(1490, 'D', 'Hus Tils Salg', 'D', 1486, 1, 2, 1),
(1491, 'E', 'Hus Tils Salg', 'E', 1486, 1, 2, 1),
(1492, 'F', 'Hus Tils Salg', 'F', 1486, 1, 2, 1),
(1493, 'G', 'Hus Tils Salg', 'G', 1486, 1, 2, 1),
(1494, 'Tomtestørrelse', 'Tomtestørrelse', 'Tomtestørrelse (Hus Til Salg)', 0, 4, 5, 1),
(1495, 'Område', 'Område', 'Område (Hus Til Leie)', 0, 1, 2, 1),
(1496, 'Akershus', 'Hus Tils Salg', 'Akershus', 1495, 1, 2, 1),
(1497, 'Aust-Agder', 'Hus Tils Salg', 'Aust-Agder', 1495, 1, 2, 1),
(1498, 'Buskerud', 'Hus Tils Salg', 'Buskerud', 1495, 1, 2, 1),
(1499, 'Finnmark', 'Hus Tils Salg', 'Finnmark', 1495, 1, 2, 1),
(1500, 'Hedmark', 'Hus Tils Salg', 'Hedmark', 1495, 1, 2, 1),
(1501, 'Hordaland', 'Hus Tils Salg', 'Hordaland', 1495, 1, 2, 1),
(1502, 'Møre og Romsdal', 'Hus Tils Salg', 'Møre og Romsdal', 1495, 1, 2, 1),
(1503, 'Nordland', 'Hus Tils Salg', 'Nordland', 1495, 1, 2, 1),
(1504, 'Nord-Trøndelag', 'Hus Tils Salg', 'Nord-Trøndelag', 1495, 1, 2, 1),
(1505, 'Oppland', 'Hus Tils Salg', 'Oppland', 1495, 1, 2, 1),
(1506, 'Oslo', 'Hus Tils Salg', 'Oslo', 1495, 1, 2, 1),
(1507, 'Rogaland', 'Hus Tils Salg', 'Rogaland', 1495, 1, 2, 1),
(1508, 'Sogn og Fjordane', 'Hus Tils Salg', 'Sogn og Fjordane', 1495, 1, 2, 1),
(1509, 'Sør-Trøndelag', 'Hus Tils Salg', 'Sør-Trøndelag', 1495, 1, 2, 1),
(1510, 'Telemark', 'Hus Tils Salg', 'Telemark', 1495, 1, 2, 1),
(1511, 'Troms', 'Hus Tils Salg', 'Troms', 1495, 1, 2, 1),
(1512, 'Utlandet', 'Hus Tils Salg', 'Utlandet', 1495, 1, 2, 1),
(1513, 'Vestfold', 'Hus Tils Salg', 'Vestfold', 1495, 1, 2, 1),
(1514, 'Vest-Agder', 'Hus Tils Salg', 'Vest-Agder', 1495, 1, 2, 1),
(1515, 'Østfold', 'Hus Tils Salg', 'Østfold', 1495, 1, 2, 1),
(1516, 'Boligtype', 'Boligtype', 'Boligtype (Hus Til Leie)', 0, 1, 2, 1),
(1517, 'Leilighet', 'Hus Tils Salg', 'Leilighet', 1516, 1, 2, 1),
(1518, 'Enebolig', 'Hus Tils Salg', 'Enebolig', 1516, 1, 2, 1),
(1519, 'Rekkehus', 'Hus Tils Salg', 'Rekkehus', 1516, 1, 2, 1),
(1520, 'Tomannsbolig', 'Hus Tils Salg', 'Tomannsbolig', 1516, 1, 2, 1),
(1521, 'Prosjekt', 'Hus Tils Salg', 'Prosjekt', 1516, 1, 2, 1),
(1522, 'Gårdsbruk/Småbruk', 'Hus Tils Salg', 'Gårdsbruk/Småbruk', 1516, 1, 2, 1),
(1523, 'Tomter', 'Hus Tils Salg', 'Tomter', 1516, 1, 2, 1),
(1524, 'Bygård/Flermannsbolig', 'Hus Tils Salg', 'Bygård/Flermannsbolig', 1516, 1, 2, 1),
(1525, 'Hytte', 'Hus Tils Salg', 'Hytte', 1516, 1, 2, 1),
(1526, 'Annet fritid', 'Hus Tils Salg', 'Annet fritid', 1516, 1, 2, 1),
(1527, 'Produksjon/Industri', 'Hus Tils Salg', 'Produksjon/Industri', 1516, 1, 2, 1),
(1528, 'Kontor', 'Hus Tils Salg', 'Kontor', 1516, 1, 2, 1),
(1529, 'Andre', 'Hus Tils Salg', 'Andre', 1516, 1, 2, 1),
(1530, 'Månedsleie', 'Månedsleie', 'Månedsleie (Hus Til Leie)', 0, 4, 5, 1),
(1531, 'Størrelse', 'Størrelse', 'Størrelse (Hus Til Leie)', 0, 4, 5, 1),
(1532, 'Antall soverom', 'Antall soverom', 'Antall soverom (Hus Til Leie)', 0, 1, 1, 1),
(1533, 'All', 'All', 'All', 1532, 1, 1, 1),
(1534, '1+', '1+', '1+ (Hus Til Leie)', 1532, 1, 1, 1),
(1535, '2+', '2+', '2+ (Hus Til Leie)', 1532, 1, 1, 1),
(1536, '3+', '3+', '3+  (Hus Til Leie)', 1532, 1, 1, 1),
(1537, '4+', '4+', '4+ (Hus Til Leie)', 1532, 1, 1, 1),
(1538, '5+', '5+', '5+ (Hus Til Leie)', 1532, 1, 1, 1),
(1539, 'Dyrehold', 'Dyrehold', 'Dyrehold (Hus TIl Leie)', 0, 1, 2, 1),
(1540, 'Dyrehold tillatt', 'Dyrehold tillatt', 'Dyrehold tillatt (Hus Til Leie)', 1539, 1, 2, 1),
(1541, 'Møblert', 'Møblert', 'Møblert (Hus Til Leie)', 0, 1, 2, 1),
(1542, 'Delvis møblert', 'Delvis møblert', 'Delvis møblert (Hus Til Leie)', 1541, 1, 2, 1),
(1543, 'Møblert', 'Møblert', 'Møblert (Hus Til Leie)', 1541, 1, 2, 1),
(1544, 'Umøblert', 'Umøblert', 'Umøblert (Hus Til Leie)', 1541, 1, 2, 1),
(1545, 'Fasiliteter', 'Fasiliteter', 'Fasiliteter (Hus Til Leie)', 0, 1, 2, 1),
(1546, 'Balkong/Terrasse', 'Hus Tils Salg', 'Balkong/Terrasse', 1545, 1, 2, 1),
(1547, 'Garasje/P-plass', 'Hus Tils Salg', 'Garasje/P-plass', 1545, 1, 2, 1),
(1548, 'Heis', 'Hus Tils Salg', 'Heis', 1545, 1, 2, 1),
(1549, 'Ingen gjenboere', 'Hus Tils Salg', 'Ingen gjenboere', 1545, 1, 2, 1),
(1550, 'Peis/Ildsted', 'Hus Tils Salg', 'Peis/Ildsted', 1545, 1, 2, 1),
(1551, 'Turterreng', 'Hus Tils Salg', 'Turterreng', 1545, 1, 2, 1),
(1552, 'Utsikt', 'Hus Tils Salg', 'Utsikt', 1545, 1, 2, 1),
(1553, 'Vaktmester-/vektertjeneste', 'Hus Tils Salg', 'Vaktmester-/vektertjeneste', 1545, 1, 2, 1),
(1554, 'Etasje', 'Etasje', 'Etasje (Hus Til Leie)', 0, 1, 2, 1),
(1555, 'Ikke 1. etasje', 'Hus Tils Leie', 'Ikke 1. etasje', 1554, 1, 2, 1),
(1556, '1. etasje', 'Hus Tils Leie', '1. etasje', 1554, 1, 2, 1),
(1557, '2. etasje', 'Hus Tils Leie', '2. etasje', 1554, 1, 2, 1),
(1558, '3. etasje', 'Hus Tils Leie', '3. etasje', 1554, 1, 2, 1),
(1559, '4. etasje', 'Hus Tils Leie', '4. etasje', 1554, 1, 2, 1),
(1560, '5. etasje', 'Hus Tils Leie', '5. etasje', 1554, 1, 2, 1),
(1561, '6. etasje', 'Hus Tils Leie', '6. etasje', 1554, 1, 2, 1),
(1562, 'Over 6. etasje', 'Hus Tils Leie', 'Over 6. etasje', 1554, 1, 2, 1),
(1563, 'Område', 'Område', 'Område (Business Til Salgs)', 0, 1, 2, 1),
(1564, 'Akershus', 'Business Tils Salg', 'Akershus', 1563, 1, 2, 1),
(1565, 'Aust-Agder', 'Business Tils Salg', 'Aust-Agder', 1563, 1, 2, 1),
(1566, 'Buskerud', 'Business Tils Salg', 'Buskerud', 1563, 1, 2, 1),
(1567, 'Finnmark', 'Business Tils Salg', 'Finnmark', 1563, 1, 2, 1),
(1568, 'Hedmark', 'Business Tils Salg', 'Hedmark', 1563, 1, 2, 1),
(1569, 'Hordaland', 'Business Tils Salg', 'Hordaland', 1563, 1, 2, 1),
(1570, 'Møre og Romsdal', 'Business Tils Salg', 'Møre og Romsdal', 1563, 1, 2, 1),
(1571, 'Nordland', 'Business Tils Salg', 'Nordland', 1563, 1, 2, 1),
(1572, 'Nord-Trøndelag', 'Business Tils Salg', 'Nord-Trøndelag', 1563, 1, 2, 1),
(1573, 'Oppland', 'Business Tils Salg', 'Oppland', 1563, 1, 2, 1),
(1574, 'Oslo', 'Business Tils Salg', 'Oslo', 1563, 1, 2, 1),
(1575, 'Rogaland', 'Business Tils Salg', 'Rogaland', 1563, 1, 2, 1),
(1576, 'Sogn og Fjordane', 'Business Tils Salg', 'Sogn og Fjordane', 1563, 1, 2, 1),
(1577, 'Sør-Trøndelag', 'Business Tils Salg', 'Sør-Trøndelag', 1563, 1, 2, 1),
(1578, 'Telemark', 'Business Tils Salg', 'Telemark', 1563, 1, 2, 1),
(1579, 'Troms', 'Business Tils Salg', 'Troms', 1563, 1, 2, 1),
(1580, 'Utlandet', 'Business Tils Salg', 'Utlandet', 1563, 1, 2, 1),
(1581, 'Vestfold', 'Business Tils Salg', 'Vestfold', 1563, 1, 2, 1),
(1582, 'Vest-Agder', 'Business Tils Salg', 'Vest-Agder', 1563, 1, 2, 1),
(1583, 'Østfold', 'Business Tils Salg', 'Østfold', 1563, 1, 2, 1),
(1584, 'Bransje', 'Bransje', 'Bransje (Business Til Salg)', 0, 1, 2, 1),
(1585, 'Agentur', 'Business Tils Salg', 'Agentur', 1584, 1, 2, 1),
(1586, 'Butikk/Kiosk', 'Business Tils Salg', 'Butikk/Kiosk', 1584, 1, 2, 1),
(1587, 'Frisør/Velvære', 'Business Tils Salg', 'Frisør/Velvære', 1584, 1, 2, 1),
(1588, 'Hotell/Overnatting', 'Business Tils Salg', 'Hotell/Overnatting', 1584, 1, 2, 1),
(1589, 'Nettbutikk/Nettsted', 'Business Tils Salg', 'Nettbutikk/Nettsted', 1584, 1, 2, 1),
(1590, 'Restaurant/Kafé', 'Business Tils Salg', 'Restaurant/Kafé', 1584, 1, 2, 1),
(1591, 'Annet', 'Business Tils Salg', 'Annet', 1584, 1, 2, 1),
(1592, 'Pris', 'Pris', 'Pris (Business Til Salg)', 0, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_additional_values`
--

CREATE TABLE IF NOT EXISTS `form_additional_values` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `values` varchar(110) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=433 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_additional_values`
--

INSERT INTO `form_additional_values` (`id`, `ad_id`, `field_id`, `values`) VALUES
(1, 2, 169, '|Piaggio'),
(2, 2, 606, '|10000'),
(3, 2, 607, '|2011'),
(4, 2, 608, '|688'),
(5, 2, 609, '|Scooter'),
(6, 2, 613, '|Akershus'),
(7, 2, 633, '|49'),
(8, 2, 634, '|100'),
(9, 2, 614, '|Please select'),
(10, 3, 169, '|Daelim'),
(11, 3, 606, '|3000'),
(12, 3, 607, '|2005'),
(13, 3, 608, '|2057'),
(14, 3, 609, '|Scooter'),
(15, 3, 613, '|Sør-Trøndelag'),
(16, 3, 633, '|49'),
(17, 3, 634, '|100'),
(18, 3, 627, '|Please select'),
(19, 4, 169, '|Rieju'),
(20, 4, 606, '|19900'),
(21, 4, 607, '|2015'),
(22, 4, 608, '|3000'),
(23, 4, 609, '|Moped '),
(24, 4, 613, '|Rogaland'),
(25, 4, 633, '|49'),
(26, 4, 634, '|-1'),
(27, 4, 625, '|Please select'),
(28, 5, 169, '|Yamaha'),
(29, 5, 606, '|12900'),
(30, 5, 607, '|2009'),
(31, 5, 608, '|9500'),
(32, 5, 609, '|Moped '),
(33, 5, 613, '|Møre og Romsdal'),
(34, 5, 633, '|50'),
(35, 5, 634, '|600'),
(36, 5, 620, '|Please select'),
(37, 6, 169, '|Yamaha'),
(38, 6, 606, '|12900'),
(39, 6, 607, '|2009'),
(40, 6, 608, '|9500'),
(41, 6, 609, '|Moped '),
(42, 6, 613, '|Finnmark'),
(43, 6, 633, '|50'),
(44, 6, 634, '|600'),
(45, 6, 617, '|Please select'),
(46, 7, 169, '|Daelim'),
(47, 7, 606, '|7495'),
(48, 7, 607, '|2016'),
(49, 7, 608, '|0'),
(50, 7, 609, '|Moped '),
(51, 7, 613, '|Oslo'),
(52, 7, 633, '|'),
(53, 7, 634, '|'),
(54, 7, 624, '|Please select'),
(55, 8, 169, '|Sachs'),
(56, 8, 606, '|5700'),
(57, 8, 607, '|2012'),
(58, 8, 608, '|5000'),
(59, 8, 609, '|Scooter'),
(60, 8, 613, '|Oslo'),
(61, 8, 633, '|49'),
(62, 8, 634, '|'),
(63, 8, 624, '|Please select'),
(64, 9, 169, '|Yamaha'),
(65, 9, 606, '|25000'),
(66, 9, 607, '|2013'),
(67, 9, 608, '|3194'),
(68, 9, 609, '|Moped '),
(69, 9, 613, '|Vestfold'),
(70, 9, 633, '|49'),
(71, 9, 634, '|'),
(72, 9, 630, '|Please select'),
(73, 10, 831, '|200'),
(74, 10, 830, '|400'),
(75, 10, 810, '|Oslo'),
(76, 10, 795, '|Sport'),
(77, 10, 794, '|77777'),
(78, 10, 793, '|2015'),
(79, 10, 792, '|8888'),
(80, 10, 730, '|Suzuki'),
(81, 10, 727, '|Brukt MC'),
(82, 10, 821, '|Please select'),
(83, 11, 169, '|Honda'),
(84, 11, 606, '|22000'),
(85, 11, 607, '|1971'),
(86, 11, 608, '|'),
(87, 11, 609, '|Moped '),
(88, 11, 613, '|Finnmark'),
(89, 11, 633, '|48'),
(90, 11, 634, '|125'),
(91, 11, 610, '|Please select'),
(92, 12, 169, '|Sachs'),
(93, 12, 606, '|7000'),
(94, 12, 607, '|2017'),
(95, 12, 608, '|'),
(96, 12, 609, '|Moped '),
(97, 12, 613, '|Vestfold'),
(98, 12, 633, '|0'),
(99, 12, 634, '|50'),
(100, 12, 630, '|Please select'),
(101, 13, 169, '|Suzuki'),
(102, 13, 606, '|17000'),
(103, 13, 607, '|2002'),
(104, 13, 608, '|1'),
(105, 13, 609, '|Moped '),
(106, 13, 613, '|Møre og Romsdal'),
(107, 13, 633, '|70'),
(108, 13, 634, '|125'),
(109, 13, 620, '|Please select'),
(110, 14, 525, '|Bruktbil til salgs'),
(111, 14, 530, '|2010'),
(112, 14, 531, '|103000'),
(113, 14, 532, '|228588'),
(114, 14, 533, '|Please select'),
(115, 14, 553, '|Please select'),
(116, 14, 564, '|Diesel '),
(117, 14, 571, '|Rød'),
(118, 14, 588, '|'),
(119, 14, 589, '|'),
(120, 14, 590, '|Forhjulsdrift'),
(121, 14, 594, '|Automat'),
(122, 14, 597, '|To hjulsett '),
(123, 14, 600, '|Forhandlergaranti '),
(124, 14, 602, '|Please select'),
(125, 14, 601, '|Please select'),
(126, 15, 525, '|Bruktbil til salgs'),
(127, 15, 530, '|2000'),
(128, 15, 531, '|203500'),
(129, 15, 532, '|16020'),
(130, 15, 533, '|Please select'),
(131, 15, 553, '|Please select'),
(132, 15, 564, '|Diesel '),
(133, 15, 571, '|Rød'),
(134, 15, 588, '|'),
(135, 15, 589, '|2'),
(136, 15, 590, '|Forhjulsdrift'),
(137, 15, 594, '|Manuell'),
(138, 15, 597, '|To hjulsett '),
(139, 15, 600, '|Forhandlergaranti '),
(140, 15, 602, '|Please select'),
(141, 15, 601, '|Please select'),
(142, 16, 525, '|Bruktbil til salgs'),
(143, 16, 530, '|1998'),
(144, 16, 531, '|160000'),
(145, 16, 532, '|44538'),
(146, 16, 533, '|Please select'),
(147, 16, 553, '|Sedan'),
(148, 16, 564, '|Bensin'),
(149, 16, 571, '|Blå '),
(150, 16, 588, '|'),
(151, 16, 589, '|5'),
(152, 16, 590, '|Firehjulsdrift'),
(153, 16, 594, '|Automat'),
(154, 16, 597, '|To hjulsett '),
(155, 16, 600, '|Please select'),
(156, 16, 602, '|Please select'),
(157, 16, 599, '|Please select'),
(158, 17, 525, '|Bruktbil til salgs'),
(159, 17, 530, '|2007'),
(160, 17, 531, '|205222'),
(161, 17, 532, '|118888'),
(162, 17, 533, '|Please select'),
(163, 17, 553, '|Stasjonsvogn'),
(164, 17, 564, '|Diesel '),
(165, 17, 571, '|Grå'),
(166, 17, 588, '|'),
(167, 17, 589, '|'),
(168, 17, 590, '|Firehjulsdrift'),
(169, 17, 594, '|Manuell'),
(170, 17, 597, '|To hjulsett '),
(171, 17, 600, '|Please select'),
(172, 17, 602, '|Please select'),
(173, 17, 599, '|Please select'),
(174, 18, 525, '|Bruktbil til salgs'),
(175, 18, 530, '|1996'),
(176, 18, 531, '|286000'),
(177, 18, 532, '|36500'),
(178, 18, 533, '|Please select'),
(179, 18, 553, '|Stasjonsvogn'),
(180, 18, 564, '|Bensin'),
(181, 18, 571, '|Rød'),
(182, 18, 588, '|'),
(183, 18, 589, '|5'),
(184, 18, 590, '|Firehjulsdrift'),
(185, 18, 594, '|Manuell'),
(186, 18, 597, '|To hjulsett '),
(187, 18, 600, '|Please select'),
(188, 18, 602, '|Please select'),
(189, 18, 599, '|Please select'),
(190, 19, 366, '|Selge'),
(191, 19, 369, '|Rogaland'),
(192, 19, 389, '|Hobby'),
(193, 19, 423, '|2010'),
(194, 19, 424, '|390000'),
(195, 19, 425, '|1'),
(196, 19, 426, '|5'),
(197, 19, 427, '|9028'),
(198, 19, 428, '|'),
(199, 19, 429, '|2200'),
(200, 19, 403, '|Please select'),
(201, 20, 525, '|Bruktbil til salgs'),
(202, 20, 530, '|2003'),
(203, 20, 531, '|339888'),
(204, 20, 532, '|50000'),
(205, 20, 533, '|Please select'),
(206, 20, 553, '|Kasse'),
(207, 20, 564, '|Diesel '),
(208, 20, 571, '|Hvit'),
(209, 20, 588, '|'),
(210, 20, 589, '|'),
(211, 20, 590, '|Forhjulsdrift'),
(212, 20, 594, '|Manuell'),
(213, 20, 597, '|Please select'),
(214, 20, 600, '|Please select'),
(215, 20, 602, '|Please select'),
(216, 20, 596, '|Please select'),
(217, 21, 525, '|Bruktbil til salgs'),
(218, 21, 530, '|1929'),
(219, 21, 531, '|70000'),
(220, 21, 532, '|190000'),
(221, 21, 533, '|Please select'),
(222, 21, 553, '|Coupe'),
(223, 21, 564, '|Bensin'),
(224, 21, 571, '|Blå '),
(225, 21, 588, '|'),
(226, 21, 589, '|'),
(227, 21, 590, '|Bakhjulsdrift'),
(228, 21, 594, '|Manuell'),
(229, 21, 597, '|To hjulsett '),
(230, 21, 600, '|Please select'),
(231, 21, 602, '|Please select'),
(232, 21, 599, '|Please select'),
(233, 22, 831, '|100'),
(234, 22, 830, '|400'),
(235, 22, 810, '|Akershus'),
(236, 22, 795, '|Scooter'),
(237, 22, 794, '|'),
(238, 22, 793, '|'),
(239, 22, 792, '|90000'),
(240, 22, 730, '|Suzuki'),
(241, 22, 727, '|Brukt MC'),
(242, 22, 728, '|Please select'),
(243, 23, 366, '|Leie ut '),
(244, 23, 369, '|Oslo'),
(245, 23, 389, '|KABE'),
(246, 23, 423, '|2017'),
(247, 23, 424, '|499'),
(248, 23, 425, '|0'),
(249, 23, 426, '|2'),
(250, 23, 427, '|200'),
(251, 23, 428, '|150'),
(252, 23, 429, '|400'),
(253, 23, 407, '|Please select'),
(254, 24, 525, '|Bruktbil til salgs'),
(255, 24, 530, '|2010'),
(256, 24, 531, '|64000'),
(257, 24, 532, '|120000'),
(258, 24, 533, '|Buskerud'),
(259, 24, 553, '|Kombi 5-dørs'),
(260, 24, 564, '|Diesel '),
(261, 24, 571, '|Svart '),
(262, 24, 588, '|90'),
(263, 24, 589, '|5'),
(264, 24, 590, '|Forhjulsdrift'),
(265, 24, 594, '|Manuell'),
(266, 24, 597, '|Please select'),
(267, 24, 600, '|Forhandlergaranti '),
(268, 24, 602, '|Tilstandsrapport m/garanti '),
(269, 24, 605, '|Please select'),
(270, 25, 525, '|Bruktbil til salgs'),
(271, 25, 530, '|2013'),
(272, 25, 531, '|36000'),
(273, 25, 532, '|269000'),
(274, 25, 533, '|Please select'),
(275, 25, 553, '|Kombi 5-dørs'),
(276, 25, 564, '|Diesel '),
(277, 25, 571, '|Brun'),
(278, 25, 588, '|'),
(279, 25, 589, '|5'),
(280, 25, 590, '|Forhjulsdrift'),
(281, 25, 594, '|Please select'),
(282, 25, 597, '|To hjulsett '),
(283, 25, 600, '|Forhandlergaranti '),
(284, 25, 602, '|Please select'),
(285, 25, 601, '|Please select'),
(286, 26, 525, '|Bruktbil til salgs'),
(287, 26, 530, '|2013'),
(288, 26, 531, '|48900'),
(289, 26, 532, '|178000'),
(290, 26, 533, '|Please select'),
(291, 26, 553, '|Kasse'),
(292, 26, 564, '|Diesel '),
(293, 26, 571, '|Sølv'),
(294, 26, 588, '|'),
(295, 26, 589, '|2'),
(296, 26, 590, '|Firehjulsdrift'),
(297, 26, 594, '|Manuell'),
(298, 26, 597, '|Please select'),
(299, 26, 600, '|Please select'),
(300, 26, 602, '|Please select'),
(301, 26, 599, '|Please select'),
(302, 27, 525, '|Bruktbil til salgs'),
(303, 27, 530, '|2009'),
(304, 27, 531, '|164000'),
(305, 27, 532, '|169000'),
(306, 27, 533, '|Please select'),
(307, 27, 553, '|SUV/Offroad'),
(308, 27, 564, '|Diesel '),
(309, 27, 571, '|Svart '),
(310, 27, 588, '|'),
(311, 27, 589, '|5'),
(312, 27, 590, '|Firehjulsdrift'),
(313, 27, 594, '|Manuell'),
(314, 27, 597, '|Please select'),
(315, 27, 600, '|Please select'),
(316, 27, 602, '|Please select'),
(317, 27, 592, '|Please select'),
(318, 28, 525, '|Bruktbil til salgs'),
(319, 28, 530, '|2007'),
(320, 28, 531, '|117000'),
(321, 28, 532, '|59900'),
(322, 28, 533, '|Please select'),
(323, 28, 553, '|Kombi 5-dørs'),
(324, 28, 564, '|Diesel '),
(325, 28, 571, '|Blå '),
(326, 28, 588, '|'),
(327, 28, 589, '|5'),
(328, 28, 590, '|Forhjulsdrift'),
(329, 28, 594, '|Manuell'),
(330, 28, 597, '|Please select'),
(331, 28, 600, '|Please select'),
(332, 28, 602, '|Please select'),
(333, 28, 596, '|Please select'),
(334, 29, 525, '|Bruktbil til salgs'),
(335, 29, 530, '|2015'),
(336, 29, 531, '|35600'),
(337, 29, 532, '|309000'),
(338, 29, 533, '|Please select'),
(339, 29, 553, '|Stasjonsvogn'),
(340, 29, 564, '|Please select'),
(341, 29, 571, '|Please select'),
(342, 29, 588, '|'),
(343, 29, 589, '|5'),
(344, 29, 590, '|Forhjulsdrift'),
(345, 29, 594, '|Manuell'),
(346, 29, 597, '|Please select'),
(347, 29, 600, '|Please select'),
(348, 29, 602, '|Please select'),
(349, 29, 596, '|Please select'),
(350, 30, 525, '|Bruktbil til salgs'),
(351, 30, 530, '|2014'),
(352, 30, 531, '|40100'),
(353, 30, 532, '|174900'),
(354, 30, 533, '|Please select'),
(355, 30, 553, '|Kombi 5-dørs'),
(356, 30, 564, '|Elektrisite'),
(357, 30, 571, '|Hvit'),
(358, 30, 588, '|'),
(359, 30, 589, '|5'),
(360, 30, 590, '|Forhjulsdrift'),
(361, 30, 594, '|Automat'),
(362, 30, 597, '|Please select'),
(363, 30, 600, '|Please select'),
(364, 30, 602, '|Please select'),
(365, 30, 595, '|Please select'),
(366, 31, 831, '|98'),
(367, 31, 830, '|150'),
(368, 31, 810, '|Akershus'),
(369, 31, 795, '|Sport'),
(370, 31, 794, '|40000'),
(371, 31, 793, '|1999'),
(372, 31, 792, '|30000'),
(373, 31, 730, '|Kawasaki'),
(374, 31, 727, '|Brukt MC'),
(375, 32, 1385, '|Buskerud'),
(376, 32, 1406, '|200000'),
(377, 32, 1407, '|855'),
(378, 33, 1385, '|Telemark'),
(379, 33, 1406, '|2250000'),
(380, 33, 1407, '|353 m² eiet'),
(381, 34, 1385, '|Rogaland'),
(382, 34, 1406, '|2386000'),
(383, 34, 1407, '|500 m² eiet'),
(384, 35, 1408, '|Rogaland'),
(385, 35, 1429, '|Til salgs'),
(386, 35, 1432, '|Nybygg'),
(387, 35, 1435, '|3495000'),
(388, 35, 1436, '|100'),
(389, 35, 1437, '|'),
(390, 35, 1438, '|2'),
(391, 35, 1439, '|2+'),
(392, 35, 1446, '|2015'),
(393, 35, 1447, '|Leilighet'),
(394, 35, 1461, '|Andel'),
(395, 35, 1467, '|Ingen gjenboere'),
(396, 35, 1477, '|1. etasje'),
(397, 35, 1486, '|B'),
(398, 35, 1494, '|'),
(399, 36, 1495, '|Buskerud'),
(400, 36, 1516, '|Hytte'),
(401, 36, 1530, '|'),
(402, 36, 1531, '|'),
(403, 36, 1532, '|1+'),
(404, 36, 1539, '|Dyrehold tillatt'),
(405, 36, 1541, '|Umøblert'),
(406, 36, 1545, '|Ingen gjenboere'),
(407, 36, 1554, '|Ikke 1. etasje'),
(408, 37, 1584, '|Restaurant/Kafé'),
(409, 37, 1563, '|Telemark'),
(410, 37, 1592, '|380000'),
(411, 38, 833, '|Brukt båt '),
(412, 38, 836, '|Norge'),
(413, 38, 839, '|Cabincruiser'),
(414, 38, 852, '|Viking'),
(415, 38, 1291, '|279000'),
(416, 38, 1292, '|853'),
(417, 38, 1293, '|1982'),
(418, 38, 1294, '|Ja'),
(419, 38, 1297, '|Diesel '),
(420, 38, 1301, '|Nordland'),
(421, 38, 1321, '|'),
(422, 39, 833, '|Brukt båt '),
(423, 39, 836, '|Norge'),
(424, 39, 839, '|Yrkesbåt/Sjark/Skøyte'),
(425, 39, 852, '|Andy'),
(426, 39, 1291, '|1300000'),
(427, 39, 1292, '|1006'),
(428, 39, 1293, '|1984'),
(429, 39, 1294, '|Ja'),
(430, 39, 1297, '|Diesel '),
(431, 39, 1301, '|Oslo'),
(432, 39, 1321, '|');

-- --------------------------------------------------------

--
-- Table structure for table `i18n_message`
--

CREATE TABLE IF NOT EXISTS `i18n_message` (
  `message_id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i18n_message`
--

INSERT INTO `i18n_message` (`message_id`, `category`, `message`, `created_at`, `updated_at`) VALUES
(1, 'yandex', 'Congratulations!', 1462110610, 1462110610),
(2, 'yandex', '<p>Just fill the simple form and post your product ad in just few clicks</p>', 1462172856, 1462172856),
(3, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=1"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/bulding.png></div>Eiendom</a></li>', 1462182155, 1462182155),
(4, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=2"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/inustry.png></div>Industri</a></li>', 1462182157, 1462182157),
(5, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=3"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/car.png></div>Kjøretøy</a></li>', 1462182158, 1462182158),
(6, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=4"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/mc2.png></div>Motorsykkel</a></li>', 1462182160, 1462182160),
(7, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=5"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/boat.png></div>Båt</a></li>', 1462182161, 1462182161),
(8, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=6"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/jobb.png></div>Jobb</a></li>', 1462182162, 1462182162),
(9, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=7"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/rest1.jpg></div>Restauranter</a></li>', 1462182164, 1462182164),
(10, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=8"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/trv1.jpg></div>Reise</a></li>', 1462182165, 1462182165),
(11, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=9"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/image.jpeg></div>Utdanning</a></li>', 1462182167, 1462182167),
(12, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=10"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/IMG_8567.jpg></div>Katalog</a></li>', 1462182168, 1462182168),
(13, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=11"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/netbutiker.jpg></div>Nettbutikker</a></li>', 1462182170, 1462182170),
(14, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=12"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/property.png></div>Kjøpesenter</a></li>', 1462182171, 1462182171),
(15, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=13"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/bid.jpg></div>Auksjon</a></li>', 1462182173, 1462182173),
(16, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=19"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/sofa.jpeg></div>Til Salgs</a></li>', 1462182174, 1462182174),
(17, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=20"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/samfun.jpg></div>Aktiviteter</a></li>', 1462182175, 1462182175),
(18, 'yandex', '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=21"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/serv7.jpg></div>Tjenester</a></li>', 1462182177, 1462182177),
(19, 'yandex', '<h3>Sell Your Item On Our Website</h3>', 1462184364, 1462184364),
(20, 'yandex', '<p>Have thing special to sell? just try and use our website.!</p>', 1462184479, 1462184479),
(21, 'yandex', 'Please Login First.', 1462435995, 1462435995),
(22, 'yandex', 'Enter your confirmation code.', 1462597076, 1462597076),
(23, 'yandex', 'Your ad has been posted ', 1462632468, 1462632468),
(24, 'yandex', 'Please Enter your registration Code to complete your registration', 1462633969, 1462633969),
(25, 'yandex', 'Your Registration has been completed sucessfully... Please login', 1462634043, 1462634043),
(26, 'yandex', 'User settings saved successfully.', 1462634624, 1462634624),
(27, 'yandex', 'User settings not saved successfully.', 1464196524, 1464196524),
(28, 'yandex', 'Please try again ', 1464328631, 1464328631),
(29, 'yandex', 'Your ad is now pending for Admin Approval', 1464329172, 1464329172),
(30, 'yandex', 'You do not have enough credits', 1464349398, 1464349398),
(31, 'yandex', 'Please check your email for further instructions.', 1464585796, 1464585796),
(32, 'yandex', 'Congratulation! New password was saved.', 1464588424, 1464588424),
(33, 'yandex', 'Your message sended successfully!', 1465209392, 1465209392),
(34, 'yandex', 'Creaeted new copy and pending form admin to approve ad', 1468495631, 1468495631),
(35, 'yandex', 'Please enter the ad confirmation code sent your mobile.', 1474192554, 1474192554),
(36, 'yandex', 'Your Registration has been completed sucessfully ... Please login', 1480483020, 1480483020),
(37, 'yandex', 'Please Enter your Code to Reset your Password', 1480500449, 1480500449);

-- --------------------------------------------------------

--
-- Table structure for table `i18n_translation`
--

CREATE TABLE IF NOT EXISTS `i18n_translation` (
  `message_id` int(11) NOT NULL,
  `language` varchar(16) NOT NULL,
  `translator_id` int(11) DEFAULT NULL,
  `translation` text,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `error_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i18n_translation`
--

INSERT INTO `i18n_translation` (`message_id`, `language`, `translator_id`, `translation`, `status`, `created_at`, `updated_at`, `error_message`) VALUES
(1, 'de', 1, 'Herzlichen Glückwunsch!', 10, 1462172602, 1462172650, 'Unknown SSL protocol error in connection to translate.yandex.net:443 '),
(1, 'en', 1, 'Congratulations!', 10, 1462172527, 1462172527, NULL),
(1, 'fr', 1, 'Félicitations!', 10, 1462110613, 1462110613, NULL),
(1, 'no', 1, 'Gratulerer!', 10, 1462173446, 1462173446, NULL),
(1, 'sv', 1, 'Grattis!', 10, 1462173472, 1462173472, NULL),
(2, 'de', 1, '<p>füllen Sie Einfach die einfache form und veröffentlichen Sie Ihre Produkt-Anzeige in nur wenigen Klicks</p>', 10, 1462172858, 1462172858, NULL),
(2, 'en', 1, '<p>Just fill the simple form and post your product ad in just few clicks</p>', 10, 1462172865, 1462172865, NULL),
(2, 'fr', 1, '<p>il vous suffit de remplir le formulaire simple et publiez votre annonce pour un produit en seulement quelques clics,</p>', 10, 1462172871, 1462172871, NULL),
(2, 'no', 1, '<p>Bare fyll ut det enkle skjemaet, og innlegget ditt produkt annonse i bare noen få klikk</p>', 10, 1462173444, 1462173448, 'Unknown SSL protocol error in connection to translate.yandex.net:443 '),
(2, 'sv', 1, '<p>behöver du Bara fylla i enkla formulär och skicka din produktannons i bara några klick</p>', 10, 1462173471, 1462173471, NULL),
(3, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=1"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/Gebäude.png></div>Eiendom</a></li>', 10, 1462182241, 1462182241, NULL),
(3, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=1"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/bulding.png></div>Eiendom</a></li>', 10, 1462182194, 1462182194, NULL),
(3, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=1"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/bulding.png></div>Eiendom</a></li>', 10, 1462182157, 1462182157, NULL),
(4, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=2"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/inustry.png></div>Industri</a></li>', 10, 1462182242, 1462182242, NULL),
(4, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=2"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/inustry.png></div>Industri</a></li>', 10, 1462182195, 1462182195, NULL),
(4, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=2"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/inustry.png></div>Industri</a></li>', 10, 1462182158, 1462182158, NULL),
(5, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=3"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/Auto.png></div>Kjøretøy</a></li>', 10, 1462182244, 1462182244, NULL),
(5, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=3"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/car.png></div>Kjøretøy</a></li>', 10, 1462182196, 1462182196, NULL),
(5, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=3"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/bil.png></div>Kjøretøy</a></li>', 10, 1462182160, 1462182160, NULL),
(6, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=4"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/mc2.png></div>Motorsykkel</a></li>', 10, 1462182245, 1462182245, NULL),
(6, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=4"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/mc2.png></div>Motorsykkel</a></li>', 10, 1462182197, 1462182197, NULL),
(6, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=4"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/mc2.png></div>Motorsykkel</a></li>', 10, 1462182161, 1462182161, NULL),
(7, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=5"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/Boot.png></div>Båt</a></li>', 10, 1462182246, 1462182246, NULL),
(7, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=5"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/boat.png></div>Båt</a></li>', 10, 1462182198, 1462182198, NULL),
(7, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=5"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/båt.png></div>Båt</a></li>', 10, 1462182162, 1462182162, NULL),
(8, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=6"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/jobb.png></div>Jobb</a></li>', 10, 1462182248, 1462182248, NULL),
(8, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=6"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/jobb.png></div>Jobb</a></li>', 10, 1462182199, 1462182199, NULL),
(8, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=6"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/jobb.png></div>Jobb</a></li>', 10, 1462182164, 1462182164, NULL),
(9, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=7"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/rest1.jpg></div>Restauranter</a></li>', 10, 1462182249, 1462182249, NULL),
(9, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=7"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/rest1.jpg></div>Restauranter</a></li>', 10, 1462182200, 1462182200, NULL),
(9, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=7"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/rest1.jpg></div>Restauranter</a></li>', 10, 1462182165, 1462182165, NULL),
(10, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=8"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/trv1.jpg></div>Reise</a></li>', 10, 1462182250, 1462182250, NULL),
(10, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=8"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/trv1.jpg></div>Reise</a></li>', 10, 1462182202, 1462182202, NULL),
(10, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=8"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/trv1.jpg></div>Reise</a></li>', 10, 1462182167, 1462182167, NULL),
(11, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=9"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/image.jpeg></div>Utdanning</a></li>', 10, 1462182251, 1462182251, NULL),
(11, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=9"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/image.jpeg></div>Utdanning</a></li>', 10, 1462182203, 1462182203, NULL),
(11, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=9"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/image.jpeg></div>Utdanning</a></li>', 10, 1462182168, 1462182168, NULL),
(12, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=10"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/IMG_8567.jpg></div>Katalog</a></li>', 10, 1462182253, 1462182253, NULL),
(12, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=10"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/IMG_8567.jpg></div>Katalog</a></li>', 10, 1462182204, 1462182204, NULL),
(12, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=10"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/IMG_8567.jpg></div>Katalog</a></li>', 10, 1462182170, 1462182170, NULL),
(13, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=11"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/netbutiker.jpg></div>Nettbutikker</a></li>', 10, 1462182254, 1462182254, NULL),
(13, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=11"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/netbutiker.jpg></div>Nettbutikker</a></li>', 10, 1462182205, 1462182205, NULL),
(13, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=11"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/netbutiker.jpg></div>Nettbutikker</a></li>', 10, 1462182171, 1462182171, NULL),
(14, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=12"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/Eigenschaft.png></div>Kjøpesenter</a></li>', 10, 1462182255, 1462182255, NULL),
(14, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=12"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/property.png></div>Kjøpesenter</a></li>', 10, 1462182206, 1462182206, NULL),
(14, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=12"><div class="cat-img-box"><img class="img-responsive" src= " ../../backend/web/uploads/fastighet.png></div>Kjøpesenter</a></li>', 10, 1462182172, 1462182172, NULL),
(15, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=13"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/bid.jpg></div>Auksjon</a></li>', 10, 1462182257, 1462182257, NULL),
(15, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=13"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/bid.jpg></div>Auksjon</a></li>', 10, 1462182207, 1462182207, NULL),
(15, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=13"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/bid.jpg></div>Auksjon</a></li>', 10, 1462182174, 1462182174, NULL),
(16, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=19"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/sofa.jpeg></div>Til Salgs</a></li>', 10, 1462182258, 1462182258, NULL),
(16, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=19"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/sofa.jpeg></div>Til Salgs</a></li>', 10, 1462182208, 1462182208, NULL),
(16, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=19"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/sofa.jpeg></div>Til Salgs</a></li>', 10, 1462182175, 1462182175, NULL),
(17, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=20"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/samfun.jpg></div>Aktiviteter</a></li>', 10, 1462182259, 1462182259, NULL),
(17, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=20"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/samfun.jpg></div>Aktiviteter</a></li>', 10, 1462182209, 1462182209, NULL),
(17, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=20"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/samfun.jpg></div>Aktivieter</a></li>', 10, 1462182177, 1462182177, NULL),
(18, 'de', 1, '<li><a href="/klassifiziert/frontend/web/index.php?r=Kategorie%2Fcategories&id=21"><div class="cat-img-box"><img class="img-responsive" src=../../backend/web/uploads/serv7.jpg></div>Tjenester</a></li>', 10, 1462182260, 1462182260, NULL),
(18, 'en', 1, '<li><a href="/classified/frontend/web/index.php?r=category%2Fcategories&id=21"><div class="cat-img-box"><img class="img-responsive"  src=../../backend/web/uploads/serv7.jpg></div>Tjenester</a></li>', 10, 1462182210, 1462182210, NULL),
(18, 'sv', 1, '<li><a href="/klassificerad/frontend/web/index.php?r=category%2Fcategories&id=21"><div class="cat-img-box"><img class="img-lyhörd" src=../../backend/web/uploads/serv7.jpg></div>Tjenester</a></li>', 10, 1462182178, 1462182178, NULL),
(19, 'de', 1, '<h3>Verkaufen Sie Ihre Artikel Auf Unserer Website</h3>', 10, 1462184366, 1462184366, NULL),
(19, 'en', 1, '<h3>Sell Your Item On Our Website</h3>', 10, 1462184370, 1462184370, NULL),
(19, 'fr', 1, '<h3>Vendre Votre Article Sur Notre Site web</h3>', 10, 1462184488, 1462184488, NULL),
(19, 'no', 1, '<h3>Selge Varen På Vår Hjemmeside</h3>', 10, 1462184492, 1462184492, NULL),
(19, 'sv', 1, '<h3>Sälj Din Artikel På Vår Hemsida</h3>', 10, 1462434745, 1462434745, NULL),
(20, 'de', 1, '<p>Haben, was besonderes zu verkaufen? einfach ausprobieren und der Nutzung unserer website.!</p>', 10, 1462184481, 1462184481, NULL),
(20, 'en', 1, '<p>Have thing special to sell? just try and use our website.!</p>', 10, 1462201680, 1462201680, NULL),
(20, 'fr', 1, '<p>Avez-chose de spécial à vendre? juste essayer et d''utiliser notre site web.!</p>', 10, 1462184489, 1462184489, NULL),
(20, 'no', 1, '<p>Har spesielle ting du skal selge? bare prøv og bruke vår hjemmeside.!</p>', 10, 1462184493, 1462184493, NULL),
(20, 'sv', 1, '<p>Har särskilda sak att sälja? bara prova och använda vår hemsida!</p>', 10, 1462434745, 1462434745, NULL),
(21, 'de', 1, 'Bitte Loggen Sie Sich Zuerst.', 10, 1463139123, 1463139123, NULL),
(21, 'en', 1, 'Please Login First.', 10, 1462435996, 1462435996, NULL),
(21, 'fr', 1, 'Veuillez Vous Connecter En Premier.', 10, 1468418041, 1468418041, NULL),
(21, 'no', 1, 'Vennligst Logg Inn Først.', 10, 1464114821, 1464114821, NULL),
(21, 'sv', 1, 'Vänligen Logga In Först.', 10, 1464525012, 1464525012, NULL),
(22, 'en', 1, 'Enter your confirmation code.', 10, 1462597077, 1462597077, NULL),
(22, 'no', 1, 'Skriv inn koden.', 10, 1464537897, 1464537897, NULL),
(23, 'en', 1, 'Your ad has been posted ', 10, 1462632469, 1462632469, NULL),
(24, 'en', 1, 'Please Enter your registration Code to complete your registration', 10, 1462633970, 1462633970, NULL),
(24, 'no', 1, 'Vennligst skriv Inn registreringskoden for å fullføre registreringen', 10, 1465210712, 1465210712, NULL),
(25, 'en', 1, 'Your Registration has been completed sucessfully... Please login', 10, 1462634044, 1462634044, NULL),
(26, 'en', 1, 'User settings saved successfully.', 10, 1462634625, 1462634625, NULL),
(26, 'no', 1, 'Bruker innstillinger er lagret.', 10, 1465123408, 1465123408, NULL),
(27, 'en', 1, 'User settings not saved successfully.', 10, 1464196525, 1464196525, NULL),
(28, 'en', 1, 'Please try again ', 10, 1464328632, 1464328632, NULL),
(28, 'no', 1, 'Vennligst prøv igjen ', 10, 1464539981, 1464539981, NULL),
(29, 'en', 1, 'Your ad is now pending for Admin Approval', 10, 1464329173, 1464329173, NULL),
(29, 'no', 1, 'Din annonse er nå under behandling for Admin Godkjenning', 10, 1464537953, 1464537953, NULL),
(30, 'en', 1, 'You do not have enough credits', 10, 1464349399, 1464349399, NULL),
(30, 'no', 1, 'Du ikke har nok kreditt', 10, 1466614256, 1466614256, NULL),
(31, 'en', 1, 'Please check your email for further instructions.', 10, 1464585797, 1464585797, NULL),
(32, 'en', 1, 'Congratulation! New password was saved.', 10, 1464588425, 1464588425, NULL),
(33, 'en', 1, 'Your message sended successfully!', 10, 1465209393, 1465209393, NULL),
(33, 'no', 1, 'Din melding vellykket sendt!', 10, 1465211406, 1465211406, NULL),
(34, 'en', 1, 'Creaeted new copy and pending form admin to approve ad', 10, 1468495631, 1468495631, NULL),
(35, 'en', 1, 'Please enter the ad confirmation code sent your mobile.', 10, 1474192555, 1474192555, NULL),
(35, 'no', 1, 'Vennligst skriv inn annonsen bekreftelse kode sendt til din mobil.', 10, 1477828558, 1477828558, NULL),
(36, 'en', 1, 'Your Registration has been completed sucessfully ... Please login', 10, 1480483021, 1480483021, NULL),
(37, 'en', 1, 'Please Enter your Code to Reset your Password', 10, 1480500449, 1480500449, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `i18n_translator`
--

CREATE TABLE IF NOT EXISTS `i18n_translator` (
  `translator_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i18n_translator`
--

INSERT INTO `i18n_translator` (`translator_id`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 'conquer\\i18n\\translators\\YandexTranslator', 1462110610, 1462110610);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) NOT NULL,
  `advertise_id` int(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=398 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `advertise_id`, `image`) VALUES
(289, 9, '88_548270208.jpg'),
(288, 9, '88_454517146.jpg'),
(287, 9, '88_56353678.jpg'),
(292, 10, 'nokia microsoft.png'),
(10, 10, 'CREATIVE-BRANDING.jpg'),
(11, 10, 'ONLINE-MARKETING.jpg'),
(12, 10, 'SEO-01.jpg'),
(13, 10, 'techmantic.jpg'),
(14, 10, 'ALLSERVICES.jpg'),
(15, 10, 'CALLCENTER-BPO.jpg'),
(299, 12, '37_915468424.jpg'),
(345, 26, '81_14399135.jpg'),
(305, 14, '60_477180043.jpg'),
(337, 22, 'Suzuki SV 1000 S.jpg'),
(338, 23, 'KABE ROYAL 740 E TDL E9.jpg'),
(333, 21, '44_821312752.jpg'),
(339, 24, 'bil 2.jpg'),
(340, 24, 'bil til salg.jpg'),
(341, 25, '11_372610093.jpg'),
(342, 25, '11_704091114.jpg'),
(343, 25, '11_938964662.jpg'),
(344, 25, '11_1465696709.jpg'),
(34, 22, '1.jpg'),
(35, 22, '2.jpg'),
(36, 22, '3.jpg'),
(37, 22, '4.jpg'),
(38, 22, '5.jpg'),
(39, 23, '1.jpg'),
(40, 23, '2.jpg'),
(41, 23, '3.jpg'),
(42, 23, '4.jpg'),
(43, 23, '5.jpg'),
(44, 24, 'Chrysanthemum.jpg'),
(45, 25, 'Lighthouse.jpg'),
(46, 28, 'Koala.jpg'),
(372, 34, '67_150354665.jpg'),
(377, 35, '21_329256090.jpg'),
(376, 35, '21_310861134.jpg'),
(386, 37, '28_176252381.jpg'),
(385, 37, '28_16748802.jpg'),
(390, 38, '86_527729136.jpg'),
(389, 38, '86_388200637.jpg'),
(397, 39, '26_1743296367.jpg'),
(396, 39, '26_666549916.jpg'),
(395, 39, '26_545659886.jpg'),
(394, 39, '26_445534532.jpg'),
(65, 39, '920-360-dame-smiler-med-mobil.jpg'),
(66, 39, '920-360-reiseforsikring-terningkast-6.jpg'),
(67, 40, 'image2.png'),
(68, 42, '21_variety-of-pulses-fb5dc.jpg'),
(69, 42, 'PULS.jpg'),
(70, 44, '71M2G+I5b5L._UL1500_[1].jpg'),
(71, 44, '71gjo40lmoL._UL1500_[1].jpg'),
(72, 44, '91cRfDOhxrL._UL1500_[1].jpg'),
(73, 44, '81LB-RNladL._UL1500_[1].jpg'),
(74, 45, '3.jpg'),
(75, 45, '1.jpg'),
(76, 46, '1.jpg'),
(77, 48, '21_variety-of-pulses-fb5dc.jpg'),
(78, 48, '84b71627-08c3-4d79-92a6-24358a1fc901.jpg'),
(79, 49, '21_variety-of-pulses-fb5dc.jpg'),
(80, 49, 'year_of_pulses.jpg'),
(81, 49, 'Tea_in_different_grade_of_fermentation.jpg'),
(82, 52, 'image.png'),
(83, 52, 'image.png'),
(84, 54, '1.jpg'),
(85, 54, '2.jpg'),
(86, 55, '1.jpg'),
(87, 55, '2.jpg'),
(88, 55, '3.jpg'),
(89, 55, '4.jpg'),
(90, 56, '1.jpg'),
(91, 56, 'IMG_8832.jpg'),
(92, 57, '3.jpg'),
(93, 58, 'barbær pc.jpg'),
(94, 58, 'barna stol.jpg'),
(95, 58, 'Barneseter.jpg'),
(96, 58, 'Bathroom.jpg'),
(97, 60, 'Florence-Broadhurst-kabuki-bedding.jpg'),
(98, 61, '6WBS2KP.jpg'),
(99, 61, '9GUH2KP.jpg'),
(100, 62, 'Laboratorija2.jpg'),
(101, 63, 'annet.jpg'),
(102, 63, 'lagerinredninig1.jpg'),
(103, 63, 'lagerinredninig.jpg'),
(104, 64, 'Agriculture.jpg'),
(105, 64, 'lagerinredninig1.jpg'),
(106, 64, 'lagerinredninig.jpg'),
(107, 64, 'Restaurant Scene Hall.jpg'),
(108, 64, 'body care equipment.png'),
(109, 64, 'annt.jpg'),
(110, 64, 'Agriculture.jpg'),
(111, 64, 'transport.jpg'),
(112, 65, 'lagerinredninig1.jpg'),
(113, 65, 'lagerinredninig1.jpg'),
(114, 65, 'lagerinredninig.jpg'),
(115, 65, 'spill.jpg'),
(116, 66, '20-70.jpg'),
(117, 66, '70--protsentov-refbek.png'),
(118, 66, '2012-01-salg-290x290.jpg'),
(119, 67, 'andre bøker.jpg'),
(120, 68, 'Screenshot_3.png'),
(121, 68, 'Screenshot_1.png'),
(122, 68, 'Screenshot_5.png'),
(123, 69, 'Screenshot_5.png'),
(124, 69, 'Screenshot_7.png'),
(125, 69, 'Screenshot_8.png'),
(126, 70, 'Screenshot_10.png'),
(127, 70, 'Screenshot_7.png'),
(128, 70, 'Screenshot_3.png'),
(129, 70, 'Screenshot_2.png'),
(130, 10000, 'barbær pc.jpg'),
(131, 10000, 'barna stol.jpg'),
(132, 10000, 'audio video.jpg'),
(133, 10001, 'secondarytile.png'),
(134, 10001, '8.jpg'),
(135, 10002, '3.jpg'),
(136, 10002, '2.jpg'),
(137, 10002, '1.jpg'),
(138, 10003, '2.jpg'),
(139, 10004, 'Agriculture.jpg'),
(140, 10004, 'andre bøker.jpg'),
(141, 10004, '2012-01-salg-290x290.jpg'),
(142, 10004, '70--protsentov-refbek.png'),
(143, 10004, '20-70.jpg'),
(144, 10004, 'andre bøker.jpg'),
(145, 10005, 'test8 (4).jpg'),
(146, 10006, 'price writer.jpg'),
(147, 10006, '3.jpg'),
(148, 10006, '2.jpg'),
(149, 10007, 'test8 (1).jpg'),
(150, 10007, 'test8 (3).jpg'),
(151, 10007, 'test8 (4).jpg'),
(152, 10007, 'test8 (5).jpg'),
(153, 10007, 'test8 (6).jpg'),
(154, 10007, 'test8 (7).jpg'),
(155, 10008, 'test8 (3).jpg'),
(156, 10008, 'test8 (4).jpg'),
(157, 10009, '2.jpg'),
(158, 10010, 'price writer.jpg'),
(159, 10010, '1.jpg'),
(160, 10010, '2.jpg'),
(161, 10010, '3.jpg'),
(162, 10012, '3.jpg'),
(163, 10012, 'price writer.jpg'),
(164, 10012, '1.jpg'),
(165, 10013, 'jklj.jpg'),
(166, 10013, 'kjikj.jpg'),
(167, 10013, 'iopi.jpg'),
(168, 10013, 'ioo.jpg'),
(169, 10013, 'kkjkj.jpg'),
(170, 10013, 'auto.jpg'),
(171, 10014, 'kjikj.jpg'),
(172, 10014, '1.jpg'),
(173, 10014, 'iopi.jpg'),
(174, 10014, 'price writer.jpg'),
(175, 10014, 'oiuio.jpg'),
(176, 10014, 'kkjkj.jpg'),
(177, 10015, 'kjikj.jpg'),
(178, 10015, 'jklj.jpg'),
(179, 10015, 'iopi.jpg'),
(180, 10015, 'price writer.jpg'),
(181, 10015, 'ioo.jpg'),
(182, 10015, 'kkjkj.jpg'),
(183, 10016, '111.jpg'),
(184, 10016, 'asd.jpg'),
(185, 10016, 'auto.jpg'),
(186, 10017, '111.jpg'),
(187, 10017, 'asd.jpg'),
(188, 10017, 'mob2.jpg'),
(189, 10018, 'asd.jpg'),
(190, 10018, '111.jpg'),
(191, 10018, 'mob2.jpg'),
(192, 10019, 'logo_bildeler.png'),
(193, 10020, 'image.png'),
(194, 10020, 'image.png'),
(195, 10020, 'image.png'),
(196, 10022, '2.jpg'),
(197, 10022, 'IMG_8830.jpg'),
(198, 10022, 'IMG_8834.jpg'),
(199, 10022, 'IMG_8832.jpg'),
(200, 10023, '4.jpg'),
(201, 10023, 'IMG_8825.jpg'),
(202, 10023, 'IMG_8830.jpg'),
(203, 10024, 'Screenshot_10.png'),
(204, 10024, 'Screenshot_7.png'),
(205, 10025, 'test8 (1).jpg'),
(206, 10025, 'test8 (3).jpg'),
(207, 10025, 'test8 (4).jpg'),
(208, 10025, 'test8 (5).jpg'),
(209, 10025, 'test8 (6).jpg'),
(210, 10025, 'test8 (7).jpg'),
(211, 10026, 'test8 (1).jpg'),
(212, 10026, 'test8 (3).jpg'),
(213, 10026, 'test8 (4).jpg'),
(214, 10026, 'test8 (5).jpg'),
(215, 10026, 'test8 (6).jpg'),
(216, 10026, 'test8 (7).jpg'),
(217, 10027, 'ioo.jpg'),
(218, 10027, 'kjikj.jpg'),
(219, 10028, '111.jpg'),
(220, 10028, 'asd.jpg'),
(221, 10028, 'kjikj.jpg'),
(222, 10029, 'iopi.jpg'),
(223, 10029, 'auto.jpg'),
(224, 10029, 'kkjkj.jpg'),
(225, 10029, 'auto.jpg'),
(226, 10030, 'sms.png'),
(227, 10031, 'test8 (4).jpg'),
(228, 10032, 'iopi.jpg'),
(229, 10032, 'auto.jpg'),
(230, 10032, 'kkjkj.jpg'),
(231, 10032, 'auto.jpg'),
(232, 10033, '0.jpg'),
(233, 10033, '1.jpg'),
(234, 10033, '2.jpg'),
(235, 10033, '3.jpg'),
(236, 10033, '4.jpg'),
(237, 10033, '5.jpg'),
(238, 10036, 'iopi.jpg'),
(239, 10036, 'auto.jpg'),
(240, 10036, 'kkjkj.jpg'),
(241, 10036, 'auto.jpg'),
(242, 10037, '111.jpg'),
(243, 10037, 'asd.jpg'),
(244, 10037, 'kjikj.jpg'),
(245, 10038, 'Middelalderen festival.jpg'),
(246, 10039, 'as1.jpg'),
(247, 10039, 'as2.jpg'),
(248, 10039, 'as3.jpg'),
(249, 10039, 'as4.jpg'),
(250, 10039, 'BMW-120-Matte-White-Wrap-Window-Tint.jpg'),
(251, 10041, 'housing.jpg'),
(252, 10042, '99_1154663595.jpg'),
(253, 10042, 'headphones.jpg'),
(254, 10042, 'housing.jpg'),
(255, 10042, 'nokia microsoft.png'),
(256, 10043, 'nokia microsoft.png'),
(257, 2, '99_257529245.jpg'),
(258, 2, '99_476908081.jpg'),
(259, 2, '99_787699563.jpg'),
(260, 2, '99_832680248.jpg'),
(261, 2, '99_865167696.jpg'),
(262, 2, '99_1050957246.jpg'),
(263, 2, '99_1108927152.jpg'),
(264, 2, '99_1437920375.jpg'),
(265, 3, '59_414396364.jpg'),
(266, 3, '59_863769988.jpg'),
(267, 3, '59_1985588405.jpg'),
(268, 4, '40_36174770.jpg'),
(269, 4, '40_1466903475.jpg'),
(270, 4, '40_1662254772.jpg'),
(271, 4, '40_1860079453.jpg'),
(272, 6, '73_400837400.jpg'),
(273, 6, '73_493330636.jpg'),
(274, 6, '73_978233368.jpg'),
(275, 6, '73_1596886904.jpg'),
(276, 6, '73_2131988308.jpg'),
(277, 7, '29_15945053.jpg'),
(278, 7, '29_108060741.jpg'),
(279, 7, '29_170768831.jpg'),
(280, 7, '29_1319713289.jpg'),
(281, 7, '29_1353216938.jpg'),
(282, 7, '29_1986293148.jpg'),
(283, 7, '29_2027410957.jpg'),
(284, 8, '70_117278857.jpg'),
(285, 8, '70_544315466.jpg'),
(286, 8, '70_1540935084.jpg'),
(290, 9, '88_1785929976.jpg'),
(291, 9, '88_2038507728.jpg'),
(293, 11, '20_45898324.jpg'),
(294, 11, '20_94371592.jpg'),
(295, 11, '20_261801960.jpg'),
(296, 11, '20_819235697.jpg'),
(297, 11, '20_1488259937.jpg'),
(298, 11, '20_1988993174.jpg'),
(300, 12, '37_1327242399.jpg'),
(301, 13, '36_370990997.jpg'),
(302, 13, '36_879990184.jpg'),
(303, 13, '36_1662804061.jpg'),
(304, 13, '36_1837680098.jpg'),
(306, 14, '60_490259413.jpg'),
(307, 14, '60_1295316012.jpg'),
(308, 14, '60_1584144630.jpg'),
(309, 15, '92_170213805 (1).jpg'),
(310, 15, '92_170213805.jpg'),
(311, 15, '92_1102902288.jpg'),
(312, 15, '92_1587027835.jpg'),
(313, 16, '58_576709943.jpg'),
(314, 16, '58_837144765.jpg'),
(315, 16, '58_1218194303.jpg'),
(316, 16, '58_1747602062.jpg'),
(317, 17, '10_504593334.jpg'),
(318, 17, '10_621368234.jpg'),
(319, 17, '10_1019230775.jpg'),
(320, 17, '10_1870535960.jpg'),
(321, 18, '42_964172108.jpg'),
(322, 18, '42_1022135240.jpg'),
(323, 18, '42_1560673571.jpg'),
(324, 18, '42_2104386988.jpg'),
(325, 19, '55_293408772.jpg'),
(326, 19, '55_1126848105.jpg'),
(327, 19, '55_1554005391.jpg'),
(328, 19, '55_1588326304.jpg'),
(329, 20, '65_629245453.jpg'),
(330, 20, '65_797750940.jpg'),
(331, 20, '65_804695570.jpg'),
(332, 20, '65_851723682.jpg'),
(334, 21, '44_842588997.jpg'),
(335, 21, '44_1739570107.jpg'),
(336, 21, '44_2129928553.jpg'),
(346, 26, '81_26000190.jpg'),
(347, 26, '81_1089879924.jpg'),
(348, 26, '81_1642295610.jpg'),
(349, 27, '19_617754043.jpg'),
(350, 27, '19_1009606436.jpg'),
(351, 27, '19_1534908534.jpg'),
(352, 27, '19_1958063150.jpg'),
(353, 28, '02_111506662.jpg'),
(354, 28, '02_784191562.jpg'),
(355, 28, '02_1243169942.jpg'),
(356, 28, '02_2113912162.jpg'),
(357, 29, '54_958359157.jpg'),
(358, 29, '54_1298161249.jpg'),
(359, 29, '54_1752660634.jpg'),
(360, 29, '54_1809712024.jpg'),
(361, 30, '58_347184293.jpg'),
(362, 30, '58_735422892.jpg'),
(363, 30, '58_1017175607.jpg'),
(364, 30, '58_1814353024.jpg'),
(365, 31, 'image.png'),
(366, 32, 'l_47889915.jpg'),
(367, 32, 'l_142184125.jpg'),
(368, 32, 'l_172656340.jpg'),
(369, 33, '13_723533681.jpg'),
(370, 33, '13_818607622.jpg'),
(371, 33, '13_974520667.jpg'),
(373, 34, '67_706946784.jpg'),
(374, 34, '67_1888763771.jpg'),
(375, 34, '67_2022409542.jpg'),
(378, 35, '21_986682408.jpg'),
(379, 35, '21_1129141192.jpg'),
(380, 35, '21_1283230761.jpg'),
(381, 36, '58_612166247.jpg'),
(382, 36, '58_835824383.jpg'),
(383, 36, '58_989120208.jpg'),
(384, 36, 'l_528285164.jpg'),
(387, 37, '28_1508699317.jpg'),
(388, 37, '28_1736774321.jpg'),
(391, 38, '86_1057442832.jpg'),
(392, 38, '86_1215646925.jpg'),
(393, 38, '86_1280238515.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `to_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `from_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `to_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `from_vdate` datetime DEFAULT NULL,
  `to_vdate` datetime DEFAULT NULL,
  `from_ddate` datetime DEFAULT NULL,
  `to_ddate` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `conv_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `ad_id`, `message`, `from`, `to`, `from_viewed`, `to_viewed`, `from_deleted`, `to_deleted`, `from_vdate`, `to_vdate`, `from_ddate`, `to_ddate`, `created`, `conv_id`) VALUES
(1, 1, '<p>Hello Dmitry,</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>\r\n\r\n<p>Nam dignissim convallis nulla, vitae porta purus fringilla ac. Praesent consectetur ex eu dui efficitur sollicitudin. Mauris libero est, aliquam a diam maximus, dignissim laoreet lacus.</p>\r\n\r\n<p>Nulla ac nisi sodales, auctor dui et, consequat turpis. Cras dolor turpis, sagittis vel elit in, varius elementum arcu. Mauris aliquet lorem ac enim blandit, nec consequat tortor auctor. Sed eget nunc at justo congue mollis eget a urna. Phasellus in mauris quis tortor porta tristique at a risus.</p>\r\n\r\n<p><strong>Best Regards<br />\r\nJohn Doe</strong></p>\r\n', 43, 42, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-08-01 03:10:00', 12),
(2, 1, '<p>Hello Dmitry,</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>\r\n\r\n<p>Nam dignissim convallis nulla, vitae porta purus fringilla ac. Praesent consectetur ex eu dui efficitur sollicitudin. Mauris libero est, aliquam a diam maximus, dignissim laoreet lacus.</p>\r\n\r\n<p>Nulla ac nisi sodales, auctor dui et, consequat turpis. Cras dolor turpis, sagittis vel elit in, varius elementum arcu. Mauris aliquet lorem ac enim blandit, nec consequat tortor auctor. Sed eget nunc at justo congue mollis eget a urna. Phasellus in mauris quis tortor porta tristique at a risus.</p>\r\n\r\n<p><strong>Best Regards<br />\r\nJohn Doe</strong></p>\r\n', 42, 43, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-08-01 03:10:00', 12),
(8, 34, 'tah', 63, 62, 0, 1, 0, 0, '2016-05-01 00:00:00', NULL, NULL, NULL, '2016-03-21 09:56:52', 10),
(9, 34, 'pakistan', 63, 62, 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2016-03-21 09:57:02', 11),
(10, 34, 'pakistan kkkkk', 63, 62, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-03-21 09:58:41', 12),
(7, 34, 'tah', 63, 62, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-03-21 09:56:28', 17),
(6, 34, 'tah', 63, 62, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-03-21 09:55:51', 17),
(11, 34, 'a', 62, 63, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-04-11 09:45:16', 10),
(12, 70, 'I like this receipe', 64, 61, 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2016-06-06 05:36:31', 18),
(13, 60, 'hi\ndid u get msg?', 61, 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2016-06-06 06:10:04', 19),
(14, 34, 'hi\ndid u ger msg?', 61, 62, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-06-06 14:03:51', 17),
(15, 60, 'hi', 61, 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2016-06-18 18:53:14', 19),
(16, 60, 'can u reply me', 61, 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2016-06-26 17:18:26', 19),
(17, 10029, 'Hi,\ncan you check this message if yes reply me.', 64, 61, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-07-28 04:09:29', 20),
(18, 10022, 'test', 1, 61, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-08-30 13:01:56', 21),
(19, 10022, 'test test', 1, 61, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2016-08-30 13:02:21', 21);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1440392615),
('m130524_201442_init', 1440392618),
('m140506_102106_rbac_init', 1443428445),
('m170610_152817_i18n', 1462110606);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL,
  `letter_content` varchar(800) NOT NULL,
  `name` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `letter_content`, `name`, `date`) VALUES
(2, '<p>taha khan lskjf fklsjf sfjsdf<span style="background-color:#DAA520">kjfhsdf&nbsp; dfigdf<span style="color:#EE82EE">iojfiosa fhfohsdf</span></span><span style="color:#EE82EE">fjosidjfoisjffkjlsk<img alt="lkfjskjhsh" src="https://www.goodui.org/" /></span></p>\r\n', 'Letter 2', '2016-08-10'),
(3, '<p>s;ldfjls fjsf kljsfjslfjiusfkjd fhohsfidh</p>\r\n', 'Letter3', '2015-11-11'),
(4, '<p>kjsfhnjiksfbasihfbis dfusdgfyugdfyui</p>\r\n', 'letter3', '2015-11-10'),
(5, '<p>sjkfh fjhsid fishdf ius hfigs ifgisfgysfyuggsufgdyusgd f</p>\r\n', 'letter4', '2015-11-11'),
(6, '<p>;lkllkjlk</p>\r\n', 'kjklj', '0000-00-00'),
(7, '<p>This is a test letter.</p>\r\n', 'TEST-1', '2016-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscription`
--

CREATE TABLE IF NOT EXISTS `newsletter_subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `key` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_subscription`
--

INSERT INTO `newsletter_subscription` (`id`, `email`, `status`, `key`) VALUES
(3, 'dev.teslavault@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notification`) VALUES
(1, 62, '<p>taha</p>\n'),
(2, 62, '<p>pagal sahi kam kar</p>\n'),
(3, 62, '<p>sdhFjkshjskdf</p>\n'),
(4, 62, '<p>;sjfjkjhsajhk</p>\n'),
(5, 62, '<p>sasdasdasd</p>\n'),
(6, 62, '<p>sdklajkdjhagdjhfhahd</p>\n'),
(7, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(8, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(9, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(10, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(11, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(12, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(13, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(14, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfjkhsjh<strong>lskjfkljsfkhskhfjsh</strong></p>\n'),
(15, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfj</p>\n'),
(16, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfj</p>\n'),
(17, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfj</p>\n'),
(18, 62, '<p>asfjsklfjkshdgsdjfhjksd dfkljhsfj</p>\n'),
(19, 62, '<p>skdfksfjksbjh<strong>kjdnfjkhsfjkgsgsjhfjhsgf<u>ksfjsfsjhvfgshd</u></strong></p>\n'),
(20, 61, '<p><strong>hhfjslndbkdkdndnddk</strong></p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `notification_admin`
--

CREATE TABLE IF NOT EXISTS `notification_admin` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_admin`
--

INSERT INTO `notification_admin` (`id`, `description`, `date`, `status`) VALUES
(1, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=65', '2016-05-30', 1),
(2, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=67', '2016-07-02', 1),
(3, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=68', '2016-08-03', 1),
(4, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=69', '2016-08-03', 1),
(5, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=70', '2016-09-19', 1),
(6, 'Registered new user http://adpost.se/admin/index.php?r=user%2Fupdate&id=71', '2016-09-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `optional_fields`
--

CREATE TABLE IF NOT EXISTS `optional_fields` (
  `id` int(10) NOT NULL,
  `titles` varchar(100) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `display_for_adpost_page` int(11) NOT NULL DEFAULT '1',
  `dd_options` varchar(500) NOT NULL,
  `display_for_screen_page` int(11) NOT NULL DEFAULT '1',
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `website` varchar(120) DEFAULT NULL,
  `logo` longblob NOT NULL,
  `logo_type` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `alias`, `address_line1`, `address_line2`, `phone`, `email`, `website`, `logo`, `logo_type`) VALUES
(1, 'AdPost', 'adpost', 'Karachi', 'Karachi', '123456485', 'test@test.com', 'http://www.adpost.se', 0xffd8ffe000104a46494600010100000100010000fffe003e43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c2064656661756c74207175616c6974790affdb004300080606070605080707070909080a0c140d0c0b0b0c1912130f141d1a1f1e1d1a1c1c20242e2720222c231c1c2837292c30313434341f27393d38323c2e333432ffdb0043010909090c0b0c180d0d1832211c213232323232323232323232323232323232323232323232323232323232323232323232323232323232323232323232323232ffc00011080046005a03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00b70e89a6388e410a0014e50a0392d839cf5edfcea2bcd3b48fb04abf6555c21388d47a647f21581a46b7a8bd959afd9d03055dcd31db9c7739aea6d6de40aada8c71cc253f243032ed2b83f79d9801cf4e7d2a5b8f6335072389bcf07ea9793fda34cb176b6e8afb8007ea781c647e62b9cd4349bcd32f8c37f672c1205dc3cd52370f6cf5e457b4a6ad25a6ae9a545b2d34c6b5dea0a7467dad9639c0c63a74c0a7a8835d866826895ad23da227215c28e7277720f38c819383f9e2d24cd7d85d1e61a42daea10430c16c90cc3fd6caabd7b6063d68d52d174db895e29170e31b07ca54e7fc6ba19ac20b7b876b3f2a09e51848c00a1d81c7d01ea7938e2b92d4fccb9bd061f30a89003b863ea2b292e6d5933a7cb1b3dcab286dd88989600e5bd89e9f862a279a62fe542700f0429eb5a769a60991e4b974863542e1dd7209033b5703939e2a87d86428d7114892c6920560a724120ede3af2475f5a9517ba473f2ea56910b61b6b6dcedde4646077ff00eb7b567b2b1daa0155c601c73c7bd6b40b34179326a168cc11955c4b9023cf404020e78fc39a91a0810007276671c8eb93c56d3bd3b21bd0cbb789ad8b9939623763d07d69ff00681edf9559daceeaeeac50e5980182d8e0fbfa5385a2b80c1add41e429539152ab480eced53c9742b096008f98364fe55b369681b58c4b7b3c56f26f8c153945f3091c96390064609e738e959b0b3a1001aa1e241a8be9b2c96d320842a8640a4bb1dc30062ba9c2ecdd4ec8d4d5db55b0d4a2d1fc412adbddc6852dae8a660ba8fb6ef4efcfb9c8a7c3aadf584d35b4b0c5e6b9dce0e1d5bfda53dea3d1f5a9351f0d45a578c2d24b8d333b639c7faeb46ecca7ae3dbdab2bc4de1ad77c376306a16b7b1eaba28e61bc84e4a29ecc3a81d3db34f47a336528383e92fcfd4ed758b0d162d06d355b7b99249d88cc2645ddb8f3d71d88e9c0e6b2aff57bf9f419fcc8164886df35846865651e9c0e993ef5c9d8eb8f3448f3c2c80fdd9197e53f435a36da8dd0bb4b3b589ae259c968a30c060f7c93d077c9f7a4e924b437c14a9d4abcb5b445bd32f3c33a908e38c2bc84e48980dc0fd1b8fca92f1acfc3bab9d91288e589bcc30f1bd48e981f81c7a8ae47c63a05df8775187ed8d6e97170a65315bb93e5f3df8c0fc091c56347a85e4f3451316949601771e7d319ebed53aa76b1e856586a906a36f91d66a2f6fe2c8e69b4bb478aeed665594c9201b959480e79031b80fa66b0da0b846960b9cac8aaa98618f9871ffd7fc2ac787c5f25d5e9b62b99e030b172305bef0e0f5fbb8c73d6b422b5b96256f5d5f81891492c78e739fc2aab479e27cff2a7a146378a188beff9946e423f4ce7e807b022ab9b2b5662db0f273ccd576e34e58e5e0165cee073dea81d2e0249f3df9ff62b85c1a6354d9dd4657038a260a85677775488162037ca7ea3da83198f6f2a4919e0e6a86bd2bc7a1dce0e188038ed922bd0039ad4f5abed565944724c96ebc6c8890002703711ebefc55ad3b5bd5fc36eb1ce59e1753989b0caea7860c3a1f7a4d0631369a2d9220e66941978c9eb851e838079ad55f0bdd8134535b2a596edf088e78d9e33dc01b8e41ee2975b0fccc9fb5c5637f1dce88cdf66b9cb359373b1b3f7573d473c7ebea76ee7c536f6da2cc96d6514176ec0612308c1c739231d4564bf87ad6d08325cee4593cc64788a100763cfe1c1ef5abe30d52cf58bcb282386cd2d6d2df08f146777df20827a9031803a75aa484d999a55f3788afe696fd4cb3a60a39385550000307a608c8fad477f6e965aa25d46b1a3c5972760c3ed1d48ff007b6fe757b4c4b583479e590c625859806405490bc807d48ed9fceb29d27bbf10a895a3972038439da1460e08ed9a2e0af6d0b56d2c1a7ddcf6d2101addb7c6db319202e07e60e6b51658a47dbbb631e42b0238edd7dab93d46691b53bc91c0f3964558f69e8077cfad686bb1ca9158eae9207564547e082193e5271f80fce95ee68e308a4dbdd1b5244e092003f4aade573f717f2ab16d73f6bb58e61d18671e87bd4d9ff647e5458cae5c46f973557538bed3a7cf0f5665e3ea3914e0fc75a092680393d2ee65b19c88f015f9f9ba039e3e95a5aaf886fa0b3062bd226ce49403681e9c8a8ef6c2e16769ad42fcdc953deb31b4fbdb8b857b85508a72141cd21a3a3d3af266b285ef669249997f7b90a7729e4820823d074ac9d6ae06a1a8c6f0472a948f6fef23daad8e7b1e0f3cf35611240bcf6a428dbb38e7ad1763d0a961e75b43b2594042fb9805ddcff5e956749b58ed679e48c384e157cceb8eb4e446495a44cabb7561c134e67740724e4f27eb4b5b8f4320ec9af250ee132ccdb8fd6ba5babeb5d4341bab68d198db63e676cee0c0fcc3f102b929d40bc70c0f5dcb5a66ecad935b201c8c171e945b5ba25bd2c5dd0f77f65a027a135a596f5aaba7c7e559a2631919356335423da3fb31bed0498b4ff27770a2d7e6db9e99cf5c77c5707e30d223d2f5457b70a905c0deb1af1b4f71f4a28a45b39c2818f34c310e68a28246792b4d36eb451400df240351bdb86e28a280326ff4bf3b0c8fb5c7434b67a4ca4833cca5473b5075a28a623721290a0c06dc09e8d81d38a69724e4f53451401fffd9, 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE IF NOT EXISTS `postcode` (
  `id` int(10) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`id`, `code`) VALUES
(1, 43334);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_deals`
--

CREATE TABLE IF NOT EXISTS `promotion_deals` (
  `id` int(225) NOT NULL,
  `key` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_deals`
--

INSERT INTO `promotion_deals` (`id`, `key`, `title`, `content`) VALUES
(1, 'key_1', 'New Promotion Deals', '<p><strong>Extending this module</strong></p>\r\n\r\n<p><em>This project contains two modules:</em></p>\r\n\r\n<p>Realistic Dummy Content API (realistic_dummy_content_api), which looks inside every enabled module for files which contain images or text, and replaces available fields.</p>\r\n\r\n<p>Realistic Dummy Content (realistic_dummy_content), which replaces user pictures and node article images with portraits and stock photography. You can reproduce the realistic_dummy_content/realistic_dummy_content directory structure in your own modules for better control of the realistic dummy content you want to generate. If you don&#39;t want the example stock images that ship with this module, you can disable Realistic Dummy Content (realistic_dummy_content) and leave Realistic Dummy Content API (realistic_dummy_content_api) enabled.</p>\r\n\r\n<p>Developers can also extend Realistic Dummy Content by implementing hooks defined in api/realistic_dummy_content_api.api.php. Specifically, if you want to be able to define realistic dummy content for a custom field type and the standard technique is not working, you can submit an issue or patch to the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> for this module; but you can also implement the field modifier yourself by looking at Realistic Dummy Content API&#39;s implementation of hook_realistic_dummy_content_attribute_manipulator_alter(), and the classes which are referenced from there.</p>\r\n\r\n<p>Creating recipes</p>\r\n\r\n<p>Often, sites require a set number of entities to be created in a specific sequence. For example, if your site defines schools which have <a href="https://www.drupal.org/project/entityreference" rel="nofollow">entity references</a> to school boards, a realistic scenario may be to generate 3 school boards followed by 20 schools. You can define this type of recipe for your <a href="http://dcycleproject.org/blog/44/what-site-deployment-module" rel="nofollow">site deployment module</a> (or any module), by creating a file called ./sites/*/modules/mymodule/realistic_dummy_content/recipe/mymodule.recipe.inc. <a href="http://cgit.drupalcode.org/realistic_dummy_content/tree/realistic_dummy_content/recipe/realistic_dummy_content.recipe.inc" rel="nofollow">An example is included herein</a>.</p>\r\n\r\n<p>Field meta data</p>\r\n\r\n<p>Some fields have special meta data: body fields can have input formats in addition to body text; image fields can have alt text in addition to the image. This can be achieved using a specific naming scheme, and you will find an example in the enclosed data, which looks like:</p>\r\n\r\n<p>realistic_dummy_content/fields/node/article/<br />\r\n&nbsp; - body/<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt.format.txt<br />\r\n&nbsp;&nbsp;&nbsp; - lorem.txt<br />\r\n- field_image/<br />\r\n&nbsp;&nbsp;&nbsp; - 1.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg.alt.txt</p>\r\n\r\n<p>In the above example, realistic_dummy_content sees two possible body values, <em>one of which with a specific input format</em>; and two possible images, <em>one of which with a specific alt text</em>. Meta data is never compulsory, and in the case where a meta attribute is needed, a reasonable fallback value is used, for example filtered_html will be used if no format is specified for the body.</p>\r\n\r\n<p>Issue queue</p>\r\n\r\n<p>See the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> if you have questions, bug reports or feature requests.</p>\r\n\r\n<p>Docker integration</p>\r\n\r\n<p>To test this module you can run:</p>\r\n\r\n<p>./scripts/test.sh</p>\r\n\r\n<p>To create a development environment, you can run:</p>\r\n\r\n<p>./scripts/dev.sh</p>\r\n\r\n<p>For more information see <a href="http://dcycleproject.org/blog/91/quick-intro-docker-drupal-project" rel="nofollow">A quick intro to Docker for a Drupal project (Dcycle Project, Feb. 18, 2015)</a>. These scripts are meant to be used with <a href="https://www.docker.com" rel="nofollow">Docker</a> and <a href="https://coreos.com" rel="nofollow">CoreOS</a>.</p>\r\n\r\n<p>Continuous integration with Circle CI</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">CircleCI</a> is a continuous integration platform for Drupal projects. In <a href="http://dcycleproject.org/blog/92/continuous-integration-circle-ci-and-docker-your-drupal-project" rel="nofollow">Continuous integration with Circle CI and Docker for your Drupal project (Dcycle project, Feb. 20, 2015)</a>, I documented how and why I set up continuous integration with Circle CI and Docker for Realistic Dummy Content.</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">See CircleCI test results here.</a></p>\r\n'),
(2, 'key_2', 'Packages', '<p><strong>Extending this module</strong></p>\r\n\r\n<p><em>This project contains two modules:</em></p>\r\n\r\n<p>Realistic Dummy Content API (realistic_dummy_content_api), which looks inside every enabled module for files which contain images or text, and replaces available fields.</p>\r\n\r\n<p>Realistic Dummy Content (realistic_dummy_content), which replaces user pictures and node article images with portraits and stock photography. You can reproduce the realistic_dummy_content/realistic_dummy_content directory structure in your own modules for better control of the realistic dummy content you want to generate. If you don&#39;t want the example stock images that ship with this module, you can disable Realistic Dummy Content (realistic_dummy_content) and leave Realistic Dummy Content API (realistic_dummy_content_api) enabled.</p>\r\n\r\n<p>Developers can also extend Realistic Dummy Content by implementing hooks defined in api/realistic_dummy_content_api.api.php. Specifically, if you want to be able to define realistic dummy content for a custom field type and the standard technique is not working, you can submit an issue or patch to the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> for this module; but you can also implement the field modifier yourself by looking at Realistic Dummy Content API&#39;s implementation of hook_realistic_dummy_content_attribute_manipulator_alter(), and the classes which are referenced from there.</p>\r\n\r\n<p>Creating recipes</p>\r\n\r\n<p>Often, sites require a set number of entities to be created in a specific sequence. For example, if your site defines schools which have <a href="https://www.drupal.org/project/entityreference" rel="nofollow">entity references</a> to school boards, a realistic scenario may be to generate 3 school boards followed by 20 schools. You can define this type of recipe for your <a href="http://dcycleproject.org/blog/44/what-site-deployment-module" rel="nofollow">site deployment module</a> (or any module), by creating a file called ./sites/*/modules/mymodule/realistic_dummy_content/recipe/mymodule.recipe.inc. <a href="http://cgit.drupalcode.org/realistic_dummy_content/tree/realistic_dummy_content/recipe/realistic_dummy_content.recipe.inc" rel="nofollow">An example is included herein</a>.</p>\r\n\r\n<p>Field meta data</p>\r\n\r\n<p>Some fields have special meta data: body fields can have input formats in addition to body text; image fields can have alt text in addition to the image. This can be achieved using a specific naming scheme, and you will find an example in the enclosed data, which looks like:</p>\r\n\r\n<p>realistic_dummy_content/fields/node/article/<br />\r\n&nbsp; - body/<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt.format.txt<br />\r\n&nbsp;&nbsp;&nbsp; - lorem.txt<br />\r\n- field_image/<br />\r\n&nbsp;&nbsp;&nbsp; - 1.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg.alt.txt</p>\r\n\r\n<p>In the above example, realistic_dummy_content sees two possible body values, <em>one of which with a specific input format</em>; and two possible images, <em>one of which with a specific alt text</em>. Meta data is never compulsory, and in the case where a meta attribute is needed, a reasonable fallback value is used, for example filtered_html will be used if no format is specified for the body.</p>\r\n\r\n<p>Issue queue</p>\r\n\r\n<p>See the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> if you have questions, bug reports or feature requests.</p>\r\n\r\n<p>Docker integration</p>\r\n\r\n<p>To test this module you can run:</p>\r\n\r\n<p>./scripts/test.sh</p>\r\n\r\n<p>To create a development environment, you can run:</p>\r\n\r\n<p>./scripts/dev.sh</p>\r\n\r\n<p>For more information see <a href="http://dcycleproject.org/blog/91/quick-intro-docker-drupal-project" rel="nofollow">A quick intro to Docker for a Drupal project (Dcycle Project, Feb. 18, 2015)</a>. These scripts are meant to be used with <a href="https://www.docker.com" rel="nofollow">Docker</a> and <a href="https://coreos.com" rel="nofollow">CoreOS</a>.</p>\r\n\r\n<p>Continuous integration with Circle CI</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">CircleCI</a> is a continuous integration platform for Drupal projects. In <a href="http://dcycleproject.org/blog/92/continuous-integration-circle-ci-and-docker-your-drupal-project" rel="nofollow">Continuous integration with Circle CI and Docker for your Drupal project (Dcycle project, Feb. 20, 2015)</a>, I documented how and why I set up continuous integration with Circle CI and Docker for Realistic Dummy Content.</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">See CircleCI test results here.</a></p>\r\n'),
(3, 'key_3', 'Packages For Deal', '<p><strong>Extending this module</strong></p>\r\n\r\n<p><em>This project contains two modules:</em></p>\r\n\r\n<p>Realistic Dummy Content API (realistic_dummy_content_api), which looks inside every enabled module for files which contain images or text, and replaces available fields.</p>\r\n\r\n<p>Realistic Dummy Content (realistic_dummy_content), which replaces user pictures and node article images with portraits and stock photography. You can reproduce the realistic_dummy_content/realistic_dummy_content directory structure in your own modules for better control of the realistic dummy content you want to generate. If you don&#39;t want the example stock images that ship with this module, you can disable Realistic Dummy Content (realistic_dummy_content) and leave Realistic Dummy Content API (realistic_dummy_content_api) enabled.</p>\r\n\r\n<p>Developers can also extend Realistic Dummy Content by implementing hooks defined in api/realistic_dummy_content_api.api.php. Specifically, if you want to be able to define realistic dummy content for a custom field type and the standard technique is not working, you can submit an issue or patch to the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> for this module; but you can also implement the field modifier yourself by looking at Realistic Dummy Content API&#39;s implementation of hook_realistic_dummy_content_attribute_manipulator_alter(), and the classes which are referenced from there.</p>\r\n\r\n<p>Creating recipes</p>\r\n\r\n<p>Often, sites require a set number of entities to be created in a specific sequence. For example, if your site defines schools which have <a href="https://www.drupal.org/project/entityreference" rel="nofollow">entity references</a> to school boards, a realistic scenario may be to generate 3 school boards followed by 20 schools. You can define this type of recipe for your <a href="http://dcycleproject.org/blog/44/what-site-deployment-module" rel="nofollow">site deployment module</a> (or any module), by creating a file called ./sites/*/modules/mymodule/realistic_dummy_content/recipe/mymodule.recipe.inc. <a href="http://cgit.drupalcode.org/realistic_dummy_content/tree/realistic_dummy_content/recipe/realistic_dummy_content.recipe.inc" rel="nofollow">An example is included herein</a>.</p>\r\n\r\n<p>Field meta data</p>\r\n\r\n<p>Some fields have special meta data: body fields can have input formats in addition to body text; image fields can have alt text in addition to the image. This can be achieved using a specific naming scheme, and you will find an example in the enclosed data, which looks like:</p>\r\n\r\n<p>realistic_dummy_content/fields/node/article/<br />\r\n&nbsp; - body/<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt<br />\r\n&nbsp;&nbsp;&nbsp; - ipsum.txt.format.txt<br />\r\n&nbsp;&nbsp;&nbsp; - lorem.txt<br />\r\n- field_image/<br />\r\n&nbsp;&nbsp;&nbsp; - 1.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg<br />\r\n&nbsp;&nbsp;&nbsp; - 2.jpg.alt.txt</p>\r\n\r\n<p>In the above example, realistic_dummy_content sees two possible body values, <em>one of which with a specific input format</em>; and two possible images, <em>one of which with a specific alt text</em>. Meta data is never compulsory, and in the case where a meta attribute is needed, a reasonable fallback value is used, for example filtered_html will be used if no format is specified for the body.</p>\r\n\r\n<p>Issue queue</p>\r\n\r\n<p>See the <a href="https://drupal.org/project/issues/2253941?categories=All" rel="nofollow">issue queue</a> if you have questions, bug reports or feature requests.</p>\r\n\r\n<p>Docker integration</p>\r\n\r\n<p>To test this module you can run:</p>\r\n\r\n<p>./scripts/test.sh</p>\r\n\r\n<p>To create a development environment, you can run:</p>\r\n\r\n<p>./scripts/dev.sh</p>\r\n\r\n<p>For more information see <a href="http://dcycleproject.org/blog/91/quick-intro-docker-drupal-project" rel="nofollow">A quick intro to Docker for a Drupal project (Dcycle Project, Feb. 18, 2015)</a>. These scripts are meant to be used with <a href="https://www.docker.com" rel="nofollow">Docker</a> and <a href="https://coreos.com" rel="nofollow">CoreOS</a>.</p>\r\n\r\n<p>Continuous integration with Circle CI</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">CircleCI</a> is a continuous integration platform for Drupal projects. In <a href="http://dcycleproject.org/blog/92/continuous-integration-circle-ci-and-docker-your-drupal-project" rel="nofollow">Continuous integration with Circle CI and Docker for your Drupal project (Dcycle project, Feb. 20, 2015)</a>, I documented how and why I set up continuous integration with Circle CI and Docker for Realistic Dummy Content.</p>\r\n\r\n<p><a href="https://circleci.com/gh/alberto56/realistic_dummy_content" rel="nofollow">See CircleCI test results here.</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) NOT NULL,
  `country_code` char(2) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `country_code`, `name`, `slug`, `status`) VALUES
(1, '2', 'Akershus', 'akershus', 1),
(2, '2', 'Aust-agder', 'aust-agder', 1),
(3, '2', 'Buskerud', 'buskerud', 1),
(4, '2', 'Finnmark', 'finnmark', 1),
(5, '2', 'Hedmark', 'hedmark', 1),
(6, '2', 'Hordaland', 'Hordaland', 1),
(7, '2', 'Møre og Romsdal', 'Møre og Romsdal', 1),
(8, '2', 'Nordland', 'nordland', 1),
(9, '2', 'Nord-trøndelag', 'Nord-Trøndelag', 1),
(10, '2', 'Oppland', 'oppland', 1),
(11, '2', 'Oslo', 'Oslo', 1),
(12, '2', 'Østfold', 'Østfold', 1),
(13, '2', 'Rogaland', 'Rogaland', 1),
(14, '2', 'Sogn og Fjordane', 'Sogn og Fjordane', 1),
(15, '2', 'Sør-trøndelag', 'Sør-Trøndelag', 1),
(16, '2', 'Telemark', 'Telemark', 1),
(17, '2', 'Troms', 'Troms', 1),
(18, '2', 'Vest-agder', 'Vest-Agder', 1),
(19, '2', 'Vestfold', 'Vestfold', 1),
(20, '2', 'Svalbard', 'Svalbard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_user`
--

CREATE TABLE IF NOT EXISTS `tmp_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(112) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(112) NOT NULL,
  `v_code` int(11) NOT NULL,
  `status` smallint(6) DEFAULT '10',
  `is_company` int(11) NOT NULL,
  `sms_verify` int(11) DEFAULT NULL,
  `email_verify` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `com_url` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_user`
--

INSERT INTO `tmp_user` (`id`, `username`, `name`, `auth_key`, `password_hash`, `email`, `mobile`, `v_code`, `status`, `is_company`, `sms_verify`, `email_verify`, `created_at`, `updated_at`, `com_url`) VALUES
(45, 'nazeeraashique2002@gmail.com', '', NULL, '123456', 'nazeeraashique2002@gmail.com', '03453130776', 3983, 10, 0, NULL, NULL, 15, NULL, ''),
(52, 'test@test.com', '', NULL, '123456', 'test@test.com', '03412372361', 7399, 10, 0, NULL, NULL, 16, NULL, ''),
(46, 'yarsas@hotmail.com', '', NULL, '123456', 'yarsas@hotmail.com', '47177477', 7919, 10, 0, NULL, NULL, 15, NULL, ''),
(48, 'taha@yahoo.com', '', NULL, '123456', 'taha@yahoo.com', '03155923218', 4797, 10, 0, NULL, NULL, 16, NULL, ''),
(49, 'dev.teslavault@gmail.com', '', NULL, 'present123', 'dev.teslavault@gmail.com', '03452087084', 1079, 10, 0, NULL, NULL, 16, NULL, ''),
(50, 'taha_khan198923@yahoo.com', '', NULL, '123456', 'taha_khan198923@yahoo.com', '03150208667', 5043, 10, 0, NULL, NULL, 16, NULL, ''),
(51, 'mobilemaster55@gmail.com', '', NULL, '123456', 'mobilemaster55@gmail.com', '91255177', 4595, 10, 1, NULL, NULL, 16, NULL, ''),
(53, 'khurramgfx@gmail.com', '', NULL, 'pakistan786', 'khurramgfx@gmail.com', '03137738278', 8195, 10, 0, NULL, NULL, 16, NULL, ''),
(54, 'com2@yahoo.com', '', NULL, '123456', 'com2@yahoo.com', '12345678', 9060, 10, 1, NULL, NULL, 16, NULL, 'www.com2.com'),
(55, 'com3@yahoo.com', '', NULL, '123456', 'com3@yahoo.com', '123456', 9029, 10, 1, NULL, NULL, 16, NULL, 'com3@yahoo.com'),
(56, 'abraizkhan94@gmail.com', '', NULL, '090078601', 'abraizkhan94@gmail.com', '03142394107', 7828, 10, 0, NULL, NULL, 16, NULL, ''),
(57, 'jhellmill@gmail.com', '', NULL, 'paklove123', 'jhellmill@gmail.com', '03452219412', 4390, 10, 0, NULL, NULL, 16, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(112) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(112) NOT NULL,
  `sms_verify` int(11) NOT NULL,
  `state` int(112) NOT NULL,
  `city` int(11) NOT NULL,
  `status` smallint(6) DEFAULT '10',
  `address` varchar(255) NOT NULL,
  `is_company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  `com_url` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `mobile`, `sms_verify`, `state`, `city`, `status`, `address`, `is_company`, `created_at`, `updated_at`, `img`, `com_url`) VALUES
(1, 'admin', 'Muhammad Imran', 'gBH_Zf8YMObcD2MlGxm82qJFYGhtYcr9', '$2y$13$rH4EwEmf..t6D/7D0gZWm.Y7LB6YawxCjHKey8sFKccp4.DjeBmXy', 'ol4zOOwg7U_NSeZeGFORKz3b1H_slcip_1464858282', 'pm@webexdesigners.com', '+923453130776', 1, 2, 24, 10, 'House # B-7 Block-4 Gulshan e Iqbal', 0, '2015-09-05 23:53:02', '0000-00-00 00:00:00', 'jpg', 'www.msn.com'),
(61, 'yarsas@hotmail.com', 'shahvez', NULL, '$2y$13$cq/tvkr69bpaB27HhZMM8uC2lrIYm2wVOm.NC./iGWVN6IKA6l/sK', NULL, 'yarsas@hotmail.com', '47177477', 1, 1, 18, 10, 'Granbergstubben 19', 0, NULL, NULL, '', ''),
(62, 'jawadkhan.it@gmail.com', 'Jawad', 'gBH_Zf8YMObcD2MlGxm82qJFYGhtYcr9', '$2y$13$rH4EwEmf..t6D/7D0gZWm.Y7LB6YawxCjHKey8sFKccp4.DjeBmXy', 'ol4zOOwg7U_NSeZeGFORKz3b1H_slcip_1464858282', 'jawadkhan.it@gmail.com', '03412372360', 1, 17, 405, 0, '', 0, '2016-05-29 03:23:56', '2016-05-29 03:23:56', '', ''),
(60, 'nazeeraashique2002@gmail.com', '', '', '$2y$13$vqKW3Rgj36Zbh9sGoHr79.u9ipen117y9IHmXQJ2AP9SmUCXe56qO', '', 'nazeeraashique2002@gmail.com', '03453130776', 1, 0, 0, 1, '', 0, '2016-05-29 03:27:02', '2016-05-29 03:27:02', '', ''),
(63, 'taha@yahoo.com', 'taha', NULL, '$2y$13$CWQkabeFNcUK5lwBdlZaS.a/07AImfWpjxyXtdGnswt2xqjUsCG0a', NULL, 'taha@yahoo.com', '03155923218', 1, 0, 0, 10, '', 0, NULL, NULL, '', ''),
(64, 'dev.teslavault@gmail.com', 'Abdul Quddus', NULL, '$2y$13$YcCu9Or5bl0meXS/5CxdH.R1k/QJg1xTgBJgeQSYQxldWGmiqeN8G', NULL, 'dev.teslavault@gmail.com', '03452087084', 0, 7, 142, 10, '', 0, NULL, NULL, 'jpg', ''),
(65, 'taha_khan198923@yahoo.com', '', NULL, '$2y$13$W90N1g7.w8UlhJNhOhlvyOCnSM2JdK/4y3uhmGcYj8KKnfPRbeKTC', NULL, 'taha_khan198923@yahoo.com', '03150208667', 0, 0, 0, 10, '', 0, NULL, '0000-00-00 00:00:00', '', ''),
(67, 'test@test.com', '', NULL, '$2y$13$24ZxlOBy0pM5hGgqX0f/FOKnaipPCTJhYNsyjcESg5bygjgEiJAzi', NULL, 'test@test.com', '03412372361', 0, 0, 0, 10, '', 0, NULL, NULL, '', ''),
(72, 'jhellmill@gmail.com', '', NULL, '$2y$13$AkWNMaUfHO1kofWX4SpsuehKPx0ABCBbtbJPKwKZ3LNZKyhMTJaaO', NULL, 'jhellmill@gmail.com', '03452219412', 2264, 0, 0, 10, '', 0, NULL, '0000-00-00 00:00:00', '', ''),
(70, 'com2@yahoo.com', '', NULL, '$2y$13$giXxzgXSYmuW7ssD/QpqpOmlCgZQT0JnmimStx9yg/sgUm4c1PLyq', NULL, 'com2@yahoo.com', '12345678', 0, 1, 1, 10, '', 1, NULL, NULL, '', 'see'),
(71, 'com3@yahoo.com', '', NULL, '$2y$13$kvraT1ACu9uu1HAPZ0fo7uzgb95FxSopJV.jZRXT/lrU7GlNnWqbm', NULL, 'com3@yahoo.com', '123456', 0, 1, 1, 10, '', 1, NULL, NULL, '', 'http://adpost.se/index.php?r=site%2Fsubmitad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_credit`
--
ALTER TABLE `ads_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertise_additional_fields`
--
ALTER TABLE `advertise_additional_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catetory_additional_fields_fk0` (`advertise_id`);

--
-- Indexes for table `advertise_comment`
--
ALTER TABLE `advertise_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertise_comment_fk0` (`advertise_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_additional_fields`
--
ALTER TABLE `category_additional_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catetory_additional_fields_fk0` (`category_id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercial_ads`
--
ALTER TABLE `commercial_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercial_search_ads`
--
ALTER TABLE `commercial_search_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conv_status`
--
ALTER TABLE `conv_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_fk0` (`code`);

--
-- Indexes for table `credits_details`
--
ALTER TABLE `credits_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits_expense`
--
ALTER TABLE `credits_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_packages`
--
ALTER TABLE `credit_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter_name`
--
ALTER TABLE `filter_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_additional_values`
--
ALTER TABLE `form_additional_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n_message`
--
ALTER TABLE `i18n_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `i18n_translation`
--
ALTER TABLE `i18n_translation`
  ADD PRIMARY KEY (`message_id`,`language`),
  ADD KEY `fk_i18n_translation_translator` (`translator_id`),
  ADD KEY `ix_i18n_translation_status` (`status`);

--
-- Indexes for table `i18n_translator`
--
ALTER TABLE `i18n_translator`
  ADD PRIMARY KEY (`translator_id`),
  ADD UNIQUE KEY `ix_i18n_translator_class_name` (`class_name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_admin`
--
ALTER TABLE `notification_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optional_fields`
--
ALTER TABLE `optional_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_deals`
--
ALTER TABLE `promotion_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_fk1` (`country_code`);

--
-- Indexes for table `tmp_user`
--
ALTER TABLE `tmp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `ads_credit`
--
ALTER TABLE `ads_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `advertise_additional_fields`
--
ALTER TABLE `advertise_additional_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertise_comment`
--
ALTER TABLE `advertise_comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=379;
--
-- AUTO_INCREMENT for table `category_additional_fields`
--
ALTER TABLE `category_additional_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=464;
--
-- AUTO_INCREMENT for table `commercial_ads`
--
ALTER TABLE `commercial_ads`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `commercial_search_ads`
--
ALTER TABLE `commercial_search_ads`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `conv_status`
--
ALTER TABLE `conv_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credits_details`
--
ALTER TABLE `credits_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credits_expense`
--
ALTER TABLE `credits_expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `credit_packages`
--
ALTER TABLE `credit_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `filter_name`
--
ALTER TABLE `filter_name`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1593;
--
-- AUTO_INCREMENT for table `form_additional_values`
--
ALTER TABLE `form_additional_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=433;
--
-- AUTO_INCREMENT for table `i18n_message`
--
ALTER TABLE `i18n_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `i18n_translator`
--
ALTER TABLE `i18n_translator`
  MODIFY `translator_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=398;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `optional_fields`
--
ALTER TABLE `optional_fields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `postcode`
--
ALTER TABLE `postcode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `promotion_deals`
--
ALTER TABLE `promotion_deals`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tmp_user`
--
ALTER TABLE `tmp_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `i18n_translation`
--
ALTER TABLE `i18n_translation`
  ADD CONSTRAINT `fk_i18n_translation_message` FOREIGN KEY (`message_id`) REFERENCES `i18n_message` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_i18n_translation_translator` FOREIGN KEY (`translator_id`) REFERENCES `i18n_translator` (`translator_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
