# 👑 Singleton Pattern

### ¿Para qué sirve?
El patrón Singleton garantiza que una clase tenga una única instancia en todo el ciclo de vida de la aplicación y proporciona un punto de acceso global a ella.

Esto es útil cuando:
	•	Se necesita controlar el acceso a recursos compartidos (como archivos de log o configuraciones globales).
	•	Se desea evitar instanciaciones múltiples que generen inconsistencias o malgasto de recursos.


### Cuándo usarlo

	•	Cuando necesitas exactamente una instancia de una clase.
	•	Cuando deseas una instancia accesible globalmente desde cualquier parte del sistema.
	•	Cuando trabajar con una única instancia ayuda a mantener la coherencia del estado.

### Descripción del ejemplo

Este ejemplo muestra cómo aplicar el patrón Singleton para resolver dos casos reales:

1. Logger (Registro de eventos)

El Logger es una subclase de Singleton que abre un único recurso de escritura (en este caso, stdout) para registrar mensajes en consola. Esto simula un archivo de logs que debe mantenerse consistente.

2. Config (Almacenamiento de configuración)

La clase Config actúa como un almacén de configuración compartido. Todas las partes del programa acceden a una sola instancia para leer o modificar datos, asegurando que los cambios estén disponibles en todo el sistema.

Ambas clases heredan de una clase base Singleton, que gestiona internamente una colección de instancias únicas por subclase. Este enfoque permite aplicar Singleton a varias clases hijas sin perder la restricción de una sola instancia por clase.

### 🎯 Objetivo

En este ejemplo, el objetivo es crear un  Singleton, pero con una implementación más avanzada y flexible.

Normalmente, el patrón Singleton garantiza una sola instancia global de una clase.
Sin embargo, en este ejemplo, la clase base Singleton permite que cada subclase tenga su propia instancia única, gracias a que guarda todas las instancias en el arreglo estático $instances.

👉 En otras palabras:
	•	Cada subclase (por ejemplo Logger, Config, etc.) tiene su propio Singleton independiente.
	•	No hay dos instancias de la misma subclase, pero sí puede haber una instancia única de cada tipo.

Este enfoque es útil cuando quieres reutilizar la lógica del Singleton, pero aplicarla a varios componentes distintos sin repetir el código.


⸻

### Guía para implementar el patrón Abstract Factory en PHP (paso a paso)
```bash
Escenario general
    1.	Definimos que trabajaremos con dos clases: Logger y Config.
	2.	Logger se encargará de escribir en un archivo de registro (Logger.php).
	3.	Config será una clase que simula el acceso a las configuraciones de una aplicación (Config.php).
	4.	Para asegurar una única instancia de cada clase, se crea la clase Singleton (Singleton.php).
	5.	Por último, se crea una clase cliente para realizar las pruebas (index.php).

```


## 📁 Estructura del proyecto

```bash
/Singleton
│
├── Singleton.php         # Clase base con la lógica singleton
├── Logger.php            # Subclase para logging
├── Config.php            # Subclase para configuración
└── index.php             # Código cliente
```



## 🔴 Resultado esperado

```bash
MacBookAir:~/Proyectos/Patrones/Creacionales/Singleton$ php index.php
2025-10-29: Started! 

2025-10-29: Logger has a single instance. 

2025-10-29: Config singleton also works fine. 

2025-10-29: Finished! 
```



