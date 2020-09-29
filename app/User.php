<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'parent'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',"parent"
    ];

    public function saveChildren() {
        $children = $this->saveChildrenSub();
        $this->children = json_encode($children);
        $this->save();
        return $children;
    }
    protected function saveChildrenSub() : array {       
        $children = User::where("parent",$this->id)->get();
        $childIds = [$this->id];
        foreach($children as $child) {
            $childIds = array_merge($childIds, $child->saveChildrenSub());
        }
        return $childIds;

    }
    public static function saveAllChildren () {
        foreach(self::all() as $user) {
            $user->saveChildren();
        }
    }
    public function allowedUsers () {
        return json_decode($this->children); 
    }
    public function test() {
        $user = new User([
            "name" => "mani2",
            "password" => Hash::make("test"),
            "email" => "ml2@webrender.de"
        ]);
        $user->save();
        return "ok";
    }
}
