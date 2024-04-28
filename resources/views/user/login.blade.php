<x-layout>
<div class="section">
   <div class="user-container single-user">
      <div class="user-header">
         <h1>Sign in</h1>
      </div>
         <form action="{{route('user.auth')}}" method="POST" class="user">
            @csrf
            <div class="inputs">
               <div class="input-field">
               <label for="username">E-Address:</label>
               <input type="text" name="email" class="user-body" placeholder="Enter Email" required/>
               </div>
               <div class="input-field">
               <label for="password">Password:</label>
               <input type="password" name="password" class="user-body" placeholder="Enter password" required/>
               </div>
            </div>
            <div class="user-buttons">
            <button class="user-submit-button">Sign In</button>
            </div>
            <div class="haveAccount">
               <p >Do not have an account?<span><a class="have" href="{{route('user.create')}}">Register</a></span></p>
            </div>
         </form>
   </div>
</div>
</x-layout>
