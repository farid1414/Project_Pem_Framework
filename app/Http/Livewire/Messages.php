<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\message;

class Messages extends Component
{
    public $message;
    public $allmessages;
    public $sender;
    public function render()
    {
        $users=User::all();
        $sender=$this->sender;
        $this->allmessages;
        return view('livewire.messages', compact('users','sender'));
    }
    public function mountData()
    {
        if(isset($this->sender->id))
        {
            $this->allmessages=message::where('user_id',auth()->user()->id)->where('receiver_id',$this->sender->id)->orWhere('user_id', $this->sender->id)
            ->Where('receiver_id' , auth()->id())->orderBy('id','desc')->get();


            $not_seen = message::where('user_id',$this->sender->id)->where('receiver_id', auth()->id());
            $not_seen->update(['is_seen'=> true]);
        }
    }

    public function resetForm()
    {
        $this->message=' ';
    }
    // untuk mengirimkan pesan ke database
    public function SendMessage()
    {
        $data = new message;
        $data->message=$this->message;
        $data->user_id =auth()->id();
        $data->receiver_id=$this->sender->id;
        $data->save();

        $this->resetForm();
    }

    // untuk klik user mengirim pesan 
    public function getUser($userId)
    {
        $user =User::find($userId);
        $this->sender=$user;
        $this->allmessages=message::where('user_id',auth()->user()->id)->where('receiver_id',$userId)->orWhere('user_id',$userId)
        ->Where('receiver_id' , auth()->id())->orderBy('id','desc')->get();
    }


}