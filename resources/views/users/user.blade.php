<div class="card">
    
    <a href="/users/edit/{{ $user->id }}">{{ $user->name }}</a>
    <ul>
    @foreach($user->roles as $role)
    <li class="small">{{$role->name}}</li>
    @endforeach
    </ul>
    
    </div>