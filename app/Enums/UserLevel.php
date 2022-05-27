<?php

namespace App\Enums;

enum UserLevel: string 
{
  case Admin = 'admin';
  case User = 'user';
}