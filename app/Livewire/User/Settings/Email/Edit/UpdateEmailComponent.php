<?php

namespace App\Livewire\User\Settings\Email\Edit;

use Illuminate\View\View;
use Livewire\Component;

class UpdateEmailComponent extends Component
{
    private array $steps = ['update', 'confirm', 'save'];
    public string $currentStep = 'update';

    public function render(): View
    {
        return view('livewire.user.settings.email.edit.update-email-component');
    }

    public function update()
    {
        $this->currentStep = 'confirm';
    }

    private function setStep(string $step): void
    {
        if (in_array($step, $this->steps)) {
            $this->currentStep = $step;
        }
    }
}
