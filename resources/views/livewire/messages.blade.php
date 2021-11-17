<div>
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->level == 'admin')
                        User
                    @else
                        Admin    
                    @endif
                    
                </div>
                <div class="card-body chatbox p-0">

                @if(auth()->user()->level == 'admin')    
                    <ul class="list-group list-group-flush">
                        @foreach ($users as $user)

                        @if($user->id !== auth()->id())
                        @php
                            $not_seen= App\Models\message::where('user_id',$user->id)
                            ->where('receiver_id',auth()->id())->where('is_seen',false)->get() ?? null
                        @endphp
                            <a wire:click="getUser({{$user->id}})" class="text-dark link">
                                <li class="list-group-item">
                                    <img src="{{asset ('/img/avatar.jpg')}}" alt="">
                                        @if ($user->is_online==true)
                                            
                                        <i class="fa fa-circle text-success online-icon">
                                        </i> 
                                        @endif
                                        {{$user->name}}

                                        @if(filled($not_seen))
                                        <div class="badge badge-success">
                                            {{$not_seen->count()}}
                                        </div>
                                        @endif
                                </li>
                            </a>
                            @endif
                        @endforeach

                @else 

                <ul class="list-group list-group-flush">
                    @foreach ($users->where('level','admin') as $user)
                    
                    @if($user->id !== auth()->id())
                    @php
                        $not_seen= App\Models\message::where('user_id',$user->id)
                        ->where('receiver_id',auth()->id())->where('is_seen',false)->get() ?? null
                    @endphp
                        <a wire:click="getUser({{$user->id}})" class="text-dark link">
                            <li class="list-group-item">
                                <img src="{{asset ('/img/avatar.jpg')}}" alt="">
                                    @if ($user->is_online==true)
                                        
                                    <i class="fa fa-circle text-success online-icon">
                                    </i> 
                                    @endif
                                    {{$user->name}}
                                    @if(filled($not_seen))
                                    <div class="badge badge-success">
                                        {{$not_seen->count()}}
                                    </div>
                                    @endif
                            </li>
                        </a>
                        @endif
                    @endforeach
                    </ul>
                @endif
                </div>
            </div>
        </div>  <!-- end col-md-4-->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset ($sender)) 
                        {{$sender->name}}
                    @endif
                </div>
                <div class="card-body message-box" wire:poll="mountData()">
                    @if(filled($allmessages))
                        @foreach($allmessages as $mgs)
                                <div class="single-message @if($mgs->user_id == auth()->id()) sent @else received @endif" >
                                    <p class="font-weight-bolder my-0">{{$mgs->user->name}}</p>
                                    {{$mgs->message}} <br>
                                    <small class="text-muted w-100">Sent <em>{{$mgs->created_at}}</em></small>
                                </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <form wire:submit.prevent="SendMessage">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" wire:model="message">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
