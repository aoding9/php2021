<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Member
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $mobile
 * @property string $email
 * @property string $avatar
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $remember_token
 * @property string $type
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereUsername($value)
 * @mixin \Eloquent
 * @property int $country_id 国家id
 * @property int $province_id 省/州id
 * @property int $city_id 城市id
 * @property int $county_id 区县id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Member whereProvinceId($value)
 */
class Member extends Model
{
   protected $table='member';
}
