<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            view: 'components.category-dropdown',
            data: [
                'categories' => Category::all(),
                'currentCategory' => Category::firstWhere(column: 'slug', value: request(key: 'category'))
            ]

        );
    }
}
