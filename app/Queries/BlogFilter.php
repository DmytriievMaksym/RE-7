<?php
namespace App\Queries;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
class BlogFilter
{
    private const SORTABLE = [
        'title' => 'blogs.title',
        'categoryName' => 'category.category_name',
        'created' => 'blogs.dt_created',
    ];
    public function apply(array $input): Builder
    {
        $query = Blog::query()
            ->with(['category', 'filters'])
            ->leftJoin(
                'category',
                'blogs.category_id',
                '=',
                'category.category_id'
            )
            ->select('blogs.*');
        $query->when(
            $input['title'] ?? null,
            fn (Builder $q, $value) =>
            $q->where(
                'blogs.title',
                'like',
                "%{$value}%"
            )
        );
        $query->when(
            $input['categoryName'] ?? null,
            fn (Builder $q, $value) =>
            $q->where(
                'category.category_name',
                'like',
                "%{$value}%"
            )
        );
        $query->when(
            $input['category_id'] ?? null,
            fn (Builder $q, $value) =>
            $q->where('blogs.category_id', $value)
        );
        $query->when(
            $input['filter_id'] ?? null,
            fn (Builder $q, $value) =>
            $q->whereHas(
                'filters',
                fn (Builder $related) =>
                $related->whereKey($value)
            )
        );
        return $this->sort($query, $input['sort'] ?? null);
    }
    private function sort(
        Builder $query,
        ?string $sort
    ): Builder {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;
        if (!isset(self::SORTABLE[$field])) {
            return $query->orderByDesc('blogs.dt_created')
                ->orderByDesc('blogs.blog_id');
        }
        return $query
            ->orderBy(
                self::SORTABLE[$field],
                $desc ? 'desc' : 'asc'
            )
            ->orderByDesc('blogs.blog_id');
    }
}
