CREATE TABLE `equipe` (
  `ID_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(30) NOT NULL,
  `date_creation_eq` date NOT NULL
)


ALTER TABLE `equipe`
  ADD PRIMARY KEY (`ID_equipe`);


ALTER TABLE `membre`
  MODIFY `ID_membre` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


INSERT INTO `equipe` (`ID_equipe`, `nom_equipe`, `date_creation_eq`) VALUES
(1, 'Staff', '2023-01-01'),
(2, 'Java', '2023-02-02'),
(3, 'javascript', '2023-11-02');


CREATE TABLE `membre` (
  `ID_membre` int(15) NOT NULL,
  `NOM_membre` varchar(30) NOT NULL,
  `prenom_membre` varchar(30) NOT NULL,
  `email_membre` varchar(30) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ID_eq` int(11) NOT NULL
) 


ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID_membre`),
  ADD KEY `FK_membre` (`ID_eq`);


ALTER TABLE `equipe`
  MODIFY `ID_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `membre`
  ADD CONSTRAINT `FK_membre` FOREIGN KEY (`ID_eq`) REFERENCES `equipe` (`ID_equipe`);
COMMIT;


INSERT INTO `membre` (`ID_membre`, `NOM_membre`, `prenom_membre`, `email_membre`, `phone_number`, `role`, `status`, `ID_eq`) VALUES
(1, 'BEGHDI', 'HIBA', 'beghiba@gmail.com', 658144394, 'chef', 'congé', 1),
(2, 'Ouafidi', 'Oussama', 'ouafidi@gmail.com', 614012000, 'Chef', 'Working', 1),
(4, 'BEGHDI', 'ayouya', 'beghiba@gmail.com', 658144394, 'break', 'machi congé', 2),
(5, 'soufiane', 'soufiane', 'soufiane@gmail.com', 612345789, 'break', 'congé', 1);



