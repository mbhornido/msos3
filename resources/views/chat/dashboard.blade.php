
<div class="container">
    <h1>Dashboard</h1>
    <h2>Users</h2>
    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ url('chat', $user->id) }}">{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>
</div>



