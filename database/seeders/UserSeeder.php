<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Repartidor;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;  // para la contrsenia
use Spatie\Permission\Models\Role;    // crear roles
use Spatie\Permission\Models\Permission; // crear permisos
use App\Models\provedor;
use App\Models\ppersona;
use App\Models\pempresa;

use function Ramsey\Uuid\v1;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //creacion de roles y permisos 
       $role1=Role::create(['name'=>'Administrador']);
       $role2=Role::create(['name'=>'Cliente']);
       $role3=Role::create(['name'=>'Repartidor']);
       $role4=Role::create(['name'=>'Recepcionesta']);
       
       Permission::create(['name'=> 'catalogo', 'subname'=> 'catalogo principal'])->syncRoles([$role1,$role2,$role3,$role4]);
       //administracion usuarios
       Permission::create(['name'=> 'usuario', 'subname'=> 'usuario principal','tipo'=>2])->syncRoles([$role1,$role4]);
       Permission::create(['name'=> 'usuario.editar', 'subname'=> 'editar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.eliminar', 'subname'=> 'eliminar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.agregar', 'subname'=> 'agregar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.eliminados', 'subname'=> 'ver usuarios eliminados','tipo'=>2])->syncRoles([$role1,$role4]);
       Permission::create(['name'=> 'usuario.restore', 'subname'=> 'restaurar usuarios eliminados','tipo'=>2])->syncRoles([$role1]);
       //administracion roles
       Permission::create(['name'=> 'rol', 'subname'=> 'rol principal','tipo'=>3])->syncRoles([$role1,$role4]);
       Permission::create(['name'=> 'rol.editar', 'subname'=> 'editar rol','tipo'=>3])->syncRoles([$role1,$role4]);
       Permission::create(['name'=> 'rol.eliminar', 'subname'=> 'eliminar rol','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.agregar', 'subname'=> 'agregar rol','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.eliminados', 'subname'=> 'ver rol eliminados','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.restore', 'subname'=> 'restaurar rol eliminados','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.permiso', 'subname'=> 'ver permisos del rol','tipo'=>3])->syncRoles([$role1]);
        //administracion provedor
        Permission::create(['name'=> 'provedor', 'subname'=> 'provedor principal','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.editar', 'subname'=> 'editar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.eliminar', 'subname'=> 'eliminar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.agregar', 'subname'=> 'agregar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.eliminados', 'subname'=> 'ver provedor eliminados','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.restore', 'subname'=> 'restaurar provedor eliminados','tipo'=>4])->syncRoles([$role1]);
        //administracion cliente
        Permission::create(['name'=> 'cliente', 'subname'=> 'cliente principal','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.editar', 'subname'=> 'editar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.eliminar', 'subname'=> 'eliminar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.agregar', 'subname'=> 'agregar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.eliminados', 'subname'=> 'ver cliente eliminados','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.restore', 'subname'=> 'restaurar cliente eliminados','tipo'=>5])->syncRoles([$role1]);
           //administracion categoria
        Permission::create(['name'=> 'categoria', 'subname'=> 'categoria principal','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.editar', 'subname'=> 'editar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.eliminar', 'subname'=> 'eliminar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.agregar', 'subname'=> 'agregar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.eliminados', 'subname'=> 'ver categoria eliminados','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.restore', 'subname'=> 'restaurar categoria eliminados','tipo'=>6])->syncRoles([$role1]);
        //administracion ingrediente
        Permission::create(['name'=> 'ingrediente', 'subname'=> 'ingrediente principal','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.editar', 'subname'=> 'editar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.eliminar', 'subname'=> 'eliminar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.agregar', 'subname'=> 'agregar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.eliminados', 'subname'=> 'ver ingrediente eliminados','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.restore', 'subname'=> 'restaurar ingrediente eliminados','tipo'=>7])->syncRoles([$role1]);
        //administracion empleado
        Permission::create(['name'=> 'empleado', 'subname'=> 'empleado principal','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.editar', 'subname'=> 'editar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.eliminar', 'subname'=> 'eliminar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.agregar', 'subname'=> 'agregar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.eliminados', 'subname'=> 'ver empleado eliminados','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.restore', 'subname'=> 'restaurar empleado eliminados','tipo'=>8])->syncRoles([$role1]);
        //administracion repartidor
        Permission::create(['name'=> 'repartidor', 'subname'=> 'repartidor principal','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.editar', 'subname'=> 'editar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.eliminar', 'subname'=> 'eliminar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.agregar', 'subname'=> 'agregar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.eliminados', 'subname'=> 'ver repartidor eliminados','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.restore', 'subname'=> 'restaurar repartidor eliminados','tipo'=>9])->syncRoles([$role1]);
        //administracion reportes
        Permission::create(['name'=> 'reporte', 'subname'=> 'reporte principal','tipo'=>10])->syncRoles([$role1]);
        Permission::create(['name'=> 'reporte.stock_minimo', 'subname'=> 'mostrar reporte de stock minimos','tipo'=>10])->syncRoles([$role1]);
        Permission::create(['name'=> 'reporte.rango_de_fechas', 'subname'=> 'mostrar reportes con rango de fechas','tipo'=>10])->syncRoles([$role1]);
        // graficos
        Permission::create(['name'=> 'grafico', 'subname'=> 'mostrar graficos de promedios','tipo'=>11])->syncRoles([$role1]);
        //administracion pedido
        Permission::create(['name'=> 'pedido', 'subname'=> 'pedido principal','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.editar', 'subname'=> 'mostrar editar pedidos','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.solicitudes', 'subname'=> 'permitir aceptar solicitudes','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.asignar', 'subname'=> 'asignar repartidor a pedidos','tipo'=>12])->syncRoles([$role1]);
        //produccion
        Permission::create(['name'=> 'produccion', 'subname'=> 'produccion principal','tipo'=>13])->syncRoles([$role1]);
        Permission::create(['name'=> 'produccion.nuevo', 'subname'=> 'crear produccion','tipo'=>13])->syncRoles([$role1]);
        Permission::create(['name'=> 'produccion.terminados', 'subname'=> 'ver estado de produccion','tipo'=>13])->syncRoles([$role1]);
        //administracion productor
        Permission::create(['name'=> 'producto', 'subname'=> 'producto principal','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.editar', 'subname'=> 'editar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.eliminar', 'subname'=> 'eliminar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.agregar', 'subname'=> 'agregar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.eliminados', 'subname'=> 'ver producto eliminados','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.restore', 'subname'=> 'restaurar producto eliminados','tipo'=>14])->syncRoles([$role1]);

       $admin=user::create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('123'),
       ])->assignRole('Administrador');

       Empleado::create([
        'nombre'=>'admin',
        'apellidos'=>'uagrm',
        'edad'=>50,
        'sueldo'=>6950,
        'direccion'=>'montero-c. avaroa',
        'telefono'=>67126631,
        'id_usuario'=>$admin->id,
        ]);

       $c1=user::create([
        'name' => 'antonio',
        'email' => 'antonio@gmail.com',
        'password' => Hash::make('123'),
        ])->assignRole('Cliente'); 

       Cliente::create([
            'nombre'=>'Antonio',
            'apellidos'=>'Arteaga ',
            'edad'=>21,
            'telefono'=>71781881,
            'id_usuario'=>$c1->id,
        ]);

       $c2=user::create([
        'name' => 'Ariel',
        'email' => 'ariel@gmail.com',
        'password' => Hash::make('123'),
        ])->assignRole('Repartidor');

       Repartidor::create([
       'nombre'=>'Ariel',
       'apellidos'=>'censo',
       'edad'=>21,
       'nro_licencia'=>'Categoria A',
       'telefono'=>67628811,
       'id_usuario'=>$c2->id,
       ]);
    //creacion de UserRepartirdor
       
       $UserRepartirdor2=user::create([
        'name' => 'carlos',
        'email' => 'carlos@gmail.com',
        'password' => Hash::make('123'),
        ])->assignRole('Repartidor');

       Repartidor::create([
       'nombre'=>'carlos',
       'apellidos'=>'vargas',
       'edad'=>21,
       'nro_licencia'=>'Categoria A',
       'telefono'=>76521212,
       'id_usuario'=>$UserRepartirdor2->id,
       ]);
       
        $p1=provedor::create([
         'direccion' => 'santa cruz de la sierra',
         'telefono' => '823822',
         'correo' => 'diego@gmail.com',
         ]);
 
        ppersona::create([
        'nombre'=>'diego',
        'apellidos'=>'quiroga',
        'id'=>$p1->id,
        ]);

        $p3=provedor::create([
         'direccion' => 'santa cruz de la sierra',
         'telefono' => '64532',
         'correo' => 'juan@gmail.com',
         ]);
 
        ppersona::create([
        'nombre'=>'juan',
        'apellidos'=>'condori',
        'id'=>$p3->id,
        ]);
        $p4=provedor::create([
         'direccion' => 'minero',
         'telefono' => '64532',
         'correo' => 'fernando@gmail.com',
         ]);
 
        ppersona::create([
        'nombre'=>'fernando',
        'apellidos'=>'rodrigez',
        'id'=>$p4->id,
        ]);

        $p2=provedor::create([
         'direccion' => 'montero av. avaroa',
         'telefono' => '322465',
         'correo' => 'panes@gmail.com',
         ]);
 
        pempresa::create([
        'razonsocial'=>'comerciante de Panes Frescos',
        'id'=>$p2->id,
        ]); 

    }
}
