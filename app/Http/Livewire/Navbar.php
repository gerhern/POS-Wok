<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $navData = $this->navigation(true);
        
        return view('livewire.navbar',[
            'tabs'   => $navData['tabs'],
        ]);
    }

    public function navigation($user){
        if($user){
            $tabs =[
                'Home'       => 'home',
                'Ventas'     => 'ventas',
                'Inventario' => 'inventario',
                'Horarios'   => 'horarios',
                'Empleados'  => 'empleados',
                'Provedores' => 'provedores'
            ];
        }else{
            $tabs =[
                'Home'       => 'home',
                'Ventas'     => 'ventas',
                'Horarios'   => 'horarios',
                'Provedores' => 'provedores'
            ];
        }
        return $data = [
            'tabs'   => $tabs,
        ];
    }
}
