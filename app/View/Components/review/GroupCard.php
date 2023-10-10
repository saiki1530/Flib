<?php

namespace App\View\Components\review;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GroupCard extends Component
{
    protected $dataListReview;
    public function __construct($data)
    {
        $this->dataListReview = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review.group-card', ['dataListReview' => $this->dataListReview]);
    }
}
