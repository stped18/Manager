<?php

use App\Models\Customer;
use App\Models\Developer;
use App\Models\ProjectManager;

function developer(): ?Developer
{
    $user = auth()->user();

    if ($user instanceof Developer) {
        return $user;
    }

    return null;
}

function projectmanager(): ?ProjectManager
{
    $user = auth()->user();

    if ($user instanceof ProjectManager) {
        return $user;
    }

    return null;
}

function customer(): ?Customer
{
    $user = auth()->user();

    if ($user instanceof Customer) {
        return $user;
    }

    return null;
}
