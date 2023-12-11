<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Fieldtype;
use Illuminate\Http\Request;

class UserFieldController extends Controller
{

    public function userIndex()
    {
        $fields = Field::with(['fieldtypes', 'timetables', 'partners'])->paginate(10);
        $fieldtypes = Fieldtype::select('id', 'name')->get();

        return view('user.field', [
            'fields' => $fields,
            'fieldtypes' => $fieldtypes,
        ]);
    }

    public function userShow($slug)
    {
        $fields = Field::with(['fieldtypes', 'timetables'])
        ->where('slug', $slug)
        ->first();
        return view('user.detail', ['fields' => $fields]);
    }
}
