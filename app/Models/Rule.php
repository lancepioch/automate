<?php

namespace App\Models;

use BeyondCode\Mailbox\InboundEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function process(InboundEmail $email)
    {
        foreach ($this->actions as $action) {
            $action->process($email);
        }
    }
}
