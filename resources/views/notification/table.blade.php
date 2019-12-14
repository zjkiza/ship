<div class="row">
    <table class="table table-striped table-bordered users-table">
        <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Message</th>
            <th scope="col">Created</th>
            @if (auth()->user()->isAdmin())
                <th scope="col">Action</th>
            @endif
        </tr>
        </thead>

        @foreach($notifications as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ $notification->message }}</td>
                <td>{{ $notification->created_at }}</td>
                @if (auth()->user()->isAdmin())
                    <td>
                        <form class="form-inline my-2 my-lg-0"
                              action="{{ route('admin.notification.destroy', [ 'notification' => $notification ]) }}"
                              method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-primary my-2 my-sm-0" type="submit">DELETE</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
</div>