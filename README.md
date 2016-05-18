/config/db.php - параметры соединения с базой данных
/migrations - миграции на создание таблиц

Веб сервер должен быть сконфигурирован так, чтобы рабочей папкой была /web , как пример:

<VirtualHost *:80>
	ServerName localhost
  	DocumentRoot /путь_до_папки_с_приложением/web
</VirtualHost>
