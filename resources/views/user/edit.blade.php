<x-layout>
<div class="section">
   <div class="user-container single-user">
   <div class="user-header">
      <h1>Edit user</h1>
   </div>
      <form action="{{route('user.update',$user)}}" method="POST" class="user">
         @csrf
         @method('PUT')
         <div class="inputs">
            <div class="input-field">
            <label for="firstname">FirstName:</label>
            <input type="text" name="firstname" value="{{$user->firstname}}" class="user-body" placeholder="Enter firstname"/>
            </div>
            <div class="input-field">
            <label for="lastname">LastName:</label>
            <input type="text" name="lastname"  value="{{$user->lastname}}" class="user-body" placeholder="Enter lastname"/>
            </div>
            <div class="input-field">
            <label for="username">UserName:</label>
            <input type="text" name="username"  value="{{$user->username}}" class="user-body" placeholder="Enter username"/>
            </div>
            <div class="input-field">
            <label for="email">E-Address:</label>
            <input type="email" name="email"  value="{{$user->email}}" class="user-body" placeholder="Enter email"/>
            </div>
         </div>
         <div class="user-buttons" style="padding-bottom: 20px;">
         <a href="{{route('user.index')}}" class="user-submit-button">Cancel</a>
         <button class="user-submit-button">Submit</button>
         </div>
      </form>
   </div>
</div>
</x-layout>
