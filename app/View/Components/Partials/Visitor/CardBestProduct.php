<?php

namespace App\View\Components\Partials\Visitor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardBestProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $favoritProduct
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.visitor.card-best-product');
    }
}
