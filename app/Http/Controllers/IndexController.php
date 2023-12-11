<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Portfolio;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->route('locale') ?? App::getLocale();

        $portfolios = Portfolio::with(['translation' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->paginate(4);

        return view('index.index', compact('portfolios'));
    }

    public function detail(Request $request)
    {
        $locale = $request->route('locale') ?? App::getLocale();
        $id = $request->id;

        $portfolio = Portfolio::with(['translation' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->where('id', $id)->first();
        return view('index.detail', compact('portfolio'));
    }
}
