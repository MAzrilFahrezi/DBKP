<?php

namespace App\Http\Controllers;

use App\Http\Resources\InspectionResource;
use App\Models\Inspection;
use Illuminate\Http\Request;

class inspectionController extends Controller
{
    public function index()
    {
        return InspectionResource::collection(Inspection::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_of_inspection' => 'required|string',
            'next_date_of_inspection' => 'required|string',
            'new_supply' => 'required|boolean',
            'inspected' => 'required|boolean',
            'refill' => 'required|boolean',
            'services' => 'required|boolean',
            'pressure_test' => 'required|boolean',
            'check_weight' => 'required|boolean',
        ]);

        Inspection::create($validated);

        return[
            'Message' => 'Input Inspection Berhasil',
        ];
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date_of_inspection' => 'string',
            'next_date_of_inspection' => 'string',
            'new_supply' => 'boolean',
            'inspected' => 'boolean',
            'refill' => 'boolean',
            'services' => 'boolean',
            'pressure_test' => 'boolean',
            'check_weight' => 'boolean',
        ]);

        $kapal = Inspection::find($id);
        $kapal->update($validated);


        return [
            'Message' => 'Data Inspection Berhasil di Update'
        ];

    }

    public function destroy($id)
    {
        $kapal = Inspection::find($id);
        if($kapal){
            $kapal->delete();
            return [
                'Message' => 'Data Insepction Berhasil di Hapus'
            ];
        }
    }
}
