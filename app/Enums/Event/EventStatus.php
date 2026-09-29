<?php

namespace App\Enums\Event;

enum EventStatus :string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case COMPLETED = 'active';
}
