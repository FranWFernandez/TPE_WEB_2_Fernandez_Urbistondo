# TPE_WEB_2_Fernandez_Urbistondo

 Nuestro trabajo va a consistir de una aplicaion de venta de comida estilo: pedidos ya, rappi , etc.
    
Basicamente contamos con una tabla principal llamada 'alimento',
en la que se van a especificar el tipo de comida/bebida que se venden, 
esta tabla contiene un id_alimento y un nombre, el que hace referencia al tipo: ENTRADAS, PRINCIPALES, POSTRES, BEBIDAS. 
Las cuales van a ser cada una por su cuenta una tabla aparte.
En estas tabalas se va a detallar un id unico, el nombre, un valor, una descripcion (de que se trata el plato) y por ultimo un id_alimento 
el cual va ser el encargado de conectarse con la tabla principal tomando el rol de clave foranea; 
Este id_alimento va a ser el mismo para toda la tabla, siento este relacionado al id de cada tipo de aliemnto de la tabla principal.


    ![Diagrama en blanco](https://github.com/user-attachments/assets/38825779-ebbf-40cc-964f-26e6cf8865a6)
