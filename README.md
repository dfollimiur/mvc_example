# MVC tutorial webapp
_Esempio di applicazione del pattern MVC in PHP_

## Installazione
La procedura per la creazione di un ambiente di test si compone di tre parti:
1. **Configurazione nel DNS locale**
In windows occorre accedere al file C:\Windows\System32\drivers\etc\hosts ed mappare il dominio locale per esempio inserendo in una nuova riga la stringa
```
127.00.1 mvc.local
```

2. **Configurazione del virtual host**
In windows utilizzando xamp accedere al file C:\xampp\apache\conf\extra\httpd-vhosts.conf ed inserire il codice opportunamente adattato
```
<VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\mvc\public"
    ServerName mvc.local
	<Directory "C:\xampp\htdocs\mvc\public">
		DirectoryIndex index.php
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>
</VirtualHost>
```

3. **Creazione del DB**
Accedere al db e lanciare lo script sql presente nella cartella migrations per la creazione del db