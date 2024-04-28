<x-layout>
<div class="mytable">
    <table class="table table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td> 
                <td>
                <div class="note-buttons" style="text-align: center;">
                <a href="{{route('user.edit',$user)}}" class="note-edit-button">Edit</a>
                <form action="{{route('user.destroy',$user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
                </div>
                </td> 
            </tr>
        </tbody>
    </table>
</div>
</x-layout>
