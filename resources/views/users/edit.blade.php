<x-app-layout>
  <x-layout>
    <div class="pull">
        <h3>Edit</h3>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
      </div>

      @if ($errors->any())
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

          <div class="row g-3">
            <div class="col-sm">
              <label for="first_name">First Name:</label>
              <input type="text" name="first_name" class="form-control" placeholder="FirstName" value="{{ $user->first_name }}" aria-label="FirstName">
            </div>
            <div class="col-sm">
              <label for="last_name">Last Name:</label>
              <input type="text" name="last_name" class="form-control" placeholder="LastName" value="{{ $user->last_name }}" aria-label="LastName">
            </div>
          <div class="row g-3 my-top">
            <div class="col-sm">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" aria-label="Email">
            </div>
            <div class="col-sm">
              <label for="password">Password:</label>
              <input type="text" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}" aria-label="Password">
            </div>
          </div>
          <div class="col-auto my-top" style="display:flex; justify-content: center;">
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
  </x-layout>
</x-app-layout>