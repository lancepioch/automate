<?php

namespace App;

use App\Models\Rule;
use BeyondCode\Mailbox\InboundEmail;

class CatchAll
{
    public function __invoke(InboundEmail $email)
    {
        $rules = Rule::query()
            ->where(fn($query) => $query->where('type', 'subject')->where('match', 'like', $email->subject()))
            ->orWhere(fn($query) => $query->where('type', 'from')->where('match', 'like', $email->from()))
            ->orWhere(fn($query) => $query->where('type', 'to')->where('match', 'like', $email->to()))
            ->get();

        /** @var Rule $rule */
        foreach ($rules as $rule) {
            $rule->process($email);
        }
    }
}
