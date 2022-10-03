# productoApp

Contenido del archivo .env

    APP_NAME=Producto
    ...
    APP_URL=https://USUARIO.ies...s.es/laraveles/productoApp/public/
    ...
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=productoL
    DB_USERNAME=uproductoL
    DB_PASSWORD=cproductoL

Se han editado los archivos estrictamente necesarios para el funcionamiento de la aplicación:

[app/Http/Controllers/MainController.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Controllers/MainController.php)  
[app/Http/Controllers/ProductoController.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Controllers/ProductoController.php)  
[app/Http/Middleware/UserLogged.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Middleware/UserLogged.php)  
[app/Http/Kernel.php](https://github.com/dwesizv/productoApp/blob/main/app/Http/Kernel.php)  
[app/Models/Producto.php](https://github.com/dwesizv/productoApp/blob/main/app/Models/Producto.php)  
[database/migrations/2022_09_28_200709_create_productos_table.php](https://github.com/dwesizv/productoApp/blob/main/database/migrations/2022_09_28_200709_create_productos_table.php)  
[public/assets/js/product-modal-delete.js](https://github.com/dwesizv/productoApp/blob/main/public/assets/js/product-modal-delete.js)  
[resources/views/*](https://github.com/dwesizv/productoApp/tree/main/resources/views)  
[routes/web.php](https://github.com/dwesizv/productoApp/blob/main/routes/web.php)  
