Silex services template
=======================


Prerequisites
=============

### Install Composer
```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install --dev
```

### Java JRE/JDK (min v1.6) 
  ( link pour Linux http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/ ). Vérifier:
```bash 
$ java -version
```

### Installer Ant
   Ubuntu:
```bash 
$ sudo apt-get -u install ant
```
   Mac: par tgz ou brew (celui-ci plus facile): http://stackoverflow.com/questions/3222804/how-can-i-install-apache-ant-on-mac-os-x 
```bash
$ ant -version
```

### Installer JShint
```bash
$ sudo apt-get install npm
$ npm install jshint
$ jshint -v
```

### Install PHPDocumentor dependency
```bash
$ sudo apt-get install php5-xsl
```


###  Vérifier access privé au Github:
```bash
$ ssh -vT git@github.com
```
	
   To dois voir: Hi ....! You've successfully authenticated, but GitHub does not provide shell access.
   Si ne marche pas, il faut créer une clé: https://www.digitalocean.com/community/tutorials/how-to-set-up-ssh-keys--2
   et enregistrer la partie publique dans ton compte Github -> SSH keys et aprés revérifier.


Installation et configuration
=============================
   (environment "local")
```bash
$ ant build:full -Denv=local
```


Plusieurs operations Ant
========================
```bash
$ ant -p
```

