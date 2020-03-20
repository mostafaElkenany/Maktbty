@extends('layouts.userHome')

@section('content')


<!-- <div class="container">
<div class="row">
<div class="col-md-2">
        <p class="lead">Category</p>
        <div class="list-group"> -->
        <!-- @foreach($list_category as $category)  -->
         <!-- <a href="/category/{{$category->id}}" class="list-group-item">{{ $category->name }}</a> -->
            <!-- --> 
        <!-- <form action="{{ route('category') }}" method="GET">
            {{csrf_field()}}
                 <div class="input-group">
                    <input type="hidden" class="form-control" name="categoryTerm"value="{{ isset($category->id) ? $category->id : '' }}">
                     <span class="input-group-btn">
                            <button class="btn btn-secondary" style="width:150px;" type="submit">{{ $category->name }}</button>
                    </span>
                 </div>
               
            </form>    -->
                        <!-- --> 
   
        <!-- @endforeach -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-md-9"> -->
    <div class="row">
    
    <div class="container">
    <div class="spacedCards">
    @foreach ($book_data as $book)
      <div class="card" class="col-md-9" style="width: 18rem;">
        <img src="{{ URL::to('/images') }}/{{$book->pic}}"  style="width: 18rem;height:15rem;"class="img-book" alt="{{$book -> title}}'s pic">
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a></h5>
            <h4 class="pull-right">${{$book -> price}}</h4>
            <h6 class="card-text">  author is {{$book -> author}}, book pages are {{$book -> page_count}}.</h6>
            <h6 class="card-text">{{mb_strimwidth($book->summary, 0, 10,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a></h6>

            <h6> available copies :{{$book -> no_copies}}</h6>
            <form action="{{ route('favourite') }}" method="GET">
                {{csrf_field()}}
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="favouriteTerm" value="{{ isset($book->id) ? $book->id : '' }}">
                        <button type="submit">
                        <i class="fas fa-heart"style="font-size: 200%;content: '\f004';" id="fav" onclick="{this.style.color = 'red'}"></i>
                        </button>
                    </div>
            </form>
            <a href="#" class="{{in_array($book->id, $favorites) ? 'isfavoriteButton' : 'favoriteButton'}}"><i class="fas fa-heart"></i></a>

        </div>
      </div>
    @endforeach
    </div>
    <div class="pageLinks" style="display:flex;justify-content:center;align-items:center;">  {{$book_data ->appends(Request::except('page'))-> links()}}</div>

    </div>

</div>

<!-- </div> -->
<!-- </div> -->

<!-- </div> -->


@endsection

