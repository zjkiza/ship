<div class="row">
    <table class="table table-striped table-bordered users-table">
        <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Message</th>
            <th scope="col">Created</th>
        </tr>
        </thead>

        @foreach($notifications as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ $notification->message }}</td>
                <td>{{ $notification->created_at }}</td>
            </tr>
        @endforeach
    </table>
</div>