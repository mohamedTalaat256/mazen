<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use App\Models\TopCompound;
use App\Traits\MyTrait;
use Exception;
use Illuminate\Http\Request;

class TopCompoundsController extends Controller
{
    use MyTrait;
    public function index()
    {
       
        $top_compounds = TopCompound::join('compounds', 'compounds.id', '=', 'top_compounds.compound_id')
            ->select( 
                'top_compounds.id as top_compound_id',
                'compounds.en_name as compound_name',
                'compounds.id as compound_id',
                'top_compounds.compound_order as compound_order',
                )
                ->orderBy('compound_order')
                ->get();

        return view('admin.top_compounds.index', compact('top_compounds'));
    }


    public function create()
    {
        $compounds = Compound::select('id', 'en_name')->get();
        return view('admin.top_compounds.create',compact( 'compounds'));
    }

    public function save(Request $request)
    {
        $data = array();
        $data['compound_order'] = $request->compound_order;
        $data['compound_id'] = $request->compound_id;

        try {
            TopCompound::create($data);
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'added success');
        } catch (Exception $ex) {
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'هناك خطاء.' . $ex);
        }
    }

    

    public function edit($id)
    {
        $top_compound =  TopCompound::where('top_compounds.id', $id)->join('compounds', 'compounds.id', '=', 'top_compounds.compound_id')
        ->select( 
            'top_compounds.id as top_compound_id',
            'compounds.en_name as compound_name',
            'compounds.id as compound_id',
            'top_compounds.compound_order as compound_order',
            )
        ->get()->first();
        
        $compounds = Compound::select('id', 'en_name')->get();
        return view('admin.top_compounds.edit', compact('top_compound', 'compounds'));
    }


    public function update(Request $request)
    {
        $data = array();
        $data['compound_order'] = $request->compound_order;
        $data['compound_id'] = $request->compound_id;

        try {
            TopCompound::where('top_compounds.id', $request->top_compound_id)->update($data);
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'updated success');
        } catch (Exception $ex) {
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'هناك خطاء.' . $ex);
        }
    }


    public function delete($id){
        try {
            TopCompound::where('id', $id)->delete();
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'deleted success');
        } catch (Exception $ex) {
            return redirect()->route('admin.top_compounds.index')->with('success-msg', 'هناك خطاء.' . $ex);
        }
    }
}
