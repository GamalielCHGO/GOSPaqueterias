<?php

namespace App\Exports;

use App\Models\Envio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnviosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $ids=[];
    public function __construct($ids)
    {

        $this->ids=$ids;
    }

    public function collection()
    {
        return Envio::select('id','guia','nombre_remitente','direccion_remitente','telefono_remitente','correo','rfc','nombre_destino','correo_destino'
        ,'direccion_destino','telefono_destino','fecha_envio','sucursal_origen','sucursal_destino','total','cantidad','id_transporte')->whereIn('id',$this->ids)->get();
    }
    public function headings(): array
    {
        return ['id','guia','nombre_remitente','direccion_remitente','telefono_remitente','correo','rfc','nombre_destino','correo_destino'
        ,'direccion_destino','telefono_destino','fecha_envio','sucursal_origen','sucursal_destino','total','cantidad','id_transporte'];
    }
}
