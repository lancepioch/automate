<?php

namespace App\Models;

use BeyondCode\Mailbox\InboundEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public function process(InboundEmail $email)
    {
        $action = new $this->class(...$this->variables);
    }
}
