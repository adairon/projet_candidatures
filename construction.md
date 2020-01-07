# PROJET FRAMEWORK "Candidatures" : Application Symfony
## Install Symfony version 4.x.x
__Terminal__ : ``` composer create-project symfony/website-skeleton Candidatures "4.4.*"```  
On peut vérifier la liste des commandes dans le terminal par : ```bin/console```
## Etapes de développement

### Database
1. Config database dans fichier .env (ligne 32) :  
```DATABASE_URL=mysql://root:root@127.0.0.1:8889/db_candidatures?serverVersion=5.7```  
IMPORTANT : penser à modifier le port mySql par 8889
2. Création physique de la base de données (à vérifier dans phpMyAdmin):  
```bin/console doctrine:database:create```  

### Entités
Les types de données de l'application :  
    On a plusieurs tables à créer :  
1. Candidature
2. Annonce
3. Entreprise
4. Contact
5. RDV 

Pour créer les deux entités : ```bin/console make:entity```  
Commencer par Category puis Todo.  
La relation se fera à partir de l'entité Todo, avec une propriété _category_id_ qui sera du type __relation__.

### Migration
1. Création du fichier de migration (code SQL) ```bin/console make:migration```
2. Executer la migration ```bin/console doctrine:migrations:migrate```  
--> créé les tables Todo et Category dans MySQL  
## Git Commit
1. git add .
2. git commit -m "Todo application install et config DB"

# Fixtures
Tester insertion de données dans les tables.  
1. Installer d'abord : ```composer require orm-fixtures --dev```
2. Coder dans AppFixtures
3. ```bin/console doctrine:fixtures:load```

# Controllers
Dans notre cas, nous utilisons un seul controller
```bin/console make:controller````
Symfony a créé un controller ```Maincontroller``` et une vue : ```main/index.html.twig```

## Premier test d'execution
```bin/console server:run```  
OUPS !! La version 4.4 a déprécié cette commande...  
On fair donc un tour sur internet avec les mots clés ```Symfony 4.4 server:run```  
Une proposition dans la doc :   
```composer require --dev symfony/web-server-bundle```
 
 ## Notre première requête avec Doctrine
 Doctrine et Repository

 ## Création du contenu de la vue index
 Une table avec bootstrap pour aligner les données de manière tabulaire

 ## Création d'une barre de navigation
 Dans un fichier à part et avec un système d'inclusion dans un block (block inclus dans la base)

 ## Création d'un formulaire à partir d'entités
 Dans le terminal : ```bin/console make:form```  
 1. On créé un formulaire à partir d'un fichier de classe créé à cet effet.
 2. Le controller gère cette classe pour construire en mémoire le formulaire
 3. La vue génère le formulaire :
    - la mise en page n'est pa terrible.
    - Symfony intègre un template bootstrap à placer dans le fichier de configuration.

## Gestion de la date Todofor
Selon si nous crééons une Todo ou si nous éditons, la gestion n'est pas la même.
- En mode création, la date est celle du jour de création.
- En mode édition, on veut récupérer la date enregistrée.