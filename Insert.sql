INSERT INTO `atsiliepimas` (`komentaras`, `įvertinimas`, `data`, `id_ATSILIEPIMAS`, `fk_KLIENTASasmens_kodas`, `fk_PREKEid`) VALUES
('Labai gražus žiedas, puikiai tinka mano kolekcijai!', 5, '2025-01-15', 1, '38901256478', '1'),
('Puiki kokybė, rekomenduoju!', 5, '2025-01-20', 2, '48703121234', '3'),
('Auskarai atrodo gerai, bet galėtų būti geresnės kokybės.', 4, '2025-01-30', 4, '47811232145', '4'),
('Nuostabūs gintaro karoliai, tikras lietuviškas grožis!', 5, '2025-02-05', 5, '39107127856', '6'),
('Žiedas puikus, bet truputį per brangus.', 4, '2025-02-10', 6, '49202019876', '7'),
('Apyrankė patogi nešioti, atrodo solidžiai.', 5, '2025-02-15', 7, '38605142587', '8'),
('Elegantiškas koljė, gavau daug komplimentų!', 5, '2025-02-20', 8, '48708051472', '9'),
('Pakabukas gražus, bet grandinėlė silpnoka.', 3, '2025-02-25', 9, '39204011452', '10'),
('Laikrodis tiesiog pribloškiantis, verta kiekvieno euro!', 5, '2025-03-01', 10, '49506271002', '11'),
('Auskarai puikiai tinka kasdieniam nešiojimui.', 4, '2025-03-05', 11, '38808091586', '12'),
('Žiedas su safyru atrodo prabangiai. Esu labai patenkinta.', 5, '2025-03-10', 12, '47910122541', '14'),
('Apyrankė šiek tiek per didelė, bet labai graži.', 4, '2025-03-15', 13, '38712074569', '15'),
('Pakabuko kokybė puiki, bet dizainas galėtų būti įdomesnis.', 3, '2025-03-20', 14, '49109106325', '16'),
('Vestuviniai žiedai nuostabūs, abu esame labai patenkinti!', 5, '2025-03-25', 15, '39402152589', '17'),
('Auskarai labai subtilūs ir elegantiški, rekomenduoju.', 5, '2025-03-30', 16, '48501092365', '18'),
('Sąsagos puikiai tinka prie mano kostiumo. Ačiū!', 5, '2025-04-05', 17, '39306257412', '19'),
('Laikrodis atrodo prabangiai, bet eiga šiek tiek skiriasi.', 4, '2025-04-10', 18, '49803254178', '20'),
('Sagė labai graži, bet sagtukas galėtų būti stipresnis.', 4, '2025-04-15', 19, '39001045268', '21'),
('Kaklo papuošalas subtilus ir elegantiškas.', 5, '2025-04-20', 20, '48602064721', '22'),
('Žiedas su perlu nuostabus, tikras grožis.', 5, '2025-01-16', 21, '38705124563', '23'),
('Odinė apyrankė labai patogi nešioti.', 4, '2025-01-21', 22, '47809091472', '24'),
('Vestuvinis žiedas puikiai pritaikytas, labai patogus.', 5, '2025-01-26', 23, '39207126398', '25'),
('Nuostabus laikrodis, veikia tiksliai.', 5, '2025-01-31', 24, '48104261495', '26'),
('Pakabukas mažesnis nei tikėjausi, bet kokybiškas.', 4, '2025-02-06', 25, '39403157689', '27'),
('Auskarai su rubinais atrodo prabangiai.', 5, '2025-02-11', 26, '49012215632', '28'),
('Gintarinė apyrankė nuostabi, tikra Lietuvos vertybė.', 5, '2025-02-16', 27, '38809215487', '29'),
('Žiedas \"Banga\" labai originalus.', 4, '2025-02-21', 28, '48506174563', '30'),
('Grandinėlė su kryželiu subtili ir elegantiška.', 5, '2025-02-26', 29, '38911122514', '31'),
('Laikrodis Tank tiesiog nuostabus, verta investicija.', 5, '2025-03-02', 30, '47704042569', '32'),
('Vestuviniai žiedai atitiko visus lūkesčius. Tobulas pasirinkimas!', 5, '2025-03-07', 31, '39509157894', '33'),
('Labai elegantiški auskarai, puikiai tinka prie vakarinės aprangos.', 5, '2025-03-12', 32, '48602281234', '34'),
('Apyrankė tvirta ir graži, bet kabutis kartais atsikabina.', 3, '2025-03-17', 33, '39108121234', '35');



