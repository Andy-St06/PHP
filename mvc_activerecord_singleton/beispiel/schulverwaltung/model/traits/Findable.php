<?php
trait Findable
{
    public static function findeAlle()
    {
        $sql = vsprintf(
            'SELECT * FROM `%s`',
            [self::ermittleTable()]
        );
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $abfrage->fetchAll();
    }
    
    public static function finde($id)
    {
        $sql = vsprintf(
            'SELECT * FROM `%s` WHERE id = ?',
            [self::ermittleTable()]
        );
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute([$id]);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $abfrage->fetch();
    }
    
    public static function findeNach($spalte, $wert) 
    { 
        $sql = vsprintf( 
            "SELECT * FROM `%s` WHERE $spalte LIKE ?", 
            [self::ermittleTable()] 
        ); 
        $abfrage = DB::getDB()->prepare($sql); 
        $abfrage->execute([$wert]); 
        $abfrage->setFetchMode(PDO::FETCH_CLASS, static::class); 

        return $abfrage->fetchAll(); 

    } 
    
}
