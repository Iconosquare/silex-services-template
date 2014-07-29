# Silex services template

## Setup

```bash
# Récupération des vendors
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install --dev

# Création du fichier de config.php
$ cp app/config/config_default.php app/config/config.php

# Changements des droits sur les fichiers cache et log
$ chmod -R 777 app/log
$ chmod -R 777 app/cache
$ chmod -R 777 web/concours-tmp

Les bundles sont crées dans Gruntfile.js.