INSERT INTO `gamintojas` (`gamintojo_id`, `pavadinimas`, `salis`, `kontaktai`) VALUES
(1, 'Amber Baltic', 'Lietuva', 'info@amberbaltic.lt, +37065212345'),
(2, 'Tiffany & Co.', 'JAV', 'contact@tiffany.com, +12125558734'),
(3, 'Cartier', 'Prancūzija', 'info@cartier.fr, +33144131400'),
(4, 'Rolex SA', 'Šveicarija', 'service@rolex.ch, +41229950505'),
(5, 'Pandora', 'Danija', 'customer@pandora.dk, +4543506500'),
(6, 'Swarovski', 'Austrija', 'service@swarovski.at, +43512012345'),
(7, 'Gintaro Namai', 'Lietuva', 'info@gintaronamai.lt, +37063098765'),
(8, 'Baltic Gold', 'Latvija', 'sales@balticgold.lv, +37129876543'),
(9, 'Nordic Silver', 'Švedija', 'info@nordicsilver.se, +46812345678'),
(10, 'Chopard', 'Šveicarija', 'info@chopard.ch, +41218099800');



INSERT INTO `kategorija` (`pavadinimas`, `aprasymas`, `id_KATEGORIJA`) VALUES
('Žiedai', 'Įvairūs žiedai', 1),
('Apyrankės', 'Elegantiškos apyrankės', 2),
('Auskarai', 'Puošnūs auskarai', 3),
('Grandinėlės', 'Grandinėlės ir pakabučiai', 4),
('Laikrodžiai', 'Prabangūs rankiniai laikrodžiai', 5),
('Pakabukai', 'Įvairūs pakabukai', 6),
('Aksesuarai', 'Papildomi juvelyrikos aksesuarai', 7),
('Vestuviniai žiedai', 'Specialūs vestuviniai žiedai', 8),
('Akiniai nuo saulės', 'Protec ', 9);



INSERT INTO `klientas` (`asmens_kodas`, `vardas_pavardė`, `elpastas`, `telefonas`, `adresas`, `tipas`) VALUES
('38506081472', 'Sandra Sandraitė', 'sandra@yahoo.com', '+37063789012', 'Aušros g. 12, Šiauliai', 1),
('38605142587', 'Marius Mariunas', 'marius@gmail.com', '+37067890123', 'Laisvės pr. 45-15, Vilnius', 1),
('38705124563', 'Danielius Danielaitis', 'danielius@gmail.com', '+37061234567', 'Verkių g. 10, Vilnius', 2),
('38710056921', 'Benas Benaitis', 'benas@yahoo.com', '+37062567890', 'Islandijos pl. 32, Kaunas', 1),
('38712074569', 'Mantas Mantaitis', 'mantas@gmail.com', '+37060456789', 'Basanavičiaus g. 15, Birštonas', 1),
('38806146258', 'Liepa Liepaitė', 'liepa@gmail.com', '+37062901234', 'M. K. Čiurlionio g. 16, Druskininkai', 2),
('38808091586', 'Lukas Lukaitis', 'lukas@yahoo.com', '+37060234567', 'Vytauto g. 87, Druskininkai', 1),
('38809215487', 'Paulius Paulaitis', 'paulius@gmail.com', '+37061890123', 'Maironio g. 10, Kėdainiai', 2),
('38812035478', 'Adomas Adomaitis', 'adomas@gmail.com', '+37064234567', 'Smetonos g. 5, Panevėžys', 1),
('38901256478', 'Jonas Jonaitis', 'jonas@gmail.com', '+37061234567', 'Vilniaus g. 15-2, Vilnius', 1);



