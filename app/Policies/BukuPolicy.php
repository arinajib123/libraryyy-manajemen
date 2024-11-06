<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Buku;

class BukuPolicy
{
    public function update(User $user, Buku $buku)
    {
        return $user->id === $buku->user_id; // Hanya pemilik buku yang bisa mengedit
    }

    public function delete(User $user, Buku $buku)
    {
        return $user->id === $buku->user_id; // Hanya pemilik buku yang bisa menghapus
    }
}
