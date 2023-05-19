<?php 

namespace Modeles\Entites;
class Actualites {
    private $id;
    private $titre;
    private $soustitre;
    private $texte;
    private $date;
    private $miniature;
    private $alt;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of soustitre
     */ 
    public function getSoustitre()
    {
        return $this->soustitre;
    }

    /**
     * Set the value of soustitre
     *
     * @return  self
     */ 
    public function setSoustitre($soustitre)
    {
        $this->soustitre = $soustitre;

        return $this;
    }

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of miniature
     */ 
    public function getMiniature()
    {
        return $this->miniature;
    }

    /**
     * Set the value of miniature
     *
     * @return  self
     */ 
    public function setMiniature($miniature)
    {
        $this->miniature = $miniature;

        return $this;
    }

    /**
     * Get the value of alt
     */ 
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set the value of alt
     *
     * @return  self
     */ 
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }
}

?>