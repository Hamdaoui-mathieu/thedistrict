--Interrogation de la base de donnée--

--requête1--
--Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )--
select nom_client, telephone_client, email_client, adresse_client, id_plat, date_commande 
from commande 
order by date_commande

--requête2--

SELECT categorie.libelle, DESCRIPTION 
FROM categorie 
JOIN plat ON plat.id = categorie.id;

--requête3--

SELECT libelle 
FROM categorie 
WHERE ACTIVE LIKE 'y%';

--requete4--

SELECT id_plat, quantite 
FROM commande 
ORDER BY quantite desc;

--requête5--

SELECT MAX(prix), description 
FROM plat;

--requête6--

SELECT nom_client,total 
FROM commande 
ORDER BY total desc;

--requête modifications base de donnée--

--requête1--

DELETE FROM categorie 
WHERE ACTIVE LIKE 'n%';

--requête2--

DELETE FROM commande 
WHERE etat LIKE 'L%';

--requête3--

INSERT INTO categorie 
VALUES ('id', 'libelle', 'image', 'active');

INSERT INTO plat 
VALUES (plat.libelle, plat.description, plat.prix, plat.image, plat.active)
WHERE plat.id_categorie = id
--requête4--

UPDATE plat 
SET prix = prix + (prix*0.10) 
where plat.id_categorie = (
    SELECT id_categorie 
    FROM catégorie
    WHERE categorie.libelle = "pizza");
