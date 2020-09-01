@extends('admin.admin')

@section('contents')
    <table class="table table-bordered table-hover text-center ">
        <thead>
            <tr class="align-middle">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td class="align-middle">{{ ++$key }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle"><img src="{{ url('storage/images', $user->avatar) }}" class="user-avatar"></td>
                    <td class="align-middle">{{ $user->phone }}</td>
                    <td class="align-middle">{{ $user->role_label }}</td>
                    <td class="align-middle">
                        <a href="{{ route('user-management.edit', $user->id) }}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                        <form action="{{ route('user-management.destroy', $user ->id) }}" method="POST" class="delete-form float-right">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
