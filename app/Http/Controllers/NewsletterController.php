<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LatestNewsAPIRequest;
use App\Http\Requests\SearchNewsAPIRequest;
use Illuminate\Contracts\View\View;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        
        return view('welcome');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
  
        Newsletter::create($request->all());
  
        return redirect()->back()
                         ->with(['success' => 'Thank you for Subscribing. We will contact you shortly.']);   
    }

    public function latestNews(LatestNewsAPIRequest $request): View
    {
        $latestNews = $this->news->latestNews(
            $request->input('country'),
            $request->input('categories'),
        );
        return view('components.latest', compact('latestNews'));
    }

    public function searchNews(SearchNewsAPIRequest $request): View
    {
        $news = $this->news->searchNews(
            $request->input('new'),
            $request->input('sort'),
            $request->input('language')
        );
        return view('components.results', compact('news'));
    }
}
