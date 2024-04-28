<x-layout>
    <div class="note-container">
        <div class="new-note-buttons">
        <a href="{{route('note.create')}}" class="new-note-btn">
            New Note
        </a>
        <a href="{{route('user.index')}}" class="new-note-btn">
            View Users
        </a>
        <a href="{{route('user.logout')}}" class="new-note-btn">
           Logout
        </a>
        </div>
        <div class="notes">
            @foreach ($notes as $note)
            <div class="note">
                <div class="note-body">
                    {{Str::words($note->note, 50)}}
                </div>
                <div class="note-buttons">
                <a href="{{route('note.show',$note)}}" class="note-edit-button">View</a>
                <a href="{{route('note.edit',$note)}}" class="note-edit-button">Edit</a>
                <form action="{{route('note.destroy',$note)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
                </div>
            </div>
            @endforeach
        </div>
        {{$notes->links()}}
    </div>
</x-layout>
