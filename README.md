# Silex services template

## Setup

```bash
1. Récupération des vendors
	$ curl -sS https://getcomposer.org/installer | php
	$ php composer.phar install --dev

2. Installer JRE/JDK, version au moins 1.6 ( link pour Linux http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/ ). Vérifier 
	$ java -version

3. Installer Ant:
	Ubuntu: $ sudo apt-get -u install ant
	Mac, par tgz ou brew (celui-ci plus facile): http://stackoverflow.com/questions/3222804/how-can-i-install-apache-ant-on-mac-os-x 
	$ ant -version

4. Installer JShint:
	$ sudo apt-get install npm
    $ npm install jshint
    $ jshint -v

5. Pour PHPDocumentor:
	$ sudo apt-get install php5-xsl

5. Pour Github, il faut être sûr que ta clé publique est configurée dans ton compte Github. Pour vérifier:
	$ ssh -vT git@github.com
	
	To dois voir: Hi ....! You've successfully authenticated, but GitHub does not provide shell access.
	Si ne marche pas, il faut créer une clé: https://www.digitalocean.com/community/tutorials/how-to-set-up-ssh-keys--2
	et enregistrer la partie publique dans ton compte Github -> SSH keys et aprés revérifier.

# Installation et configuration (environment "local")
$ ant build:full -Denv=local

# Changements des droits sur les fichiers cache et log
$ chmod -R 777 app/log
$ chmod -R 777 app/cache
