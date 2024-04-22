<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use ZxcvbnPhp\Zxcvbn;

class RegisterPasswords extends Component
{
    public string $password = '';
    public string $passwordConfirmation = '';
    public int $strengthScore = 0;
    public array $strengthLevels = [
        1 => 'Débil',
        2 => 'Justo',
        3 => 'Bien',
        4 => 'Fuerte',
    ];
    public function updatedPassword($value)
    {
        $this->strengthScore = (new Zxcvbn())->passwordStrength($value)['score'];
    }

    protected function setPasswords($value): void
    {
        $this->password = $value;
        $this->passwordConfirmation = $value;
        $this->updatedPassword($value);
    }
    public function generatePassword(): void
    {
        $password = Str::password(12);

        $this->setPasswords($password);
    }


    public function render()
    {
        return view('livewire.register-passwords');
    }
}
