<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
  {
    //its just a dummy data object.
    $newpost = Post::where('status', 'PUBLISHED')->orderBy('id', 'desc')->take(3)->get();
    $categories = Category::all();

    // Sharing is caring
    View::share([
        'newpost' => $newpost,
        'categories' => $categories,
    ]);
  }
}
