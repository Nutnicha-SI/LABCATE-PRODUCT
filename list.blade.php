<!-- resources/views/categories/list.blade.php -->
@extends('layouts.main')

@section('title', $title)

@section('content')
<main>
    <form action="{{ route('categories.list') }}" method="get">
        <div class="search">
            <label for="cmp-search">Search ::  </label>
            <input id="cmp-search" type="text" name="term" value="{{ $term }}" />
            <div class="button-bt">
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
    <br>
    <table class="app-cmp-data-list">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category['code'] }}</td>
                    <td>
                        <a href="{{ route('categories.view', $category['code']) }}" class="category-box">
                            {{ $category['name'] }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>  
@endsection
