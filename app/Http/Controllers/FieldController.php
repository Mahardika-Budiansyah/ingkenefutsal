<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Fieldtype;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFieldRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateFieldRequest;

class FieldController extends Controller
{
    protected $activePage = 'field';

    public function index() {
        $userId = Auth::guard('partner')->user()->id;
        $fields = Field::with(['fieldtypes', 'timetables', 'partners'])->where('partner_id', $userId)->paginate(10);

        $title = 'Delete Data!';
        $text = "Yakin menghapus data lapangan?";
        confirmDelete($title, $text);

        return view('partner.fields.field', [
            'fields' => $fields,
            'activePage' => $this->activePage
        ]);
    }

    public function show($slug) {

        $field = Field::with(['fieldtypes', 'timetables'])
            ->where('slug', $slug)
            ->first();
        return view('partner.fields.detail', ['field' => $field, 'activePage' => $this->activePage]);
    }

    public function create() {

        $fieldtypes = Fieldtype::select('id', 'name')->get();
        $timetables = Timetable::select('id', 'name')->get();

        return view(
            'partner.fields.create',
            [
                'fieldtypes' => $fieldtypes,
                'timetables' => $timetables,
                'activePage' => $this->activePage
            ]
        );
    }

    public function store(StoreFieldRequest $request) {

        $newField = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newField = $request->name . '-' . now()->timestamp . '.' . $extension;
            $filePath = $request->file('image')->storeAs('lapangan/image', $newField, 'public');

        }

        $request['image'] = $newField;      

        $field = Field::create($request->all());
        $field->timetables()->sync($this->mapTimetables($request['timetables']));

        Alert::toast('Data lapangan berhasil ditambah!', 'success');

        return redirect()->route('field.index');
    }

    public function edit(Request $request, $slug) {

        $field = Field::with(['timetables', 'fieldtypes'])->where('slug', $slug)->first();
        $fieldtypes = Fieldtype::where('id', '!=', $field->fieldtype_id)->get(['id', 'name']);

        $timetables = Timetable::get()->map(function ($timetable) use ($field) {
            $timetable->value = data_get($field->timetables->firstWhere('id', $timetable->id), 'pivot.price') ?? null;
            return $timetable;
        });

        return view('partner.fields.edit', [
            'timetables' => $timetables,
            'field' => $field,
            'fieldtypes' => $fieldtypes,
            'activePage' => $this->activePage
        ]);
    }

    public function update(UpdateFieldRequest $request, $id) {

        $field = Field::findOrFail($id);

        $field->update($request->all());
        $field->timetables()->sync($this->mapTimetables($request['timetables']));

        Alert::toast('Data lapangan berhasil diperbarui!', 'success');

        return redirect()->route('field.index');
    }

    public function destroy($id) {
        try {
            $field = Field::findOrFail($id);
            $field->delete();
            Alert::toast('Data lapangan berhasil dihapus!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Terjadi kesalahan saat menghapus data!', 'error');
        }
    
        return redirect()->back();
    }

    private function mapTimetables($timetables)
    {

        return collect($timetables)->map(function ($i) {
            return ['price' => $i];
        });
    }
}