INSERT INTO `kliento_tipas` (`id_kliento_tipas`, `name`) VALUES
(1, 'Paprasta'),
(2, 'VIP');



INSERT INTO `mokejimas` (`mokejimo_id`, `suma`, `data`, `busena`, `mokejimo_budas`) VALUES
('M001', 129.99, '2025-01-05', 2, 2),
('M002', 179.98, '2025-01-07', 2, 3),
('M003', 899.99, '2025-01-10', 2, 2),
('M004', 59.99, '2025-01-12', 2, 1),
('M005', 149.99, '2025-01-15', 2, 2),
('M006', 1499.99, '2025-01-18', 2, 3),
('M007', 79.99, '2025-01-20', 2, 4),
('M008', 245.98, '2025-01-23', 2, 2),
('M009', 45.99, '2025-01-25', 2, 1),
('M010', 1299.99, '2025-01-28', 2, 3);



INSERT INTO `mokejimo_budas` (`id_mokejimo_budas`, `name`) VALUES
(1, 'Grynais'),
(2, 'Kreditine korte'),
(3, 'Banko pavedimu'),
(4, 'Paypal');



INSERT INTO `mokejimo_busena` (`id_mokejimo_busena`, `name`) VALUES
(1, 'Laukiamas'),
(2, 'Atliktas'),
(3, 'Atšauktas');



