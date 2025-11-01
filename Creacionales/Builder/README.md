# 🏭 Builder Pattern

### ¿Para qué sirve?

El patrón **Builder** (Constructor) se utiliza para **crear objetos complejos paso a paso**, separando la lógica de construcción de la representación final del objeto.  
De esta forma, el mismo proceso de construcción puede crear **diferentes representaciones** de un objeto (por ejemplo, una consulta SQL para MySQL o PostgreSQL).

En otras palabras, **el Builder te permite crear estructuras complejas sin depender de su implementación interna**, solo del conjunto de pasos necesarios para construirlas.

---

### Cuándo usarlo

✅ Usa el patrón **Builder** cuando:
- Quieras construir objetos complejos (por ejemplo, consultas SQL, documentos, reportes, etc.) paso a paso.  
- Desees que **el mismo proceso de construcción** genere **diferentes tipos de productos**.  
- Quieras aislar la lógica de construcción del código cliente.  
- Busques **una alternativa más limpia** al uso de múltiples constructores o parámetros opcionales en una clase.

---

### Descripción del ejemplo

Este ejemplo muestra cómo construir **consultas SQL** para distintas bases de datos (MySQL y PostgreSQL) usando el mismo conjunto de pasos.

- La **interfaz `SQLQueryBuilder`** define los pasos comunes (`select`, `where`, `limit`, `getSQL`).
- Las clases **`MysqlQueryBuilder`** y **`PostgresQueryBuilder`** implementan esa interfaz, adaptando la sintaxis según el motor.
- El cliente (`clientCode`) usa cualquier builder sin conocer los detalles internos del SQL generado.

De este modo, el código es **flexible, reutilizable y extensible**: se puede añadir un nuevo builder (por ejemplo, para SQLite) sin modificar el cliente.

---

### 🎯 Objetivo del código

Demostrar cómo el patrón **Builder** permite construir **consultas SQL personalizadas** mediante una secuencia de pasos encadenados (fluent interface).  

Cada constructor (`MysqlQueryBuilder` y `PostgresQueryBuilder`) implementa los mismos pasos, pero con diferencias específicas en su resultado final.  
El cliente simplemente indica **qué quiere construir**, y el Builder se encarga del **cómo**.

---

⸻

### Guía para implementar el patrón Builder en PHP (paso a paso)

```bash
Asegúrate de poder definir claramente los pasos comunes de construcción para todas las representaciones disponibles del producto. 
De lo contrario, no podrás proceder a implementar el patrón.

Declara estos pasos en la interfaz constructora base.

Crea una clase constructora concreta para cada una de las representaciones de producto e implementa sus pasos de construcción.

No olvides implementar un método para extraer el resultado de la construcción. 
La razón por la que este método no se puede declarar dentro de la interfaz constructora es que varios constructores pueden construir productos sin una interfaz común. 

Piensa en crear una clase directora. Puede encapsular varias formas de construir un producto utilizando el mismo objeto constructor.

El código cliente crea tanto el objeto constructor como el director. 
Antes de que empiece la construcción, el cliente debe pasar un objeto constructor al director. 
Normalmente, el cliente hace esto sólo una vez, mediante los parámetros del constructor del director. 
El director utiliza el objeto constructor para el resto de la construcción.

El resultado de la construcción tan solo se puede obtener directamente del director si todos los productos siguen la misma interfaz. 
De lo contrario, el cliente deberá extraer el resultado del constructor.


## 🟢 Proceso de codificación
1. Identificar los productos a construir

En este caso, el “producto” es una consulta SQL que puede variar según el motor (MySQL o PostgreSQL).

2. Crear las clases concretas de productos
	•	MysqlQueryBuilder → genera SQL con sintaxis MySQL
	•	PostgresQueryBuilder → genera SQL con sintaxis PostgreSQL

3. Crear las interfaces

La interfaz SQLQueryBuilder define los pasos de construcción:
	•	select()
	•	where()
	•	limit()
	•	getSQL()

4. Crear la clase cliente

Una clase (o función) cliente se encarga de usar el builder paso a paso, sin preocuparse por la implementación interna.

⸻

7. Crear el Autoloading

Composer + autoloading PSR-4

El autoloading PSR-4 permite que PHP cargue automáticamente las clases cuando se necesitan,
sin tener que escribir manualmente múltiples require_once en el index.php, como:

require_once __DIR__ . '/vendor/autoload.php';


Esto mejora la organización, mantenibilidad y escalabilidad del código,
siguiendo estándares profesionales del ecosistema PHP.

⸻

8. Probar la implementación

En el archivo index.php, instanciamos los builders y ejecutamos la función cliente.

## 📁 Estructura del proyecto

```bash
├── Builder
│   ├── composer.json
│   ├── Director
│   │   └── QueryDirector.php
│   ├── index.php
│   ├── QueryBuilder
│   │   ├── MysqlQueryBuilder.php
│   │   ├── PostgresQueryBuilder.php
│   │   └── SQLQueryBuilder.php
│   └── README.md

```

## 🔵 EJemplo de ejecución 

1. Instanciación

El cliente crea el builder concreto que desea usar:

$builder = new MysqlQueryBuilder();

2. Llamada al método principal

El builder construye la consulta paso a paso:

```php
$query = $builder
    ->select("users", ["name", "email", "password"])
    ->where("age", 18, ">")
    ->where("age", 30, "<")
    ->limit(10, 20)
    ->getSQL();
```
3. Resultado generado

El método getSQL() devuelve la cadena SQL final, adaptada al tipo de builder.


## 🔴 Resultado esperado

```bash
Testing MySQL query builder:
SELECT name, email, password FROM users WHERE age > '18' AND age < '30' LIMIT 10, 20;

Testing PostgresSQL query builder:
SELECT name, email, password FROM users WHERE age > '18' AND age < '30' LIMIT 10 OFFSET 20;
```