<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'id', 'name', 'email', 'login', 'perfil_acesso', 'password', 'cpf', 'dt_nasc', 'email_verified_at', 'sexo','rg' ,'endereco',
        'complemento', 'numero', 'cep', 'bairro', 'cidade', 'estado', 'pais', 'natural', 'dt_nasc', 'cod_pais', 'telefone',
        'celular1', 'celular2', 'registro_profissional', 'salario', 'token' ,'remember_token', 'status'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

}
/*
Estrutura da tabela

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `login` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfil_acesso` int(11)  DEFAULT '2',
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `rg` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `endereco` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,    
  `complemento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `bairro` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `cidade` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `pais` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `natural` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,    
  `dt_nasc` date COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_pais` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `celular1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `celular2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,      
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT 'S',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ind_name` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
*/