INSERT INTO `preke` (`id`, `pavadinimas`, `aprasymas`, `kaina`, `svoris`, `medziaga`, `fk_GAMINTOJASgamintojo_id`, `fk_KATEGORIJAid_KATEGORIJA`) VALUES
(1, 'Gintarinis žiedas \"Baltija\"', 'Rankų darbo žiedas su Baltijos gintaru', 129.99, 5.2, 'Sidabras, gintaras', '1', 1),
(3, 'Sidabrinė apyrankė \"Vilnius\"', 'Elegantiska apyrankė su Vilniaus simbolika', 89.99, 15.7, 'Sidabras 925', '7', 2),
(4, 'Auskarai \"Žvaigždutės\"', 'Auskarai su žvaigždės formos kristalais', 59.99, 2.1, 'Sidabras, Swarovski kristalai', '6', 3),
(5, 'Rolex Submariner', 'Klasikinis Rolex Submariner laikrodis', 9999.99, 152, 'Nerūdijantis plienas, safyro stiklas', '4', 5),
(6, 'Gintaro karoliai \"Palanga\"', 'Natūralaus gintaro karoliai', 149.99, 23.5, 'Gintaras, sidabras', '7', 4),
(7, 'Sužadėtuvių žiedas \"Deimantė\"', 'Žiedas su vienu centrine deimantu', 1499.99, 4.8, 'Baltas auksas, deimantas', '2', 1),
(8, 'Vyriška apyrankė \"Stiprybė\"', 'Odinė apyrankė su sidabrinėmis detalėmis', 79.99, 18.3, 'Oda, sidabras', '8', 2),
(9, 'Koljė \"Šviesa\"', 'Elegantiškas koljė su kristalais', 199.99, 8.7, 'Sidabras, cirkoniai', '6', 4),
(10, 'Pandora pakabukas \"Širdis\"', 'Širdies formos pakabukas', 45.99, 1.5, 'Sidabras 925', '5', 6),
(11, 'Auksinis laikrodis \"Klasika\"', 'Vyriškas klasikinis laikrodis', 1299.99, 85, 'Auksas, oda', '10', 5),
(12, 'Gintariniai auskarai \"Lašai\"', 'Auskarai su gintaro lašeliais', 65.99, 2.3, 'Sidabras, gintaras', '1', 3),
(13, 'Sidabrinė grandinėlė', 'Plona sidabrinė grandinėlė', 35.99, 3.2, 'Sidabras 925', '9', 4),
(14, 'Žiedas su safyru', 'Prabangus žiedas su mėlynu safyru', 899.99, 5.5, 'Baltas auksas, safyras', '3', 1),
(15, 'Tiffany apyrankė \"Infinity\"', 'Apyrankė su begalybės simboliu', 299.99, 7.8, 'Sidabras 925', '2', 2),
(16, 'Pakabukas \"Medis\"', 'Gyvybės medžio pakabukas', 49.99, 2.5, 'Sidabras, cirkoniai', '5', 6),
(17, 'Vestuvinių žiedų komplektas', 'Vestuvinių žiedų pora su graviruote', 799.99, 10, 'Raudonas auksas', '3', 8),
(18, 'Swarovski kristalų auskarai', 'Elegantišti auskarai su kristalais', 79.99, 1.8, 'Sidabras, Swarovski kristalai', '6', 3),
(19, 'Vyriškos sąsagos \"Klasika\"', 'Klasikinės sidabrinės sąsagos', 89.99, 12.5, 'Sidabras 925', '9', 7),
(20, 'Chopard laikrodis \"Happy\"', 'Moteriškas laikrodis su judančiais deimantais', 5999.99, 45, 'Auksas, deimantai', '10', 5),
(21, 'Gintarinė sagė \"Saulė\"', 'Sagė su gintaro akcentais', 69.99, 8.2, 'Gintaras, žalvaris', '7', 7),
(22, 'Sidabrinė kaklo papuošalas', 'Minimalistinis kaklo papuošalas', 59.99, 5.1, 'Sidabras 925', '8', 4),
(23, 'Žiedas su perlais', 'Elegantiškas žiedas su baltu perlu', 349.99, 4.5, 'Baltas auksas, perlas', '2', 1),
(24, 'Odinė apyrankė \"Nordic\"', 'Skandinaviško stiliaus odinė apyrankė', 59.99, 9.3, 'Oda, nerūdijantis plienas', '9', 2),
(25, 'Vestuvinis žiedas vyrams', 'Minimalistinis vestuvinis žiedas', 399.99, 6.5, 'Titanas', '3', 8),
(26, 'Rolex Datejust', 'Klasikinis Rolex laikrodis', 7999.99, 130, 'Auksas, nerūdijantis plienas', '4', 5),
(27, 'Pakabukas \"Angelas\"', 'Angelo formos pakabukas', 39.99, 1.3, 'Sidabras, cirkoniai', '5', 6),
(28, 'Auskarai su rubinais', 'Elegantiški auskarai su rubinais', 599.99, 2.5, 'Baltas auksas, rubinai', '10', 3),
(29, 'Gintarinė apyrankė \"Daina\"', 'Apyrankė su įvairių spalvų gintaru', 129.99, 16.8, 'Gintaras, sidabras', '1', 2),
(30, 'Sidabrinis žiedas \"Banga\"', 'Žiedas su bangos ornamentu', 79.99, 4.2, 'Sidabras 925', '7', 1),
(31, 'Grandinėlė su kryželiu', 'Subtili grandinėlė su kryželiu', 89.99, 4.5, 'Sidabras 925', '9', 4),
(32, 'Cartier laikrodis \"Tank\"', 'Klasikinis kvadratinis laikrodis', 4999.99, 65, 'Auksas, oda', '3', 5),
(33, 'Vestuvinių žiedų pora \"Meilė\"', 'Vestuviniai žiedai su išgraviruota širdimi', 699.99, 9.5, 'Rožinis auksas', '2', 8),
(34, 'Sidabriniai auskarai \"Lapai\"', 'Auskarai lapo formos', 49.99, 1.9, 'Sidabras 925', '8', 3),
(35, 'Pandora apyrankė', 'Apyrankė su 3 pakabukais', 129.99, 13.5, 'Sidabras 925', '5', 2),
(36, 'Žiedas su smaragdu', 'Elegantiškas žiedas su smaragdu', 799.99, 5, 'Baltas auksas, smaragdas', '10', 1),
(37, 'Pakabukas \"Mėnulis\"', 'Mėnulio formos pakabukas', 42.99, 1.4, 'Sidabras, cirkoniai', '6', 6),
(38, 'Baltic Gold grandinėlė', 'Stotelių tipo grandinėlė', 199.99, 7.5, 'Auksas 585', '8', 4),
(39, 'Aksesuaras plaukams', 'Plaukų segtukas su kristalais', 29.99, 3.8, 'Metalas, Swarovski kristalai', '6', 7),
(40, 'Vestuvinis žiedas moterims', 'Elegantiškas vestuvinis žiedas su akcentais', 349.99, 4, 'Baltas auksas, cirkoniai', '3', 8),
(41, 'Auksinis pakabukas \"Raidė A\"', 'Pakabukas su raide', 149.99, 1.8, 'Auksas 585', '2', 6),
(42, 'Sidabrinė apyrankė \"Jūra\"', 'Apyrankė su jūros tematika', 99.99, 14.2, 'Sidabras 925', '1', 2),
(43, 'Nordic Silver žiedas', 'Minimalistinis Skandinaviško stiliaus žiedas', 69.99, 3.5, 'Sidabras 925', '9', 1),
(44, 'Auskarai \"Žalvaris\"', 'Etniški auskarai iš žalvario', 39.99, 3.2, 'Žalvaris', '7', 3),
(45, 'Tiffany koljė', 'Koljė su širdele', 349.99, 5.7, 'Sidabras 925', '2', 4),
(46, 'Swarovski kristalas', 'Kolekcinis kristalas', 159.99, 85, 'Kristalinis stiklas', '6', 7),
(47, 'Vyriška grandinėlė', 'Stora vyriška grandinėlė', 259.99, 25.3, 'Sidabras 925', '8', 4),
(48, 'Moteriškas laikrodis \"Rose\"', 'Moteriškas laikrodis rožinio aukso spalvos', 399.99, 40, 'Rožinis auksas, safyro stiklas', '10', 5),
(49, 'Sidabriniai auskarai \"Klasika\"', 'Klasikiniai auskarai', 45.99, 1.5, 'Sidabras 925', '9', 3),
(50, 'Vyriškas žiedas \"Titanas\"', 'Minimalistinis vyriškas žiedas', 129.99, 7.5, 'Titanas, sidabras', '3', 1),
(51, 'Gintaro segė \"Laumė\"', 'Elegantiška segė su gintaru', 119.99, 6.8, 'Gintaras, sidabras', '1', 7),
(52, 'Vaikiškas laikrodis \"Dinozauras\"', 'Linksmas vaikiškas laikrodis', 39.99, 25, 'Plastikas, nerūdijantis plienas', '6', 5),
(53, 'Sidabrinis žiedas \"Infinity\"', 'Žiedas su begalybės simboliu', 65.99, 3.2, 'Sidabras 925', '5', 1),
(54, 'Apyrankė su gėle', 'Elegantiška apyrankė su gėlės motyvu', 75.99, 10.3, 'Sidabras, emalė', '9', 2),
(55, 'Auskarai \"Drugeliai\"', 'Auskarai drugelių formos', 49.99, 1.8, 'Sidabras, cirkoniai', '6', 3),
(56, 'Super gucci belt', 'gocci drip fams', 50, 12, 'blood', '9', 0),
(57, 'testas', '', 1, 1, '', '1', 5),
(58, 'UwU', '', 12, 12, '', '6', 8),
(60, 'Evelina', 'siandien sveriaus', 1e27, 55.5, 'blood', '4', 8);



