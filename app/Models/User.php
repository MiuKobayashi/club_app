<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'year',
        'experience',
        'admin',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //reservationsテーブルに対するリレーション(主)
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    //songsテーブルに対するリレーション(多対多)
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'practice_songs')
        // ->withPivot('performance')
        ;
    }
    
    //practice_songsテーブルに対するリレーション(主)
    public function practicesongs()
    {
        return $this->hasMany(PracticeSong::class);
    }
    
    public function getOrderBy()
    {
        return $this->orderBy('year', 'DESC')->get();
    }
    
    //desiresテーブルに対するリレーション(主)
    public function desires()
    {
        return $this->hasMany(Desire::class);
    }
    
    //announcement_readsテーブルに対するリレーション
    public function announcement_reads()
    {
        return $this->hasMany(AnnouncementRead::class);
    }
    
    //練習中の曲を取得する関数
    public function getInprogress()
    {
        return $this->with(['practicesongs'=> function ($query) {
                        $query->where('inprogress',true)->with(['song','part']);
                        }])->get();
    }
    
    //部員を取得する関数
    public function getMembers()
    {
        return $this->orderBy('year', 'DESC')->get();
    }

}
