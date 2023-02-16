# CarritoApi
Web sencilla creada en Laravel para gestionar los productos de un carrito de un ecommerce, empleando para ello uno API.
Funcion de uso interno durante la navegacion web a través del empleo de sesiones, con 5 tipos de requests.

- cart-checkout: Redirige a la vista del carrito.
- cart-add: Añade un producto al carrito, si ya existia le sumo uno mas al total.
- update-cart: Actualiza el numero total de un producto determinado del carrito.
- remove-from-cart: Elimina un producto determinado del carrito.
- cart-clear: Elimina todos los productos del carrito.

## Razonamiento y proceso: <br>
Los carritos de compra tienen sentido dentro de una sesion o asociandolos a un usuario concreto. Por simplificar los resultados finales,
se ha optado por gestionar el carrito con la sesion web que el usuario maneje en ese momento. <br>
- Se ha creado un modelo de Producto muy simple con los campos identificador, nombre, descripcion y precio para poder trabajar con un modelo tipo.<br>
- Se han creado en base de datos de prueba 25 productos aleatorios que siguen el modelo. Se puede generar ejecutando el seeder de laravel en
database\seeders\ProductoSeeder.php <br>
- Se han creado las rutas a la API interna que se empleara durante la navegacion web disponibles en routes\api.php<br>
- Se ha creado el controlador que gestionara dichas peticiones para el carrito en app\Http\Controllers\Api\V1\CartController.php el cual gestiona cada una de las peticiones a la API. <br>
- Por otro lado para testear el funcionamiento interno se han creado las vistas oportunas basicas para simular la navegacion de un usuario dentro de la web
welcome.blade.php y checkout.blade.php disponibles en resources\views
<br><br>
La API al desarrollarse para un uso web interno de la aplicacion, realiza las redirecciones aunque podriamos realizar un proceso intermedio que llamara a la API, el cual en funcion de la respuesta, decidiera lo que hacer (para poder gestionar outputs en base a distintos errores).
Pero por simplicidad se ha decidido dejarlo asi.
<br>
## Resumen: <br>
A modo resumen, para cambiar el funcionamiento de la API de gestion del carrito habria que modificar unicamente dos ficheros:
- app\Http\Controllers\Api\V1\CartController.php -> Controlador con los metodos a los que se puede llamar para gestionar el carrito dentro de la sesion de usuario.
- routes\api.php -> las rutas con las llamadas a los metodos del controlador.

