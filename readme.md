# PROJET FRAMEWORK "Candidatures" : Application Symfony
## Install Symfony version 4.x.x
__Terminal__ : ``` composer create-project symfony/website-skeleton Candidatures "4.4.*"```  
On peut vérifier la liste des commandes dans le terminal par : ```bin/console```
## Etapes de développement

### Database
1. Configurer la base de données dans fichier .env (ligne 32) :  
```DATABASE_URL=mysql://root:root@127.0.0.1:8889/db_candidatures?serverVersion=5.7```  
IMPORTANT : penser à modifier le port mySql par 8889 (pour les utilisateurs sous Mac Os)
2. Création physique de la base de données (à contrôler dans phpMyAdmin):  
```bin/console doctrine:database:create```  

### Entités
Les types de données de l'application :  
    On a plusieurs tables à créer :  
1. Candidature
2. Annonce
3. Entreprise
4. Contact
5. RDV 

Pour créer les entités : ```bin/console make:entity```  


### Migration
1. Création du fichier de migration (code SQL) ```bin/console make:migration```
2. Executer la migration ```bin/console doctrine:migrations:migrate```  
--> créé les tables dans MySQL  (vérification dans phpMyAdmin)
### Make CRUD
Pour créer automatiquement le crud (Create Read Update Delete) sur les entités créées :
1. ```bin/console make:crud```
2. préciser le nom de l'entité sur laquelle créer le crud.
- cette commande créera automatiquement les controlleurs et les vues (avec les formulaires) pour l'entité

### Premier test d'execution
pour utiliser la commande server:run sur symfony 4.4 :   
1. ```composer require --dev symfony/web-server-bundle```  
2. ```bin/console server:run```  
3. vérifier dans le controller les routes à utiliser.

### Controllers
Dans notre cas, le controller et la vue ont été créés automatiquement.  
Penser à modifier la route pour la page d'accueil :   
```@Route("/candidature")```devient : ```@Route("/")```

## personnalisation de l'interface
### Vue index :
On laisse en commentaire la vue par défaut (sous forme de table) pour céer une interface sous forme de cartes bootstrap
### Création d'une barre de navigation et d'une sidebar
 Dans des fichiers à part et avec un système d'inclusion dans un block (block inclus dans la base)
### Vues CRUD
On harmonise les différentes vues avec la mise en page de l'index :
- nouvelle candidature
- voir candidature
- éditer candidature

### Gestion de la date de la candidature
Selon si nous crééons une candidature ou si nous éditons, la date du jour concernera la date de création pu celle de mise à jour.
