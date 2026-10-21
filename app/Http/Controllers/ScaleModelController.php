<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\ScaleModel;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;

class ScaleModelController extends Controller
{
    public function index(Request $request)
    {
        //Отримую всі масштаби для фільтра
        $scales = ScaleModel::select('scale')
            ->distinct()
            ->orderBy('scale')
            ->pluck('scale');

        $categories = CategoryEnum::cases();

        $models = ScaleModel::query()
            //Запит із фільтрацією масштабу
            ->when($request->filled('scale'), function ($query) use ($request) {
            $query->where('scale', $request->query('scale'));})
            //Запит із фільтрацією категорій
            ->when($request->filled('categories'), function ($query) use ($request) {
                $selectedCategories = (array) $request->query('categories');
                $query->where(function ($subQuery) use ($selectedCategories) {
                    foreach ($selectedCategories as $cat) {
                        $value = (string) ($cat->value ?? $cat);
                        $subQuery->whereJsonContains('categories', $value);
                    }
                });
            })
            ->orderBy('id')->paginate(10)->withQueryString();

        return view('model.index',compact('models','scales','categories'));
    }

    public function create()
    {
        return view('model.create', ['categories'=> CategoryEnum::cases()]);
    }

    public function store(ModelRequest $request)
    {
        ScaleModel::create($request->validated());
        return redirect()->route('model.index');
    }

    public function show(ScaleModel $model)
    {
        return view('model.show', compact('model'));
    }

    public function edit(ScaleModel $model)
    {
        return view('model.edit', compact('model'),['categories'=> CategoryEnum::cases()]);
    }

    public function update(ModelRequest $request, ScaleModel $model)
    {
        $model->update($request->validated());
        return redirect()->route('model.index');
    }

    public function destroy(ScaleModel $model)
    {
        $model->delete();
        return redirect()->route('model.index');
    }
}
