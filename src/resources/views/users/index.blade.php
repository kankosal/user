<h1>Showing all Users</h1>

@forelse ($users as $post)
    <li>{{ $post->title }}</li>
@empty
    <p> 'No posts yet' </p>
@endforelse