INSERT INTO `pristatymas` (`data`, `pristatymo_budas`, `statusas`, `id_PRISTATYMAS`) VALUES
('2025-01-07', 1, 3, 1),
('2025-01-09', 2, 3, 2),
('2025-01-12', 1, 3, 3),
('2025-01-14', 3, 3, 4),
('2025-01-17', 1, 3, 5),
('2025-01-20', 2, 3, 6),
('2025-01-22', 1, 3, 7),
('2025-01-25', 2, 3, 8),
('2025-01-27', 3, 3, 9),
('2025-01-30', 1, 3, 10);



INSERT INTO `pristatymo_budas` (`id_pristatymo_budas`, `name`) VALUES
(1, 'Kurjeriu'),
(2, 'Paštomatu'),
(3, 'Atsiėmimas parduotuvėje');



INSERT INTO `pristatymo_statusas` (`id_pristatymo_statusas`, `name`) VALUES
(1, 'Ruošiamas'),
(2, 'Išsiųstas'),
(3, 'Pristatytas'),
(4, 'Atšauktas');



INSERT INTO `sandelis` (`sandelio_id`, `pavadinimas`, `adresas`) VALUES
('S001', 'Pagrindinis sandėlis', 'Vilniaus g. 123, Vilnius'),
('S002', 'Kauno filialas', 'Laisvės al. 45, Kaunas'),
('S003', 'Klaipėdos sandėlis', 'Taikos pr. 78, Klaipėda');



