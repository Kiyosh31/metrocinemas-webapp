@extends('layouts.tabler') 
@section('content')
<div class="my-3 my-md-5 d-flex justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="text-wrap p-lg-6">
                    <h2 class="mt-0 mb-4">Introduction</h2>
                    <p>
                        Este proyecto fue creado para la materia de programacion web con el objetivo de crear unas aplicacion web capaz de realizar
                        tareas como un CRUD ademas de mostrar la informacion pertinente al sistema y la base de datos, se
                        implemento un framework de php llamado laravel para el codigo fuente y otro framework Bootstrap para
                        los estilos.
                    </p>
                    <h3>Requisitos minimos del proyecto</h3>
                    <p>Se espera un sistema web utilizando Laravel como framework de desarrollo.</p>
                    <h3>Base de datos</h3>
                    <ul>
                        <li>
                            Uso de migraciones para crear y modificar tablas.
                        </li>
                        <li>
                            Implementar al menos un Seeder.
                        </li>
                        <li>
                            Generar datos de prueba para al menos una tabla.
                        </li>
                    </ul>
                    <h3>Autenticación, autorización y seguridad</h3>
                    <ul>
                        <li>
                            Realizar autenticación de usuarios mediante correo y contraseña.
                        </li>
                        <li>
                            Validar toda información que se reciba a partir de una formulario.
                        </li>
                        <li>
                            Crear e implementar un middleware.
                        </li>
                        <li>
                            mplementar gates y policies.
                        </li>
                        <li>
                            <strong>Extra:</strong> Passport / Socialite.
                        </li>
                    </ul>
                    <h3>GUI</h3>
                    <ul>
                        <li>
                            Crear vistas utilizando blade
                        </li>
                        <li>
                            Crear vistas utilizando blade
                            <ul>
                                <li>
                                    Mostrar nombre, nombre de usuario o correo del usuario.
                                </li>
                                <li>
                                    Mostrar opción para ingresar (login) o salir (logout) del sistema según corresponda.
                                </li>
                                <li>
                                    Mostrar menú de navegación.
                                </li>
                            </ul>
                        </li>
                        <li>
                            Implementar Bootstrap u otro framework de css.
                        </li>
                        <li>
                            <strong>Importante:</strong>Mostrar mensajes al usuario cuando:
                            <ul>
                                <li>
                                    Exista un error de validación al completar un formulario.
                                </li>
                                <li>
                                    Se haya completado una tarea, sea con éxito, con errores o si require información adicional. (Ej. Al crear, eliminar o editar).
                                </li>
                                <li>
                                    Existan listados vacíos.
                                </li>
                            </ul>
                        </li>
                        <li>
                            Cuando exista un error al validar un formulario o se esté editando información de un recurso existente, el formulario deberá
                            mostrar la información capturada o a editar.
                        </li>
                        <li>
                            Los enlaces o inclusión de recursos locales (css, js, etc) deberán generarse utilizando los helpers adecuados. (Ej. action,
                            route, asset).
                        </li>
                    </ul>
                    <h3>Eloquent (Modelos, Consultas)</h3>
                    <ul>
                        <li>
                            Definir una relación de cada uno de los siguientes tipos y sus inversas dentro de los modelos:
                            <ul>
                                <li>
                                    “uno a muchos” (1:n)
                                </li>
                                <li>
                                    “muchos a muchos” (n:n)
                                </li>
                                <li>
                                    polimórfica o polimórfica muchos a muchos.
                                </li>
                            </ul>
                        </li>
                        <li>
                            Utilizar “Eager Loading” al consultar múltiples registros con n relaciones.
                        </li>
                        <li>
                            Utilizar al menos en una consulta “Constraining Eager Load”.
                        </li>
                        <li>Declarar “fillable” o “guarded” en al menos un modelo.</li>
                        <li>Declarar “fillable” o “guarded” en al menos un modelo.</li>
                        <li>Implementar “time stamps” en al menos un modelo.</li>
                        <li>Implementar “Soft Delete” en al menos un modelo.</li>
                        <li>Crear al menos un “accessor” y un “muttator” en un modelo.</li>
                    </ul>
                    <h3>Controladores</h3>
                    <ul>
                        <li>Crear al menos un controlador tipo resource.</li>
                        <li><strong>Extra:</strong>Crear un controlador tipo resource anidado.</li>
                        <li>Crear al menos un método personalizado dentro de un controlador.</li>
                    </ul>
                    <h3>API</h3>
                    <ul>
                        <li>Crear y consultar al menos un controlador con al menos un método que regrese un json.</li>
                    </ul>
                    <h3>Archivos</h3>
                    <p>Se deberá crear e implementar un cargador de archivos que permita:</p>
                    <ul>
                        <li>Cargar uno o muchos archivos a la vez.</li>
                        <li>Listar los archivos o mostrar el archivo cargado.</li>
                        <li>Eliminar el archivo.</li>
                    </ul>
                    <h3>Correo Electrónico</h3>
                    <ul>
                        <li>Implementar verificación de correo electrónico al realizar registro.</li>
                        <li>Envío de correo electrónico personalizado.</li>
                    </ul>
                    <h3>Sheduler y Jobs</h3>
                    <ul>
                        <li>Implementar la ejecución de una tarea recurrente de forma automática.</li>
                        <li>Implementar el uso de Jobs para la ejecución de múltiples tareas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection