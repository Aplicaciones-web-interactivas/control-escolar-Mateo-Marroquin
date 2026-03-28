# Enlace de Almacenamiento

Para que las tareas (PDFs) subidas por los alumnos sean visibles en el sistema, es necesario generar el enlace simbólico:

`./vendor/bin/sail artisan storage:link`

# Generar clave de aplicación y correr migraciones
Bash

`./vendor/bin/sail artisan key:generate`

`./vendor/bin/sail artisan migrate:fresh --seed`
