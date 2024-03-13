<?php

namespace App\Livewire\Forms;

use App\Models\Judge;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;

class JudgeForm extends Form
{
    public ?Judge $judge;

    #[Validate('required')]
    public $firstname = '';

    #[Validate('required')]
    public $lastname = '';

    public function setJudge(Judge $judge)
    {
        $this->judge = $judge;

        $this->firstname = $judge->firstname;

        $this->lastname = $judge->lastname;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $user = User::create([
            'name' => Str::slug($validatedData['firstname'], ''),
            'email' => Str::slug($validatedData['firstname'], '') . '@example.com',
            'password' => Hash::make('ici'),
        ]);

        Judge::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'user_id' => $user->id,
        ]);
    }

    public function update()
    {
        $validatedData = $this->validate();
        $judge = $this->judge;

        $judge->firstname = $validatedData['firstname'];
        $judge->lastname = $validatedData['lastname'];

        $judge->update();

        $user = User::find($judge->user_id);
        $user->name = Str::slug($validatedData['firstname'], '');
        $user->email = Str::slug($validatedData['firstname'], '') . "@example.com";
        $user->update();
    }
}
