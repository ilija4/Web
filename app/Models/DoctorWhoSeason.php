<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class DoctorWhoSeason extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctor_who_season';
    public $timestamps = false;
    protected $softDeletes = true;
    protected $fillable = ['poster_url', 'season', 'year', 'doctorNumber', 'user_id'];
    /**
     * @var mixed
     */

    public function setPosterUrl($value)
    {
        $this->attributes['poster_url'] = $value;
    }
    public function setSeason($value)
    {
        $this->attributes['season'] = $value;
    }
    public function setYear($value)
    {
        $this->attributes['year'] = $value;
    }
    public function setDoctorNumber($value)
    {
        $this->attributes['doctorNumber'] = $value;
    }
    public function getYear()
    {
        return $this->attributes['year'];
    }
}