INSERT INTO `sandeliuojama_preke` (`kiekis`, `id_SANDELIUOJAMA_PREKE`, `fk_SANDELISsandelio_id`, `fk_PREKEid`) VALUES
(15, 1, 'S001', '1'),
(20, 3, 'S001', '3'),
(25, 4, 'S001', '4'),
(5, 5, 'S001', '5'),
(12, 6, 'S001', '6'),
(7, 7, 'S001', '7'),
(18, 8, 'S001', '8'),
(10, 9, 'S001', '9'),
(30, 10, 'S001', '10'),
(3, 11, 'S001', '11'),
(15, 12, 'S001', '12'),
(40, 13, 'S001', '13'),
(6, 14, 'S001', '14'),
(12, 15, 'S001', '15'),
(25, 16, 'S001', '16'),
(10, 17, 'S001', '17'),
(18, 18, 'S001', '18'),
(15, 19, 'S001', '19'),
(2, 20, 'S001', '20'),
(9, 21, 'S002', '21'),
(14, 22, 'S002', '22'),
(11, 23, 'S002', '23'),
(25, 24, 'S002', '24'),
(13, 25, 'S002', '25'),
(4, 26, 'S002', '26'),
(22, 27, 'S002', '27'),
(7, 28, 'S002', '28'),
(15, 29, 'S002', '29'),
(19, 30, 'S002', '30'),
(27, 31, 'S002', '31'),
(3, 32, 'S002', '32'),
(16, 33, 'S002', '33'),
(20, 34, 'S002', '34'),
(8, 35, 'S002', '35'),
(4, 36, 'S002', '36'),
(30, 37, 'S002', '37'),
(12, 38, 'S002', '38'),
(23, 39, 'S002', '39'),
(15, 40, 'S002', '40'),
(18, 41, 'S003', '41'),
(11, 42, 'S003', '42'),
(24, 43, 'S003', '43'),
(30, 44, 'S003', '44'),
(9, 45, 'S003', '45'),
(5, 46, 'S003', '46'),
(7, 47, 'S003', '47'),
(10, 48, 'S003', '48'),
(25, 49, 'S003', '49'),
(14, 50, 'S003', '50'),
(12, 51, 'S003', '51'),
(20, 52, 'S003', '52'),
(17, 53, 'S003', '53'),
(15, 54, 'S003', '54'),
(22, 55, 'S003', '55'),
(34, 56, 'S002', '56'),
(100, 57, 'S001', '57'),
(200, 58, 'S002', '57'),
(333, 59, 'S003', '58'),
(99999, 63, 'S001', '60'),
(1, 64, 'S002', '60'),
(28, 65, 'S003', '60');



