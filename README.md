# MVC tutorial webapp
_Esempio di applicazione del pattern MVC in PHP_

## Installazione
1. Configurare nel DNS locale l'URL per il test dell'applicazione.
In windows occorre accedere al file C:\Windows\System32\drivers\etc\hosts ed mappare il dominio locale 127.00.1 mvc.local

2. Configurare il virtual host di test 
In windows utilizzando xamp accedere al file C:\xampp\apache\conf\extra\httpd-vhosts.conf ed inserire il codice opportunamente adattato
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

3. Creare il DB
Con un client sql accederea la db e lanciare lo script sql presente nella cartella migrations