@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <table class="table">
                    <thead class="thead-dark"> <!-- Use thead-dark for a dark background -->
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Compan-ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td> 
                                {{$user->id}}
                            </td>
                            <td>
                                {{$user->company_id}}
                            </td>
                            <td>
                                {{$user->first_name}}
                            </td>
                            <td>
                                {{$user->last_name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->phone}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('companyUsers.edit',['companyUser'=>$user->id]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('companyUsers.destroy',['companyUser'=>$user->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-record').submit();">
                                        Delete
                                </a>
                                <form id="delete-record" style="display:none;" method="POST" action="{{ route('companyUsers.destroy',['companyUser'=>$user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection