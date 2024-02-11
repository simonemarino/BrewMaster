
@extends('app')
@push('styles')

<link href="{{ asset('assets/css/beers.css') }}" rel="stylesheet">
@endpush

@section('title', 'Page Title')



@section('content')
<div class="loading-bar-container">
    <div class="loading-bar"></div>
  </div>

<div class="container d-flex flex-wrap align-items-center">
<select class="form-select" id='per_page' aria-label="Default select example" onchange="perPage(event)">
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="30">30</option>
    <option value="40">40</option>
    <option value="50">50</option>
</select>
<div id="totitems"> Total items : <span id="total-items">0</span></div>
<input type="hidden" id="page" value="">
<input type="hidden" id="totalItems" value="">
</div>




<div class="container d-flex flex-wrap align-items-center" id="container" data-total-url="{{ route('beers.total') }}" data-url="{{ route('beers.data') }}">
</div>
<div class="fixed-bottom">
    <div class="pagination">
        <ul> <!--pages or li are comes from javascript --> </ul>
    </div>
</div>



@endsection

@push('script')
  <script src="{{ asset('assets/js/beers.js') }}"></script>


@endpush






