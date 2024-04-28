<x-layout>
   <div class="note-container single-note">
   <div class="note-header">
      <h1>Create Note</h1>
   </div>
      <form action="{{route('note.store')}}" method="POST" class="note">
         @csrf
         <textarea name="note" rows="10" class="note-body note-body-text" placeholder="Enter your note here" required></textarea>
         <div class="note-buttons">
         <a href="{{route('note.index')}}" class="note-cancel-button">Cancel</a>
         <button class="note-submit-button">Submit</button>
         </div>
      </form>
   </div>
</x-layout>
