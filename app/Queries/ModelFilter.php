<?php
namespace App\Queries;
use App\Models\ScaleModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nomination;
use Illuminate\Database\Eloquent\Collection;

class ModelFilter{
    private const SORTABLE = [
        'name' => 'models.name',
        'scale' => 'models.scale',
        'nominations_count' => 'nominations_count',
    ];

    public function apply(array $input): Builder{
        $query = ScaleModel::query()
            ->with(['nominations.translations', 'author'])
            ->leftJoin(
                'authors',
                'models.author_id',
                '=',
                'authors.id'
            )
            ->select('models.*')
            ->withCount('nominations');
        $query->when(
            $input['name'] ?? null,
            fn (Builder $q, $value) =>
            $q->where(
                'models.name',
                'like',
                "%{$value}%"
            )
        );
        $query->when(
            $input['scale'] ?? null,
            fn (Builder $q, $value) =>
            $q->where('models.scale', $value)
        );
        $query->when(
            $input['author_id'] ?? null,
            fn (Builder $q, $value) =>
            $q->where('models.author_id', $value)
        );
        $query->when(
            $input['authorName'] ?? null,
                fn (Builder $q, $value) =>
                $q->whereHas(
                    'author',
                    fn (Builder $authorQ) =>
                    $authorQ->where('name', 'like', "%{$value}%")
                )
        );
        $nominations = (array) ($input['nominations'] ?? []);
        if (!empty($nominations)) {
            foreach ($nominations as $key) {
                $query->whereHas(
                    'nominations',
                    fn (Builder $related) =>
                    $related->where('nominations.key', $key)
                );
            }
        }
        return $this->sort($query, $input['sort'] ?? null);
    }

    private function sort(
        Builder $query,
        ?string $sort
    ): Builder {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;
        if (!isset(self::SORTABLE[$field])) {
            return $query->orderByDesc('models.id');
        }
        return $query
            ->orderBy(
                self::SORTABLE[$field],
                $desc ? 'desc' : 'asc'
            )
            ->orderByDesc('models.id');
    }

    public function nominationsWithCount(array $input): Collection
    {
        return Nomination::with('translations')
            ->withCount([
                'models' => function (Builder $query) use ($input) {
                    $query->when(
                        $input['name'] ?? null,
                        fn (Builder $q, $value) =>
                        $q->where('models.name', 'like', "%{$value}%")
                    );
                    $query->when(
                        $input['scale'] ?? null,
                        fn (Builder $q, $value) =>
                        $q->where('models.scale', $value)
                    );
                    $query->when(
                        $input['author_id'] ?? null,
                        fn (Builder $q, $value) =>
                        $q->where('models.author_id', $value)
                    );
                    $query->when(
                        $input['authorName'] ?? null,
                            fn (Builder $q, $value) =>
                            $q->whereHas(
                                'author',
                                fn (Builder $authorQ) =>
                                $authorQ->where('name', 'like', "%{$value}%")
                            )
                    );
                    $nominations = (array) ($input['nominations'] ?? []);
                    if (!empty($nominations)) {
                        foreach ($nominations as $key) {
                            $query->whereHas(
                                'nominations',
                                fn (Builder $related) =>
                                $related->where('nominations.key', $key)
                            );
                        }
                    }
                },
            ])
            ->get();
    }
}
