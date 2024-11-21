<?php

namespace App\Models;

use App\Models\Links;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\UrlView;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'banned',
        'ip_address',
        'registration_user_agent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'banned' => 'boolean',
        ];
    }

    public function profile_settings(): HasOne
    {
        return $this->hasOne(ProfileSettings::class);
    }

    public function links()
    {
        return $this->hasMany(Links::class);
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function profileViews()
    {
        return $this->hasMany(ProfileView::class);
    }

    public function username() {
        return $this->name;
    }

    public function urlViews()
    {
        return $this->hasMany(UrlView::class);
    }

    public function isBanned(): bool
    {
        return $this->banned;
    }

    public function flagSuspiciousActivity()
    {
        $recentRegistrations = static::where('created_at', '>=', now()->subHour())
            ->where('ip_address', $this->ip_address)
            ->count();

        if ($recentRegistrations > 10) {
            $this->banned = true;
            $this->save();
            
            event(new AdminNotification("Suspicious activity detected: Multiple registrations from IP " . $this->ip_address));
        }
    }
}
