@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-weight: bolder">Questions

                        <div>
                            <button class="btn btn-primary"><a style="color: white" href="{{ url('/home/viewAll') }}">View All Questions</a></button>
                        </div>


                        <form role="form" id="search-form" class="search-form" method="get" action="{{ url('/home/search') }}">
                            <div class="row float-lg-right">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Type Exact Question Name">
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" id="search-form">Search</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="card-body">

                        <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                            Create a question.
                        </a>

                        <div class="card-deck">
                            @forelse($questions as $question)
                                <div class="col-sm-4 d-flex align-items-stretch">
                                    <div class="card mb-3 ">
                                        <div class="card-header">
                                            <small class="text-muted">
                                                Updated: {{ $question->created_at->diffForHumans() }}
                                                Answers: {{ $question->answers()->count() }}
                                                <br>
                                                @if (\App\Profile::find ($question->user_id))
                                                    Created By: {{ \App\Profile::find ($question->user_id)->fname }}
                                                @else
                                                    Created By: {{ \App\User::find($question->user_id)->email }}
                                                @endif

                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{$question->body}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text">

                                                <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                    View
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty

                                    There are no questions to the view. Click here to create a question.

                            @endforelse
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $questions->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
