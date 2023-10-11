@extends('layouts.app')
@section('content')
<!-- <div id="app">
        <router-view></router-view>
    </div>
    <script src="{{ mix('js/app.js') }}"></script> -->
<div class="container">
  
            
                <table class="table" border="1">
                    <thead class="thead-dark"> 
                        <tr>
                            <th >ID</th>
                            <th >Company Name</th>
                            <th >Company Email</th>
                            <th >logo URL</th>
                            <th >Website</th>
                            <th >Edit/Update</th>
                            <th >Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr >
                            <td>
                                {{$company->id}}
                            </td>
                            <td>
                                {{$company->name}}
                            </td>
                            <td>
                                {{$company->email}}
                            </td>
                            <td>
                                {{$company->logo_url}}
                            </td>
                            <td>
                                {{$company->website}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('companies.edit',['company'=>$company->id]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('companies.destroy',['company'=>$company->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-record').submit();">
                                        Delete
                                </a>
                                <form id="delete-record" style="display:none;" method="POST" action="{{ route('companies.destroy',['company'=>$company->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
@endsection