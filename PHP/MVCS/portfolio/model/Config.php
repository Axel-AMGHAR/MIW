<?php

class Config extends Model
{
    public static function get($key){
        $config = parent::getInstance();
        $req = $config->bdd->prepare('SELECT value FROM config WHERE my_key=:key');
        $req->bindValue(':key', $key);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data['value'];
    }
}