INSERT INTO `uzsakymas` (`nr`, `data`, `kaina`, `busena`, `fk_PRISTATYMASid_PRISTATYMAS`, `fk_KLIENTASasmens_kodas`, `fk_MOKEJIMASmokejimo_id`) VALUES
(1, '2025-01-05', 129.99, 3, 1, '38901256478', 'M001'),
(2, '2025-01-07', 179.98, 3, 2, '48703121234', 'M002'),
(3, '2025-01-10', 899.99, 3, 3, '39012056789', 'M003'),
(4, '2025-01-12', 59.99, 3, 4, '47811232145', 'M004'),
(5, '2025-01-15', 149.99, 3, 5, '39107127856', 'M005'),
(6, '2025-01-18', 1499.99, 3, 6, '49202019876', 'M006'),
(7, '2025-01-20', 79.99, 3, 7, '38605142587', 'M007'),
(8, '2025-01-23', 245.98, 3, 8, '48708051472', 'M008'),
(9, '2025-01-25', 45.99, 3, 9, '39204011452', 'M009'),
(10, '2025-01-28', 1299.99, 3, 10, '49506271002', 'M010'),
(11, '2025-01-30', 65.99, 3, 11, '38808091586', 'M011'),
(12, '2025-02-01', 935.98, 3, 12, '47910122541', 'M012'),
(13, '2025-02-03', 299.99, 3, 13, '38712074569', 'M013'),
(14, '2025-02-05', 49.99, 3, 14, '49109106325', 'M014'),
(15, '2025-02-08', 799.99, 3, 15, '39402152589', 'M015'),
(16, '2025-02-10', 79.99, 3, 16, '48501092365', 'M016'),
(17, '2025-02-12', 179.98, 3, 17, '39306257412', 'M017'),
(18, '2025-02-15', 5999.99, 3, 18, '49803254178', 'M018'),
(19, '2025-02-17', 129.98, 3, 19, '39001045268', 'M019'),
(20, '2025-02-20', 59.99, 3, 20, '48602064721', 'M020'),
(21, '2025-02-22', 349.99, 3, 21, '38705124563', 'M021'),
(22, '2025-02-25', 59.99, 3, 22, '47809091472', 'M022'),
(23, '2025-02-28', 399.99, 3, 23, '39207126398', 'M023'),
(24, '2025-03-01', 7999.99, 3, 24, '48104261495', 'M024'),
(25, '2025-03-03', 39.99, 3, 25, '39403157689', 'M025'),
(26, '2025-03-05', 729.98, 3, 26, '49012215632', 'M026'),
(27, '2025-03-08', 129.99, 3, 27, '38809215487', 'M027'),
(28, '2025-03-10', 159.98, 3, 28, '48506174563', 'M028'),
(29, '2025-03-12', 89.99, 3, 29, '38911122514', 'M029'),
(30, '2025-03-15', 5349.98, 3, 30, '47704042569', 'M030'),
(31, '2025-03-18', 699.99, 3, 31, '39509157894', 'M031'),
(32, '2025-03-20', 99.98, 3, 32, '48602281234', 'M032'),
(33, '2025-03-22', 129.99, 3, 33, '39108121234', 'M033'),
(34, '2025-03-25', 143.97, 3, 34, '49504152536', 'M034'),
(35, '2025-03-28', 799.99, 3, 35, '38710056921', 'M035'),
(36, '2025-03-30', 42.99, 3, 36, '47901022345', 'M036'),
(37, '2025-04-01', 199.99, 3, 37, '39212205874', 'M037'),
(38, '2025-04-03', 29.99, 3, 38, '49308152693', 'M038'),
(39, '2025-04-05', 349.99, 3, 39, '38806146258', 'M039'),
(40, '2025-04-08', 449.98, 3, 40, '48405069874', 'M040'),
(41, '2025-04-10', 99.99, 3, 41, '39107114523', 'M041'),
(42, '2025-04-12', 69.99, 2, 42, '49210051682', 'M042'),
(43, '2025-04-15', 39.99, 2, 43, '38903115476', 'M043'),
(44, '2025-04-18', 349.99, 2, 44, '48711255986', 'M044'),
(45, '2025-04-20', 159.99, 2, 45, '39001305214', 'M045'),
(46, '2025-04-22', 259.99, 1, 46, '49203157896', 'M046'),
(47, '2025-04-25', 399.99, 1, 47, '38506081472', 'M047'),
(48, '2025-04-27', 45.99, 1, 48, '47809147896', 'M048'),
(49, '2025-04-29', 129.99, 1, 49, '39302278546', 'M049'),
(50, '2025-04-30', 119.99, 1, 50, '39602011234', 'M050'),
(51, '2025-04-30', 105.98, 1, 51, '49701022356', 'M051'),
(52, '2025-04-30', 65.99, 1, 52, '38812035478', 'M052'),
(53, '2025-04-30', 75.99, 1, 53, '38901256478', 'M053'),
(54, '2025-04-30', 49.99, 1, 54, '48703121234', 'M054'),
(55, '2025-04-30', 39.99, 1, 55, '39012056789', 'M055');



