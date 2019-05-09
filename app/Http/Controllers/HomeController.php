<?php

namespace App\Http\Controllers;
use App\User;
use App\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= Auth::user();

        $questionTest=$user->questions()->paginate(6);
        //$questionTest=Question::all();

        //$sorted=$questionTest->sortByDesc('created_at');
        //$questionTest=$sorted->values()->all();
        //$questionTest=$this->paginate($questionTest);
        return view('home')->with('questions',$questionTest);
    }

    public function paginate($items,$perPage=9, $page=null, $baseUrl="/home", $options=[]){

        $page=$page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items=$items instanceof Collection ? $items : Collection::make($items);

        $lap=new LengthAwarePaginator($items->forPage($page, $perPage),
        $items->count(), $perPage,$page,$options);

        if($baseUrl){
            $lap->setPath($baseUrl);
        }

        return $lap;
    }

    public function search(Request $request)
    {
        $questions = Question::all()->where('body', $request->name);
        return view('search')->with('questions', $questions);
    }

    public function sortAll()
    {
        $questions = Question::all()->sortByDesc('updated_at');
        return view('viewAll')->with('questions', $questions);
    }

    public function sort()
    {
        $user = Auth::user();
        $questions = $user->questions()->orderByDesc('updated_at')->paginate(6);
        return view('home')->with('questions', $questions);
    }

    public function showAllQuestions()
    {
        $questions = Question::all();
        return view('viewAll')->with('questions', $questions);
    }
}
