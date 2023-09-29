<x-app-layout>
  <x-layout>
    <div class="pull">
        <h3>Create</h3>
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

      <form action="{{ route('users.store') }}" method="POST">
        @csrf

          <div class="row g-3">
            <div class="col-sm">
              <input type="text" name="boss_id" class="form-control" placeholder="NumberBoss" value="">
            </div>
            <div class="col-sm">
              <input type="text" name="first_name" class="form-control" placeholder="FirstName" value="" aria-label="FirstName">
            </div>
            <div class="col-sm">
              <input type="text" name="last_name" class="form-control" placeholder="LastName" value="" aria-label="LastName">
            </div>
            <div class="col-sm">
              <input type="position" name="position" class="form-control" placeholder="Position" value="" aria-label="Position">
            </div>
          </div>
          <div class="row g-3 my-top">
            <div class="col-sm">
              <input type="email" name="email" class="form-control" placeholder="Email" value="" aria-label="Email">
            </div>
            <div class="col-sm">
              <input type="date" name="employment_date" class="form-control" placeholder="Date" value="" aria-label="Date">
            </div>
            <div class="col-sm">
              <input type="text" name="salary" class="form-control" placeholder="Salary" value="" aria-label="Salary">
            </div>
            <div class="col-sm">
              <input type="text" name="password" class="form-control" placeholder="Password" value="" aria-label="Password">
            </div>
          </div>
          <div class="col-auto my-top" style="display:flex; justify-content: center;">
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
  </x-layout>
</x-app-layout>