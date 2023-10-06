Cordial saludo. 

la exportación de la base de datos se encuentra en el archivo ticket.sql que se encuentra en la carpeta raiz, todas las pruebas se realizaron por postman. 

Para la ejecución del API en metodo GET:

*recibe las variables (pagina y id) 
    --> pagina para traer el numero de pagina con los resultados correspondientes estos están por un máximo de 10 registros por pagina 
    --> la variable id se enviá para especificar un solo registro de la tabla y traer los datos correspondientes.

Para ejecutar el método POSTse deben pasar todos los parámetros por boy en un formato JSON 
    {
        "usuario":"Valentina",
        "fecha_creacion":"2023-10-06",
        "fecha_actualizacion":"2023-10-06",
        "estatus":"abierto"
    }

Para ejecutar el método UPDATE al igual que el método POST se deben pasar todos los parámetros por body en un formato JSON y adicionar el campo id como se ve en el ejemplo
    {
        "usuario":"Valentina",
        "fecha_creacion":"2023-10-06",
        "fecha_actualizacion":"2023-10-06",
        "estatus":"abierto"
    }

Para ejecutar el método DELETED solo se necesita enviar el id pero igual que los de mas en formato JSON
    {
        'id': 3
    }



