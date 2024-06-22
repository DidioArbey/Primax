<?php

namespace Database\Seeders;

use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthenticathionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //



            $role1 = Role::create(['name' => 'Admin']);
            $role2 = Role::create(['name' => 'Trainer']);
            $role3 = Role::create(['name' => 'Student']);

            Permission::create(['name' => 'home.index', 'description' => 'ver inicio'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'library.index', 'description' => 'Ver biblioteca'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'library.list-library', 'description' => 'listar carpetas admin'])->assignRole($role1);
            Permission::create(['name' => 'category.index', 'description' => 'Ver Galerias'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'categories.list', 'description' => 'Listar Galerias'])->assignRole($role1);
            Permission::create(['name' => 'news.index', 'description' => 'Ver Noticias'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'galleries.index', 'description' => 'Ver galerias'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'gallery.get', 'description' => 'Ver galeria'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'galleries.gallery-category', 'description' => 'Ver Galerias Filtradas'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'users.list', 'description' => 'Listar Usuarios'])->assignRole($role1);
            Permission::create(['name' => 'user.enable', 'description' => 'Habilitar Usuario'])->assignRole($role1);
            Permission::create(['name' => 'user.disable', 'description' => 'Deshabilitar Usuario'])->assignRole($role1);
            Permission::create(['name' => 'user.delete', 'description' => 'Eliminar Usuario'])->assignRole($role1);
            Permission::create(['name' => 'user.store', 'description' => 'Crear Usuario'])->assignRole($role1);
            Permission::create(['name' => 'users.import', 'description' => 'Importar Usuarios'])->assignRole($role1);
            /*Learning paths*/
            Permission::create(['name' =>'learning-paths.list', 'description' => 'Listar Rutas de aprendizaje'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' =>'learning-path.enable', 'description' => 'Habilitar Ruta'])->assignRole($role1);
            Permission::create(['name' =>'learning-path.disable', 'description' => 'Deshanilitar Ruta'])->assignRole($role1);
            Permission::create(['name' =>'learning-path.delete', 'description' => 'Eliminar Ruta'])->assignRole($role1);
            Permission::create(['name' =>'learning-path.store', 'description' => 'Crear Ruta'])->assignRole($role1);
            Permission::create(['name' =>'learning-path.edit', 'description' => 'Editar Ruta'])->assignRole($role1);
            Permission::create(['name' =>'learning-path.update', 'description' => 'Actualizar Ruta'])->assignRole($role1);

            /*Courses*/
            Permission::create(['name' =>'courses.list', 'description' => 'Listar Cursos'])->syncRoles([$role1]);
            Permission::create(['name' =>'course.enable', 'description' => 'Habilitar Curso'])->assignRole($role1);
            Permission::create(['name' =>'course.disable', 'description' => 'Deshabilitar Curso'])->assignRole($role1);
            Permission::create(['name' =>'course.delete', 'description' => 'Eliminar Curso'])->assignRole($role1);
            Permission::create(['name' =>'course-virtual.store', 'description' => 'Crear Curso Virtual'])->assignRole($role1);
            Permission::create(['name' =>'course-onsite.store', 'description' => 'Crear Curso Presencial'])->assignRole($role1);
            Permission::create(['name' =>'course-virtual.edit', 'description' => 'Editar Curso Virtual'])->assignRole($role1);
            Permission::create(['name' =>'course-onsite.edit', 'description' => 'Editar Curso Presencial'])->assignRole($role1);
            Permission::create(['name' =>'course-virtual.update', 'description' => 'Actualizar Curso Virtual'])->assignRole($role1);
            Permission::create(['name' =>'course-onsite.update', 'description' => 'Actualizar Curso Presencial'])->assignRole($role1);

            /*Development*/
            Permission::create(['name' =>'development.index', 'description' => 'Ver Tedesarrolla'])->syncRoles([$role3]);
            Permission::create(['name' =>'learning-paths.index', 'description' => 'Ver Rutas de aprendizaje'])->syncRoles([$role3]);
            Permission::create(['name' =>'learning-paths-courses.index', 'description' => 'Ver Detalle Rutas de aprendizaje'])->syncRoles([$role3]);
            Permission::create(['name' =>'activities-course-virtual.index', 'description' => 'Ver Actividades cusos Viruales'])->syncRoles([$role3]);
            Permission::create(['name' =>'details-course-onsite.index', 'description' => 'Ver Detalle Cursos Presenciales'])->syncRoles([$role3]);
            Permission::create(['name' =>'activity.index', 'description' => 'Ver Actividades'])->syncRoles([$role3]);
            Permission::create(['name' =>'assessment.index', 'description' => 'Ver Evaluaciones'])->syncRoles([$role3]);
            Permission::create(['name' =>'survey.index', 'description' => 'Ver Encuestas de satisfacción'])->syncRoles([$role3]);
            Permission::create(['name' =>'courses-virtual.index', 'description' => 'Ver Cusos Virtuales'])->syncRoles([$role3]);
            Permission::create(['name' =>'courses-onsite.index', 'description' => 'Ver Cursos Presenciales'])->syncRoles([$role3]);
            Permission::create(['name' =>'finishActivity', 'description' => 'Finalizar Scoorm'])->syncRoles([$role3]);

            /* profile trainers */
            Permission::create(['name' =>'courses-onsite.trainer', 'description' => 'Ver el Curso Presencial Trainer '])->syncRoles([$role2]);
            Permission::create(['name' =>'details-course-onsite.trainer', 'description' => 'Ver Detalle Curso Presencial Trainer'])->syncRoles([$role2]);

            /*Library*/
            /*Folders*/
            Permission::create(['name' =>'folder.view', 'description' => 'Ver Carpetas'])->syncRoles([$role1, $role2, $role3]);

            /*File*/
            Permission::create(['name' =>'file.view', 'description' => 'Visualizar Archivo'])->syncRoles([$role1, $role2, $role3]);

            /*Dashboard*/
            Permission::create(['name' =>'dashboard.index', 'description' => 'Ver Dashboard'])->syncRoles([$role1]);

            /*Reports */
            Permission::create(['name' =>'list-user-reports', 'description' => 'Ver Reporte de Usuarios'])->syncRoles([$role1]);
            Permission::create(['name' =>'list-assessments-reports', 'description' => 'Ver Reporte de Asistencias'])->syncRoles([$role1]);
            Permission::create(['name' =>'list-attendance-reports', 'description' => 'Ver Reporte de Evaluaciones'])->syncRoles([$role1]);
            Permission::create(['name' =>'list-surveys-reports', 'description' => 'Ver Reportes de Satisfación'])->syncRoles([$role1]);
            Permission::create(['name' =>'history-report', 'description' => 'Ver Reportes de auditoria'])->syncRoles([$role1]);
        // Permission::create(['name' =>'', 'description' => '']);
        // ->syncRoles([$role1,$role2,$role3])
        // ->assignRole($role1)
        // // Home
        // if (!Permission::where('name', 'home.index')->exists()) {
        //     Permission::create(['name' => 'home.index', 'description' => 'ver inicio'])->syncRoles([$role1, $role2, $role3]);
        // }

        // //Library
        // //folder
        // if (!Permission::where('name', 'library.index')->exists()) {
        //     Permission::create(['name' => 'library.index', 'description' => 'Ver biblioteca'])->syncRoles([$role1, $role2, $role3]);
        // }

        // if (!Permission::where('name', 'library.list-library')->exists()) {
        //     Permission::create(['name' => 'library.list-library', 'description' => 'listar carpetas admin'])->assignRole($role1);
        // }

        // /*Categories*/
        // if (!Permission::where('name', 'category.index')->exists()) {
        //     Permission::create(['name' => 'category.index', 'description' => 'Ver Galerias'])->syncRoles([$role1, $role2, $role3]);
        // }
        // if (!Permission::where('name', 'categories.list')->exists()) {
        //     Permission::create(['name' => 'categories.list', 'description' => 'Listar Galerias'])->assignRole($role1);
        // }
        //     /*News*/
        // if (!Permission::where('name', 'news.index')->exists()) {
        //     Permission::create(['name' => 'news.index', 'description' => 'Ver Noticias'])->syncRoles([$role1, $role2, $role3]);
        // }

        //     /*Galleries*/
        // if (!Permission::where('name', 'galleries.index')->exists()) {
        //     Permission::create(['name' => 'galleries.index', 'description' => 'Ver galerias'])->syncRoles([$role1, $role2, $role3]);
        // }

        // if (!Permission::where('name', 'gallery.get')->exists()) {
        //     Permission::create(['name' => 'gallery.get', 'description' => 'Ver galeria'])->syncRoles([$role1, $role2, $role3]);
        // }
        // if (!Permission::where('name', 'galleries.gallery-category')->exists()) {
        //     Permission::create(['name' => 'galleries.gallery-category', 'description' => 'Ver Galerias Filtradas'])->syncRoles([$role1, $role2, $role3]);
        // }


        // //     /*Users*/
        // if (!Permission::where('name', 'users.list')->exists()) {
        //     Permission::create(['name' => 'users.list', 'description' => 'Listar Usuarios'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.enable')->exists()) {
        //     Permission::create(['name' => 'user.enable', 'description' => 'Habilitar Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.disable')->exists()) {
        //     Permission::create(['name' => 'user.disable', 'description' => 'Deshabilitar Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.delete')->exists()) {
        //     Permission::create(['name' => 'user.delete', 'description' => 'Eliminar Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.store')->exists()) {
        //     Permission::create(['name' => 'user.store', 'description' => 'Crear Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.edit')->exists()) {
        //     Permission::create(['name' => 'user.edit', 'description' => 'Editar Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'user.update')->exists()) {
        //     Permission::create(['name' => 'user.update', 'description' => 'Actualizar Usuario'])->assignRole($role1);
        // }
        // if (!Permission::where('name', 'users.import')->exists()) {
        //     Permission::create(['name' => 'users.import', 'description' => 'Importar Usuarios'])->assignRole($role1);
        // }

    }
}
