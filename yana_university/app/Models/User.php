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
        'password',
        'role',
        'profile_image',
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
        'password' => 'hashed',
    ];
    /**
     * user情報すべて取得
     * 
     * @param int
     * @return array
     */
    public function findAllUser(int $perPage = 15)
    {
        return User::paginate($perPage);
    }
    /**
     * リクエストデータを登録
     * 
     * @param AuthRequest $request
     * @return void
     */
    public function InsertUser($request)
    {
        return $this->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => "0",
            "profile_image" => basename($request->file('profile_image')->store('profiles', 'public')),
        ]);
    }
    /**
     * アップサート処理
     * 
     * @param UserRequest $request
     * @return void
     */
    public static function upsertUser($request)
    {
        if (empty($request->profile_image)) {
            return self::upsert([
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => 0,
                    'profile_image' => 'default.JPG',
                ],
            ],['id'],['name', 'email', 'password', 'profile_image']);
        } else {
            return self::upsert([
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => 0,
                    'profile_image' => basename($request->file('profile_image')->store('profiles', 'public')),
                ],
            ],['id'],['name', 'email', 'password', 'profile_image']);
        }
    }
    /**
     * ユーザー削除
     * 
     * @param User $user.id
     * @return void
     */
    public function UserDelete($id)
    {
        return $this->where('id', $id)->delete();
    }
}
