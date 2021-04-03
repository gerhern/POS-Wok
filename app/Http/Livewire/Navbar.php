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
                'Home'       => 'home',
                'Ventas'     => 'ventas',
                'Inventario' => 'inventario',
                'Horarios'   => 'horarios',
                'Empleados'  => 'empleados',
                'Provedores' => 'provedores'
            ];
        }else if($privileges == 'User'){
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
