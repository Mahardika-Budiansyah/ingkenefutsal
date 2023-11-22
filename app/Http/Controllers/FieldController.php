<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Fieldtype;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;

class FieldController extends Controller
{
    public function index() {
        $fields = Field::paginate(10);
        $fieldtypes = Fieldtype::select('id', 'name')->get();
        $timetables = Timetable::select('id', 'name')->get();

        // $title = 'Delete Data!';
        // $text = "Yakin menghapus data lapangan?";
        // confirmDelete($title, $text);

        return view('partner.fields.field', [  'fields' => $fields ,
                                        'fieldtypes' => $fieldtypes,
                                        'timetables' => $timetables]);
    }

    public function show($slug) 
    {
        $field = Field::with(['fieldtypes','timetables'])
                ->where('slug', $slug)
                ->first();
        return view ('partner.fields.detail', ['field' => $field]);
    }

    public function store(StoreFieldRequest $request)
    {
        $newField = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newField = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('public/lapangan/image', $newField);
        }

        $request['image'] = $newField;

        $field= Field::create($request->all());
        $field->timetables()->sync($this->mapTimetables($request['timetables']));

        // Alert::toast('Data lapangan berhasil ditambah!', 'success');

        return redirect()->route('field.index')->with('error', 'Data lapangan berhasil ditambah');
    }

    public function edit(Request $request, $slug) 
    {
        $field = Field::with(['timetables', 'fieldtypes'])->where('slug', $slug)->first();
        $fieldtypes = Fieldtype::where('id','!=', $field->fieldtype_id)->get(['id', 'name']);

        $timetables = Timetable::get()->map(function($timetable) use($field) {
            $timetable->value = data_get($field->timetables->firstWhere('id', $timetable->id), 'pivot.price') ?? null;
            return $timetable;
        });
        
        return view('partner.fields.edit', ['timetables' => $timetables,
                                    'field' => $field,
                                    'fieldtypes' => $fieldtypes,
                                    ]);
    }

    public function update(UpdateFieldRequest $request, $id)
    {
        $field = Field::findOrFail($id);

        $field->update($request->all());
        $field->timetables()->sync($this->mapTimetables($request['timetables']));

        // Alert::toast('Data lapangan telah diperbarui', 'success');

        return redirect()->route('field.index')->with('error', 'Data lapangan telah diperbarui');
    }

    public function destroy(Field $id)
    {
        $id->delete();
        // alert()->success('Hore!','Field Deleted Successfully');
        // Alert::toast('Data lapangan telah dihapus', 'success');

        // Alert::toast('Data lapangan telah dihapus!', 'success');

        return redirect()->route('field.index')->with('error', 'Data lapangan telah dihapus');
    }

    private function mapTimetables($timetables)
    {
        return collect($timetables)->map(function ($i) {
            return ['price' => $i];
        });
    }
}
