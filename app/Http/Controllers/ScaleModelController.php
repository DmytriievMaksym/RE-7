<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\ScaleModel;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;
use App\Models\Nomination;
use Illuminate\Support\Arr;

class ScaleModelController extends Controller
{
    public function index(Request $request)
    {
        //Отримую всі масштаби для фільтра
        $scales = ScaleModel::select('scale')
            ->distinct()
            ->orderBy('scale')
            ->pluck('scale');

        $selectedNominations = (array) ($request->query('nominations'));
        $selectedScale = request()->query('scale');

        $nominations = Nomination::with('translations')
            ->withCount(['models' => function ($query) use ($selectedScale, $selectedNominations) {
                $query->when($selectedScale, function ($q) use ($selectedScale) {
                    $q->where('scale', $selectedScale);
                });
                foreach ($selectedNominations as $key) {
                    $query->whereHas('nominations', function ($subQ) use ($key) {
                        $subQ->where('nominations.key', $key);
                    });
                }
            }])
            ->get();

        $models = ScaleModel::with('nominations.translations')
            ->when($selectedScale, function ($query) use ($selectedScale) {
                $query->where('scale', $selectedScale);
            })
            ->when($selectedNominations, function ($query) use ($selectedNominations) {
                foreach ($selectedNominations as $key) {
                    $query->whereHas('nominations', function ($q) use ($key) {
                        $q->where('nominations.key', $key);
                    });
                }
            })
            ->orderBy('id')->paginate(10)->withQueryString();

        return view('model.index',compact('models','scales','nominations'));
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
