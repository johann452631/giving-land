<?php

namespace App\Livewire\Favorites;

use App\Models\Post;
use Livewire\Attributes\Locked;
use Livewire\Component;

class FavoriteButton extends Component
{
    #[Locked]
    public $postId;

    public $isFavorite = false;

    public function toggleFavorite()
    {
        auth()->user()->favorites()->toggle($this->postId);
    }

    public function render()
    {
        return view('livewire.favorites.favorite-button');
    }
}
