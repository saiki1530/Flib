<?php

namespace App\View\Components\review;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    protected $dataReviewItem;
    public function __construct($data)
    {
        $this->dataReviewItem = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review.card', ['reviewItem' => $this->dataReviewItem]);
    }
}
