<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Manager
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $mobile
 * @property string $email
 * @property int $role_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $remember_token
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Manager whereUsername($value)
 * @mixin \Eloquent
 */
class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //
    protected $table='manager';
    use \Illuminate\Auth\Authenticatable;

}
