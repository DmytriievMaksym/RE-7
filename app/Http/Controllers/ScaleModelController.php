<?php

namespace App\Http\Controllers;

use App\Models\ScaleModel;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;
use App\Models\Nomination;
use Illuminate\Support\Arr;
use App\Queries\ModelFilter;
use App\Models\Author;

class ScaleModelController extends Controller
{
    public function index(Request $request, ModelFilter $filter)
    {
        $input = $request->validate([
            'name' => ['nullable', 'string', 'max:200'],
            'scale' => ['nullable', 'string', 'max:100'],
            'author_id' => [
                'nullable',
                'integer',
                'exists:authors,id',
            ],
            'author_name' => ['nullable', 'string', 'max:100'],
            'nominations' => [
                'nullable',
                'array',
            ],
            'nominations.*' => ['string', 'exists:nominations,key'],
            'sort' => ['nullable', 'string', 'max:30'],
        ]);

        //Отримую всі масштаби для фільтра
        $scales = ScaleModel::select('scale')
            ->distinct()
            ->orderBy('scale')
            ->pluck('scale');
        $authors = Author::select('id','name')
            ->orderBy('name')
            ->pluck('id','name');

        $nominations = $filter->nominationsWithCount($input);

        $models = $filter->apply($input)
            ->paginate(10)
            ->withQueryString();

        return view('model.index',compact('models','scales','nominations','authors'));
    }

    public function create()
    {
        $nominations = Nomination::with('translations')->get();
        return view('model.create', compact('nominations'));
    }

    public function store(ModelRequest $request)
    {
        $validated = $request->validated();
        $model = ScaleModel::create(Arr::except($validated, ['nominations']));
        $model->nominations()->sync($validated['nominations']);
        return redirect()->route('model.index');
    }

    public function show(ScaleModel $model)
    {
        $model->load('nominations.translations');
        return view('model.show', compact('model'));
    }

    public function edit(ScaleModel $model)
    {
        $nominations = Nomination::with('translations')->get();
        $selectedNominations = $model->nominations()->pluck('nominations.key')->toArray();
        return view('model.edit', compact('model','nominations','selectedNominations'));
    }

    public function update(ModelRequest $request, ScaleModel $model)
    {
        $validated = $request->validated();
        $model->update(Arr::except($validated, ['nominations']));
        $model->nominations()->sync($validated['nominations']);
        return redirect()->route('model.index');
    }

    public function destroy(ScaleModel $model)
    {
        $model->delete();
        return redirect()->route('model.index');
    }
}
