@extends('layouts.main')


@section('content')
    <h1 align="center">Products in category: {{ $category['name'] }}</h1>

    <form method="GET" action="{{ route('categories.view', $category['code']) }}">
        <div class="search">
            <label for="cmp-search">Search ::  </label>
            <input id="cmp-search" type="text" name="term" value="{{ $term }}" />
            <br>
            <div class="button-bt">
                <button type="submit">Submit</button>
            </div>
        </div>
        <br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    <div class="price-range">
                        <label for="min-price">Min Price ::</label>
                        <input align-item="center" id="min-price" type="number" name="min_price" value="{{ $min_price }}" step="0.01" />
                        <br>
                        <br><label for="max-price">Max Price ::</label>
                        <input id="max-price" type="number" name="max_price" value="{{ $max_price }}" step="0.01" />
                        <br>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    @php
        // Display all products data before foreach
        // print_r($products);
    @endphp
    <br>
    <table class="app-cmp-data-list">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product['code'] ?? 'N/A' }}</td>
                    <td>{{ $product['name'] ?? 'Unknown' }}</td>
                    <td>
                        
                        @if(is_array($product['categories']) && !empty($product['categories'] ))
                            @foreach($product['categories'] as $category)
                            <a href="{{ route('categories.view', $category['code']) }}" class="category-box">
                                {{ $category['name'] }}
                            </a>
                            @endforeach
                        @endif
                    </td>
                    <td class="number">{{ number_format($product['price'] ?? 0, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
