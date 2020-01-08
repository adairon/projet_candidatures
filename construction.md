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


### Migration
1. Création du fichier de migration (code SQL) ```bin/console make:migration```
2. Executer la migration ```bin/console doctrine:migrations:migrate```  
--> créé les tables dans MySQL  (vérification dans phpMyAdmin)
## Make CRUD
Pour créer automatiquement le crud (Create Update Delete) sur les entités créées :
1. ```bin/console make:crud```
2. préciser le nom de l'entité sur laquelle créer le crud.

## Premier test d'execution
pour utiliser la commande server:run sur symfony 4.4 :   
1. ```composer require --dev symfony/web-server-bundle```  
2. ```bin/console server:run```  
3. vérifier dans le controller les routes à utiliser.



# Controllers
Dans notre cas, le controller et la vue ont été créés automatiquement.  
Penser à modifier la route pour la page d'accueil :   
```@Route("/candidature")```devient : ```@Route("/")```


 
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