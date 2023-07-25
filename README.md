l'application est basé sur la Programmation orientée objet (POO)
L'application que j'ai  réalisée est un CRUD (Create, Read, Update, Delete) pour gérer des produits avec une architecture basée sur le modèle MVC (Modèle-Vue-Contrôleur).  Voici une description de l'application et de ses fonctionnalités principales :

Architecture MVC : L'application suit une architecture basée sur le modèle MVC, ce qui signifie qu'elle est organisée en trois couches distinctes : le modèle, la vue et le contrôleur.

Base de données : L'application utilise une base de données MySQL pour stocker les informations sur les produits et les langages.

Classe Database : j'ai  créé une classe Database pour gérer la connexion à la base de données et pour faciliter l'exécution des requêtes SQL.

Entités : j'ai  défini deux entités principales : Product et Language, qui représentent les tables de la base de données. Chaque entité est associée à une classe qui contient les propriétés et les méthodes nécessaires pour manipuler les données de la table.

Répertoires et fichiers : j'ai  organisé l'application en utilisant des répertoires pour séparer les différentes parties du code. Les fichiers importants incluent index.php (point d'entrée de l'application), Database.php (classe de connexion à la base de données), Product.php et Language.php (classes d'entités), ProductRepository.php et LanguageRepository.php (classes de gestion des données), ainsi que les fichiers de vue dans le répertoire View.

Pages principales : j'ai créé différentes pages pour l'application, notamment une page principale AfficheCrud.php pour afficher la liste des produits, une page AddProduct.php pour ajouter un nouveau produit, et une page EditProduct.php pour modifier un produit existant.

Affichage des produits : La page AfficheCrud.php affiche la liste des produits récupérés à partir de la base de données, ainsi que certaines informations telles que la référence, la description, les prix et la quantité. Chaque produit est affiché dans un tableau.

Ajout de produits : La page AddProduct.php contient un formulaire permettant à l'utilisateur d'ajouter un nouveau produit en saisissant la référence, la description, les prix, la quantité et la langue associée.

Modification de produits : La page EditProduct.php permet à l'utilisateur de modifier un produit existant en affichant un formulaire pré-rempli avec les informations du produit sélectionné. L'utilisateur peut ensuite soumettre le formulaire pour mettre à jour les données du produit dans la base de données.
Suppression de produits : Vous avez également réalisé une fonction de suppression de produits, mais vous n'avez pas fourni le formulaire associé dans votre dernier message.
 X  API REST : Vous avez également implémenté une API REST pour récupérer les détails d'un produit en fonction de son ID au format JSON.(Malheursement j'ai pas reussi)
En résumé, l'application que j'ai  réalisée est une gestion de produits avec des fonctionnalités CRUD, organisée selon l'architecture MVC et utilisant une base de données MySQL. L'application permet à l'utilisateur d'afficher la liste des produits, d'ajouter de nouveaux produits, de modifier les produits existants et de supprimer des produits.

