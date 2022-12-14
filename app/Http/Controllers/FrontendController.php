<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Demografi;
use App\Models\Gallery;
use App\Models\MicroSmallAndMediumEnterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $headOfFamily = Demografi::sum('head_of_family');
        $inhabitant = Demografi::sum('inhabitant');
        $toddler = Demografi::sum('toddler');
        $elderly = Demografi::sum('elderly');
        $gallery = Gallery::latest()->limit(6)->get();

        return view("index", [
            "headOfFamily" => $headOfFamily,
            "inhabitant"   => $inhabitant,
            "toddler"      => $toddler,
            "elderly"      => $elderly,
            "gallery"      => $gallery,
            "parent"       => "Beranda",
        ]);
    }

    public function umkm()
    {
        $data = MicroSmallAndMediumEnterprise::where("status", MicroSmallAndMediumEnterprise::STATUS_PUBLISHED)->latest()->paginate(10);
        
        return view('umkm', [
            'data' => $data,
            'parent' => 'UMKM'
        ]);
    }

    public function detailUmkm($slug)
    {
        $item = MicroSmallAndMediumEnterprise::where('slug', $slug)
            ->whereIn("status", [
                MicroSmallAndMediumEnterprise::STATUS_PUBLISHED,
                MicroSmallAndMediumEnterprise::STATUS_UNLISTED,
            ])
            ->firstOrFail();
        
        return view('umkm-detail', [
            'item' => $item,
            'parent' => 'UMKM'
        ]);
    }

    public function news()
    {
        $blog = Blog::where("status", Blog::STATUS_PUBLISHED)->latest()->paginate(5);
        $anotherNews = Blog::inRandomOrder()->where("status", Blog::STATUS_PUBLISHED)->limit(5)->get();
        $countBlogByCategories = DB::select("select count(b.id) as count, c.name
            from blogs b 
            join categories c on c.id = b.category_id 
            where b.status = 'published'
            group by c.id, c.name");

        return view("news",[
            "parent"                => "Berita",
            "anotherNews"           => $anotherNews,
            "blog"                  => $blog,
            "countBlogByCategories" => $countBlogByCategories,
        ]);
    }

    public function newsDetail($slug)
    {
        $blog = Blog::where("slug", $slug)
            ->whereIn("status", [
                Blog::STATUS_PUBLISHED,
                Blog::STATUS_UNLISTED,
            ])
            ->firstOrFail();
        $anotherNews = Blog::where("status", Blog::STATUS_PUBLISHED)->inRandomOrder()->limit(5)->get();
        $countBlogByCategories = DB::select("select count(b.id) as count, c.name
            from blogs b 
            join categories c on c.id = b.category_id 
            where b.status = 'published'
            group by c.id, c.name");

        return view("news-detail",[
            "parent"                => "Berita",
            "anotherNews"           => $anotherNews,
            "blog"                  => $blog,
            "countBlogByCategories" => $countBlogByCategories,
        ]);
    }
}
