<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\LinkWidget;
use App\Models\Pejabat;
use App\Models\Pengumuman;
use App\Models\Slide;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class FrontendController extends Controller
{
    
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }
    public function home()
    {
        $categories = Category::all();
        $slides = Slide::orderBy('id', 'asc')->paginate(3);
        $links = LinkWidget::orderBy('id', 'asc')->get();
        $posts = Post::where('status', 'PUBLISHED')->orderBy('id', 'desc')->paginate(10);
        $pengumumans = Pengumuman::where('status', 'PUBLISHED')->orderBy('id', 'desc')->paginate(10);
        return view('home', compact('categories', 'posts', 'pengumumans', 'slides', 'links'));
    }
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('page', compact('page'));
    }
    public function strukturorganisasi($slug)
    {
        $organisasi = StrukturOrganisasi::where('slug', $slug)->first();
        return view('struktur-organisasi', compact('organisasi'));
    }
    public function pengumuman()
    {
        $pengumumans = Pengumuman::where('status', 'PUBLISHED')->orderBy('id', 'desc')->paginate(10);


        return view('pengumuman', compact('pengumumans'));
    }
    public function galery()
    {
        $galeries = Galery::where('status', 'PUBLISHED')->orderBy('id', 'desc')->paginate(10);
        return view('list-galery', compact('galeries'));
    }
    public function detailgalery($id)
    {

        $galery = Galery::where('id', $id)
            ->firstOrFail();
        return view('galery', compact('galery'));
    }

    public function berita($slug)
    {

        $category = Category::where('slug', $slug)
            ->firstOrFail();


        if ($category) {
            $posts = Post::where('status', 'PUBLISHED')->where('category_id', $category->id)->paginate(5);

            return view('list-berita', compact('posts', 'category',));
        }
    }
    public function kategori($slug)
    {
        $category = Category::where('slug', $slug)
            ->firstOrFail();


        if ($category) {
            $posts = Post::where('status', 'PUBLISHED')->where('category_id', $category->id)->paginate(5);
            return view('list-berita', compact('posts', 'category',));
        }
    }

    public function detailberita($category, $post)
    {

        $cat = Category::where('slug', $category)
            ->firstOrFail();


        if ($cat) {
            $post = Post::where('slug', $post)
                ->firstOrFail();
            return view('berita', compact('post', 'category',));
        }
    }
    public function pejabat()
    {
        $pejabats = Pejabat::all();
        return view('profile-pejabat', compact('pejabats'));
    }
    public function detailpejabat($slug)
    {
        $pejabat = Pejabat::where('slug', $slug)
            ->firstOrFail();
        return view('detail-pejabat', compact('pejabat'));
    }
}
