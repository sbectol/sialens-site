<div class="card">
    
    {{ $question->body }}
    
    <ul>
        
        @foreach ($question->option as $option)
        
            @if($option->correct)
        
                <li class = "list-group-item-success">
        
                @else
        
                <li>
        
            @endif
        
            {{$option->body}}</li>
        
        @endforeach
        
        </ul>

        <br />
        
        <p><span class="small">Wedi ychwangu gan {{$question->user->name}}</span></p>

    </div>