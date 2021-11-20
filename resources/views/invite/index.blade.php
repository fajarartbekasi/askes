@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('invite.create')}}" class="btn btn-info">
                            Tambah Anggota
                        </a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>ALamat</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->roles->implode('name',',')}}</td>
                                    <td>
                                        <form action="{{route('invite.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('invite.edit', $user->id)}}" class="btn btn-info btn-sm">Edit User</a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus User
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection