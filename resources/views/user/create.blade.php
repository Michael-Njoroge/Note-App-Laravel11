<x-layout>
   <div class="section">
   <div class="user-container single-user">
   <div class="user-header">
      <h1>Create Account</h1>
   </div>
      <form action="{{route('user.store')}}" method="POST" class="user">
         @csrf
         <div class="inputs">
            <div class="input-field">
            <label for="firstname">FirstName:</label>
            <input type="text" name="firstname" class="user-body" placeholder="Enter firstname" required/>
            </div>
            <div class="input-field">
            <label for="lastname">LastName:</label>
            <input type="text" name="lastname" class="user-body" placeholder="Enter lastname" required/>
            </div>
            <div class="input-field">
            <label for="username">UserName:</label>
            <input type="text" name="username" class="user-body" placeholder="Enter username" required/>
            </div>
            <div class="input-field">
            <label for="email">E-Address:</label>
            <input type="email" name="email" class="user-body" placeholder="Enter email" required/>
            </div>

         </div>
         <div class="user-buttons">
         <button class="user-submit-button">Create</button>
         </div>
         <div class="haveAccount">
            <p >Already have an account?<span><a class="have" href="{{route('login')}}">Login</a></span></p>
         </div>
      </form>
   </div>
   </div>
</x-layout>
