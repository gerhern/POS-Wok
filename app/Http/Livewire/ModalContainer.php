<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalContainer extends Component
{
    public function render()
    {
        $user = auth()->user();
        $navData = $this->modals($user->privileges);
        return view('livewire.modal-container', [
            'modals' => $navData['modals']
        ]);
    }

    public function modals($privileges){
        //esta funcion retorna un array con 2 arrays dentro
        //1.-el arrat muestra el titulo del modal como clave y el texto de descripcion como valor
        if($privileges == 'Admn'){
            $modals =[
                'Ventas'    => 'Realizar Ventas',
                'Inventario'=> 'Gestionar inventario',
                'Horarios'  => 'Check-In/Check-Out',
                'Empleados' => 'Gestionar Altas/Bajas',
                'Provedores'=> 'Gestionar Citas'
            ];
        }else if($privileges == 'User'){
            $modals =[
                'Ventas'    => 'Realizar Ventas',
                'Horarios'  => 'Check-In/Check-Out',
                'Provedores'=> 'Gestionar Citas'
            ];
        }
        
        return $data = [
            'modals' => $modals];
    }
}
