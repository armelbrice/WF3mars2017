<?php

class Chat
{
	//Propriété prénom
	private $prenom;

	//Propriété age
	private $age;

	//Propriété couleur
	private $couleur;

	//Propriété sexe
	private $sexe;

	//Propriété race
	private $race;

    /**
     * Gets the value of prenom.
     *
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Sets the value of prenom.
     *
     * @param mixed $prenom the prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Gets the value of age.
     *
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Sets the value of age.
     *
     * @param mixed $age the age
     *
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Gets the value of couleur.
     *
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Sets the value of couleur.
     *
     * @param mixed $couleur the couleur
     *
     * @return self
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Gets the value of sexe.
     *
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Sets the value of sexe.
     *
     * @param mixed $sexe the sexe
     *
     * @return self
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Gets the value of race.
     *
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Sets the value of race.
     *
     * @param mixed $race the race
     *
     * @return self
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    //Construct de l'objet permettant de l'instancier
    public function __construct($prenom, $age, $couleur, $sexe, $race){
    	$this -> setPrenom($prenom);
    	$this -> setAge($age);
    	$this -> setCouleur($couleur);
    	$this -> setSexe($sexe);
    	$this -> setRace($race);
    }

    //Méthode permettant de retourner la totalité des propriétés d'un objet sous forme de tableau
    public function getInfos(){
    	$array = array(
    		get_object_vars($this)
    		);

    	return $array;
    }
}

?>