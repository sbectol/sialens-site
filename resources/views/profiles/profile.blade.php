<div class="label">
  <div class="code">
  {{--  <img class="cardlogo" src="/images/logo.png" />    --}}
 <div style="float:right">{!! QrCode::backgroundColor(255,255,255)->size(120)->generate('Sialens-' . $profile->id . '-' . $profile->school_id . '-' . $profile->class); !!}</div></div>
 <p>{{$profile->school->name}}</p>
 <p>{{$profile->id}} - {{$profile->class}}</p>
 
    </div>