<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $id
 * @property string $nombre
 * @property int $cantidad_generos_asociados
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'generos';
	public $timestamps = false;

	protected $casts = [
		'cantidad_generos_asociados' => 'int'
	];

	protected $fillable = [
		'nombre',
		'cantidad_generos_asociados'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class);
	}
}