INSERT INTO `uzsakymo_preke` (`kiekis`, `kaina`, `id_UZSAKYMO_PREKE`, `fk_PREKEid`, `fk_UZSAKYMASnr`) VALUES
(1, 129.99, 1, '1', 1),
(2, 89.99, 2, '3', 2),
(1, 59.99, 4, '4', 4),
(1, 149.99, 5, '6', 5),
(1, 1499.99, 6, '7', 6),
(1, 79.99, 7, '8', 7),
(1, 199.99, 8, '9', 8),
(1, 45.99, 9, '10', 8),
(1, 45.99, 10, '10', 9),
(1, 1299.99, 11, '11', 10),
(1, 65.99, 12, '12', 11),
(1, 899.99, 13, '14', 12),
(1, 35.99, 14, '13', 12),
(1, 299.99, 15, '15', 13),
(1, 49.99, 16, '16', 14),
(1, 799.99, 17, '17', 15),
(1, 79.99, 18, '18', 16),
(2, 89.99, 19, '19', 17),
(1, 5999.99, 20, '20', 18),
(1, 69.99, 21, '21', 19),
(1, 59.99, 22, '22', 19),
(1, 59.99, 23, '20', 20),
(1, 349.99, 24, '23', 21),
(1, 59.99, 25, '24', 22),
(1, 399.99, 26, '25', 23),
(1, 7999.99, 27, '26', 24),
(1, 39.99, 28, '27', 25),
(1, 599.99, 29, '28', 26),
(1, 129.99, 30, '29', 26),
(1, 129.99, 31, '29', 27),
(1, 79.99, 32, '30', 28),
(1, 79.99, 33, '30', 28),
(1, 89.99, 34, '31', 29),
(1, 4999.99, 35, '32', 30),
(1, 349.99, 36, '40', 30),
(1, 699.99, 37, '33', 31),
(1, 49.99, 38, '34', 32),
(1, 49.99, 39, '34', 32),
(1, 129.99, 40, '35', 33),
(1, 45.99, 41, '41', 34),
(1, 45.99, 42, '41', 34),
(1, 52.99, 43, '45', 34),
(1, 799.99, 44, '36', 35),
(1, 42.99, 45, '37', 36),
(1, 199.99, 46, '38', 37),
(1, 29.99, 47, '39', 38),
(1, 349.99, 48, '40', 39),
(1, 149.99, 49, '41', 40),
(1, 299.99, 50, '15', 40),
(1, 99.99, 51, '42', 41),
(1, 69.99, 52, '43', 42),
(1, 39.99, 53, '44', 43),
(1, 349.99, 54, '45', 44),
(1, 159.99, 55, '46', 45),
(1, 259.99, 56, '47', 46),
(1, 399.99, 57, '48', 47),
(1, 45.99, 58, '49', 48),
(1, 129.99, 59, '50', 49),
(1, 119.99, 60, '51', 50),
(1, 39.99, 61, '52', 51),
(1, 65.99, 62, '53', 51),
(1, 65.99, 63, '53', 52),
(1, 75.99, 64, '54', 53),
(1, 49.99, 65, '55', 54),
(1, 39.99, 66, '52', 55);



INSERT INTO `įvertinimas` (`id_įvertinimas`, `name`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, '');