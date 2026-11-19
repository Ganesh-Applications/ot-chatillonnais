<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sticker extends Component
{
    /**
     * Classes Tailwind par couleur de catégorie.
     */
    private const COLORS = [
        'blue' => ['bg' => 'bg-chip-blue-bg', 'border' => 'border-chip-blue-border', 'text' => 'text-chip-blue-text'],
        'green' => ['bg' => 'bg-chip-green-bg', 'border' => 'border-chip-green-border', 'text' => 'text-chip-green-text'],
        'purple' => ['bg' => 'bg-chip-purple-bg', 'border' => 'border-chip-purple-border', 'text' => 'text-chip-purple-text'],
        'red' => ['bg' => 'bg-chip-red-bg', 'border' => 'border-chip-red-border', 'text' => 'text-chip-red-text'],
    ];

    private const DEFAULT_COLOR = 'blue';

    public $label;
    public $icon;
    public array $classes;

    public function __construct($label, $categoryId)
    {
        $this->label = $label;
        $this->icon = get_field('icon', 'term_' . $categoryId);

        $color = get_field('color', 'term_' . $categoryId);
        $this->classes = self::COLORS[$color] ?? self::COLORS[self::DEFAULT_COLOR];
    }

    public function render(): View|Closure|string
    {
        return view('components.sticker');
    }
}
