<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        
        $user = auth()->user();
        $navData = $this->navigation($user->privileges);
        
        return view('livewire.navbar',[
            'tabs'   => $navData['tabs'],
        ]);
    }

    public function navigation($privileges){
        

        if($privileges == 'Admn'){
            $tabs =[
                'Home'         => '/',
                //'Ventas'     => '/ventas',
                //'Inventario' => '/inventario',
                'Horarios'     => '/horarios',
                'Empleados'    => '/empleados',
                'Proveedores'   => '/proveedores'
            ];
        }else if($privileges == 'User'){
            $tabs =[
                'Home'         => '/',
                //'Ventas'     => '/ventas',
                'Horarios'     => '/horarios',
                'Proveedores'  => '/proveedores'
            ];
        }
        return $data = [
            'tabs'   => $tabs,
        ];
    }
}
