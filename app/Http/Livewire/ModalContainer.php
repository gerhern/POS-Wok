<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalContainer extends Component
{
    public function render()
    {
        $navData = $this->modals(true);
        return view('livewire.modal-container', [
            'modals' => $navData['modals']
        ]);
    }

    public function modals($user){
        //esta funcion retorna un array con 2 arrays dentro
        //1.-el arrat muestra el titulo del modal como clave y el texto de descripcion como valor
        if($user){
            $modals =[
                'Ventas'    => 'Realizar Ventas',
                'Inventario'=> 'Gestionar inventario',
                'Horarios'  => 'Check-In/Check-Out',
                'Empleados' => 'Gestionar Altas/Bajas',
                'Provedores'=> 'Gestionar Citas'
            ];
        }else{
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
