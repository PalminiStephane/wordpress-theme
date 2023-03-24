# WordPress

## Procédure d'installation

On commence par télécharger le zip de WordPress sur [wordpress.org](https://wordpress.org/download/).

On va venir déplacer le zip téléchargé **dans notre projet** et le dézipper.

Pour dézipper en ligne de commande :

```sh
sudo apt install unzip
cd onews
mv ~/Téléchargements/wordpress-6.1.1.zip .
unzip wordpress-6.1.1.zip
rm wordpress-6.1.1.zip
```

On va se créer un virtual host pour avoir de jolies URL (`onews.test` pour nous) :

```sh
sudo vim /etc/apache2/sites-available/onews.conf
```

On y met ce contenu :

```
<VirtualHost *:80>
    ServerName onews.test
    DocumentRoot /var/www/html/nazca/S08/onews/wordpress
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

On ouvre `/etc/hosts` :

```sh
sudo vim /etc/hosts
```

Et on ajoute notre domaine virtuel :

```
127.0.0.1 localhost onews.test
```

Ensuite, on active l'hôte virtuel et on redémarre Apache pour que ça soit pris en compte :

```sh
sudo a2ensite onews.conf
sudo service apache2 restart
```

On vient régler les problèmes de droit : (Groupe www-data de Apache doit être propriétaire des fichiers)

```sh
sudo chgrp -R www-data .
sudo chown -R www-data wordpress/wp-admin
sudo find . -type f -exec chmod 664 {} +
sudo find . -type d -exec chmod 775 {} +
```

On va ensuite sur [http://onews.test](http://onews.test) et tombe sur la configuration de la langue et de la BDD !

On va donc en créer une dédiée (**wordpress**) avec un utilisateur associé (**wordpress / wordpress**) !

On les renseigne sur l'installation de WordPress et on continue d'avancer !

Pour le site, on l'appelle **oNews** et pour l'utilisateur, on indique ***onews / onews***.

On se connecte et ... Bienvenue à Jurassic Park ! 🦖🦕

On vient dans **Réglages** > **Permaliens** pour activer la réécriture d'URL.

On va également switcher vers le thème **Twenty Twenty-One** pour avoir la méthode classique de personnalisation du thème.
