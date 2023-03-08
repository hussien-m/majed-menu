<?php

namespace App\View\Components;

use App\Models\Section;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $sections;
    public function __construct()
    {
        $this->sections = Section::paginate(4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-component');
    }
}
