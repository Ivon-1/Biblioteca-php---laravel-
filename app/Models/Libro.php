<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 * 
 * @property int $id
 * @property string $titulo
 * @property string $autor
 * @property string $genero
 * @property string $imagen
 * @property int $autor_id
 * @property int $genero_id
 * 
 *
 * @package App\Models
 */
class Libro extends Model
{
	protected $table = 'libro';
	public $timestamps = false;

	protected $casts = [
		'autor_id' => 'int',
		'genero_id' => 'int'
	];

	protected $fillable = [
		'titulo',
		'imagen',
		'autor_id',
		'genero_id'
	];

	public function autor()
	{
		return $this->belongsTo(Autor::class, 'autor_id');
	}

	public function genero()
	{
		return $this->belongsTo(Genero::class, 'genero_id');
	}
}
