<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col grid"><button type="submit" data-order="id" class="btn btn-light">Id</button></th>
            <th scope="col"><button type="submit" data-order="email" class="btn btn-light">Email</button></th>
            <th scope="col"><button type="submit" data-order="password" class="btn btn-light">Password</button></th>
            <th scope="col"><button type="submit" data-order="action" class="btn btn-light">Action</button></th>
    </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>